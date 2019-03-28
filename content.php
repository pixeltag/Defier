<?php
/*************************************/
/* Content main
/*************************************/
?>


<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
       <?php
                 echo '<a href="', get_permalink(), '">';
                        if (has_post_thumbnail()) {
                        the_post_thumbnail();
                        }
                 echo '</a>';
        ?>
	<header class="entry-header">
		<?php the_title( sprintf( '<h1 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h1>' ); ?>
		<?php if ( 'post' == get_post_type() ) : ?>
		<?php endif; ?>
	</header><!-- .entry-header -->
	<div class="entry-content">
		<?php
			/* translators: %s: Name of current post */
			the_content( sprintf(
				__( '<i class="fa fa-paper"></i> %s Continue reading ', 'defier' ),
				the_title( '<span class="screen-reader-text">"', '"</span>', false )
			) );
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'defier' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->
	<footer class="entry-footer">
		<?php defier_magazine_blog_entry_footer(); ?><?php defier_magazine_blog_posted_on(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
