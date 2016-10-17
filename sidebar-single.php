<?php
/**
 * The template for Sidebar Single Post
 *
 * @package Broden Theme
 */

?>

<div class="col-md-4 col-sm-12 col-xs-12 sidebar">

	<?php if ( is_active_sidebar( 'single' ) ) : ?>
	<div class="sidebar-inwrap">

	<?php dynamic_sidebar('single'); ?>

	</div><!-- sidebar-inwrap -->
	<?php endif; ?>


</div><!-- sidebar -->