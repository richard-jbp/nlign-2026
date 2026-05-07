<?php
/**
 * Template helpers — small, focused, well-named.
 *
 * @package NLign_2026
 */

declare( strict_types=1 );

defined( 'ABSPATH' ) || exit;

/**
 * Render a section template-part by slug, passing data.
 *
 * Usage:  nlign_section( 'hero', [ 'data' => $hero ] );
 *
 * @param string               $slug Section file under /template-parts/sections/.
 * @param array<string, mixed> $args Data made available to the partial.
 */
function nlign_section( string $slug, array $args = [] ): void {
	get_template_part( 'template-parts/sections/' . $slug, null, $args );
}

/**
 * Inline an SVG file from /assets/images/ so it can be CSS-coloured.
 *
 * @param string $name e.g. 'logo-mark' for /assets/images/logo-mark.svg.
 */
function nlign_inline_svg( string $name ): string {
	$path = NLIGN_PATH . 'assets/images/' . $name . '.svg';
	if ( ! is_readable( $path ) ) {
		return '';
	}
	$svg = (string) file_get_contents( $path );
	// Strip XML prolog if present — invalid inside HTML.
	return preg_replace( '/<\?xml[^>]*\?>/', '', $svg ) ?? $svg;
}

/**
 * Print an inline SVG safely.
 */
function nlign_the_inline_svg( string $name ): void {
	echo nlign_inline_svg( $name ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped — SVG content is theme-controlled.
}

/**
 * Render a small, semantically-marked "eyebrow" label used across sections.
 *
 * <p class="eyebrow">THE REALITY</p>
 */
function nlign_eyebrow( string $text ): string {
	if ( '' === trim( $text ) ) {
		return '';
	}
	return '<p class="eyebrow">' . esc_html( $text ) . '</p>';
}

/**
 * Build an accessible <img> tag for an ACF image field with srcset/sizes.
 *
 * @param int|array<string,mixed> $image    ACF image (Array | ID, depending on return type).
 * @param string                  $size     Registered image size (e.g. 'nlign-feature').
 * @param string                  $sizes    `sizes` attribute (matches CSS layout).
 * @param array<string,string>    $attrs    Extra HTML attributes.
 */
function nlign_image( $image, string $size = 'large', string $sizes = '100vw', array $attrs = [] ): string {
	$id = is_array( $image ) ? (int) ( $image['ID'] ?? 0 ) : (int) $image;
	if ( ! $id ) {
		return '';
	}
	$alt = is_array( $image ) ? (string) ( $image['alt'] ?? '' ) : (string) get_post_meta( $id, '_wp_attachment_image_alt', true );

	$default_attrs = [
		'class'    => 'nlign-img',
		'loading'  => 'lazy',
		'decoding' => 'async',
		'sizes'    => $sizes,
		'alt'      => $alt,
	];

	return wp_get_attachment_image( $id, $size, false, array_merge( $default_attrs, $attrs ) );
}

/**
 * Print version of nlign_image().
 */
function nlign_the_image( $image, string $size = 'large', string $sizes = '100vw', array $attrs = [] ): void {
	echo nlign_image( $image, $size, $sizes, $attrs ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped — wp_get_attachment_image output is already escaped.
}

/**
 * ACF safe getter.
 *
 * Why: get_field() on a non-existent option returns null on staging, false on prod —
 * this thin wrapper normalises that and gives a typed default.
 */
function nlign_field( string $key, $default = null, $post_id = false ) {
	if ( ! function_exists( 'get_field' ) ) {
		return $default;
	}
	$value = get_field( $key, $post_id );
	return ( null === $value || false === $value ) ? $default : $value;
}

/**
 * Render a button. Standardises class hooks so SCSS only needs to style one
 * .button component family.
 *
 * @param array{ label?: string, url?: string, target?: string, variant?: string, attrs?: array<string,string> } $btn
 */
function nlign_button( array $btn ): string {
	$label   = (string) ( $btn['label'] ?? '' );
	$url     = (string) ( $btn['url'] ?? '#' );
	$target  = (string) ( $btn['target'] ?? '' );
	$variant = (string) ( $btn['variant'] ?? 'primary' ); // primary | secondary | ghost | sage
	$extra   = (array)  ( $btn['attrs'] ?? [] );

	if ( '' === $label ) {
		return '';
	}

	$classes = 'button button--' . sanitize_html_class( $variant );

	$attr_str = '';
	foreach ( $extra as $k => $v ) {
		$attr_str .= ' ' . esc_attr( $k ) . '="' . esc_attr( $v ) . '"';
	}

	$rel = $target === '_blank' ? ' rel="noopener noreferrer"' : '';
	$tgt = $target ? ' target="' . esc_attr( $target ) . '"' : '';

	return sprintf(
		'<a class="%s" href="%s"%s%s%s>%s</a>',
		esc_attr( $classes ),
		esc_url( $url ),
		$tgt,
		$rel,
		$attr_str,
		esc_html( $label )
	);
}
