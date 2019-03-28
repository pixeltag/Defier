<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @package defier
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			<section class="error-404 not-found">
			    <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
          <div class="img404"></div>
			    </div>
			    <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
              <header class="page-header">
					<h1 class="page-title"><?php _e( 'Sorry! The page Doesn\'t exist on our server !', 'defier' ); ?></h1>
				</header><!-- .page-header -->
				<div class="page-content">
					<p><?php _e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'defier' ); ?></p>
					<?php get_search_form(); ?>
					<?php if ( defier_magazine_blog_categorized_blog() ) : // Only show the widget if site has multiple categories. ?>
					<div class="widget widget_categories col-lg-6 col-sm-6 col-md-6 col-xs-12">
						<h2 class="widget-title"><?php _e( 'Categories', 'defier' ); ?></h2>
						<ul class="catelist">
						<?php
							wp_list_categories( array(
								'orderby'    => 'count',
								'order'      => 'DESC',
								'show_count' => 1,
								'title_li'   => '',
								'number'     => 10,
							) );
						?>
						</ul>
					</div><!-- .widget -->
					<?php endif; ?>
            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
					<?php the_widget( 'WP_Widget_Tag_Cloud' ); ?>
          </div>
					</div><!-- .page-content -->
			    </div>
			</section><!-- .error-404 -->
		</main><!-- #main -->
	</div><!-- #primary -->
<?php get_footer(); ?>
