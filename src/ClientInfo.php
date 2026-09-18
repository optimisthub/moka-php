<?php

namespace Moka;

/**
 * Resolves the end user public IP address and source port.
 *
 * TCMB regulation requires every payment request to carry the real
 * customer ClientIP and ClientPort. Behind a proxy, load balancer or CDN
 * the connection is terminated by the intermediary, so the original
 * values have to be read from the forwarded headers.
 *
 * ClientIP must be a public address only (no port suffix, no hostname,
 * no private or reserved range) and ClientPort must be digits only
 * between 1 and 65535, because Moka rejects anything else.
 *
 * PHP 5.6 compatible on purpose: this library supports php >=5.6.
 */
class ClientInfo
{
    /**
     * Reserved / private IPv4 ranges that Moka rejects as ClientIP.
     *
     * @var array
     */
    private static $reservedV4 = array(
        '0.0.0.0/8',
        '10.0.0.0/8',
        '100.64.0.0/10',
        '127.0.0.0/8',
        '169.254.0.0/16',
        '172.16.0.0/12',
        '192.0.0.0/24',
        '192.0.2.0/24',
        '192.168.0.0/16',
        '198.18.0.0/15',
        '198.51.100.0/24',
        '203.0.113.0/24',
        '224.0.0.0/4',
        '240.0.0.0/4',
    );

    /**
     * Non routable IPv6 ranges that Moka rejects as ClientIP.
     *
     * Note: 2001:db8::/32 is deliberately NOT listed. PHP treats it as
     * reserved but the Moka guide lists it as a valid ClientIP value.
     *
     * @var array
     */
    private static $reservedV6 = array(
        '::/128',
        '::1/128',
        'fc00::/7',
        'fe80::/10',
        'ff00::/8',
    );

    /**
     * Resolve the client IP address.
     *
     * @return string
     */
    public static function ip()
    {
        $candidates = array();

        $headers = array(
            'HTTP_CF_CONNECTING_IP',
            'HTTP_TRUE_CLIENT_IP',
            'HTTP_X_REAL_IP',
        );

        foreach ($headers as $header) {
            if (!empty($_SERVER[$header])) {
                $candidates[] = $_SERVER[$header];
            }
        }

        /**
         * X-Forwarded-For may hold a chain: "client, proxy1, proxy2".
         * The first usable public address is the real client.
         */
        $forwardedFor = '';
        if (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            $forwardedFor = $_SERVER['HTTP_X_FORWARDED_FOR'];
        } elseif (!empty($_SERVER['HTTP_X_FORWARDED'])) {
            $forwardedFor = $_SERVER['HTTP_X_FORWARDED'];
        }

        if ($forwardedFor !== '') {
            foreach (explode(',', $forwardedFor) as $perIp) {
                $candidates[] = trim($perIp);
            }
        }

        if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
            $candidates[] = $_SERVER['HTTP_CLIENT_IP'];
        }

        if (!empty($_SERVER['REMOTE_ADDR'])) {
            $candidates[] = $_SERVER['REMOTE_ADDR'];
        }

        foreach ($candidates as $perCandidate) {
            $perCandidate = trim((string) $perCandidate);

            if (strpos($perCandidate, ',') !== false) {
                $parts = explode(',', $perCandidate);
                $perCandidate = trim($parts[0]);
            }

            /**
             * Some upstreams append the port to the address (1.2.3.4:5678).
             * Only strip it for IPv4; IPv6 addresses contain colons.
             */
            if (substr_count($perCandidate, ':') === 1) {
                $parts = explode(':', $perCandidate);
                $perCandidate = $parts[0];
            }

            if (self::isPublicIp($perCandidate)) {
                return (string) $perCandidate;
            }
        }

        /**
         * Last resort: hand back the raw remote address so the gateway
         * response and the Moka validation error stay traceable.
         */
        return isset($_SERVER['REMOTE_ADDR']) ? (string) $_SERVER['REMOTE_ADDR'] : '';
    }

    /**
     * Resolve the client source port.
     *
     * @return string
     */
    public static function port()
    {
        $headers = array(
            'HTTP_X_FORWARDED_PORT',
            'HTTP_X_REAL_PORT',
            'HTTP_X_CLIENT_PORT',
            'REMOTE_PORT',
        );

        foreach ($headers as $header) {
            if (empty($_SERVER[$header])) {
                continue;
            }

            $value = trim((string) $_SERVER[$header]);

            if (strpos($value, ',') !== false) {
                $parts = explode(',', $value);
                $value = trim($parts[0]);
            }

            if (self::isValidPort($value)) {
                return (string) $value;
            }
        }

        return '';
    }

    /**
     * Resolve both values at once.
     *
     * @return array
     */
    public static function resolve()
    {
        return array(
            'ip' => self::ip(),
            'port' => self::port(),
        );
    }

    /**
     * Check whether an IP is a usable public address.
     *
     * @param string $ip
     * @return boolean
     */
    public static function isPublicIp($ip)
    {
        $ip = trim((string) $ip);

        if ($ip === '' || filter_var($ip, FILTER_VALIDATE_IP) === false) {
            return false;
        }

        /**
         * Some hosts report IPv4 mapped IPv6 (::ffff:1.2.3.4).
         */
        if (stripos($ip, '::ffff:') === 0) {
            $mapped = substr($ip, 7);
            if (filter_var($mapped, FILTER_VALIDATE_IP, FILTER_FLAG_IPV4)) {
                $ip = $mapped;
            }
        }

        if (filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_IPV4)) {
            if (filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_NO_PRIV_RANGE | FILTER_FLAG_NO_RES_RANGE) === false) {
                return false;
            }

            foreach (self::$reservedV4 as $range) {
                if (self::ipv4InRange($ip, $range)) {
                    return false;
                }
            }

            return true;
        }

        if (filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_IPV6)) {
            $bin = @inet_pton($ip);

            if ($bin === false) {
                return false;
            }

            foreach (self::$reservedV6 as $range) {
                $parts = explode('/', $range);
                if (self::ipv6InRange($bin, $parts[0], (int) $parts[1])) {
                    return false;
                }
            }

            return true;
        }

        return false;
    }

    /**
     * Validate a client port.
     *
     * @param mixed $port
     * @return boolean
     */
    public static function isValidPort($port)
    {
        if (is_int($port)) {
            return $port >= 1 && $port <= 65535;
        }

        $port = trim((string) $port);

        if ($port === '' || !ctype_digit($port)) {
            return false;
        }

        $port = (int) $port;

        return $port >= 1 && $port <= 65535;
    }

    /**
     * Check an IPv4 address against a CIDR range.
     *
     * @param string $ip
     * @param string $range
     * @return boolean
     */
    private static function ipv4InRange($ip, $range)
    {
        $parts = explode('/', $range);

        if (count($parts) !== 2) {
            return false;
        }

        $network = ip2long($parts[0]);
        $address = ip2long($ip);

        if ($network === false || $address === false) {
            return false;
        }

        $bits = (int) $parts[1];
        $mask = -1 << (32 - $bits);

        return ($network & $mask) === ($address & $mask);
    }

    /**
     * Check a packed IPv6 address against a CIDR range.
     *
     * @param string $bin
     * @param string $network
     * @param integer $bits
     * @return boolean
     */
    private static function ipv6InRange($bin, $network, $bits)
    {
        $networkBin = @inet_pton($network);

        if ($networkBin === false) {
            return false;
        }

        $bytes = (int) floor($bits / 8);
        $rem = $bits % 8;

        if ($bytes > 0 && substr($bin, 0, $bytes) !== substr($networkBin, 0, $bytes)) {
            return false;
        }

        if ($rem > 0) {
            $mask = (0xff << (8 - $rem)) & 0xff;

            if ((ord($bin[$bytes]) & $mask) !== (ord($networkBin[$bytes]) & $mask)) {
                return false;
            }
        }

        return true;
    }
}
