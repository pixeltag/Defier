<?php
/* global Var */
global $defTheme;
/*  Login Form  */
function defier_login_form( $login_only  = 0 ) {
	global $user_ID, $user_identity, $user_level;

	if ( $user_ID ) : ?>
		<?php if( empty( $login_only ) ): ?>
		<div id="user-login">
			<span class="author-avatar"><?php echo get_avatar( $user_ID, $size = '85'); ?></span>
			<h2 class="welcome-text"><?php _e( 'Welcome' , 'defier' ) ?> <strong><?php echo esc_html($user_identity) ?></strong>.</h2>
			<ul class="user-login-links">
				<?php
					$id = get_current_user_id();
				?>
				<li><a href="<?php echo get_edit_profile_url($id); ?>"><i class="enotype-icon-vcard"></i><?php _e( 'Your Profile' , 'defier' ) ?> </a></li>
				<li><a href="<?php echo wp_logout_url(); ?>"><i class="enotype-icon-logout"></i><?php _e( 'Logout' , 'defier' ) ?> </a></li>
			</ul>
			<div class="clear"></div>

			<div class="clear"></div>
		</div>
		<?php endif; ?>
	<?php else: ?>
		<div class="login-widget">
	        <form action="<?php echo home_url() ?>/wp-login.php" method="post">

	            <div class="login-input-wrap login-user-wrap">
                           <div class="group">
                            <input type="text" class="login-user" name="log" id="log" value="<?php _e( 'Username' , 'defier' ) ?>" onfocus="if (this.value == '<?php _e( 'Username' , 'defier' ) ?>') {this.value = '';}" onblur="if (this.value == '') {this.value = '<?php _e( 'Username' , 'defier' ) ?>';}">
                              <span class="bar"></span>
                              <label><?php _e( 'Username' , 'defier' ) ?></label>
                            </div>



              </div>
	            <div class="login-input-wrap login-pwd-wrap">
                <div class="group">
                      <input type="password" class="login-pwd" name="pwd" id="pwd" value="<?php _e( 'Password' , 'defier' ) ?>" onfocus="if (this.value == '<?php _e( 'Password' , 'defier' ) ?>') {this.value = '';}" onblur="if (this.value == '') {this.value = '<?php _e( 'Password' , 'defier' ) ?>';}">
                              <span class="bar"></span>
                              <label><?php _e( 'Password' , 'defier' ) ?></label>
                            </div>
              </div>
              <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12 nopadding">
              <div class="checkbox ">
	            <label for="rememberme">
                <input class="rememberme" name="rememberme"  type="checkbox" checked="checked" value="forever">
                <?php _e( 'Remember Me' , 'defier' ) ?>
              </label>
              </div>
              </div>
	            <input type="submit" class="login-button col-md-12 col-lg-12 col-sm-12 col-xs-12" name="submit" value="<?php _e( 'login' , 'defier' ) ?>">
              <ul class="login-links col-md-12 col-lg-12 col-sm-12 col-xs-12 nopadding">
                <?php if ( get_option('users_can_register') ) : ?> <li><a href="<?php echo home_url() ?>/wp-register.php"><?php _e( 'Register' , 'defier' ) ?></a></li><?php endif; ?>
                  <li><a href="<?php echo home_url() ?>/wp-login.php?action=lostpassword"><?php _e( 'Lost your password?' , 'defier' ) ?></a></li>
              </ul>


              <input type="hidden" name="redirect_to" value="<?php echo esc_url($_SERVER['REQUEST_URI']); ?>"/>
	        </form>

	    </div>
	<?php endif;
}

	add_action( 'wp_login_failed', 'defier_login_fail' );  // hook failed login


function defier_login_fail( $username ) {
   $referrer = $_SERVER['HTTP_REFERER'];  // where did the post submission come from?
   // if there's a valid referrer, and it's not the default log-in screen
   if ( !empty($referrer) && !strstr($referrer,'wp-login') && !strstr($referrer,'wp-admin') ) {
      wp_redirect( $referrer . '?login=failed' );  // let's append some information (login=failed) to the URL for the theme to use
      exit;
   }
}





/******************************************************************
 * Get the post time
 *****************************************************************/
function defier_get_time( $return = false ){
    global $post ;

        $to = current_time('timestamp'); //time();
        $from = get_the_time('U') ;

        $diff = (int) abs($to - $from);
        if ($diff <= 3600) {
            $mins = round($diff / 60);
            if ($mins <= 1) {
                $mins = 1;
            }
            $since = sprintf(do_shortcode('%s min', '%s mins', $mins), $mins) .' '. do_shortcode( 'ago', 'defier' );
        }
        else if (($diff <= 86400) && ($diff > 3600)) {
            $hours = round($diff / 3600);
            if ($hours <= 1) {
                $hours = 1;
            }
            $since = sprintf(do_shortcode('%s hour', '%s hours', $hours), $hours) .' '. do_shortcode( 'ago', 'defier' );
        }
        elseif ($diff >= 86400) {
            $days = round($diff / 86400);
            if ($days <= 1) {
                $days = 1;
                $since = sprintf(do_shortcode('%s day', '%s days', $days), $days) .' '. do_shortcode( 'ago', 'defier' );
            }
            elseif( $days > 29){
                $since = get_the_time(get_option('date_format'));
            }
            else{
                $since = sprintf(do_shortcode('%s day', '%s days', $days), $days) .' '. do_shortcode( 'ago', 'defier' );
            }
        }


    $post_time = '<i class="fa-clock"></i>'.$since;

    if( $return )
        return $post_time;
    else
        echo do_shortcode($post_time);
}




/******************************************************************
 * Get posts from Category
 *****************************************************************/

function defier_posts_cat($numberOfPosts = 5 , $thumb = true , $cats = 1){
	global $post;
	$orig_post = $post;

	$lastPosts = get_posts('category='.$cats.'&suppress_filters=0&no_found_rows=1&numberposts='.$numberOfPosts);
	foreach($lastPosts as $post): setup_postdata($post);
?>
<li>
    <i class="fa fa-circle" aria-hidden="true"></i>
	<h3><a href="<?php the_permalink(); ?>"><?php the_title();?></a></h3>
    <div class="time"><?php defier_get_time() ?></div>
</li>
<?php endforeach;
	$post = $orig_post;
}




/******************************************************************
 * Body Style
 *****************************************************************/
function defier_body_style() {
    global $defTheme;
    $backgroundColor = $defTheme["bodyBackground"]["background-color"];
    $backgroundImage = $defTheme["bodyBackground"]["background-image"];
    $backgroundRepeat= $defTheme["bodyBackground"]["background-repeat"];
    $backgroundPosition = $defTheme["bodyBackground"]["background-position"];
    $backgroundSize = $defTheme["bodyBackground"]["background-size"];
    $backgroundAttachment = $defTheme["bodyBackground"]["background-attachment"];

    $custom_css = "
                body {
                        background-color: {$backgroundColor};
                        background-image: url({$backgroundImage});
                        background-repeat: {$backgroundRepeat};
                        background-position:{$backgroundPosition};
                        background-size : {$backgroundSize};
                        background-attachment : {$backgroundAttachment};
                }";
    wp_add_inline_style( 'custom-style', $custom_css );
}
add_action( 'wp_enqueue_scripts', 'defier_body_style' );

/******************************************************************
 * Remove jQuery migration
 *****************************************************************/
 add_action( 'wp_default_scripts', function( $scripts ) {
     if ( ! empty( $scripts->registered['jquery'] ) ) {
         $jquery_dependencies = $scripts->registered['jquery']->deps;
         $scripts->registered['jquery']->deps = array_diff( $jquery_dependencies, array( 'jquery-migrate' ) );
     }
 } );
