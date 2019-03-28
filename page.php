<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package defier
 */

get_header(); ?>
      <div class="page-title">
          <h2 class="col-lg-6 col-sm-6 col-md-6 col-xs-12"><?php wp_title(''); ?></h2>
          <?php if(!empty($defTheme['BreadcrumbsOn'])): ?> <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12"><?php Defier_breadcrumbs() ?></div><?php endif; ?>
      </div>
         <div class="fixedwidth-container">
        <!-- home content -->
        <div class="col-lg-8 col-md-8 col-sm-7 col-xs-12 content-wrapper">
                <div id="primary" class="content-area">
                    <main id="main" class="site-main" role="main">
                      <?php
                      echo '<a class="def-thumbnails" href="', get_permalink(), '">';
                              if (has_post_thumbnail()) {
                              the_post_thumbnail();
                              }
                             echo '</a>';
                              ?>
                        <?php while ( have_posts() ) : the_post(); ?>
                            <?php get_template_part( 'content', 'page' ); ?>
                            <?php
                                // If comments are open or we have at least one comment, load up the comment template
                                if ( comments_open() || get_comments_number() ) :
                                    comments_template();
                                endif;
                            ?>

                        <?php endwhile; // end of the loop. ?>
                    </main>
                    <!-- #main -->
                </div>
                <!-- #primary -->
            </div>
            <div class="col-lg-4 col-md-4 col-sm-5 col-xs-12 sticky">
                    <?php get_sidebar(); ?>
            </div>
            </div>
            <?php get_footer(); ?>
