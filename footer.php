<?php
/**
 * The template part for Footer
 *
 * @package Broden
 */

?>

	<footer>

		<?php if ( get_theme_mod( 'broden_footer_sidebar_activate' ) ) : ?>
		
			<?php get_sidebar( 'footer' ); ?>

		<?php endif; ?>


		<?php if ( get_theme_mod( 'broden_footer_ads_activate' ) ) : ?>

			<?php get_template_part( 'inc/loops/footer-ads', get_theme_mod('broden_footer_ads_activate') ); ?>

		<?php endif; ?>

		<div class="copyright">
			<p><?php echo wp_kses_post(get_theme_mod('broden_copyright')); ?></p>
		</div><!-- copyright -->

		<div class="back-to-top"><a href="#"><i class="fa fa-angle-double-up"></i></a></div>

	</footer>

	</div><!-- blog-inwrap -->
</div><!-- wrapper -->

<?php wp_footer(); ?>
</body>
</html>