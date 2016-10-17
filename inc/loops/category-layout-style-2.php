<?php
/**
 * The template for Category Layout 2
 *
 * @package Broden Theme
 */

?>

<div class="post-block-category">
	<div class="container">
		<div class="row">
			<div class="col-md-12 col-sm-12 col-xs-12 category-posts">
				<div class="row">

					<div class="col-md-4 col-sm-12 col-xs-12 category-post-column">

						<?php get_template_part( 'inc/category/category-posts-1' ); ?>

					</div><!-- category-post-column -->

					<div class="col-md-4 col-sm-12 col-xs-12 category-post-column">

						<?php get_template_part( 'inc/category/category-posts-2' ); ?>

					</div><!-- category-post-column -->

					<div class="col-md-4 col-sm-12 col-xs-12 category-post-column">

						<?php get_template_part( 'inc/category/category-posts-3' ); ?>

					</div><!-- category-post-column -->

				</div><!-- row -->
			</div><!-- category-post -->
		</div><!-- row -->
	</div><!-- container -->
</div><!-- post-block-category -->