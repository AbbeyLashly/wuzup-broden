<?php
/**
 * The template for Blog Style 1
 *
 * @package Broden Theme
 */

?>

<?php
	//Wp Customize
	$select_blog_query = get_theme_mod('broden_blog_query_orderby');
	$blog_query_postid = get_theme_mod('broden_blog_query_postid');
	$blog_query_exclude_postid = get_theme_mod('broden_blog_query_exclude_postid');
	$blog_query_ppp = get_theme_mod('broden_blog_query_ppp');


	if( !empty( $blog_query_postid ) ) :
		$bypostidseperator = $blog_query_postid;
		$bypostid = explode( ',', $bypostidseperator );
	else:
		$bypostid = "";
	endif;

	if( !empty( $blog_query_exclude_postid ) ) :
		$excludepostidseperator = $blog_query_exclude_postid;
		$excludepost = explode( ',', $excludepostidseperator );
	else:
		$excludepost = "";
	endif;

	//Paged
	global $paged;
	$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
	if ( get_query_var( 'paged' ) ) { $paged = get_query_var( 'paged' ); }
	elseif ( get_query_var( 'page' ) ) { $paged = get_query_var( 'page' ); }
	else { $paged = 1; }

	//Query
	$blog_query = array(
		'posts_per_page' 			=> $blog_query_ppp,
		'ignore_sticky_posts' 		=> true,
		'post_status'				=> 'publish',
		'post__not_in' 				=> $excludepost,
		'orderby'  				    => $select_blog_query,
		'post_type'        			=> 'post',
		'post_status'     			=> 'publish',
		'paged'          			=> $paged,
		'post__in'					=> $bypostid,
		
	);

	if ($select_blog_query == 'meta_value_num') {
 		$blog_query = wp_parse_args( 
 			array(
				'meta_key'         => 'post_views_count',
 			)
 		, $blog_query );	
 	}
 	else {
 		$blog_query = wp_parse_args( 
 			array()
 		, $blog_query );	
 	}
	$posts = query_posts( $blog_query );
	
	if ( have_posts() ) : ?>
		<div class="col-md-8 col-sm-12 col-xs-12 blog-posts broden-ajax-content">
					<div class="loading-posts"></div>
					<?php $c=0; while ( have_posts() ) : the_post(); $c++;?>
						<?php if( $c == 1) : ?>
							<?php get_template_part('content', 'full'); ?>
						<?php else : ?>
							<?php get_template_part('content', 'list'); ?>
						<?php endif; ?>
					<?php endwhile;?>
			<?php broden_pagination(); ?>
		</div><!-- blog-posts -->
	<?php else : ?>
		<?php get_template_part( 'content', 'none' ); ?>
	<?php endif; wp_reset_query();