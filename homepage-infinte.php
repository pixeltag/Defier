<?php
/*
    Template Name: Infinite Scroll
*/
add_action( 'wp_enqueue_scripts', 'defier_masorny_script' );
?>
<?php get_header(); ?>
            <div class="col-md-12 col-sm-12 col-xs-12 masonry">
                <div class="fixedwidth-container">
                <!-- home content -->
                <div id="primary" class="content-area" data-blog-type="<?php echo esc_attr($blog_type); ?>">
                        <main id="main" class="site-main" role="main">

                            <?php
                            //Fix homepage pagination
                            if ( get_query_var('paged') ) { $paged = get_query_var('paged'); } else if ( get_query_var('page') ) {$paged = get_query_var('page'); } else {$paged = 1; }

                            $temp = $wp_query;  // re-sets query
                            $wp_query = null;   // re-sets query
                            $args = array( 'post_type' => array('post', 'music', 'videos'), 'orderby'=>'date', 'order'=>'DESC', 'posts_per_page' => 10, 'paged' => $paged);
                            $wp_query = new WP_Query();
                            $wp_query->query( $args );
                            while ($wp_query->have_posts()) : $wp_query->the_post(); ?>
                            <?php get_template_part( 'content', 'masonry' );  ?>
                            <?php endwhile; ?>
                        </main><!-- #main -->

               </div><!-- #primary -->
                </div>
               <?php defier_numeric_posts_nav(); ?>

                </div>
<?php get_footer(); ?>
