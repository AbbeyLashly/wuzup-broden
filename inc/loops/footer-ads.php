<?php
/**
 * The template for Footer Ads
 *
 * @package Broden
 */

?>

<div class="footer-ads">

	<?php 
	$footer_ads = get_theme_mod('broden_footer_ads_url' );
	if (!empty($footer_ads)) : 
		echo $footer_ads;
	?>
		
	<?php else : ?>
		<img src="<?php if (get_theme_mod( 'broden_footer_ads' )) : echo get_theme_mod( 'broden_footer_ads'); else: echo esc_url( get_template_directory_uri() . '/images/980x120-ads.jpg' ); endif; ?> " alt="Ads" />
	<?php endif; ?>

</div>