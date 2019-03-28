<?php
global $defTheme;
$args = array(
    'post_type' => 'post',
    'order' => 'DESC'
);
// The Query
$the_query = new WP_Query( $args );
if($the_query->have_posts()) {
    $slider_title            = array();
    $slider_title_link       = array();
    $slider_content          = array();
    $slider_imag             = array();
    $slider_date             = array();
    $slider_catogry          = array();
    $slider_catogry_link     = array();
    $slider_catogry_postview = array();
    $slider_love             = array();
    $count_slider = 0 ;
    while ($the_query->have_posts()) {
        $the_query->the_post();
        $featured = get_post_meta($post->ID, 'defier_featured_checkbox', true);
        if ($featured == "on")
        {
            $slider_title[]          = get_the_title();
            $slider_title_link[]     = get_permalink();
            $slider_imag[]           = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID ), 'single-post-thumbnail' );
            $slider_data_cat            = get_the_category();
            foreach((get_the_category()) as $cat) {
                $slider_catogry[]  =  $cat->cat_name ;
                $slider_catogry_link[]  =  get_category_link($cat->cat_ID) ;
                $slider_cat_ID[]    = $cat->cat_ID ;
            }
            $content                = get_the_content();
            $slider_content[]       = wp_trim_words( $content, 12, '<a href="'. get_permalink() .'"><i class="fa-ellipsis" aria-hidden="true"></i>'. esc_html( 'Read More', 'defier' ) .' </a>' );
            $slider_date[]          = get_the_date();
            $slider_catogry_postview[] = defier_PostViews( '', $post->ID );
           if($count_slider >= 5 ){break ; }
            $count_slider ++ ;
        }
    }
}
?>
    <?php if(isset($slider_title[0]))
    {
      ?>
            <div  class="grid">
                <div class="col-md-6 col-xs-12 featured-post">
                    <figure class="effect-thumbDefier  sliderthreeWarpper">
                        <?php get_the_post_thumbnail(); ?>
                        <img src="<?php if(isset($slider_imag[0][0])){ echo esc_url($slider_imag[0][0]);} ?>" alt="<?php echo esc_html($slider_title[0]) ; ?>"/>
                        <figcaption>
                            <h2><a href="<?php echo esc_url($slider_title_link[0]) ?>"><?php echo esc_html($slider_title[0]) ; ?></a> </h2>
                            <?php if(isset($defTheme['sliderDescShow'])): ?>
                            <p><?php  echo do_shortcode($slider_content[0]);  ?></p>
                            <?php endif; ?>
                            <?php if(isset($defTheme['slidercatShow'])): ?>
                                <div class="catLabel">
                                    <div class="lavecat" style="background:<?php  defier_cat_color($slider_cat_ID[0]); ?>"></div>
                                    <a href="<?php echo esc_url($slider_catogry_link[0]); ?>">
                                    <?php echo esc_html($slider_catogry[0]) ; ?></a>
                                </div>
                            <?php endif; ?>
                            <time class="data-label">
                              <div class="pull-right">
        					             <?php if(isset($defTheme['slidertimeShow'])): ?>
                                 <div class="time"><i class="fa-clock"></i><?php echo esc_html($slider_date[0]); ?></div>
                                 <?php endif; ?>
                                 <?php if(isset($defTheme['sliderpostView'])): ?>
                                 <div class="view-counter"><?php  echo do_shortcode($slider_catogry_postview[0]); ?></div>
                                 <?php endif; ?>
                                 <?php if(isset($defTheme['sliderloveShow'])): ?>
                                 <div class="like-counter"><?php echo defier_likes_button( get_the_ID() );?></div>
                                 <?php endif; ?>
    					                    </div>
                            </time>
                        </figcaption>
                    </figure>
                </div>
                <?php }  ?>
                <?php if(isset($slider_title[1]))
                {?>
                <div class="col-md-6 col-xs-12 featured-post">
                    <figure class="effect-thumbDefier  sliderthreeWarpper">
                        <img src="<?php if(isset($slider_imag[1][0])){ echo esc_url($slider_imag[1][0]);} ?>" alt="<?php echo esc_html($slider_title[1]) ; ?>"/>
                        <figcaption>
                            <h2><a href="<?php echo esc_url($slider_title_link[1]) ?>"><?php echo esc_html($slider_title[1]) ; ?></a> </h2>
                            <?php if(isset($defTheme['sliderDescShow'])): ?>
                                <p><?php  echo do_shortcode($slider_content[1]);  ?></p>
                            <?php endif; ?>
                            <?php if(isset($defTheme['slidercatShow'])): ?>
                                <div class="catLabel">
                                    <div class="lavecat" style="background:<?php  defier_cat_color($slider_cat_ID[1]); ?>"></div>
                                    <a href="<?php echo esc_url($slider_catogry_link[1]); ?>">
                                    <?php echo esc_html($slider_catogry[1]) ; ?></a>
                                </div>
                            <?php endif; ?>
                            <?php if(isset($defTheme['slidertimeShow'])): ?>
                            <time class="data-label">
                                    <div class="pull-right">
                      					             <?php if(isset($defTheme['slidertimeShow'])): ?>
                                               <div class="time"><i class="fa-clock"></i><?php echo esc_html($slider_date[1]); ?></div>
                                               <?php endif; ?>
                                               <?php if(isset($defTheme['sliderpostView'])): ?>
                                               <div class="view-counter"><?php  echo do_shortcode($slider_catogry_postview[1]); ?></div>
                                               <?php endif; ?>
                                               <?php if(isset($defTheme['sliderloveShow'])): ?>
                                               <div class="like-counter"><?php echo defier_likes_button( get_the_ID() );?></div>
                                               <?php endif; ?>
        					           </div>
                                    </time>
                                    <?php endif; ?>
                                </figcaption>
                          </figure>
                      </div>
                  </div>
          <?php }  ?>
          <?php if(isset($slider_title[2]))
          {?>
        <div  class="grid">
            <div class="col-xs-12 col-sm-4 featured-post">
                    <figure class="defier-slider-one effect-thumbDefier small-thumbDefier <?php if(!empty($defTheme['pointer'])): ?>pointer<?php endif; ?>">
                        <img src="<?php if(isset($slider_imag[2][0])){ echo esc_url($slider_imag[2][0]);} ?>" alt="<?php echo esc_html($slider_title[2]) ; ?>"/>
                        <figcaption>
                            <h2><a href="<?php echo esc_url($slider_title_link[2]) ?>"><?php echo esc_html($slider_title[2]) ; ?></a> </h2>
                            <?php if(isset($defTheme['slidercatShow'])): ?>
                                <div class="catLabel">
                                    <div class="lavecat" style="background:<?php  defier_cat_color($slider_cat_ID[2]); ?>"></div>
                                    <a href="<?php echo esc_url($slider_catogry_link[2]); ?>">
                                    <?php echo esc_html($slider_catogry[2]) ; ?></a>
                                </div>
                            <?php endif; ?>
                            <?php if(isset($defTheme['slidertimeShow'])): ?>
                            <time class="data-label"><i class="fa-clock"></i>
            					<?php echo esc_html($slider_date[2]); ?>
            				</time>
                            <?php endif; ?>
                        </figcaption>
                    </figure>
                    </div>
                    <?php }  ?>
                    <?php if(isset($slider_title[3]))
                    {?>
                    <div class="col-xs-12 col-sm-4 featured-post">
                      <figure class="defier-slider-one effect-thumbDefier small-thumbDefier <?php if(!empty($defTheme['pointer'])): ?>pointer<?php endif; ?>">
                        <img src="<?php if(isset($slider_imag[3][0])){ echo esc_url($slider_imag[3][0]);} ?>" alt="<?php echo esc_html($slider_title[3]) ; ?>"/>
                        <figcaption>
                            <h2><a href="<?php echo esc_url($slider_title_link[3]) ?>"><?php echo esc_html($slider_title[3]) ; ?></a> </h2>
                            <?php if(isset($defTheme['slidercatShow'])): ?>
                                <div class="catLabel">
                                    <div class="lavecat" style="background:<?php  defier_cat_color($slider_cat_ID[3]); ?>"></div>
                                    <a href="<?php echo esc_url($slider_catogry_link[3]); ?>">
                                    <?php echo esc_html($slider_catogry[3]) ; ?></a>
                                </div>
                            <?php endif; ?>
                            <?php if(isset($defTheme['slidertimeShow'])): ?>
                            <time class="data-label"><i class="fa-clock"></i>
            					<?php echo esc_html($slider_date[3]); ?>
            					</time>
                            <?php endif; ?>
                        </figcaption>
                    </figure>
                  </div>
                  <?php }  ?>
                  <?php if(isset($slider_title[4]))
                  {?>
            <div class="col-xs-12 col-sm-4 featured-post">
                    <figure class="defier-slider-one effect-thumbDefier small-thumbDefier <?php if(!empty($defTheme['pointer'])): ?>pointer<?php endif; ?>">
                        <img src="<?php if(isset($slider_imag[4][0])){ echo esc_url($slider_imag[4][0]);} ?>" alt="<?php echo esc_html($slider_title[4]) ; ?>"/>
                        <figcaption>
                            <h2><a href="<?php echo esc_url($slider_title_link[4]) ?>"><?php echo esc_html($slider_title[4]) ; ?></a> </h2>
                            <?php if(isset($defTheme['slidercatShow'])): ?>
                                <div class="catLabel">
                                    <div class="lavecat" style="background:<?php  defier_cat_color($slider_cat_ID[4]); ?>"></div>
                                    <a href="<?php echo esc_url($slider_catogry_link[4]); ?>">
                                    <?php echo esc_html($slider_catogry[4]) ; ?></a>
                                </div>
                            <?php endif; ?>
                            <?php if(isset($defTheme['slidertimeShow'])): ?>
                            <time class="data-label"><i class="fa-clock"></i>
    						  <?php echo esc_html($slider_date[4]); ?>
    						</time>
                            <?php endif; ?>
                        </figcaption>
                    </figure>
            </div>
            <?php }  ?>
    </div>
<?php wp_reset_query(); ?>
