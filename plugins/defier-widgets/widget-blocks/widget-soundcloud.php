<?php
/*************************************/
/********* Soundcloud widget  ********/
/*************************************/
add_action('widgets_init','defier_soundcloud');

function defier_soundcloud() {
	register_widget('defier_soundcloud');
	
	}

class defier_soundcloud extends WP_Widget {
	function defier_soundcloud() {
			
		$widget_ops = array('classname' => 'sound_cloud','description' => __('Sound cloud Widget','defier-magazine-blog'));
		parent::__construct('sound_cloud',__('Defier widget - Sound Cloud','defier-magazine-blog'),$widget_ops);
		}
		
	function widget( $args, $instance ) {
		extract( $args );
		/* User-selected settings. */
		$title = apply_filters('widget_title', $instance['title'] );
		$url = $instance['url'];
		$autoplay = $instance['autoplay'];

		/* Before widget (defined by themes). */
		echo $before_widget;

		/* Title of widget (before and after defined by themes). */
		if ( $title )
	 			echo "<span class='defier-cat-title'><h4 class='widget-title'><div class='lavecat'></div>" . $title ." </h4></span>";
?>
<iframe width="100%" height="166" scrolling="no" frameborder="no" src="https://w.soundcloud.com/player/?url=<?php echo $url ; ?>&amp;auto_play=<?php echo $autoplay ; ?>&amp;show_artwork=true"></iframe>
<?php 
		/* After widget (defined by themes). */
		echo $after_widget;
	}
	
	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;

		/* Strip tags (if needed) and update the widget settings. */
		$instance['title'] = strip_tags( $new_instance['title'] );
		$instance['url'] = $new_instance['url'] ;
		$instance['autoplay'] = strip_tags( $new_instance['autoplay'] );

		return $instance;
	}
	
function form( $instance ) {

		/* Set up some default widget settings. */
		$defaults = array( 'title' => __('SoundCloud','defier-magazine-blog'), 
 			);
		$instance = wp_parse_args( (array) $instance, $defaults );
		
		?>

		<p>
		<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e('Title:','defier-magazine-blog'); ?></label>
		<input type="text" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>"  class="widefat" />
		</p>
		
		<p>
		<label for="<?php echo $this->get_field_id( 'url' ); ?>"><?php _e('URL:','defier-magazine-blog'); ?></label>
		<input type="text" id="<?php echo $this->get_field_id( 'url' ); ?>" name="<?php echo $this->get_field_name( 'url' ); ?>" value="<?php echo $instance['url']; ?>"  class="widefat" />
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'autoplay' ); ?>"><?php _e('Autoplay :','defier-magazine-blog'); ?></label>
			<input id="<?php echo $this->get_field_id( 'autoplay' ); ?>" name="<?php echo $this->get_field_name( 'autoplay' ); ?>" value="true" <?php if( $instance['autoplay'] ) echo 'checked="checked"'; ?> type="checkbox" />
		</p>

   <?php 
}
	} //end class


	?>