<?php
/**
 * Custom sponsor widget
 *
 * @package Broden
 */

class Broden_Widget_Ads extends WP_Widget {

	function Broden_Widget_Ads() {

		$widget_ops = array(
			'classname' => 'advertisement-widget', 
			'description' => esc_html__( 'Single Sponsor banner with link', 'broden' ) 
		);

		parent::__construct(
			'broden_ads_widget',
			esc_html__( 'Broden - Sidebar Sponsor', 'broden' ),
			$widget_ops
		);

	}

	function widget( $args, $instance ) {

		extract( $args );
		$title = apply_filters( 'widget_title', $instance[ 'title' ] );

		$ads_image = $instance['ads_image'];
		$ads_url = $instance['ads_url'];

		echo wp_kses_post( $args['before_widget'] );

		if ( $title ) { 
			echo wp_kses_post( $args['before_title'] . $title . $args['after_title'] );
		}
		?>

			<?php
				if ( $ads_url )
					echo '<a href="' . $ads_url . '" target="_blank"><img src="' . $ads_image . '" alt="ads" /></a>';
					
				elseif ( $ads_image )
					echo '<img src="' . $ads_image . '" alt="ads" />';
			?>

		<?php

		echo wp_kses_post( $args['after_widget'] );

	}

	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		
		$instance['title'] = strip_tags( $new_instance['title'] );
		$instance['ads_url'] = $new_instance['ads_url'];
		$instance['ads_image'] = $new_instance['ads_image'];
		return $instance;
	}

	function form( $instance ) {
		//Set up some default widget settings.
		$defaults = array( 'title' => '', 'ads_url' => 'http://evolle.com/', 'ads_image' => get_template_directory_uri()."/images/sidebar-adv.jpg" );
		$instance = wp_parse_args( (array) $instance, $defaults );

		// Widget Title: Text Input
		?>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php echo esc_html__('Title:', 'broden'); ?></label>
			<input id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" value="<?php if(!empty($instance['title'])) { echo esc_attr( $instance['title'] ); } ?>" class="widefat" type="text" />
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'ads_url' ) ); ?>"><?php echo esc_html__('Ad Link URL:', 'broden') ?></label>
			<input id="<?php echo esc_attr( $this->get_field_id( 'ads_url' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'ads_url' ) ); ?>" value="<?php echo esc_attr( $instance['ads_url'] ); ?>" style="width:100%;" type="text" />
		</p>
		
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'ads_image' ) ); ?>"><?php echo esc_html__('Ad Banner URL:', 'broden') ?></label>
			<input id="<?php echo esc_attr( $this->get_field_id( 'ads_image' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'ads_image' ) ); ?>" value="<?php echo esc_attr( $instance['ads_image'] ); ?>" style="width:100%;" type="text" />
		</p>
		<?php
	}

}

add_action( 'widgets_init', 'broden_ads_widget' );

function broden_ads_widget() {
	register_widget( 'Broden_Widget_Ads' );
}