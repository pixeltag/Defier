<?php
/**
 * The template for displaying comments.
 *
 * The area of the page that contains both current comments
 * and the comment form.
 *
 * @package defier
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}
?>

<div id="comments" class="comments-area">

	<?php // You can start editing here -- including this comment! ?>
	<?php if ( have_comments() ) : ?>
         <span class="defier-cat-title"><h4 class="widget-title">
        			<?php
				printf( _nx( 'One thought on &ldquo;%2$s&rdquo;', '%1$s thoughts on &ldquo;%2$s&rdquo;', get_comments_number(), 'comments title', 'defier' ),
					number_format_i18n( get_comments_number() ), '<span>' . get_the_title() . '</span>' );
			?>
    </h4></span>
		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // are there comments to navigate through ?>
		<nav id="comment-nav-above" class="comment-navigation" role="navigation">
			<h1 class="screen-reader-text"><?php _e( 'Comment navigation', 'defier' ); ?></h1>
			<div class="nav-previous"><?php previous_comments_link( do_shortcode( '&larr; Older Comments', 'defier' ) ); ?></div>
			<div class="nav-next"><?php next_comments_link( do_shortcode( 'Newer Comments &rarr;', 'defier' ) ); ?></div>
		</nav><!-- #comment-nav-above -->
		<?php endif; // check for comment navigation ?>
		<ol class="comment-list">
			<?php
				wp_list_comments( array(
					'style'      => 'ol',
					'short_ping' => true,
                    'walker'            => null,
                    'max_depth'         => '',
                    'callback'          => null,
                    'end-callback'      => null,
                    'type'              => 'all',
                    'reply_text'        => 'Reply',
                    'page'              => '',
                    'per_page'          => '',
                    'avatar_size'       => 70,
                    'reverse_top_level' => null,
                    'reverse_children'  => '',
                    'format'            => 'xhtml', //or html5 @since 3.6
                    'short_ping'        => false // @since 3.6
				) );
			?>
		</ol><!-- .comment-list -->
		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // are there comments to navigate through ?>
		<nav id="comment-nav-below" class="comment-navigation" role="navigation">
			<h1 class="screen-reader-text"><?php _e( 'Comment navigation', 'defier' ); ?></h1>
			<div class="nav-previous"><?php previous_comments_link( do_shortcode( '&larr; Older Comments', 'defier' ) ); ?></div>
			<div class="nav-next"><?php next_comments_link( do_shortcode( 'Newer Comments &rarr;', 'defier' ) ); ?></div>
		</nav><!-- #comment-nav-below -->
		<?php endif; // check for comment navigation ?>
	<?php endif; // have_comments() ?>
	<?php
		// If comments are closed and there are comments, let's leave a little note, shall we?
		if ( ! comments_open() && '0' != get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) :
	?>
		<p class="no-comments"><?php _e( 'Comments are closed.', 'defier' ); ?></p>
	<?php endif; ?>

    <?php
    //comment_form();

    $commenter = wp_get_current_commenter();
    $req = get_option( 'require_name_email' );
    $aria_req = ( $req ? " aria-required='true'" : '' );

    $defier_comment_form = array(
        'fields' => apply_filters(
            'comment_form_default_fields', array(
                'author' =>
                    '<p class="comment-form-author">' .
                    '<div class="group"><input id="author" name="author" type="text" value="' .
                    esc_attr( $commenter['comment_author'] ) . '" size="30"' . $aria_req . ' placeholder="'.do_shortcode( 'Your Name', 'defier' ).'" />' .
                    '<span class="bar"></span></div></p><!-- #form-section-author .form-section -->',
                'email'  =>
                    '<p class="comment-form-email">' .
                    '<div class="group"><input id="email" name="email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) .
                    '" size="30"' . $aria_req . ' placeholder="'. do_shortcode( 'Your E-mail', 'defier' ).'" />' .
                    '<span class="bar"></span></div></p><!-- #form-section-email .form-section -->',
                'url' =>
                    '<p class="comment-form-url">' .
                    '<div class="group"><input id="url" name="url" type="text" value="' . esc_attr( $commenter['comment_author_url'] ) .
                    '" size="30" placeholder="'. do_shortcode( 'Your Website', 'defier' ).'" /><span class="bar"></span></div></p>',
            )
        ),
        'comment_field' => '<p class="comment-form-comment">' .
            '<div class="group"><textarea id="comment" name="comment" cols="45" rows="8" aria-required="true" placeholder="'. do_shortcode("Message","defier-magazine-blog") .'"></textarea><span class="bar"></span></div>' .
            '</p><!-- #form-section-comment .form-section -->',
        'comment_notes_after' => '',
        'title_reply' => do_shortcode("<span class='defier-cat-title'><h4 class='widget-title'>Leave a comment</h4></span>", "defier-magazine-blog"),
    );

   comment_form( $defier_comment_form );
    ?>

</div><!-- #comments -->
