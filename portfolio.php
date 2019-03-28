<?php
/*
Template Name: Portfolio
*/

  function enqueue_filterable() {
        wp_register_script( 'filterable', get_template_directory_uri() . '/js/filterable.js', array( 'jquery' ) );
        wp_enqueue_script( 'filterable' );
    }
add_action('wp_enqueue_scripts', 'enqueue_filterable');
get_header();
?>
    <div class="fixedwidth-container">
    <!-- home content -->
    <!-- block box one-->
    <div id="" class="defier-block-box">
    <div id="primary">
        <div id="content" role="main">
            <?php
            $terms = get_terms("tagportfolio");
            $count = count($terms);
            echo '<ul id="portfolio-filter">';
            echo '<li><a href="#all" title="">All</a></li>';
            if ( $count > 0 ){
                foreach ( $terms as $term ) {
                    $termname = strtolower($term->name);
                    $termname = str_replace(' ', '-', $termname);
                    echo '<li><a href="#'.$termname.'" title="" rel="'.$termname.'">'.$term->name.'</a></li>';
                }
            }
            echo "</ul>";
            $loop = new WP_Query(array('post_type' => 'project', 'posts_per_page' => -1));
            $count =0;
            ?>
            <div id="portfolio-wrapper">
                <ul id="portfolio-list" class="portfolio">
                    <?php if ( $loop ) :
                        while ( $loop->have_posts() ) : $loop->the_post(); ?>
                            <?php
                            $content  = wp_trim_words( get_the_content(), 20, '<a class="readMore" href="'. get_permalink() .'"><i class="fa-ellipsis" aria-hidden="true"></i>'.__( 'Read More', 'defier' ) .' </a>' );
                            $terms = get_the_terms( $post->ID, 'tagportfolio' );
                            if ( $terms && ! is_wp_error( $terms ) ) :
                                $links = array();
                                foreach ( $terms as $term )
                                {
                                    $links[] = $term->name;
                                }
                                $links = str_replace(' ', '-', $links);
                                $tax = join( " ", $links );
                                else :
                                    $tax = '';
                                endif;
                            ?>
                            <?php $infos = get_post_custom_values('_url'); ?>
                              <li class="col-sm-4 col-lg-4 col-md-4 col-xs-12 gridThumb <?php echo strtolower($tax); ?> all">
                                  <div class="grid">
                                      <figure class="effect-thumbDefier-gallery">
                                          <?php the_post_thumbnail(  ); ?>
                                          <figcaption>
                                              <h4>
                                              <a href="<?php the_permalink() ?>"><?php the_title(); ?></a>
                                              </h4>
                                              <?php if($content):  ?>
                                              <p class="excerpt"><?php echo do_shortcode($content); ?></p>
                                              <?php endif; ?>
                                                <p class="links">
                                                    <a href="<?php echo esc_url($infos[0]); ?>" target="_blank">
                                                        <i class="fa-link2"></i>
                                                    </a>
                                                <a class="expandImg"><i class="fa-eye2"></i></a>
                                                </p>
                                          </figcaption>
                                      </figure>
                                  </div>
                              </li>

                        <?php endwhile; else: ?>
                        <li class="error-not-found"><?php _e( 'Sorry, no portfolio entries for while.', 'defier' ); ?></li>
                    <?php endif; ?>
                </ul>
                <div class="clearboth"></div>
            </div> <!-- end #portfolio-wrapper-->

            <script>
                jQuery(document).ready(function() {
                    jQuery("#portfolio-list").filterable({
                      settings = $.extend({
                          useHash: true,
                          animationSpeed: 1000,
                          show: { width: 'show', opacity: 'show' },
                          hide: { width: 'hide', opacity: 'hide' },
                          useTags: true,
                          tagSelector: '#portfolio-filter a',
                          selectedTagClass: 'current',
                          allTag: 'all'
                      }, settings);
                    });
                });
            </script>
        </div><!-- #content -->
    </div><!-- #primary -->
    </div>
</div>
<?php get_footer(); ?>
