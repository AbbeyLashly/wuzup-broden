<?php
/**
	* The template for displaying woocommerce page
*/
get_header(); ?>

<?php if ( have_posts() ) : ?>
<section class="main">
		<section class="blog-main">
			<div class="container">
				<div class="row">
					<?php if ( have_posts() ) : ?>
						<div class="col-md-12 col-sm-12 col-xs-12 blog-posts">
									<div class="row">
										<div class="col-md-8 col-sm-12 col-xs-12">
											<div class="post-inwrap">
												<div class="post-content post-entry">
													<?php woocommerce_content(); ?>
												</div><!-- post-content -->
											</div><!-- post-inwrap -->
										</div>
										<div class="col-md-4 col-sm-12 col-xs-12 sidebar">
											<?php dynamic_sidebar( 'shop' ); ?>
										</div>
									</div><!-- row -->
						</div><!-- blog-posts -->
					<?php endif; ?>
				</div><!-- row -->
			</div><!-- container -->
		</section><!-- blog-main -->
	</section>
<?php endif; ?>
<?php get_footer(); ?>