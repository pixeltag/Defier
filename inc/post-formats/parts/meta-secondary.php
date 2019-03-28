<?php global $defTheme ; ?>
            <?php if(isset($defTheme['ShowPostDate'])): ?><div class="time"><?php defier_get_time() ?></div><?php endif; ?>
            <?php if(isset($defTheme['ShowRelatedPostBox']) && (function_exists('defier_PostViews'))): ?><div class="view-counter"><?php  echo defier_PostViews( '', get_the_ID() ); ?></div><?php endif; ?>
            <?php if(isset($defTheme['ShowPostViewCounter']) && (function_exists('defier_likes_button'))): ?><div class="like-counter"><?php echo defier_likes_button( get_the_ID() );?></div><?php endif; ?>
