<?php
/*************************************/
/******* Content Audio ************/
/*************************************/
$custom_mp3 = get_post_meta($post->ID, 'defier_post_audio_mp3', true);
$custom_sound_embed = get_post_meta($post->ID, 'defier_post_cs_sound_embed', true);
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <!-- meta row -->
    <?php get_template_part( 'inc/post-formats/parts/meta', 'primary' );  ?>
    <!-- video Embed -->
   <div class="sound-post-format">
            <?php
			if(!empty($custom_sound_embed))
			{
				echo '<div class="embed">';
				echo stripslashes(htmlspecialchars_decode($custom_sound_embed));
				echo '</div>';
			}
			else {
				if(!empty($custom_mp3))
				{
					echo '<audio id="audio-player" src="'.$custom_mp3.'" type="audio/mp3" controls="controls" width="100%"></audio>';
				};
			}
            ?>
            <figure class="post-thumb">
              <figcaption>
                <?php include(locate_template('inc/post-formats/parts/format-icon.php'));  ?>
                <div class="post-type-format"><i class="fa <?php echo esc_html($post_format_icon); ?>"></i></div>
              </figcaption>
            <?php
            if(empty($custom_sound_embed) && empty($custom_mp3))
            {
                echo '<a class="def-thumbnails" href="', get_permalink(), '">';
                        if (has_post_thumbnail()) {
                        the_post_thumbnail();
                        }
                 echo '</a>';
            }
		?>
      </figure>
    	</div>
    <!-- video Embed -->
	<header class="entry-header">
		<?php the_title( sprintf( '<h1 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h1>' ); ?>
		<div class="entry-meta">
    <?php get_template_part( 'inc/post-formats/parts/meta', 'secondary' );  ?>
		</div><!-- .entry-meta -->
	</header><!-- .entry-header -->
	<div class="entry-content">
       		   <?php
            $content  = wp_trim_words( get_the_content(), 55, '<div class="col-md-12 readMoreWrapper"><a class="readMore" href="'. get_permalink() .'"><i class="fa fa-chevron-right" aria-hidden="true"></i>'. do_shortcode( 'Continue reading', 'defier' ) .' </a></div>' );
            echo do_shortcode($content);
		          ?>
	</div><!-- .entry-content -->
</article><!-- #post-## -->
