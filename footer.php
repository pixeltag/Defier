<?php
/*************************************/
/* Footer
/*************************************/
global $defTheme;
?>

    </div><!-- #content -->
</div><!-- #page -->

   <!-- up bottom -->
<?php if(isset($defTheme['showUpButton'])): ?>
        <div class="top-container"><a class="fa fa-angle-up" href="#"></a></div>
<?php endif; ?>
        <!-- Header -->
		<!-- Header -->
			<div class="darkFooter <?php if(isset($defTheme['footerLighten'])):?>lightFooter<?php endif; ?>">
        <?php if(isset($defTheme['showFooterWidget'])): ?>
				<footer class="footer footer-black ">
					<div class="fixedwidth-container footerWrapperContent">
                <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12 defier-widget">
                 <?php
                    if(is_active_sidebar('footer-sidebar-1')){
                    dynamic_sidebar('footer-sidebar-1');
                    }     ?>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12 defier-widget">
                        <?php
                        if(is_active_sidebar('footer-sidebar-2')){
                        dynamic_sidebar('footer-sidebar-2');
                        }  ?>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12 defier-widget">
                        <?php
                        if(is_active_sidebar('footer-sidebar-3')){
                        dynamic_sidebar('footer-sidebar-3');
                        }  ?>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12 defier-widget">
                        <?php
                        if(is_active_sidebar('footer-sidebar-4')){
                        dynamic_sidebar('footer-sidebar-4');
                        }  ?>
                </div>
            </div>
				</footer>
                <?php endif; ?>
                <footer class="footer-bottom">
					              <div class="fixedwidth-container footerWrapperContent">
                          <div class="col-sm-6"><div class="copyright animated slideLeft"><div>
                              <?php if(isset($defTheme['InsertFooterText']))  echo do_shortcode($defTheme['InsertFooterText']); ?>
                              <?php wp_nav_menu( array( 'theme_location' => 'footer-menu' , 'menu_class' => 'footerMenu' ) ); ?>
                          </div></div></div>
                        <div class="col-sm-6 socialMediaWrapper">
                            <?php if(isset($defTheme['showFooterSocial'])): ?>
							     <span class="socialMediaLabel"><?php echo __( 'Digging More', 'defier' ) ?></span>
                             <ul class="foot-social animated slideRight">
                                <?php if(isset($defTheme['DefFacdbook'])): ?>
                            <li><a id="ho-facebook" href="<?php echo esc_url($defTheme['DefFacdbook']);  ?>"><i class="fa fa-facebook"></i></a></li>
                                <?php endif; ?>

                                 <?php if(isset($defTheme['DefTwitter'])): ?>
                            <li><a id="ho-twitter" href="<?php echo esc_url($defTheme['DefTwitter']);  ?>"><i class="fa fa-twitter"></i></a></li>
                                 <?php endif; ?>

                                 <?php if(isset($defTheme['DefYouttube'])): ?>
                            <li><a id="ho-youtube" href="<?php echo esc_url($defTheme['DefYouttube']);  ?>"><i class="fa fa-youtube"></i></a></li>
                                 <?php endif; ?>

                                 <?php if(isset($defTheme['DefRss'])): ?>
                            <li><a id="ho-rss" href="<?php echo esc_url($defTheme['DefRss']);  ?>"><i class="fa fa-rss"></i></a></li>
                                 <?php endif; ?>

                                 <?php if(isset($defTheme['DefInstagram'])): ?>
                                     <li><a id="ho-instagram" href="<?php echo esc_url($defTheme['DefInstagram']);  ?>"><i class="fa fa-instagram"></i></a></li>
                                 <?php endif; ?>


                                 <?php if(isset($defTheme['DefGoogleP'])): ?>
                                     <li><a id="ho-google-plus" href="<?php echo esc_url($defTheme['DefGoogleP']);  ?>"><i class="fa fa-google-plus"></i></a></li>
                                 <?php endif; ?>

                                 <?php if(isset($defTheme['DefVimeo'])): ?>
                            <li><a id="ho-vimeo" href="<?php echo esc_url($defTheme['DefVimeo']);  ?>"><i class="fa fa-vimeo-square"></i></a></li>
                                 <?php endif; ?>

                                 <?php if(isset($defTheme['DefSkype'])): ?>
                            <li><a id="ho-skype" href="<?php echo esc_url($defTheme['DefSkype']);  ?>"><i class="fa fa-skype"></i></a></li>
                                 <?php endif; ?>

                                 <?php if(isset($defTheme['DefPinterest'])): ?>
                            <li><a id="ho-pinterest" href="<?php echo esc_url($defTheme['DefPinterest']);  ?>"><i class="fa fa-pinterest"></i></a></li>
                                 <?php endif; ?>

                                 <?php if(isset($defTheme['DefLinkedin'])): ?>
                            <li><a id="ho-linkedin" href="<?php echo esc_url($defTheme['DefLinkedin']);  ?>"><i class="fa-linkedin"></i></a></li>
                                 <?php endif; ?>

                            </ul>
                            <?php endif; ?>
                        </div>
                        </div>
				              </footer>
                </div>
       </div>
</body>
<?php if(isset($defTheme['footerInclude'] ))  echo do_shortcode($defTheme['footerInclude']); ?>
<?php if(isset($defTheme['InsertgoogleAnalytics'] ))  echo do_shortcode($defTheme['InsertgoogleAnalytics']); ?>
<?php wp_footer(); ?>

</html>
