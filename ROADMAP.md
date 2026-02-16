# Roadmap

Future enhancements and feature ideas for the Hypercart / 4x4Sys Network Footer.

---

## Phase 1: MVP ✅ (Completed v1.1.0)

- [x] Tokenized link toggles (show/hide individual links)
- [x] Tooltip visibility toggle
- [x] Runtime config fetching from `footer-config.json`
- [x] Default fallback config

**Goal:** Deploy at scale across multiple sites with basic customization.

---

## Phase 2: Enhanced Customization (Future)

### Link Overrides
Allow sites to customize individual links beyond just show/hide:

```json
{
  "links": {
    "clarity": { "show": true },
    "love2hug": { "show": false },
    "getdashboard": { "show": true },
    "network": { "show": true, "url": "https://custom-network.com" },
    "terms": { "show": true, "url": "/legal/terms/" },
    "privacy": { "show": true },
    "system": { "show": false },
    "help": { "show": true, "label": "Support", "url": "https://support.example.com" }
  }
}
```

**Benefits:**
- Custom URLs for internal vs external links
- Rebrand labels per site
- Override tooltip text
- More flexible per-site configuration

**Considerations:**
- Maintain defaults for all fields
- Validate config schema
- Document all override options

---

### Link Ordering
Allow sites to reorder links in the footer:

```json
{
  "linkOrder": ["help", "system", "privacy", "terms"]
}
```

**Benefits:**
- Prioritize important links per site
- Match existing site navigation patterns

**Considerations:**
- Keep default order sensible
- Handle missing/invalid link IDs gracefully

---

### Custom Links
Allow sites to add new links not in the default set:

```json
{
  "customLinks": [
    {
      "label": "Blog",
      "url": "/blog/",
      "position": "after-privacy"
    },
    {
      "label": "Contact",
      "url": "/contact/",
      "position": "end"
    }
  ]
}
```

**Benefits:**
- Add site-specific links without forking the component
- Maintain consistency while allowing flexibility

**Considerations:**
- Define clear positioning options
- Maintain visual consistency
- Limit number of custom links to prevent bloat

---

## Phase 3: Styling & Theming (Future)

### Color Overrides
Allow sites to customize colors while maintaining structure:

```json
{
  "theme": {
    "accentColor": "#00ff00",
    "backgroundColor": "#1a1a1a",
    "textColor": "#ffffff"
  }
}
```

**Benefits:**
- Match site branding
- Maintain accessibility (contrast ratios)

**Considerations:**
- Validate color formats
- Ensure WCAG AA compliance
- Provide color contrast warnings

---

### Font Overrides
Allow sites to use custom fonts:

```json
{
  "fonts": {
    "body": "Inter, sans-serif",
    "heading": "Playfair Display, serif"
  }
}
```

**Benefits:**
- Match existing site typography
- Reduce font loading overhead if site already uses different fonts

**Considerations:**
- Ensure fonts are loaded before footer renders
- Provide fallback fonts

---

## Phase 4: Advanced Features (Future)

### Analytics Integration
Add hooks for tracking link clicks:

```json
{
  "analytics": {
    "enabled": true,
    "provider": "gtag",
    "trackingId": "G-XXXXXXXXXX"
  }
}
```

**Benefits:**
- Track footer engagement
- Measure link performance
- A/B test link variations

---

### A11y Enhancements
- Keyboard navigation improvements
- Screen reader optimizations
- Focus management
- High contrast mode support

---

### Performance Optimizations
- Lazy load config (defer until footer in viewport)
- Preconnect to external domains
- Optimize font loading strategy
- Reduce CSS bundle size

---

## Phase 5: Platform Expansion (Future)

### WordPress Config UI
Add admin panel for WordPress plugin to configure links without editing JSON:

- Visual toggle switches for each link
- Tooltip enable/disable
- Link URL overrides
- Preview before saving

---

### Vue/Svelte/Angular Versions
Create framework-specific implementations:

- Vue 3 component
- Svelte component
- Angular component
- Maintain config compatibility across all versions

---

### Web Components Version
Build a framework-agnostic web component:

```html
<hc-footer config-url="/footer-config.json"></hc-footer>
```

**Benefits:**
- Works in any framework
- Shadow DOM isolation
- No build step required

---

## Non-Goals

These are explicitly **out of scope** to maintain simplicity:

- ❌ Sticky/fixed positioning (footer should sit at bottom of content)
- ❌ Multiple footer variants on same page
- ❌ Dynamic content fetching (footer should be static)
- ❌ User-generated content in footer
- ❌ Complex animations or transitions
- ❌ Social media feeds or widgets

---

## Contributing Ideas

Have a feature idea? Open an issue on GitHub with:
- **Use case:** Why is this needed?
- **Proposed solution:** How should it work?
- **Alternatives considered:** What other approaches did you think about?
- **Impact:** How many sites would benefit?

---

## Version Planning

- **v1.1.x** — Bug fixes and minor improvements
- **v1.2.0** — Link overrides (URL, label, tooltip)
- **v1.3.0** — Custom links support
- **v2.0.0** — Breaking changes (theming, new design)
