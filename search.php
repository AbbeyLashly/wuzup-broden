<?php
/**
 * The template for displaying search results pages.
 *
 * @package Broden
 */

get_header(); ?>

	<div class="page-header-title">
		<div class="container">
			<h1>
				<?php echo esc_html__('Search Results For:', 'broden') ?>
				<span><?php echo get_search_query() ?></span>
			</h1>
		</div><!-- container -->
	</div><!-- page-header-title -->

	<section class="main">

		<section class="blog-main">
			<div class="container">
				<div class="row">

					<?php if ( have_posts() ) : ?>

					<div class="col-md-8 col-sm-12 col-xs-12 blog-posts">

						<?php while ( have_posts() ) : the_post(); ?>

							<?php if ( ( get_theme_mod( 'broden_archive_style' ) == 'list' ) || ( get_theme_mod( 'broden_archive_style' ) == 'grid' ) || ( get_theme_mod( 'broden_archive_style' ) == 'thumb' ) ) : ?>
				            
								<?php get_template_part( 'content', get_theme_mod('broden_archive_style') ); ?>
				                
							<?php else : ?>
				                
				                <?php get_template_part( 'content', 'list', get_theme_mod('broden_archive_style') ); ?>
				                
							<?php endif; ?>

						<?php endwhile; ?>

						<?php broden_pagination(); ?>

					</div><!-- blog-posts -->

					<?php else : ?>

							<?php get_template_part( 'content', 'none' ); ?>

					<?php endif; ?>

					<?php get_sidebar( 'sidebar' ); ?>

				</div><!-- row -->
			</div><!-- container -->
		</section><!-- blog-main -->

	</section>

<?php get_footer(); ?>