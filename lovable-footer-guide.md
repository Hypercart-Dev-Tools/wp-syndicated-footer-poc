# Lovable Footer Integration Guide
## For: Hypercart / 4x4Sys Network Footer

**Status:** v1.1.0
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

## Step 2: Create the footer configuration file

Create `public/footer-config.json` in your Lovable project:

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
> **Configuration:** The component should fetch `/footer-config.json` on mount to determine which links to show and whether to display tooltips. Use React hooks (useState, useEffect) to fetch the config. If the fetch fails, use these defaults:
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
> **HTML structure for the component's return (with conditional rendering):**
>
> ```jsx
> <footer className="hc-footer">
>   <div className="hc-footer__inner">
>     <div className="hc-footer__row1">
>       <span className="hc-footer__network-label">4x4Sys Network</span>
>       {config.links.clarity && (
>         <a href="https://4x4clarity.com" className="hc-footer__product" target="_blank" rel="noopener">
>           {config.showTooltips && <span className="hc-tooltip">Project clarity in seconds, not hours</span>}
>           4x4Clarity <span className="hc-arrow">↗</span>
>         </a>
>       )}
>       {config.links.love2hug && (
>         <a href="https://love2hug.com" className="hc-footer__product" target="_blank" rel="noopener">
>           {config.showTooltips && <span className="hc-tooltip">Converts your Lovable code into Huggable code</span>}
>           Love2Hug <span className="hc-arrow">↗</span>
>         </a>
>       )}
>       {config.links.getdashboard && (
>         <a href="https://getdashboard.com" className="hc-footer__product" target="_blank" rel="noopener">
>           {config.showTooltips && <span className="hc-tooltip">All orgs, repos, issues &amp; PRs in a single view</span>}
>           GetDashboard <span className="hc-arrow">↗</span>
>         </a>
>       )}
>     </div>
>     <div className="hc-footer__row2">
>       <div className="hc-footer__copyright">
>         © 2026 <strong>Hypercart</strong> — Part of the {config.links.network && <a href="https://4x4sys.com" target="_blank" rel="noopener">4x4Sys.com</a>} network
>       </div>
>       <nav className="hc-footer__links" aria-label="Footer navigation">
>         {config.links.terms && <a href="/tos/" className="hc-footer__link">Terms</a>}
>         {config.links.terms && config.links.privacy && <span className="hc-footer__sep">·</span>}
>         {config.links.privacy && <a href="/privacy/" className="hc-footer__link">Privacy</a>}
>         {config.links.privacy && config.links.system && <span className="hc-footer__sep">·</span>}
>         {config.links.system && <a href="/system/" className="hc-footer__link">System</a>}
>         {config.links.system && config.links.help && <span className="hc-footer__sep">·</span>}
>         {config.links.help && <a href="/help/" className="hc-footer__link">Help</a>}
>       </nav>
>     </div>
>   </div>
> </footer>
> ```
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

**Testing the config:**
1. Open browser DevTools → Network tab
2. Reload the page
3. Verify `footer-config.json` is fetched successfully (200 status)
4. Try setting `"system": false` and `"help": false` in the config — those links should disappear
5. Try setting `"showTooltips": false` — hover tooltips should not appear
6. **Test separator logic**: Hide middle links (e.g., `"privacy": false`) and verify separators adjust correctly

**Note on internal links:** If your app uses `react-router`, you may want Lovable to convert the internal `<a>` tags to `<Link>` components. Add this to your prompt:
> Convert the internal links (Terms, Privacy, System, Help) to react-router `<Link to="...">` components. Keep external links as regular `<a>` tags.

---

## Implementation Notes

### Architecture Decisions (Based on Verified Implementation)

**✅ Simple State Management**
- Uses `useState` + `useEffect` for config loading
- No Zustand store needed (footer is simple, self-contained)
- No service layer abstraction (direct fetch in component)

**✅ Component Location**
- Place at `src/components/HcFooter.tsx` (not in `/ui/` subdirectory)
- Keep as standalone component (not embedded in layout components)

**✅ Error Handling**
- Simple try/catch with fallback to default config
- No complex `AppError` or `Result<T>` patterns needed
- Silent failure with defaults (footer should never break the page)

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
- `public/footer-config.json` — Configuration file
- `index.html` — Updated with fonts + CSS CDN link

### Optional Enhancements
- [ ] Convert internal links to React Router `<Link>` components
- [ ] Add footer to additional pages beyond Index
- [ ] Create Supabase edge function for CSS caching (if using Supabase)

---

## Troubleshooting

### Config Not Loading
- **Check**: DevTools → Network tab → `footer-config.json` should return 200
- **Fix**: Verify file is in `public/` directory (not `src/`)
- **Fallback**: Component should still render with all links visible

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

### What Was Implemented (v1.1.0)
- ✅ Created `HcFooter.tsx` component with BEM-namespaced styles (`hc-*` prefix)
- ✅ Added Google Fonts (DM Mono, Instrument Serif) to `index.html`
- ✅ Added footer CSS CDN link to `index.html`
- ✅ Integrated footer into landing page (`Index.tsx`)
- ✅ Created `public/footer-config.json` for link visibility control
- ✅ Added config loading with `useState`/`useEffect` in `HcFooter.tsx`
- ✅ Implemented conditional rendering for links and tooltips
- ✅ Implemented intelligent separator rendering (only between visible links)
- ✅ Updated `CHANGELOG.md` with v1.1.0 release notes

### Files You'll Create
- `src/components/HcFooter.tsx` — Main footer component
- `public/footer-config.json` — Configuration file

### Files You'll Modify
- `index.html` — Add fonts + CSS CDN link
- `src/pages/Index.tsx` — Import and render `<HcFooter />`
- `CHANGELOG.md` — Document your implementation (optional)

### Next Steps After Implementation
1. ✅ Test footer rendering (verify checklist in Step 4)
2. ✅ Test config loading: Check Network tab for `footer-config.json` fetch
3. ✅ Test link hiding: Set `"system": false` in config, verify link disappears
4. ✅ Test tooltip toggle: Set `"showTooltips": false`, verify tooltips hidden
5. ⏭️ Optional: Convert internal links to React Router `<Link>` components
6. ⏭️ Optional: Add footer to other pages (Admin, NotFound, etc.)

---

## Version History

- **v1.1.0** (2026-02-16) — Added config-based customization (link toggles, tooltip control)
- **v1.0.0** (2026-02-15) — Initial release with static footer component

See [CHANGELOG.md](CHANGELOG.md) for full version history and [ROADMAP.md](ROADMAP.md) for future enhancements.
