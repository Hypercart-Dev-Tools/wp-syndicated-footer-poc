<?php
/**
 * Plugin Name: Hypercart Network Footer
 * Plugin URI:  https://github.com/Hypercart-Dev-Tools/wp-syndicated-footer-poc
 * Description: Injects the syndicated 4x4Sys network footer across all pages. Loads styles and markup from GitHub CDN for automatic updates.
 * Version:     1.1.0
 * Author:      Hypercart
 * Author URI:  https://hypercart.com
 * License:     Apache-2.0
 * License URI: https://www.apache.org/licenses/LICENSE-2.0
 * Text Domain: hc-footer
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * ── Settings ──
 * Change these constants to control behaviour.
 */
define( 'HC_FOOTER_CSS_URL',  'https://cdn.jsdelivr.net/gh/Hypercart-Dev-Tools/wp-syndicated-footer-poc@main/footer.css' );
define( 'HC_FOOTER_HTML_URL', 'https://cdn.jsdelivr.net/gh/Hypercart-Dev-Tools/wp-syndicated-footer-poc@main/footer.html' );
define( 'HC_FOOTER_CACHE_TTL', 3600 ); // Cache remote HTML for 1 hour (seconds). Set to 0 to disable.

/**
 * ── Enqueue Google Fonts + Footer CSS ──
 */
add_action( 'wp_enqueue_scripts', function () {
    // Google Fonts
    wp_enqueue_style(
        'hc-footer-fonts',
        'https://fonts.googleapis.com/css2?family=DM+Mono:wght@300;400;500&family=Instrument+Serif:ital@0;1&display=swap',
        array(),
        null
    );

    // Footer stylesheet from CDN
    wp_enqueue_style(
        'hc-footer-css',
        HC_FOOTER_CSS_URL,
        array( 'hc-footer-fonts' ),
        null
    );
});

/**
 * ── Render footer markup ──
 * Fetches HTML from GitHub CDN and caches it using the WP transient API.
 */
add_action( 'wp_footer', function () {
    $html = false;

    // Try transient cache first
    if ( HC_FOOTER_CACHE_TTL > 0 ) {
        $html = get_transient( 'hc_footer_html' );
    }

    // Fetch from remote if not cached
    if ( false === $html ) {
        $response = wp_remote_get( HC_FOOTER_HTML_URL, array(
            'timeout' => 5,
        ));

        if ( ! is_wp_error( $response ) && 200 === wp_remote_retrieve_response_code( $response ) ) {
            $html = wp_remote_retrieve_body( $response );

            // Strip any <link> tags from the HTML fragment — we handle CSS via wp_enqueue_style
            $html = preg_replace( '/<link[^>]*>/i', '', $html );

            if ( HC_FOOTER_CACHE_TTL > 0 ) {
                set_transient( 'hc_footer_html', $html, HC_FOOTER_CACHE_TTL );
            }
        }
    }

    // Fallback: inline the footer if remote fetch fails
    if ( empty( $html ) ) {
        $html = hc_footer_fallback_html();
    }

    // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- trusted syndicated HTML
    echo $html;
});

/**
 * ── Fallback HTML ──
 * Baked-in copy in case the CDN is unreachable.
 */
function hc_footer_fallback_html() {
    return '
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
      <a href="https://getdashboard.net" class="hc-footer__product" target="_blank" rel="noopener">
        <span class="hc-tooltip">All orgs, repos, issues &amp; PRs in a single view</span>
        GetDashboard.net <span class="hc-arrow">↗</span>
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
</footer>';
}

/**
 * ── Clear cache on plugin deactivation ──
 */
register_deactivation_hook( __FILE__, function () {
    delete_transient( 'hc_footer_html' );
});

/**
 * ── Admin: Manual cache purge ──
 * Adds a "Purge Footer Cache" link on the Plugins page.
 */
add_filter( 'plugin_action_links_' . plugin_basename( __FILE__ ), function ( $links ) {
    $purge_url = wp_nonce_url(
        admin_url( 'plugins.php?hc_purge_footer=1' ),
        'hc_purge_footer'
    );
    $links[] = '<a href="' . esc_url( $purge_url ) . '">Purge Footer Cache</a>';
    return $links;
});

add_action( 'admin_init', function () {
    if ( isset( $_GET['hc_purge_footer'] ) && check_admin_referer( 'hc_purge_footer' ) ) {
        delete_transient( 'hc_footer_html' );
        add_action( 'admin_notices', function () {
            echo '<div class="notice notice-success is-dismissible"><p><strong>Hypercart Footer:</strong> Cache purged. Fresh HTML will be fetched on next page load.</p></div>';
        });
    }
});
