<?php
/*
	Template Name: Homepage Fullwidth
*/
get_header(); ?>
  <div class="fullwidth-page">
      <div class="fixedwidth-container">
          <!-- home content -->
              <div id="primary">
                  <main id="main" class="site-main" role="main">
                      <?php while ( have_posts() ) : the_post(); ?>
                          <?php get_template_part( 'content', 'home' ); ?>
                     <?php endwhile; // end of the loop. ?>
                  </main>
                  <!-- #main -->
              </div>
              <!-- #primary -->
        </div>
  </div>
<?php get_footer(); ?>
