<?php
/**
 * Primary nav walker — minimal, accessible, no jQuery.
 *
 * The header markup expects:
 *   <ul class="primary-nav__list">
 *     <li class="primary-nav__item"><a class="primary-nav__link">…</a></li>
 *   </ul>
 *
 * @package NLign_2026
 */

declare( strict_types=1 );

defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'NLign_Primary_Walker' ) ) {

	/**
	 * Walks the primary menu, applying BEM classes.
	 */
	class NLign_Primary_Walker extends Walker_Nav_Menu {

		public function start_lvl( &$output, $depth = 0, $args = null ): void { // phpcs:ignore
			$output .= '<ul class="primary-nav__sublist">';
		}

		public function end_lvl( &$output, $depth = 0, $args = null ): void { // phpcs:ignore
			$output .= '</ul>';
		}

		public function start_el( &$output, $item, $depth = 0, $args = null, $id = 0 ): void { // phpcs:ignore
			$classes = [
				'primary-nav__item',
				$depth > 0 ? 'primary-nav__item--child' : '',
				in_array( 'current-menu-item', (array) $item->classes, true ) ? 'is-current' : '',
			];
			$classes = array_filter( $classes );

			$output .= sprintf(
				'<li class="%s">',
				esc_attr( implode( ' ', $classes ) )
			);

			$attrs = [];
			$attrs['href'] = ! empty( $item->url ) ? $item->url : '#';
			if ( ! empty( $item->target ) ) {
				$attrs['target'] = $item->target;
			}
			if ( ! empty( $item->xfn ) ) {
				$attrs['rel'] = $item->xfn;
			}
			$attrs['class'] = 'primary-nav__link';

			$attr_html = '';
			foreach ( $attrs as $k => $v ) {
				$attr_html .= ' ' . esc_attr( $k ) . '="' . esc_attr( $v ) . '"';
			}

			$output .= '<a' . $attr_html . '>' . esc_html( $item->title ) . '</a>';
		}

		public function end_el( &$output, $item, $depth = 0, $args = null ): void { // phpcs:ignore
			$output .= '</li>';
		}
	}
}
