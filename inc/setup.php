<?php
/**
 * Theme setup — runs on after_setup_theme.
 *
 * @package NLign_2026
 */

declare( strict_types=1 );

defined( 'ABSPATH' ) || exit;

/**
 * Register theme features and image sizes.
 */
add_action(
	'after_setup_theme',
	static function (): void {

		// Output title via <title> tag.
		add_theme_support( 'title-tag' );

		// Featured images.
		add_theme_support( 'post-thumbnails' );

		// HTML5 markup for core widgets.
		add_theme_support(
			'html5',
			[
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
				'navigation-widgets',
			]
		);

		// Custom logo (used as fallback if no SVG site logo is set in ACF).
		add_theme_support(
			'custom-logo',
			[
				'height'      => 48,
				'width'       => 220,
				'flex-height' => true,
				'flex-width'  => true,
			]
		);

		// Block editor styles + responsive embeds.
		add_theme_support( 'responsive-embeds' );
		add_theme_support( 'editor-styles' );
		add_editor_style( 'assets/dist/editor.css' );

		// Align-wide / align-full in block editor.
		add_theme_support( 'align-wide' );

		// Translations.
		load_theme_textdomain( NLIGN_TEXTDOMAIN, NLIGN_PATH . 'languages' );

		// Image sizes — derived from mockup component widths × 2 for retina.
		// Containers in mockup: hero-art ~700px, dashboard mock ~640px, logo bar ~140px.
		add_image_size( 'nlign-hero',        1600, 1080, true );
		add_image_size( 'nlign-feature',     1280,  800, true );
		add_image_size( 'nlign-card',         800,  600, true );
		add_image_size( 'nlign-logo-bar',     320,  120, false );
		add_image_size( 'nlign-thumb-square', 600,  600, true );

		// Navigation menus.
		register_nav_menus(
			[
				'primary'      => __( 'Primary header menu', 'nlign-2026' ),
				'footer-platform'   => __( 'Footer — Platform column', 'nlign-2026' ),
				'footer-solutions'  => __( 'Footer — Solutions column', 'nlign-2026' ),
				'footer-industries' => __( 'Footer — Industries column', 'nlign-2026' ),
				'footer-company'    => __( 'Footer — Company column', 'nlign-2026' ),
				'footer-resources'  => __( 'Footer — Resources column', 'nlign-2026' ),
				'footer-legal'      => __( 'Footer — Legal (privacy, terms)', 'nlign-2026' ),
			]
		);
	}
);

/**
 * Trim the default <head> output to what we actually use.
 * (Each removal is intentional — review before deleting in client work.)
 */
remove_action( 'wp_head', 'wp_generator' );           // hides WP version
remove_action( 'wp_head', 'wlwmanifest_link' );       // legacy Windows Live Writer
remove_action( 'wp_head', 'rsd_link' );               // Really Simple Discovery
remove_action( 'wp_head', 'wp_shortlink_wp_head' );   // ?p=123 shortlinks
