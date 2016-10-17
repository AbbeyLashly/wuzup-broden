<?php
/**
 * Custom Broden template tags
 *
 * @package Broden
 */

if ( ! function_exists( 'broden_social_header' ) ) :

	function broden_social_header() {
		?>

		<a class="social-toggle"><i class="fa fa-share-alt"></i></a>
		<div class="social-links">
			<ul>
				<?php if ( get_theme_mod( 'broden_facebook_link' ) ) : ?>
				<li><a class="facebook" href="<?php echo esc_url( get_theme_mod( 'broden_facebook_link' ) ); ?>" target="_blank" title="Facebook"><i class="fa fa-facebook"></i></a></li>
				<?php endif; ?>
				<?php if ( get_theme_mod( 'broden_twitter_link' ) ) : ?>
				<li><a class="twitter" href="<?php echo esc_url( get_theme_mod( 'broden_twitter_link' ) ); ?>" target="_blank" title="Twitter"><i class="fa fa-twitter"></i></a></li>
				<?php endif; ?>
				<?php if ( get_theme_mod( 'broden_pinterest_link' ) ) : ?>
				<li><a class="pinterest" href="<?php echo esc_url( get_theme_mod( 'broden_pinterest_link' ) ); ?>" target="_blank" title="Pinterest"><i class="fa fa-pinterest"></i></a></li>
				<?php endif; ?>
				<?php if ( get_theme_mod( 'broden_google_link' ) ) : ?>
				<li><a class="google" href="<?php echo esc_url( get_theme_mod( 'broden_google_link' ) ); ?>" target="_blank" title="Google"><i class="fa fa-google-plus"></i></a></li>
				<?php endif; ?>
				<?php if ( get_theme_mod( 'broden_linkedin_link' ) ) : ?>
				<li><a class="linkedin" href="<?php echo esc_url( get_theme_mod( 'broden_linkedin_link' ) ); ?>" target="_blank" title="Linkedin"><i class="fa fa-linkedin"></i></a></li>
				<?php endif; ?>
				<?php if ( get_theme_mod( 'broden_instagram_link' ) ) : ?>
				<li><a class="instagram" href="<?php echo esc_url( get_theme_mod( 'broden_instagram_link' ) ); ?>" target="_blank" title="Instagram"><i class="fa fa-instagram"></i></a></li>
				<?php endif; ?>
				<?php if ( get_theme_mod( 'broden_youtube_link' ) ) : ?>
				<li><a class="youtube" href="<?php echo esc_url( get_theme_mod( 'broden_youtube_link' ) ); ?>" target="_blank" title="youtube"><i class="fa fa-youtube"></i></a></li>
				<?php endif; ?>
				<?php if ( get_theme_mod( 'broden_tumblr_link' ) ) : ?>
				<li><a class="tumblr" href="<?php echo esc_url( get_theme_mod( 'broden_tumblr_link' ) ); ?>" target="_blank" title="tumblr"><i class="fa fa-tumblr"></i></a></li>
				<?php endif; ?>
			</ul>
		</div>

		<?php
	}

endif;


if ( ! function_exists( 'broden_social_share' ) ) :

	function broden_social_share() {

		$socials = array(
			'facebook',
			'twitter',
			'google',
			'linkedin',
			'pinterest',
		);

		$socials = apply_filters( 'broden_social_share', $socials );
		?>
			<ul>

			<?php if ( in_array( 'facebook', $socials ) ) : ?>
				<li><a class="facebook" href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>" target="_blank"><i class="fa fa-facebook"></i> <span><?php echo esc_html__( 'Share', 'broden' ) ?></span></a></li>
			<?php endif; ?>

			<?php if ( in_array( 'twitter', $socials ) ) : ?>
				<li><a class="twitter" href="https://twitter.com/share?text=<?php echo rawurlencode( get_the_title() ); ?>&amp;url=<?php the_permalink(); ?>" target="_blank"><i class="fa fa-twitter"></i> <span><?php echo esc_html__( 'Tweet', 'broden' ) ?></span></a></li>
			<?php endif; ?>

			<?php if ( in_array( 'google', $socials ) ) : ?>
				<li><a class="google" href="https://plus.google.com/share?url=<?php the_permalink(); ?>" target="_blank"><i class="fa fa-google-plus"></i> <span><?php echo esc_html__( 'Share', 'broden' ) ?></span></a></li>
			<?php endif; ?>

			<?php if ( in_array( 'pinterest', $socials ) ) : ?>
				<li><a class="pinterest" href="//pinterest.com/pin/create/button/?url=<?php echo get_permalink(); ?>&amp;media=<?php echo wp_get_attachment_url( get_post_thumbnail_id() ); ?>&amp;description=<?php echo rawurlencode( get_the_title() ); ?>" target="_blank"><i class="fa fa-pinterest"></i> <span><?php echo esc_html__( 'Pin it', 'broden' ) ?></span></a></li>
			<?php endif; ?>

			</ul>
		<?php
	}

endif;


if ( ! function_exists( 'broden_post_comments_count' ) ) :

	function broden_post_comments_count() {
		if ( ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
			echo '<i class="fa fa-comment-o"></i> <span class="comments-link">';
			comments_popup_link( esc_html__( 'Leave a comment', 'broden' ), esc_html__( '1 Comment', 'broden' ), esc_html__( '% Comments', 'broden' ) );
			echo '</span>';
		}
	}

endif;



if ( ! function_exists( 'broden_get_categories_select' ) ) :

	function broden_get_categories_select() {
		$teh_cats = get_categories();
		$results;
		 
		$count = count($teh_cats);
		for ($i=0; $i < $count; $i++) {
			if (isset($teh_cats[$i]))
				$results[$teh_cats[$i]->slug] = $teh_cats[$i]->name;
		    else
				$count++;
			}
			return $results;
		}

endif;




if ( ! function_exists( 'broden_post_author_bio' ) ) :

	function broden_post_author_bio( $name = false ) {
		$author = get_the_author();
		?>
		
		<div class="post-author">
			<div class="author-image">
				<?php echo get_avatar( get_the_author_meta( 'email' ), $size = '80' ); ?>	
			</div>

			<div class="author-info">

				
					<h3 class="author-name">
						<?php printf( esc_html__( '%s', 'broden' ), $author ); ?>
					</h3>
				

				<p><?php the_author_meta( 'description' ); ?></p>
				<ul>
					<?php if(get_the_author_meta('facebook')) : ?>
						<li><a target="_blank" href="http://facebook.com/<?php echo the_author_meta('facebook'); ?>"><i class="fa fa-facebook"></i></a></li>
					<?php endif; ?>
					<?php if(get_the_author_meta('twitter')) : ?>
						<li><a target="_blank" href="http://twitter.com/<?php echo the_author_meta('twitter'); ?>"><i class="fa fa-twitter"></i></a></li>
					<?php endif; ?>
					<?php if(get_the_author_meta('instagram')) : ?>
						<li><a target="_blank" href="http://instagram.com/<?php echo the_author_meta('instagram'); ?>"><i class="fa fa-instagram"></i></a></li>
					<?php endif; ?>
					<?php if(get_the_author_meta('google')) : ?>
						<li><a target="_blank" href="http://plus.google.com/<?php echo the_author_meta('google'); ?>?rel=author"><i class="fa fa-google-plus"></i></a></li>
					<?php endif; ?>
					<?php if(get_the_author_meta('pinterest')) : ?>
						<li><a target="_blank" href="http://pinterest.com/<?php echo the_author_meta('pinterest'); ?>"><i class="fa fa-pinterest"></i></a></li>
					<?php endif; ?>
					<?php if(get_the_author_meta('tumblr')) : ?>
						<li><a target="_blank" href="http://<?php echo the_author_meta('tumblr'); ?>.tumblr.com/"><i class="fa fa-tumblr"></i></a></li>
					<?php endif; ?>
				</ul>
			</div>
		</div>

		<?php

	}

endif;




if ( ! function_exists( 'broden_comment' ) ) :

	function broden_comment( $comment, $args, $depth ) {

		$GLOBALS['comment'] = $comment;

		extract($args, EXTR_SKIP);
		if ( 'div' == $args[ 'style' ] ) {
			$tag = 'div';
			$add_below = 'comment';
		} else {
			$tag = 'li';
			$add_below = 'div-comment';
		}
		?>

		<<?php echo esc_attr( $tag ); ?> <?php comment_class( empty( $args['has_children'] ) ? 'parent' : '' ); ?> id="comment-<?php comment_ID(); ?>" itemscope="itemscope" itemtype="http://schema.org/Comment">
			<?php if ( 'div' != $args['style'] ) : ?>
			<div id="div-comment-<?php comment_ID(); ?>" class="comment-body">
			<?php endif; ?>
			<div class="comment-image">
				<?php if ( 0 != $args['avatar_size'] ) echo get_avatar( $comment, $args['avatar_size'] ); ?>
			</div>
			<div class="comment-inwrap">
			
				<div class="comment-author">
					<cite itemprop="author"><?php echo get_comment_author_link() ?></cite>
				</div>

				<?php if ( '0' == $comment->comment_approved ) : ?>
				<em class="comment-awaiting-moderation"><?php esc_html__( 'Your comment is awaiting moderation.', 'broden' ) ?></em>
				<br />
				<?php endif; ?>

				<div class="comment-text" itemprop="text">
					<?php comment_text( get_comment_id(), array_merge( $args, array( 'add_below' => $add_below, 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
				</div>

				<?php
				$time_string = '<time class="entry-date published" itemprop="datePublished" datetime="%1$s">%2$s</time>';

				$time_string = sprintf( $time_string,
					esc_attr( get_comment_date( 'c' ) ),
					esc_html( get_comment_date( 'M j, Y' ) )
				);
				?>

				<span class="comment-meta commentmetadata">
					<a href="<?php echo esc_url( get_comment_link( $comment->comment_ID, $args ) ); ?>"><?php echo esc_attr( $time_string ); ?></a>
					<?php edit_comment_link( esc_html__( '(Edit)', 'broden' ), '', '' ); ?>
				</span>

				<?php
				comment_reply_link( array_merge( $args, array(
					'add_below' => $add_below,
					'depth'     => $depth,
					'max_depth' => $args['max_depth'],
					'before'    => '<div class="reply-button">',
					'after'     => '</div>'
				) ) );
				?>

			</div>

			<?php if ( 'div' != $args['style'] ) : ?>
			</div>
			<?php endif; ?>

		<?php
	}
	
endif;




if ( ! function_exists( 'broden_post_directions' ) ) :

	function broden_post_directions( ) {
		global $wp_query, $post;

		// Don't print empty markup on single pages if there's nowhere to navigate.
		if ( is_single() ) {
			$previous = ( is_attachment() ) ? get_post( $post->post_parent ) : get_adjacent_post( false, '', true );
			$next = get_adjacent_post( false, '', false );

			if ( ! $next && ! $previous )
				return;
		}

		$nav_class = ( is_single() ) ? 'post-directions' : 'post-directions navigation-paging';

		?>
		<nav class="<?php echo esc_attr($nav_class); ?>">
		
		<?php if ( is_single() ) : // navigation links for single posts ?>
		<div class="row">
			<div class="col-md-6 col-sm-6 col-xs-12 previous-article">
			<?php
			$prev_post = get_previous_post();
			if ( is_a( $prev_post , 'WP_Post' ) ) { ?>
				<i class="fa fa-angle-left"></i>
				<div class="post-directions-inwrap">
					<span><?php esc_html__( 'Previous Article', 'broden' ); ?></span>
					<a href="<?php echo esc_url(get_permalink( $prev_post->ID )); ?>"><?php echo esc_attr(get_the_title( $prev_post->ID )); ?></a>
				</div><!-- post-directions-inwrap -->
			<?php } 
			?>
			</div><!-- previous-article -->
			<div class="col-md-6 col-sm-6 col-xs-12 next-article">
			<?php
			$next_post = get_next_post();
			if ( is_a( $next_post , 'WP_Post' ) ) { ?>
				<i class="fa fa-angle-right"></i>
				<div class="post-directions-inwrap">
					<span><?php esc_html__( 'Next Article', 'broden' ); ?></span>
					<a href="<?php echo esc_url(get_permalink( $next_post->ID )); ?>"><?php echo esc_attr(get_the_title( $next_post->ID )); ?></a>
				</div><!-- post-directions-inwrap -->
			<?php } 
			?>
			</div><!-- next-article -->

		</div><!-- row -->

		<?php endif; ?>

		</nav>
		<?php
	}

endif;




if ( ! function_exists( 'broden_pagination' ) ) {
	
	function broden_pagination() {  

			if( is_singular() )
				return;

			global $wp_query;

			if( $wp_query->max_num_pages <= 1 )
				return;

			$paged = get_query_var( 'paged' ) ? absint( get_query_var( 'paged' ) ) : 1;
			$max   = intval( $wp_query->max_num_pages );

			if( $paged >= 1 )
				$links[] = $paged;

			if( $paged >= 3 ) {
				$links[] = $paged - 1;
				$links[] = $paged - 2;
			}

			if( ( $paged + 2 ) <= $max ) {
				$links[] = $paged + 2;
				$links[] = $paged + 1;
			}

			echo '<nav class="pagination"><ul>' . "\n";

			if( get_previous_posts_link() )
				printf( '<li style="margin-right:3px;">' . get_previous_posts_link( '<span aria-hidden="true">&laquo;</span>' ) . '</li>' );

			if( ! in_array( 1, $links ) ) {
				$class = 1 == $paged ? ' class="active"' : '';

				printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( 1 ) ), '1' );

				if( ! in_array( 2, $links ) )
					echo '<li><a href="">&middot;&middot;&middot;</a></li>';
			}

			sort( $links );
			foreach ( (array) $links as $link ) {
				$class = $paged == $link ? ' class="active"' : '';
				printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $link ) ), $link );
			}

			if( ! in_array( $max, $links ) ) {
				if( ! in_array( $max - 1, $links ) )
					echo '<li><a href="">&middot;&middot;&middot;</a></li>' . "\n";

				$class = $paged == $max ? ' class="active"' : '';
				printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $max ) ), $max );
			}

			if( get_next_posts_link() )
				printf( '<li>' . get_next_posts_link( '<span aria-hidden="true">&raquo;</span>' ) . '</li>' );

			echo '</ul></nav>' . "\n";


		 
	}
}


if ( ! function_exists( 'broden_post_types' ) ) :

	function broden_post_types() {

		global $wp_embed;

		// Post Format Audio
		$post_embed_audio = get_post_meta( get_the_ID(), 'broden_audio_embed', true );
						
		if($post_embed_audio !== '') {
			$post_embed_audio_output = $wp_embed->run_shortcode('[embed]'.$post_embed_audio.'[/embed]');
			} else {
				$post_embed_audio_output = '';
		}

		// Post Format Video
		$post_embed_video = get_post_meta( get_the_ID(), 'broden_video_embed', true );
						
		if($post_embed_video !== '') {
			$post_embed_video_output = $wp_embed->run_shortcode('[embed]'.$post_embed_video.'[/embed]');
			} else {
				$post_embed_video_output = '';
		}

		// Post Format Gallery
		$gallery_images_data = get_post_meta( get_the_ID(), 'broden_gallery_file_list', true );
						
		if($gallery_images_data !== '') {
			$post_embed_gallery_output = '';

			foreach ($gallery_images_data as $gallery_image) {
				$post_embed_gallery_output .= '<a href="'.esc_url($gallery_image).'" class="lightbox-image" title="'.get_the_title().'"><img src="'.esc_url($gallery_image).'" alt="'.get_the_title().'"/></a>';
			}
		}?>
		
		<?php if(has_post_format('gallery')) : ?>

				<figure class="post-gallery">
					<?php echo wp_kses_post($post_embed_gallery_output); ?>
				</figure><!-- post-gallery -->

			<?php elseif(has_post_format('video')) : ?>
								
				<figure class="post-video">
					<?php echo ($post_embed_video_output); ?>
				</figure><!-- post-video -->

			<?php elseif(has_post_format('audio')) : ?>

				<figure class="post-audio">
					<?php echo ($post_embed_audio_output); ?>
				</figure><!-- post-audio -->

			<?php else : ?>

			<?php if(has_post_thumbnail()) : ?>
				<figure class="post-image">
					<?php the_post_thumbnail('broden-post-type-thumb', array('itemprop'=>'image')); ?>
				</figure><!-- post-image -->
			<?php endif; ?>

			<?php endif; ?>
	<?php
	}

endif;



if ( ! function_exists( 'broden_related_posts' ) ) :

	function broden_related_posts() {
		
	global $post;

		$args = array(
			'post__not_in' => array( $post->ID ),
			'posts_per_page' => 4,
			'orderby' => 'rand'
		);

		$cats_array = array();

		$cat_ids = wp_get_post_categories( $post->ID, array( 'fields' => 'ids' ) );

		foreach ( $cat_ids as $cat ) {
			$cats_array[] = $cat;
		}

		$cats_array  = array_map( 'absint', $cats_array );

		$args[ 'category__in' ] = $cats_array;

		$related_query = new WP_Query( $args );

		if ( $related_query->have_posts() ) : ?>

			<aside class="related-posts">

				<div class="related-posts-inwrap">

					<div class="row">

						<?php while ( $related_query->have_posts() ) : $related_query->the_post();?>

							<article <?php post_class( 'col-md-6 col-sm-6 col-xs-12 grid-style post-hover' ); ?> itemscope="itemscope" itemtype="http://schema.org/Article">

								<?php if ( has_post_thumbnail() ) : ?>
									<figure class="post-image">
										<a href="<?php the_permalink() ?>"><?php the_post_thumbnail( 'broden-post-type-thumb', array( 'itemprop' => 'image' ) ); ?></a>
									</figure>
								<?php else : ?>
									<?php echo	'<figure class="post-image">
													<a href="' . get_permalink() . '">
														<img src="' . get_template_directory_uri() . '/images/default-post-image.jpg" alt="'.the_title_attribute("echo=0").'" />
													</a>
												</figure>' 
									?>
								<?php endif; ?>

								<div class="post-inwrap">

									<?php the_title( '<h4 itemprop="name" class="entry-title"><a itemprop="url" href="'.get_permalink().'" title="'.the_title_attribute("echo=0").'">', '</a></h4>' ); ?>

									<div class="post-meta">
													
										<div class="post-comment">
											<?php broden_post_comments_count(); ?>
										</div><!-- post-comment -->

										<?php if(!get_theme_mod('broden_post_date')) : ?>
											<div class="post-date"><i class="fa fa-clock-o"></i> <?php the_time( get_option('date_format') ); ?></div>
										<?php endif; ?>
													
									</div><!-- post-meta -->

								</div><!-- post-inwrap -->

							</article>

						<?php endwhile; wp_reset_postdata(); ?>

					</div><!-- row -->

				</div><!-- related-posts-inwrap -->

			</aside><!-- related-posts -->

		<?php endif; ?>
		<?php
	}

endif;

/*------------- PAGE LAYOUT SIDEBAR SETTINGS START -------------*/
function broden_layout_select_meta_box_save( $post_id )
{
    // Bail if we're doing an auto save
    if( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;
     
    // if our nonce isn't there, or we can't verify it, bail
    if( !isset( $_POST['meta_box_nonce'] ) ) return;
     
    // if our current user can't edit this post, bail
    if( !current_user_can( 'edit_post', $post_id ) ) return;
     
    // Make sure your data is set before trying to save it
    if( isset( $_POST['layout_select_meta_box_text'] ) )
        update_post_meta( $post_id, 'layout_select_meta_box_text', addslashes( $_POST['layout_select_meta_box_text'] ) );

}
add_action( 'save_post', 'broden_layout_select_meta_box_save' );



function broden_layout_select_meta_box_add()
{
	add_meta_box( 'my-meta-box-id_layout_select', esc_html__( 'Sidebar Settings', 'broden' ), 'broden_layout_select_meta_box_layout_select', 'page', 'side', 'low' );
}
add_action( 'add_meta_boxes', 'broden_layout_select_meta_box_add' );

function broden_layout_select_meta_box_layout_select()
{
    // $post is already set, and contains an object: the WordPress post
    global $post;
    $values_layout_select = get_post_custom( $post->ID );
	$layout_select = isset( $values_layout_select['layout_select_meta_box_text'] ) ? strip_tags( esc_attr( $values_layout_select['layout_select_meta_box_text'][0] ) ) :'';
    if( $layout_select == "" ) {
		$layout_select = '';
	}
    // We'll use this nonce field later on when saving.
    wp_nonce_field( 'layout_select_meta_box_nonce', 'meta_box_nonce' );
	
	?>
    <p>
		<select name='layout_select_meta_box_text'>
			<option value="" <?php if ( $layout_select == "" ) : echo "selected"; endif; ?>><?php echo esc_html__( 'Sidebar Settings', 'broden' ); ?></option>
			<option value="sidebar_on" <?php if ( $layout_select == "sidebar_on" ) : echo "selected"; endif; ?>><?php echo esc_html__( 'Sidebar On', 'broden' ); ?></option>
			<option value="sidebar_off" <?php if ( $layout_select == "sidebar_off" ) : echo "selected"; endif; ?>><?php echo esc_html__( 'Sidebar Off', 'broden' ); ?></option>
		</select>
    </p>		
    <?php    
}
/*------------- PAGE LAYOUT SIDEBAR SETTINGS END -------------*/


/*------------- SVG IMAGE UPLOAD START -------------*/
function cc_mime_types($mimes) {
  $mimes['svg'] = 'image/svg+xml';
  return $mimes;
}
add_filter('upload_mimes', 'cc_mime_types');
/*------------- SVG IMAGE UPLOAD END -------------*/