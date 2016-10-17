<?php
/**
 * Instagram profile widget
 *
 * @package Broden
 */

class Broden_Widget_Instagram extends WP_Widget {

	function Broden_Widget_Instagram() {

		$widget_ops = array(
			'classname' => 'instagram-widget', 
			'description' => esc_html__( 'Displays the instagram images', 'broden' ) 
		);

		parent::__construct(
			'broden_instagram_widget',
			esc_html__( 'Broden - Instagram Widget', 'broden' ),
			$widget_ops
		);

	}

	function widget( $args, $instance ) {

		extract( $args );
		$title = apply_filters( 'widget_title', $instance[ 'title' ] );

		$number = $instance['number'];
		$username = $instance['username'];

		echo wp_kses_post( $args['before_widget'] );

		if ( $title ) { 
			echo wp_kses_post( $args['before_title'] . $title . $args['after_title'] );
		}

		$broden_data = $this->fetch_feed( $instance['username'], $instance['number'] );

		if ( is_wp_error( $broden_data ) ) {

			echo '<span class="widget-error-text">'. esc_html__( $broden_data->get_error_message() ) .'</span>';

		} else { ?>

			<div class="widget-inwrap">

				<ul class="instagram-profile-images">
				<?php foreach ( $broden_data as $k => $v ): ?>
					<li>
						<a href="<?php echo esc_url( 'https://instagram.com/p/'. $v['code'] .'/' ); ?>" target="_blank" rel="nofollow">
							<img src="<?php echo esc_url( preg_replace( '#\/s[0-9]+x[0-9]+\/#', '/s200x200/', $v['thumbnail_src'] ) ); ?>" class="trs" alt="" />
						</a>
					</li>
				<?php endforeach; ?>
				</ul>

			</div>

		<?php }

		echo wp_kses_post( $args['after_widget'] );

	}

	function fetch_feed( $username, $slice = 8 ) {

		$broden_remote_url = esc_url( 'http://instagram.com/'. trim( strtolower( $username ) ) );
		$broden_transient_key = 'broden_instagram_feed_'. sanitize_title_with_dashes( $username );
		$slice = absint( $slice );

		if ( false === ( $broden_result_data = get_transient( $broden_transient_key ) ) ) {

			$broden_remote = wp_remote_get( $broden_remote_url );

			if ( is_wp_error( $broden_remote ) || 200 != wp_remote_retrieve_response_code( $broden_remote ) ) {
				return new WP_Error( 'not-connected', esc_html__( 'Unable to communicate with Instagram.', 'broden' ) );
			}

			preg_match( '#window\.\_sharedData\s\=\s(.*?)\;\<\/script\>#', $broden_remote['body'], $broden_match );

			if ( ! empty( $broden_match ) ) {

				$broden_data = json_decode( end( $broden_match ), true );

				if ( is_array( $broden_data ) && isset ( $broden_data['entry_data']['ProfilePage'][0]['user']['media']['nodes'] ) ) {
					$broden_result_data = $broden_data['entry_data']['ProfilePage'][0]['user']['media']['nodes'];
				}

			}

			if ( is_array( $broden_result_data ) ) {
				set_transient( $broden_transient_key, $broden_result_data, 60 * 60 * 2 );
			}

		}

		if ( empty( $broden_result_data ) ) {
			return new WP_Error( 'no-images', esc_html__( 'Instagram did not return any images.', 'broden' ) );
		}

		return array_slice( $broden_result_data, 0, $slice );

	}

	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		
		$instance['title'] = strip_tags( $new_instance['title'] );
		$instance['username'] = $new_instance['username'];
		$instance['number'] = $new_instance['number'];
		return $instance;
	}

	function form( $instance ) {

		$broden_title    = isset( $instance['title'] ) ? $instance['title'] : '';
		$broden_username = isset( $instance['username'] ) ? $instance['username'] : '';
		$broden_number   = isset( $instance['number'] ) ? $instance['number'] : '';

		?>


		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php echo esc_html__('Title:', 'broden'); ?></label>
			<input id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" value="<?php if(!empty($instance['title'])) { echo esc_attr( $instance['title'] ); } ?>" class="widefat" type="text" />
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'username' ) ); ?>"><?php echo esc_html__('Username:', 'broden') ?></label>
			<input id="<?php echo esc_attr( $this->get_field_id( 'username' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'username' ) ); ?>" value="<?php echo esc_attr( $instance['username'] ); ?>" style="width:100%;" type="text" />
		</p>
		
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'number' ) ); ?>"><?php echo esc_html__('Number of items:', 'broden') ?></label>
			<input id="<?php echo esc_attr( $this->get_field_id( 'number' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'number' ) ); ?>" value="<?php echo esc_attr( $instance['number'] ); ?>" style="width:100%;" type="text" />
		</p>

		<?php
	}

}

add_action( 'widgets_init', 'broden_instagram_widget' );

function broden_instagram_widget() {
	register_widget( 'Broden_Widget_Instagram' );
}