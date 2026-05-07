# NLign 2026 — custom WordPress theme

Custom theme for **nlign.com** rebuild. Built from supplied Adobe Illustrator
mockups; **no page builders** (no Elementor, no Divi, no WPBakery). Modular
section architecture, ACF Pro for editable content, Inter variable font,
dark-mode design system, SCSS + Vite build pipeline, WCAG-aware,
performance-tuned.

> Author: GlobalizeMe (hosting / web development / support).
> UI/UX design: supplied by an external creative agency.

---

## Requirements

| Tool        | Version           | Notes                                                                      |
|-------------|-------------------|----------------------------------------------------------------------------|
| WordPress   | **6.4 +**         | Tested against 6.6.                                                        |
| PHP         | **8.1 +**         | Uses `declare(strict_types=1)`, named arguments, readonly, enums-friendly. |
| Node        | **18.18 +**       | For Vite build pipeline.                                                   |
| ACF Pro     | latest            | **Required.** A dashboard notice will warn if it isn't active.             |
| WebP plugin | EWWW / ShortPixel | Optional but recommended; theme images use WP-native srcset + lazy.        |

---

## Install (one-time)

```bash
# 1. Drop the folder into the WP install
cp -R nlign-2026 /path/to/wp-content/themes/

# 2. Install JS deps and build the assets
cd /path/to/wp-content/themes/nlign-2026
npm install
npm run build       # production
# or
npm run dev         # local dev with HMR on http://localhost:5173

# 3. Activate the theme
wp theme activate nlign-2026
```

After activation:
1. **Install ACF Pro** if not already active. Field groups in `/acf-json` will sync automatically.
2. Go to **Settings → Reading → Your homepage displays → A static page** and pick the page you want to be the homepage. The theme uses `front-page.php` for the homepage automatically.
3. Edit that page → ACF panels appear: Hero, The Reality, The Solution, Trusted By, The Impact, Closing CTA. Fill in.
4. **Appearance → Menus** — assign menus to the registered locations:
   - Primary header menu
   - Footer columns: Platform / Solutions / Industries / Company / Resources
   - Footer — Legal (privacy, terms)
5. **Site Options** (left admin sidebar) — set the global header CTA.

---

## File map

```
nlign-2026/
├── style.css                       # theme metadata only — no styles here
├── functions.php                   # bootstrap; loads /inc modules in order
├── header.php                      # site header markup
├── footer.php                      # site footer markup
├── front-page.php                  # homepage — calls section partials
├── index.php                       # fallback template
├── inc/
│   ├── setup.php                   # after_setup_theme: title-tag, image sizes, menus
│   ├── enqueue.php                 # CSS/JS via Vite manifest, font preload, defer
│   ├── acf.php                     # ACF JSON path, options page, missing-plugin notice
│   ├── security.php                # disable XML-RPC, hide WP version, security headers
│   ├── performance.php             # disable emojis, lazy-load iframes, resource hints
│   ├── helpers.php                 # nlign_section, nlign_image, nlign_button, nlign_field
│   └── navigation.php              # primary nav walker (BEM classes, accessible)
├── template-parts/
│   └── sections/
│       ├── hero.php                # ACF: group_homepage_hero
│       ├── reality.php             # ACF: group_homepage_reality
│       ├── solution.php            # ACF: group_homepage_solution
│       ├── trusted-by.php          # ACF: group_homepage_trusted_by
│       ├── impact.php              # ACF: group_homepage_impact
│       └── cta-bar.php             # ACF: group_homepage_cta
├── assets/
│   ├── scss/
│   │   ├── main.scss               # entry — compile order: tokens → base → components → layout → sections
│   │   ├── abstracts/              # tokens, breakpoints, mixins
│   │   ├── base/                   # reset, typography, global utilities
│   │   ├── components/             # buttons, eyebrow, metric
│   │   ├── layout/                 # header, footer
│   │   └── sections/               # hero, reality, solution, trusted-by, impact, cta-bar
│   ├── js/
│   │   ├── main.js                 # entry; imports SCSS so Vite emits a sibling stylesheet
│   │   └── modules/                # header, solution-tabs, reveal
│   ├── fonts/                      # Inter variable fonts (woff2)
│   ├── images/                     # NLign brand SVG marks
│   └── dist/                       # build output (gitignored)
├── acf-json/                       # field-group definitions; commit these to git
├── languages/                      # gettext .po/.mo (empty for now)
├── package.json                    # vite + sass
├── vite.config.js                  # outputs to /assets/dist with manifest.json
├── .editorconfig
├── .gitignore
└── README.md                       # this file
```

---

## Design system

### Brand palette (from supplied SVG logos)

| Token              | Value      | Usage                                            |
|--------------------|------------|--------------------------------------------------|
| `$nlign-orange`    | `#f3491b`  | Primary CTA, accent text, focus ring             |
| `$nlign-sage`      | `#84978e`  | Secondary CTA (Book Demo), neutral logo colour   |
| `$nlign-bg`        | `#0b0c0d`  | Page background                                  |
| `$nlign-bg-elevated` | `#131517` | Section bands (Solution, CTA bar, Trusted by)   |
| `$nlign-text`      | `#ffffff`  | Headings                                         |
| `$nlign-text-muted`| `#c7cad0`  | Body                                             |
| `$nlign-text-faint`| `#8a8e96`  | Captions, footer links                           |

Colours live in `assets/scss/abstracts/_tokens.scss`. **Do not hardcode hex values in component files.**

### Typography

**Inter variable** is self-hosted in `/assets/fonts/` and preloaded in
`<head>` so first paint is the brand font. A fallback metric override
(`Inter Fallback`) reduces CLS while it's loading.

Type scale is fluid via `clamp()` — see `_tokens.scss`. Headings shrink
linearly between mobile (320 px) and the mockup width (1440 px); never
write fixed `font-size` in pixels in components.

### Breakpoints (mobile-first)

| Token     | min-width | Range          | Mental model            |
|-----------|-----------|----------------|-------------------------|
| `mobile`  | 0         | 0–599          | handset                 |
| `tablet`  | 600 px    | 600–899        | small tablet portrait   |
| `laptop`  | 900 px    | 900–1199       | small laptop / large tablet landscape |
| `desktop` | 1200 px   | 1200–1535      | mockup target           |
| `xl`      | 1536 px   | 1536+          | large desktop           |

Use `@include bp.up(<name>)`, never the SCSS map directly.

---

## Adding a new homepage section

1. **Markup** — `template-parts/sections/<slug>.php`. Pull data via `nlign_field()`.
2. **Style** — `assets/scss/sections/_<slug>.scss`, `@use` from `main.scss`.
3. **Data** — drop a `group_homepage_<slug>.json` into `/acf-json`. WP will pick it up.
4. **Wire it** — add `nlign_section( '<slug>' )` in `front-page.php` at the desired position.

That's it — no other file changes required.

---

## Adding a new full template (e.g. /case-studies/)

1. Create `templates/case-studies.php` with the `Template Name:` doc-block.
2. Reuse template-parts via `get_template_part()` or `nlign_section()`.
3. Add an ACF location rule pointing at the new template.
4. (Optional) Register a CPT in `inc/post-types.php` and `require_once` it in `functions.php`'s module list.

---

## Performance posture

Out of the box this theme:

- Preloads the variable font (`woff2`, `crossorigin`) — first text paint is Inter.
- Defers all theme JS via `wp_enqueue_script(..., [ 'strategy' => 'defer' ])`.
- Emits `<script type="module">` so Vite's modern output runs natively (no transpile down to ES5).
- Disables core emoji JS/CSS (~14 KB saved per page).
- Removes jQuery Migrate from front-end.
- Strips the WP version tag and `?ver=` cache-buster from asset URLs.
- Sets sensible security headers (`X-Content-Type-Options`, `Referrer-Policy`, `Permissions-Policy`).
- Lazy-loads images via core (`loading="lazy"`) and iframes via filter.
- Uses `<picture>`-grade `srcset`/`sizes` through `wp_get_attachment_image()` — pair with EWWW/ShortPixel for WebP delivery.

Targets:
- **LCP < 2.5 s** on a fast 4G connection (mobile) for the hero.
- **CLS < 0.05** — fluid type, font-display: swap with metric-matched fallback, fixed-height image containers via `aspect-ratio`.
- **INP < 200 ms** — no main-thread JS at startup beyond the small `main.js` (deferred).

---

## Accessibility posture

- Skip link as the first focusable element (`.skip-link`).
- Header sticky bar respects `prefers-reduced-motion`.
- Mobile drawer manages focus and closes on `Escape`.
- Solution tabs implement the WAI-ARIA Tabs pattern (arrow keys, Home/End).
- All buttons / links have a 2 px focus-visible ring.
- Decorative hero/dashboard images are `aria-hidden="true"`.
- All decorative icons are `aria-hidden`; semantic icons have visible labels.
- Colour contrast meets WCAG AA at component level — verify with axe before launch.

---

## Build & deploy

```bash
npm run build         # /assets/dist/main.[hash].css + main.[hash].js + manifest.json
```

Production deploys should ship `/assets/dist/` and `/acf-json/` alongside the
PHP/SCSS/JS sources. The Vite manifest is what `inc/enqueue.php` reads to
resolve hashed asset URLs — without it, the theme falls back to legacy paths.

For continuous deployment:

1. CI runs `npm ci && npm run build`.
2. Artifact ships the whole theme directory (including `assets/dist`).
3. ACF JSON is part of the artifact; importing fields is automatic on activation.

---

## Roadmap (post-MVP)

- [ ] **Block editor patterns** — register block patterns mirroring section ACF groups so editors can compose custom pages with the same look.
- [ ] **Custom post types** — `case_study`, `publication`, `event` — driven by the same template-part system.
- [ ] **Dark/light toggle** — already token-driven; would need a second token map and a `data-theme` switcher.
- [ ] **i18n pass** — wrap any remaining hardcoded strings; ship `.pot` template.
- [ ] **Visual regression tests** — Playwright + Percy or equivalent against the supplied mockup.

---

## Author

Built by **GlobalizeMe** (hosting, web development, support).
UI/UX design supplied by external creative agency.

© NLign Analytics. Proprietary.
