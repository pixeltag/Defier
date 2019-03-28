<?php
/* global Var */
global $defTheme;
/* global Var */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>  prefix="og: http://ogp.me/ns#">
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name='viewport' content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' />
    <link rel="profile" href="http://gmpg.org/xfn/11">

  <?php  if ( ! ( function_exists( 'has_site_icon' ) && has_site_icon() ) ) : ?>
    <?php if( isset($defTheme['defierFavicon']['url']) ): ?>
    <link rel="shortcut icon" href="<?php echo esc_html($defTheme['defierFavicon']['url']); ?>">
  <?php endif; ?>
  <?php if( isset($defTheme['defierAppleIcon']['url']) ): ?>
    <link rel="apple-touch-icon" sizes="57x57" href="<?php echo  esc_html($defTheme['defierAppleIcon']['url']); ?>" />
    <?php endif; ?>
    <?php if( isset($defTheme['defierAppleIconIP5']['url']) ): ?>
    <link rel="apple-touch-icon" sizes="120x120" href="<?php echo esc_html($defTheme['defierAppleIconIP5']['url']); ?>" />
    <?php endif; ?>
    <?php if( isset($defTheme['defierAppleIconIP']['url']) ): ?>
    <link rel="apple-touch-icon" sizes="72x72" href="<?php echo esc_html($defTheme['defierAppleIconIP']['url']); ?>" />
    <?php endif; ?>
    <?php if( isset($defTheme['defierAppleIconIP4']['url']) ): ?>
    <link rel="apple-touch-icon" sizes="114x114" href="<?php echo esc_html($defTheme['defierAppleIconIP4']['url']); ?>" />
    <?php endif; ?>
    <?php endif; ?>


    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<?php if( isset($defTheme['headerInclude']) ): ?>
    <?php echo esc_html($defTheme['headerInclude']); ?>
    <?php endif; ?>
<?php wp_head(); ?>
</head>
<body id="<?php if( $defTheme['pageLayout'] ) echo esc_html($defTheme['pageLayout']); ?>">
<div class="boxed">
<div  <?php body_class(); ?>>
    <?php
    if( isset($defTheme['headerlayout']) ) {
    switch ($defTheme['headerlayout'])  {
            case 1 :
                get_template_part( 'inc/header/header', 'v1' );
                break ;
            case 2 :
                get_template_part( 'inc/header/header', 'v2' );
                break ;
            case 3 :
                get_template_part( 'inc/header/header', 'v3' );
                break ;
        }
    } else {
        get_template_part( 'inc/header/header', 'v1' );
    }
    ?>
    <?php if (is_front_page()) : ?>
    <!-- Featured posts -->
    <?php if(isset($defTheme['sliderShowWrapper'])): ?>
    <div class="featured-wrapper dark-blue" style="background-image:url( <?php echo esc_html($defTheme['opt-select-image']) ?> );background-color:<?php echo esc_html($defTheme['sliderBg']); ?>;padding:<?php echo esc_html($defTheme['skiderWrapperPadding'])  ?>;">
        <?php
        if( isset($defTheme['Sliderlayout']) ) {
        switch ($defTheme['Sliderlayout']) {
            case 1 :
                get_template_part( '/inc/slider/featured', 'posts' );
                break ;
            case 2 :
                get_template_part('inc/slider/featured');
                break ;
            case 3 :
                get_template_part( '/inc/slider/featured', 'carus' );
                break ;
            default :
                get_template_part( '/inc/slider/featured', 'posts' );
                break ;
        }
            } else {
                    get_template_part( '/inc/slider/featured', 'posts' );
                } ?>
    </div>
<?php endif; ?>
<?php endif; ?>
<!-- end Header -->
