<?php
/*************************************/
/********** Big List Block **********/
/*************************************/
class defier_biglist_block extends Wp_Widget {
	function __construct () {
     parent::__construct(false ,$name = do_shortcode('Defier Big List', 'defier'));
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
	} // end function form
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
		// pager
		$paged = ( get_query_var('page') ) ? get_query_var('page') : 1;
		$query_arguments = array(
		    'cat' => (int)$defier_custom_widget_catogry,
		    'posts_per_page' => (int)$num_post,
		    'orderby' => 'post_date',
		    'order' => 'DESC',
		    'post_status' => 'publish',
				'paged' => $paged,
		    'meta_query' => array(array('key' => '_thumbnail_id'))
		);
		// The Query
		$i = 0 ;
		$defier_custom_widget_query =  new WP_Query($query_arguments );
		if($defier_custom_widget_query->have_posts()) {
		?><div class="defier-block-box"> <section class="highlights-full"><?php
					global $defTheme;
				if(function_exists('defier_cat_color')){
					?>
					<span class="defier-cat-title"><h4 class="widget-title"><div class="lavecat" style="background:<?php $rl_category_color = defier_cat_color((int)$defier_custom_widget_catogry); ?>"></div></i>
							<?php echo   get_cat_name((int)$defier_custom_widget_catogry); ?></h4></span>
							<ul class="recentList">
					<?php
				}// end block category
					while ($defier_custom_widget_query->have_posts()) {
						$defier_custom_widget_query->the_post();
						$content  = wp_trim_words( get_the_content(), 15, '<a class="readMore" href="'. get_permalink() .'"><i class="fa fa-chevron-right" aria-hidden="true"></i>'.__( 'Read More', 'defier' ) .' </a>' );
              global $wp_query;
              $post = $wp_query->post;
						?>
					<li class="defier-first-post">
						<div class="col-sm-4 col-md-4 col-lg-4 col-xs-12">
              <?php include(locate_template('inc/post-formats/parts/format-icon.php'));  ?>
							<div class="grid">
							<a href="<?php  the_permalink() ?>" alt="<?php the_title() ?>">
								<figure class="effect-thumbDefier <?php if(!empty($defTheme['pointer'])): ?>pointer<?php endif; ?>">
									<img alt="<?php the_title(); ?>" src="<?php echo  the_post_thumbnail_url();?>"/>
										<i class="fa <?php echo esc_html($post_format_icon); ?>"></i>
								</figure>
								</a>
							</div>
						</div>
						<div class="boxContent col-sm-8 col-md-8 col-lg-8 col-xs-12">
							<h2><a href="<?php  the_permalink() ?>" alt="<?php the_title() ?>"><?php the_title() ?></a> </h2>
										<div class="meta-label">
										<div class="pull-left">
										    <?php get_template_part( 'inc/post-formats/parts/meta', 'secondary' );  ?>
											</div>
										<div class="pull-left"><i class="fa-head"></i><?php the_author(); ?></div>
										</div>
							<p><?php  echo do_shortcode($content);  ?></p>
						</div>
						</li>
						<?php
						$i++;
					}// end while
				?>
			</section></div>
			<?php
		}
		// end if check have post
	}
	// end function widget
}
// end of class
add_action('widgets_init',function(){
register_widget('defier_biglist_block') ;
});
?>
