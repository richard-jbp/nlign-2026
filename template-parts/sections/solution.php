<?php
/**
 * "The Solution" section.
 *
 * ACF group: group_homepage_solution
 *   - solution_eyebrow   (text)
 *   - solution_title     (text)
 *   - solution_lead      (textarea)
 *   - solution_cta       (group: label, url)
 *   - solution_screens   (gallery — up to 3 images for stacked dashboard mock)
 *   - solution_tabs      (repeater — label, slug, panel_content)
 *
 * @package NLign_2026
 */

declare( strict_types=1 );

defined( 'ABSPATH' ) || exit;

$eyebrow = (string) nlign_field( 'solution_eyebrow', __( 'The Solution', 'nlign-2026' ) );
$title   = (string) nlign_field( 'solution_title',   __( 'A single, trusted view of operational reality.', 'nlign-2026' ) );
$lead    = (string) nlign_field( 'solution_lead',    __( 'NLign unifies asset data across the lifecycle, so teams can align, act, and deliver with confidence.', 'nlign-2026' ) );
$cta     = (array)  nlign_field( 'solution_cta',     [ 'label' => __( 'Watch the Demo', 'nlign-2026' ), 'url' => '#watch' ] );
$screens = (array)  nlign_field( 'solution_screens', [] );
$tabs    = (array)  nlign_field( 'solution_tabs', [
	[ 'label' => __( 'Production',  'nlign-2026' ), 'slug' => 'production'  ],
	[ 'label' => __( 'Sustainment', 'nlign-2026' ), 'slug' => 'sustainment' ],
	[ 'label' => __( 'Quality',     'nlign-2026' ), 'slug' => 'quality'     ],
	[ 'label' => __( 'Fleet',       'nlign-2026' ), 'slug' => 'fleet'       ],
] );
?>

<section class="solution" id="solutions" aria-labelledby="solution-title">
	<div class="solution__inner">
		<div class="solution__grid">

			<div class="solution__copy">
				<?php if ( '' !== $eyebrow ) : ?>
					<p class="eyebrow"><?php echo esc_html( $eyebrow ); ?></p>
				<?php endif; ?>

				<h2 class="solution__title" id="solution-title">
					<?php echo esc_html( $title ); ?>
				</h2>

				<?php if ( '' !== $lead ) : ?>
					<p class="solution__lead"><?php echo esc_html( $lead ); ?></p>
				<?php endif; ?>

				<?php
				if ( ! empty( $cta['label'] ) ) {
					echo nlign_button( array_merge( $cta, [ 'variant' => 'text' ] ) ); // phpcs:ignore
				}
				?>
			</div>

			<?php if ( ! empty( $screens ) ) : ?>
				<div class="solution__art" aria-hidden="true">
					<?php
					$variants = [ 'front', 'mid', 'back' ];
					foreach ( array_slice( $screens, 0, 3 ) as $i => $img ) :
						$class = 'solution__art-screen solution__art-screen--' . $variants[ $i ];
						?>
						<div class="<?php echo esc_attr( $class ); ?>">
							<?php nlign_the_image( $img, 'nlign-feature', '(min-width: 900px) 50vw, 90vw' ); ?>
						</div>
					<?php endforeach; ?>
				</div>
			<?php endif; ?>
		</div>

		<?php if ( ! empty( $tabs ) ) : ?>
			<div class="solution__tabs" role="tablist" aria-label="<?php esc_attr_e( 'View by persona', 'nlign-2026' ); ?>">
				<?php foreach ( $tabs as $i => $tab ) :
					$slug    = sanitize_title( (string) ( $tab['slug'] ?? '' ) );
					$label   = (string) ( $tab['label'] ?? '' );
					$tab_id  = 'solution-tab-' . $slug;
					$panel_id= 'solution-panel-' . $slug;
					$active  = 0 === $i;
					?>
					<button
						class="solution__tab"
						role="tab"
						id="<?php echo esc_attr( $tab_id ); ?>"
						aria-controls="<?php echo esc_attr( $panel_id ); ?>"
						aria-selected="<?php echo $active ? 'true' : 'false'; ?>"
						tabindex="<?php echo $active ? '0' : '-1'; ?>"
						type="button">
						<?php echo esc_html( $label ); ?>
					</button>
				<?php endforeach; ?>
			</div>

			<?php foreach ( $tabs as $i => $tab ) :
				$slug    = sanitize_title( (string) ( $tab['slug'] ?? '' ) );
				$tab_id  = 'solution-tab-' . $slug;
				$panel_id= 'solution-panel-' . $slug;
				$active  = 0 === $i;
				$content = (string) ( $tab['panel_content'] ?? '' );
				?>
				<div
					id="<?php echo esc_attr( $panel_id ); ?>"
					role="tabpanel"
					aria-labelledby="<?php echo esc_attr( $tab_id ); ?>"
					<?php echo $active ? '' : 'hidden'; ?>
					class="solution__panel">
					<?php echo wp_kses_post( $content ); ?>
				</div>
			<?php endforeach; ?>
		<?php endif; ?>
	</div>
</section>
