<?php
/**
 * The template for displaying all single posts.
 *
 * @package defier
 */

global $wp_query;
$postid = $wp_query->post->ID;
get_header(); ?>
    <?php
    $meta_value = get_post_meta($postid,'postsTemplates',true);
    ?>
       <div class="fixedwidth-container <?php echo $meta_value; ?>">
         <div class="col-lg-12">
            <div class="row">
            <?php
            $meta_value = get_post_meta($post->ID, 'defier_post_layout', true);

                switch ($meta_value)
                    {
                        case $meta_value == "Standard" :
                            get_template_part( 'inc/single/single', 'standard' );
                            break ;
                        case $meta_value == "Sidebar-Right" :
                            get_template_part( 'inc/single/sidebar', 'right' );
                            break ;
                        case $meta_value == "Sidebar-Left" :
                            get_template_part( 'inc/single/sidebar', 'left' );
                            break ;
                        case $meta_value == "Full-width" :
                            get_template_part( 'inc/single/single', 'fullwidth' );
                            break ;
                    }
            ?>
        </div>
      </div>
    </div>
<?php get_footer(); ?>
