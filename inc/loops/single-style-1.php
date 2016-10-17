<?php
/**
 * The template for Single Post Style 1
 *
 * @package Broden Theme
 */

?>

	<?php broden_set_post_views($post->ID); ?>

	<div class="col-md-8 col-sm-12 col-xs-12 blog-posts">

	<article id="post-<?php the_ID(); ?>" <?php post_class( 'page-post post' ); ?> itemscope="itemscope" itemtype="http://schema.org/Article">

		<div class="post-header">
			<div class="post-cat">
				<ul>
					<li class="cat"><?php the_category('</li><li class="cat">'); ?></li>
				</ul>
			</div><!-- post-cat -->
			<div class="post-title"><?php the_title('<h1 itemprop="name">', '</h1>' ); ?></div>
			<div class="post-meta">
				<div class="post-comment"><?php broden_post_comments_count(); ?></div>
					<?php if(!get_theme_mod('broden_post_date')) : ?>
						<div class="post-date"><i class="fa fa-clock-o"></i> <?php the_time( get_option('date_format') ); ?></div>
					<?php endif; ?>
			</div><!-- post-meta -->
		</div><!-- post-header -->

			<?php broden_post_types(); ?>

			<div class="post-inwrap">

				<?php if(!get_theme_mod('broden_hide_share_view_count')) : ?>
					<div class="social-share">
						<?php broden_social_share(); ?>
						<span class="post-page-views">
							<i class="fa fa-eye"></i>
							<?php echo esc_html(broden_get_post_views(get_the_ID()));?>
							<?php echo esc_html__('Views', 'broden');?>
						</span>
					</div><!-- social-share -->
				<?php endif; ?>

				<div class="post-content post-entry">
					<?php the_content(); ?>
					<?php
						wp_link_pages( array(
							'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'broden' ),
							'after'  => '</div>',
						) );
					?>
				</div><!-- post-content -->
				
				<?php $tags_title = esc_html__( 'Tags:', 'broden' ); ?>
				<?php the_tags( '<div class="post-tags"><span class="single-tag-list-title">' . $tags_title . '</span><ul><li>', '</li> <li>', '</li></ul></div>' ); ?>

				<?php if(!get_theme_mod('broden_hide_post_author_bio')) : ?>
					<?php broden_post_author_bio(); ?>
				<?php endif; ?>

				<?php broden_post_directions(); ?>

				<?php if(!get_theme_mod('broden_hide_related_posts')) : ?>
					<?php broden_related_posts(); ?>
				<?php endif; ?>

				<?php if ( comments_open() || get_comments_number() ) : comments_template(); endif; ?>

		</div><!-- post-inwrap -->

	</article><!-- post -->

</div><!-- blog-posts -->

<?php get_sidebar( 'single' ); ?>