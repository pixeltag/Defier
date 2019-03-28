<?php
function Colorpicker(){
    if( is_admin() ) {
        // Add the color picker css file
        wp_enqueue_style( 'wp-color-picker' );
        // Include our custom jQuery file with WordPress Color Picker dependency
        wp_enqueue_script( 'custom-script-handle',  get_stylesheet_directory_uri() . '/js/colorpicker.js', array( 'wp-color-picker' ), false, true );
    }
}
add_action('admin_enqueue_scripts', 'Colorpicker');
function defier_category_colors(){
    if ( !class_exists( 'Defier_Category_Colors' ) )
        return;
          $meta_sections = array();
          // Color Meta Box
          $meta_sections[] = array(
              'taxonomies' => array('category'),
              'id'         => 'rl_category_meta',
              'fields'     => array(
                  array(
                      'name' => 'Select Category Color',
                      'id'   => 'rl_cat_color',
                      'type' => 'color',
                  ),
              ),
          );
    foreach ($meta_sections as $meta_section){
        new Defier_Category_Colors( $meta_section );
    }
}

add_action( 'admin_init', 'defier_category_colors' );
?>
