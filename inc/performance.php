<?php
/**
 * Performance — strip core bloat, add resource hints.
 *
 * @package NLign_2026
 */

declare( strict_types=1 );

defined( 'ABSPATH' ) || exit;

/* ----------------------------------------------------------------------------
 * Disable emoji JS/CSS — saves ~14 KB on every page load.
 * -------------------------------------------------------------------------- */
remove_action( 'wp_head',             'print_emoji_detection_script', 7 );
remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
remove_action( 'wp_print_styles',     'print_emoji_styles' );
remove_action( 'admin_print_styles',  'print_emoji_styles' );
remove_filter( 'the_content_feed',    'wp_staticize_emoji' );
remove_filter( 'comment_text_rss',    'wp_staticize_emoji' );
remove_filter( 'wp_mail',             'wp_staticize_emoji_for_email' );

/* ----------------------------------------------------------------------------
 * Disable jQuery Migrate (we don't ship jQuery-dependent code).
 * If a plugin requires it, remove this block.
 * -------------------------------------------------------------------------- */
add_action(
	'wp_default_scripts',
	static function ( $scripts ): void {
		if ( ! is_admin() && isset( $scripts->registered['jquery'] ) ) {
			$scripts->registered['jquery']->deps = array_diff(
				$scripts->registered['jquery']->deps,
				[ 'jquery-migrate' ]
			);
		}
	}
);

/* ----------------------------------------------------------------------------
 * Resource hints.
 *  - dns-prefetch + preconnect for any third-party hosts you'll embed
 *    (YouTube for the "Watch Overview" video, GA, GTM, fonts CDN, etc.).
 *
 * Add hosts to the array as integrations are wired in.
 * -------------------------------------------------------------------------- */
add_filter(
	'wp_resource_hints',
	static function ( array $hints, string $relation_type ): array {
		$preconnect = [
			// 'https://www.googletagmanager.com',
			// 'https://www.youtube.com',
			// 'https://i.ytimg.com',
		];
		if ( 'preconnect' === $relation_type ) {
			$hints = array_merge( $hints, $preconnect );
		}
		return $hints;
	},
	10,
	2
);

/* ----------------------------------------------------------------------------
 * Lazy-load iframes (videos, maps).
 * Core lazy-loads <img>; iframes need an explicit filter.
 * -------------------------------------------------------------------------- */
add_filter( 'wp_lazy_loading_enabled', '__return_true' );
