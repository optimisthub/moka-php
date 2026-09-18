<?php
/**
 * Moka\ClientInfo test suite.
 *
 * Exercises the valid / invalid tables from the official
 * "ClientIP ve ClientPort" integration guide.
 *
 * Usage: php tests/test-clientinfo.php
 */

require dirname(__DIR__) . '/autoload.php';

use Moka\ClientInfo;

$pass = 0;
$fail = 0;

function check($label, $actual, $expected, &$pass, &$fail)
{
    $ok = $actual === $expected;
    $ok ? $pass++ : $fail++;
    printf("%s  %-48s actual=%-16s expected=%s\n", $ok ? 'PASS' : 'FAIL', $label, var_export($actual, true), var_export($expected, true));
}

echo "=== isPublicIp() — guide validity table ===\n";
check('88.240.10.5 (valid)', ClientInfo::isPublicIp('88.240.10.5'), true, $pass, $fail);
check('2a01:5ec0:1a:8b2::14 (valid)', ClientInfo::isPublicIp('2a01:5ec0:1a:8b2::14'), true, $pass, $fail);
check('2001:db8:85a3:0:0:8a2e:370:7334', ClientInfo::isPublicIp('2001:db8:85a3:0:0:8a2e:370:7334'), true, $pass, $fail);
check('176.829.921.201 (octet > 255)', ClientInfo::isPublicIp('176.829.921.201'), false, $pass, $fail);
check('192.168.0.256 (octet > 255)', ClientInfo::isPublicIp('192.168.0.256'), false, $pass, $fail);
check('1.2.3.4.5 (five parts)', ClientInfo::isPublicIp('1.2.3.4.5'), false, $pass, $fail);
check('example.com (hostname)', ClientInfo::isPublicIp('example.com'), false, $pass, $fail);
check('88.240.10.5:51520 (has port)', ClientInfo::isPublicIp('88.240.10.5:51520'), false, $pass, $fail);
check('(empty)', ClientInfo::isPublicIp(''), false, $pass, $fail);

echo "\n=== reserved ranges must be rejected (guide 01) ===\n";
foreach (array('10.1.2.3', '172.16.0.1', '172.31.255.254', '192.168.1.1', '127.0.0.1', '169.254.1.1', '100.64.0.1', '::1', 'fe80::1') as $ip) {
    check($ip . ' reserved', ClientInfo::isPublicIp($ip), false, $pass, $fail);
}
check('172.32.0.1 (public)', ClientInfo::isPublicIp('172.32.0.1'), true, $pass, $fail);

echo "\n=== isValidPort() — guide validity table ===\n";
check('51520 valid', ClientInfo::isValidPort('51520'), true, $pass, $fail);
check('443 valid', ClientInfo::isValidPort('443'), true, $pass, $fail);
check('8080 valid', ClientInfo::isValidPort('8080'), true, $pass, $fail);
check('1 valid', ClientInfo::isValidPort('1'), true, $pass, $fail);
check('65535 valid', ClientInfo::isValidPort('65535'), true, $pass, $fail);
check('0 invalid', ClientInfo::isValidPort('0'), false, $pass, $fail);
check('65536 invalid', ClientInfo::isValidPort('65536'), false, $pass, $fail);
check('-1 invalid', ClientInfo::isValidPort('-1'), false, $pass, $fail);
check('abc invalid', ClientInfo::isValidPort('abc'), false, $pass, $fail);
check('"8 0" invalid', ClientInfo::isValidPort('8 0'), false, $pass, $fail);
check('(empty) invalid', ClientInfo::isValidPort(''), false, $pass, $fail);

echo "\n=== ip() behind proxies ===\n";
$_SERVER = array('HTTP_X_FORWARDED_FOR' => '88.240.10.5, 10.0.0.7, 172.16.0.1', 'REMOTE_ADDR' => '10.0.0.7');
check('XFF chain -> first public', ClientInfo::ip(), '88.240.10.5', $pass, $fail);

$_SERVER = array('HTTP_CF_CONNECTING_IP' => '88.240.10.5', 'REMOTE_ADDR' => '172.68.1.1');
check('Cloudflare CF-Connecting-IP', ClientInfo::ip(), '88.240.10.5', $pass, $fail);

$_SERVER = array('HTTP_X_FORWARDED_FOR' => '10.0.0.7, 192.168.1.5', 'REMOTE_ADDR' => '10.0.0.7');
check('all private -> REMOTE_ADDR fallback', ClientInfo::ip(), '10.0.0.7', $pass, $fail);

$_SERVER = array('REMOTE_ADDR' => '88.240.10.5');
check('plain REMOTE_ADDR', ClientInfo::ip(), '88.240.10.5', $pass, $fail);

$_SERVER = array('HTTP_X_FORWARDED_FOR' => '88.240.10.5:51520');
check('XFF entry carrying a port', ClientInfo::ip(), '88.240.10.5', $pass, $fail);

$_SERVER = array('HTTP_X_REAL_IP' => '88.240.10.5', 'REMOTE_ADDR' => '10.0.0.7');
check('X-Real-IP', ClientInfo::ip(), '88.240.10.5', $pass, $fail);

$_SERVER = array();
check('no server vars -> empty', ClientInfo::ip(), '', $pass, $fail);

echo "\n=== port() ===\n";
$_SERVER = array('HTTP_X_FORWARDED_PORT' => '51520', 'REMOTE_PORT' => '443');
check('X-Forwarded-Port wins', ClientInfo::port(), '51520', $pass, $fail);

$_SERVER = array('HTTP_X_FORWARDED_PORT' => '51520, 443', 'REMOTE_PORT' => '443');
check('X-Forwarded-Port chain', ClientInfo::port(), '51520', $pass, $fail);

$_SERVER = array('HTTP_X_REAL_PORT' => '51520', 'REMOTE_PORT' => '443');
check('X-Real-Port', ClientInfo::port(), '51520', $pass, $fail);

$_SERVER = array('REMOTE_PORT' => '51520');
check('REMOTE_PORT fallback', ClientInfo::port(), '51520', $pass, $fail);

$_SERVER = array('REMOTE_PORT' => '0');
check('invalid REMOTE_PORT -> empty', ClientInfo::port(), '', $pass, $fail);

$_SERVER = array();
check('no port info -> empty', ClientInfo::port(), '', $pass, $fail);

echo "\n=== resolve() ===\n";
$_SERVER = array('HTTP_X_FORWARDED_FOR' => '88.240.10.5', 'HTTP_X_FORWARDED_PORT' => '51520');
$r = ClientInfo::resolve();
check('resolve ip', $r['ip'], '88.240.10.5', $pass, $fail);
check('resolve port', $r['port'], '51520', $pass, $fail);

echo "\n----------------------------------------\n";
printf("PASSED: %d   FAILED: %d\n", $pass, $fail);
exit($fail > 0 ? 1 : 0);
