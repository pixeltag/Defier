<?php
global $get_meta , $post, $do_not_duplicate;
$original_post = $post;
global $defTheme;

    $related_no = 3;
    $query_type = $defTheme['relatedPostType'] ;
    if( $query_type == 'author' ){
        $args = array('post__not_in' => array($post->ID),'posts_per_page'=> $related_no , 'author'=> get_the_author_meta( 'ID' ), 'no_found_rows' => 1 );
    }elseif( $query_type == 'tag' ){
        $tags = wp_get_post_tags($post->ID);
        $tags_ids = array();
        foreach($tags as $individual_tag) $tags_ids[] = $individual_tag->term_id;
        $args=array('post__not_in' => array($post->ID),'posts_per_page'=> $related_no , 'tag__in'=> $tags_ids, 'no_found_rows' => 1  );
    }
    else{
        $categories = get_the_category($post->ID);
        $category_ids = array();
        foreach($categories as $individual_category) $category_ids[] = $individual_category->term_id;
        $args=array('post__not_in' => array($post->ID),'posts_per_page'=> $related_no , 'category__in'=> $category_ids, 'no_found_rows' => 1 );
    }
    $related_query = new wp_query( $args );
    if( $related_query->have_posts() ) : $count=0;?>
    <section id="related_posts">
        <div class="Carousel">
            <span class="defier-cat-title"><h4 class="widget-title"><div class="lavecat" style="background:<?php $rl_category_color = defier_cat_color($defier_custom_widget_catogry); ?>"></div></i>
                        <?php _e( 'Related', 'defier' ); ?></h4></span>

        <?php $RandToken = md5(microtime().rand(1111111111 , 9999999999)) ;  ?>

        <ul class="blockCarousel" id="relatedCar_<?php  echo  $RandToken ;?>">
            <?php while ( $related_query->have_posts() ) : $related_query->the_post(); $do_not_duplicate[] = get_the_ID(); ?>
                <li class="defier-first-post">

                    <div class="grid">

                        <figure class="effect-thumbDefier2  slidertwoWarpper">
                            <img alt="<?php the_title(); ?>" src="<?php echo  wp_get_attachment_url( get_post_thumbnail_id($post->ID) );?>"/>
                            <a  href="<?php esc_url(the_permalink()) ?>" >
                            <figcaption>
                                <h2><a href="<?php  the_permalink() ?>" alt="<?php the_title() ?>"><span style="background:<?php $rl_category_color = defier_cat_color($defier_custom_widget_catogry); ?> " class="verticalLine"></span><?php the_title() ?></a> </h2>
                                <?php $content  = wp_trim_words( get_the_content(), 20, '<a class="readMore" href="'. get_permalink() .'"><i class="fa-ellipsis" aria-hidden="true"></i>'. __( 'Read More', 'defier' ) .' </a>' ); ?>
                                <p>
                                    <?php echo do_shortcode($content);  ?>

                                </p>
                                <div class="meta-label"><div class="pull-left"><?php defier_get_time() ?></div><div class="pull-left"><?php  echo defier_PostViews( '', get_the_ID() ); ?></div> <div class="pull-right"><i class="fa-head"></i><?php the_author(); ?></div></div>
                            </figcaption>
                        </figure>
                        </a>
                    </div>
                </li>
            <?php endwhile;?>
        </ul>
        </div>
    </section>
    <?php echo '<script type="text/javascript">jQuery(document).ready(function(){var e="false",e="ar"==jQuery("html").attr("lang");jQuery("#relatedCar_'.$RandToken.'").slick({infinite:!0,autoplay:!0,autoplaySpeed:4e3,dots:!0,arrows:!1,rtl:e,slidesToShow:2,slidesToScroll:2,responsive:[{breakpoint:1024,settings:{slidesToShow:2,slidesToScroll:2,infinite:!0,dots:!0}},{breakpoint:600,settings:{slidesToShow:1,slidesToScroll:1}},{breakpoint:480,settings:{slidesToShow:1,slidesToScroll:1}}]})});</script>'; ?>
    <?php
    endif;
    $post = $original_post;
    wp_reset_query();
