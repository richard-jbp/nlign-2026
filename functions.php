<?php
/**
 * NLign 2026 — theme bootstrap.
 *
 * Loads modular concerns from /inc. Each file is a single responsibility
 * so it can be unit-tested or swapped without touching the others.
 *
 * @package NLign_2026
 */

declare( strict_types=1 );

defined( 'ABSPATH' ) || exit;

/**
 * Theme constants. Use these everywhere instead of hard-coded strings.
 */
define( 'NLIGN_VERSION',    wp_get_theme()->get( 'Version' ) );
define( 'NLIGN_TEXTDOMAIN', 'nlign-2026' );
define( 'NLIGN_PATH',       trailingslashit( get_template_directory() ) );
define( 'NLIGN_URL',        trailingslashit( get_template_directory_uri() ) );

/**
 * Modular includes.
 *
 * Order matters: setup → enqueue → ACF → security → performance → helpers.
 */
$modules = [
	'setup',        // after_setup_theme: title-tag, post-thumbnails, image sizes, menus
	'enqueue',      // styles, scripts, fonts, preload hints
	'acf',          // ACF JSON path, options page, dynamic field choices
	'security',     // disable XML-RPC, hide WP version, harden REST
	'performance',  // disable emojis, defer JS, dns-prefetch, preconnect
	'helpers',      // template helpers (e.g. nlign_image, nlign_eyebrow)
	'navigation',   // primary menu walker + accessible mobile nav state
];

foreach ( $modules as $module ) {
	$file = NLIGN_PATH . "inc/{$module}.php";
	if ( is_readable( $file ) ) {
		require_once $file;
	}
}

unset( $modules, $module, $file );
