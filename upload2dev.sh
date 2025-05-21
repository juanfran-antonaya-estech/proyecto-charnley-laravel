# Save current branch name
current_branch=$(git rev-parse --abbrev-ref HEAD)
# Checkout dev
git checkout dev
# Merge current branch into dev
git merge "$current_branch"
# Push dev
git push
# Return to original branch
git checkout "$current_branch"
