<?php
/**
 * The template for displaying comments.
 *
 * The area of the page that contains both current comments
 * and the comment form.
 *
 * @package Broden
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}
?>

<div id="comments" class="comments-area post-comments">

	<?php // You can start editing here -- including this comment! ?>

	<?php if ( have_comments() ) : ?>
		<div class="comments-title">
			<h3>
				<a class="expanded">
				<?php
					printf( _nx( '1 comment', '%1$s comments', get_comments_number(), 'comments title', 'broden' ),
						number_format_i18n( get_comments_number() ), '<span>' . get_the_title() . '</span>' );
				?>
				</a>
			</h3>
		</div><!-- comments-title -->
		<ul class="comment-list">
			<?php
				wp_list_comments( array(
					'short_ping'  => true,
					'avatar_size' => 60,
					'callback' => 'broden_comment'
				) );
			?>
		</ul><!-- .comment-list -->

		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // are there comments to navigate through ?>
		<nav id="comment-nav-below" class="comment-navigation" role="navigation">
			<h3 class="screen-reader-text"><?php esc_html__( 'Comment navigation', 'broden' ); ?></h3>
			<span class="nav-previous"><?php previous_comments_link( esc_html__( 'Older Comments', 'broden' ) ); ?></span>
			<span class="nav-next"><?php next_comments_link( esc_html__( 'Newer Comments', 'broden' ) ); ?></span>
		</nav><!-- #comment-nav-below -->
		<?php endif; // check for comment navigation ?>

	<?php endif; // have_comments() ?>

	<?php
		// If comments are closed and there are comments, let's leave a little note, shall we?
		if ( ! comments_open() && '0' != get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) :
	?>
		<p class="no-comments"><?php esc_html__( 'Comments are closed.', 'broden' ); ?></p>
	<?php endif; ?>

	<?php
	$commenter = wp_get_current_commenter();
	$req = get_option( 'require_name_email' );
	$aria_req = ( $req ? ' aria-required="true" data-required="true"' : '' );

	$broden_comments_args = array(
		'class_submit'			=> 'btn btn-default button',
		'title_reply'			=> '<span>' .esc_html__('Leave a Reply', 'broden') .'</span>',
		'cancel_reply_link'		=> esc_html__('Cancel Reply', 'broden'),
		'label_submit'			=> esc_html__('Submit Comment', 'broden'),
		'comment_notes_after'	=> '',
		'comment_notes_before'	=> '<div class="col-sm-12"><p class="comment-notes">' . esc_html__( 'Your email address will not be published. Required fields are marked *', 'broden' ) . '</p></div>',
		'comment_field'			=> '<div class="col-sm-12"><p class="comment-form-comment"><label for="comment">' . esc_html__( 'Comment', 'broden' ) . '</label><textarea id="comment" name="comment" cols="45" rows="8" aria-required="true" class="form-control"></textarea></p></div>',
		
		'fields' => apply_filters( 'comment_form_default_fields', array(
			'author'		=> 
				'<div class="col-sm-6"><p class="comment-form-author">' .'<label for="author">' . esc_html__( 'Name', 'broden' ) . ( $req ? '<span class="required"> *</span>' : '' ) . '</label> ' .'<input id="author" name="author"  class="form-control" type="text" value="' . esc_attr( $commenter['comment_author'] ) .'" size="30"' . $aria_req . ' /></p></div>',
			'email'		 	=> 
				'<div class="col-sm-6"><p class="comment-form-email"><label for="email">' . esc_html__( 'E-mail', 'broden' ) . ( $req ? '<span class="required"> *</span>' : '' ).'</label> '  .'<input id="email" name="email"  class="form-control" type="email" value="' . esc_attr(  $commenter['comment_author_email'] ) .'" size="30"' . $aria_req . ' /></p></div>',
			'url'		 	=> 
				'<div class="col-sm-12"><p class="comment-form-url"><label for="url">' .esc_html__( 'Web Site', 'broden' ) . '</label>' .'<input id="url" name="url" class="form-control" type="text" value="' . esc_attr( $commenter['comment_author_url'] ) .'" size="30"' . $aria_req . ' /></p></div>',
			)
		),
	);
	?>

	<?php comment_form( $broden_comments_args ); ?>

</div><!-- #comments -->
