#!/usr/bin/env bash
#
# Create the GitHub releases for the ClientIP / ClientPort rollout.
#
# Run from the workspace root:  bash moka-php/scripts/make-releases.sh
# Safe to re-run: a release that already exists is skipped.

set -u

WORKSPACE="$(cd "$(dirname "$0")/../.." && pwd)"
NOTES="$WORKSPACE/moka-php/scripts/release-notes.md"

REPOS=(
  "moka-php|1.2|1.2 - ClientIP & ClientPort support"
  "moka-opencart-3.x|1.1|1.1 - ClientIP & ClientPort support"
  "moka-opencart-2.3|1.1|1.1 - ClientIP & ClientPort support"
  "moka-opencart-2.2|1.1|1.1 - ClientIP & ClientPort support"
  "moka-opencart-4.x|1.0|1.0 - ClientIP & ClientPort support"
  "moka-prestashop|1.0.1|1.0.1 - ClientIP & ClientPort support"
  "moka-prestashop-8|1.0.1|1.0.1 - ClientIP & ClientPort support"
  "moka-magento|0.1.5|0.1.5 - ClientIP & ClientPort support"
  "moka-api-tests|1.0|1.0 - ClientIP & ClientPort support"
)

failures=()

for entry in "${REPOS[@]}"; do
  IFS='|' read -r repo tag title <<< "$entry"

  echo "### $repo -> $tag"

  if gh release view "$tag" --repo "optimisthub/$repo" >/dev/null 2>&1; then
    echo "  release already exists, skipping"
    continue
  fi

  if gh release create "$tag" \
      --repo "optimisthub/$repo" \
      --title "$title" \
      --notes-file "$NOTES" >/dev/null 2>&1; then
    echo "  release created"
  else
    failures+=("$repo: release create failed")
  fi
done

echo "=============================================================="
if [ ${#failures[@]} -eq 0 ]; then
  echo "ALL RELEASES CREATED"
  exit 0
fi

echo "FAILURES:"
for f in "${failures[@]}"; do
  echo "  - $f"
done
exit 1
