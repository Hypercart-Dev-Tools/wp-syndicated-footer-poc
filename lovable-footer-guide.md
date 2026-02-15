# Lovable Footer Integration Guide
## For: Hypercart / 4x4Sys Network Footer

---

## Step 1: Add the CSS file to your project

**Option A — Local copy:** Upload `hc-footer.css` to your project's `/public` directory (or `/src/styles/` if you prefer bundled CSS).

**Option B — CDN (recommended for syndication):** Skip the upload and reference the hosted URL directly. Add this to your `index.html` `<head>`:

```html
<link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/Hypercart-Dev-Tools/wp-syndicated-footer-poc@main/footer.css">
```

Source files:
- GitHub: https://github.com/Hypercart-Dev-Tools/wp-syndicated-footer-poc/blob/main/footer.css
- Raw: https://raw.githubusercontent.com/Hypercart-Dev-Tools/wp-syndicated-footer-poc/main/footer.css
- CDN: https://cdn.jsdelivr.net/gh/Hypercart-Dev-Tools/wp-syndicated-footer-poc@main/footer.css

---

## Step 2: Lovable Prompt

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
> **HTML structure for the component's return:**
>
> ```jsx
> <footer className="hc-footer">
>   <div className="hc-footer__inner">
>     <div className="hc-footer__row1">
>       <span className="hc-footer__network-label">4x4Sys Network</span>
>       <a href="https://4x4clarity.com" className="hc-footer__product" target="_blank" rel="noopener">
>         <span className="hc-tooltip">Project clarity in seconds, not hours</span>
>         4x4Clarity <span className="hc-arrow">↗</span>
>       </a>
>       <a href="https://love2hug.com" className="hc-footer__product" target="_blank" rel="noopener">
>         <span className="hc-tooltip">Converts your Lovable code into Huggable code</span>
>         Love2Hug <span className="hc-arrow">↗</span>
>       </a>
>       <a href="https://getdashboard.com" className="hc-footer__product" target="_blank" rel="noopener">
>         <span className="hc-tooltip">All orgs, repos, issues &amp; PRs in a single view</span>
>         GetDashboard <span className="hc-arrow">↗</span>
>       </a>
>     </div>
>     <div className="hc-footer__row2">
>       <div className="hc-footer__copyright">
>         © 2026 <strong>Hypercart</strong> — Part of the <a href="https://4x4sys.com" target="_blank" rel="noopener">4x4Sys.com</a> network
>       </div>
>       <nav className="hc-footer__links" aria-label="Footer navigation">
>         <a href="/tos" className="hc-footer__link">Terms</a>
>         <span className="hc-footer__sep">·</span>
>         <a href="/privacy" className="hc-footer__link">Privacy</a>
>         <span className="hc-footer__sep">·</span>
>         <a href="/system" className="hc-footer__link">System</a>
>         <span className="hc-footer__sep">·</span>
>         <a href="/help" className="hc-footer__link">Help</a>
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

## Step 3: Verify

After Lovable processes the prompt, check:

- [ ] Footer appears at the bottom of every page
- [ ] Fonts load (DM Mono for body text, Instrument Serif italic for "4x4Sys Network")
- [ ] Lime accent line visible at the top of the footer
- [ ] Product pill tooltips appear on hover (desktop)
- [ ] Responsive layout works on mobile (pills and links stack)
- [ ] Internal links (`/tos`, `/privacy`, `/system`, `/help`) use client-side routing (no full reload)

**Note on internal links:** If your app uses `react-router`, you may want Lovable to convert the internal `<a>` tags to `<Link>` components. Add this to your prompt:
> Convert the internal links (Terms, Privacy, System, Help) to react-router `<Link to="...">` components. Keep external links as regular `<a>` tags.
