<?php
/*************************************/
/* Content  Search
/*************************************/
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <!-- meta row -->
    <?php if (has_post_thumbnail()): ?>
    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12 nopadding">
        <figure class="post-thumb">
        <?php
             echo '<a class="def-thumbnails" href="', get_permalink(), '">';
                    the_post_thumbnail();
             echo '</a>';
            ?>
      </figure>
    </div>
    <div class="col-lg-10 col-md-10 col-sm-10 col-xs-12">
  <?php else : ?>
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    <?php endif ; ?>
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
    </div>
    </div>
    <!-- .entry-content -->
</article><!-- #post-## -->
