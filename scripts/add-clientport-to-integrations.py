#!/usr/bin/env python3
"""
Wire ClientIP + ClientPort resolution into every SDK based integration.

Each integration previously sent only ClientIP, taken from a stored order
record or from the platform remote address helper:

    OpenCart   : $request->setClientIp($order_info['ip']);
    PrestaShop : $clientIp = Tools::getRemoteAddr();

Neither carries a port, and the stored value can be a proxy or private
address. Both are replaced with Moka\\ClientInfo, which reads the live
connection (proxy / CDN aware) and returns a public IP plus the source
port required by the TCMB regulation.

Usage: python3 scripts/add-clientport-to-integrations.py
"""

import os
import sys

ROOT = os.path.dirname(os.path.dirname(os.path.abspath(__file__)))
WORKSPACE = os.path.dirname(ROOT)

OPEN_CART = [
    'moka-opencart-2.2/catalog/controller/payment/moka.php',
    'moka-opencart-2.3/catalog/controller/extension/payment/moka.php',
    'moka-opencart-3.x/catalog/controller/extension/payment/moka.php',
    'moka-opencart-4.x/catalog/controller/payment/moka.php',
]

PRESTASHOP = [
    'moka-prestashop/controllers/front/checkout.php',
    'moka-prestashop-8/controllers/front/checkout.php',
]

OPEN_CART_OLD = "            $request->setClientIp($order_info['ip']);\n"
OPEN_CART_NEW = (
    "            $clientInfo = \\Moka\\ClientInfo::resolve();\n"
    "            $clientIp = $clientInfo['ip'];\n"
    "\n"
    "            // Prefer the public address from the live connection, but fall back\n"
    "            // to the stored order IP when the request itself carries only a\n"
    "            // private address (for example an unconfigured reverse proxy).\n"
    "            if (!\\Moka\\ClientInfo::isPublicIp($clientIp) && \\Moka\\ClientInfo::isPublicIp($order_info['ip'])) {\n"
    "                $clientIp = $order_info['ip'];\n"
    "            }\n"
    "\n"
    "            $request->setClientIp($clientIp);\n"
    "            $request->setClientPort($clientInfo['port']);\n"
)

PS_IP_OLD = "            $clientIp = Tools::getRemoteAddr();\n"
PS_IP_NEW = (
    "            $clientInfo = \\Moka\\ClientInfo::resolve();\n"
    "            $clientIp = $clientInfo['ip'];\n"
    "\n"
    "            // Prefer the public address from the live connection, but fall back\n"
    "            // to the PrestaShop helper when the request carries only a private\n"
    "            // address (for example an unconfigured reverse proxy).\n"
    "            if (!\\Moka\\ClientInfo::isPublicIp($clientIp) && \\Moka\\ClientInfo::isPublicIp(Tools::getRemoteAddr())) {\n"
    "                $clientIp = Tools::getRemoteAddr();\n"
    "            }\n"
)

PS_SET_OLD = "            $request->setClientIp($clientIp);\n"
PS_SET_NEW = (
    "            $request->setClientIp($clientIp);\n"
    "            $request->setClientPort($clientInfo['port']);\n"
)


def detect_eol(raw):
    return '\r\n' if b'\r\n' in raw else '\n'


def read(path):
    with open(path, 'rb') as fh:
        raw = fh.read()
    return raw.decode('utf-8').replace('\r\n', '\n'), detect_eol(raw)


def write(path, text, eol):
    if eol == '\r\n':
        text = text.replace('\n', '\r\n')
    with open(path, 'wb') as fh:
        fh.write(text.encode('utf-8'))


def main():
    errors = []
    changed = 0

    targets = [(p, 'opencart') for p in OPEN_CART] + [(p, 'prestashop') for p in PRESTASHOP]

    for rel, kind in targets:
        path = os.path.join(WORKSPACE, rel)
        if not os.path.isfile(path):
            errors.append('missing file: %s' % rel)
            continue

        text, eol = read(path)

        if kind == 'opencart':
            if 'setClientPort' in text:
                print('  %-58s already done' % rel)
                continue
            if OPEN_CART_OLD not in text:
                errors.append('%s: setClientIp($order_info[\'ip\']) not found' % rel)
                continue
            text = text.replace(OPEN_CART_OLD, OPEN_CART_NEW, 1)
        else:
            if 'setClientPort' in text:
                print('  %-58s already done' % rel)
                continue
            if PS_IP_OLD not in text or PS_SET_OLD not in text:
                errors.append('%s: PrestaShop anchors not found' % rel)
                continue
            text = text.replace(PS_IP_OLD, PS_IP_NEW, 1)
            text = text.replace(PS_SET_OLD, PS_SET_NEW, 1)

        write(path, text, eol)
        print('  %-58s patched (%s)' % (rel, 'CRLF' if eol == '\r\n' else 'LF'))
        changed += 1

    print('\n----------------------------------------')
    print('files changed : %d' % changed)

    if errors:
        print('\nERRORS:')
        for err in errors:
            print('  - %s' % err)
        return 1

    return 0


if __name__ == '__main__':
    sys.exit(main())
