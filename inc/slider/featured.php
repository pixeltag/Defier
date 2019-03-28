
<?php
global $defTheme;
$sliderItemNum = (int)$defTheme['OwlSliderItemNum'];
// Query featured entries
$args = array(
    'post_type' => 'post',
    'order' => 'DESC',
	);
// The Query
$RandToken = md5(microtime().rand(1111111111 , 9999999999)) ;
$sliderSpeed = $defTheme['defierSlideSpeed'];
$the_query = new WP_Query( $args );
if($the_query->have_posts()) {
    $slider_data             = array();
    $count_slider            = 1 ;
     while ($the_query->have_posts()) {
        $the_query->the_post();
        $featured = get_post_meta($post->ID, 'defier_featured_checkbox', true);
        $get_imge = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID ), 'single-post-thumbnail' );
        if(!empty($get_imge[0]))
        {
            if ($featured == "on")
            {
                $slider_data['thumbnail'][] = $get_imge[0];
                $slider_data['title'][]     = get_the_title();
                $slider_data['permalink'][] = get_permalink();
                $slider_data_cat            = get_the_category();
                foreach((get_the_category()) as $cat) {
                    $slider_data['cat_name'][]  =  $cat->cat_name ;
                    $slider_data['cat_link'][]  =  get_category_link($cat->cat_ID) ;
                    $slider_data['cat_ID'][]     = $cat->cat_ID ;
                }
                $content                    = get_the_content();
                $slider_data['content'][]   = wp_trim_words( $content, 30, '<a href="'. get_permalink() .'"><i class="fa-ellipsis" aria-hidden="true"></i>'. __( 'Read More', 'defier' ) .' </a>' );
                $slider_data['date'][]      = get_the_date();
                if($count_slider == $sliderItemNum+1 ){break ;
                 }
                 $count_slider ++;
            }
        }
    }
	        $CountSlider = 0;
            if(sizeof( $slider_data)>0)
            {
            ?>
            <div class="col-md-12 nopadding">
            <div class="col-md-8 col-sm-12 col-xs-12 nopadding">
            <section class="highlights">
                <div class="sliderSlickOne" id="sliderSlick_<?php  echo  $RandToken ;?>" data-slick='{"arrows":<?php if(isset($defTheme['ShowArrowSlider'])):  ?>true<?php else: ?>false<?php endif; ?>,"speed":<?php echo esc_html($defTheme['defierSlideSpeed']); ?>,"arrows":false,"dots":<?php if(isset($defTheme['ShowDotsSlider']))  echo 'true'; ?>}'>
                    <?php

                    foreach($slider_data as $key_slid=>$data_slid)
                    {
                        $title     =     $slider_data['title'][$CountSlider ] ;
                        $content   =     $slider_data['content'][$CountSlider ] ;
                        $permalink =     $slider_data['permalink'][$CountSlider ] ;
                        $thumbnail =     $slider_data['thumbnail'][$CountSlider ] ;
                        $CatName   =     $slider_data['cat_name'][$CountSlider ] ;
                        $Catlink   =     $slider_data['cat_link'][$CountSlider ] ;
                        $CatID      =     $slider_data['cat_ID'][$CountSlider ] ;
                        $date      =     $slider_data['date'][$CountSlider ] ;
                    ?>
                                <div>
                                    <div class="grid">
                                        <figure class="effect-thumbDefier  slidertwoWarpper">
                                            <img alt="<?php echo esc_html($title); ?>" src="<?php echo esc_url($thumbnail); ?>"/>
                                            <figcaption>
                                                <h2><a href="<?php echo esc_url($slider_data['permalink'][$CountSlider]) ;?>" alt="<?php echo esc_html($title); ?>"><?php echo do_shortcode($title); ?></a> </h2>
                                                <?php if(isset($defTheme['slidercatShow'])): ?>
                                                    <div class="catLabel">
                                                        <div class="lavecat" style="background:<?php  defier_cat_color($CatID); ?>"></div>
                                                        <a href="<?php  echo esc_url($Catlink); ?>">
                                                        <?php  echo esc_html($CatName); ?></a>
                                                    </div>
                                                <?php endif; ?>
                                                    <time class="data-label">
                                                       <div class="pull-right">
        					            					             <?php if(isset($defTheme['slidertimeShow'])): ?>
                                                                     <div class="time"><?php defier_get_time() ?></div>
                                                                     <?php endif; ?>
                                                                     <?php if(isset($defTheme['sliderpostView'])): ?>
                                                                     <div class="view-counter"><?php  echo defier_PostViews( '', get_the_ID() ); ?></div>
                                                                     <?php endif; ?>
                                                                     <?php if(isset($defTheme['sliderloveShow'])): ?>
                                                                     <div class="like-counter"><?php echo defier_likes_button( get_the_ID() );?></div>
                                                                     <?php endif; ?>
                                                                   </div>
                                                                 </time>
                                                              <?php if(isset($defTheme['sliderDescShow'])): ?>
                                                                 <p> <?php echo do_shortcode($content) ; ?></p>
                                                              <?php endif; ?>
                                                          </figcaption>
                                                      </figure>
                                                  </div>
                                              </div>
                                          <?php
                                          $CountSlider++;
                                          if($CountSlider == $sliderItemNum-2 )
                                          {
                                              break ;
                                          }
                                      }
                                  }
                                  ?>
                              </div>
                          </section>
                          <?php } ?>
                      </div>
                      <?php
               $sliderSpeed = $defTheme['defierSlideSpeed'];
               echo "  <script type='text/javascript'>jQuery(document).ready(function(){var a='false',a='ar'==jQuery('html').attr('lang');jQuery('#sliderSlick_".$RandToken."').slick({infinite:!0,speed:'.$sliderSpeed.',fade:!0,cssEase:'linear',arrows:false,accessibility:!0,autoplay:!0,rtl:a,lazyLoad:'ondemand',})})</script>";  ?>
        <?php    if(isset($slider_data['title'][$CountSlider]) && [$CountSlider] > 0 ) { ?>
            <div class="slider-two-item col-md-4 col-sm-12 col-xs-12 nopadding">
                 <div class="grid featured-post">
                <figure class="defier-slider-one effect-thumbDefier small-thumbDefier <?php if(!empty($defTheme['pointer'])): ?>pointer<?php endif; ?>">
                    <img src="<?php if(isset($slider_data['thumbnail'][$CountSlider])){ echo esc_url($slider_data['thumbnail'][$CountSlider]);} ?>" alt="<?php echo esc_html($slider_data['title'][$CountSlider]) ; ?>"/>
                    <figcaption>
                        <h2><a class="halfsize" href="<?php echo esc_url($slider_data['permalink'][$CountSlider]) ;?>"><?php echo esc_html($slider_data['title'][$CountSlider]) ; ?></a> </h2>
                        <?php if(isset($defTheme['slidercatShow'])): ?>
                                <div class="catLabel">
                                    <div class="lavecat" style="background:<?php  defier_cat_color($slider_data['cat_ID'][$CountSlider]); ?>"></div>
                                    <a href="<?php  echo  $slider_data['cat_link'][$CountSlider]  ; ?>">
                                    <?php  echo esc_html($slider_data['cat_name'][$CountSlider]) ?></a>
                                </div>
                            <?php endif; ?>
                            <?php if(isset($defTheme['slidertimeShow'])): ?>
                            <time class="data-label">
                                <?php defier_get_time() ?>
                            </time>
                            <?php endif; ?>
                        </figcaption>
                    </figure>
        <?php } ?>
        <?php
        if(isset($slider_data['title'][$CountSlider+1]) && [$CountSlider] > 0 )
        {?>
                <figure class="defier-slider-two effect-thumbDefier small-thumbDefier <?php if(!empty($defTheme['pointer'])): ?>pointer<?php endif; ?>">
                    <img src="<?php if(isset($slider_data['thumbnail'][$CountSlider+1])){ echo esc_url($slider_data['thumbnail'][$CountSlider+1]);} ?>" alt="<?php echo esc_html($slider_data['title'][$CountSlider+1]) ; ?>"/>
                    <figcaption>
                        <h2><a class="halfsize"  href="<?php echo esc_url($slider_data['permalink'][$CountSlider+1]) ;?>"><?php echo esc_html($slider_data['title'][$CountSlider+1]); ?></a> </h2>
                        <?php if(isset($defTheme['slidercatShow'])): ?>
                                <div class="catLabel">
                                    <div class="lavecat" style="background:<?php  defier_cat_color($slider_data['cat_ID'][$CountSlider+1]); ?>"></div>
                                    <a href="<?php  echo  $slider_data['cat_link'][$CountSlider+1]   ; ?>">
                                        <?php  echo esc_html($slider_data['cat_name'][$CountSlider+1]); ?></a>
                                </div>
                        <?php endif; ?>
                        <?php if(isset($defTheme['slidertimeShow'])): ?>
                        <time class="data-label">
                            <?php defier_get_time() ?>
                        </time>
                        <?php endif; ?>
                    </figcaption>
              </figure>
               </div>
          </div>
      <?php }   ?>
    </div>
  </div>
</div>
<?php wp_reset_query(); ?>
