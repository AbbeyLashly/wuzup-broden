<?php
/**
 * The template part for displaying a message that posts cannot be found.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Broden
 */
?>

<div class="col-md-8 col-sm-12 col-xs-12 blog-posts">

	<section class="no-results not-found">
		<div class="page-content">

			<?php if ( is_search() ) : ?>

				<h3><?php esc_html_e( 'Nothing Found', 'broden' ); ?></h3>

				<p><?php esc_html_e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'broden' ); ?></p>
				<?php get_search_form(); ?>

			<?php else : ?>

				<h3><?php esc_html_e( 'Nothing Found', 'broden' ); ?></h3>

				<p><?php esc_html_e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'broden' ); ?></p>
				<?php get_search_form(); ?>

			<?php endif; ?>
		</div><!-- .page-content -->
	</section><!-- .no-results -->

</div>