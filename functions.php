<?php
/**
 * defier functions and definitions
 *
 * @package defier
 */
global $defTheme;
/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 640; /* pixels */
}

if ( ! function_exists( 'defier_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function defier_setup() {

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on defier, use a find and replace
	 * to change 'defier' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'defier', get_template_part( 'languages' )  );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	// This theme uses wp_nav_menu() in one location.
    register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'defier' ),
        )
	 );


    /*-----------------------------------------------------------------------------------*/
    /*  WP Mega Menu
    /*-----------------------------------------------------------------------------------*/

    /* Change image size */
    function megamenu_thumbnails( $thumbnail_html, $post_id ) {
        if (has_post_thumbnail()) {
            $thumb_id = get_post_thumbnail_id();
            $widget_image = wp_get_attachment_image_src( $thumb_id, 'full' );
            $widget_image = $widget_image[0];
            $thumbnail = bfi_thumb( $widget_image, array( 'width' => '265', 'height' => '174', 'crop' => true ) );
        } else {
            $thumbnail = get_template_directory_uri().'/images/nothumb-265x174.png';
        }
        $thumbnail_html = '<div class="wpmm-thumbnail">';
        $thumbnail_html .= '<a title="'.get_the_title( $post_id ).'" href="'.get_permalink( $post_id ).'">';
        $thumbnail_html .= '<img src="'.$thumbnail.'" class="wp-post-image">';
        $thumbnail_html .= '</a>';

        // WP Review
        $thumbnail_html .= (function_exists('wp_review_show_total') ? wp_review_show_total(false) : '');

        $thumbnail_html .= '</div>';

        return $thumbnail_html;
    }
    add_filter( 'wpmm_thumbnail_html', 'megamenu_thumbnails', 10, 2 );


    /******************************************************************
     * Register Sliding Menu
     *****************************************************************/

    register_nav_menus( array(
		'sliding' => __( 'Sliding Menu', 'defier' ),
	) );

    /******************************************************************
     * Register footer Menu
     *****************************************************************/

    register_nav_menus( array(
		'footer-menu' => __( 'Footer Menu', 'defier' ),
	) );



    function left_sidebar_menu() {
// This theme uses wp_nav_menu() in one location.
        register_nav_menu( 'side-menu-left', __( 'Sidebar Left Menu', 'defier' ) );
    }
    add_action ( 'after_theme_setup' , 'left_sidebar_menu');


    /*
     * Switch default core markup for search form, comment form, and comments
     * to output valid HTML5.
     */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption',
	) );

	/*
	 * Enable support for Post Formats.
	 * See http://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'aside', 'image', 'video', 'quote', 'link', 'status','gallery','audio'
	) );



    // Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'defier_magazine_blog_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif; // defier_setup
add_action( 'after_setup_theme', 'defier_setup' );

/******************************************************************
 * Register widget area.
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 *****************************************************************/

function defier_sidebar_one() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'defier' ),
		'id'            => 'sidebar-1',
		'description'   => do_shortcode('Main Sidebar ', 'defier'),
		'before_widget' => '<aside id="%1$s" class="widget-tab %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<span class="defier-cat-title"><h4 class="widget-title"><div class="lavecat"></div>',
		'after_title'   => '</h4></span>',
	) );
}
add_action( 'widgets_init', 'defier_sidebar_one' );


/******************************************************************
 * Register widget area.
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 *****************************************************************/

function defier_sidebar_two() {
	register_sidebar( array(
		'name'          => __( 'Sidebar Two', 'defier' ),
		'id'            => 'sidebar-2',
		'description'   => do_shortcode('Aditional sidebar ', 'defier'),
		'before_widget' => '<aside id="%1$s" class="widget-tab %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<span class="defier-cat-title"><h2 class="widget-tab-title">',
		'after_title'   => '</h2></span>',
	) );
}
add_action( 'widgets_init', 'defier_sidebar_two' );

/******************************************************************
 * theme panel
 *****************************************************************/
if (!isset($redux_demo)){
		get_template_part( 'inc/theme-options/admin','init' );
}
/******************************************************************
 * Global Var for theme panel
 *****************************************************************/
global $defTheme;
$defier_avatar_url = $defTheme['defierAvatar']['url'];

/******************************************************************
 * Enqueue Short codes.
 *****************************************************************/
 	get_template_part( 'inc/widgets/custom','widget2' );
	get_template_part( 'inc/widgets/custom','widget3' );
	get_template_part( 'inc/widgets/custom','widget4' );
	get_template_part( 'inc/widgets/custom','widget5' );
	get_template_part( 'inc/widgets/custom','widget6' );
	get_template_part( 'inc/widgets/custom','widget7' );
	get_template_part( 'inc/widgets/custom','widget8' );
	get_template_part( 'inc/widgets/custom','widget9' );
	get_template_part( 'inc/widgets/custom','widget10' );
/******************************************************************
 * Enqueue scripts and styles.
 *****************************************************************/
 function defier_styles_scripts() {
 		wp_enqueue_style( 'defier-icon-font', get_template_directory_uri() . '/css/defier-icon.css');
 		wp_enqueue_style( 'twitter-bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css');
 		wp_enqueue_style( 'defier-addit-style-php', get_template_directory_uri() . '/css/style.css');
 	  wp_enqueue_script( 'slick-slider', get_template_directory_uri() . '/js/slick.min.js');
		wp_enqueue_script ( 'images-loaded' , get_stylesheet_directory_uri() . '/js/imagesloaded.min.js', array(), '2', true );
 	  wp_enqueue_script( 'defier-script', get_template_directory_uri() . '/js/defier.js', array(), '3', true );
 	  wp_localize_script( 'ajax-request', 'MyAjax', array( 'ajaxurl' => admin_url( 'admin-ajax.php' ) ) );
 		wp_enqueue_script( 'Retina', get_template_directory_uri() . '/js/retina.min.js', array(), '6', true );

 }
 add_action( 'wp_enqueue_scripts', 'defier_styles_scripts' );

// auto scroll + isotope JS
function defier_masorny_script() {
		wp_enqueue_script ( 'infinti-scroll-init' , get_stylesheet_directory_uri() . '/js/infinitescroll.min.js', '11', true );
		wp_enqueue_script ( 'isotope-item' , get_stylesheet_directory_uri() . '/js/isotope.pkgd.min.js', '11', true);
		$masonry_script = '(function($) {"use strict"; $(window).load(function() {var $container = $("#main"); $container.infinitescroll({loading: {msg: null, finishedMsg : null, msgText: "", img: null }, navSelector  : ".navigation", nextSelector : ".navigation ul li:nth-child(2) a", itemSelector : ".single-loop", dataType: "html" }, function( newElements ) { var $newElems = $( newElements ); $newElems.css({ opacity: 0 }); $newElems.imagesLoaded(function() { $newElems.animate({ opacity: 1 }, "normal"); $container.isotope( "appended", $newElems ); }); }); $container.imagesLoaded( function() { $container.isotope( { itemSelector : ".single-loop", transformsEnabled : true, layoutMode : "masonry"} ); } ); }); })(jQuery);';
    wp_add_inline_script( 'defier-script', $masonry_script );
}
/******************************************************************
 * post-thumbnails support
 *****************************************************************/
	add_theme_support( 'post-thumbnails' );
	add_image_size( 'defier-thumb', 700, 360, true );
	add_image_size( 'defier-post', 740, 360, true );
	add_image_size( 'defier-post-grid', 370, 340, true );
	add_image_size( 'defier-related-post', 220, 200, true );
	add_image_size( 'defier-post-thumbnail', 740, 360, true );
	add_image_size( 'defier-featured-full', 1115, 480, true );
	add_image_size( 'defier-featured-half', 565, 380, true );
	add_image_size( 'defier-featured-third', 370, 380, true );


function defier_thumb_src( $size = 'defier-small' ){
    global $post;
    $image_id = get_post_thumbnail_id($post->ID);
    $image_url = wp_get_attachment_image_src($image_id, $size );
    return $image_url[0];
}
/******************************************************************
 * Custom template tags for this theme.  Custom functions
 *****************************************************************/
 	get_template_part( 'inc/breadcrumbs');
 	get_template_part( 'inc/theme','functions' );
 	get_template_part( 'inc/template', 'tags' );
  get_template_part( 'inc/extras' );
	get_template_part( 'inc/customizer' );
	get_template_part( 'inc/cat', 'color' );
	get_template_part( 'inc/post', 'metabox' );
	get_template_part( 'inc/post', 'layout' );
	get_template_part( 'inc/pagination' );
	get_template_part( 'inc/view','count' );
	get_template_part( 'inc/navigation/megamenu' );
	get_template_part( 'inc/avatar' );

/******************************************************************
 * Load Jetpack compatibility file.
 *****************************************************************/
 get_template_part( 'inc/jetpack' );
/******************************************************************
 * register dynamic sidebar
 *****************************************************************/
		register_sidebar(array(
			'name' => do_shortcode('Top Header ads', 'defier'),
			'id'   => 'header-ads',
			'description' => do_shortcode('Please place only a single widget. Preferably text-widget.', 'defier'),
			'before_title' => '',
			'after_title'  => '',
			'before_widget' => '',
			'after_widget'  => ''

		));

		register_sidebar(array(
			'name' => do_shortcode('Sliding Menu', 'defier'),
			'id'   => 'sliding-menu',
			'description' => do_shortcode('Please place only a single widget. Preferably text-widget.', 'defier'),
			'before_title' => '',
			'after_title'  => '',
			'before_widget' => '',
			'after_widget'  => ''

		));

        register_sidebar( array(
            'name' => 'Footer Sidebar 1',
            'id' => 'footer-sidebar-1',
            'description' => do_shortcode('Appears in the footer area', 'defier'),
            'before_widget' => '<aside id="%1$s" class="widget %2$s">',
            'after_widget' => '</aside>',
            'before_title'  => '<span class="defier-cat-title"><h4 class="widget-title"><div class="lavecat"></div>',
            'after_title'   => '</h4></span>',
        ) );
        register_sidebar( array(
            'name' => 'Footer Sidebar 2',
            'id' => 'footer-sidebar-2',
            'description' => do_shortcode('Appears in the footer area', 'defier'),
            'before_widget' => '<aside id="%1$s" class="widget %2$s">',
            'after_widget' => '</aside>',
            'before_title'  => '<span class="defier-cat-title"><h4 class="widget-title"><div class="lavecat"></div>',
            'after_title'   => '</h4></span>',
        ) );
        register_sidebar( array(
            'name' => 'Footer Sidebar 3',
            'id' => 'footer-sidebar-3',
            'description' => do_shortcode('Appears in the footer area', 'defier'),
            'before_widget' => '<aside id="%1$s" class="widget %2$s">',
            'after_widget' => '</aside>',
            'before_title'  => '<span class="defier-cat-title"><h4 class="widget-title"><div class="lavecat"></div>',
            'after_title'   => '</h4></span>',
        ) );

        register_sidebar( array(
            'name' => 'Footer Sidebar 4',
            'id' => 'footer-sidebar-4',
            'description' => do_shortcode('Appears in the footer area', 'defier'),
            'before_widget' => '<aside id="%1$s" class="widget %2$s">',
            'after_widget' => '</aside>',
            'before_title'  => '<span class="defier-cat-title"><h4 class="widget-title"><div class="lavecat"></div>',
            'after_title'   => '</h4></span>',
        ) );




/******************************************************************
 * Changing excerpt length
 *****************************************************************/
function new_excerpt_length($length) {
    return 20;
}
add_filter('excerpt_length', 'new_excerpt_length');
// Changing excerpt more
function new_excerpt_more($more) {
    return "Read More";
}
add_filter('excerpt_more', 'new_excerpt_more');


/******************************************************************
 * Post meta checker scripts
 *****************************************************************/

function defier_post_format_admin_scripts() {
	wp_enqueue_script('meta-checker', get_template_directory_uri() .'/inc/post-formats/js/meta-checker.js', array());
}
add_action('admin_enqueue_scripts', 'defier_post_format_admin_scripts');

/******************************************************************
 * Custom Default Avatar
 *****************************************************************/

    function my_own_gravatar( $avatar_defaults ) {
        global $defTheme;
        $myavatar = $defTheme['defierAvatar']['url'];
        $avatar_defaults[$myavatar] = 'GRAVATAR NAME DISPLAYED IN WORDPRESS';
        return $avatar_defaults;
    }
    add_filter( 'avatar_defaults', 'my_own_gravatar' );

/******************************************************************
 * Posts Classes
 *****************************************************************/
function defier_post_class( $classes = false ) {
    global $post;

    $post_format = get_post_meta($post->ID, 'defier_post_head', true);
    if( !empty($post_format) ){
        if( !empty($classes) ) $classes .= ' ';
        $classes .= 'defier_'.$post_format;
    }
    if( !empty($classes) )
        echo 'class="'.$classes.'"';
}

function defier_get_post_class( $classes = false ) {
    global $post;

    $post_format = get_post_meta($post->ID, 'defier_post_head', true);
    if( !empty($post_format) ){
        if( !empty($classes) ) $classes .= ' ';
        $classes .= 'defier_'.$post_format;
    }
    if( !empty($classes) )
        return 'class="'.$classes.'"';
}
// end functions
