<?php
/*************************************/
/* Category
/*************************************/
get_header(); ?>
<div class="fixedwidth-container">
<div class="col-lg-12">
<?php
/* Queue the first post, that way we know if this is a date archive so we can display the correct title.
 * We reset this later so we can run the loop properly with a call to rewind_posts().
 */
    if ( have_posts() )
	  the_post(); ?>
	  <h2 class="page-title" style="color:<?php if (is_category()) { echo defier_cat_color(get_queried_object()->term_id); }   ?>">
						<?php if ( is_day() ) { ?>
								Archive for <?php echo get_the_date(); ?>
						<?php  } elseif ( is_month() ) { ?>
								Archive for <?php echo get_the_date('F Y'); ?>
						<?php  } elseif ( is_year() ) { ?>
								Archive for <?php echo get_the_date('Y'); ?>
						<?php  } else { ?>
								<?php  echo get_queried_object()->name; ?>
						<?php  } ?>
	  </h2>
				<?php
					// Show an optional term description.
					$term_description = term_description();
					if ( ! empty( $term_description ) ) :
						printf( '<div class="taxonomy-description">%s</div>', $term_description );
					endif;
				?>
  <?php // start the Breadcrumbs ?>
		<?php if(!empty($defTheme['BreadcrumbsOn'])): ?>
		<div class="col-md-12 col-sm-12 col-xs-12"><?php Defier_breadcrumbs() ?></div>
        <?php endif; // start the loop proper ?>
				<div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                <div id="primary" class="content-area">
                        <main id="main" class="site-main" role="main">
                        <?php if ( have_posts() ) : ?>
                            <?php /* Start the Loop */ ?>
                            <?php while ( have_posts() ) : the_post(); ?>
                                <?php get_template_part( 'inc/post-formats/content', get_post_format() ); ?>
                            <?php endwhile; ?>
							<?php else : ?>
									<?php get_template_part( 'content', 'none' ); ?>
							<?php endif; ?>
                        </main><!-- #main -->
                        <?php defier_numeric_posts_nav(); ?>
               			 </div><!-- #primary -->
					</div>
              <!-- Sidebar -->
					<div id="sidebar" class="col-lg-4 col-md-4 col-sm-12 col-xs-12"><?php get_sidebar(); ?></div>
				</div>
			</div>
</div><!-- #content-->
<?php get_footer(); ?>
