<?php
/**
 * "Trusted by" section — eyebrow + horizontal customer logo strip.
 *
 * ACF group: group_homepage_trusted_by
 *   - trusted_by_label   (text)
 *   - trusted_by_logos   (gallery — customer marks)
 *
 * @package NLign_2026
 */

declare( strict_types=1 );

defined( 'ABSPATH' ) || exit;

$label = (string) nlign_field( 'trusted_by_label', __( 'Trusted by', 'nlign-2026' ) );
$logos = (array)  nlign_field( 'trusted_by_logos', [] );

if ( empty( $logos ) ) {
	return; // hide the strip if no logos uploaded — better than empty rule
}
?>

<section class="trusted-by" aria-label="<?php echo esc_attr( $label ); ?>">
	<div class="trusted-by__inner">
		<p class="trusted-by__label"><?php echo esc_html( $label ); ?></p>
		<ul class="trusted-by__logos">
			<?php foreach ( $logos as $logo ) : ?>
				<li>
					<?php nlign_the_image( $logo, 'nlign-logo-bar', '(min-width: 600px) 160px, 30vw', [ 'loading' => 'lazy' ] ); ?>
				</li>
			<?php endforeach; ?>
		</ul>
	</div>
</section>
