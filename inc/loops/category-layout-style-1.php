<?php
/**
 * The template for Category Layout 1
 *
 * @package Broden Theme
 */

?>

<div class="post-block-category">
	<div class="container">
		<div class="row">

			<div class="col-md-8 col-sm-12 col-xs-12 category-posts">

				<?php get_template_part( 'inc/category/category-slider' ); ?>

				<div class="row">
					<div class="col-md-6 col-sm-6 col-xs-12 category-post-column">

						<?php get_template_part( 'inc/category/category-posts-1' ); ?>

					</div><!-- category-post-column -->
					<div class="col-md-6 col-sm-6 col-xs-12 category-post-column">

						<?php get_template_part( 'inc/category/category-posts-2' ); ?>
						
					</div><!-- category-post-column -->
				</div><!-- row -->

			</div><!-- category-post -->

			<?php get_sidebar( 'category' ); ?>

		</div><!-- row -->
	</div><!-- container -->
</div><!-- post-block-category -->