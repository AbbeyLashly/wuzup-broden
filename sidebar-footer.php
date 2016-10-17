<?php
/**
 * The template for Sidebar Footer
 *
 * @package Broden Theme
 */

?>

<div class="footer-sidebar">
	<div class="container">
		<div class="row">

			<?php if ( is_active_sidebar( 'footer' ) ) : ?>

				<?php dynamic_sidebar('footer'); ?>

			<?php endif; ?>

		</div><!-- row -->
	</div><!-- container -->
</div><!-- footer-sidebar -->