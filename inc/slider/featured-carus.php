<!-- Start of Carousel section -->
<?php global $defTheme; ?>
<section class="highlights Carousel sliderCarousel">
    <?php $RandToken = md5(microtime().rand(1111111111 , 9999999999)) ; ?>
    <?php $sliderSpeed = $defTheme['defierSlideSpeed']; ?>
    <?php
    echo "  <script type='text/javascript'>jQuery(document).ready(function(){var a='false',a='ar'==jQuery('html').attr('lang');jQuery('.SliderCaurasel_".$RandToken."').slick({infinite:!0,autoplay:!0,autoplaySpeed:4000,slidesToShow:4,rtl:a,slidesToScroll:4,responsive:[{breakpoint:1024,settings:{slidesToShow:2,slidesToScroll:2,infinite:!0,}},{breakpoint:600,settings:{slidesToShow:2,slidesToScroll:2}},{breakpoint:480,settings:{slidesToShow:1,slidesToScroll:1}}]})})</script>"; ?>
<div id="SliderCaurasel" class="SliderCaurasel_<?php  echo  $RandToken ;?>"  data-slick='{"arrows":<?php if(isset($defTheme['ShowArrowSlider'])):  ?>true<?php else: ?>false<?php endif; ?>,"speed":<?php echo do_shortcode($defTheme['defierSlideSpeed']); ?>,"dots":<?php if(isset($defTheme['ShowDotsSlider'])):  ?>true<?php else: ?>false<?php endif; ?>}'>
<?php
$args = array(
    'post_type' => 'post',
    'order' => 'DESC'
);
// The Query
$the_query = new WP_Query( $args );
if($the_query->have_posts()) {
    $count_slider = 0 ;
    while ($the_query->have_posts()) {
          $the_query->the_post();
          $featured = get_post_meta($post->ID, 'defier_featured_checkbox', true);
          $CountCat = 0 ;
		      $content  = get_the_content();
          $content  = wp_trim_words( $content, 20, '<a href="'. get_permalink() .'"><i class="fa-ellipsis" aria-hidden="true"></i>'. __( 'Read More', 'defier' ) .' </a>' );
          foreach((get_the_category()) as $cat)
           {if ($CountCat == 0){$CatName  =  $cat->cat_name ; $CatID  =  $cat->cat_ID ; }}
              if($featured == "on")
               { ?>
                  <div>
                  <div class="grid">
                  <figure class="effect-thumbDefier  CarouselWarpper <?php if(!empty($defTheme['pointer'])): ?>pointer<?php endif; ?>"">
                      <img alt="<?php the_title(); ?>" src="<?php echo  wp_get_attachment_url( get_post_thumbnail_id($post->ID) );?>"/>
                      <figcaption>
                          <h2><a href="<?php esc_url(the_permalink()) ?>"><?php the_title(); ?></a> </h2>
                            <?php if(isset($defTheme['slidercatShow'])): ?>
                         <div class="catLabel">
                            <div class="lavecat" style="background:<?php  defier_cat_color((int)$CatID); ?>"></div>
                            <a href="<?php echo get_category_link((int)$CatID); ?>">
                            <?php  echo do_shortcode($CatName); ?></a>
                        </div>
                 <?php endif; ?>
      							<div class="meta-label">
      							   <?php if(isset($defTheme['slidertimeShow'])): ?>
      									   <div class="pull-left">
      												<div class="time"><?php defier_get_time() ?></div>
      												<?php endif; ?>
      												<?php if(isset($defTheme['sliderpostView'])): ?>
      												<div class="view-counter"><?php  echo defier_PostViews( '', get_the_ID() ); ?></div>
      												<?php endif; ?>
      												<?php if(isset($defTheme['sliderloveShow'])): ?>
      												<div class="like-counter"><?php echo defier_likes_button( get_the_ID() );?></div>
      												<?php endif; ?>
      									   </div>
      							   </div>
							<?php  if(isset($defTheme['sliderDescShow'])): ?>
                  <p><?php  echo  $content ;  ?></p>
							<?php  endif; ?>
                            </figcaption>
                          </figure>
                        </div>
                    </div>
                     <?php
                          $sliderItemNum =  $defTheme['OwlSliderItemNum'];
                         if($count_slider ==  $sliderItemNum -1 ){
                          break;}
                         $count_slider ++ ;
                     }
                    }
                  }
                  ?>
</div>
</section>
