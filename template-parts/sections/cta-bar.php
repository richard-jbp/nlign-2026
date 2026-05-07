<?php
/**
 * Final CTA bar above the footer.
 *
 * ACF group: group_homepage_cta
 *   - cta_eyebrow      (text)
 *   - cta_title_lead   (text)        — "Bring Engineered Clarity to Complex Operations"
 *   - cta_title_dot    (text|select) — final punctuation, defaults to "." in orange
 *   - cta_button       (group: label, url)
 *
 * @package NLign_2026
 */

declare( strict_types=1 );

defined( 'ABSPATH' ) || exit;

$eyebrow = (string) nlign_field( 'cta_eyebrow',
	__( 'A Single, Trusted View of Your Most Precious Assets', 'nlign-2026' )
);
$lead    = (string) nlign_field( 'cta_title_lead',
	__( 'Bring Engineered Clarity to Complex Operations', 'nlign-2026' )
);
$dot     = (string) nlign_field( 'cta_title_dot', '.' );
$button  = (array)  nlign_field( 'cta_button',
	[ 'label' => __( 'Book Demo', 'nlign-2026' ), 'url' => '#book-demo' ]
);
?>

<section class="cta-bar" id="book-demo" aria-labelledby="cta-bar-title">
	<div class="cta-bar__inner">
		<div>
			<h2 class="cta-bar__title" id="cta-bar-title">
				<?php echo esc_html( $lead ); ?><span class="dot"><?php echo esc_html( $dot ); ?></span>
			</h2>
			<?php if ( '' !== $eyebrow ) : ?>
				<p class="cta-bar__eyebrow"><?php echo esc_html( $eyebrow ); ?></p>
			<?php endif; ?>
		</div>

		<?php
		echo nlign_button( array_merge( $button, [ 'variant' => 'sage', 'attrs' => [ 'data-cta' => 'cta-bar' ] ] ) ); // phpcs:ignore
		?>
	</div>
</section>
