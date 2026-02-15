# WordPress Footer Integration Guide
## For: Hypercart / 4x4Sys Network Footer
## Using: WPCode (or WP Code Snippets)

---

## Option A: Single Snippet (Recommended)

Create **one snippet** that injects both the CSS and the HTML.

### WPCode Settings

| Setting          | Value                          |
|------------------|--------------------------------|
| **Snippet Type** | Universal Snippet (HTML)       |
| **Location**     | Site Wide Footer               |
| **Insert Method**| Auto Insert                    |
| **Priority**     | 10 (default is fine)           |
| **Device**       | Any Device                     |
| **Status**       | Active                         |

### Snippet Code

```html
<!-- 4x4Sys Network Footer :: Syndicated Component -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=DM+Mono:wght@300;400;500&family=Instrument+Serif:ital@0;1&display=swap" rel="stylesheet">

<style>
/* ── Hypercart Footer (hc- namespace) ── */
:root{--hc-bg:#0c0c0e;--hc-surface:#16161a;--hc-border:#2a2a30;--hc-text:#a8a8b0;--hc-text-muted:#5c5c66;--hc-accent:#e8fc5a;--hc-white:#eeeef0}
.hc-footer{background:var(--hc-bg);color:var(--hc-text);font-family:'DM Mono',monospace;font-size:12px;line-height:1.4;position:relative;overflow:hidden}
.hc-footer::before{content:'';position:absolute;top:0;left:0;right:0;height:1px;background:linear-gradient(90deg,var(--hc-accent),var(--hc-accent) 25%,transparent 100%)}
.hc-footer__inner{max-width:1200px;margin:0 auto;padding:20px 32px;display:flex;flex-direction:column;gap:14px}
.hc-footer__row1{display:flex;align-items:center;gap:10px;flex-wrap:wrap}
.hc-footer__network-label{font-family:'Instrument Serif',serif;font-style:italic;font-size:15px;color:var(--hc-white);letter-spacing:-0.01em;margin-right:6px;white-space:nowrap}
.hc-footer__product{position:relative;display:inline-flex;align-items:center;gap:6px;text-decoration:none;color:var(--hc-text);font-size:11px;padding:5px 14px;border-radius:100px;border:1px solid var(--hc-border);background:var(--hc-surface);transition:all .25s ease;white-space:nowrap}
.hc-footer__product:hover{color:var(--hc-white);border-color:rgba(232,252,90,.3);box-shadow:0 0 12px rgba(232,252,90,.06)}
.hc-footer__product:hover .hc-arrow{transform:translate(2px,-2px)}
.hc-arrow{font-size:9px;color:var(--hc-accent);transition:transform .2s ease;display:inline-block}
.hc-footer__product .hc-tooltip{position:absolute;bottom:calc(100% + 8px);left:50%;transform:translateX(-50%) translateY(4px);background:var(--hc-surface);border:1px solid var(--hc-border);color:var(--hc-text);font-size:10px;padding:6px 12px;border-radius:6px;white-space:nowrap;opacity:0;pointer-events:none;transition:all .2s ease;z-index:10}
.hc-footer__product .hc-tooltip::after{content:'';position:absolute;top:100%;left:50%;transform:translateX(-50%);border:4px solid transparent;border-top-color:var(--hc-border)}
.hc-footer__product:hover .hc-tooltip{opacity:1;transform:translateX(-50%) translateY(0)}
.hc-footer__row2{display:flex;align-items:center;justify-content:space-between;flex-wrap:wrap;gap:8px;padding-top:12px;border-top:1px solid var(--hc-border)}
.hc-footer__copyright{color:var(--hc-text-muted);font-size:11px}
.hc-footer__copyright strong{color:var(--hc-text);font-weight:500}
.hc-footer__copyright a{color:var(--hc-text);text-decoration:none;transition:color .2s}
.hc-footer__copyright a:hover{color:var(--hc-white)}
.hc-footer__links{display:flex;align-items:center;gap:4px}
.hc-footer__link{color:var(--hc-text-muted);text-decoration:none;font-size:11px;padding:3px 10px;border-radius:100px;transition:all .2s ease}
.hc-footer__link:hover{color:var(--hc-white);background:var(--hc-surface)}
.hc-footer__sep{color:var(--hc-border);font-size:8px;user-select:none}
@media(max-width:768px){.hc-footer__inner{padding:16px;gap:12px}.hc-footer__row1{gap:6px}.hc-footer__product{font-size:10px;padding:4px 10px}.hc-footer__row2{flex-direction:column;align-items:flex-start;gap:10px}.hc-footer__network-label{font-size:13px}.hc-footer__product .hc-tooltip{display:none}}
</style>

<footer class="hc-footer">
  <div class="hc-footer__inner">
    <div class="hc-footer__row1">
      <span class="hc-footer__network-label">4x4Sys Network</span>
      <a href="https://4x4clarity.com" class="hc-footer__product" target="_blank" rel="noopener">
        <span class="hc-tooltip">Project clarity in seconds, not hours</span>
        4x4Clarity <span class="hc-arrow">↗</span>
      </a>
      <a href="https://love2hug.com" class="hc-footer__product" target="_blank" rel="noopener">
        <span class="hc-tooltip">Converts your Lovable code into Huggable code</span>
        Love2Hug <span class="hc-arrow">↗</span>
      </a>
      <a href="https://getdashboard.com" class="hc-footer__product" target="_blank" rel="noopener">
        <span class="hc-tooltip">All orgs, repos, issues &amp; PRs in a single view</span>
        GetDashboard <span class="hc-arrow">↗</span>
      </a>
    </div>
    <div class="hc-footer__row2">
      <div class="hc-footer__copyright">
        &copy; 2026 <strong>Hypercart</strong> &mdash; Part of the <a href="https://4x4sys.com" target="_blank" rel="noopener">4x4Sys.com</a> network
      </div>
      <nav class="hc-footer__links" aria-label="Footer navigation">
        <a href="/tos/" class="hc-footer__link">Terms</a>
        <span class="hc-footer__sep">&middot;</span>
        <a href="/privacy/" class="hc-footer__link">Privacy</a>
        <span class="hc-footer__sep">&middot;</span>
        <a href="/system" class="hc-footer__link">System</a>
        <span class="hc-footer__sep">&middot;</span>
        <a href="/help/" class="hc-footer__link">Help</a>
      </nav>
    </div>
  </div>
</footer>
```

---

## Option B: GitHub Syndicated (Future-proof)

Once your footer CSS is hosted on GitHub, replace the inline `<style>` block with:

```html
<link rel="stylesheet" href="https://raw.githubusercontent.com/Hypercart-Dev-Tools/wp-syndicated-footer-poc/main/footer.css">
```

For production CDN delivery, use jsDelivr which mirrors GitHub with proper caching:

```html
<link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/Hypercart-Dev-Tools/wp-syndicated-footer-poc@main/footer.css">
```

Source files:
- GitHub: https://github.com/Hypercart-Dev-Tools/wp-syndicated-footer-poc/blob/main/footer.html
- Raw HTML: https://raw.githubusercontent.com/Hypercart-Dev-Tools/wp-syndicated-footer-poc/main/footer.html
- Raw CSS: https://raw.githubusercontent.com/Hypercart-Dev-Tools/wp-syndicated-footer-poc/main/footer.css
- CDN CSS: https://cdn.jsdelivr.net/gh/Hypercart-Dev-Tools/wp-syndicated-footer-poc@main/footer.css

---

## Theme Conflict Notes

- All classes are `hc-` namespaced — no collisions with WP themes
- The footer sets its own `font-family` — won't inherit theme fonts
- If your theme has a native footer, you may want to **hide it** with an additional snippet:

```html
<!-- Optional: Hide theme's default footer -->
<style>
  /* Adjust selector to match your theme's footer */
  footer:not(.hc-footer),
  .site-footer:not(.hc-footer) {
    display: none !important;
  }
</style>
```

Add this as a separate WPCode snippet (Type: Universal, Location: Site Wide Header).

---

## Verification Checklist

- [ ] Footer renders below all page content
- [ ] No font conflicts with theme (DM Mono + Instrument Serif load)
- [ ] Tooltips work on desktop hover
- [ ] Mobile layout stacks correctly
- [ ] Links open correctly (external = new tab, internal = same tab)
- [ ] No duplicate footers (theme footer hidden if needed)
