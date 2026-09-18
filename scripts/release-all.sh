#!/usr/bin/env bash
#
# Commit, tag and push the ClientIP / ClientPort change for every Moka
# integration repository that needed it.
#
# Run from the workspace root:  bash moka-php/scripts/release-all.sh
#
# Author identity is fixed to fatihtoprakk as requested.
# The script is idempotent: a repository that already carries the tag is
# skipped, so a failed run can simply be repeated.

set -u

WORKSPACE="$(cd "$(dirname "$0")/../.." && pwd)"
AUTHOR_NAME="fatihtoprakk"
AUTHOR_EMAIL="fatihtoprakk@gmail.com"

COMMON_BODY="TCMB regulation makes ClientIP and ClientPort mandatory on every
PaymentDealerRequest. ClientPort was missing from every integration, and
the IP was taken from a stored order value or a platform helper that can
resolve to a proxy or private address.

- ClientIP is now read from the live connection with proxy / CDN header
  support (CF-Connecting-IP, True-Client-IP, X-Real-IP, X-Forwarded-For
  chains). Private and reserved ranges are skipped because Moka rejects
  them with ClientIpAddressIsRestricted.
- ClientPort is new, read from X-Forwarded-Port, X-Real-Port,
  X-Client-Port and finally REMOTE_PORT, validated as digits only
  between 1 and 65535.
- No fixed or random filler value is ever sent: Moka monitors for those
  and can suspend payments.
- The documentation range 2001:db8::/32 is accepted, because PHP flags
  it as reserved while the Moka guide lists it as valid.
- Code keeps its existing PHP version target."

# repo|tag|subject|extra body
REPOS=(
  "moka-php|1.2|v1.2 - ClientIP & ClientPort support|Adds Moka\\ClientInfo, a shared resolver for the end user public IP and source port, plus ClientPort on the CreatePayment, Capture, CancelPayment and CreateMobilePayment request models."
  "moka-opencart-3.x|1.1|v1.1 - ClientIP & ClientPort support|Checkout now resolves ClientIP and ClientPort from the live connection through Moka\\ClientInfo. The bundled moka-php SDK gained ClientPort support."
  "moka-opencart-2.3|1.1|v1.1 - ClientIP & ClientPort support|Checkout now resolves ClientIP and ClientPort from the live connection through Moka\\ClientInfo. The bundled moka-php SDK gained ClientPort support."
  "moka-opencart-2.2|1.1|v1.1 - ClientIP & ClientPort support|Checkout now resolves ClientIP and ClientPort from the live connection through Moka\\ClientInfo. The bundled moka-php SDK gained ClientPort support."
  "moka-opencart-4.x|1.0|v1.0 - ClientIP & ClientPort support|Checkout now resolves ClientIP and ClientPort from the live connection through Moka\\ClientInfo. The bundled moka-php SDK gained ClientPort support."
  "moka-prestashop|1.0.1|v1.0.1 - ClientIP & ClientPort support|Checkout now resolves ClientIP and ClientPort from the live connection through Moka\\ClientInfo. The bundled moka-php SDK gained ClientPort support."
  "moka-prestashop-8|1.0.1|v1.0.1 - ClientIP & ClientPort support|Checkout now resolves ClientIP and ClientPort from the live connection through Moka\\ClientInfo. The bundled moka-php SDK gained ClientPort support."
  "moka-magento|0.1.5|v0.1.5 - ClientIP & ClientPort support|get_ip() was rewritten to walk proxy headers correctly and to stop returning the hardcoded fallback 11.22.33.44, which Moka monitors for and rejects. Adds get_port() and sends ClientPort."
  "moka-api-tests|1.0|v1.0 - ClientIP & ClientPort support|Test payment payloads now send a valid public ClientIP instead of the rejected private 192.168.1.116, plus the required ClientPort. Requires moka/moka-php ^1.2."
)

failures=()

for entry in "${REPOS[@]}"; do
  IFS='|' read -r repo tag subject extra <<< "$entry"

  echo "=============================================================="
  echo "### $repo  ->  $tag"

  if [ ! -d "$WORKSPACE/$repo/.git" ]; then
    echo "  SKIP: not a git repository"
    failures+=("$repo: missing repo")
    continue
  fi

  cd "$WORKSPACE/$repo" || { failures+=("$repo: cd failed"); continue; }

  if git rev-parse "$tag" >/dev/null 2>&1; then
    echo "  tag $tag already exists, skipping"
    continue
  fi

  if [ -z "$(git status --porcelain)" ]; then
    echo "  SKIP: working tree clean, nothing to commit"
    continue
  fi

  git add -A || { failures+=("$repo: add failed"); continue; }

  git -c user.name="$AUTHOR_NAME" -c user.email="$AUTHOR_EMAIL" \
    commit -q -m "$subject" -m "$extra" -m "$COMMON_BODY" \
    || { failures+=("$repo: commit failed"); continue; }

  if ! git -c user.name="$AUTHOR_NAME" -c user.email="$AUTHOR_EMAIL" \
      tag -a "$tag" -m "$subject"; then
    failures+=("$repo: tag failed")
    continue
  fi

  if git push origin HEAD >/dev/null 2>&1 && git push origin "$tag" >/dev/null 2>&1; then
    echo "  pushed commit + tag $tag"
  else
    failures+=("$repo: push failed")
    continue
  fi

  echo "  OK: $(git log -1 --format='%h %an <%ae>')"
done

echo "=============================================================="
if [ ${#failures[@]} -eq 0 ]; then
  echo "ALL REPOSITORIES RELEASED"
  exit 0
fi

echo "FAILURES:"
for f in "${failures[@]}"; do
  echo "  - $f"
done
exit 1
