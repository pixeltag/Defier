<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package defier
 */

get_header(); ?>
<div class="fixed-container">
        <div class="row">
        <!-- home content -->
        <div  class="col-lg-8 col-md-8 col-sm-7 col-xs-12">
                <div id="primary" class="content-area" data-blog-type="<?php echo esc_attr($blog_type); ?>">
                        <main id="main" class="site-main" role="main">
                        <?php if ( have_posts() ) : ?>
                            <?php /* Start the Loop */ ?>
                            <?php while ( have_posts() ) : the_post(); ?>
                                <?php  get_template_part( 'inc/post-formats/content', get_post_format() ); ?>
                            <?php endwhile; ?>
                            <?php else : ?>
                                <?php get_template_part( 'content', 'none' ); ?>
                            <?php endif; ?>
                        </main><!-- #main -->
                        <?php defier_numeric_posts_nav(); ?>
                </div><!-- #primary -->
        </div>
        <!-- Sidebar -->
        <div id="sidebar" class="col-lg-4 col-md-4 col-sm-5 col-xs-12">
            <?php get_sidebar(); ?>
        </div>
</div>
</div>
<?php get_footer(); ?>
