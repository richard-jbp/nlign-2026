<?php
/**
 * "The Impact" — Real-World Customer Results.
 *
 * ACF group: group_homepage_impact
 *   - impact_eyebrow  (text)
 *   - impact_title    (text)
 *   - impact_metrics  (repeater: label, figure)
 *
 * @package NLign_2026
 */

declare( strict_types=1 );

defined( 'ABSPATH' ) || exit;

$eyebrow = (string) nlign_field( 'impact_eyebrow', __( 'The Impact', 'nlign-2026' ) );
$title   = (string) nlign_field( 'impact_title',   __( 'Real-World Customer Results', 'nlign-2026' ) );

$default_metrics = [
	[ 'label' => __( 'Annual savings',                 'nlign-2026' ), 'figure' => '$19M' ],
	[ 'label' => __( 'Downtime reduction',             'nlign-2026' ), 'figure' => '18%'  ],
	[ 'label' => __( 'Documentation time reduction',   'nlign-2026' ), 'figure' => '48%'  ],
	[ 'label' => __( 'Faster damage assessment',       'nlign-2026' ), 'figure' => '99%'  ],
	[ 'label' => __( 'Reduction in MRB cycle time',    'nlign-2026' ), 'figure' => '40%'  ],
];
$metrics = (array) nlign_field( 'impact_metrics', $default_metrics );
?>

<section class="impact" id="impact" aria-labelledby="impact-title">
	<div class="impact__inner">

		<div class="impact__intro">
			<?php if ( '' !== $eyebrow ) : ?>
				<p class="eyebrow"><?php echo esc_html( $eyebrow ); ?></p>
			<?php endif; ?>
			<h2 class="impact__title" id="impact-title">
				<?php echo esc_html( $title ); ?>
			</h2>
		</div>

		<ul class="impact__metrics">
			<?php foreach ( $metrics as $m ) : ?>
				<li class="impact__metric" data-reveal>
					<p class="impact__metric-label"><?php echo esc_html( (string) ( $m['label'] ?? '' ) ); ?></p>
					<p class="impact__metric-figure"><?php echo esc_html( (string) ( $m['figure'] ?? '' ) ); ?></p>
				</li>
			<?php endforeach; ?>
		</ul>
	</div>
</section>
