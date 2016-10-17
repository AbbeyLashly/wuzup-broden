<?php
/**
 * The template for Logo
 *
 * Displays all of the "brand-logo" div
 *
 * @package Broden Theme
 */

?>
<div class="brand-logo">
		
	
		<a href="<?php echo esc_url( home_url( '/' ) ); ?>">
			<?php if(get_theme_mod('broden_logo')) : ?>
				<img src="<?php echo esc_url(get_theme_mod('broden_logo')); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>" class="normal-logo visible-lg visible-md">
			<?php else : ?>
				<img src="<?php echo get_template_directory_uri(); ?>/images/logo.png" alt="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>" class="normal-logo visible-lg visible-md">
			<?php endif; ?>

			<?php if(get_theme_mod('broden_logo_retina')) : ?>
				<img src="<?php echo esc_url(get_theme_mod('broden_logo_retina')); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>" class="mobile-logo visible-sm visible-xs">
			<?php else : ?>
				<img src="<?php echo get_template_directory_uri(); ?>/images/logo@2x.png" alt="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>" class="mobile-logo visible-sm visible-xs">
			<?php endif; ?>

			<?php if(get_theme_mod('broden_logo_fixed')) : ?>
				<img src="<?php echo esc_url(get_theme_mod('broden_logo_fixed')); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>" class="logo-fixed">
			<?php else : ?>
				<img src="<?php echo get_template_directory_uri(); ?>/images/logo-fixed.png" alt="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>" class="logo-fixed">
			<?php endif; ?>
		</a>

	

</div><!-- brand-logo -->