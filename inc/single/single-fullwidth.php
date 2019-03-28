<?php while ( have_posts() ) : the_post(); ?>
<main id="main" class="col-md-12 post-wrapper-single" role="main">
    <?php get_template_part( 'content', 'single' ); ?>
</main>
 <?php endwhile; // end of the loop. ?>
        <!-- home content -->