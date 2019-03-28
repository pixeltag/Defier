<?php
if ( ! class_exists( 'Redux' ) ) {
    return;
}
$opt_name = "defTheme";
$theme = wp_get_theme(); // For use with some settings. Not necessary.
$args = array(
    'opt_name'             => $opt_name,
    'display_name'         => $theme->get( 'Name' ),
    'display_version'      => $theme->get( 'Version' ),
    'menu_type'            => 'menu',
    'allow_sub_menu'       => true,
    'menu_title'           => __( 'Defier Options', 'defier' ),
    'page_title'           => __( 'Defier Options Panel', 'defier' ),
    // You will need to generate a Google API key to use this feature.
    // Please visit: https://developers.google.com/fonts/docs/developer_api#Auth
    'google_api_key'       => '',
    // Set it you want google fonts to update weekly. A google_api_key value is required.
    'google_update_weekly' => false,
    // Must be defined to add google fonts to the typography module
    'async_typography'     => true,
    // Use a asynchronous font on the front end or font string
    //'disable_google_fonts_link' => true,                    // Disable this in case you want to create your own google fonts loader
    'admin_bar'            => true,
    'disable_tracking' => true,
    // Show the panel pages on the admin bar
    'admin_bar_icon'       => 'dashicons-portfolio',
    // Choose an icon for the admin bar menu
    'admin_bar_priority'   => 40,
    // Choose an priority for the admin bar menu
    'global_variable'      => '',
    // Set a different name for your global variable other than the opt_name
    'dev_mode'             => false,
    // Show the time the page took to load, etc
    'update_notice'        => false,
    // If dev_mode is enabled, will notify developer of updated versions available in the GitHub Repo
    'customizer'           => true,
    // OPTIONAL -> Give you extra features
    'page_priority'        => null,
    // Order where the menu appears in the admin area. If there is any conflict, something will not show. Warning.
    'page_parent'          => 'themes.php',
    // For a full list of options, visit: http://codex.wordpress.org/Function_Reference/add_submenu_page#Parameters
    'page_permissions'     => 'manage_options',
    // Permissions needed to access the options panel.
    'menu_icon'            => ReduxFramework::$_url.'assets/img/icon.png',
    // Specify a custom URL to an icon
    'last_tab'             => '',
    // Force your panel to always open to a specific tab (by id)
    'page_icon'            => 'icon-themes',
    // Icon displayed in the admin panel next to your menu_title
    'page_slug'            => '',
    // Page slug used to denote the panel, will be based off page title then menu title then opt_name if not provided
    'save_defaults'        => false,
    // On load save the defaults to DB before user clicks save or not
    'default_show'         => false,
    // If true, shows the default value next to each field that is not the default value.
    'default_mark'         => '',
    // What to print by the field's title if the value shown is default. Suggested: *
    'show_import_export'   => true,
    // CAREFUL -> These options are for advanced use only
    'transient_time'       => 60 * MINUTE_IN_SECONDS,
    'output'               => true,
    // Global shut-off for dynamic CSS output by the framework. Will also disable google fonts output
    'output_tag'           => true,
    // Allows dynamic CSS to be generated for customizer and google fonts, but stops the dynamic CSS from going to the head
    'footer_credit'     => __('Defier Magazine - Blog wordpress theme | by Pixeltag', 'defier'),
    // Disable the footer credit of Redux. Please leave if you can help it.
    // FUTURE -> Not in use yet, but reserved or partially implemented. Use at your own risk.
    'database'             => '',
    // possible: options, theme_mods, theme_mods_expanded, transient. Not fully functional, warning!
    'use_cdn'              => true,
    // If you prefer not to use the CDN for Select2, Ace Editor, and others, you may download the Redux Vendor Support plugin yourself and run locally or embed it in your code.

    // HINTS
    'hints'                => array(
        'icon'          => 'el el-question-sign',
        'icon_position' => 'right',
        'icon_color'    => 'lightgray',
        'icon_size'     => 'normal',
        'tip_style'     => array(
            'color'   => 'red',
            'shadow'  => true,
            'rounded' => false,
            'style'   => '',
        ),
        'tip_position'  => array(
            'my' => 'top left',
            'at' => 'bottom right',
        ),
        'tip_effect'    => array(
            'show' => array(
                'effect'   => 'slide',
                'duration' => '500',
                'event'    => 'mouseover',
            ),
            'hide' => array(
                'effect'   => 'slide',
                'duration' => '500',
                'event'    => 'click mouseleave',
            ),
        ),
    )
);

// SOCIAL ICONS -> Setup custom links in the footer for quick links in your panel footer icons.
$args['share_icons'][] = array(
    'url'   => 'https://www.facebook.com/Pixeltag/',
    'title' => __('Like us on Facebook', 'defier'),
    'icon'  => 'el el-facebook'
);
$args['share_icons'][] = array(
    'url'   => 'https://twitter.com/pixeltagnet',
    'title' => __('Follow us on Twitter', 'defier'),
    'icon'  => 'el el-twitter'
);

Redux::setArgs( $opt_name, $args );
add_action('admin_menu', 'defier_add_box');
// Set the help sidebar
$content = __( '<p>This is the sidebar content, HTML is allowed.</p>', 'defier' );
Redux::setHelpSidebar( $opt_name, $content );


Redux::setSection( $opt_name, array(
    'title'            => __( 'General Settings', 'defier' ),
    'id'               => 'general',
    'desc'             => __( '', 'defier' ),
    'customizer_width' => '400px',
    'icon'             => 'el el-cog',
    'fields'     => array(
        array(
            'id'       => 'defierFavicon',
            'type'     => 'media',
            'url'      => true,
            'title'    => __( 'Custom Favicon', 'defier' ),
            'compiler' => 'true',
            'desc'     => __( 'Upload your Custom Favicon here', 'defier' ),
        ),
        array(
            'id'       => 'defierAvatar',
            'type'     => 'media',
            'url'      => true,
            'title'    => __( 'Custom Gravatar', 'defier' ),
            'compiler' => 'true',
            'desc'     => __( 'Upload your Custom Gravatar here', 'defier' ),
        ),
        array(
            'id'       => 'defierAppleIcon',
            'type'     => 'media',
            'url'      => true,
            'title'    => __( 'Apple iPhone Icon', 'defier' ),
            'compiler' => 'true',
            'desc'     => __( 'Icon for Apple iPhone (57px x 57px)', 'defier' ),
        ),
        array(
            'id'       => 'defierAppleIconIP',
            'type'     => 'media',
            'url'      => true,
            'title'    => __( 'Apple iPhone Retina Icon', 'defier' ),
            'compiler' => 'true',
            'desc'     => __( 'Icon for Apple iPhone Retina Version (120px x 120px)', 'defier' ),
        ),
        array(
            'id'       => 'defierAppleIconIP4',
            'type'     => 'media',
            'url'      => true,
            'title'    => __( 'Apple iPad Icon ', 'defier' ),
            'compiler' => 'true',
            'desc'     => __( 'Icon for Apple iPhone (72px x 72px)', 'defier' ),
        ),
        array(
            'id'       => 'defierAppleIconIP5',
            'type'     => 'media',
            'url'      => true,
            'title'    => __( 'Apple iPad Retina Icon', 'defier' ),
            'compiler' => 'true',
            'desc'     => __( 'Icon for Apple iPad Retina Version (144px x 144px)', 'defier' ),
        ),
        array(
            'id'       => 'pageLayout',
            'type'     => 'select',
            'multi'    => false,
            'title'    => __( 'Page Layout', 'defier' ),
            'desc'     => __( 'You can select your page layout type (Boxed - Fullwidth  - Fixed)', 'defier' ),
            'options'  => array(
                'Boxed' => 'Boxed',
                'Fullwidth' => 'Fullwidth',
                'Fixed' => 'Fixed'
            )),
        array(
            'id'       => 'BreadcrumbsOn',
            'type'     => 'switch',
            'title'    => __( 'Breadcrumbs', 'defier' ),
            'subtitle' => __( 'Look, it\'s on!', 'defier' ),
            'default'  => true,
        ),
        array(
            'id'       => 'Delimiter',
            'type'     => 'text',
            'title'    => __( 'Breadcrumbs Delimiter', 'defier' ),
            'subtitle' => __( 'Subtitle', 'defier' ),
            'desc'     => __( 'ex : / ', 'defier' ),
            'default'  => '|',
        ),
        array(
            'id'       => 'pointer',
            'type'     => 'switch',
            'title'    => __( 'Pointer Hover', 'defier' ),
            'default'  => true,
        ),

        array(
            'id'       => 'headerInclude',
            'type'     => 'textarea',
            'title'    => __( 'Header Include', 'defier' ),
            'desc'     => __( ' The following code will add to the <head> tag. Useful if you need to add additional scripts such as CSS or JS.
', 'defier' ),
            'default'  => '',
        ),
        array(
            'id'       => 'footerInclude',
            'type'     => 'textarea',
            'title'    => __( 'Footer Include', 'defier' ),
            'desc'     => __( 'The following code will add to the footer before the closing </body> tag. Useful if you need to Javascript or tracking code.
', 'defier' ),
            'default'  => '',
        ),
        array(
            'id'       => 'contactEmail',
            'type'     => 'text',
            'title'    => __( 'Email Address', 'defier' ),
            'desc'     => __( 'Will include in Header', 'defier' ),
            'default'  => 'info@pixeltag.com',
        ),
        array(
            'id'       => 'contactphone',
            'type'     => 'text',
            'title'    => __( 'Mobile / Phone', 'defier' ),
            'desc'     => __( 'Will include in Header', 'defier' ),
            'default'  => '+201000144250',
        ),
    )
) );


/*
 *
 * ---> START SECTIONS
 *
 */
Redux::setSection( $opt_name, array(
    'title'            => __( 'Header Settings', 'defier' ),
    'id'               => 'header',
    'desc'             => __( 'These are really basic fields!', 'defier' ),
    'customizer_width' => '400px',
    'icon'             => 'el el-screen',
    'fields'     => array(
         array(
            'id'       => 'headerlayout',
            'type'     => 'image_select',
            'title'    => __('Select Header', 'defier'),
            'options'  => array(
                '1'      => array(
                    'alt'   => 'Header Portal',
                    'img'   => ReduxFramework::$_url.'assets/img/1col.png'
                ),
                '2'      => array(
                    'alt'   => 'Header Lite',
                    'img'   => ReduxFramework::$_url.'assets/img/2cl.png'
                ),
                '3'      => array(
                    'alt'   => 'Header Trendy',
                    'img'  => ReduxFramework::$_url.'assets/img/2cr.png'
                )
            ),
            'default' => '2'
        ),

        array(
            'id'       => 'logoImg',
            'type'     => 'media',
            'url'      => true,
            'title'    => __( 'Logo Images', 'defier' ),
            'compiler' => 'true',
            'desc'     => __( 'Upload your Custom Logo Images here', 'defier' ),
        ),
        array(
            'id'       => 'logoImgRetina',
            'type'     => 'media',
            'url'      => true,
            'title'    => __( 'Logo Images (Retina Version @2x)', 'defier' ),
            'compiler' => 'true',
            'desc'     => __( 'Please choose an image file for the retina version of the logo. It should be u2x the size of main logo.', 'defier' ),
        ),
        array(
            'id'            => 'headerMargin',
            'type'          => 'slider',
            'title'         => __( 'Header Margin Top', 'defier' ),
            'default'       => 10,
            'min'           => 1,
            'step'          => 1,
            'max'           => 100,
            'display_value' => 'px'
        ),
        array(
            'id'       => 'menuDarken',
            'type'     => 'switch',
            'title'    => __( 'Make Menu Darken?', 'defier' ),
            'default'  => true,
        ),
        array(
            'id'       => 'showTopBar',
            'type'     => 'switch',
            'title'    => __( 'Topbar', 'defier' ),
            'default'  => true,
        ),
        array(
            'id'       => 'showSlidingMenu',
            'type'     => 'switch',
            'title'    => __( 'Show Sliding Menu', 'defier' ),
            'default'  => true,
        ),
        array(
            'id'       => 'showTopNav',
            'type'     => 'switch',
            'title'    => __( 'Sliding Navigation', 'defier' ),
            'default'  => true,
        ),

        array(
            'id'       => 'showSearch',
            'type'     => 'switch',
            'title'    => __( 'Search', 'defier' ),
            'default'  => true,
        ),
        array(
            'id'       => 'showSocialMedia',
            'type'     => 'switch',
            'title'    => __( 'Social Media Icons', 'defier' ),
            'default'  => true,
        ),
        array(
            'id'       => 'showContactHeader',
            'type'     => 'switch',
            'title'    => __( 'Contact Informations', 'defier' ),
            'default'  => true,
        ),


    )
) );
/*
 *
 * ---> START SECTIONS
 *
 */
Redux::setSection( $opt_name, array(
    'title'            => __( 'Footer Settings', 'defier' ),
    'id'               => 'footer',
    'desc'             => __( 'These are really basic fields!', 'defier' ),
    'customizer_width' => '400px',
    'icon'             => 'el el-website',
    'fields'     => array(
        array(
            'id'       => 'showUpButton',
            'type'     => 'switch',
            'title'    => __( 'Up Icon', 'defier' ),
            'default'  => true,
        ),
        array(
            'id'       => 'showFooterSocial',
            'type'     => 'switch',
            'title'    => __( 'Social media Icons', 'defier' ),
            'default'  => true,
        ),
        array(
            'id'       => 'footerLighten',
            'type'     => 'switch',
            'title'    => __( 'Make footer lighten style', 'defier' ),
            'default'  => true,
        ),
        array(
            'id'       => 'showFooterWidget',
            'type'     => 'switch',
            'title'    => __( 'Footer widget section', 'defier' ),
            'default'  => true,
        ),
        array(
            'id'       => 'InsertFooterText',
            'type'     => 'textarea',
            'title'    => __( 'Type Footer copyright text', 'defier' ),
            'validate' => 'html',
        ),
        array(
            'id'       => 'InsertgoogleAnalytics',
            'type'     => 'textarea',
            'title'    => __( 'Google Analytics', 'defier' ),
            'validate' => 'html',
        ),
    )
) );
/*
 *
 * ---> START SECTIONS
 *
 */
Redux::setSection( $opt_name, array(
    'title'            => __( 'Articles', 'defier' ),
    'id'               => 'articles',
    'desc'             => __( 'These are really basic fields!', 'defier' ),
    'customizer_width' => '400px',
    'icon'             => 'el el-pencil',
     'fields'     => array(
    array(
        'id'       => 'ShowAuthorBox',
        'type'     => 'switch',
        'title'    => __( 'Author informations box', 'defier' ),
        'default'  => true,
    ),
    array(
        'id'       => 'ShowRelatedPostBox',
        'type'     => 'switch',
        'title'    => __( 'Related Post box', 'defier' ),
        'default'  => true,
    ),
    array(
        'id'       => 'ShowNextPrevPost',
        'type'     => 'switch',
        'title'    => __( 'Next \ Prev  Post box', 'defier' ),
        'default'  => true,
    ),
    array(
             'id'       => 'ShowLikeMe',
             'type'     => 'switch',
             'title'    => __( 'Like Button', 'defier' ),
             'default'  => true,
    ),
        array(
             'id'       => 'ShowPostDate',
             'type'     => 'switch',
             'title'    => __( 'Published Date', 'defier' ),
             'default'  => true,
    ),
    array(
             'id'       => 'ShowPostCategory',
             'type'     => 'switch',
             'title'    => __( 'Post Category', 'defier' ),
             'default'  => true,
    ),
        array(
             'id'       => 'ShowPostTag',
             'type'     => 'switch',
             'title'    => __( 'Post Tag', 'defier' ),
             'default'  => true,
    ),
    array(
             'id'       => 'ShowPostShareIcon',
             'type'     => 'switch',
             'title'    => __( 'Social Media Share button', 'defier' ),
             'default'  => true,
    ),
    array(
             'id'       => 'ShowPostCommentLink',
             'type'     => 'switch',
             'title'    => __( 'Comment Link', 'defier' ),
             'default'  => true,
    ),
    array(
             'id'       => 'ShowAuthorLabel',
             'type'     => 'switch',
             'title'    => __( 'Author Label', 'defier' ),
             'default'  => true,
    ),
    array(
             'id'       => 'ShowPostViewCounter',
             'type'     => 'switch',
             'title'    => __( 'Views Counter', 'defier' ),
             'default'  => true,
    ),
    array(
             'id'       => 'relatedPostType',
             'type'     => 'select',
             'title'    => __( 'Related Post type', 'defier' ),
            'options'  => array(
                  '1'      => "author",
                  '2'      => "tag",
                  '3'      => "categories"
              ),
              'default' => '2'
    ),
    )
    ) );
/*
 *
 * ---> START SECTIONS
 *
 */
Redux::setSection( $opt_name, array(
    'title'            => __( 'Sliders', 'defier' ),
    'id'               => 'slider',
    'desc'             => __( 'These are really basic fields!', 'defier' ),
    'customizer_width' => '400px',
    'icon'             => 'el el-play',
    'fields'           => array(
        array(
            'id'       => 'Sliderlayout',
            'type'     => 'image_select',
            'title'    => __('Select Slider', 'defier'),
            'options'  => array(
                '1'      => array(
                    'alt'   => 'slider One',
                    'img'   => ReduxFramework::$_url.'assets/img/1c.png'
                ),
                '2'      => array(
                    'alt'   => 'slider two',
                    'img'   => ReduxFramework::$_url.'assets/img/3cl.png'
                ),
                '3'      => array(
                    'alt'   => 'slider three',
                    'img'  => ReduxFramework::$_url.'assets/img/3cm.png'
                )
            ),
            'default' => '2'
        ),
        array(
            'id'       => 'sliderShowWrapper',
            'type'     => 'switch',
            'title'    => __('Show Slider', 'defier'),
            'default'  => true,
        ),
        array(
            'id'       => 'sliderDescShow',
            'type'     => 'switch',
            'title'    => __('Show Post description ', 'defier'),
            'default'  => true,
        ),
        array(
            'id'       => 'slidertimeShow',
            'type'     => 'switch',
            'title'    => __('Show time', 'defier'),
            'default'  => true,
        ),
        array(
            'id'       => 'sliderpostView',
            'type'     => 'switch',
            'title'    => __('View Counter', 'defier'),
            'default'  => true,
        ),
        array(
            'id'       => 'sliderloveShow',
            'type'     => 'switch',
            'title'    => __('Like Counter', 'defier'),
            'default'  => true,

        ),
        array(
            'id'       => 'slidercatShow',
            'type'     => 'switch',
            'title'    => __('Show Post Category', 'defier'),
            'default'  => true,

        ),

// Second Accordion
        array(
            'id'       => 'opt-accordion-begin-2',
            'type'     => 'accordion',
            'title'    => 'Slick Slider Options',
            'subtitle'  => __('Sliders Option : you can control on num of items or speed of transition , etc ..', 'defier'),
            'position'  => 'start',
        ),
        array(
            'id'       => 'OwlSliderItemNum',
            'type'     => 'spinner',
            'title'    => __('Number of Slides', 'defier'),
            'default'  => '6',
            'min'      => '6',
            'step'     => '1',
            'max'      => '16',
        ),
        array(
            'id'        => 'defierSlideSpeed',
            'type'      => 'slider',
            'title'     => __('Animation Speed', 'defier'),
            'subtitle'  => __('Slide speed in milliseconds', 'defier'),
            "default"   => 500,
            "min"       => 100,
            "step"      => 100,
            "max"       => 9000,
            'display_value' => 'label'
        ),
         array(
           'id'       => 'ShowArrowSlider',
           'type'     => 'switch',
            'On'      => 'true',
           'Off'     => 'false',
           'title'    => __('Show Arrows', 'defier')
       ),
         array(
           'id'       => 'ShowDotsSlider',
           'type'     => 'switch',
            'On'      => 'true',
           'Off'     => 'false',
           'title'    => __('Show Dots', 'defier')
       ),
       array(
            'id'       => 'skiderWrapperPadding',
            'type'     => 'text',
            'title'    => __('Slider Container Padding', 'defier'),
            'subtitle'  => __('i.e. 20px 3%', 'defier'),
        ),
           array(
            'id'       => 'opt-select-image',
            'type'     => 'select_image',
            'title'    => __('Slider Background Images', 'defier'),
            'subtitle' => __('Select body background image pattern' , 'defier'),
            'options'  => Array(
                Array (
                     'alt'  => 'Pattern 1',
                     'img'  => ReduxFramework::$_url.'assets/img/pattern31.png'
                ),
                Array (
                     'alt'  => 'Pattern 2',
                     'img'  => ReduxFramework::$_url.'assets/img/pattern32.png'
                ),
                        Array (
                     'alt'  => 'Pattern 3',
                     'img'  => ReduxFramework::$_url.'assets/img/pattern35.png'
                ),
                       Array (
                     'alt'  => 'Pattern 4',
                     'img'  => ReduxFramework::$_url.'assets/img/pattern36.png'
                ),
                       Array (
                     'alt'  => 'Pattern 5',
                     'img'  => ReduxFramework::$_url.'assets/img/pattern38.png'
                ),
                       Array (
                     'alt'  => 'Pattern 6',
                     'img'  => ReduxFramework::$_url.'assets/img/pattern40.png'
                ),
                       Array (
                     'alt'  => 'Pattern 7',
                     'img'  => ReduxFramework::$_url.'assets/img/pattern41.png'
                ),
                       Array (
                     'alt'  => 'Pattern 8',
                     'img'  => ReduxFramework::$_url.'assets/img/pattern43.png'
                ),
                       Array (
                     'alt'  => 'Pattern 9',
                     'img'  => ReduxFramework::$_url.'assets/img/pattern44.png'
                ),
                      Array (
                     'alt'  => 'Pattern 10',
                     'img'  => ReduxFramework::$_url.'assets/img/pattern46.png'
                ),

            ),
            'default'  => 'Pattern 1',
            ),
    )
) );
/*
 *
 * ---> START SECTIONS
 *
 */
Redux::setSection( $opt_name, array(
    'title'            => __( 'Styling', 'defier' ),
    'id'               => 'styling',
    'desc'             => __( 'These are really basic fields!', 'defier' ),
    'customizer_width' => '400px',
    'icon'             => 'el el-brush',
    'fields'     => array(
    array(
    'id'       => 'bodyBackground',
    'type'     => 'background',
    'title'    => __('Body Background', 'defier'),
    'subtitle' => __('Body background with image, color, etc.', 'defier'),
    'desc'     => __('This is the description field, again good for additional info.', 'defier'),
    'default'  => array(
        'background-color' => '#1e73be',
    )
    ),
        array(
            'id'       => 'sliderBg',
            'type'     => 'color',
            'title'    => __('Slider background color', 'defier'),
            'subtitle' => __('Pick 8 colors for to generate your color scheme .', 'defier'),
            'default'  => '#FFFFFF',
            'validate' => 'color',
        ),
        array(
            'id'       => 'main_color_one',
            'type'     => 'color_rgba',
            'title'    => __('Color Scheme', 'defier'),
            'subtitle' => __('Pick 8 colors for to generate your color scheme .', 'defier'),
            'default'  => 'rgba(48, 59, 79, 0.95)',
        ),
        array(
            'id'       => 'main_color_two',
            'type'     => 'color',
            'default'  => '#50668b',
            'validate' => 'color',
        ),
        array(
            'id'       => 'main_color_three',
            'type'     => 'color',
            'default'  => '#88b8ca',
            'validate' => 'color',
        ),
        array(
            'id'       => 'main_color_four',
            'type'     => 'color',
            'default'  => '#fafafa',
            'validate' => 'color',
        ),
        array(
            'id'       => 'main_color_five',
            'type'     => 'color',
            'default'  => '#686868',
            'validate' => 'color',
        ),
        array(
            'id'       => 'main_color_six',
            'type'     => 'color',
            'default'  => '#9f9f9f',
            'validate' => 'color',
        ),
        array(
            'id'       => 'main_color_seven',
            'type'     => 'color',
            'default'  => '#b1d4e1',
            'validate' => 'color',
        ),
        array(
            'id'       => 'main_color_eight',
            'type'     => 'color',
            'default'  => '#8396b5',
            'validate' => 'color',
        ),
    ),

    ) );
/*
 *
 * ---> START SECTIONS
 *
 */
Redux::setSection( $opt_name, array(
    'title'            => __( 'Typography', 'defier' ),
    'id'               => 'typography',
    'desc'             => __( 'These are really basic fields!', 'defier' ),
    'customizer_width' => '400px',
    'icon'             => 'el el-align-center',
    'all_styles'       => 'false',
    'fields'     => array(
        array(
            'id'          => 'defierffamily',
            'type'        => 'typography',
            'title'       => __('Font family', 'defier'),
            'google'      => true,
            'font-backup' => true,
            'units'       =>'px',
            'subtitle'    => __('Use to change body font family .', 'defier'),
        ),
        array(
            'id'          => 'defierfh1',
            'type'        => 'typography',
            'title'       => __('H1', 'defier'),
            'google'      => true,
            'font-backup' => true,
            'output'      => array('h1'),
            'units'       =>'px',
            'all_style'   =>'false',
            'subtitle'    => __('Use to change h1 font family .', 'defier'),
        ),
        array(
            'id'          => 'defierfh2',
            'type'        => 'typography',
            'title'       => __('H2', 'defier'),
            'google'      => true,
            'font-backup' => true,
            'output'      => array('h2'),
            'units'       =>'px',
            'all_style'   =>'false',
            'subtitle'    => __('Use to change h2 font family .', 'defier'),
        ),
        array(
            'id'          => 'defierfh3',
            'type'        => 'typography',
            'title'       => __('H3', 'defier'),
            'google'      => true,
            'font-backup' => true,
            'output'      => array('h3'),
            'units'       =>'px',
            'all_style'   =>'false',
            'subtitle'    => __('Use to change h3 font family .', 'defier'),
        ),
        array(
            'id'          => 'defierfh4',
            'type'        => 'typography',
            'title'       => __('H4', 'defier'),
            'google'      => true,
            'font-backup' => true,
            'output'      => array('h4'),
            'units'       =>'px',
            'all_style'   =>'false',
            'subtitle'    => __('Use to change h4 font family .', 'defier'),
        ),
        array(
            'id'          => 'defierfh5',
            'type'        => 'typography',
            'title'       => __('H5', 'defier'),
            'google'      => true,
            'font-backup' => true,
            'output'      => array('h5'),
            'units'       =>'px',
            'all_style'   =>'false',
            'subtitle'    => __('Use to change h5 font family .', 'defier'),
        ),
        array(
            'id'          => 'defierfh6',
            'type'        => 'typography',
            'title'       => __('H6', 'defier'),
            'google'      => true,
            'font-backup' => true,
            'output'      => array('h6'),
            'units'       =>'px',
            'all_style'   =>'false',
            'subtitle'    => __('Use to change h6 font family .', 'defier'),
        ),
        array(
            'id'          => 'defierfhnav',
            'type'        => 'typography',
            'title'       => __('Navigation', 'defier'),
            'google'      => true,
            'font-backup' => true,
            'output'      => array('nav'),
            'units'       =>'px',
            'all_style'   =>'false',
            'subtitle'    => __('Use to change Navigation font family .', 'defier'),
        ),
        array(
            'id'          => 'defierfhp',
            'type'        => 'typography',
            'title'       => __('Paragraph', 'defier'),
            'google'      => true,
            'font-backup' => true,
            'output'      => array('p'),
            'units'       =>'px',
            'all_style'   =>'false',
            'subtitle'    => __('Use to change Paragraph or p tag font family .', 'defier'),
        ),

    )
) );
/*
 *
 * ---> START SECTIONS
 *
 */
Redux::setSection( $opt_name, array(
    'title'            => __( 'Social Network', 'defier' ),
    'id'               => 'social',
    'desc'             => __( 'These are really basic fields!', 'defier' ),
    'customizer_width' => '400px',
    'icon'             => 'el el-globe',
    'fields'     => array(
        array(
        'id'       => 'DefFacdbook',
        'type'     => 'text',
        'title'    => __('Facebook Link', 'defier')
          ),
        array(
            'id'       => 'DefTwitter',
            'type'     => 'text',
            'title'    => __('Twitter link', 'defier')
        ),
        array(
            'id'       => 'DefGoogleP',
            'type'     => 'text',
            'title'    => __('Google+ link', 'defier')
        ),
        array(
            'id'       => 'DefYouttube',
            'type'     => 'text',
            'title'    => __('Youtube link', 'defier')
        ),
        array(
            'id'       => 'DefRss',
            'type'     => 'text',
            'title'    => __('Rss link', 'defier')
        ),
        array(
            'id'       => 'DefVimeo',
            'type'     => 'text',
            'title'    => __('Vimeo link', 'defier')
        ),
        array(
            'id'       => 'DefInstagram',
            'type'     => 'text',
            'title'    => __('Instagram link', 'defier')
        ),
        array(
            'id'       => 'DefSkype',
            'type'     => 'text',
            'title'    => __('Skype link', 'defier')
        ),
        array(
            'id'       => 'DefPinterest',
            'type'     => 'text',
            'title'    => __('Pinterest link', 'defier')
        ),
        array(
            'id'       => 'DefLinkedin',
            'type'     => 'text',
            'title'    => __('Linkedin link', 'defier')
        ),
    )
) );

/**
 * This is a test function that will let you see when the compiler hook occurs.
**/

if ( ! function_exists( 'compiler_action' ) ) {
    function compiler_action($options, $css, $changed_values) {
        global $wp_filesystem;

        $filename = dirname(__FILE__) . '../../css/theme.css';

        if( empty( $wp_filesystem ) ) {
            require_once( ABSPATH .'/wp-admin/includes/file.php' );
            WP_Filesystem();
        }

        if( $wp_filesystem ) {
            $wp_filesystem->put_contents(
                $filename,
                $css,
                FS_CHMOD_FILE // predefined mode settings for WP files
            );
        }
    }
}

/**
 * Custom function for the callback validation referenced above
 * */
if ( ! function_exists( 'redux_validate_callback_function' ) ) {
    function redux_validate_callback_function( $field, $value, $existing_value ) {
        $error   = false;
        $warning = false;

        //do your validation
        if ( $value == 1 ) {
            $error = true;
            $value = $existing_value;
        } elseif ( $value == 2 ) {
            $warning = true;
            $value   = $existing_value;
        }

        $return['value'] = $value;

        if ( $error == true ) {
            $return['error'] = $field;
            $field['msg']    = 'your custom error message';
        }

        if ( $warning == true ) {
            $return['warning'] = $field;
            $field['msg']      = 'your custom warning message';
        }

        return $return;
    }
}

/**
 * Custom function for the callback referenced above
 */
if ( ! function_exists( 'defier_my_custom_field' ) ) {
    function defier_my_custom_field( $field, $value ) {
        print_r( $field );
        echo '<br/>';
        print_r( $value );
    }
}

/**
 * Filter hook for filtering the args. Good for child themes to override or add to the args array. Can also be used in other functions.
 * */
if ( ! function_exists( 'defier_change_arguments' ) ) {
    function defier_change_arguments( $args ) {
        return $args;
    }
}

/**
 * Filter hook for filtering the default value of any given field. Very useful in development mode.
 * */
if ( ! function_exists( 'defier_change_defaults' ) ) {
    function defier_change_defaults( $defaults ) {
        $defaults['str_replace'] = 'Testing filter hook!';
        return $defaults;
    }
}



/** remove redux menu under the tools **/
add_action( 'admin_menu', 'remove_redux_menu',12 );
function remove_redux_menu() {
    remove_submenu_page('tools.php','redux-about');
}
