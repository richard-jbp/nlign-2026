<?php
/**
 * "The Reality" section — problem framing + 4 metric rows.
 *
 * ACF group: group_homepage_reality
 *   - reality_eyebrow      (text)
 *   - reality_title_lead   (text)        e.g. "Operational friction creates"
 *   - reality_title_accent (text)        e.g. "real consequences."  (orange)
 *   - reality_supporting   (textarea)
 *   - reality_metrics      (repeater: label, figure, caption)
 *
 * @package NLign_2026
 */

declare( strict_types=1 );

defined( 'ABSPATH' ) || exit;

$eyebrow    = (string) nlign_field( 'reality_eyebrow',    __( 'The Reality', 'nlign-2026' ) );
$lead       = (string) nlign_field( 'reality_title_lead',   __( 'Operational friction creates', 'nlign-2026' ) );
$accent     = (string) nlign_field( 'reality_title_accent', __( 'real consequences.', 'nlign-2026' ) );
$supporting = (string) nlign_field( 'reality_supporting',
	__( 'Disconnected data, manual workflows, and siloed systems slow teams down and drive up cost across the asset lifecycle.', 'nlign-2026' )
);

// Sensible defaults so a fresh install isn't empty.
$default_metrics = [
	[ 'label' => __( 'Longer cycles',     'nlign-2026' ), 'figure' => '2–5x',    'caption' => __( 'Longer MRB cycles', 'nlign-2026' ) ],
	[ 'label' => __( 'Higher costs',      'nlign-2026' ), 'figure' => '20–30%',  'caption' => __( 'Of total costs associated with cost of poor quality', 'nlign-2026' ) ],
	[ 'label' => __( 'Increased downtime','nlign-2026' ), 'figure' => '20–40%',  'caption' => __( 'Longer Mean Time to Repair (MTTR)', 'nlign-2026' ) ],
	[ 'label' => __( 'Operational waste', 'nlign-2026' ), 'figure' => '10–25%',  'caption' => __( 'Excess SG&A from duplicated effort and data reconciliation', 'nlign-2026' ) ],
];
$metrics = (array) nlign_field( 'reality_metrics', $default_metrics );
?>

<section class="reality" id="proof" aria-labelledby="reality-title">
	<div class="reality__inner">

		<div class="reality__intro">
			<div>
				<?php if ( '' !== $eyebrow ) : ?>
					<p class="eyebrow"><?php echo esc_html( $eyebrow ); ?></p>
				<?php endif; ?>

				<h2 class="reality__title" id="reality-title">
					<?php echo esc_html( $lead ); ?>
					<span class="accent"><?php echo esc_html( $accent ); ?></span>
				</h2>
			</div>

			<?php if ( '' !== $supporting ) : ?>
				<p class="reality__supporting"><?php echo esc_html( $supporting ); ?></p>
			<?php endif; ?>
		</div>

		<div class="reality__metrics">
			<?php foreach ( $metrics as $m ) : ?>
				<div class="metric" data-reveal>
					<p class="metric__label"><?php echo esc_html( (string) ( $m['label'] ?? '' ) ); ?></p>
					<p class="metric__figure"><?php echo esc_html( (string) ( $m['figure'] ?? '' ) ); ?></p>
					<p class="metric__caption"><?php echo esc_html( (string) ( $m['caption'] ?? '' ) ); ?></p>
				</div>
			<?php endforeach; ?>
		</div>
	</div>
</section>
