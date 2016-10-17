<?php
/**
 * Custom social widget
 *
 * @package Broden
 */

class Broden_Widget_Social extends WP_Widget {

	function Broden_Widget_Social() {

		$widget_ops = array(
			'classname' => 'social-media-widget', 
			'description' => esc_html__( 'Use this widget to display your social accounts.', 'broden' ) 
		);
		
		parent::__construct(
			'broden_widget_social',
			esc_html__( 'Broden - Custom Social Icons' , 'broden' ),
			$widget_ops
		);
	}

	function widget( $args, $instance ) {

		extract( $args );
		
		$title = apply_filters( 'widget_title', $instance[ 'title' ] );
		$target = isset( $instance[ 'target' ] ) ? $instance[ 'target' ] : false;
		if ( ! $target ) {
			$target = false;
		}
		$facebook = ( isset( $instance[ 'facebook' ] ) ) ? $instance[ 'facebook' ] : '';
		$twitter = ( isset( $instance[ 'twitter' ] ) ) ? $instance[ 'twitter' ] : '';
		$dribbble = ( isset( $instance[ 'dribbble' ] ) ) ? $instance[ 'dribbble' ] : '';
		$linkedin = ( isset( $instance[ 'linkedin' ] ) ) ? $instance[ 'linkedin' ] : '';
		$flickr = ( isset( $instance[ 'flickr' ] ) ) ? $instance[ 'flickr' ] : '';
		$tumblr = ( isset( $instance[ 'tumblr' ] ) ) ? $instance[ 'tumblr' ] : '';
		$vimeo = ( isset( $instance[ 'vimeo' ] ) ) ? $instance[ 'vimeo' ] : '';
		$youtube = ( isset( $instance[ 'youtube' ] ) ) ? $instance[ 'youtube' ] : '';
		$instagram = ( isset( $instance[ 'instagram' ] ) ) ? $instance[ 'instagram' ] : '';
		$google = ( isset( $instance[ 'google' ] ) ) ? $instance[ 'google' ] : '';
		$foursquare = ( isset( $instance[ 'foursquare' ] ) ) ? $instance[ 'foursquare' ] : '';
		$pinterest = ( isset( $instance[ 'pinterest' ] ) ) ? $instance[ 'pinterest' ] : '';
		$deviantart = ( isset( $instance[ 'deviantart' ] ) ) ? $instance[ 'deviantart' ] : '';
		$behance = ( isset( $instance[ 'behance' ] ) ) ? $instance[ 'behance' ] : '';

		echo wp_kses_post( $args['before_widget'] );

		if ( $title ) { 
			echo wp_kses_post( $args['before_title'] . $title . $args['after_title'] );
		}
		?>

		<?php $target = ( $target ) ? 'target="_blank"' : ''; ?>
			
		<ul class="site-follow">
			<?php if ( $facebook != '' ) : ?>
				<li><div><a class="facebook" href="<?php echo esc_url( $facebook ); ?>" <?php echo esc_attr( $target ); ?>><i class="fa fa-facebook"></i> <?php echo esc_html__('Facebook', 'broden'); ?> <span><?php echo esc_html__('Like', 'broden'); ?></span></a></div></li>
			<?php endif; ?>
			<?php if ( $twitter != '' ) : ?>
				<li><div><a class="twitter" href="<?php echo esc_url( $twitter ); ?>" <?php echo esc_attr( $target ); ?>><i class="fa fa-twitter"></i> <?php echo esc_html__('Twitter', 'broden'); ?> <span><?php echo esc_html__('Follow', 'broden'); ?></span></a></div></li>
			<?php endif; ?>
			<?php if ( $dribbble != '' ) : ?>
				<li><div><a class="dribble" href="<?php echo esc_url( $dribbble ); ?>" <?php echo esc_attr( $target ); ?>><i class="fa fa-dribbble"></i> <?php echo esc_html__('Dribble', 'broden'); ?> <span><?php echo esc_html__('Follow', 'broden'); ?></span></a></div></li>
			<?php endif; ?>
			<?php if ( $linkedin != '' ) : ?>
				<li><div><a class="linkedin" href="<?php echo esc_url( $linkedin ); ?>" <?php echo esc_attr( $target ); ?>><i class="fa fa-linkedin"></i> <?php echo esc_html__('Linkedin', 'broden'); ?> <span><?php echo esc_html__('Follow', 'broden'); ?></span></a></div></li>
			<?php endif; ?>
			<?php if ( $flickr != '' ) : ?>
				<li><div><a class="flickr" href="<?php echo esc_url( $flickr ); ?>" <?php echo esc_attr( $target ); ?>><i class="fa fa-flickr"></i> <?php echo esc_html__('Flickr', 'broden'); ?> <span><?php echo esc_html__('Follow', 'broden'); ?></span></a></div></li>
			<?php endif; ?>
			<?php if ( $tumblr != '' ) : ?>
				<li><div><a class="tumblr" href="<?php echo esc_url( $tumblr ); ?>" <?php echo esc_attr( $target ); ?>><i class="fa fa-tumblr"></i> <?php echo esc_html__('Tumblr', 'broden'); ?> <span><?php echo esc_html__('Follow', 'broden'); ?></span></a></div></li>
			<?php endif; ?>
			<?php if ( $vimeo != '' ) : ?>
				<li><div><a class="vimeo" href="<?php echo esc_url( $vimeo ); ?>" <?php echo esc_attr( $target ); ?>><i class="fa fa-vimeo"></i> <?php echo esc_html__('Vimeo', 'broden'); ?> <span><?php echo esc_html__('Follow', 'broden'); ?></span></a></div></li>
			<?php endif; ?>
			<?php if ( $youtube != '' ) : ?>
				<li><div><a class="youtube" href="<?php echo esc_url( $youtube ); ?>" <?php echo esc_attr( $target ); ?>><i class="fa fa-youtube"></i> <?php echo esc_html__('Youtube', 'broden'); ?> <span><?php echo esc_html__('Subscribe', 'broden'); ?></span></a></div></li>
			<?php endif; ?>
			<?php if ( $instagram != '' ) : ?>
				<li><div><a class="instagram" href="<?php echo esc_url( $instagram ); ?>" <?php echo esc_attr( $target ); ?>><i class="fa fa-instagram"></i> <?php echo esc_html__('Instagram', 'broden'); ?> <span><?php echo esc_html__('Follow', 'broden'); ?></span></a></div></li>
			<?php endif; ?>
			<?php if ( $google != '' ) : ?>
				<li><div><a class="google" href="<?php echo esc_url( $google ); ?>" <?php echo esc_attr( $target ); ?>><i class="fa fa-google-plus"></i> <?php echo esc_html__('Google', 'broden'); ?> <span><?php echo esc_html__('Like', 'broden'); ?></span></a></div></li>
			<?php endif; ?>
			<?php if ( $foursquare != '' ) : ?>
				<li><div><a class="foursquare" href="<?php echo esc_url( $foursquare ); ?>" <?php echo esc_attr( $target ); ?>><i class="fa fa-foursquare"></i> <?php echo esc_html__('Foursquare', 'broden'); ?> <span><?php echo esc_html__('Follow', 'broden'); ?></span></a></div></li>
			<?php endif; ?>
			<?php if ( $pinterest != '' ) : ?>
				<li><div><a class="pinterest" href="<?php echo esc_url( $pinterest ); ?>" <?php echo esc_attr( $target ); ?>><i class="fa fa-pinterest"></i> <?php echo esc_html__('Pinterest', 'broden'); ?> <span><?php echo esc_html__('Follow', 'broden'); ?></span></a></div></li>
			<?php endif; ?>
			<?php if ( $deviantart != '' ) : ?>
				<li><div><a class="deviantart" href="<?php echo esc_url( $deviantart ); ?>" <?php echo esc_attr( $target ); ?>><i class="fa fa-deviantart"></i> <?php echo esc_html__('Deviantart', 'broden'); ?> <span><?php echo esc_html__('Follow', 'broden'); ?></span></a></div></li>
			<?php endif; ?>
			<?php if ( $behance != '' ) : ?>
				<li><div><a class="behance" href="<?php echo esc_url( $behance ); ?>" <?php echo esc_attr( $target ); ?>><i class="fa fa-behance"></i> <?php echo esc_html__('Behance', 'broden'); ?> <span><?php echo esc_html__('Follow', 'broden'); ?></span></a></div></li>
			<?php endif; ?>
		</ul>
	
		<?php
		echo wp_kses_post( $args['after_widget'] );
	}

	function update( $new_instance, $old_instance ) {
		
		$instance = $old_instance;
		
		$instance[ 'title' ] = strip_tags( $new_instance[ 'title' ] );
		$instance[ 'target' ] = isset( $new_instance[ 'target' ] ) ? (bool) $new_instance[ 'target' ] : false;
		$instance[ 'facebook' ] = strip_tags( $new_instance[ 'facebook' ] );
		$instance[ 'twitter' ] = strip_tags( $new_instance[ 'twitter' ] );
		$instance[ 'dribbble' ] = strip_tags( $new_instance[ 'dribbble' ] );
		$instance[ 'linkedin' ] = strip_tags( $new_instance[ 'linkedin' ] );
		$instance[ 'flickr' ] = strip_tags( $new_instance[ 'flickr' ] );
		$instance[ 'tumblr' ] = strip_tags( $new_instance[ 'tumblr' ] );
		$instance[ 'vimeo' ] = strip_tags( $new_instance[ 'vimeo' ] );
		$instance[ 'youtube' ] = strip_tags( $new_instance[ 'youtube' ] );
		$instance[ 'instagram' ] = strip_tags( $new_instance[ 'instagram' ] );
		$instance[ 'google' ] = strip_tags( $new_instance[ 'google' ] );
		$instance[ 'foursquare' ] = strip_tags( $new_instance[ 'foursquare' ] );
		$instance[ 'pinterest' ] = strip_tags( $new_instance[ 'pinterest' ] );
		$instance[ 'deviantart' ] = strip_tags( $new_instance[ 'deviantart' ] );
		$instance[ 'behance' ] = strip_tags( $new_instance[ 'behance' ] );

		return $instance;
	}

	function form( $instance ) {

		$title = isset( $instance[ 'title' ] ) ? esc_attr( $instance[ 'title' ] ) : '';
		$target = isset( $instance[ 'target' ] ) ? (bool) $instance[ 'target' ] : false;
		$facebook = isset( $instance[ 'facebook' ] ) ? esc_attr( $instance[ 'facebook' ] ) : '';
		$twitter = isset( $instance[ 'twitter' ] ) ? esc_attr( $instance[ 'twitter' ] ) : '';
		$dribbble = isset( $instance[ 'dribbble' ] ) ? esc_attr( $instance[ 'dribbble' ] ) : '';
		$linkedin = isset( $instance[ 'linkedin' ] ) ? esc_attr( $instance[ 'linkedin' ] ) : '';
		$flickr = isset( $instance[ 'flickr' ] ) ? esc_attr( $instance[ 'flickr' ] ) : '';
		$tumblr = isset( $instance[ 'tumblr' ] ) ? esc_attr( $instance[ 'tumblr' ] ) : '';
		$vimeo = isset( $instance[ 'vimeo' ] ) ? esc_attr( $instance[ 'vimeo' ] ) : '';
		$youtube = isset( $instance[ 'youtube' ] ) ? esc_attr( $instance[ 'youtube' ] ) : '';
		$instagram = isset( $instance[ 'instagram' ] ) ? esc_attr( $instance[ 'instagram' ] ) : '';
		$google = isset( $instance[ 'google' ] ) ? esc_attr( $instance[ 'google' ] ) : '';
		$foursquare = isset( $instance[ 'foursquare' ] ) ? esc_attr( $instance[ 'foursquare' ] ) : '';
		$pinterest = isset( $instance[ 'pinterest' ] ) ? esc_attr( $instance[ 'pinterest' ] ) : '';
		$deviantart = isset( $instance[ 'deviantart' ] ) ? esc_attr( $instance[ 'deviantart' ] ) : '';
		$behance = isset( $instance[ 'behance' ] ) ? esc_attr( $instance[ 'behance' ] ) : '';
		?>
		
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php echo esc_html__( 'Title:', 'broden' ) ?></label>
			<input type="text" class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" value="<?php echo esc_attr( $title ); ?>">
		</p>

		<p>
			<input class="checkbox" type="checkbox" <?php checked( $target ); ?> id="<?php echo esc_attr( $this->get_field_id( 'target' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'target' ) ); ?>" />
			<label for="<?php echo esc_attr( $this->get_field_id( 'target' ) ); ?>"><?php echo esc_html__( 'Open social links in a new window/tab?', 'broden' ); ?></label>
		</p>

		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'facebook' ) ); ?>"><?php echo esc_html__( 'Facebook URL:', 'broden' ) ?></label>
			<input type="text" class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'facebook' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'facebook' ) ); ?>" value="<?php echo esc_attr( $facebook ); ?>">
		</p>

		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'twitter' ) ); ?>"><?php echo esc_html__( 'Twitter URL:', 'broden' ) ?></label>
			<input type="text" class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'twitter' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'twitter' ) ); ?>" value="<?php echo esc_attr( $twitter ); ?>">
		</p>

		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'dribbble' ) ); ?>"><?php echo esc_html__( 'Dribbble URL:', 'broden' ) ?></label>
			<input type="text" class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'dribbble' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'dribbble' ) ); ?>" value="<?php echo esc_attr( $dribbble ); ?>">
		</p>

		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'linkedin' ) ); ?>"><?php echo esc_html__( 'LinkedIn URL:', 'broden' ) ?></label>
			<input type="text" class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'linkedin' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'linkedin' ) ); ?>" value="<?php echo esc_attr( $linkedin ); ?>">
		</p>

		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'flickr' ) ); ?>"><?php echo esc_html__( 'Flickr URL:', 'broden' ) ?></label>
			<input type="text" class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'flickr' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'flickr' ) ); ?>" value="<?php echo esc_attr( $flickr ); ?>">
		</p>

		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'tumblr' ) ); ?>"><?php echo esc_html__( 'Tumblr URL:', 'broden' ) ?></label>
			<input type="text" class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'tumblr' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'tumblr' ) ); ?>" value="<?php echo esc_attr( $tumblr ); ?>">
		</p>

		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'vimeo' ) ); ?>"><?php echo esc_html__( 'Vimeo URL:', 'broden' ) ?></label>
			<input type="text" class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'vimeo' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'vimeo' ) ); ?>" value="<?php echo esc_attr( $vimeo ); ?>">
		</p>

		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'youtube' ) ); ?>"><?php echo esc_html__( 'Youtube URL:', 'broden' ) ?></label>
			<input type="text" class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'youtube' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'youtube' ) ); ?>" value="<?php echo esc_attr( $youtube ); ?>">
		</p>

		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'instagram' ) ); ?>"><?php echo esc_html__( 'Instagram URL:', 'broden' ) ?></label>
			<input type="text" class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'instagram' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'instagram' ) ); ?>" value="<?php echo esc_attr( $instagram ); ?>">
		</p>

		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'google' ) ); ?>"><?php echo esc_html__( 'Google Plus URL:', 'broden' ) ?></label>
			<input type="text" class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'google' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'google' ) ); ?>" value="<?php echo esc_attr( $google ); ?>">
		</p>

		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'foursquare' ) ); ?>"><?php echo esc_html__( 'Foursquare URL:', 'broden' ) ?></label>
			<input type="text" class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'foursquare' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'foursquare' ) ); ?>" value="<?php echo esc_attr( $foursquare ); ?>">
		</p>

		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'pinterest' ) ); ?>"><?php echo esc_html__( 'Pinterest URL:', 'broden' ) ?></label>
			<input type="text" class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'pinterest' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'pinterest' ) ); ?>" value="<?php echo esc_attr( $pinterest ); ?>">
		</p>

		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'deviantart' ) ); ?>"><?php echo esc_html__( 'DeviantART URL:', 'broden' ) ?></label>
			<input type="text" class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'deviantart' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'deviantart' ) ); ?>" value="<?php echo esc_attr( $deviantart ); ?>">
		</p>

		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'behance' ) ); ?>"><?php echo esc_html__( 'Behance URL:', 'broden' ) ?></label>
			<input type="text" class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'behance' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'behance' ) ); ?>" value="<?php echo esc_attr( $behance ); ?>">
		</p>
	
	<?php
	}

}

add_action( 'widgets_init', 'broden_social_widget' );

function broden_social_widget() {
	register_widget( 'Broden_Widget_Social' );
}