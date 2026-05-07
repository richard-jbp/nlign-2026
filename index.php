<?php
/**
 * Fallback template — used when no more specific template applies.
 *
 * @package NLign_2026
 */

declare( strict_types=1 );

get_header();
?>

<section class="section">
	<div class="container">
		<?php if ( have_posts() ) : ?>
			<?php while ( have_posts() ) : ?>
				<?php the_post(); ?>
				<article <?php post_class(); ?>>
					<header>
						<h1><?php the_title(); ?></h1>
					</header>
					<div class="entry-content">
						<?php the_content(); ?>
					</div>
				</article>
			<?php endwhile; ?>

			<?php the_posts_pagination(); ?>
		<?php else : ?>
			<h1><?php esc_html_e( 'Nothing found', 'nlign-2026' ); ?></h1>
		<?php endif; ?>
	</div>
</section>

<?php get_footer(); ?>
