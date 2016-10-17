<?php
/**
 * Most popular posts widget
 *
 * @package Broden
 */

class Broden_Popular_Posts_Widget extends WP_Widget {

	public function Broden_Popular_Posts_Widget() {
		$widget_ops = array(
			'classname' => 'most-popular-widget',
			'description' => esc_html__( 'Display Popular Posts', 'broden' )
		);

		parent::__construct(
			'broden_popular_posts_widget',
			esc_html__( 'Broden - Most Popular Posts', 'broden' ),
			$widget_ops
		);
	}

	public function widget( $args, $instance ) {
		$cache = array();
		if ( ! $this->is_preview() ) {
			$cache = wp_cache_get( 'broden_popular_posts_widget', 'widget' );
		}

		if ( ! is_array( $cache ) ) {
			$cache = array();
		}

		if ( ! isset( $args[ 'widget_id' ] ) ) {
			$args[ 'widget_id' ] = $this->id;
		}

		if ( isset( $cache[ $args[ 'widget_id' ] ] ) ) {
			echo wp_kses_post( $cache[ $args['widget_id'] ] );
			return;
		}

		ob_start();

		$title = ( ! empty( $instance[ 'title' ] ) ) ? $instance[ 'title' ] : '';
		$title = apply_filters( 'widget_title', $title, $instance, $this->id_base );

		$number = ( ! empty( $instance[ 'number' ] ) ) ? absint( $instance[ 'number' ] ) : 4;
		if ( ! $number ) {
			$number = 4;
		}

		$offset = ( ! empty( $instance[ 'offset' ] ) ) ? absint( $instance[ 'offset' ] ) : 0;
		if ( ! $offset ) {
			$offset = 0;
		}
		
		$r_args = array(
			'posts_per_page'      => $number,
			'no_found_rows'       => true,
			'post_status'         => 'publish',
			'offset'              => $offset,
			'orderby'             => 'meta_value_num',
			'meta_key'            => 'post_views_count',
			'ignore_sticky_posts' => true
		);

		$r = new WP_Query( $r_args );

		if ( $r->have_posts() ) :

		$r_post_thumb_size = 'broden-grid-small';
		
		?>

		<?php echo wp_kses_post( $args['before_widget'] ); ?>

		<?php if ( $title ) {
			echo wp_kses_post( $args['before_title'] . $title . $args['after_title'] );
		} ?>

		<div class="widget-inwrap">

			<ul>

				<?php while ( $r->have_posts() ) : $r->the_post(); ?>

					<li <?php post_class(); ?> itemscope="itemscope" itemtype="http://schema.org/Article">

						<?php if ( ( ! post_password_required() && has_post_thumbnail() ) ) : ?>

							<figure class="post-image">
								<a class="post-thumbnail" href="<?php the_permalink(); ?>">
								<?php the_post_thumbnail( $r_post_thumb_size, array( 'itemprop' => 'image' ) ); ?>
								</a>
							</figure>

						<?php endif; ?>
				
						<div class="post-inwrap">
				
							<div class="post-title">
								<?php the_title( '<h2 itemprop="name" class="entry-title"><a itemprop="url" href="'.get_permalink().'" title="'.the_title_attribute("echo=0").'" rel="bookmark">', '</a></h2>' ); ?>
							</div><!-- .post-title -->

							<div class="post-meta">

								<?php if(!get_theme_mod('broden_post_date')) : ?>
									<div class="post-date"><a href="<?php echo esc_url(get_permalink()) ?>"><i class="fa fa-clock-o"></i> <?php the_time( get_option('date_format') ); ?></a></div>
								<?php endif; ?>
							</div><!-- .post-meta -->

						</div><!-- .post-inwrap -->

					</li><!-- #post-## -->

				<?php endwhile; ?>

			</ul>

		</div><!-- widget-inwrap -->

		<?php echo wp_kses_post( $args['after_widget'] ); ?>

		<?php wp_reset_postdata();

		endif;

		if ( ! $this->is_preview() ) {
			$cache[ $args[ 'widget_id' ] ] = ob_get_flush();
			wp_cache_set( 'broden_popular_posts_widget', $cache, 'widget' );
		} else {
			ob_end_flush();
		}
	}

	public function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance[ 'title' ] = strip_tags( $new_instance[ 'title' ] );
		$instance[ 'number' ] = (int) $new_instance[ 'number' ];
		$instance[ 'offset' ] = (int) $new_instance[ 'offset' ];

		$alloptions = wp_cache_get( 'alloptions', 'options' );
		if ( isset( $alloptions[ 'broden_popular_posts_widget' ] ) ) {
			delete_option( 'broden_popular_posts_widget' );
		}

		return $instance;
	}

	public function form( $instance ) {

		$title = isset( $instance[ 'title' ] ) ? esc_attr( $instance[ 'title' ] ) : '';
		$number = isset( $instance[ 'number' ] ) ? absint( $instance[ 'number' ] ) : 4;
		$offset = isset( $instance[ 'offset' ] ) ? absint( $instance[ 'offset' ] ) : 0;
		?>

		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php echo esc_html__( 'Title (optional):', 'broden' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
		</p>

		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'number' ) ); ?>"><?php echo esc_html__( 'Number of posts to show:', 'broden' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'number' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'number' ) ); ?>" type="text" value="<?php echo esc_attr( $number ); ?>" />
		</p>

		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'offset' ) ); ?>"><?php echo esc_html__( 'Offset:', 'broden' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'offset' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'offset' ) ); ?>" type="text" value="<?php echo esc_attr( $offset ); ?>" />
			<br>
			<small><?php esc_html__( 'The offset of this query. If you have a module that shows 4 posts before this one, you can start the query from the 5th post (using offset 4).', 'broden' ); ?></small>
		</p>

	<?php }

}

add_action( 'widgets_init', 'broden_popular_posts_widget' );

function broden_popular_posts_widget() {
	register_widget( 'Broden_Popular_Posts_Widget' );
}
