<?php
$share_box_class= "mini-share-post";
if( is_singular() && empty( $page_builder_id )  ) $share_box_class = "share-post";

$post_link	= esc_url( get_permalink() );
$post_title = wp_strip_all_tags( get_the_title() );
$protocol	= is_ssl() ? 'https' : 'http';

?>
<div class="<?php echo esc_html( $share_box_class ); ?>">


    <?php $post_title = htmlspecialchars(urlencode(html_entity_decode( $post_title, ENT_COMPAT, 'UTF-8')), ENT_COMPAT, 'UTF-8'); ?>
    <ul class="share-post-social">
    <span class="share-text"><?php echo do_shortcode( 'Share' );?></span>
        <li><a href="http://www.facebook.com/sharer.php?u=<?php echo esc_html($post_link); ?>" class="social-facebook" rel="external" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;" target="_blank"><i class="fa fa-facebook"></i> <span><?php  echo do_shortcode( 'Facebook' );?></span></a></li>
        <li><a href="https://twitter.com/intent/tweet?text=<?php echo esc_html($post_title); ?>   &url=<?php echo esc_html($post_link); ?>"  onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;" class="social-twitter" rel="external" target="_blank"><i class="fa fa-twitter"></i> <span><?php  echo do_shortcode( 'Twitter' );?></span></a></li>
        <li><a href="https://plusone.google.com/_/+1/confirm?hl=en&amp;url=<?php echo esc_html($post_link); ?>&amp;name=<?php echo esc_html($post_title); ?>" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;" class="social-google-plus" rel="external" target="_blank"><i class="fa fa-google-plus"></i> <span><?php  echo do_shortcode( 'Google +' );?></span></a></li>
        <li><a href="http://www.stumbleupon.com/submit?url=<?php echo esc_html($post_link); ?>&title=<?php echo esc_html($post_title);?>" class="social-stumble" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;" rel="external" target="_blank"><i class="fa fa-stumbleupon"></i> <span><?php  echo do_shortcode( 'Stumbleupon' );?></span></a></li>
        <li><a href="http://www.linkedin.com/shareArticle?mini=true&url=<?php echo esc_html($post_link); ?>&title=<?php echo esc_html($post_title); ?>" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;" class="social-linkedin" rel="external" target="_blank"><i class="fa-linkedin"></i> <span><?php  echo do_shortcode( 'LinkedIn' );?></span></a></li>
        <li><a href="http://pinterest.com/pin/create/button/?url=<?php echo esc_html($post_link); ?>&amp;description=<?php echo esc_html($post_title); ?>&amp;" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;" class="social-pinterest" rel="external" target="_blank"><i class="fa fa-pinterest"></i> <span><?php  echo do_shortcode( 'Pinterest' );?></span></a></li>
    </ul>
    <div class="clear"></div>
</div> <!-- .share-post -->
