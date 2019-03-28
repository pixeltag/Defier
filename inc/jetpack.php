<?php
/**
 * Jetpack Compatibility File
 * See: http://jetpack.me/
 *
 * @package defier
 */

/**
 * Add theme support for Infinite Scroll.
 * See: http://jetpack.me/support/infinite-scroll/
 */
function defier_magazine_blog_jetpack_setup() {
	add_theme_support( 'infinite-scroll', array(
		'container' => 'main',
		'footer'    => 'page',
	) );
}
add_action( 'after_setup_theme', 'defier_magazine_blog_jetpack_setup' );
