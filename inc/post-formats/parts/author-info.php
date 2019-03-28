<!--BEGIN .author-bio-->
<?php
global $get_meta , $post, $do_not_duplicate;
$original_post = $post;
 ?>
<div class="author-bio">

            <div class="col-md-2 col-sm-2 col-lg-2 col-xs-5 text-align-center authorImg">
                <?php echo get_avatar( get_the_author_meta('email'), '130' ); ?>
            </div>
            <div class="col-md-5 col-sm-5 col-lg-5 col-xs-7 authorDesc">
                <h3 class="author-title"><?php the_author_link(); ?>
                <div class="aut-website"><a href="<?php the_author_meta('user_url');?>"><i class="fa-link2"></i></a></h3>
                <p class="author-description"><?php the_author_meta('description'); ?></p>
            </div>

            <div class="col-md-5 col-sm-5 col-lg-5 col-xs-7 latestFromAuth">
                <h4><?php _e( 'Latest from this author', 'defier' ) ?></h4>
                <?php $args = array('post__not_in' => array($post->ID),'posts_per_page'=> 3 , 'author'=> get_the_author_meta( 'ID' ), 'no_found_rows' => 1 );
                $related_query = new wp_query( $args );
                if( $related_query->have_posts() ) : $count=0;
                ?>
                <ul class="lister">
                    <?php while ( $related_query->have_posts() ) : $related_query->the_post(); $do_not_duplicate[] = get_the_ID(); ?>
                     <li><a href="<?php  the_permalink() ?>" alt="<?php the_title() ?>"><?php the_title() ?></a> </li>
                    <?php endwhile;?>
                    </ul>
                        <?php endif;
                            $post = $original_post;
                            wp_reset_query();
                            ?>
            </div>
    </div>

    <!--END .author-bio-->
