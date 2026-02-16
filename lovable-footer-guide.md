# Lovable Footer Integration Guide
## For: Hypercart / 4x4Sys Network Footer

**Status:** v1.2.0
**Last Updated:** 2026-02-16

---

## Step 1: Add the CSS file to your project

**Option A — Local copy:** Upload `footer.css` to your project's `/public` directory (or `/src/styles/` if you prefer bundled CSS).

**Option B — CDN (recommended for syndication):** Skip the upload and reference the hosted URL directly. Add this to your `index.html` `<head>`:

```html
<link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/Hypercart-Dev-Tools/wp-syndicated-footer-poc@main/footer.css">
```

Source files:
- GitHub: https://github.com/Hypercart-Dev-Tools/wp-syndicated-footer-poc/blob/main/footer.css
- Raw: https://raw.githubusercontent.com/Hypercart-Dev-Tools/wp-syndicated-footer-poc/main/footer.css
- CDN: https://cdn.jsdelivr.net/gh/Hypercart-Dev-Tools/wp-syndicated-footer-poc@main/footer.css

---

## Step 2: Create the footer configuration file (Optional)

**NEW in v1.2.0:** Footer content (URLs, labels, tooltips) is now syndicated from CDN! The local config file is now **optional** and only needed for customization.

If you want to customize which links are shown, create `public/footer-config.json` in your Lovable project:

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
    "system": true,
    "help": true
  }
}
```

**Configuration options:**
- `showTooltips` — Set to `false` to hide all hover tooltips (useful for z-index conflicts)
- `links.*` — Set any link to `false` to hide it from the footer

**How it works (v1.2.0+):**
1. Component fetches `footer-data.json` from CDN (link URLs, labels, tooltips)
2. Component fetches local `footer-config.json` (visibility overrides)
3. Merges both configs
4. Falls back to hardcoded defaults if fetches fail

**Example:** Hide tooltips and remove System/Help links:
```json
{
  "showTooltips": false,
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

---

## Step 3: Lovable Prompt

Paste this prompt into Lovable:

---

**Prompt:**

> Create a reusable `<HcFooter />` React component at `src/components/HcFooter.tsx` that renders the 4x4Sys network footer. This footer should appear on every page of the app, pinned to the bottom of the page content (not fixed/sticky — it should sit below all page content).
>
> **Font imports:** Add these Google Fonts to `index.html`:
> ```
> <link rel="preconnect" href="https://fonts.googleapis.com">
> <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
> <link href="https://fonts.googleapis.com/css2?family=DM+Mono:wght@300;400;500&family=Instrument+Serif:ital@0;1&display=swap" rel="stylesheet">
> ```
>
> **CSS:** Import the footer styles. Either use a local copy or link the CDN version in `index.html`:
> ```html
> <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/Hypercart-Dev-Tools/wp-syndicated-footer-poc@main/footer.css">
> ```
> Do not use Tailwind for this component — it uses its own namespaced BEM styles prefixed with `hc-`.
>
> **Configuration (v1.2.0 - Syndicated Data):** The component should fetch TWO config files on mount:
>
> 1. **Syndicated link data** from CDN (URLs, labels, tooltips):
>    ```
>    https://cdn.jsdelivr.net/gh/Hypercart-Dev-Tools/wp-syndicated-footer-poc@main/footer-data.json
>    ```
>
> 2. **Local visibility config** (optional) from `/footer-config.json` (which links to show/hide)
>
> Use React hooks (useState, useEffect) to fetch both configs and merge them. The merge strategy:
> - `footer-data.json` provides the link data (URLs, labels, tooltips)
> - `footer-config.json` provides visibility overrides (which links to show)
> - If either fetch fails, use hardcoded defaults
>
> **Default link data (fallback if CDN fetch fails):**
> ```js
> const defaultData = {
>   products: {
>     clarity: { label: "4x4Clarity", url: "https://4x4clarity.com", tooltip: "Project clarity in seconds, not hours" },
>     love2hug: { label: "Love2Hug", url: "https://love2hug.com", tooltip: "Converts your Lovable code into Huggable code" },
>     getdashboard: { label: "GetDashboard", url: "https://getdashboard.com", tooltip: "All orgs, repos, issues & PRs in a single view" }
>   },
>   footer: {
>     copyright: { year: "2026", company: "Hypercart" },
>     links: {
>       terms: { label: "Terms", url: "/tos/" },
>       privacy: { label: "Privacy", url: "/privacy/" },
>       system: { label: "System", url: "/system/" },
>       help: { label: "Help", url: "/help/" }
>     }
>   },
>   network: { label: "4x4Sys Network", url: "https://4x4sys.com" }
> };
> ```
>
> **Default visibility config (fallback if local config missing):**
> ```js
> const defaultConfig = {
>   showTooltips: true,
>   links: {
>     clarity: true,
>     love2hug: true,
>     getdashboard: true,
>     network: true,
>     terms: true,
>     privacy: true,
>     system: true,
>     help: true
>   }
> };
> ```
>
> **HTML structure for the component's return (with conditional rendering using syndicated data):**
>
> ```jsx
> <footer className="hc-footer">
>   <div className="hc-footer__inner">
>     <div className="hc-footer__row1">
>       <span className="hc-footer__network-label">{data.network.label}</span>
>       {config.links.clarity && (
>         <a href={data.products.clarity.url} className="hc-footer__product" target="_blank" rel="noopener">
>           {config.showTooltips && <span className="hc-tooltip">{data.products.clarity.tooltip}</span>}
>           {data.products.clarity.label} <span className="hc-arrow">↗</span>
>         </a>
>       )}
>       {config.links.love2hug && (
>         <a href={data.products.love2hug.url} className="hc-footer__product" target="_blank" rel="noopener">
>           {config.showTooltips && <span className="hc-tooltip">{data.products.love2hug.tooltip}</span>}
>           {data.products.love2hug.label} <span className="hc-arrow">↗</span>
>         </a>
>       )}
>       {config.links.getdashboard && (
>         <a href={data.products.getdashboard.url} className="hc-footer__product" target="_blank" rel="noopener">
>           {config.showTooltips && <span className="hc-tooltip">{data.products.getdashboard.tooltip}</span>}
>           {data.products.getdashboard.label} <span className="hc-arrow">↗</span>
>         </a>
>       )}
>     </div>
>     <div className="hc-footer__row2">
>       <div className="hc-footer__copyright">
>         © {data.footer.copyright.year} <strong>{data.footer.copyright.company}</strong> — Part of the {config.links.network && <a href={data.network.url} target="_blank" rel="noopener">{data.network.url.replace('https://', '')}</a>} network
>       </div>
>       <nav className="hc-footer__links" aria-label="Footer navigation">
>         {config.links.terms && <a href={data.footer.links.terms.url} className="hc-footer__link">{data.footer.links.terms.label}</a>}
>         {config.links.terms && config.links.privacy && <span className="hc-footer__sep">·</span>}
>         {config.links.privacy && <a href={data.footer.links.privacy.url} className="hc-footer__link">{data.footer.links.privacy.label}</a>}
>         {config.links.privacy && config.links.system && <span className="hc-footer__sep">·</span>}
>         {config.links.system && <a href={data.footer.links.system.url} className="hc-footer__link">{data.footer.links.system.label}</a>}
>         {config.links.system && config.links.help && <span className="hc-footer__sep">·</span>}
>         {config.links.help && <a href={data.footer.links.help.url} className="hc-footer__link">{data.footer.links.help.label}</a>}
>       </nav>
>     </div>
>   </div>
> </footer>
> ```
>
> **Note:** The `data` object comes from the merged syndicated `footer-data.json` and defaults. The `config` object comes from the merged local `footer-config.json` and defaults.
>
> **Placement:** Add `<HcFooter />` to the bottom of the main app layout so it appears on every page. If using react-router with a layout wrapper, place it after the `<Outlet />`. Do not place it inside any scrollable container — it should be a direct child of the outermost layout flex column.
>
> **Important:** Do not modify the class names or structure. Do not convert the CSS to Tailwind. This is a syndicated component that must stay in sync with the source styles.

---

## Step 4: Verify

After Lovable processes the prompt, check:

- [ ] Footer appears at the bottom of every page
- [ ] Fonts load (DM Mono for body text, Instrument Serif italic for "4x4Sys Network")
- [ ] Lime accent line visible at the top of the footer
- [ ] Product pill tooltips appear on hover (desktop) — or hidden if `showTooltips: false`
- [ ] Responsive layout works on mobile (pills and links stack)
- [ ] Internal links (`/tos/`, `/privacy/`, `/system/`, `/help/`) use client-side routing (no full reload)
- [ ] Click each link and watch the network tab — should show no full page reload for internal links
- [ ] Config is loaded from `/footer-config.json` on component mount
- [ ] Links hidden in config don't appear in the footer
- [ ] **Separators render intelligently** — Only appear between visible links (no orphan separators)

**Testing the syndicated data (v1.2.0+):**
1. Open browser DevTools → Network tab
2. Reload the page
3. Verify `footer-data.json` is fetched from CDN (should see request to `cdn.jsdelivr.net`)
4. Verify `footer-config.json` is fetched from local `/public` (or 404 if not present — that's OK, defaults will be used)
5. Check that link URLs, labels, and tooltips match the syndicated data
6. Try setting `"system": false` and `"help": false` in local config — those links should disappear
7. Try setting `"showTooltips": false` — hover tooltips should not appear
8. **Test separator logic**: Hide middle links (e.g., `"privacy": false`) and verify separators adjust correctly
9. **Test fallback**: Temporarily break the CDN URL in the code and verify hardcoded defaults are used

**Note on internal links:** If your app uses `react-router`, you may want Lovable to convert the internal `<a>` tags to `<Link>` components. Add this to your prompt:
> Convert the internal links (Terms, Privacy, System, Help) to react-router `<Link to="...">` components. Keep external links as regular `<a>` tags.

---

## Implementation Notes

### Architecture Decisions (Based on Verified Implementation)

**✅ Simple State Management**
- Uses `useState` + `useEffect` for data/config loading
- No Zustand store needed (footer is simple, self-contained)
- No service layer abstraction (direct fetch in component)
- **v1.2.0+**: Fetches TWO sources (syndicated data + local config) and merges them

**✅ Component Location**
- Place at `src/components/HcFooter.tsx` (not in `/ui/` subdirectory)
- Keep as standalone component (not embedded in layout components)

**✅ Error Handling**
- Simple try/catch with fallback to default data/config
- No complex `AppError` or `Result<T>` patterns needed
- Silent failure with defaults (footer should never break the page)
- **v1.2.0+**: If CDN fetch fails, use hardcoded defaults; if local config missing, show all links

**✅ Placement Strategy**
- Add to `src/pages/Index.tsx` (landing page) first
- Optionally add to other pages (Admin, NotFound, etc.)
- Place after main content, before closing layout tags

**✅ Separator Rendering**
- Use conditional logic to only show separators between visible links
- Example: `{config.links.terms && config.links.privacy && <span>·</span>}`
- Prevents orphan separators when links are hidden

### Files Created in Verified Implementation
- `src/components/HcFooter.tsx` — Main component
- `public/footer-config.json` — Local visibility configuration (optional in v1.2.0+)
- `index.html` — Updated with fonts + CSS CDN link

### Syndicated Resources (v1.2.0+)
- **footer-data.json** — Fetched from CDN, contains all link URLs/labels/tooltips
- **footer.css** — Fetched from CDN, contains all styles
- **Backward compatible** — Existing v1.1.0 sites continue working with hardcoded defaults

### Optional Enhancements
- [ ] Convert internal links to React Router `<Link>` components
- [ ] Add footer to additional pages beyond Index
- [ ] Create Supabase edge function for CSS caching (if using Supabase)

---

## Troubleshooting

### Syndicated Data Not Loading (v1.2.0+)
- **Check**: DevTools → Network tab → `footer-data.json` should be fetched from `cdn.jsdelivr.net`
- **Fix**: Verify CDN URL is correct in component code
- **Fallback**: Component should use hardcoded defaults if CDN fetch fails

### Config Not Loading
- **Check**: DevTools → Network tab → `footer-config.json` should return 200 (or 404 if not present)
- **Fix**: Verify file is in `public/` directory (not `src/`)
- **Fallback**: Component should still render with all links visible (v1.2.0+ uses syndicated data)

### Separators Not Rendering Correctly
- **Issue**: Orphan separators appear when links are hidden
- **Fix**: Ensure conditional logic checks both adjacent links before rendering separator
- **Example**: `{config.links.privacy && config.links.system && <span>·</span>}`

### Tooltips Overlapping Other UI
- **Quick fix**: Set `"showTooltips": false` in config
- **Long-term**: Debug z-index conflicts in your app's CSS

### Footer Not Appearing
- **Check**: Component imported and rendered in page component
- **Check**: CSS loaded in `index.html` (verify in DevTools → Network)
- **Check**: No layout container hiding overflow or clipping footer

---

## Reference Implementation

This guide is based on a **verified, human-tested implementation** completed on 2026-02-16.

### What Was Implemented

**v1.2.0 (Current):**
- ✅ Added syndicated `footer-data.json` from CDN (link URLs, labels, tooltips)
- ✅ Component now fetches and merges syndicated data with local config
- ✅ Backward compatible with v1.1.0 (hardcoded defaults as fallback)
- ✅ True content syndication (update JSON, all sites update)

**v1.1.0:**
- ✅ Created `HcFooter.tsx` component with BEM-namespaced styles (`hc-*` prefix)
- ✅ Added Google Fonts (DM Mono, Instrument Serif) to `index.html`
- ✅ Added footer CSS CDN link to `index.html`
- ✅ Integrated footer into landing page (`Index.tsx`)
- ✅ Created `public/footer-config.json` for link visibility control
- ✅ Added config loading with `useState`/`useEffect` in `HcFooter.tsx`
- ✅ Implemented conditional rendering for links and tooltips
- ✅ Implemented intelligent separator rendering (only between visible links)

### Files You'll Create
- `src/components/HcFooter.tsx` — Main footer component
- `public/footer-config.json` — Configuration file

### Files You'll Modify
- `index.html` — Add fonts + CSS CDN link
- `src/pages/Index.tsx` — Import and render `<HcFooter />`
- `CHANGELOG.md` — Document your implementation (optional)

### Next Steps After Implementation
1. ✅ Test footer rendering (verify checklist in Step 4)
2. ✅ **v1.2.0**: Test syndicated data loading: Check Network tab for `footer-data.json` fetch from CDN
3. ✅ Test config loading: Check Network tab for `footer-config.json` fetch (or 404 if not present)
4. ✅ Test link hiding: Set `"system": false` in config, verify link disappears
5. ✅ Test tooltip toggle: Set `"showTooltips": false`, verify tooltips hidden
6. ✅ **v1.2.0**: Verify link data comes from syndicated source (check labels/URLs match `footer-data.json`)
7. ⏭️ Optional: Convert internal links to React Router `<Link>` components
8. ⏭️ Optional: Add footer to other pages (Admin, NotFound, etc.)

---

## Version History

- **v1.2.0** (2026-02-16) — Added syndicated content from CDN (`footer-data.json` with link URLs/labels/tooltips)
- **v1.1.0** (2026-02-16) — Added config-based customization (link toggles, tooltip control)
- **v1.0.0** (2026-02-15) — Initial release with static footer component

See [CHANGELOG.md](CHANGELOG.md) for full version history and [ROADMAP.md](ROADMAP.md) for future enhancements.
