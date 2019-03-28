<?php
global $defTheme;
class defier_menu_walker extends Walker_Nav_Menu {

    private $defier_mm_type = "";
    private $defier_mm_icon = "";
    private $defier_mm_image = "";
    private $defier_mm_position = "";
    private $defier_mm_position_y = "";
    private $defier_mm_repeat = "";
    private $defier_mm_min_height = "";
    private $defier_mm_padding_left = "";
    private $defier_mm_padding_right = "";
    private $defier_mm_has_children = "";

    /**
     * Starts the list before the elements are added.
     */
    public function start_lvl( &$output, $depth = 0, $args = array() ) {
        $indent = str_repeat("\t", $depth);

        if( $depth === 0 && $this->defier_mm_type == 'links' ){
            $output .= "\n$indent<ul class=\"sub-menu-columns\">\n";
        }
        elseif( $depth === 1 && $this->defier_mm_type == 'links' ){
            $output .= "\n$indent<ul class=\"sub-menu-columns-item\">\n";
        }
        elseif( $depth === 0 && $this->defier_mm_type == 'sub-posts' ){
            $output .= "\n$indent<ul class=\"col-sm-3 col-lg-3 col-md-3 sub-menu mega-cat-more-links \">\n";
        }
        elseif( $depth === 0 && $this->defier_mm_type == 'recent' ){
            $output .= "\n$indent<ul class=\"mega-recent-featured-list sub-list\">\n";
        }
        else{
            $output .= "\n$indent<ul class=\"sub-menu menu-sub-content\">\n";
        }
    }


    /**
     * Ends the list of after the elements are added.
     */
    public function end_lvl( &$output, $depth = 0, $args = array() ) {
        $indent = str_repeat("\t", $depth);
        $output .= "$indent</ul>\n";

    }


    /**
     * Start the element output.
     */
    public function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
        $indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';

        $classes = empty( $item->classes ) ? array() : (array) $item->classes;
        $classes[] = 'menu-item-' . $item->ID;

        /**
         * Filter the CSS class(es) applied to a menu item's <li>.
         */
        $class_names = join( " " , apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args ) );


        //By defierLabs ===========
        $a_class = '';

        // Define the mega vars
        if( $depth === 0 ){
            $this->defier_mm_has_children           = $args->has_children;;
            $this->defier_mm_type 	      = get_post_meta( $item->ID, 'defier_mm_type', true );
            $this->defier_megamenu_columns       = get_post_meta( $item->ID, 'defier_megamenu_columns', true );
            $this->defier_mm_image         = get_post_meta( $item->ID, 'defier_mm_image', true );
            $this->defier_mm_position      = get_post_meta( $item->ID, 'defier_mm_position', true );
            $this->defier_mm_position_y    = get_post_meta( $item->ID, 'defier_mm_position_y', true );
            $this->defier_mm_repeat 	      = get_post_meta( $item->ID, 'defier_mm_repeat', true );
            $this->defier_mm_min_height    = get_post_meta( $item->ID, 'defier_mm_min_height', true );
            $this->defier_mm_padding_left  = get_post_meta( $item->ID, 'defier_mm_padding_left', true );
            $this->defier_mm_padding_right = get_post_meta( $item->ID, 'defier_mm_padding_right', true );
        }
        $this->defier_mm_icon = get_post_meta( $item->ID, 'defier_mm_icon', true);

        //Menu Classes
        if( $depth === 0 && !empty( $this->defier_mm_type ) && $this->defier_mm_type != 'disable' ){
            $class_names .= ' mega-menu';

            if(  $this->defier_mm_type == 'sub-posts' &&  $item->object == 'category' ){
                $class_names .= ' mega-cat ';
            }
            elseif( $this->defier_mm_type == 'links' ){
                $columns = ( !empty( $this->defier_megamenu_columns ) ? $this->defier_megamenu_columns :  2 );
                $class_names .= ' mega-links mega-links-'.$columns.'col ';
            }
            elseif( $this->defier_mm_type == 'recent' ){
                $class_names .= ' mega-recent-featured ';
            }
        }

        if( $depth === 1 && $this->defier_mm_type == 'links' ){
            $class_names .=' mega-link-column ';
            $a_class = ' class="mega-links-head" ';
        }
        // =====================

        $class_names = $class_names ? ' class="' . esc_attr( $class_names ) . '"' : '';

        /**
         * Filter the ID applied to a menu item's <li>.
         */
        $id = apply_filters( 'nav_menu_item_id', 'menu-item-'. $item->ID, $item, $args );
        $id = $id ? ' id="' . esc_attr( $id ) . '"' : '';

        $output .= $indent . '<li' . $id . $class_names .'>';

        $atts = array();
        $atts['title']  = ! empty( $item->attr_title ) ? $item->attr_title : '';
        $atts['target'] = ! empty( $item->target )     ? $item->target     : '';
        $atts['rel']    = ! empty( $item->xfn )        ? $item->xfn        : '';
        $atts['href']   = ! empty( $item->url )        ? $item->url        : '';

        /**
         * Filter the HTML attributes applied to a menu item's <a>.
         *
         */
        $atts = apply_filters( 'nav_menu_link_attributes', $atts, $item, $args );

        $attributes = '';
        foreach ( $atts as $attr => $value ) {
            if ( ! empty( $value ) ) {
                $value = ( 'href' === $attr ) ? esc_url( $value ) : esc_attr( $value );
                $attributes .= ' ' . $attr . '="' . $value . '"';
            }
        }

        $item_output = $args->before;
        $item_output .= '<a'.$a_class . $attributes .'>';

        if( !empty( $this->defier_mm_icon ) )
            $item_output .= '<span class="menu-icon"><i class="fa '.$this->defier_mm_icon.'"></i></span>';

        /** This filter is documented in wp-includes/post-template.php */
        $item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
        $item_output .= '</a>';
        $item_output .= $args->after;


        //By defierLabs ===========
        if( $depth === 0 && !empty( $this->defier_mm_type ) && $this->defier_mm_type != 'disable' ){

            $img = $padding_left = $padding_right = $style = $min_height ='';
            if ( !empty( $this->defier_mm_image )) {
                $img = " background-image: url($this->defier_mm_image) ; background-position: $this->defier_mm_position_y $this->defier_mm_position ; background-repeat: $this->defier_mm_repeat ; ";
            }
            if ( !empty( $this->defier_mm_padding_left ) ) {
                $padding_left = $this->defier_mm_padding_left;
                if ( strpos( $padding_left , 'px' ) === false && strpos( $padding_left , '%' ) === false ) $padding_left .= 'px';
                $padding_left = " padding-left : $padding_left; ";
            }
            if ( !empty( $this->defier_mm_padding_right ) ) {
                $padding_right = $this->defier_mm_padding_right;
                if ( strpos( $padding_right , 'px' ) === false && strpos( $padding_right , '%' ) === false ) $padding_right .= 'px';
                $padding_right = " padding-right : $padding_right; ";
            }
            if ( !empty( $this->defier_mm_min_height ) ) {
                $min_height = $this->defier_mm_min_height;
                if ( strpos( $min_height , 'px' ) === false ) $min_height .= 'px';
                $min_height = " min-height : $min_height; ";
            }

            if ( !empty( $img ) || !empty( $padding_left ) || !empty( $padding_right ) ) $style=' style="'.$img.$padding_left.$padding_right.$min_height.'"';

            $item_output .="\n<div class=\"mega-menu-block menu-sub-content\"$style>\n";
        }
        // =====================

        /**
         * Filter a menu item's starting output.
         */
        $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
    }


    /**
     * Ends the element output, if needed.
     */
    public function end_el( &$output, $item, $depth = 0, $args = array() ) {

        //By defierLabs ===========
        if( $depth === 0 && !empty( $this->defier_mm_type ) && $this->defier_mm_type != 'disable' ){
            $output .="\n<div class=\"mega-menu-content col-lg-12 col-sm-12 col-md-12\">\n";

            //Sub Categories ===============================================================
            if(  $this->defier_mm_type == 'sub-posts' &&  $item->object == 'category' ){
                $no_sub_categories = $sub_categories_exists = $sub_categories = '';

                $query_args = array(
                    'child_of'                 => $item->object_id,
                );
                $sub_categories = get_categories($query_args);

                //Check if the Category doesn't contain any sub categories.
                if( count($sub_categories) == 0) {
                    $sub_categories = array( $item->object_id ) ;
                    $no_sub_categories = true ;
                }else{
                    $sub_categories_exists = ' mega-cat-sub-exists';
                }



                $output .= '<div class="mega-cat-wrapper "> ';

                if( !$no_sub_categories ){
                    $output .= '<ul class="mega-cat-sub-categories"> ';
                    foreach( $sub_categories as $category ) {
                        $output .= '<li><a href="#mega-cat-'.$item->ID.'-'.$category->term_id.'">'.$category->name.'</a></li>';

                    }
                    $output .=  '</ul> ';
                }

                $output .= ' <div class="mega-cat-content'. $sub_categories_exists.'">';
                global $defTheme ;
                foreach( $sub_categories as $category ) {

                    if( !$no_sub_categories )
                        $cat_id = $category->term_id;
                    else
                        $cat_id = $category;

                    $output .=  '<div id="mega-cat-'.$item->ID.'-'.$cat_id.'" class="mega-cat-content-tab"><ul class="defier-posts-list mega-menu-post col-sm-12 col-lg-12 col-md-12 col-xs-12">';

                    $cat_query = new WP_Query('cat='.$cat_id.'&ignore_sticky_posts=1&no_found_rows=1&posts_per_page=4');
                    while ( $cat_query->have_posts() ) {
                        $cat_query->the_post();
                        $img_classes = defier_get_post_class( 'post-thumbnail' );
                        $post_time = defier_get_time( true );
                        $output .= '<li class="defier-first-post col-sm-3 col-lg-3 col-md-6 col-xs-12">';
                        if ( function_exists("has_post_thumbnail") && has_post_thumbnail() )
                            $output .= '<div '.$img_classes.'>
                            <div class="grid">
                            <figure class="effect-thumbDefier  slidertwoWarpper ">
                            <img src="'.defier_thumb_src( 'defier-medium' ).'" />
                            <figcaption>
                            <h2>
                            <a class="mega-menu-link halfsize" href="'. get_permalink().'" title="'.get_the_title().'">'.get_the_title().'</a>
                            </h2>
                            <div class="meta-label"><div class="pull-left">'.$post_time.'</div></div>
                            </figcaption></figure></div></div>';
                        $output .= '

							</li> <!-- mega-menu-post -->';
                    }
                    $output .=  '</ul></div><!-- .mega-cat-content-tab --> ';
                }

                $output .= '</div> <!-- .mega-cat-content -->
								<div class="clear"></div>
							</div> <!-- .mega-cat-Wrapper --> ';
            }

            // End of Sub Categories =====================================================

            //Recent + Check also =============================================================
            if( $this->defier_mm_type == 'recent' &&  $item->object == 'category' ){
                $count = 0;
                $output_more_posts = '';
                $posts_number = ( empty( $this->defier_mm_has_children ) ? 7 :  4 );

                $cat_query = new WP_Query('cat='. $item->object_id .'&no_found_rows=1&posts_per_page='.$posts_number);
                while ( $cat_query->have_posts() ) { $count ++ ;
                    $cat_query->the_post();
                    $img_classes = defier_get_post_class( 'post-thumbnail' );
                    $post_time = defier_get_time( true );
                    if( $count == 1){
                        if ( function_exists("has_post_thumbnail") && has_post_thumbnail() )
                            $output .= '<ul class="defier-posts-list hotspot col-lg-4 col-sm-4 col-md-4">
                            <li class="defier-first-post">
                            <div class="grid">
                            <figure class="effect-thumbDefier  slidertwoWarpper">
                            <img src="'.defier_thumb_src( 'slider' ).'" />
                            <figcaption>
                            <p>'.$post_time.'</p>
                            <h2><a class="quarterSize" href="'. get_permalink().'" title="'.get_the_title().'">'.get_the_title().'</a></h2>
                            </figcaption>
                            </figure></div>
                            </li>
                            </ul>';
                    }else{
                        $output_more_posts .= '<li>';
                        if ( function_exists("has_post_thumbnail") && has_post_thumbnail() )
                        $output_more_posts .= '<div '.$img_classes.'>
                        <a class="mega-menu-link pointer" href="'. get_permalink().'" title="'.get_the_title().'">
                        <figure class="megaMenuThumb"><img src="'.defier_thumb_src( ).'" />
                        </figure></a>
                        </div>';
                        $output_more_posts .= '<h3 class="post-box-title"><a class="mega-menu-link" href="'. get_permalink().'" title="'.get_the_title().'">'.get_the_title().'</a><p>'.$post_time.'</p></h3>';
                        $output_more_posts .= '</li>';
                    }
                }

                $output .= '<div class="mega-check-also col-lg-8 col-sm-7 col-md-8"><ul>'.$output_more_posts.'</ul></div> <!-- mega-check-also -->';

            }

            // End of Sub Categories =====================================================

            $output .= "\n</div><!-- .mega-menu-content --> \n</div><!-- .mega-menu-block --> \n";
        }
        // =====================

        $output .= "</li>\n";
    }


    function display_element( $element, &$children_elements, $max_depth, $depth=0, $args = array() , &$output ) {
        $id_field = $this->db_fields['id'];
        if ( is_object( $args[0] ) ) {
            $args[0]->has_children = ! empty( $children_elements[$element->$id_field] );
        }
        return parent::display_element( $element, $children_elements, $max_depth, $depth, $args, $output );
    }
} // Walker_Nav_Menu



// Back end modification on Menus page ===============================================
add_filter( 'wp_edit_nav_menu_walker', 'defier_custom_nav_edit_walker',10,2 );
function defier_custom_nav_edit_walker($walker,$menu_id) {
    return 'defier_mega_menu_edit_walker';
}


// The Custom menu fields
add_action( 'defier_nav_menu_item_custom_fields', 'defier_add_megamenu_fields', 10, 4 );
function defier_add_megamenu_fields( $item_id, $item, $depth, $args ) { ?>

    <div class="clear"></div>
    <div class="defier-mega-menu-type">
        <p class="field-megamenu-icon description description-wide">
            <label for="edit-menu-item-megamenu-icon-<?php echo esc_html(esc_html($item_id)); ?>">
                <?php _e( 'Menu Icon (use full Font Awesome name)', 'defier' ); ?>
                <input type="text" id="edit-menu-item-megamenu-icon-<?php echo esc_html(esc_html($item_id)); ?>" class="widefat code edit-menu-item-megamenu-icon" name="menu-item-defier-mm-icon[<?php echo esc_html(esc_html($item_id)); ?>]" value="<?php echo esc_html($item->defier_mm_icon); ?>" />
            </label>
        </p>

        <p class="field-megamenu-type description description-wide">
            <label for="edit-menu-item-megamenu-type-<?php echo esc_html(esc_html($item_id)); ?>">
                <?php _e( 'Enable Mega Menu ?', 'defier' ); ?>
                <select id="edit-menu-item-megamenu-type-<?php echo esc_html(esc_html($item_id)); ?>" class="widefat codec edit-menu-item-megamenu-icon" name="menu-item-defier-mm-type[<?php echo esc_html(esc_html($item_id)); ?>]">
                    <option value="disable" <?php selected( $item->defier_mm_type, 'disable' ); ?>><?php _e( 'Disable', 'defier' ); ?></option>
                    <?php  if( $item->object == 'category' ){  ?>
                        <option value="sub-posts" <?php selected( $item->defier_mm_type, 'sub-posts' ); ?>><?php _e( 'Sub Categories + Posts', 'defier' ); ?></option>
                        <option value="recent" <?php selected( $item->defier_mm_type, 'recent' ); ?>><?php _e( 'Recent post + Check also', 'defier' ); ?></option>
                    <?php } ?>
                </select>
            </label>
        </p>
        <style>
            [dir="rtl"] .menu-item-settings {float: right}
        </style>
    </div>
<?php }


// Save The custom Fields
add_action('wp_update_nav_menu_item', 'defier_custom_nav_update',10, 3);
function defier_custom_nav_update($menu_id, $menu_item_db_id, $args ) {

    if ( isset($_REQUEST['menu-item-defier-mm-type']) ) {
        $custom_value = $_REQUEST['menu-item-defier-mm-type'][$menu_item_db_id];
        update_post_meta( $menu_item_db_id, 'defier_mm_type', $custom_value );
    }

    if ( isset($_REQUEST['menu-item-defier-mm-columns']) ) {
        $custom_value = $_REQUEST['menu-item-defier-mm-columns'][$menu_item_db_id];
        update_post_meta( $menu_item_db_id, 'defier_megamenu_columns', $custom_value );
    }

    if ( isset($_REQUEST['menu-item-defier-mm-icon']) ) {
        $custom_value = $_REQUEST['menu-item-defier-mm-icon'][$menu_item_db_id];
        update_post_meta( $menu_item_db_id, 'defier_mm_icon', $custom_value );
    }

}

/*
 * Adds value of new field to $item object that will be passed to     Walker_Nav_Menu_Edit_Custom
 */
add_filter( 'wp_setup_nav_menu_item','defier_custom_nav_item' );
function defier_custom_nav_item($menu_item) {
    $menu_item->defier_mm_type = get_post_meta( $menu_item->ID, 'defier_mm_type', true );
    $menu_item->defier_mm_icon = get_post_meta( $menu_item->ID, 'defier_mm_icon', true );
    return $menu_item;
}


/**
 * Navigation Menu template functions
 */
class defier_mega_menu_edit_walker extends Walker_Nav_Menu {
    /**
     * Starts the list before the elements are added.
     *
     * @see Walker_Nav_Menu::start_lvl()
     *
     * @since 3.0.0
     *
     * @param string $output Passed by reference.
     * @param int    $depth  Depth of menu item. Used for padding.
     * @param array  $args   Not used.
     */
    public function start_lvl( &$output, $depth = 0, $args = array() ) {}

    /**
     * Ends the list of after the elements are added.
     *
     * @see Walker_Nav_Menu::end_lvl()
     *
     * @since 3.0.0
     *
     * @param string $output Passed by reference.
     * @param int    $depth  Depth of menu item. Used for padding.
     * @param array  $args   Not used.
     */
    public function end_lvl( &$output, $depth = 0, $args = array() ) {}

    /**
     * Start the element output.
     *
     * @see Walker_Nav_Menu::start_el()
     * @since 3.0.0
     *
     * @param string $output Passed by reference. Used to append additional content.
     * @param object $item   Menu item data object.
     * @param int    $depth  Depth of menu item. Used for padding.
     * @param array  $args   Not used.
     * @param int    $id     Not used.
     */
    public function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
        global $_wp_nav_menu_max_depth;
        $_wp_nav_menu_max_depth = $depth > $_wp_nav_menu_max_depth ? $depth : $_wp_nav_menu_max_depth;

        ob_start();
        $item_id = esc_attr( $item->ID );
        $removed_args = array(
            'action',
            'customlink-tab',
            'edit-menu-item',
            'menu-item',
            'page-tab',
            '_wpnonce',
        );

        $original_title = '';
        if ( 'taxonomy' == $item->type ) {
            $original_title = get_term_field( 'name', $item->object_id, $item->object, 'raw' );
            if ( is_wp_error( $original_title ) )
                $original_title = false;
        } elseif ( 'post_type' == $item->type ) {
            $original_object = get_post( $item->object_id );
            $original_title = get_the_title( $original_object->ID );
        }

        $classes = array(
            'menu-item menu-item-depth-' . $depth,
            'menu-item-' . esc_attr( $item->object ),
            'menu-item-edit-' . ( ( isset( $_GET['edit-menu-item'] ) && esc_html($item_id) == $_GET['edit-menu-item'] ) ? 'active' : 'inactive'),
        );

        $title = $item->title;

        if ( ! empty( $item->_invalid ) ) {
            $classes[] = 'menu-item-invalid';
            /* translators: %s: title of menu item which is invalid */
            $title = sprintf( do_shortcode( '%s (Invalid)', 'defier' ), $item->title );
        } elseif ( isset( $item->post_status ) && 'draft' == $item->post_status ) {
            $classes[] = 'pending';
            /* translators: %s: title of menu item in draft status */
            $title = sprintf( do_shortcode('%s (Pending)', 'defier'), $item->title );
        }

        $title = ( ! isset( $item->label ) || '' == $item->label ) ? $title : $item->label;

        $submenu_text = '';
        if ( 0 == $depth )
            $submenu_text = 'style="display: none;"';

        ?>
    <li id="menu-item-<?php echo esc_html(esc_html($item_id)); ?>" class="<?php echo implode(' ', $classes ); ?>">
        <dl class="menu-item-bar">
            <dt class="menu-item-handle">
                <span class="item-title"><span class="menu-item-title"><?php echo do_shortcode( $title ); ?></span> <span class="is-submenu" <?php echo esc_html($submenu_text); ?>><?php echo do_shortcode( 'Sub item','defier' ); ?></span></span>
					<span class="item-controls">
						<span class="item-type"><?php echo do_shortcode( $item->type_label ); ?></span>
						<span class="item-order hide-if-js">
							<a href="<?php
                            echo wp_nonce_url(
                                add_query_arg(
                                    array(
                                        'action' => 'move-up-menu-item',
                                        'menu-item' => esc_html($item_id),
                                    ),
                                    remove_query_arg($removed_args, admin_url( 'nav-menus.php' ) )
                                ),
                                'move-menu_item'
                            );
                            ?>" class="item-move-up"><abbr title="<?php echo do_shortcode('Move up', 'defier'); ?>">&#8593;</abbr></a>
							|
							<a href="<?php
                            echo wp_nonce_url(
                                add_query_arg(
                                    array(
                                        'action' => 'move-down-menu-item',
                                        'menu-item' => esc_html($item_id),
                                    ),
                                    remove_query_arg($removed_args, admin_url( 'nav-menus.php' ) )
                                ),
                                'move-menu_item'
                            );
                            ?>" class="item-move-down"><abbr title="<?php echo do_shortcode('Move down', 'defier'); ?>">&#8595;</abbr></a>
						</span>
						<a class="item-edit" id="edit-<?php echo esc_html(esc_html($item_id)); ?>" title="<?php echo do_shortcode('Edit Menu Item', 'defier'); ?>" href="<?php
                        echo ( isset( $_GET['edit-menu-item'] ) && esc_html($item_id) == $_GET['edit-menu-item'] ) ? admin_url( 'nav-menus.php' ) : add_query_arg( 'edit-menu-item', esc_html($item_id), remove_query_arg( $removed_args, admin_url( 'nav-menus.php#menu-item-settings-' . esc_html($item_id) ) ) );
                        ?>"><?php echo do_shortcode( 'Edit Menu Item' , 'defier'); ?></a>
					</span>
            </dt>
        </dl>

        <div class="menu-item-settings" id="menu-item-settings-<?php echo esc_html(esc_html($item_id)); ?>">
            <?php if( 'custom' == $item->type ) : ?>
                <p class="field-url description description-wide">
                    <label for="edit-menu-item-url-<?php echo esc_html(esc_html($item_id)); ?>">
                        <?php echo do_shortcode( 'URL', 'defier' ); ?><br />
                        <input type="text" id="edit-menu-item-url-<?php echo esc_html(esc_html($item_id)); ?>" class="widefat code edit-menu-item-url" name="menu-item-url[<?php echo esc_html(esc_html($item_id)); ?>]" value="<?php echo esc_attr( $item->url ); ?>" />
                    </label>
                </p>
            <?php endif; ?>
            <p class="description description-thin">
                <label for="edit-menu-item-title-<?php echo esc_html(esc_html($item_id)); ?>">
                    <?php echo do_shortcode( 'Navigation Label', 'defier' ); ?><br />
                    <input type="text" id="edit-menu-item-title-<?php echo esc_html(esc_html($item_id)); ?>" class="widefat edit-menu-item-title" name="menu-item-title[<?php echo esc_html(esc_html($item_id)); ?>]" value="<?php echo esc_attr( $item->title ); ?>" />
                </label>
            </p>
            <p class="description description-thin">
                <label for="edit-menu-item-attr-title-<?php echo esc_html(esc_html($item_id)); ?>">
                    <?php echo do_shortcode( 'Title Attribute', 'defier' ); ?><br />
                    <input type="text" id="edit-menu-item-attr-title-<?php echo esc_html($item_id); ?>" class="widefat edit-menu-item-attr-title" name="menu-item-attr-title[<?php echo esc_html($item_id); ?>]" value="<?php echo esc_attr( $item->post_excerpt ); ?>" />
                </label>
            </p>
            <p class="field-link-target description">
                <label for="edit-menu-item-target-<?php echo esc_html($item_id); ?>">
                    <input type="checkbox" id="edit-menu-item-target-<?php echo esc_html($item_id); ?>" value="_blank" name="menu-item-target[<?php echo esc_html($item_id); ?>]"<?php checked( $item->target, '_blank' ); ?> />
                    <?php echo do_shortcode( 'Open link in a new window/tab', 'defier' ); ?>
                </label>
            </p>
            <p class="field-css-classes description description-thin">
                <label for="edit-menu-item-classes-<?php echo esc_html($item_id); ?>">
                    <?php echo do_shortcode( 'CSS Classes (optional)', 'defier'); ?><br />
                    <input type="text" id="edit-menu-item-classes-<?php echo esc_html($item_id); ?>" class="widefat code edit-menu-item-classes" name="menu-item-classes[<?php echo esc_html($item_id); ?>]" value="<?php echo esc_attr( implode(' ', $item->classes ) ); ?>" />
                </label>
            </p>
            <p class="field-xfn description description-thin">
                <label for="edit-menu-item-xfn-<?php echo esc_html($item_id); ?>">
                    <?php echo do_shortcode( 'Link Relationship (XFN)', 'defier'); ?><br />
                    <input type="text" id="edit-menu-item-xfn-<?php echo esc_html($item_id); ?>" class="widefat code edit-menu-item-xfn" name="menu-item-xfn[<?php echo esc_html($item_id); ?>]" value="<?php echo esc_attr( $item->xfn ); ?>" />
                </label>
            </p>
            <p class="field-description description description-wide">
                <label for="edit-menu-item-description-<?php echo esc_html($item_id); ?>">
                    <?php echo do_shortcode( 'Description', 'defier'); ?><br />
                    <textarea id="edit-menu-item-description-<?php echo esc_html($item_id); ?>" class="widefat edit-menu-item-description" rows="3" cols="20" name="menu-item-description[<?php echo esc_html($item_id); ?>]"><?php echo do_shortcode( $item->description ); // textarea_escaped ?></textarea>
                    <span class="description"><?php echo do_shortcode('The description will be displayed in the menu if the current theme supports it.', 'defier' ); ?></span>
                </label>
            </p>


            <?php
            //By defierlabs **************************************************

            do_action( 'defier_nav_menu_item_custom_fields', esc_html($item_id), $item, $depth, $args );

            // END ********************************************************
            ?>

            <p class="field-move hide-if-no-js description description-wide">
                <label>
                    <span><?php echo do_shortcode( 'Move', 'defier' ); ?></span>
                    <a href="#" class="menus-move-up"><?php echo do_shortcode( 'Up one' , 'defier'); ?></a>
                    <a href="#" class="menus-move-down"><?php echo do_shortcode( 'Down one' , 'defier'); ?></a>
                    <a href="#" class="menus-move-left"></a>
                    <a href="#" class="menus-move-right"></a>
                    <a href="#" class="menus-move-top"><?php echo do_shortcode( 'To the top', 'defier'); ?></a>
                </label>
            </p>
              <style>
                     .menu-item-settings {
                            float: left;
                            margin-bottom:15px;
                        }
              </style>
            <div class="menu-item-actions description-wide submitbox">
                <?php if( 'custom' != $item->type && $original_title !== false ) : ?>
                    <p class="link-to-original">
                        <?php printf( do_shortcode('Original: %s', 'defier'), '<a href="' . esc_attr( $item->url ) . '">' . esc_html( $original_title ) . '</a>' ); ?>
                    </p>
                <?php endif; ?>
                <a class="item-delete submitdelete deletion" id="delete-<?php echo esc_html($item_id); ?>" href="<?php
                echo wp_nonce_url(
                    add_query_arg(
                        array(
                            'action' => 'delete-menu-item',
                            'menu-item' => esc_html($item_id),
                        ),
                        admin_url( 'nav-menus.php' )
                    ),
                    'delete-menu_item_' . esc_html($item_id)
                ); ?>"><?php echo do_shortcode( 'Remove' , 'defier'); ?></a> <span class="meta-sep hide-if-no-js"> | </span> <a class="item-cancel submitcancel hide-if-no-js" id="cancel-<?php echo esc_html($item_id); ?>" href="<?php echo esc_url( add_query_arg( array( 'edit-menu-item' => esc_html($item_id), 'cancel' => time() ), admin_url( 'nav-menus.php' ) ) );
                ?>#menu-item-settings-<?php echo esc_html($item_id); ?>"><?php echo do_shortcode('Cancel', 'defier'); ?></a>
            </div>
            <input class="menu-item-data-db-id" type="hidden" name="menu-item-db-id[<?php echo esc_html($item_id); ?>]" value="<?php echo esc_html($item_id); ?>" />
            <input class="menu-item-data-object-id" type="hidden" name="menu-item-object-id[<?php echo esc_html($item_id); ?>]" value="<?php echo esc_attr( $item->object_id ); ?>" />
            <input class="menu-item-data-object" type="hidden" name="menu-item-object[<?php echo esc_html($item_id); ?>]" value="<?php echo esc_attr( $item->object ); ?>" />
            <input class="menu-item-data-parent-id" type="hidden" name="menu-item-parent-id[<?php echo esc_html($item_id); ?>]" value="<?php echo esc_attr( $item->menu_item_parent ); ?>" />
            <input class="menu-item-data-position" type="hidden" name="menu-item-position[<?php echo esc_html($item_id); ?>]" value="<?php echo esc_attr( $item->menu_order ); ?>" />
            <input class="menu-item-data-type" type="hidden" name="menu-item-type[<?php echo esc_html($item_id); ?>]" value="<?php echo esc_attr( $item->type ); ?>" />
        </div><!-- .menu-item-settings-->
        <ul class="menu-item-transport"></ul>
        <?php
        $output .= ob_get_clean();
    }


} // Walker_Nav_Menu
?>
