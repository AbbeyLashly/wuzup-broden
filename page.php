<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package Broden
 */

get_header();

$values_layout_select = get_post_custom( get_the_ID() );
$layout_select_meta_box_text = isset( $values_layout_select['layout_select_meta_box_text'] ) ? strip_tags( esc_attr( $values_layout_select['layout_select_meta_box_text'][0] ) ) :'';
?>

	<div class="page-header-title page-title">
		<div class="container">
			<?php the_title( '<h1 class="entry-title page-title">', '</h1>' ); ?>
		</div><!-- container -->
	</div><!-- page-header-title -->

	<section class="main">

		<section class="blog-main">
			<div class="container">
				<div class="row">

					<?php if ( have_posts() ) : ?>

						<div class="col-md-12 col-sm-12 col-xs-12 blog-posts">

							<?php while ( have_posts() ) : the_post(); ?>

								<article id="post-<?php the_ID(); ?>" <?php post_class( 'page-post post post-full-image' ); ?> itemscope="itemscope" itemtype="http://schema.org/Article">

									<?php if(has_post_thumbnail()) : ?>
										<figure class="post-image">
											<?php the_post_thumbnail('broden-post-type-single', array('itemprop'=>'image')); ?>
										</figure><!-- post-image -->
									<?php endif; ?>

									<div class="row">
										<?php 
										if ($layout_select_meta_box_text=='sidebar_on' || $layout_select_meta_box_text=='') { ?>
										<div class="col-md-8 col-sm-12 col-xs-12">
										<?php }
										else { ?>
											<div class="col-md-12 col-sm-12 col-xs-12">
										<?php }
										?>
											<div class="post-inwrap">

												<div class="post-content post-entry">
													<?php the_content(); ?>
													<?php
														wp_link_pages( array(
															'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'broden' ),
															'after'  => '</div>',
														) );
													?>
												</div><!-- post-content -->

												<?php if(!get_theme_mod('broden_hide_post_author_bio')) : ?>
													<?php broden_post_author_bio(); ?>
												<?php endif; ?>

												<?php if ( comments_open() || get_comments_number() ) : comments_template(); endif; ?>

											</div><!-- post-inwrap -->

										</div>

										<?php 
										
										if ($layout_select_meta_box_text=='sidebar_on' || $layout_select_meta_box_text=='') {
											get_sidebar( 'single' );
										}
										else{ }
										?>
										

									</div><!-- row -->

								</article><!-- post -->

							<?php endwhile; ?>

						</div><!-- blog-posts -->

					<?php endif; ?>

				</div><!-- row -->
			</div><!-- container -->
		</section><!-- blog-main -->

	</section>

<?php get_footer(); ?>