<?php
/*************************************/
/* Content link
/*************************************/
	$title			= get_post_meta( get_the_ID(), 'defier_post_link_title', true );
	$link			= get_post_meta( get_the_ID(), 'defier_post_link', true );
	$linkbg			= get_post_meta( get_the_ID(), 'defier_link_bg_image', true );
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="link-post-format" <?php if($linkbg){ echo 'style="background:url('.$linkbg.') fixed transparent no-repeat;"'; }?>>
		<div class="link-post-format-content">
			<?php if(!empty($link)) : ?>
				<h2 class="title">
            <a target="_blank" href="<?php echo esc_html($link); ?>">
							<?php
							if(!empty($title))
									{
										echo esc_html($title);
									}
							?>
                <i class="fa-link2" aria-hidden="true"></i>
					    	<b class="link"> <?php echo esc_html($link); ?></b>
                </a>
				</h2>
			<?php endif; ?>
          <header class="entry-header">
								<?php the_title( sprintf( '<h1 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h1>' ); ?>
								<div class="entry-meta">
                <?php get_template_part( 'inc/post-formats/parts/meta', 'secondary' );  ?>
								</div><!-- .entry-meta -->
			</header><!-- .entry-header -->
		</div>
	</div>
</article><!-- #post-## -->
