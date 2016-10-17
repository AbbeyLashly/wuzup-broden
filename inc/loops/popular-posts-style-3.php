<?php
/**
 * The template for Popular Posts Style 1
 *
 * @package Broden Theme
 */

?>

<div class="post-block-trending">
	<div class="container">

		<div class="trending-post-title">
			<h3><?php echo esc_html__('Most Popular Posts', 'broden') ?></h3>
		</div>
	
		<div class="trending-style-3">
			<div class="row">

				<?php
					$get_exclude_post = get_theme_mod('broden_popular_posts_layout_exclude_post');
					$get_post_id = get_theme_mod('broden_popular_posts_layout_post_id');

					$exclude_post = explode(',',$get_exclude_post);
					$bypostid = explode(',',$get_post_id);

					$args = array(
						'posts_per_page'   => '6',
						'orderby'          => 'meta_value',
						'order'            => 'DESC',
						'meta_key'         => 'post_views_count',
						'post_type'        => 'post',
						'post_status'      => 'publish',
						'suppress_filters' => 0,
						'ignore_sticky_posts' => true,
						'post__not_in' 	   => $exclude_post,
					);

					if (!empty($get_post_id)) {
				 		$args = wp_parse_args( 
				 			array(
								'post__in'		   => $bypostid,
				 			)
				 		, $args );	
				 	}
				 	else {
				 		$args = wp_parse_args( 
				 			array()
				 		, $args );	
				 	}
				?>

				<?php $query = new WP_Query( $args ); ?>

				<?php if ($query->have_posts()) : while ($query->have_posts()) : $query->the_post(); ?>

					<article <?php post_class('col-md-4 col-sm-6 col-xs-12'); ?> itemscope="itemscope" itemtype="http://schema.org/Article">
						
						<?php if ( has_post_thumbnail() ) : ?>
							<figure class="post-image">
								<a href="<?php the_permalink() ?>"><?php the_post_thumbnail( 'broden-trending-style-2', array( 'itemprop' => 'image' ) ); ?></a>
							</figure>
						<?php endif; ?>

						<div class="post-inwrap">
							<div class="post-cat">
								<ul>
									<li class="cat"><?php the_category('</li><li class="cat">'); ?></li>
								</ul>
							</div><!-- post-cat -->
							<div class="post-title">
								<?php the_title( '<h2 itemprop="name" class="entry-title"><a itemprop="url" href="'.get_permalink().'" title="'.the_title_attribute("echo=0").'">', '</a></h2>' ); ?>
							</div><!-- post-title -->
							<div class="post-meta">
								
								<div class="post-comment">
									<?php broden_post_comments_count(); ?>
								</div><!-- post-comment -->

								<?php if(!get_theme_mod('broden_post_date')) : ?>
									<div class="post-date"><i class="fa fa-clock-o"></i> <?php the_time( get_option('date_format') ); ?></div>
								<?php endif; ?>
									
							</div><!-- post-meta -->
						</div><!-- post-inwrap -->

					</article><!-- post -->

				<?php endwhile; endif; wp_reset_postdata(); ?>

			</div><!-- row -->
		</div><!-- trending-style-1 -->
	</div><!-- container -->
</div><!-- post-block-trending -->