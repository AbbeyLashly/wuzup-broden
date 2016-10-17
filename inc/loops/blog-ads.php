<?php
/**
 * The template for Blog Ads
 *
 * @package Broden
 */

?>

<aside class="blog-banner full-width">
	<div class="container">

	<?php 
	$blog_ads = get_theme_mod('broden_blog_ads_url' );
	if (!empty($blog_ads)) : 
		echo $blog_ads;
	else : ?>
		<img src="<?php if (get_theme_mod( 'broden_blog_ads' )) : echo get_theme_mod( 'broden_blog_ads'); else: echo esc_url( get_template_directory_uri() . '/images/980x120-ads.jpg' ); endif; ?> " alt="Ads" />
	<?php endif; ?>

	</div><!-- container -->
</aside><!-- blog-banner -->

