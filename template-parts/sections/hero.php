<?php
/**
 * Hero section.
 *
 * ACF group: group_homepage_hero
 *   - hero_eyebrow        (text, optional)
 *   - hero_title_lead     (text — "Operational Truth")
 *   - hero_title_highlight(text — "for Mission-Critical Assets" — wraps in span)
 *   - hero_lead           (textarea)
 *   - hero_primary_cta    (group: label, url, target)
 *   - hero_secondary_cta  (group: label, url, target)
 *   - hero_art            (gallery — up to 3 images, used in stacked tiles)
 *
 * @package NLign_2026
 */

declare( strict_types=1 );

defined( 'ABSPATH' ) || exit;

$eyebrow      = (string) nlign_field( 'hero_eyebrow', '' );
$title_lead   = (string) nlign_field( 'hero_title_lead',      __( 'Operational Truth', 'nlign-2026' ) );
$title_high   = (string) nlign_field( 'hero_title_highlight', __( 'for Mission-Critical Assets', 'nlign-2026' ) );
$lead         = (string) nlign_field( 'hero_lead',            __( 'Digital Twin–Driven Asset Intelligence that enables faster, safer, and more confident decisions.', 'nlign-2026' ) );
$primary_cta  = (array)  nlign_field( 'hero_primary_cta',     [ 'label' => __( 'Book Demo', 'nlign-2026' ),    'url' => '#book-demo' ] );
$secondary_cta= (array)  nlign_field( 'hero_secondary_cta',   [ 'label' => __( 'Watch Overview', 'nlign-2026' ), 'url' => '#watch' ] );
$gallery      = (array)  nlign_field( 'hero_art', [] );
?>

<section class="hero" id="top" aria-labelledby="hero-title">
	<div class="hero__inner">

		<div class="hero__content">
			<?php if ( '' !== $eyebrow ) : ?>
				<p class="eyebrow"><?php echo esc_html( $eyebrow ); ?></p>
			<?php endif; ?>

			<h1 class="hero__title" id="hero-title">
				<span class="highlight"><?php echo esc_html( $title_lead ); ?></span>
				<?php echo esc_html( $title_high ); ?>
			</h1>

			<?php if ( '' !== $lead ) : ?>
				<p class="hero__lead"><?php echo esc_html( $lead ); ?></p>
			<?php endif; ?>

			<div class="hero__ctas">
				<?php
				echo nlign_button( array_merge( $primary_cta,   [ 'variant' => 'sage' ] ) );  // phpcs:ignore
				echo nlign_button( array_merge( $secondary_cta, [ 'variant' => 'ghost' ] ) ); // phpcs:ignore
				?>
			</div>
		</div>

		<?php if ( ! empty( $gallery ) ) : ?>
			<div class="hero__art" aria-hidden="true">
				<?php
				$tiles = array_slice( $gallery, 0, 3 );
				foreach ( $tiles as $i => $img ) :
					$class = 'hero__art-tile hero__art-tile--' . ( $i + 1 );
					?>
					<div class="<?php echo esc_attr( $class ); ?>">
						<?php nlign_the_image( $img, 'nlign-feature', '(min-width: 900px) 35vw, 70vw' ); ?>
					</div>
				<?php endforeach; ?>
			</div>
		<?php endif; ?>
	</div>
</section>
