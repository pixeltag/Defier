<?php
/*************************************/
/******* Slider Block **************/
/*************************************/
class defier_slider_block extends Wp_Widget {
	function __construct () {
		parent::__construct(false ,$name = do_shortcode('Defier Block | Slider', 'defier'));
	} //end function construct
	public function form( $instance ) {
		$num_post = ! empty( $instance['num_post'] ) ? $instance['num_post'] : __( '', 'defier' );
		$defier_custom_widget_catogry_value = ! empty( $instance['defier_custom_widget_catogry'] ) ? $instance['defier_custom_widget_catogry'] : 1;
		?>
		<p>
			<label for="<?php echo esc_html($this->get_field_id( 'num_post' )); ?>"><?php echo do_shortcode( 'Number Of Posts:', 'defier' ); ?></label>
			<input class="widefat" id="<?php echo esc_html($this->get_field_id( 'num_post' )); ?>" name="<?php echo esc_html($this->get_field_name( 'num_post' )); ?>" type="text" value="<?php echo esc_attr( $num_post ); ?>">
		</p>
		<p><?php _e( 'Select Category:', 'defier' ); ?><?php wp_dropdown_categories(array('name' => $this->get_field_name('defier_custom_widget_catogry'), 'selected' => $defier_custom_widget_catogry_value, 'id' => $this->get_field_id( 'defier_custom_widget_catogry'), 'class' => 'widefat')); ?> </p>
		<?php
	}
	// end function form
	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['num_post'] = ( ! empty( $new_instance['num_post'] ) ) ? strip_tags( $new_instance['num_post'] ) : '';
		$instance['defier_custom_widget_catogry'] = ( ! empty( $new_instance['defier_custom_widget_catogry'] ) ) ? strip_tags( $new_instance['defier_custom_widget_catogry'] ) : '';
		return $instance;
	}
	// end function update
	function widget($arags ,$instance)
	{
		extract($arags);
		$num_post = empty($instance['num_post']) ? '4' :
			$instance['num_post'];
			$defier_custom_widget_catogry = empty($instance['defier_custom_widget_catogry']) ? '1' :
			$instance['defier_custom_widget_catogry'];
		// Query featured entries
		$query_arguments = array(
			'cat' => (int)$defier_custom_widget_catogry,
			'posts_per_page' => (int)$num_post,
			'orderby' => 'post_date',
			'order' => 'DESC',
			'post_status' => 'publish',
			'meta_query' => array(array('key' => '_thumbnail_id'))
		);
		// The Query
		$i = 0 ;
		$defier_custom_widget_query =  new WP_Query($query_arguments );
		if($defier_custom_widget_query->have_posts()) {
			$content  = wp_trim_words( get_the_content(), 45, '<a href="'. get_permalink() .'"><div class="col-md-12 enterPostEnter"><div class="col-md-5 col-lg-5 col-sm-5 col-xs-0 linePostEnter"></div>
				<div class="col-md-2 col-lg-2 col-sm-2 col-xs-12 enterPost"><i class="fa-circle-plus"></i></div><div class="col-md-5 col-lg-5 col-sm-5 col-xs-0 linePostEnter"></div></div></a>' );
				if(function_exists('defier_cat_color')){ ?>
			<?php }
			// end if check defier_cat_color
			?>
			<?php $RandToken = md5(microtime().rand(1111111111 , 9999999999)) ;  ?>
	      <?php global $defTheme; ?>
				<div class="sliderBlockWrapper">
				<ul class="sliderSlickOne blockSlider" id="blockSlider_<?php  echo  $RandToken ;?>">
				<?php
				while ($defier_custom_widget_query->have_posts()) {
					$defier_custom_widget_query->the_post();
				 	global $defTheme;
		      global $wp_query;
          $post = $wp_query->post;
          ?>
					<!-- start item -->
					<div>
						<div class="grid">
							<figure class="effect-thumbDefier  slidertwoWarpper  <?php if(!empty($defTheme['pointer'])): ?>pointer<?php endif; ?>">
								<img alt="<?php the_title(); ?>" src="<?php echo  the_post_thumbnail_url();?>"/>
								<figcaption>
									<h2><a href="<?php the_permalink() ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a> </h2>
									<div class="catLabel">
										<div class="lavecat" style="background:<?php $rl_category_color = defier_cat_color($defier_custom_widget_catogry); ?>"></div>
										<?php echo   get_cat_name((int)$defier_custom_widget_catogry); ?>
									</div>
									<div class="meta-label">
									    <div class="pull-left">
                        <?php get_template_part( 'inc/post-formats/parts/meta', 'secondary' );  ?>
                          </div>
                          <div class="pull-right"><i class="fa-head"></i><?php the_author(); ?></div></div>
									<?php if($defTheme['sliderDescShow']): ?>
										<p><?php  echo do_shortcode($content);  ?></p>
									<?php endif; ?>
								</figcaption>
							</figure>
						</div>
					</div>
					<?php $i++; }
					// end while
				?>
			</ul>
			</div>
            <?php
						echo "  <script type='text/javascript'>jQuery(document).ready(function(){var a='false',a='ar'==jQuery('html').attr('lang');jQuery('#blockSlider_".$RandToken."').slick({dots:!0,infinite:!0,speed:1000,fade:!0,arrows:!1,cssEase:'linear',accessibility:!0,autoplay:!0,rtl:a,lazyLoad:'ondemand'})})</script>"; ?>
			<?php
		}
		// end if check have post
	}
	// end function widget
}
// end of class
add_action('widgets_init',function(){
	register_widget('defier_slider_block') ;
});
?>
