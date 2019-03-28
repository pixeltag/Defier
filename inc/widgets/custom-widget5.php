<?php
/*************************************/
/********** MetroList Block **********/
/*************************************/
class defier_metrolist_block extends Wp_Widget {
	function __construct () {
  parent::__construct(false ,$name = do_shortcode('Defier Block | MetroList', 'defier'));
	} //end function construct
	public function form( $instance ) {
		$num_post = ! empty( $instance['num_post'] ) ? $instance['num_post'] : __( 'Number Of Posts', 'defier' );
		$li_style = ! empty( $instance['li_style'] ) ? $instance['li_style'] : __( 'Custom Css list item', 'defier' );
        $defier_custom_widget_catogry_value = ! empty( $instance['defier_custom_widget_catogry'] ) ? $instance['defier_custom_widget_catogry'] : 1;
        ?>
		<p>
		<label for="<?php echo esc_html($this->get_field_id( 'num_post' )); ?>"><?php echo do_shortcode( 'Number Of Posts:', 'defier' ); ?></label>
		<input class="widefat" id="<?php echo esc_html($this->get_field_id( 'num_post' )); ?>" name="<?php echo esc_html($this->get_field_name( 'num_post' )); ?>" type="text" value="<?php echo esc_attr( $num_post ); ?>">
		</p>
		<p><?php _e( 'Select Category:', 'defier' ); ?><?php wp_dropdown_categories(array('name' => $this->get_field_name('defier_custom_widget_catogry'), 'selected' => $defier_custom_widget_catogry_value, 'id' => $this->get_field_id( 'defier_custom_widget_catogry'), 'class' => 'widefat')); ?> </p>
		<p>
		<label for="<?php echo esc_html($this->get_field_id( 'li_style' )); ?>"><?php echo do_shortcode( 'Custom Css:', 'defier' ); ?></label>
		<textarea row="4" class="widefat" id="<?php echo esc_html($this->get_field_id( 'li_style' )); ?>" name="<?php echo esc_html($this->get_field_name( 'li_style' )); ?>" ><?php echo esc_attr( $li_style ); ?></textarea>
		</p>
		<?php
	}
	// end function form
	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['num_post'] = ( ! empty( $new_instance['num_post'] ) ) ? strip_tags( $new_instance['num_post'] ) : '';
		$instance['li_style'] = ( ! empty( $new_instance['li_style'] ) ) ? strip_tags( $new_instance['li_style'] ) : '';
        $instance['defier_custom_widget_catogry'] = ( ! empty( $new_instance['defier_custom_widget_catogry'] ) ) ? strip_tags( $new_instance['defier_custom_widget_catogry'] ) : '';
		return $instance;
	}
	// end function update
	function widget($arags ,$instance)
	{
		extract($arags);
	  $li_style = empty($instance['li_style']) ? '' :
    $instance['li_style'];
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
		?>
        <div class="defier-block-box">
         <section class="highlights big-block">
         <?php
    		while ($defier_custom_widget_query->have_posts()) {
		      $defier_custom_widget_query->the_post();
        if($i == 0 ) {
        $content  = wp_trim_words( get_the_content(), 15, '<a class="readMore" href="'. get_permalink() .'"><i class="fa-ellipsis" aria-hidden="true"></i>'.__( 'Read More', 'defier' ) .' </a>' );
		    if(function_exists('defier_cat_color')){
        		   ?>
          		    <span class="defier-cat-title"><h4 class="widget-title"><div class="lavecat" style="background:<?php $rl_category_color = defier_cat_color((int)$defier_custom_widget_catogry); ?>"></div></i>
           		    <?php echo   get_cat_name((int)$defier_custom_widget_catogry); ?></h4></span>
                  <?php
                  }
									// end block category
                  	global $defTheme;
                ?>
       <ul class="defier-posts-list metroList">
       		<li class="defier-first-post bigOne col-md-4 col-lg-4 col-sm-4 col-xs-12" style="<?php echo do_shortcode($li_style); ?>">
				<div class="grid">
                     <figure class="effect-thumbDefier  slidertwoWarpper <?php if(!empty($defTheme['pointer'])): ?>pointer<?php endif; ?>">
                         <img alt="<?php the_title(); ?>" src="<?php echo  the_post_thumbnail_url();?>"/>
                             <figcaption>
                                 <h2><a href="<?php  the_permalink() ?>" alt="<?php the_title() ?>"><?php the_title() ?></a> </h2>
                                 <p>
                                   <?php  echo do_shortcode($content);  ?>
                                 </p>
																<div class="meta-label">
																    <div class="pull-left">
							                        <?php get_template_part( 'inc/post-formats/parts/meta', 'secondary' );  ?>
							                            </div>
							                            <div class="pull-right"><i class="fa-head"></i><?php the_author(); ?></div></div>                             </figcaption>
							                     </figure>
																 	</div>
            						</li>
			        <?php
			        if($num_post== 1){echo '</ul>';}
			              }
			              // end if
							else {
								?>
       		<li class="defier-first-post smallOne col-md-4 col-lg-4 col-sm-4 col-xs-12" style="<?php echo do_shortcode($li_style) ?>" >
				<div class="grid">
                     <figure class="effect-thumbDefier  slidertwoWarpper">
                         <img alt="<?php the_title(); ?>" src="<?php echo  the_post_thumbnail_url();?>"/>
                             <figcaption>
                                 <h2><a class="halfsize" href="<?php  the_permalink() ?>" alt="<?php the_title() ?>"><?php the_title() ?></a> </h2>
                                 <p><?php  echo do_shortcode($content);  ?></p>
																	<div class="meta-label">
																	    <div class="pull-left">
								                            <?php get_template_part( 'inc/post-formats/parts/meta', 'secondary' );  ?>
								                                 </div>
								                           <div class="pull-right"><i class="fa-head"></i><?php the_author(); ?></div></div>
								                       </figcaption>
								                     </figure>
																	 	</div>
								            			</li>
									            <?php
									            if($i== $num_post-1){echo '
			                        </ul>';}
						              					}
			                              $i++;
			                              }
                              // end while
                               ?>
                               <div class="alignCenter">
																<a href="<?php echo get_category_link((int)$defier_custom_widget_catogry); ?>">
																<button class="smallOne cat-Link-Metro" style="color:<?php $rl_category_color = defier_cat_color((int)$defier_custom_widget_catogry); ?>">
																<span>
																<b><?php echo __( 'Find Out More', 'defier' ) ?></b>
																<i class="fa fa-chevron-right" aria-hidden="true"></i>
																<?php echo   get_cat_name((int)$defier_custom_widget_catogry); ?>
																</span>
																</button>
															</a>
														</div>
														</section></div><?php
															}
															// end if check have post
													}
							    // end function widget
							}
							// end of class
add_action('widgets_init',function(){
register_widget('defier_metrolist_block') ;
});
?>
