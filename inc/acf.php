<?php
/**
 * ACF Pro integration.
 *
 * Strategy:
 *  - Field groups live in /acf-json (one JSON file per group).
 *  - WP saves changes back to /acf-json automatically — keep them in git.
 *  - A hard requirement notice is shown if ACF Pro isn't active.
 *
 * @package NLign_2026
 */

declare( strict_types=1 );

defined( 'ABSPATH' ) || exit;

/**
 * Load field groups from /acf-json.
 */
add_filter(
	'acf/settings/load_json',
	static function ( array $paths ): array {
		$paths[] = NLIGN_PATH . 'acf-json';
		return $paths;
	}
);

/**
 * Save field-group edits straight back into /acf-json.
 */
add_filter(
	'acf/settings/save_json',
	static fn(): string => NLIGN_PATH . 'acf-json'
);

/**
 * Theme Options page (header CTA, footer columns, social, scripts).
 */
add_action(
	'acf/init',
	static function (): void {
		if ( ! function_exists( 'acf_add_options_page' ) ) {
			return;
		}
		acf_add_options_page(
			[
				'page_title'  => __( 'Site Options', 'nlign-2026' ),
				'menu_title'  => __( 'Site Options', 'nlign-2026' ),
				'menu_slug'   => 'site-options',
				'capability'  => 'manage_options',
				'redirect'    => false,
				'icon_url'    => 'dashicons-admin-customizer',
				'position'    => 60,
			]
		);
	}
);

/**
 * Admin notice if ACF Pro is missing.
 */
add_action(
	'admin_notices',
	static function (): void {
		if ( function_exists( 'acf_get_field_group' ) ) {
			return;
		}
		echo '<div class="notice notice-error"><p><strong>NLign 2026:</strong> ';
		echo esc_html__( 'Advanced Custom Fields PRO is required for this theme. Please install and activate it.', 'nlign-2026' );
		echo '</p></div>';
	}
);
