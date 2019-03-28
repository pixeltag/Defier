<?php
/**
 * Include and setup custom metaboxes and fields.
 *
 * @link     https://github.com/jaredatch/Custom-Metaboxes-and-Fields-for-WordPress
 * @license  http://www.opensource.org/licenses/gpl-license.php GPL v2.0 (or later)
 */

add_filter( 'cmb_meta_boxes', 'defier_post_metaboxes' );
function defier_post_metaboxes( array $post_meta_boxes ) {

	// Start with an underscore to hide fields from custom fields list
	$prefix = 'defier_';

	/* ==========================================================================
	POST TYPE
	========================================================================== */
      /**
	*  META FOR FEATURED POST TYPE
	*/

/**
* META FOR QUOTE POST TYPE
*/
	$post_meta_boxes[] = array(
		'id'         => 'defier_featured_post',
		'title'      => 'Post Settings',
		'pages'      => array( 'post', ), // Post type
		'context'    => 'normal',
		'priority'   => 'high',
		'show_names' => false, // Show field names on the left
		'fields' => array(
			array(
				'name'    => 'Is it a featured post ?',
				'desc'    => "Check to add this post to featured slider",
				'id'   => $prefix . 'featured_checkbox',
				'type' => 'checkbox',
			),
			array(
			'name'    => 'Post Layout ?',
			'desc'    => 'please, select a layout for your post',
			'id'      => $prefix . 'post_layout',
			'type'    => 'select',
			'options' => array(
				array( 'name' => 'Sidebar Right', 'value' => 'Sidebar-Right', ),
				array( 'name' => 'Sidebar Left', 'value' => 'Sidebar-Left', ),
				array( 'name' => 'Full Width', 'value' => 'Full-width', ),
				array( 'name' => 'Standard', 'value' => 'Standard', ),
			),
			'default'  => '2'
			),
		),
	);

	/**
	* META FOR QUOTE POST TYPE
	*/
	$post_meta_boxes[] = array(
		'id'         => 'defier_metabox_quote',
		'title'      => 'Quote Meta',
		'pages'      => array( 'post', ), // Post type
		'context'    => 'normal',
		'priority'   => 'high',
		'show_names' => true, // Show field names on the left
		'fields' => array(

			array(
				'name' => 'Author',
				'desc' => 'i.e: Steve Jobs',
				'id'   => $prefix . 'post_quote_author',
				'type' => 'text_medium',
				'std' => ''
			),
			array(
				'name' => 'Link',
				'desc' => 'i.e: apple.com',
				'id'   => $prefix . 'post_quote_link',
				'type' => 'text_medium',
				'std' => ''
			),
            array(
				'name' => 'Quote',
				'desc' => 'i.e: Everyone here has the sense that right now is one of those moments when we are influencing the future.',
				'id'   => $prefix . 'post_quote',
				'type' => 'textarea_small',
				'std' => ''
			),
			array(
				'name' => 'Background Image',
				'desc' => 'displayed on your link background.',
				'id'   => $prefix . 'quote_bg_image',
				'type' => 'file',
				'std' => ''
			),
		)
	);

	/**
	* META FOR VIDEO POST TYPE
	*/
	$post_meta_boxes[] = array(
		'id'         => 'defier_metabox_video',
		'title'      => 'Video',
		'pages'      => array( 'post', ), // Post type
		'context'    => 'normal',
		'priority'   => 'high',
		'show_names' => true, // Show field names on the left
		'fields' => array(
             array(
				'name' => 'Embed Code',
				'desc' => 'Enter in a Youtube or Vimeo embed code here.',
				'id'   => $prefix . 'post_cs_embed',
				'type' => 'textarea_small',
				'std' => ''
			)
    )
	);
	/**
	* META FOR AUDIO POST TYPE
	*/
	$post_meta_boxes[] = array(
		'id'         => 'defier_metabox_audio',
		'title'      => 'Audio Meta',
		'pages'      => array( 'post', ), // Post type
		'context'    => 'normal',
		'priority'   => 'high',
		'show_names' => true, // Show field names on the left
		'fields' => array(
			array(
				'name' => 'File Url',
				'desc' => 'upload or enter in the URL to your .mp3 file',
				'id'   => $prefix . 'post_audio_mp3',
				'type' => 'file',
				'std' => ''
			),
			array(
				'name' => 'Audio Embed Code',
				'desc' => 'enter in a soundcolud or other embed code here.',
				'id'   => $prefix . 'post_cs_sound_embed',
				'type' => 'textarea_small',
				'std' => ''
			),
		)
	);

	/**
	*  META FOR GALLERY POST TYPE
	*/
	$post_meta_boxes[] = array(
		'id'         => 'defier_metabox_gallery',
		'title'      => 'Gallery Meta',
		'pages'      => array( 'post', ), // Post type
		'context'    => 'normal',
		'priority'   => 'high',
		'show_names' => false, // Show field names on the left
		'fields' => array(
        	array(
				'name' => 'Image One',
				'desc' => 'upload or enter in the URL to your JPG file',
				'id'   => $prefix . 'post_gallry_one',
				'type' => 'file',
				'std' => ''
			),
                    	array(
				'name' => 'Image two',
				'desc' => 'upload or enter in the URL to your JPG file',
				'id'   => $prefix . 'post_gallry_two',
				'type' => 'file',
				'std' => ''
			),
                    	array(
				'name' => 'Image three',
				'desc' => 'upload or enter in the URL to your JPG file',
				'id'   => $prefix . 'post_gallry_three',
				'type' => 'file',
				'std' => ''
			),
                    	array(
				'name' => 'Image four',
				'desc' => 'upload or enter in the URL to your JPG file',
				'id'   => $prefix . 'post_gallry_four',
				'type' => 'file',
				'std' => ''
			),
                    	array(
				'name' => 'Image five',
				'desc' => 'upload or enter in the URL to your JPG file',
				'id'   => $prefix . 'post_gallry_five',
				'type' => 'file',
				'std' => ''
			),
                    	array(
				'name' => 'Image six',
				'desc' => 'upload or enter in the URL to your JPG file',
				'id'   => $prefix . 'post_gallry_six',
				'type' => 'file',
				'std' => ''
			),

		),
	);
	/**
	* META FOR LINK POST TYPE
	*/
	$post_meta_boxes[] = array(
		'id'         => 'defier_metabox_link',
		'title'      => 'Link Meta',
		'pages'      => array( 'post', ), // Post type
		'context'    => 'normal',
		'priority'   => 'high',
		'show_names' => true, // Show field names on the left
		'fields' => array(
			array(
				'name' => 'Link Title',
				'desc' => 'i.e: ThemeForest',
				'id'   => $prefix . 'post_link_title',
				'type' => 'text_medium'
			),
			array(
				'name' => 'Link',
				'desc' => 'i.e: www.themeforest.com',
				'id'   => $prefix . 'post_link',
				'type' => 'text_medium'
			),
			array(
				'name' => 'Preview Image',
				'desc' => 'This will be the image displayed on your link background.',
				'id'   => $prefix . 'link_bg_image',
				'type' => 'file',
				'std' => ''
			),
		)
	);
	/**
	* META FOR STATUS POST TYPE
	*/
	$post_meta_boxes[] = array(
		'id'         => 'defier_metabox_status',
		'title'      => 'Social Media Embed Code',
		'pages'      => array( 'post', ), // Post type
		'context'    => 'normal',
		'priority'   => 'high',
		'show_names' => true, // Show field names on the left
		'fields' => array(
			array(
				'name' => 'Embed Code',
				'desc' => 'Your embed code here...',
				'id'   => $prefix . 'post_social_embed',
				'type' => 'textarea_small',
				'std' => ''
			),
			array(
				'name' => 'Background Image',
				'desc' => 'Upload an image or enter an URL.',
				'id'   => $prefix . 'post_social_bg',
				'type' => 'file',
			),
			array(
	            'name' => 'Background Color',
	            'desc' => 'embed post preview bg',
	            'id'   => $prefix . 'post_social_bg_color',
	            'type' => 'colorpicker'
	        ),
		)
	);

	// Add other metaboxes as needed

	return $post_meta_boxes;
}

add_action( 'init', 'defier_post_meta_boxes', 9999 );
/**
 * Initialize the metabox class.
 */
function defier_post_meta_boxes() {

	if ( ! class_exists( 'cmb_Meta_Box' ) ){
			get_template_part( 'inc/post-formats/init' );
	}
}
