<?php
/**
 * Lightweight hardening — defense-in-depth, not a substitute for a WAF.
 *
 * @package NLign_2026
 */

declare( strict_types=1 );

defined( 'ABSPATH' ) || exit;

// Disable XML-RPC (legacy attack surface; if Jetpack/mobile app is in use, remove this).
add_filter( 'xmlrpc_enabled', '__return_false' );

// Remove the WordPress generator tag from feeds and head.
remove_action( 'wp_head', 'wp_generator' );
add_filter( 'the_generator', '__return_empty_string' );

// Don't expose the WP version in CSS/JS query strings.
add_filter(
	'style_loader_src',
	static function ( string $src ): string {
		return remove_query_arg( 'ver', $src );
	},
	9999
);
add_filter(
	'script_loader_src',
	static function ( string $src ): string {
		return remove_query_arg( 'ver', $src );
	},
	9999
);

// Disable file editing through the dashboard (Appearance → Editor / Plugins → Editor).
if ( ! defined( 'DISALLOW_FILE_EDIT' ) ) {
	define( 'DISALLOW_FILE_EDIT', true );
}

/**
 * Send security headers on the front-end.
 * Note: production hosting should also send these at the edge (Cloudflare / nginx).
 */
add_action(
	'send_headers',
	static function (): void {
		if ( is_admin() ) {
			return;
		}
		header( 'X-Content-Type-Options: nosniff' );
		header( 'Referrer-Policy: strict-origin-when-cross-origin' );
		header( 'Permissions-Policy: geolocation=(), microphone=(), camera=()' );
	}
);
