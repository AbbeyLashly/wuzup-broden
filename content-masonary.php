<?php
/**
 * The template for Masonary Post.
 *
 * @package Broden
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('col-md-4 col-sm-6 col-xs-12 post grid-style'); ?> itemscope="itemscope" itemtype="http://schema.org/Article">

	<?php if ( has_post_thumbnail() ) : ?>
		<figure class="post-image">
			<a href="<?php the_permalink() ?>" title="<?php the_title(); ?>"><?php the_post_thumbnail( 'broden-trending-style-2', array( 'itemprop' => 'image' ) ); ?></a>
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
				<div class="post-date"><a href="<?php echo esc_url(get_permalink()) ?>"><i class="fa fa-clock-o"></i> <?php the_time( get_option('date_format') ); ?></a></div>
			<?php endif; ?>

		</div><!-- post-meta -->

		<div class="post-content post-entry">
			<p><?php echo broden_string_limit_words(get_the_excerpt(), 31); ?>&hellip;</p>
		</div> <!-- post-entry -->

	</div><!-- post-inwrap -->

</article><!-- post -->