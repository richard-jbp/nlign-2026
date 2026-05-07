<?php
/**
 * Site footer.
 *
 * @package NLign_2026
 */

declare( strict_types=1 );

$columns = [
	[ 'title' => __( 'Platform',   'nlign-2026' ), 'menu' => 'footer-platform'   ],
	[ 'title' => __( 'Solutions',  'nlign-2026' ), 'menu' => 'footer-solutions'  ],
	[ 'title' => __( 'Industries', 'nlign-2026' ), 'menu' => 'footer-industries' ],
	[ 'title' => __( 'Company',    'nlign-2026' ), 'menu' => 'footer-company'    ],
	[ 'title' => __( 'Resources',  'nlign-2026' ), 'menu' => 'footer-resources'  ],
];
?>
</main><!-- /#main-content -->

<footer class="site-footer" role="contentinfo">
	<div class="site-footer__inner">
		<div class="site-footer__brand">
			<?php nlign_the_inline_svg( 'logo-horizontal-color' ); ?>
		</div>

		<?php foreach ( $columns as $col ) : ?>
			<nav class="site-footer__col" aria-label="<?php echo esc_attr( $col['title'] ); ?>">
				<h2 class="site-footer__col-title"><?php echo esc_html( $col['title'] ); ?></h2>
				<?php
				wp_nav_menu(
					[
						'theme_location' => $col['menu'],
						'container'      => false,
						'menu_class'     => 'site-footer__menu',
						'fallback_cb'    => '__return_false',
						'depth'          => 1,
					]
				);
				?>
			</nav>
		<?php endforeach; ?>
	</div>

	<div class="site-footer__legal">
		<p>
			<?php
			printf(
				/* translators: 1: current year, 2: site name */
				esc_html__( '© %1$s %2$s. All rights reserved.', 'nlign-2026' ),
				esc_html( gmdate( 'Y' ) ),
				esc_html( get_bloginfo( 'name' ) )
			);
			?>
		</p>
		<?php
		wp_nav_menu(
			[
				'theme_location' => 'footer-legal',
				'container'      => false,
				'menu_class'     => 'site-footer__legal-links',
				'fallback_cb'    => '__return_false',
				'depth'          => 1,
			]
		);
		?>
	</div>
</footer>

<?php wp_footer(); ?>
</body>
</html>
