<?php
/*************************************/
/********* About Widget  ************/
/*************************************/
add_action('widgets_init','Defier_About_Widget');

function Defier_About_Widget() {
	register_widget('Defier_About_Widget');
	
	}
class Defier_About_Widget extends WP_Widget
{
	public function __construct()
	{
		parent::__construct(
			'defier_about_widget',
			'Defier Widget - About ',
			array('description' => __('"About" site widget for footer.', 'defier-widgets'), 'classname' => 'defier-about')
		);
	}
	
	public function widget($args, $instance)
	{
		extract($args);
		$title = apply_filters('widget_title', $instance['title']);
		
		?>

		<?php echo $before_widget; ?>
        <div class="widgetTitle">
			<?php echo $before_title . $title . $after_title; ?>
        </div>
			<div class="about-widget">
			
			<?php 
			
			if (!empty($instance['image'])):
			?>
                <figure class="imgProfile">
                    <img src="<?php echo esc_attr(strip_tags($instance['image'])); ?>" alt="<?php echo $instance['logo_text'] ?>">
                    <figcaption>
                        <h2><?php echo $instance['logo_text'] ?></h2>
                        <div class="aut_social">

                            <?php
                            if (!empty($instance['aut_facebook'])):
                                ?>
                                <a href="<?php echo esc_attr(strip_tags($instance['aut_facebook'])); ?>" class="aut_facebook"><i class="fa fa-facebook"></i><span>facebook</span></a>
                                <?php
                            endif;
                            ?>

                            <?php
                            if (!empty($instance['aut_twitter'])):
                                ?>
                                <a href="<?php echo esc_attr(strip_tags($instance['aut_twitter'])); ?>" class="aut_twitter"><i class="fa fa-twitter"></i><span>Twitter</span></a>
                                <?php
                            endif;
                            ?>

                            <?php
                            if (!empty($instance['aut_google'])):
                                ?>
                                <a href="<?php echo esc_attr(strip_tags($instance['aut_google'])); ?>" class="aut_google"><i class="fa fa-google-plus"></i><span>Google+</span></a>
                                <?php
                            endif;
                            ?>
                        </div>
                    </figcaption>

                </figure>
			<?php 
			elseif (!empty($instance['logo_text'])): ?>
				<p class="logo-text"><?php echo $instance['logo_text']; ?></p>
				
			<?php 
			endif; 
			?>


			<?php echo do_shortcode(apply_filters('shortcode_cleanup', wpautop($instance['text']))); ?>
			
			</div>
		
		<?php echo $after_widget; ?>
		
		<?php
	}
	
	public function update($new, $old)
	{
		foreach ($new as $key => $val) {
			$new[$key] = wp_kses_post($val);
		}
		
		return $new;
	}
	
	public function form($instance)
	{
		$defaults = array('title' => 'About', 'image' => '', 'aut_facebook' => '', 'aut_twitter' => '', 'aut_google' => '', 'text' => '', 'logo_text' => '');
		$instance = array_merge($defaults, (array) $instance);
		extract($instance);
		
	?>
	
	<p>
		<label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php _e('Title:', 'defier-magazine-blog'); ?></label>
		<input class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php 
			echo esc_attr($this->get_field_name('title')); ?>" type="text" value="<?php echo esc_attr($title); ?>" />
	</p>
	
	<p>
		<label for="<?php echo esc_attr($this->get_field_id('text')); ?>"><?php _e('About Site:', 'defier-magazine-blog'); ?></label>
		<textarea class="widefat" id="<?php echo esc_attr($this->get_field_id('text')); ?>" name="<?php 
			echo esc_attr($this->get_field_name('text')); ?>" rows="5"><?php echo esc_textarea($text); ?></textarea>
	</p>
	
		
	<p>
		<label for="<?php echo esc_attr($this->get_field_id('logo_text')); ?>"><?php _e('Logo Text:', 'defier-magazine-blog'); ?></label>
		<input class="widefat" id="<?php echo esc_attr($this->get_field_id('logo_text')); ?>" name="<?php 
			echo esc_attr($this->get_field_name('logo_text')); ?>" type="text" value="<?php echo esc_attr($logo_text); ?>" />
	</p>
	
	<p>
		<label for="<?php echo esc_attr($this->get_field_id('image')); ?>"><?php _e('OR Logo Image:', 'defier-magazine-blog'); ?></label>
		<input class="widefat" id="<?php echo esc_attr($this->get_field_id('image')); ?>" name="<?php 
			echo esc_attr($this->get_field_name('image')); ?>" type="text" value="<?php echo esc_attr($image); ?>" />
	</p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('aut_facebook')); ?>"><?php _e('Facebook:', 'defier-magazine-blog'); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('aut_facebook')); ?>" name="<?php
            echo esc_attr($this->get_field_name('aut_facebook')); ?>" type="text" value="<?php echo esc_attr($aut_facebook); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('aut_twitter')); ?>"><?php _e('Twitter:', 'defier-magazine-blog'); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('aut_twitter')); ?>" name="<?php
            echo esc_attr($this->get_field_name('aut_twitter')); ?>" type="text" value="<?php echo esc_attr($aut_twitter); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('aut_google')); ?>"><?php _e('Google:', 'defier-magazine-blog'); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('aut_google')); ?>" name="<?php
            echo esc_attr($this->get_field_name('aut_google')); ?>" type="text" value="<?php echo esc_attr($aut_google); ?>" />
        </p>
	<?php
	}
}


?>