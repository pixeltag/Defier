<?php
/*************************************/
/* Content Status
/*************************************/
$social_post_embed 		= get_post_meta( get_the_ID(), 'defier_post_social_embed', true );
$social_post_bg 		= get_post_meta( get_the_ID(), 'defier_post_social_bg', true );
$social_post_bg_color 	= get_post_meta( get_the_ID(), 'defier_post_social_bg_color', true );
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
  <?php get_template_part( 'inc/post-formats/parts/meta', 'primary' );  ?>
       	<?php if(!is_archive()) : ?>
		<?php if (isset($social_post_embed) && $social_post_embed != "") {    ?>
		<div class="social-post-embed" style="background-color:<?php echo esc_html($social_post_bg_color); ?>; background-image:url(<?php echo esc_html($social_post_bg); ?>);">
				<?php
					echo stripslashes(htmlspecialchars_decode($social_post_embed));
				?>
			</div>
		<?php } else { ?>
            <figure class="post-thumb">
              <figcaption>
                <?php include(locate_template('inc/post-formats/parts/format-icon.php'));  ?>
                <div class="post-type-format"><i class="fa <?php echo esc_html($post_format_icon); ?>"></i></div>
              </figcaption>
        <?php
         echo '<a class="def-thumbnails" href="', get_permalink(), '">';
                if (has_post_thumbnail()) {
                the_post_thumbnail();
                }
                 echo '</a>';
                  } ?>
                  </figure>
	<?php endif; ?>
	<header class="entry-header">
		<?php the_title( sprintf( '<h1 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h1>' ); ?>
		<div class="entry-meta">
        <?php get_template_part( 'inc/post-formats/parts/meta', 'secondary' );  ?>
		</div><!-- .entry-meta -->
	</header><!-- .entry-header -->
	<div class="entry-content">
		<?php
      $content  = wp_trim_words( get_the_content(), 55, '<div class="col-md-12 readMoreWrapper"><a class="readMore" href="'. get_permalink() .'"><i class="fa fa-chevron-right" aria-hidden="true"></i>'. __( 'Continue reading', 'defier' ) .' </a></div>' );
      echo do_shortcode($content);
		?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'defier' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->
</article><!-- #post-## -->
