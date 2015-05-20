<?php	
	class LatestSermons extends WP_Widget {
	
		function LatestSermons() {
			// Instantiate the parent object
			parent::__construct( false, 'Latest Sermons' );
		}
	
		function widget( $args, $instance ) {
			echo $args['before_widget'];
			if ( ! empty( $instance['title'] ) ) {
				echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ). $args['after_title'];
			}
			
			$query = new WP_Query(array(
				'post_type'  => 'sermon',
				'posts_per_page' => $instance['number_of_posts']
			));
			
			if($query->have_posts()) {
				while($query->have_posts()) {
					$query->the_post();
					
					echo '<div>';
					$date = new DateTime( get_field('date') );
					echo $date->format('m/d/Y');
					the_title(' - <a href="' . get_the_permalink() . '">', '</a>');
					echo '</div>';
				}
			}
			
			wp_reset_postdata();
			
			echo $args['after_widget'];
		}
	
		function update( $new_instance, $old_instance ) {
			$instance = array();
			$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
			$instance['number_of_posts'] = ( ! empty( $new_instance['number_of_posts'] ) ) ? strip_tags( $new_instance['number_of_posts'] ) : '';
		
			return $instance;
		}
	
		function form( $instance ) {
			$title = ! empty( $instance['title'] ) ? $instance['title'] : __( 'Latest Sermons', 'text_domain' );
			$number_of_posts = ! empty( $instance['number_of_posts'] ) ? $instance['number_of_posts'] : 3;
			?>
			<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label> 
			<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
			</p>
			<p>
			<label for="<?php echo $this->get_field_id( 'number_of_posts' ); ?>"><?php _e( 'Number of Sermons:' ); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'number_of_posts' ); ?>" name="<?php echo $this->get_field_name( 'number_of_posts' ); ?>" type="text" value="<?php echo esc_attr( $number_of_posts ); ?>">
			</p>
			<?php 
		}
	}

	function register_latest_sermons_widget() {
		register_widget( 'LatestSermons' );
	}