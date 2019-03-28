<?php
/*************************************/
/******* Carousel Block **************/
/*************************************/
class defier_carousel_block extends Wp_Widget {
	function __construct () {
  parent::__construct(false ,$name = do_shortcode('Defier Block | Carousel', 'defier'));
	} //end function construct
	public function form( $instance ) {
		$num_post = ! empty( $instance['num_post'] ) ? $instance['num_post'] : __( 'Number Of Posts', 'defier' );
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
			$content  = wp_trim_words( get_the_content(), 20, '<a class="readMore" href="'. get_permalink() .'"><i class="fa-ellipsis" aria-hidden="true"></i>'. __( 'Read More', 'defier' ) .' </a>' );
			if(function_exists('defier_cat_color')){
				?>
				<div class="Carousel">
				<a href="<?php get_category_link($defier_custom_widget_catogry); ?> ">
				<span class="defier-cat-title"><h4 class="widget-title"><div class="lavecat" style="background:<?php $rl_category_color = defier_cat_color($defier_custom_widget_catogry); ?>"></div></i>
				<?php echo   get_cat_name((int)$defier_custom_widget_catogry); ?></h4></span></a>
			<?php }
			// end if check defier_cat_color
			$RandToken = md5(microtime().rand(1111111111 , 9999999999)) ;
			echo "<script type='text/javascript'>jQuery(document).ready(function(){var a='false',a='ar'==jQuery('html').attr('lang');jQuery('#carsousel_".$RandToken."').slick({infinite:!0,autoplay:!0,autoplaySpeed:4e3,rtl:a,arrows:!1,slidesToShow:4,slidesToScroll:4,responsive:[{breakpoint:1024,settings:{slidesToShow:3,slidesToScroll:3,infinite:!0,dots:!0}},{breakpoint:600,settings:{slidesToShow:2,slidesToScroll:2}},{breakpoint:480,settings:{slidesToShow:1,slidesToScroll:1}}]})});</script>";?>
				<ul class="blockCarousel" id="carsousel_<?php  echo  $RandToken ;?>">
					<?php
					while ($defier_custom_widget_query->have_posts()) {
						$defier_custom_widget_query->the_post();
							?>
        <!-- start item -->
				<li class="defier-first-post">
					<div class="grid">
						<figure class="effect-thumbDefier2  slidertwoWarpper <?php if(!empty($defTheme['pointer'])): ?>pointer<?php endif; ?>">
							<img alt="<?php the_title(); ?>" src="<?php echo  the_post_thumbnail_url();?>"/>
							<a  href="<?php esc_url(the_permalink()) ?>" >
							<figcaption>
								<h2><a href="<?php  the_permalink() ?>" alt="<?php the_title() ?>"><span style="background:<?php $rl_category_color = defier_cat_color($defier_custom_widget_catogry); ?> " class="verticalLine"></span><?php the_title() ?></a> </h2>
								<p>
									<?php echo do_shortcode($content);  ?>
								</p>
								<div class="meta-label">
								    <div class="pull-left">
								        <div class="time"><?php defier_get_time() ?></div>
                        <div class="view-counter"><?php  echo defier_PostViews( '', get_the_ID() ); ?></div>
								  	</div>
                        <div class="pull-right"><i class="fa-head"></i><?php the_author(); ?></div>
                        </div>
							</figcaption>
						</figure>
						</a>
					</div>
				</li>
       		     <?php $i++; }
							 // end while
							?>
						</ul></div>
						<?php
					    }
							// end if check have post
						}
						// end function widget
					}
					// end of class
add_action('widgets_init',function(){
register_widget('defier_carousel_block') ;
});
?>
