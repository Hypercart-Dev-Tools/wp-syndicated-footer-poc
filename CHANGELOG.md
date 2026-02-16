# Changelog

All notable changes to this project will be documented in this file.

The format is based on [Keep a Changelog](https://keepachangelog.com/en/1.0.0/),
and this project adheres to [Semantic Versioning](https://semver.org/spec/v2.0.0.html).

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

### [1.1.0] - Planned
- [ ] Dark/Light theme toggle
- [ ] Customizable product pills (via data attributes)
- [ ] Footer region variations (header version, sidebar version)
- [ ] Analytics integration hooks
- [ ] A11y enhancements (ARIA labels, keyboard navigation)

### [2.0.0] - Planned (Breaking)
- [ ] New design refresh
- [ ] CSS-in-JS alternative (for Next.js)
- [ ] Web Components version
- [ ] ShadCN/ui integration

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

