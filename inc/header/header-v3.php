<?php
global $defTheme;
?>
     <!-- Topbar -->
     <div class="col-lg-12 nopadding">
         <div class="topHeaderAds container">
             <?php dynamic_sidebar('header-ads'); ?>
         </div>
     </div>
<?php if(isset($defTheme['showTopBar'])): ?>
<div class="stam-topbar">
    <div class="fixedwidth-container">
        <div class="col-lg-12 nopadding">
            <?php if(isset($defTheme['showContactHeader'])): ?>
            <div class="col-md-6 col-sm-6 col-xs-12">
                <ul class="corpr-contact">
                <?php if(isset($defTheme['contactEmail'])): ?>
                   <li>
                       <i class="fa fa-envelope"></i>
                       <span>
                           <?php echo esc_html($defTheme['contactEmail']); ?>
                       </span>
                   </li>
                   <?php endif; ?>
                   <?php if(isset($defTheme['contactphone'])): ?>
                    <li>
                        <i class="fa fa-phone"></i>
                       <span>
                           <?php echo esc_html($defTheme['contactphone']); ?>
                       </span>
                    </li>
                    <?php endif; ?>
                </ul>
            </div>
            <?php endif; ?>
            <div class="col-md-6 col-sm-6 col-xs-12">
                <?php if(isset($defTheme['showSocialMedia'])): ?>
                    <ul class="stam-social">
                    <?php if(isset($defTheme['DefFacdbook'])): ?>
                        <li><a id="ho-facebook" href="<?php echo esc_html($defTheme['DefFacdbook']);  ?>"><i class="fa fa-facebook"></i></a></li>
                    <?php endif; ?>
                    <?php if(isset($defTheme['DefTwitter'])): ?>
                        <li><a id="ho-twitter" href="<?php echo esc_html($defTheme['DefTwitter']);  ?>"><i class="fa fa-twitter"></i></a></li>
                    <?php endif; ?>
                    <?php if(isset($defTheme['DefYouttube'])): ?>
                        <li><a id="ho-youtube" href="<?php echo esc_html($defTheme['DefYouttube']);  ?>"><i class="fa fa-youtube"></i></a></li>
                    <?php endif; ?>
                    <?php if(isset($defTheme['DefRss'])): ?>
                        <li><a id="ho-rss" href="<?php echo esc_html($defTheme['DefRss']);  ?>"><i class="fa fa-rss"></i></a></li>
                    <?php endif; ?>
                    <?php if(isset($defTheme['DefVimeo'])): ?>
                        <li><a id="ho-vimeo" href="<?php echo esc_html($defTheme['DefVimeo']);  ?>"><i class="fa fa-vimeo-square"></i></a></li>
                    <?php endif; ?>
                    <?php if(isset($defTheme['DefSkype'])): ?>
                        <li><a id="ho-skype" href="<?php echo esc_html($defTheme['DefSkype']);  ?>"><i class="fa fa-skype"></i></a></li>
                    <?php endif; ?>
                    <?php if(isset($defTheme['DefInstagram'])): ?>
                        <li><a id="ho-instagram" href="<?php echo esc_html($defTheme['DefInstagram']);  ?>"><i class="fa fa-instagram"></i></a></li>
                    <?php endif; ?>
                    <?php if(isset($defTheme['DefGoogleP'])): ?>
                        <li><a id="ho-google-plus" href="<?php echo esc_html($defTheme['DefGoogleP']);  ?>"><i class="fa fa-google-plus"></i></a></li>
                    <?php endif; ?>
                    <?php if(isset($defTheme['DefPinterest'])): ?>
                        <li><a id="ho-pinterest" href="<?php echo esc_html($defTheme['DefPinterest']);  ?>"><i class="fa fa-pinterest"></i></a></li>
                    <?php endif; ?>
                    <?php if(isset($defTheme['DefLinkedin'])): ?>
                        <li><a id="ho-linkedin" href="<?php echo esc_html($defTheme['DefLinkedin']);  ?>"><i class="fa-linkedin"></i></a></li>
                    <?php endif; ?>
                </ul>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
<?php endif; ?>
                 <!-- Topbar -->
                 <!-- Header -->
<div class="headerBg headerV3">
<div class="fixedwidth-container">
                    <header>
                        <!---  logo -->
                        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6">
                            <!-- logo Images -->
                            <h2 id="logo" style="margin-top: <?php echo esc_html($defTheme['headerMargin']); ?>px">
                                <?php if(!empty($defTheme['logoImg']['url']))  :  ?>
                                    <a href="<?php echo esc_url( home_url( '/' ) ); ?>"
                                       title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
                                        <?php if(!empty($defTheme['logoImg']['url'])) : ?>
                                            <img src="<?php echo esc_html($defTheme['logoImg']['url']); ?>"
                                                 alt="<?php echo get_bloginfo( 'name', 'display' ); ?>">
                                        <?php endif; ?>
                                    </a>
                                <?php else : ?>
                                    <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
                                <?php endif; ?>
                            </h2>
                            <!-- logo Images -->
                        </div>
                        <!--  logo -->
                        <!--  Main Navigation -->
                        <div class="mainNavigation col-lg-8 col-md-8 col-sm-8 col-xs-0 nopadding">
                            <nav id="navwrap" class="main-navigation <?php if($defTheme['menuDarken']): ?>darkMenu<?php endif; ?>">
                                  <?php
                                  if ( has_nav_menu( 'primary' ) ) {
                                  wp_nav_menu( array(
                                      'theme_location' => 'primary',
                                      'walker' => new defier_menu_walker()
                                  ) );
                                }
                                 ?>
                            </nav>
                        </div>
                        <!--  Main Navigation -->
                        <!--  search -->
                        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6">
                           <?php if(isset($defTheme['showSlidingMenu'])): ?>
                            <div id="slidingWidget">
                                <div class="slidingMenu">
                                    <a id="slideMenuButton"><i class="fa-menu"></i></a>
                                </div>
                                <div class="slideMenuWrapper">
                                    <div class="slidMenu">
                                        <!-- sliding Nav -->
                                        <?php if(isset($defTheme['showTopNav'])): ?>
                                            <div class="col-md-12 nopadding">
                                                <?php
                                                if ( has_nav_menu( 'sliding' ) ) {
                                                 wp_nav_menu( array( 'theme_location' => 'sliding' , 'menu_class' => 'TopbarMenu' ) );
                                               }
                                               ?>
                                            </div>
                                        <?php endif; ?>
                                        <!-- sliding Widget -->
                                        <div class="col-md-12 nopadding">
                                                <?php dynamic_sidebar('sliding-menu'); ?>
                                        </div>
                                    </div>
                                    <div class="closeSlidingMenu"><i class="fa-cross"></i></div>
                                    <div class="bgMenuSliding"></div>
                                    <div class="backWrapperMenu"></div>
                                </div>
                            </div>
                            <?php endif; ?>
                            <!-- Mobile Menu -->
                            <div id="mobileMenu">
                                <div class="slidingMenu">
                                    <a id="mobileMenuButton"><i class="fa-menu"></i></a>
                                </div>
                                <div class="slideMenuWrapper" >
                                    <div class="slidMenu slidMenu2" id="slidMenu2">
                                        <?php
                                        if ( has_nav_menu( 'sliding' ) ) {
                                        wp_nav_menu( array( 'theme_location' => 'primary', 'menu_class' => 'nav-menu-resp' ) );
                                      } ?>
                                    </div>
                                    <div class="closeSlidingMenu" id="closeMobileMenu"></div>
                                    <div class="bgMenuSliding"></div>
                                    <div class="backWrapperMenu" id="backWrapperMobile"></div>
                                </div>
                            </div>
                            <!-- Mobile Menu -->
                            <!-- Search Form -->
                            <?php if($defTheme['showSearch']): ?>
                                <div class="searchForm">
                                    <div class="searchOpen"><i class="fa-search2"></i></div>
                                    <div class="searchWrapper" >
                                        <div class="searchclose"><i class="fa-cross"></i></div>
                                        <div class="wrapperContentSearch">
                                            <h3><?php echo __( 'Search for content, post, videos', 'defier' ) ?></h3>
                                            <form role="search" method="get" class="search-form" action="<?php echo home_url( '/' ); ?>">
                                                <input type="search" class="search-field" placeholder="<?php echo __( 'Type right here to find out', 'defier' ) ?>" value="<?php echo get_search_query() ?>" name="s" title="<?php echo __( 'Search for:', 'defier' ) ?>" />
                                            </form>
                                            <span><?php echo __( 'Hit Enter to get results', 'defier' ) ?></span>
                                        </div>
                                    </div>
                                </div>
                            <?php endif; ?>
                            <!-- Search Form -->

                                <!-- Social Media Sharing -->
                                 <?php if(isset($defTheme['showSocialMedia'])): ?>
                                    <div id="socialMediaList">
                                        <ul>
                                      <li>
                                        <i  class="fa-share2 dropbtn" aria-hidden="true" ></i>
                                     <ul class="stam-social" id="myDropdown">
                                            <?php if(isset($defTheme['DefFacdbook'])): ?>
                                                <li><a id="ho-facebook" href="<?php echo esc_html($defTheme['DefFacdbook']);  ?>"><i class="fa fa-facebook"></i>
                                                <span><?php echo do_shortcode( 'Facebook', 'defier' ) ?></span></a></li>
                                            <?php endif; ?>

                                            <?php if(isset($defTheme['DefTwitter'])): ?>
                                                <li><a id="ho-twitter" href="<?php echo esc_html($defTheme['DefTwitter']);  ?>"><i class="fa fa-twitter"></i>
                                                <span><?php echo do_shortcode( 'Twitter', 'defier' ) ?></span></a></li>
                                            <?php endif; ?>

                                            <?php if(isset($defTheme['DefYouttube'])): ?>
                                                <li><a id="ho-youtube" href="<?php echo esc_html($defTheme['DefYouttube']);  ?>"><i class="fa fa-youtube"></i>
                                                <span><?php echo __( 'Youtube', 'defier' ) ?></span></a></li>
                                            <?php endif; ?>

                                            <?php if(isset($defTheme['DefRss'])): ?>
                                                <li><a id="ho-rss" href="<?php echo esc_html($defTheme['DefRss']);  ?>"><i class="fa fa-rss"></i>
                                                <span><?php echo __( 'Rss Feed', 'defier' ) ?></span></a></li>
                                            <?php endif; ?>

                                            <?php if(isset($defTheme['DefVimeo'])): ?>
                                                <li><a id="ho-vimeo" href="<?php echo esc_html($defTheme['DefVimeo']);  ?>"><i class="fa fa-vimeo-square"></i>
                                                <span><?php echo __( 'Vimeo', 'defier' ) ?></span></a></li>
                                            <?php endif; ?>

                                            <?php if(isset($defTheme['DefSkype'])): ?>
                                                <li><a id="ho-skype" href="<?php echo esc_html($defTheme['DefSkype']);  ?>"><i class="fa fa-skype"></i>
                                                <span><?php echo __( 'Skype', 'defier' ) ?></span></a></li>
                                            <?php endif; ?>

                                            <?php if(isset($defTheme['DefInstagram'])): ?>
                                                <li><a id="ho-instagram" href="<?php echo esc_html($defTheme['DefInstagram']);  ?>"><i class="fa fa-instagram"></i>
                                                <span><?php echo __( 'Instagram', 'defier' ) ?></span></a></li>
                                            <?php endif; ?>


                                            <?php if(isset($defTheme['DefGoogleP'])): ?>
                                                <li><a id="ho-google-plus" href="<?php echo esc_html($defTheme['DefGoogleP']);  ?>"><i class="fa fa-google-plus"></i>
                                                <span><?php echo __( 'Google+', 'defier' ) ?></span></a></li>
                                            <?php endif; ?>


                                            <?php if(isset($defTheme['DefPinterest'])): ?>
                                                <li><a id="ho-pinterest" href="<?php echo esc_html($defTheme['DefPinterest']);  ?>"><i class="fa fa-pinterest"></i>
                                                <span><?php echo __( 'Pinterest', 'defier' ) ?></span></a></li>
                                            <?php endif; ?>

                                            <?php if(isset($defTheme['DefLinkedin'])): ?>
                                                <li><a id="ho-linkedin" href="<?php echo esc_html($defTheme['DefLinkedin']);  ?>"><i class="fa-linkedin"></i>
                                                <span><?php echo __( 'LinkedIn', 'defier' ) ?></span></a></li>
                                            <?php endif; ?>

                                         </ul>
                                 </li>
                             </ul>
                          </div>
                                <?php endif; ?>
                        <!-- Social Media Sharing -->
                        </div>
                     </header>
</div>
</div>
                     <!-- Header -->
