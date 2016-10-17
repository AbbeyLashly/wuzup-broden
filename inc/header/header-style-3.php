<?php
/**
 * The template for Header Style 3
 *
 * Displays all of the "header-style-3" header
 *
 * @package Broden Theme
 */

?>
<header class="style-3">

	<div class="mobile-topbar visible-sm visible-xs">
		<div class="container">
			<div class="sidebar-button"><a href="#"><span></span></a></div>
			<div class="search-button search-for-mobile">
				<div class="mobile-search">
					<?php get_search_form(); ?>
					<a title="Search" class="search-toggle"><i class="fa fa-search"></i></a>
				</div><!-- mobile-search -->
			</div><!-- search-button -->
		</div><!-- container -->
	</div><!-- mobile-topbar -->

	<div class="header-bottom visible-lg visible-md">
		<div class="container">
			<nav class="main-menu">

				<?php wp_nav_menu( array( 'theme_location' => 'primary', 'container' => '', 'depth' => 3, 'container_class' => 'navcontent', 'walker' => new broden_navigation_walker(), 'fallback_cb' => ''  ) ); ?>

			</nav><!-- main-menu -->
		</div><!-- container -->
	</div><!-- header-bottom -->

	<div class="header-main">
		<div class="container">

			<div class="social-button">
				<?php if(!get_theme_mod('broden_social_header_links')) : broden_social_header(); endif; ?>
			</div><!-- social-button -->
			
			<?php get_template_part( 'inc/header/logo' ); ?>

			<div class="search-button">
				<div class="dropdown">
					<?php get_search_form(); ?>
					<a title="Search" class="search-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-search"></i></a>
				</div><!-- dropdown -->
			</div><!-- search-button -->

		</div><!-- container -->
	</div><!-- header-main -->

</header><!-- header -->