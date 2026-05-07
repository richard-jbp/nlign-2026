# Preview (GitHub Pages source)

This directory is served as **GitHub Pages** for the `nlign-2026` theme. It is
**generated** — do not edit `dist/main.css` or anything inside `fonts/` by hand.

To rebuild locally:

```bash
npm run build
cp "$(ls -t assets/dist/main.*.css | head -1)" docs/dist/main.css
sed -i '' 's|../fonts/|fonts/|g' docs/dist/main.css   # macOS
cp assets/fonts/*.woff2 docs/fonts/
```

The GitHub Actions workflow at `.github/workflows/build-preview.yml` does this
automatically on every push to `main`.
