<?php
/*************************************/
/* Content quote
/*************************************/
			$author			= get_post_meta( get_the_ID(), 'defier_post_quote_author', true );
			$link			= get_post_meta( get_the_ID(), 'defier_post_quote_link', true );
      $blockquote 	= get_post_meta( get_the_ID(), 'defier_post_quote', true );
			$quotebg    	= get_post_meta( get_the_ID(), 'defier_quote_bg_image', true );
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    	<div class="quote-post-format"  <?php if($quotebg){ echo 'style="background:url('.$quotebg.') 50% 50% transparent no-repeat;"'; }?>>
		<div class="quote-post-format-content">
			<blockquote>
				<p>
				    <i class="fa fa-stack" aria-hidden="true"></i>
					<?php echo esc_html($blockquote); ?>
				</p>
				<cite>
					<?php
						if( !empty($link))
						{
							echo '<a href='. $link .' target="_blank">'. $author .'</a>';
						}
						else
						{
							echo esc_html($author);
						}
					?>
				</cite>
				</blockquote>
        <header class="entry-header">
		<?php the_title( sprintf( '<h1 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h1>' ); ?>
		</header>
    		<div class="entry-meta">
                <?php get_template_part( 'inc/post-formats/parts/meta', 'secondary' );  ?>
    		</div><!-- .entry-meta -->
		</div>
	</div>
</article><!-- #post-## -->
