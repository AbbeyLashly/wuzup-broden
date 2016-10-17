<?php
/**
 * The template for Mobile Navigation
 *
 * Displays all of the "sidebar-navigation" section
 *
 * @package Broden Theme
 */

?>

<div class="sidebar-navigation">
	<div class="sidebar-scroll scrollbar-macosx">

		<div class="close-sidebar-button">
			<a href="#" class="close-btn"><span><?php echo esc_html__( 'Close Sidebar', 'broden' ); ?></span><i class="fa fa-close"></i></a>
		</div><!-- close-sidebar-button -->

		<div class="sidebar-navigation-logo"></div>
		<nav class="navbar">
			<?php wp_nav_menu( array( 'theme_location' => 'secondary', 'container' => false, 'menu_class' => 'mobile-menu' ) ); ?>
		</nav><!-- navbar -->

		<div class="sidebar-navigation-social"></div>

		<div class="sidebar-navigation-copyright"></div>

	</div><!-- sidebar-scroll -->
</div><!-- sidebar-navigation -->

<div class="sidebar-overlay close-btn"></div>