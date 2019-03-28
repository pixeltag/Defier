    <!-- meta row -->
     <?php  global $defTheme ?>
    <div class="meta-first-row">
    <?php if(isset($defTheme['ShowAuthorLabel'])): ?>
        <div class="col-md-4 col-xs-12 pull-left">
            <div class="byAuthor">
                    <?php echo get_avatar( get_the_author_meta( 'ID' ), 32 ); ?>
                    <span><?php _e( 'Wrote by:', 'defier' ) ?>    <?php echo the_author_link(); ?> </span>
            </div>

        </div>
        <?php endif; ?>
        <div class="col-md-8 col-xs-12 pull-right">
            <div class="inCategories">
               <?php defier_magazine_blog_entry_footer(); ?>
            </div>
        </div>
    </div>