<?php
/*************************************/
/********* Login  Widget  ************/
/*************************************/
add_action('widgets_init','defier_widget_login');

function defier_widget_login() {
	register_widget('defier_widget_login');
	
	}

class defier_widget_login extends WP_Widget {
	function defier_widget_login() {
			
		$widget_ops = array('classname' => 'login_widget','description' => __('Login Widget','defier-magazine-blog'));
		parent::__construct('login_widget',__('Defier widget - Login','defier-magazine-blog'),$widget_ops);
		}
		
	function widget( $args, $instance ) {
		extract( $args );
		/* User-selected settings. */
		$title = apply_filters('widget_title', $instance['title'] );

		/* Before widget (defined by themes). */
		echo $before_widget;

		/* Title of widget (before and after defined by themes). */
		if ( $title )
	 			echo "<span class='defier-cat-title'><h4 class='widget-title'><div class='lavecat'></div>" . $title ." </h4></span>";
			//echo $before_title . $title . $after_title;

			defier_login_form();
			
		/* After widget (defined by themes). */
		echo $after_widget;
	}
	
	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;

		/* Strip tags (if needed) and update the widget settings. */
		$instance['title'] = strip_tags( $new_instance['title'] );

		return $instance;
	}
	
function form( $instance ) {

		/* Set up some default widget settings. */
		$defaults = array( 'title' => __('Login','defier-magazine-blog'), 
 			);
		$instance = wp_parse_args( (array) $instance, $defaults );
		
		?>

		<p>
		<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e('Title:','defier-magazine-blog'); ?></label>
		<input type="text" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>"  class="widefat" />
		</p>

   <?php 
}
	} //end class



	?>