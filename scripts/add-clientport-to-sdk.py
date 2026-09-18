#!/usr/bin/env python3
"""
Add ClientPort support to every copy of the moka-php SDK, and drop in the
shared Moka\\ClientInfo resolver.

The SDK is vendored into several integrations. All copies hold identical
content, only the line endings differ (CRLF in moka-php and the OpenCart
2.x/3.x bundles, LF in OpenCart 4.x and the PrestaShop bundles), so the
same edit is applied everywhere and the original line ending is restored.

Usage: python3 scripts/add-clientport-to-sdk.py
"""

import os
import sys

ROOT = os.path.dirname(os.path.dirname(os.path.abspath(__file__)))

# SDK roots, relative to the workspace root one level above this repo.
WORKSPACE = os.path.dirname(ROOT)

SDK_DIRS = [
    'moka-php/src',
    'moka-opencart-2.2/system/library/moka-php/src',
    'moka-opencart-2.3/system/library/moka-php/src',
    'moka-opencart-3.x/system/library/moka-php/src',
    'moka-opencart-4.x/moka-php/src',
    'moka-prestashop/classes/moka-php/src',
    'moka-prestashop-8/classes/moka-php/src',
]

MODELS = [
    'Model/CreatePaymentRequest.php',
    'Model/CaptureRequest.php',
    'Model/CancelPaymentRequest.php',
    'Model/CreateMobilePaymentRequest.php',
]

CLIENTINFO_SOURCE = os.path.join(ROOT, 'src', 'ClientInfo.php')


def detect_eol(raw):
    return '\r\n' if b'\r\n' in raw else '\n'


def read(path):
    with open(path, 'rb') as fh:
        raw = fh.read()
    eol = detect_eol(raw)
    return raw.decode('utf-8').replace('\r\n', '\n'), eol


def write(path, text, eol):
    if eol == '\r\n':
        text = text.replace('\n', '\r\n')
    with open(path, 'wb') as fh:
        fh.write(text.encode('utf-8'))


def patch_model(text):
    """Return (new_text, change_count)."""
    changes = 0

    # 1) property
    old_prop = '    protected $clientIp;\n'
    new_prop = (
        '    protected $clientIp;\n'
        '\n'
        '    /**\n'
        '     * @var string\n'
        '     */\n'
        '    protected $clientPort;\n'
    )
    if 'protected $clientPort;' not in text:
        if old_prop not in text:
            raise RuntimeError('clientIp property not found')
        text = text.replace(old_prop, new_prop, 1)
        changes += 1

    # 2) getter / setter, inserted after the setClientIp method
    old_setter = (
        '    public function setClientIp($clientIp)\n'
        '    {\n'
        '        $this->clientIp = $clientIp;\n'
        '    }\n'
    )
    new_setter = old_setter + (
        '\n'
        '    /**\n'
        '     * @return string\n'
        '     */\n'
        '    public function getClientPort()\n'
        '    {\n'
        '        return $this->clientPort;\n'
        '    }\n'
        '\n'
        '    /**\n'
        '     * @param string $clientPort\n'
        '     */\n'
        '    public function setClientPort($clientPort)\n'
        '    {\n'
        '        $this->clientPort = $clientPort;\n'
        '    }\n'
    )
    if 'function getClientPort()' not in text:
        if old_setter not in text:
            raise RuntimeError('setClientIp method not found')
        text = text.replace(old_setter, new_setter, 1)
        changes += 1

    # 3) payload field
    #
    # Two shapes exist in the SDK:
    #   'ClientIP' => $this->getClientIp(),   (followed by more fields)
    #   'ClientIP' => $this->getClientIP()    (last element, no trailing comma)
    #
    # Both are normalised to carry ClientPort after ClientIP.
    if "'ClientPort' =>" not in text:
        trailing = "            'ClientIP' => $this->getClientIp(),\n"
        last = "            'ClientIP' => $this->getClientIP()\n"

        if trailing in text:
            text = text.replace(
                trailing,
                trailing + "            'ClientPort' => $this->getClientPort(),\n",
                1,
            )
        elif last in text:
            text = text.replace(
                last,
                "            'ClientIP' => $this->getClientIP(),\n"
                "            'ClientPort' => $this->getClientPort()\n",
                1,
            )
        else:
            raise RuntimeError('ClientIP payload field not found')

        changes += 1

    return text, changes


def main():
    with open(CLIENTINFO_SOURCE, 'rb') as fh:
        clientinfo_raw = fh.read()
    clientinfo_text = clientinfo_raw.decode('utf-8').replace('\r\n', '\n')

    total_files = 0
    total_changes = 0
    errors = []

    for sdk in SDK_DIRS:
        sdk_path = os.path.join(WORKSPACE, sdk)
        if not os.path.isdir(sdk_path):
            errors.append('missing SDK dir: %s' % sdk)
            continue

        print('=== %s ===' % sdk)

        for model in MODELS:
            path = os.path.join(sdk_path, model)
            if not os.path.isfile(path):
                errors.append('missing model: %s' % path)
                continue
            try:
                text, eol = read(path)
                new_text, changes = patch_model(text)
                if changes:
                    write(path, new_text, eol)
                print('  %-42s +%d  (%s)' % (model, changes, 'CRLF' if eol == '\r\n' else 'LF'))
                total_files += 1
                total_changes += changes
            except Exception as exc:  # noqa: BLE001
                errors.append('%s: %s' % (path, exc))

        # drop in the shared resolver alongside the models
        target = os.path.join(sdk_path, 'ClientInfo.php')
        _, eol = read(os.path.join(sdk_path, MODELS[0]))
        write(target, clientinfo_text, eol)
        print('  %-42s new (%s)' % ('ClientInfo.php', 'CRLF' if eol == '\r\n' else 'LF'))
        total_files += 1

    print('\n----------------------------------------')
    print('files processed : %d' % total_files)
    print('edits applied   : %d' % total_changes)

    if errors:
        print('\nERRORS:')
        for err in errors:
            print('  - %s' % err)
        return 1

    return 0


if __name__ == '__main__':
    sys.exit(main())
