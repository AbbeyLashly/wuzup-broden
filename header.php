<?php
/**
 * The template for Header
 *
 * Displays all of the <head> section
 *
 * @package Broden Theme
 */

?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<?php wp_head(); 
	$htmlcodes = get_theme_mod('broden_custom_js');
	echo do_shortcode($htmlcodes);
	?>

</head>

<body <?php body_class(); ?>>
<?php if ( get_theme_mod( 'broden_loader' ) ) : ?>
<div class="preloader">
	<div class="lines">
		<div class="line line-1"></div>
		<div class="line line-2"></div>
		<div class="line line-3"></div>
	</div>
</div>
<?php endif; ?>

<div class="wrapper">
	<?php get_template_part( 'inc/header/mobile-nav' ); ?>
	<div class="blog-inwrap">
	<?php if ( ( get_theme_mod( 'broden_header_layout' ) == 'style-1' ) || ( get_theme_mod( 'broden_header_layout' ) == 'style-2' ) || ( get_theme_mod( 'broden_header_layout' ) == 'style-3' ) ) : ?>
		<?php get_template_part( 'inc/header/header', get_theme_mod('broden_header_layout') ); ?>
	<?php else : ?>
		<?php get_template_part( 'inc/header/header', 'style-1', get_theme_mod('broden_header_layout') ); ?>
	<?php endif; ?>