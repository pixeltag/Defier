<div id="post-nav">
                                    <?php $prevPost = get_previous_post(true);
                                    if($prevPost) {
                                        $args = array(
                                            'posts_per_page' => 1,
                                            'include' => $prevPost->ID
                                        );
                                        $prevPost = get_posts($args);
                                        foreach ($prevPost as $post) {
                                            setup_postdata($post);
                                            ?>
                                            <div class="post-previous col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-3 nopadding">
                                                    <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('thumbnail'); ?></a>
                                                </div>
                                                <div class="col-lg-10 col-md-10 col-sm-10 col-xs-9">
                                                    <div class="content">
                                                        <a class="previous" href="<?php the_permalink(); ?>"><i class="fa-arrow-left2" aria-hidden="true"></i><?php _e( 'Previous Story', 'defier' ); ?></a>
                                                        <h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php
                                            wp_reset_postdata();
                                        } //end foreach
                                    } // end if

                                    $nextPost = get_next_post(true);
                                    if($nextPost) {
                                        $args = array(
                                            'posts_per_page' => 1,
                                            'include' => $nextPost->ID
                                        );
                                        $nextPost = get_posts($args);
                                        foreach ($nextPost as $post) {
                                            setup_postdata($post);
                                            ?>
                                            <div class="post-next col-lg-6 col-md-6 col-sm-6 col-xs-6">

                                                <div class="col-lg-10 col-md-10 col-sm-10 col-xs-9">
                                                     <div class="content">
                                                        <a class="next" href="<?php the_permalink(); ?>"><?php _e( 'Next Story', 'defier' ); ?><i class="fa-arrow-right2" aria-hidden="true"></i></a>
                                                        <h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                                                    </div>
                                                </div>
                                                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-3 nopadding">
                                                     <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('thumbnail'); ?></a>
                                                </div>
                                            </div>
                                            <?php
                                            wp_reset_postdata();
                                        } //end foreach
                                    } // end if
                                    ?>
                                </div>