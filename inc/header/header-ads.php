<?php
/**
 * The template for Header Adv
 *
 * @package Broden
 */

?>

<div class="header-ads">
		
	<?php 
	$hader_ads = get_theme_mod('broden_header_ads_url' );
	if (!empty($hader_ads)) : 
		echo $hader_ads;
	?>	
	<?php else : ?>
		<img src="<?php if (get_theme_mod( 'broden_header_ads' )) : echo get_theme_mod( 'broden_header_ads'); else: echo esc_url( get_template_directory_uri() . '/images/728x90-ads.jpg' ); endif; ?> " alt="Ads" />
	<?php endif; ?>

</div><!-- header-ads -->

