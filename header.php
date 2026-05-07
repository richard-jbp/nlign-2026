<?php
/**
 * Site header.
 *
 * @package NLign_2026
 */

declare( strict_types=1 );
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">
	<meta name="theme-color" content="#0b0c0d">
	<link rel="icon" type="image/svg+xml" href="<?php echo esc_url( NLIGN_URL . 'assets/images/logo-mark.svg' ); ?>">
	<?php wp_head(); ?>
</head>
<body <?php body_class( 'has-dark-bg' ); ?>>
<?php wp_body_open(); ?>

<a class="skip-link" href="#main-content"><?php esc_html_e( 'Skip to main content', 'nlign-2026' ); ?></a>

<header class="site-header" role="banner">
	<div class="site-header__inner">

		<a class="site-header__logo" href="<?php echo esc_url( home_url( '/' ) ); ?>" aria-label="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>">
			<?php nlign_the_inline_svg( 'logo-horizontal-light' ); ?>
		</a>

		<nav class="primary-nav" aria-label="<?php esc_attr_e( 'Primary', 'nlign-2026' ); ?>">
			<?php
			wp_nav_menu(
				[
					'theme_location'  => 'primary',
					'container'       => false,
					'menu_class'      => 'primary-nav__list',
					'walker'          => new NLign_Primary_Walker(),
					'fallback_cb'     => static function (): void {
						echo '<ul class="primary-nav__list">';
						$default = [
							[ 'Platform',    '#platform' ],
							[ 'Solutions',   '#solutions' ],
							[ 'Industries',  '#industries' ],
							[ 'Proof',       '#proof' ],
							[ 'Company',     '#company' ],
						];
						foreach ( $default as [ $label, $url ] ) {
							printf(
								'<li class="primary-nav__item"><a class="primary-nav__link" href="%s">%s</a></li>',
								esc_url( $url ),
								esc_html( $label )
							);
						}
						echo '</ul>';
					},
				]
			);
			?>
		</nav>

		<?php
		$header_cta = nlign_field( 'header_cta', null, 'option' );
		if ( is_array( $header_cta ) && ! empty( $header_cta['label'] ) ) {
			echo nlign_button( [ // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
				'label'   => $header_cta['label'],
				'url'     => $header_cta['url'] ?? '#',
				'variant' => 'primary',
			] );
		} else {
			echo nlign_button( [ // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
				'label'   => __( 'Book Demo', 'nlign-2026' ),
				'url'     => '#book-demo',
				'variant' => 'primary',
			] );
		}
		?>

		<button
			class="mobile-toggle"
			type="button"
			aria-expanded="false"
			aria-controls="mobile-drawer"
			aria-label="<?php esc_attr_e( 'Toggle menu', 'nlign-2026' ); ?>">
			<span class="mobile-toggle__bars" aria-hidden="true"></span>
		</button>
	</div>

	<div id="mobile-drawer" class="mobile-drawer" hidden-on-desktop>
		<?php
		wp_nav_menu(
			[
				'theme_location' => 'primary',
				'container'      => false,
				'menu_class'     => 'mobile-drawer__list',
				'fallback_cb'    => '__return_false',
				'depth'          => 1,
			]
		);
		?>
		<div class="mobile-drawer__cta">
			<?php
			echo nlign_button( [ // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
				'label'   => __( 'Book Demo', 'nlign-2026' ),
				'url'     => '#book-demo',
				'variant' => 'primary',
			] );
			?>
		</div>
	</div>
</header>

<main id="main-content" role="main">
