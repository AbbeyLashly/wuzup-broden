<?php
/**
 * The template for Featured Style 2
 *
 * Displays all of the "featured-style" div
 *
 * @package Broden Theme
 */

?>

<div class="blog-feautured">

	<div class="featured-style-2">

		<?php
			$get_exclude_post = get_theme_mod('broden_featured_exclude_post');
			$get_post_id = get_theme_mod('broden_featured_post_id');

			$exclude_post = explode(',',$get_exclude_post);
			$bypostid = explode(',',$get_post_id);

			$args = array(
				'posts_per_page'   => '9',
				'orderby'          => 'date',
				'order'            => 'DESC',
				'meta_key'         => '_post_featured_value',
				'meta_value'       => 'on',
				'post_type'        => 'post',
				'post_status'      => 'publish',
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

			<article <?php post_class(); ?> itemscope="itemscope" itemtype="http://schema.org/Article">
				
				<?php if ( has_post_thumbnail() ) : ?>
					<figure class="post-image">
						<a href="<?php the_permalink() ?>"><?php the_post_thumbnail( 'broden-featured-style-2', array( 'itemprop' => 'image' ) ); ?></a>
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
					</div><!--  -->
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

		<?php endwhile; endif; ?>

	</div><!-- featured-style-2 -->

</div><!-- blog-feautured -->