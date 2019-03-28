<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package defier
 */
 global $defTheme;
?>
<article id="post-<?php the_ID(); ?>" class="page-Wrapper" <?php post_class(); ?>  >
	<div class="entry-content">
		<?php the_content(); ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'defier' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->
         <footer class="entry-footer">
                <div class="poShare col-md-6 col-lg-6 col-sm-6 col-xs-12">
                    <?php if($defTheme['ShowPostShareIcon']): ?>
                    <?php get_template_part( '/inc/post-formats/parts/share', 'post' ); ?>
                     <?php endif; ?>
                </div>
                <div class="inCategories col-md-6 col-lg-6 col-sm-6 col-xs-12">
                    <?php defier_magazine_blog_entry_footer(); ?>
                </div>
        </footer><!-- .entry-footer -->
</article><!-- #post-## -->
