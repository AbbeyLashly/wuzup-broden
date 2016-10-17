<?php
/**
 * The template part for displaying a message that posts cannot be found.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Broden
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<section class="blog-main">

			<section class="error-404 not-found">
				
				<div class="container">

					<h1 class="page-title"><?php esc_html_e( '404', 'broden' ); ?></h1>

					<p><?php esc_html_e( 'We are sorry, the page you are looking for does not exist. <br>It may have been moved, or removed.. You might try searching our site.', 'broden' ); ?></p>
					
					<div class="col-md-6 col-sm-8 col-xs-10 align-center">
						<?php get_search_form(); ?>
					</div>

				</div><!-- container -->
			</section><!-- error-404 -->

		</div><!-- blog-main -->
	</div><!-- primary -->

<?php get_footer(); ?>