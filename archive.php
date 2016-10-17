<?php
/**
 * The template for displaying archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Broden
 */

get_header(); ?>
	
	<div class="page-header-title">
		<div class="container">

			<?php if ( is_category() ) : ?>

				<h1>
					<?php echo esc_html__('Category:', 'broden') ?>
					<span><?php echo single_tag_title('', false) ?></span>
				</h1>

			<?php elseif ( is_tag() ) : ?>

				<h1>
					<?php echo esc_html__('Tag:', 'broden') ?>
					<span><?php echo single_tag_title('', false) ?></span>
				</h1>

			<?php elseif ( is_day() ) : ?>

				<h1>
					<?php echo esc_html__('Daily Archives:', 'broden') ?>
					<span><?php echo get_the_date() ?></span>
				</h1>

			<?php elseif ( is_month() ) : ?>

				<h1>
					<?php echo esc_html__('Monthly Archives:', 'broden') ?>
					<span><?php echo get_the_date( _x( 'F Y', 'Monthly archives date format', 'broden' ) ) ?></span>
				</h1>

			<?php elseif ( is_year() ) : ?>

				<h1>
					<?php echo esc_html__('Yearly Archives:', 'broden') ?>
					<span><?php echo get_the_date( _x( 'Y', 'Yearly archives date format', 'broden' ) ) ?></span>
				</h1>

			<?php else: ?>

				<h1>
					<?php echo esc_html__('Archives:', 'broden') ?>
				</h1>
				
			<?php endif; ?>


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

					<?php endif; ?>

					</div><!-- blog-posts -->

					<?php get_sidebar( 'sidebar' ); ?>

				</div><!-- row -->
			</div><!-- container -->
		</section><!-- blog-main -->

	</section>

<?php get_footer(); ?>