<?php
/**
 * Asset enqueue — styles, scripts, fonts, preload hints.
 *
 * Strategy:
 *  - One main.css and one main.js, fingerprinted by Vite (manifest.json).
 *  - Inter variable .woff2 is preloaded so first text paint is the brand font.
 *  - JS is loaded as a module with `defer` (modern browsers; matches Vite output).
 *  - Editor styles are enqueued separately by setup.php → add_editor_style().
 *
 * @package NLign_2026
 */

declare( strict_types=1 );

defined( 'ABSPATH' ) || exit;

/**
 * Read Vite's manifest.json and resolve a logical entry to a hashed file path.
 * Falls back to the un-hashed dev path if the manifest is missing.
 *
 * @param string $entry e.g. 'assets/scss/main.scss' or 'assets/js/main.js'.
 * @return string|null  Theme-relative path, or null if not found.
 */
function nlign_vite_asset( string $entry ): ?string {
	static $manifest = null;

	if ( null === $manifest ) {
		$path     = NLIGN_PATH . 'assets/dist/.vite/manifest.json';
		$manifest = is_readable( $path )
			? json_decode( (string) file_get_contents( $path ), true )
			: [];
	}

	if ( isset( $manifest[ $entry ]['file'] ) ) {
		return 'assets/dist/' . $manifest[ $entry ]['file'];
	}

	// Sibling CSS chunks for a JS entry.
	if ( isset( $manifest[ $entry ]['css'][0] ) ) {
		return 'assets/dist/' . $manifest[ $entry ]['css'][0];
	}

	return null;
}

/**
 * Enqueue front-end assets.
 */
add_action(
	'wp_enqueue_scripts',
	static function (): void {

		// Vite places its manifest keys relative to its `root` (which we set to
		// /assets in vite.config.js), so the CSS bundle is keyed as 'style.css'
		// and the JS entry as 'js/main.js'. Fall back to legacy paths if the
		// manifest is missing (e.g. in a fresh checkout pre-build).
		$css_rel = nlign_vite_asset( 'style.css' )
			?? nlign_vite_asset( 'js/main.js' )
			?? 'assets/dist/main.css';

		$js_rel  = nlign_vite_asset( 'js/main.js' ) ?? 'assets/dist/main.js';

		// Stylesheet — registered against `style.css` handle so child themes can override.
		wp_enqueue_style(
			'nlign-main',
			NLIGN_URL . $css_rel,
			[],
			NLIGN_VERSION
		);

		// Theme JS — module, deferred. Strategy 'defer' is core 6.3+.
		wp_enqueue_script(
			'nlign-main',
			NLIGN_URL . $js_rel,
			[],
			NLIGN_VERSION,
			[
				'strategy'  => 'defer',
				'in_footer' => true,
			]
		);

		// Localize a tiny boot object for the JS layer (REST root, nonce, theme URL).
		wp_localize_script(
			'nlign-main',
			'NLIGN',
			[
				'rest'    => esc_url_raw( rest_url() ),
				'nonce'   => wp_create_nonce( 'wp_rest' ),
				'themeUrl'=> NLIGN_URL,
				'isHome'  => is_front_page(),
			]
		);
	}
);

/**
 * Mark the main JS as a real ES module.
 */
add_filter(
	'script_loader_tag',
	static function ( string $tag, string $handle ): string {
		if ( 'nlign-main' === $handle ) {
			$tag = str_replace( '<script ', '<script type="module" ', $tag );
		}
		return $tag;
	},
	10,
	2
);

/**
 * Preload the variable font so it's available before first paint.
 * Skip on admin and feed.
 */
add_action(
	'wp_head',
	static function (): void {
		if ( is_admin() || is_feed() ) {
			return;
		}
		$font_url = esc_url( NLIGN_URL . 'assets/fonts/Inter.woff2' );
		echo '<link rel="preload" as="font" type="font/woff2" href="' . $font_url . '" crossorigin>' . "\n";
	},
	1
);
