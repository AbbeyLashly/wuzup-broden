<?php
/**
 * The template for Sidebar Category Block
 *
 * @package Broden Theme
 */

?>

<div class="col-md-4 col-sm-12 col-xs-12 sidebar" role="complementary" itemscope="itemscope" itemtype="http://schema.org/WPSideBar">

	<?php if ( is_active_sidebar( 'category' ) ) : ?>
	<div class="sidebar-inwrap">

		<?php dynamic_sidebar('category'); ?>

	</div><!-- sidebar-inwrap -->
	<?php endif; ?>
	
</div><!-- sidebar -->