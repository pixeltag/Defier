<?php
/***************************************/
/********* Twitter Widget  ************/
/*************************************/

add_action('widgets_init','Defier_Twitter_Widget');

function Defier_Twitter_Widget() {
	register_widget('Defier_Twitter_Widget');
	
	}
class Defier_Twitter_Widget extends WP_Widget
{
	public function __construct()
	{
		parent::__construct(
			'defier_twitter-widget',
			'Defier widget - Twitter',
			array('description' => 'Latest tweets widget.', 'classname' => 'latest-tweets')
		);
	}
	
	public function widget($args, $instance)
	{
		extract($args);
		extract($instance, EXTR_SKIP);
		
		$title = apply_filters('widget_title', $instance['title']);
		
		// get tweet data
		$data = $this->get_data($instance);
	
		// do custom loop if available
		if (has_action('defier_widget_twitter_loop')):

			$args['title'] = $title;
			do_action('defier_widget_twitter_loop', $args, $data);
		
		else:
	?>
		
	
		<?php echo $before_widget; ?>
		<?php echo $before_title . $title . $after_title; ?>
	

          <?php 
		  $RandToken = md5(microtime().rand(1111111111 , 9999999999)) ;
		 
		  ?>
		<div class="twitter-widget">
		<div id="twitter_update_list_<?php  echo  $RandToken ;?>">
			<?php 
				foreach ($data as $tweet): 
					// convert links and @ references		
					$tweet->text = preg_replace('/((https?|s?ftp|ssh)\:\/\/[^"\s\<\>]*[^.,;\'">\:\s\<\>\)\]\!])/', '<a href="\\1">\\1</a>', $tweet->text);
					$tweet->text = preg_replace('/\B@([_a-z0-9]+)/i', '<a href="http://twitter' . '.com/\\1">@\\1</a>', $tweet->text);
			?>
			
				<div><span><?php echo $tweet->text; ?></span></div>
			
			<?php endforeach; ?>
			</div>
			<div class="twitterfootwrapper">
				<div class="col-lg-8 col-sm-8 col-xs-8 nopadding twitterFooterC1"><i class="fa fa-twitter" aria-hidden="true"></i>
					@<?php echo esc_attr($username); ?></div>
				<div class="col-lg-4 col-sm-4 col-xs-4 nopadding">
					<a href="http://twitter.com/<?php echo esc_attr($username); ?>" class="follow" title="<?php
					echo esc_attr_e('Follow on twitter',  'defier-magazine-blog' ); ?>"><?php _e('Follow',  'defier-magazine-blog' ); ?></a>
				</div>
			</div>


			
		</div>

	<?php 
				echo "
			<script type='text/javascript'>
					jQuery(document).ready(function(){
						if ( jQuery('html').attr('lang') == 'ar' ) {
					jQuery('#twitter_update_list_".$RandToken."').slick({
						dots: true,
						infinite: true,
						speed: 1000,
						arrows:false,
						fade: false,
						cssEase: 'linear',
						rtl:true,
						accessibility: true,
						autoplay: true,
						lazyLoad: 'ondemand'

					});
					} else {
						jQuery('#twitter_update_list_".$RandToken."').slick({
						dots: true,
						infinite: true,
						speed: 1000,
						arrows:false,
						fade: true,
						cssEase: 'linear',
						accessibility: true,
						autoplay: true,
						lazyLoad: 'ondemand'

					});					
					}
					});
			</script>
			";
	?>
		<?php echo $after_widget; ?>

	<?php
	
		endif; // check action override
	

	} // end widget function

	public function get_data($instance)
	{
		$type = 'tweets';
		
		$data_store  = 'defier-transient-' . $type;
		$back_store  = 'defier-transient-backup-' . $type;
		$cache       = get_transient($data_store);
		$cache_mins = 10;
		 
		// no cache found?
		if ($cache === false) {
			$data = $this->get_twitter_data($instance);
			
			if ($data) {
				// save a transient to expire in $cache_mins and a permanent backup option
				set_transient($data_store, $data, 60 * $cache_mins);
				update_option($back_store, $data);
			}
			// fall to permanent backup store - no fresh data available
			else { 
				$data = get_option($back_store);
			}
			
			return $data;
		}
		else {
			return $cache;
		}
	}
	
	/**
	 * Fetch timeline from twitter api
	 * 
	 * @param array $data
	 */
	public function get_twitter_data($data)
	{
		extract($data);

		/*
		 * Twitter API
		 */
        require_once dirname(__FILE__)  . '/twitteroauth.php';
		$twitterConnection = new TwitterOAuth(
			$data['consumer_key'], // consumer key
			$data['consumer_secret'], // consumer secret
			$data['access_token'], // access token
			$data['access_secret'] // access token secret 
		);
		
		
		$data = $twitterConnection->get('statuses/user_timeline', array('screen_name' => $username, 'count' => $show_num, 'exclude_replies' => false));
		
		if ($twitterConnection->http_code === 200) {
			return $data;
		}
		
		return false;
	}
	
	public function update($new, $old)
	{
		foreach ($new as $key => $val) {
			$new[$key] = wp_filter_kses($val);
		}
		
		delete_transient('defier-transient-tweets');
		
		$new['show_num'] = intval($new['show_num']);
		
		return $new;
	}
	
	public function form($instance)
	{
		$instance = array_merge(array(
			'title' => 'Twitter Widget', 'username' => '', 'consumer_key' => '', 'consumer_secret' => '', 'access_token' => '', 'access_secret' => '', 'show_num' => 3
		), (array) $instance);
		
		extract($instance);
		
	?>
	
	<p><a href="http://dev.twitter.com/apps" target="_blank"><?php _e('Create your Twitter App',  'defier-magazine-blog' ); ?></a></p>
	
	<p>
		<label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php _e('Title:',  'defier-magazine-blog' ); ?></label>
		<input class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php 
			echo esc_attr($this->get_field_name('title')); ?>" type="text" value="<?php echo esc_attr($title); ?>" />
	</p>
	
	<p>
		<label for="<?php echo esc_attr($this->get_field_id('username')); ?>"><?php _e('Username:',  'defier-magazine-blog' ); ?></label>
		<input class="widefat" id="<?php echo esc_attr($this->get_field_id('username')); ?>" name="<?php 
			echo esc_attr($this->get_field_name('username')); ?>" type="text" value="<?php echo esc_attr($username); ?>" />
	</p>

	<p>
		<label for="<?php echo esc_attr($this->get_field_id('consumer_key')); ?>"><?php _e('Consumer Key',  'defier-magazine-blog' ); ?></label>
		<input class="widefat" id="<?php echo esc_attr($this->get_field_id('consumer_key')); ?>" name="<?php 
			echo esc_attr($this->get_field_name('consumer_key')); ?>" type="text" value="<?php echo esc_attr($consumer_key); ?>" />
	</p>
	
	<p>
		<label for="<?php echo esc_attr($this->get_field_id('consumer_secret')); ?>"><?php _e('Consumer Secret',  'defier-magazine-blog' ); ?></label>
		<input class="widefat" id="<?php echo esc_attr($this->get_field_id('consumer_secret')); ?>" name="<?php 
			echo esc_attr($this->get_field_name('consumer_secret')); ?>" type="text" value="<?php echo esc_attr($consumer_secret); ?>" />
	</p>
	
	<p>
		<label for="<?php echo esc_attr($this->get_field_id('access_token')); ?>"><?php _e('Access Token',  'defier-magazine-blog' ); ?></label>
		<input class="widefat" id="<?php echo esc_attr($this->get_field_id('access_token')); ?>" name="<?php 
			echo esc_attr($this->get_field_name('access_token')); ?>" type="text" value="<?php echo esc_attr($access_token); ?>" />
	</p>
	
	<p>
		<label for="<?php echo esc_attr($this->get_field_id('access_secret')); ?>"><?php _e('Access Token Secret',  'defier-magazine-blog' ); ?></label>
		<input class="widefat" id="<?php echo esc_attr($this->get_field_id('access_secret')); ?>" name="<?php 
			echo esc_attr($this->get_field_name('access_secret')); ?>" type="text" value="<?php echo esc_attr($access_secret); ?>" />
	</p>
	
	<p>
		<label for="<?php echo esc_attr($this->get_field_id('show_num')); ?>"><?php _e('Number of Tweets:',  'defier-magazine-blog' ); ?></label>
		<input class="width100" id="<?php echo esc_attr($this->get_field_id('show_num')); ?>" name="<?php 
			echo esc_attr($this->get_field_name('show_num')); ?>" type="text" value="<?php echo esc_attr($show_num); ?>" />
	</p>
	
	<?php
	
	} // end form()
}
?>
