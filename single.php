<?php
/**
 * WP Theme for displaying all Single Posts.
 *
 * @package Broden Theme
 */

?>

<?php 
	$post_style_select = get_post_meta( get_the_ID(), '_post_style', true ) ? get_post_meta( get_the_ID(), '_post_style', true ) : 'style-1';
?>

<?php get_header(); ?>

<section class="main">

	<section class="blog-main">
		<div class="container">
			<div class="row">

				<?php while ( have_posts() ) : the_post(); ?>

					<?php get_template_part( 'inc/loops/single-'.$post_style_select ); ?>

				<?php endwhile; ?>

			</div><!-- row -->
		</div><!-- container -->
	</section><!-- blog-main -->

</section><!-- main -->

<?php get_footer(); ?>