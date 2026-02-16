# Changelog

All notable changes to this project will be documented in this file.

The format is based on [Keep a Changelog](https://keepachangelog.com/en/1.0.0/),
and this project adheres to [Semantic Versioning](https://semver.org/spec/v2.0.0.html).

---

## [1.2.0] - 2026-02-16

### Added
- **Syndicated content from CDN** — Created `footer-data.json` with all link data (URLs, labels, tooltips)
- **React component now fetches link data** — Fetches `footer-data.json` from CDN and merges with local config
- **True HTML syndication** — Update `footer-data.json`, all React/Lovable sites update automatically
- **Backward compatibility** — Existing v1.1.0 sites continue working with hardcoded defaults

### Changed
- **Lovable integration guide** — Updated to v1.2.0 with syndicated data fetching instructions
- **React component architecture** — Now fetches TWO sources (syndicated data + local config) and merges them
- **Local config is now optional** — Sites can use syndicated data without creating `footer-config.json`

### Documentation
- Updated `lovable-footer-guide.md` with v1.2.0 syndicated data approach
- **Emphasized full syndication** — Documentation now strongly recommends CDN for both CSS and content
- Added prominent callout about full syndication benefits at top of Lovable guide
- Updated README.md Quick Start table to show syndication levels per platform
- Added "Full Syndication (Recommended)" section to README.md
- Updated CDN Syndication section with v1.2.0 URLs and best practices
- Added `footer-data.json` to repository structure
- Updated testing checklist to include CDN data verification
- Added troubleshooting section for syndicated data loading

---

## [1.1.0] - 2026-02-16

### Added
- **Lovable/React configuration system** — `footer-config.json` for per-site customization
- **Tokenized link toggles** — Show/hide individual links (clarity, love2hug, getdashboard, network, terms, privacy, system, help)
- **Tooltip visibility toggle** — `showTooltips` flag to disable hover tooltips (useful for z-index conflicts)
- **Runtime config fetching** — Component fetches config from `/public/footer-config.json` on mount
- **Default fallback config** — Component works without config file (all links shown by default)
- **Example config file** — `footer-config.json` template included in repo

### Changed
- **Lovable integration guide** — Updated with config-based approach and conditional rendering examples
- **Step numbering** — Added Step 2 for config file creation in Lovable guide
- **Architecture documentation** — Added "Implementation Notes" section with verified decisions (simple state management, component location, error handling)
- **Troubleshooting section** — Added common issues and fixes based on real implementation
- **License** — Changed from MIT to Apache 2.0
- **WordPress plugin** — Updated version to 1.1.0 and license header to Apache-2.0
- **README badges** — Added license and version badges

### Documentation
- Updated `lovable-footer-guide.md` with configuration instructions
- Added testing checklist for config validation
- Added example config with all options documented
- Added `LICENSE.md` with full Apache 2.0 license text
- Updated `README.md` with license badges and references

### Notes
- This is an **MVP release** focused on deployment at scale
- Future enhancements (link URL overrides, custom labels, link ordering) tracked in ROADMAP.md
- Config approach allows updates without rebuilding React apps

---

## [1.0.0] - 2026-02-15

### Added
- Initial release of syndicated footer component
- Standard footer HTML (`footer.html`) with 4x4Sys network branding
- Standalone CSS stylesheet (`footer.css`) with BEM naming convention
- WordPress plugin (`hypercart-network-footer.php`) with CDN fallback and caching
- React/Lovable integration guide (`lovable-footer-guide.md`)
- WordPress WPCode integration guide (`wordpress-footer-guide.md`)
- Comprehensive README with quickstart and multi-platform documentation
- Full changelog with semantic versioning strategy
- jsDelivr CDN hosting via GitHub mirrors
- Documentation audit with issue tracking

### Features
- **Dark theme** with lime accent color (#e8fc5a)
- **Network branding** with 4x4Sys and product pills (4x4Clarity, Love2Hug, GetDashboard)
- **Responsive design** (desktop + mobile stacked layout)
- **Hover tooltips** on product pills
- **Namespaced CSS** (.hc-*) to prevent theme conflicts
- **Google Fonts** (DM Mono + Instrument Serif)
- **Semantic links** with trailing slashes for consistency
- **WordPress caching** with transient API and manual purge option
- **CDN fallback** when remote fetch fails
- **Accessible markup** (aria-labels, semantic HTML)

### Documentation
- README.md with platform selection guide
- Lovable integration prompt for React apps
- WordPress WPCode snippets
- Architecture documentation explaining multi-platform approach
- Troubleshooting section for common issues
- Verification checklists for each implementation
- Error handling documentation for CDN failures

### Versions Available
- **@main** — Latest development version (living edge)
- **@v1.0.0** — Stable initial release

### Browser Support
- Chrome/Edge 90+
- Firefox 88+
- Safari 14+
- Mobile browsers (iOS Safari 14+, Chrome Mobile 90+)

### Links
- Internal: `/tos/`, `/privacy/`, `/system/`, `/help/`
- External: 4x4Clarity.com, Love2Hug.com, GetDashboard.com, 4x4Sys.com

### CSS Load Methods
1. Local file: `<link rel="stylesheet" href="footer.css">`
2. jsDelivr CDN: `https://cdn.jsdelivr.net/gh/Hypercart-Dev-Tools/wp-syndicated-footer-poc@main/footer.css`
3. GitHub Raw: `https://raw.githubusercontent.com/Hypercart-Dev-Tools/wp-syndicated-footer-poc/main/footer.css`

### Known Limitations
- Tooltips hidden on mobile (touch devices don't have hover states)
- Designed for bottom-of-page placement (not sticky/fixed)
- CDN caching TTL of 24 hours (versioned URLs recommended for stability)

---

## Future Versions (Planned)

### [1.2.0] - Planned
- [ ] Dark/Light theme toggle
- [ ] Footer region variations (header version, sidebar version)
- [ ] Analytics integration hooks
- [ ] A11y enhancements (ARIA labels, keyboard navigation)

### [2.0.0] - Planned (Breaking)
- [ ] New design refresh
- [ ] CSS-in-JS alternative (for Next.js)
- [ ] Web Components version
- [ ] ShadCN/ui integration

See `ROADMAP.md` for additional enhancement ideas.

---

## Versioning Strategy

### Using the Footer

**For development/testing:**
```
@main — Always latest (may break)
https://cdn.jsdelivr.net/gh/Hypercart-Dev-Tools/wp-syndicated-footer-poc@main/footer.css
```

**For production (recommended):**
```
@v1.0.0 — Stable release
https://cdn.jsdelivr.net/gh/Hypercart-Dev-Tools/wp-syndicated-footer-poc@v1.0.0/footer.css
```

**Breaking Changes Policy:**
- Any change to class names, HTML structure, or link paths increments MAJOR version
- All consuming sites must explicitly update to new `@v*.*.0` tag
- `@main` branch should not be used in production (use version tags instead)

### How We Release

1. **Update files** — Modify footer.html, footer.css, plugin files
2. **Update CHANGELOG.md** — Document changes with date and version
3. **Commit** — `git commit -m "Release v1.0.1: Fix positioning issue"`
4. **Tag** — `git tag v1.0.1` and `git push --tags`
5. **CDN updates** — jsDelivr automatically mirrors the new tag within 24 hours

---

## Migration Guide

### From v0.x (Pre-release) → v1.0.0
No breaking changes (first stable release).

### From v1.0.0 → v1.1.0+ (When Released)
No breaking changes expected. Safe to update.

### From v1.x → v2.0.0+ (When Released)
Breaking changes. See migration section in that version's notes.

