# Hypercart / 4x4Sys Network Footer
## Syndicated Footer Component - GitHub, React, WordPress

[![License](https://img.shields.io/badge/License-Apache%202.0-blue.svg)](LICENSE.md)
[![Version](https://img.shields.io/badge/version-1.1.0-green.svg)](CHANGELOG.md)

A reusable, themeable footer component for the 4x4Sys network (Hypercart, 4x4Clarity, Love2Hug, GetDashboard). Available in multiple formats for easy integration across different platforms.

**Licensed under [Apache License 2.0](LICENSE.md)** — Free to use, modify, and distribute.

---

## 📋 Quick Start

Choose your implementation method:

| Method | Best For | File | Documentation |
|--------|----------|------|---|
| **HTML + CSS** | Static sites, manual HTML | `footer.html`, `footer.css` | [HTML Setup](#html--css-setup) |
| **React/Lovable** | React apps, Lovable AI | Prompt-based | [Lovable Guide](lovable-footer-guide.md) |
| **WordPress Plugin** | WordPress sites | `hypercart-network-footer.php` | [WordPress Guide](wordpress-footer-guide.md) |
| **CDN (Syndicate)** | External integrations | jsDelivr CDN URL | [CDN Syndication](#cdn-syndication) |

---

## 🏗️ Repository Structure

```
wp-syndicated-footer-poc/
├── README.md                          # This file
├── LICENSE.md                         # Apache 2.0 license
├── CHANGELOG.md                       # Version history & breaking changes
├── ROADMAP.md                         # Future enhancement ideas
├── AUDIT.md                           # Documentation audit report
├── footer.html                        # Plain HTML footer (source markup)
├── footer.css                         # Stylesheet (namespaced .hc-*)
├── footer-config.json                 # Example config for React/Lovable (v1.1.0+)
├── hypercart-network-footer.php       # WordPress plugin w/ CDN fallback
├── lovable-footer-guide.md            # React/Lovable integration prompt
└── wordpress-footer-guide.md          # WordPress WPCode integration steps
```

### Why Multiple Files?

Each implementation is **a view of the same component**. The core design is:

- **footer.html** — canonical HTML structure
- **footer.css** — namespaced styles (`.hc-*` prefix)
- **Platform-specific guides** — integration instructions for each framework

All implementations render **identical visuals** and use the **same CSS class structure**. This repository emphasizes **consistency across platforms** so you can move the footer between projects without redesigning it.

---

## 🔗 HTML + CSS Setup

For static sites or manual integration:

1. **Add to your HTML `<head>`:**
   ```html
   <link rel="preconnect" href="https://fonts.googleapis.com">
   <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
   <link href="https://fonts.googleapis.com/css2?family=DM+Mono:wght@300;400;500&family=Instrument+Serif:ital@0;1&display=swap" rel="stylesheet">
   
   <!-- Local copy or CDN -->
   <link rel="stylesheet" href="footer.css">
   <!-- OR use CDN: <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/Hypercart-Dev-Tools/wp-syndicated-footer-poc@main/footer.css"> -->
   ```

2. **Add to your HTML `<body>` (before closing `</body>`):**
   ```html
   <footer class="hc-footer">
     <!-- Copy the contents from footer.html here -->
   </footer>
   ```

3. **Verify:**
   - Footer appears at bottom of page
   - DM Mono and Instrument Serif fonts load
   - Lime accent line visible at top
   - Links are operational

---

## 🔄 CDN Syndication

For automatic updates across multiple sites, use **jsDelivr** CDN (mirrors GitHub with proper caching):

### CSS URL
```
https://cdn.jsdelivr.net/gh/Hypercart-Dev-Tools/wp-syndicated-footer-poc@main/footer.css
```

### HTML URL
```
https://cdn.jsdelivr.net/gh/Hypercart-Dev-Tools/wp-syndicated-footer-poc@main/footer.html
```

### Versioned URLs (Lock to Specific Release)
```
https://cdn.jsdelivr.net/gh/Hypercart-Dev-Tools/wp-syndicated-footer-poc@v1.0.0/footer.css
https://cdn.jsdelivr.net/gh/Hypercart-Dev-Tools/wp-syndicated-footer-poc@v1.0.0/footer.html
```

**Advantages:**
- Single update point (edit files here, all sites get new version automatically)
- CDN caching for performance
- Version control with semver tags

**Drawbacks:**
- All consuming sites must use `@main` or `@v*` branch locks
- Breaking changes affect all sites simultaneously if using `@main`

---

## 🎨 Component Details

### Styling
- **Namespace:** All classes prefixed with `.hc-` to prevent collisions
- **CSS Framework:** Standalone CSS (no Tailwind, no Bootstrap)
- **Fonts:** DM Mono (body), Instrument Serif italic (network label)
- **Color Scheme:** Dark theme with lime accent (`#e8fc5a`)
- **Responsive:** Mobile stacked layout at `768px` breakpoint

### Class Structure (BEM)
```
hc-footer                    // Footer container
├── hc-footer__inner         // Content wrapper
├── hc-footer__row1          // Product pills section
│  ├── hc-footer__network-label
│  ├── hc-footer__product    // Product pill
│  ├── hc-footer__arrow      // External link indicator
│  └── hc-tooltip            // Hover tooltip
└── hc-footer__row2          // Links section
   ├── hc-footer__copyright
   ├── hc-footer__links
   ├── hc-footer__link
   └── hc-footer__sep        // Separator (·)
```

### Links
- **External Links:** Open in new tab (`target="_blank" rel="noopener"`)
- **Internal Links:** `/tos/`, `/privacy/`, `/system/`, `/help/` (with trailing slashes)
- **All links are consistent across implementations**

---

## 📱 Responsive Behavior

### Desktop (≥769px)
- Horizontal product pill layout
- Row 1: Network label + product pills
- Row 2: Copyright + footer links (flex row)
- Tooltips visible on hover

### Mobile (<768px)
- Tooltips hidden (no hover on touch screens)
- Vertical stacking (links wrap as needed)
- Padding reduced for narrower screens
- Product pills smaller but fully functional

---

## 🔍 Verification Checklist

After implementation, verify:

- [ ] Footer appears at bottom of every page
- [ ] Fonts load correctly (DM Mono for body, Instrument Serif italic for "4x4Sys Network")
- [ ] Lime accent line visible at top of footer
- [ ] All external links (4x4Clarity, Love2Hug, GetDashboard, network link) open in new tab
- [ ] Internal links (Terms, Privacy, System, Help) navigate correctly
- [ ] Product pill tooltips appear on desktop hover
- [ ] Mobile layout is responsive (pills and links stack properly on phones)
- [ ] No CSS conflicts with existing theme/styles (`.hc-` namespace ensures isolation)
- [ ] Internal links use client-side routing if applicable (no full page reload)

---

## ⚙️ Error Handling & Troubleshooting

### CDN Unreachable (JavaScript/WordPress)
- **Status:** Both the React and WordPress implementations include fallback HTML
- **Result:** Footer still renders from hardcoded markup if CDN is offline
- **Testing:** Disable internet or block `cdn.jsdelivr.net` to verify fallback
- **Monitoring:** Check `console.warn()` (React) or WordPress error logs (PHP)

### Font Loading Issues
- **Common cause:** Network privacy settings or CDN blocking
- **Fallback:** `font-family` includes fallback stack (monospace → system fonts)
- **Check:** Open DevTools → Network tab → filter `fonts.googleapis.com`

### Link Routing Issues
- **React:** If using `react-router`, the Lovable guide can convert `<a>` → `<Link>` components
- **WordPress:** Standard `<a>` tags work with client-side routing plugins
- **Testing:** Open NetworkJavaScript console → click each internal link and watch for full page reload (should not occur if properly routed)

### Duplicate Footers in WordPress
- **Issue:** Theme might have its own footer
- **Fix:** Hide with CSS in WPCode: `.site-footer:not(.hc-footer) { display: none !important; }`

### CSS Not Loading (Static HTML)
- **Verify:** `<link rel="stylesheet" href="footer.css">` points to correct path
- **Check:** DevTools → Network tab → CSS file loads with status 200
- **CDN:** Try CDN URL instead of local: `https://cdn.jsdelivr.net/gh/Hypercart-Dev-Tools/wp-syndicated-footer-poc@main/footer.css`

---

## 📚 Implementation Guides

- **[Lovable/React Guide](lovable-footer-guide.md)** — Step-by-step prompt for AI-assisted React component generation (includes config-based customization)
- **[WordPress Guide](wordpress-footer-guide.md)** — WPCode snippets for WordPress sites
- **[HTML/CSS Only](#html--css-setup)** — Manual integration for static sites

---

## ⚙️ Configuration (React/Lovable v1.1.0+)

The React/Lovable implementation supports per-site customization via `public/footer-config.json`:

```json
{
  "showTooltips": true,
  "links": {
    "clarity": true,
    "love2hug": true,
    "getdashboard": true,
    "network": true,
    "terms": true,
    "privacy": true,
    "system": false,
    "help": false
  }
}
```

**Features:**
- **Toggle individual links** — Hide links not needed on specific sites
- **Disable tooltips** — Set `showTooltips: false` to work around z-index conflicts
- **Runtime updates** — Change config without rebuilding the React app
- **Graceful fallback** — Component works without config file (all links shown by default)

**Example use cases:**
- Hide "System" and "Help" links on marketing sites
- Disable tooltips if they conflict with existing UI elements
- Show only product pills on landing pages

See [Lovable Guide](lovable-footer-guide.md) for full configuration documentation.

**Future enhancements** (see [ROADMAP.md](ROADMAP.md)):
- Link URL/label overrides
- Custom link additions
- Theme color customization

---

## 🔄 Versioning & Updates

This footer follows **semantic versioning**:

- **MAJOR** (v2.0.0) — Breaking changes (class names, HTML structure, link paths)
- **MINOR** (v1.1.0) — New features (new product pill, new link), backward compatible
- **PATCH** (v1.0.1) — Bug fixes (CSS tweaks, font rendering improvements)

### How to Update

- **@main:** Always pulls latest (living edge, may have breaking changes)
- **@v1.0.0:** Locks to specific version (stable, predictable)
- **Local copies:** Manually update or switch to CDN for automatic updates

See [CHANGELOG.md](CHANGELOG.md) for detailed version history.

---

## 🤝 Contributing & Support

### Reporting Issues
Found a bug or design inconsistency? Please open a GitHub issue with:
1. Current implementation method (HTML, React, WordPress)
2. Browser/version
3. Screenshot or error log
4. Steps to reproduce

### Updating the Footer
To modify the footer:
1. Edit `footer.html` (structure) or `footer.css` (styles)
2. Update version in `hypercart-network-footer.php` header
3. Add entry to `CHANGELOG.md`
4. Create a git tag: `git tag v1.0.1`
5. Push to trigger CDN cache clear

### Local Testing
```bash
# Static site testing
open footer.html

# WordPress plugin testing
1. Copy hypercart-network-footer.php into wp-content/plugins/
2. Activate in WordPress admin
3. View site → footer should appear

# React/Lovable testing
Copy the prompt from lovable-footer-guide.md into Lovable interface
```

---

## 📄 License

**Apache License 2.0**

Copyright 2026 Hypercart / 4x4Sys Network

Licensed under the Apache License, Version 2.0 (the "License");
you may not use this file except in compliance with the License.
You may obtain a copy of the License at:

    http://www.apache.org/licenses/LICENSE-2.0

Unless required by applicable law or agreed to in writing, software
distributed under the License is distributed on an "AS IS" BASIS,
WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
See the License for the specific language governing permissions and
limitations under the License.

**TL;DR:** Free to use, modify, and distribute in personal or commercial projects. See [LICENSE.md](LICENSE.md) for full terms.

---

## 🔗 Links

- **GitHub:** https://github.com/Hypercart-Dev-Tools/wp-syndicated-footer-poc
- **jsDelivr CDN:** https://cdn.jsdelivr.net/gh/Hypercart-Dev-Tools/wp-syndicated-footer-poc@main/
- **Issues:** https://github.com/Hypercart-Dev-Tools/wp-syndicated-footer-poc/issues
- **License:** [Apache 2.0](LICENSE.md)
- **Main Site:** https://hypercart.com

