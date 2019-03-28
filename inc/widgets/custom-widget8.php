<?php
/*************************************/
/******** Gallery Block **************/
/*************************************/
class defier_gallery_block extends Wp_Widget {
    function __construct () {
    parent::__construct(false ,$name = do_shortcode('Defier Block | Gallery', 'defier'));
    } //end function construct
    public function form( $instance ) {
        $num_post = ! empty( $instance['num_post'] ) ? $instance['num_post'] : __( 'Widget Title', 'defier' );
        $widget_port_title = ! empty( $instance['widget_port_title'] ) ? $instance['widget_port_title'] : __( 'Camera', 'defier' );
        $defier_custom_widget_catogry_value = ! empty( $instance['defier_custom_widget_catogry'] ) ? $instance['defier_custom_widget_catogry'] : 1;
        ?>
        <p>
        <label for="<?php echo esc_html($this->get_field_id( 'widget_port_title' )); ?>"><?php echo do_shortcode( 'Number Of Posts:', 'defier' ); ?></label>
        <input class="widefat" id="<?php echo esc_html($this->get_field_id( 'widget_port_title' )); ?>" name="<?php echo esc_html($this->get_field_name( 'widget_port_title' )); ?>" type="text" value="<?php echo esc_attr( $widget_port_title ); ?>">
        </p>
        <p>
            <label for="<?php echo esc_html($this->get_field_id( 'num_post' )); ?>"><?php echo do_shortcode( 'Number Of Posts:' ); ?></label>
            <input class="widefat" id="<?php echo esc_html($this->get_field_id( 'num_post' )); ?>" name="<?php echo esc_html($this->get_field_name( 'num_post' )); ?>" type="text" value="<?php echo esc_attr( $num_post ); ?>">
        </p>
    <?php
    }
    // end function form
    public function update( $new_instance, $old_instance ) {
        $instance = array();
        $instance['num_post'] = ( ! empty( $new_instance['num_post'] ) ) ? strip_tags( $new_instance['num_post'] ) : '';
        $instance['widget_port_title'] = ( ! empty( $new_instance['widget_port_title'] ) ) ? strip_tags( $new_instance['widget_port_title'] ) : '';
        return $instance;
    }///// end function update
    function widget($arags ,$instance)
    {
        extract($arags);
        $num_post = empty($instance['num_post']) ? '4' : $instance['num_post'];
        $widget_port_title = empty($instance['widget_port_title']) ? 'Portofolio' : $instance['widget_port_title'];
			$content  = wp_trim_words( get_the_content(), 20, '<a class="readMore" href="'. get_permalink() .'"><i class="fa-ellipsis" aria-hidden="true"></i>'. __( 'Read More', 'defier' ) .' </a>' );
        // The Query
        $i = 0 ;
			if(function_exists('defier_cat_color')){
				?>
				<a href="<?php get_category_link($defier_custom_widget_catogry); ?> ">
				<span class="defier-cat-title"><h4 class="widget-title"><div class="lavecat" style="background:<?php $rl_category_color = defier_cat_color($defier_custom_widget_catogry); ?>"></div></i>
						<?php echo esc_attr( $widget_port_title ); ?></h4></span></a>
			<?php }
            $loop = new WP_Query(array('post_type' => 'project', 'posts_per_page' => (int)$num_post));
            $count =0;
            ?>
            <div id="portfolio-wrapper">
                <ul class="portfolio-list">

                    <?php if ( $loop ) :
                        while ( $loop->have_posts() ) : $loop->the_post(); ?>
                            <?php
                            	  global $wp_query;
                                $post = $wp_query->post;
                                $terms = get_the_terms( $post->ID, 'tagportfolio' );
                                if ( $terms && ! is_wp_error( $terms ) ) :
                                    $links = array();
                                    foreach ( $terms as $term )
                                    {
                                        $links[] = $term->name;
                                    }
                                    $links = str_replace(' ', '-', $links);
                                    $tax = join( " ", $links );
                                    else :
                                    $tax = '';
                                      endif;
                                    ?>
                            <?php $infos = get_post_custom_values('_url'); ?>
                        <li class="col-sm-4 col-lg-3 col-md-3 col-xs-12 nopadding gridThumb">
            							<div class="grid">
            								<figure class="effect-thumbDefier-gallery">
                                    <?php the_post_thumbnail(  ); ?>
									                           <figcaption>
                                                <h4>
                                                <a href="<?php the_permalink() ?>"><?php the_title(); ?></a>
                                                </h4>
                                                <p class="excerpt"><?php echo do_shortcode($content); ?></p>
                                                    <p class="links">
                                                        <a href="<?php echo esc_url($infos[0]); ?>" target="_blank">
                                                            <i class="fa-link2"></i>
                                                        </a>
                                                    <a class="expandImg"><i class="fa-eye2"></i></a>
                                                    </p>
                              									</figcaption>
                              								</figure>
                              							</div>
                              						</li>
                        <?php endwhile; else: ?>
                        <li class="error-not-found"><?php _e( 'Sorry, no portfolio entries for while.', 'defier' ); ?></li>
                    <?php endif; ?>
                </ul>
               </section></div>
               <?php
    }
    // end function widget
}
// end of class
add_action('widgets_init',function(){
    register_widget('defier_gallery_block') ;
});
?>
