<?php
/*************************************/
/******************* Ads  ************/
/*************************************/
add_action('widgets_init','Defier_Ads_Widget');

function Defier_Ads_Widget() {
	register_widget('Defier_Ads_Widget');
	
	}


class Defier_Ads_Widget extends WP_Widget
{
	public function __construct()
	{
		parent::__construct(
			'defier_ads_widget',
			'Defier widget - Advertisement',
			array('description' => __('Advertisements widget for all the ads supported.', 'defier-widgets'), 'classname' => 'defier-ad')
		);
	}
	
	public function widget($args, $instance)
	{
		extract($args);
		$title = apply_filters('widget_title', $instance['title']);
		
		?>

		<?php echo $before_widget; ?>
		
			<?php if ($title): ?>
				<?php echo $before_title . $title . $after_title; ?>
			<?php endif; ?>
		
			<div class="adwrap-widget">
			
				<?php echo do_shortcode($instance['code']); ?>
			
			</div>
		
		<?php echo $after_widget; ?>
		
		<?php
	}
	
	public function update($new, $old)
	{
		foreach ($new as $key => $val) {
			$new[$key] = $val;
		}
		
		return $new;
	}
	
	public function form($instance)
	{
		$defaults = array('title' => '', 'code' => '');
		$instance = array_merge($defaults, (array) $instance);
		extract($instance);
		
	?>
	
	<p>
		<label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php _e('Title: (Optional)', 'defier-widgets'); ?></label>
		<input class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php 
			echo esc_attr($this->get_field_name('title')); ?>" type="text" value="<?php echo esc_attr($title); ?>" />
	</p>
	
	<p>
		<label for="<?php echo esc_attr($this->get_field_id('code')); ?>"><?php _e('Ad Code:', 'defier-widgets'); ?></label>
		<textarea class="widefat" id="<?php echo esc_attr($this->get_field_id('code')); ?>" name="<?php 
			echo esc_attr($this->get_field_name('code')); ?>" rows="16" cols="20"><?php echo esc_textarea($code); ?></textarea>
	</p>

	<?php
	}
}


?>