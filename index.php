<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Broden
 */

get_header(); ?>

	<div class="main">
	<?php
	/**
	 * Featured Posts
	 */
	?>

	<?php if ( get_theme_mod( 'broden_featured_slider' ) ) : ?>
		<?php if ( ( get_theme_mod( 'broden_featured_layout' ) == 'style-1' ) || ( get_theme_mod( 'broden_featured_layout' ) == 'style-2' ) || ( get_theme_mod( 'broden_featured_layout' ) == 'style-3' ) || ( get_theme_mod( 'broden_featured_layout' ) == 'style-4' ) ) : ?>

			<?php get_template_part( 'inc/featured/featured', get_theme_mod('broden_featured_layout') ); ?>
		<?php else : ?>
			<?php get_template_part( 'inc/featured/featured', 'style-1', get_theme_mod('broden_featured_layout') ); ?>
		<?php endif; ?>
	<?php endif; ?>

	<?php
	/**
	 * First Category Posts
	 */
	?>
	<?php if ( get_theme_mod( 'broden_category_posts' ) ) : ?>
		<?php if ( ( get_theme_mod( 'broden_category_posts_layout' ) == 'style-1' ) || ( get_theme_mod( 'broden_category_posts_layout' ) == 'style-2' ) ) : ?>
			<?php get_template_part( 'inc/loops/category-layout', get_theme_mod('broden_category_posts_layout') ); ?>
		<?php else : ?>
			<?php get_template_part( 'inc/loops/category-layout', 'style-1', get_theme_mod('broden_category_posts_layout') ); ?>
		<?php endif; ?>
		<?php if(get_theme_mod('broden_category_posts_layout') == 'style-2') : else : ?><?php get_sidebar( 'category' ); ?><?php endif; ?>
	<?php endif; ?>

	<?php
	/**
	 * Blog Ads
	 */
	?>

	<?php if ( get_theme_mod( 'broden_blog_ads_activate' ) ) : ?>
		<?php get_template_part( 'inc/loops/blog-ads', get_theme_mod('broden_blog_ads_activate') ); ?>
	<?php endif; ?>

	<?php
	/**
	 * Blog Posts
	 */
	?>
		<div class="blog-main">
			<div class="container">
				<div class="row">
					<?php
						$paginationstyle = get_theme_mod('broden_blog_pagination_style');
						if ($paginationstyle == 'style-2') { ?>
							<div class="broden-ajax-pagination">
						<?php }
						else{ }
					?>
						<?php 
						if ( ( get_theme_mod( 'broden_blog_style' ) == 'style-1' ) || ( get_theme_mod( 'broden_blog_style' ) == 'style-2' ) || ( get_theme_mod( 'broden_blog_style' ) == 'style-3' ) || ( get_theme_mod( 'broden_blog_style' ) == 'style-4' ) ) : ?>
							<?php get_template_part( 'inc/loops/blog', get_theme_mod('broden_blog_style') ); ?>
						<?php else : ?>

			                <?php get_template_part( 'inc/loops/blog', 'style-1', get_theme_mod('broden_blog_style') ); ?> 
						<?php endif; ?>
					<?php
						$paginationstyle = get_theme_mod('broden_blog_pagination_style');
						if ($paginationstyle == 'style-2') { ?>
							</div>
						<?php }
						else{}
					?>
					<?php if(get_theme_mod('broden_blog_style') == 'style-3') : else : ?><?php get_sidebar( 'sidebar' ); ?><?php endif; ?>
				</div><!-- row -->
			</div><!-- container -->
		</div><!-- blog-main -->


	<?php
	/**
	 * Secondary Category Posts
	 */
	?>

	<?php if ( get_theme_mod( 'broden_category_articles' ) ) : ?>
		<?php if ( ( get_theme_mod( 'broden_category_articles_layout' ) == 'style-1' ) || ( get_theme_mod( 'broden_category_articles_layout' ) == 'style-2' ) ) : ?>
			<?php get_template_part( 'inc/loops/category-articles-layout', get_theme_mod('broden_category_articles_layout') ); ?>
		<?php else : ?>
			<?php get_template_part( 'inc/loops/category-articles-layout', 'style-1', get_theme_mod('broden_category_articles_layout') ); ?>
		<?php endif; ?>
	<?php endif; ?>

	<?php
	/**
	 * Popular Posts
	 */
	?>

	<?php if ( get_theme_mod( 'broden_popular_posts' ) ) : ?>
		<?php if ( ( get_theme_mod( 'broden_popular_posts_layout' ) == 'style-1' ) || ( get_theme_mod( 'broden_popular_posts_layout' ) == 'style-2' ) || ( get_theme_mod( 'broden_popular_posts_layout' ) == 'style-3' ) ) : ?>
			<?php get_template_part( 'inc/loops/popular-posts', get_theme_mod('broden_popular_posts_layout') ); ?>
		<?php else : ?>
			<?php get_template_part( 'inc/loops/popular-posts', 'style-1', get_theme_mod('broden_popular_posts_layout') ); ?>
		<?php endif; ?>
	<?php endif; ?>
	</div><!-- main -->

<?php get_footer(); ?>