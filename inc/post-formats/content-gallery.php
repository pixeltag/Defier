<?php
/*************************************/
/* Content gallery
/*************************************/
    $images_one  =  get_post_meta($post->ID, 'defier_post_gallry_one', true);
    $images_two  =  get_post_meta($post->ID, 'defier_post_gallry_two', true);
    $images_three  =  get_post_meta($post->ID, 'defier_post_gallry_three', true);
    $images_four  =  get_post_meta($post->ID, 'defier_post_gallry_four', true);
    $images_five  =  get_post_meta($post->ID, 'defier_post_gallry_five', true);
    $images_six  =  get_post_meta($post->ID, 'defier_post_gallry_six', true);
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <?php get_template_part( 'inc/post-formats/parts/meta', 'primary' );  ?>
    	  <?php $RandToken = md5(microtime().rand(1111111111 , 9999999999)) ; ?>
          <figure class="post-thumb">
              <figcaption>
              <?php include(locate_template('inc/post-formats/parts/format-icon.php'));  ?>
              <div class="post-type-format"><i class="fa <?php echo esc_html($post_format_icon); ?>"></i></div>
              </figcaption>
          <div class="gallery-post-images" id="post-images_<?php  echo  $RandToken ;?>">
            <?php if(get_post_meta($post->ID, 'defier_post_gallry_one', true)): ?> <div><img src="<?php echo esc_html($images_one); ?>" alt="" /></div><?php endif; ?>
            <?php if(get_post_meta($post->ID, 'defier_post_gallry_two', true)): ?> <div><img src="<?php echo esc_html($images_two); ?>" alt="" /></div><?php endif; ?>
            <?php if(get_post_meta($post->ID, 'defier_post_gallry_three', true)): ?> <div><img src="<?php echo esc_html($images_three); ?>" alt="" /></div><?php endif; ?>
            <?php if(get_post_meta($post->ID, 'defier_post_gallry_four', true)): ?> <div><img src="<?php echo esc_html($images_four); ?>" alt="" /></div><?php endif; ?>
            <?php if(get_post_meta($post->ID, 'defier_post_gallry_five', true)): ?> <div><img src="<?php echo esc_html($images_five); ?>" alt="" /></div><?php endif; ?>
            <?php if(get_post_meta($post->ID, 'defier_post_gallry_six', true)): ?> <div><img src="<?php echo esc_html($images_six); ?>" alt="" /></div><?php endif; ?>
          </div>
          </figure>
        <?php echo "<script type='text/javascript'>jQuery(document).ready(function(){var a='false',a='ar'==jQuery('html').attr('lang');jQuery('#post-images_".$RandToken."').slick({dots:!0,infinite:!0,speed:500,fade:!0,prevArrow:'<i class=\"fa-arrow-left2\"></i>',nextArrow:'<i class=\"fa-arrow-right2\"></i>',autoplay:!0,rtl:a,cssEase:'linear'})});</script>"; ?>
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
	<footer class="entry-footer">
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
