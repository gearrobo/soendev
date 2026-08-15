#!/bin/bash

set -e

echo "======================================"
echo "       SOENDEV GIT DEPLOY"
echo "======================================"

echo ""
echo "[1/4] Git status"
git status

echo ""
echo "[2/4] Add changes"
git add .

echo ""
echo "[3/4] Commit"
read -p "Commit message: " MESSAGE

if [ -z "$MESSAGE" ]; then
    echo "Commit message tidak boleh kosong."
    exit 1
fi

git commit -m "$MESSAGE" || echo "Tidak ada perubahan baru."

echo ""
echo "[4/4] Push to GitHub"
git push origin main

echo ""
echo "======================================"
echo "       PUSH SUCCESSFUL"
echo "======================================"

git log -1 --oneline
