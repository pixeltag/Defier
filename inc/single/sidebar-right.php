<?php
global $defTheme;
?>
<?php while ( have_posts() ) : the_post(); ?>
                    <main id="main" class="col-lg-8 col-md-8 col-sm-12 col-xs-12" role="main">
                    <article id="post-<?php the_ID(); ?>" class="single-Wrapper sidebarLeft" <?php post_class(); ?>  >
                    <div class="grid">
                        <figure class="post-figure">
                            <?php
                            if (has_post_thumbnail()) {
                            the_post_thumbnail();
                            } ?>
                        					<figcaption>
                                    <?php include(locate_template('inc/post-formats/parts/format-icon.php'));  ?>
                                    <div class="post-type-format"><i class="fa <?php echo esc_html($post_format_icon); ?>"></i></div>
                        					</figcaption>
                        	</figure>
                        </div>
                               <?php if(!empty($defTheme['BreadcrumbsOn'])): ?>
                                    <?php  Defier_breadcrumbs() ?>
                                    <?php endif; ?>
                                    <header class="entry-header">
                                        <?php if(isset($defTheme['ShowAuthorLabel'])): ?>
                                         <div class="meta-first-row">
                                            <div class="col-md-4 col-xs-12 pull-left">
                                                <div class="byAuthor">
                                                <?php echo get_avatar( get_the_author_meta( 'ID' ), 32 ); ?>
                                                <span><?php _e( 'Wrote by:', 'defier' ) ?>    <?php echo the_author_link(); ?> </span>
                                                </div>
                                            </div>
                                         </div>
                                         <?php endif; ?>
                            		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
                            	</header><!-- .entry-header -->
                                <div class="entry-meta">
                                    <?php get_template_part( 'inc/post-formats/parts/meta', 'secondary' );  ?>
                                </div>
                                <div class="post-format-entry">
                                <?php
                                $format = get_post_format();
                                    if($format == "audio"){
                                            /********* Audio ********/
                                            $custom_mp3 = get_post_meta($post->ID, 'defier_post_audio_mp3', true);
                                			$custom_sound_embed = get_post_meta($post->ID, 'defier_post_cs_sound_embed', true);

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
                                            /********* Audio ********/
                                    }
                                    if($format == "video"){
                                        /********* Video *********/
                                      $custom_embed = get_post_meta($post->ID, 'defier_post_cs_embed', true);
                                      if($custom_embed) {
                                      echo stripslashes(htmlspecialchars_decode($custom_embed)) ;
                                          }
                                        /********* Video *********/
                                    }
                                    if($format == "quote"){
                                        /********* quote *********/
                                       		$author			   = get_post_meta( get_the_ID(), 'defier_post_quote_author', true );
                                    			$link			     = get_post_meta( get_the_ID(), 'defier_post_quote_link', true );
                                          $blockquote   = get_post_meta( get_the_ID(), 'defier_post_quote', true );
                                    			$quotebg    	= get_post_meta( get_the_ID(), 'defier_quote_bg_image', true );
                                    ?>
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
                                    		</div>
                                    	</div>
                                    <?php
                                    /********* quote *********/
                                    }
                                    if($format == "link"){
                                    /********* Link *********/
                                			$title			= get_post_meta( get_the_ID(), 'defier_post_link_title', true );
                                			$link			= get_post_meta( get_the_ID(), 'defier_post_link', true );
                                			$linkbg			= get_post_meta( get_the_ID(), 'defier_link_bg_image', true );
                                    ?>
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
                                    		</div>
                                    	</div>
                                    <?php
                                    /********* Link *********/
                                    }
                                    if($format == "status"){
                                    /********* status *********/
                                    $social_post_embed 		= get_post_meta( get_the_ID(), 'defier_post_social_embed', true );
                                    if (isset($social_post_embed) && $social_post_embed != "") {    ?>
                            		    <div class="social-post-embed" style="background-color:<?php echo esc_html($social_post_bg_color);?>; background-image:url(<?php echo esc_html($social_post_bg); ?>);">
                            				<?php
                            					echo stripslashes(htmlspecialchars_decode($social_post_embed));
                            				?>
                                		</div>
                                    <?php }
                                    /********* status *********/
                                    }
                                    if($format == "gallery"){
                                    /********* Gallery *********/
                                      $images_one  =  get_post_meta($post->ID, 'defier_post_gallry_one', true);
                                      $images_two  =  get_post_meta($post->ID, 'defier_post_gallry_two', true);
                                      $images_three  =  get_post_meta($post->ID, 'defier_post_gallry_three', true);
                                      $images_four  =  get_post_meta($post->ID, 'defier_post_gallry_four', true);
                                      $images_five  =  get_post_meta($post->ID, 'defier_post_gallry_five', true);
                                      $images_six  =  get_post_meta($post->ID, 'defier_post_gallry_six', true);
                                      $RandToken = md5(microtime().rand(1111111111 , 9999999999)) ;

                                      echo '<div class="gallery-post-images" id="post-images_'.$RandToken.'">';
                                      if(get_post_meta($post->ID, 'defier_post_gallry_one', true)): ?> <div><img src="<?php echo esc_html($images_one); ?>" alt="" /></div><?php endif;
                                      if(get_post_meta($post->ID, 'defier_post_gallry_two', true)): ?> <div><img src="<?php echo esc_html($images_two); ?>" alt="" /></div><?php endif;
                                      if(get_post_meta($post->ID, 'defier_post_gallry_three', true)): ?> <div><img src="<?php echo esc_html($images_three); ?>" alt="" /></div><?php endif;
                                      if(get_post_meta($post->ID, 'defier_post_gallry_four', true)): ?> <div><img src="<?php echo esc_html($images_four); ?>" alt="" /></div><?php endif;
                                      if(get_post_meta($post->ID, 'defier_post_gallry_five', true)): ?> <div><img src="<?php echo esc_html($images_five); ?>" alt="" /></div><?php endif;
                                      if(get_post_meta($post->ID, 'defier_post_gallry_six', true)): ?> <div><img src="<?php echo esc_html($images_six); ?>" alt="" /></div><?php endif;
                                      echo "</div>";
                                      echo "  <script type='text/javascript'>jQuery(document).ready(function(){var a='false',a='ar'==jQuery('html').attr('lang');jQuery('#post-images_".$RandToken."').slick({dots:!0,infinite:!0,speed:500,fade:!0,prevArrow:'<i class=\"fa-arrow-left2\"></i>',nextArrow:'<i class=\"fa-arrow-right2\"></i>',autoplay:!0,rtl:a,cssEase:'linear'})})</script>";
                                    /********* Gallery *********/
                                    }
                                    ?>
                                    </div>
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
              	                       <?php if(isset($defTheme['ShowPostShareIcon'])): ?>
                                          <?php get_template_part( '/inc/post-formats/parts/share', 'post' ); ?>
                                     <?php endif; ?>
                                     </div>
                                     <div class="inCategories col-md-6 col-lg-6 col-sm-6 col-xs-12">
                                         <?php defier_magazine_blog_entry_footer(); ?>
                                      </div>
                                	</footer><!-- .entry-footer -->
                                              <!-- show author -->
                                                <?php if(isset($defTheme['ShowAuthorBox']) && (is_single())  ): ?>
                                                    <?php get_template_part( '/inc/post-formats/parts/author', 'info' ); ?>
                                                <?php endif; ?>
                                              <!-- show author -->
                                              <?php defier_setPostViews(); ?>
                                                              <!-- templates here -->
                                                <?php if(isset($defTheme['ShowNextPrevPost'])): ?>
                                                <?php get_template_part( 'inc/post-formats/parts/nav', 'post' );  ?>
                                                <?php endif; ?>
                                                <?php if(isset($defTheme['ShowRelatedPostBox']) && (is_single()) ): ?>
                                                <?php get_template_part( '/inc/post-formats/parts/related', 'post' ); ?>
                                                <?php endif; ?>
                                                <?php
                                                // If comments are open or we have at least one comment, load up the comment template
                                                if ( comments_open() || get_comments_number() ) :
                                                    comments_template();
                                                endif;
                                                ?>
                                            </article><!-- #post-## -->
                                        </main>
                                            <div id="sidebar" class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                                <?php get_sidebar(); ?>
                                            </div>
 <?php endwhile; // end of the loop. ?>
