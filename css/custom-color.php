<?php
//make php work in css
$absolute_path = explode('wp-content', $_SERVER['SCRIPT_FILENAME']);
$wp_load = $absolute_path[0] . 'wp-load.php';
require_once($wp_load);
header('Content-type: text/css');
header('Cache-control: must-revalidate');
//make php work in css
//convert php to style file
header("Content-type: text/css; charset: UTF-8");
//convert php to style file
//color Varabile
global $defTheme;
$color_main1 = $defTheme["main_color_one"];
$color_main2 = $defTheme["main_color_two"];
$color_main3 = $defTheme["main_color_three"];
$color_main4 = $defTheme["main_color_four"];
$color_main5 = $defTheme["main_color_five"];
$color_main6 = $defTheme["main_color_six"];
$color_main7 = $defTheme["main_color_seven"];
$color_main8 = $defTheme["main_color_eight"];
$color_main9 = $defTheme["main_color_nine"];

?>

.headerBg-dark {
background-color: <?php echo $color_main1; ?>;
}



@charset "UTF-8";

body {
font: <?php echo $defTheme['defierffamily']['font-style'];
            echo $defTheme['defierffamily']['font-size'];
            echo $defTheme['defierffamily']['font-family'];

?>;
color: <?php echo $defTheme['defierffamily']['color']; ?>;
background: <?php echo $color_main1; ?>;
}

a color: <?php echo $color_main5; ?>; }

#header-wrapper {
background: #fff; }

.seachform {
background: none repeat scroll 0 0 <?php echo $color_main1; ?>;
}

.carticon {
background: none repeat scroll 0 0 <?php echo $color_main1; ?>;
}
.overlay {
background-color: <?php echo $color_main2; ?> !important;
opacity: 0.80;
}
.stam-topbar {
background: <?php echo $color_main1; ?>;
}

.headerBg {
background: none repeat scroll 0 0 #fff;
}


.header-info {
color: <?php echo $color_main3; ?>;
}
.header-info i {
color: <?php echo $color_main3; ?>; }
.header-info a {
color: <?php echo $color_main3; ?>; }


ul.stam-social {
color: <?php echo $color_main4; ?>; }
ul.stam-social li {
}
ul.stam-social li a {
color: <?php echo $color_main4; ?>; }

#ho-facebook:hover {
color: #597ac7; }

#ho-twitter:hover {
color: #5bbcec; }

#ho-youtube:hover {
color: #fd3832; }

#ho-rss:hover {
color: #fbc95d; }

#ho-vimeo:hover {
color: #7fdde8; }

#ho-skype:hover {
color: #09c6ff; }

#ho-pinterest:hover {
color: #ff3635; }

#ho-linkedin:hover {
color: #90c9dc; }

/*******************************************  CSS Header V3 *********************************************/

.headerBg-dark {
background: <?php echo $color_main5; ?>;
}


ul.follow-menu li ul li {
border-bottom: 1px dotted <?php echo $color_main7; ?>; }

#facebook {
color: #3b5999; }

#twitter {
color: #02bbf4; }

#google {
color: #fe4200; }

#instagram {
color: #3c5a76; }

#youtube {
color: #fd0100; }

#rss {
color: #f7a42c; }

ul.follow-menu li ul li:hover {
color: <?php echo $color_main8; ?>; }

/*******************************************  CSS Header V3 *********************************************/
/*******************************************  CSS Header V2 *********************************************/
.white .fa-bars {
color: <?php echo $color_main5; ?>; }
.white ul.stam-social li a {
color: #fff !important; }
.white ul.stam-social li a:hover {
color: <?php echo $color_main1; ?> !important; }
.white ul li a {
color: <?php echo $color_main8; ?>;
}
.white ul li i {
color: <?php echo $color_main5; ?>; }
.white ul ul li:hover, .white ul ul li:active {
background: #f7f7f7;
color: <?php echo $color_main2; ?>; }
.white ul li:hover, .white ul li:active {
color: <?php echo $color_main2; ?>; }

/*******************************************  CSS Header V3 *********************************************/
.blue {
background: <?php echo $color_main2; ?>;
}
.blue ul.stam-social li a:hover {
color: <?php echo $color_main1; ?> !important; }





.blue ul ul {
background: <?php echo $color_main6; ?>; }
.blue ul ul li {
border-top: 1px solid <?php echo $color_main6; ?>; }

.blue ul li:hover, .blue ul li:active {
background: <?php echo $color_main6; ?>;
color: <?php echo $color_main5; ?>; }

/*******************************************  CSS Header V3 *********************************************/

.TopbarMenu li a {
color: <?php echo $color_main3; ?>; }
.TopbarMenu li a:hover {
color: <?php echo $color_main2; ?>; }

.author-bio .author-info h3 {
color: <?php echo $color_main5; ?>; }
.author-bio .author-info h3 a {
color: <?php echo $color_main8; ?>; }
.author-bio .author-info .author-description {
color: #6d7683;
}

.author-bio .author-info .aut-website i {
color: <?php echo $color_main5; ?>;
}
.author-bio .author-info .aut-website a {
color: <?php echo $color_main5; ?>; }


.search_form a {
background: none repeat scroll 0 0 <?php echo $color_main2; ?>;;
}
.search_form a:hover, .search_form a:focus {
background: none repeat scroll 0 0 #043a4a;
}

.search_input {
background: none repeat scroll 0 0 #0886ac;
}

.search_input:before {
border-color: transparent transparent #0886ac;
}



/************************ social media icon shape ************************/
.square-icon li {
background: none repeat scroll 0 0 #4b4b4b;
}
.square-icon li a {
color: #edeeee;
}
.square-icon li:hover {
background: none repeat scroll 0 0 #585858;
}

.color-social-circle li {
background: none repeat scroll 0 0 #4b4b4b;
}
.color-social-circle li a {
color: #fff; }
.color-social-circle li:hover {
background: none repeat scroll 0 0 #585858;
}


.color-social-icon li {
background: none repeat scroll 0 0 #4b4b4b;
}
.color-social-icon li a {
color: #fff; }
.color-social-icon li:hover {
background: none repeat scroll 0 0 #585858;
}

#facebook-color {
background: #597ac7; }

#twitter-color {
background: #5bbcec; }

#google-color {
background: #597ac7; }

#youtube-color {
background: #fd3832; }

#vimeo-color {
background: #7fdde8; }

#rss-color {
background: #fbc95d; }

#skype-color {
background: #09c6ff; }

#pinterest-color {
background: #ff3635; }

#linkedin-color {
background: #90c9dc; }

/************************ social media icon shape ************************/


.submitfoorer {
background: none repeat scroll 0 0 #42aae0;
box-shadow: 0 4px 0 0 #2581bc;
}

.submitfoorer:hover {
background: none repeat scroll 0 0 #3c9bcc;
box-shadow: 0 4px 0 0 #247cb5;
}

/******************************************* CSS Footer *********************************************/

.top-container a:hover {
background: <?php echo $color_main5; ?>; }


footer .defier-cat-title {
border-bottom: 2px solid <?php echo $color_main5; ?>;
}


footer .widget ul li {
border-bottom: 1px solid <?php echo $color_main9; ?>;
color: <?php echo $color_main6; ?>; }
footer .widget ul li a:hover, footer .widget ul li a:focus, footer .widget ul li a:active {
color: <?php echo $color_main4; ?>;
}




footer .widget ul li .content time {
color: white; }
footer .twitter-widget ul li:before {
content: '\f099';
display: block;
color: #09abdc;
float: left;
font-family: FontAwesome;
font-size: 30px;
margin-right: 10px; }
footer .twitter-widget .follow {
background: none repeat scroll 0 0 #09abdc;
border: medium none;
border-radius: 2px;
color: #fff;
cursor: pointer;
display: inline-block;
font-size: 12px;
margin: 5px 0 0 5px;
padding: 5px 15px; }

.footer-bottom {
background: none repeat scroll 0 0 #2f2f2f;
border-top: 1px solid #626262;
color: #ecf0f1;
}


.stam-list-menu li a:hover {
color: <?php echo $color_main5; ?>;
}



/************************ footer dark ************************/
.footer-black {
background: <?php echo $color_main2; ?>;
color: <?php echo $color_main1; ?>;; }
.footer-black h4 {
color: #fff; }

.footer-black .defier-widget-row {
border-bottom: 1px solid <?php echo $color_main5; ?>;
}

.footer-black .footer-item-content h5 {
color: #d7d7d7; }

/************************ footer dark ************************/
/************************ footer white ************************/
.footer-white {
background: #f7f7f7; }
.footer-white div h4 {
color: <?php echo $color_main2; ?>; }
.footer-white div p {
color: <?php echo $color_main3; ?>; }
.footer-white ul a {
color: <?php echo $color_main3; ?>; }

.footer-bottom-white {
background: none repeat scroll 0 0 #fff;
}

.circle-icon li {
background: none repeat scroll 0 0 #f7f7f7;
}

/************************ footer white ************************/
/************************ social media icon shape ************************/


.circle-border {
background: url("../../images/cir.png") repeat-x scroll 0 0 <?php echo $color_main2; ?>;
height: 20px; }

.tringle-border {
background: url("../../images/tri.png") repeat-x scroll 0 0 <?php echo $color_main2; ?>;
height: 20px; }

.more-link {
background: none repeat scroll 0 0 <?php echo $color_main6; ?>;
color: <?php echo $color_main3; ?>;;
}

#post-nav {
background: none repeat scroll 0 0 #fff;
box-shadow: 0 0 5px 0 #dadada;
}

#post-nav .post-previous .previous {
color: <?php echo $color_main3; ?>;
}
#post-nav .post-next .next {
color: <?php echo $color_main3; ?>;
}
#post-nav h4 a {
color: <?php echo $color_main8; ?>;
}

.entry-footer {
border-top: 1px solid <?php echo $color_main1; ?>;
}
.entry-header p, .entry-content p {
color: <?php echo $color_main3; ?>;;
}
.entry-header h1 a, .entry-content h1 a {
color: <?php echo $color_main5; ?>; }

.format-audio, .format-gallery, .format-quote, .format-status, .format-video, .format-link, .format-image, .format-aside, .format-chat, .type-attachment, .format-standard {
background: none repeat scroll 0 0 #fff;
box-shadow: 0 0 5px 0 #dadada; }

/************************ content post format  ************************/
/************************ ┘ìSidebar  ************************/
.widget_categories li:before {
color: <?php echo $color_main5; ?>; }

.widget {
background: #fff;
box-shadow: 0 0 5px 0 #dadada;
margin: 0 0 1.5em;
padding: 20px; }
.widget li {
border-bottom: 1px solid <?php echo $color_main7; ?>;
color: <?php echo $color_main8; ?>;
}


.widget_search input[type="search"] {
background-color: #fcfcfc;
border: 1px solid #e4e6e8;
}

.widget-area .widget ul {
color: <?php echo $color_main3; ?>;
}

.widget-area .widget ul a:hover {
color: <?php echo $color_main5; ?>;
}

.widget-area .widget ul a {
color: <?php echo $color_main3; ?>;
}



/************************ Sidebar  ************************/
/************************ Pagination  ************************/
.navigation li a,
.navigation li a:hover,
.navigation li.active a,
.navigation li.disabled {
background-color: <?php echo $color_main5; ?>;
}

.navigation li a:hover,
.navigation li.active a {
background-color: #09abdc; }


.cate-label {
background: none repeat scroll 0 0 <?php echo $color_main5; ?>;
}




figure.effect-milo {
background: <?php echo $color_main5; ?>; }


#flexslider-featured .flex-control-nav li a.flex-active {
background: <?php echo $color_main5; ?>; }

figure.effect-ruby {
background-color: #17819c; }

.slide-more-link {
background: <?php echo $color_main5; ?>;
}

.slide-more-link:hover {
background: #067293;
color: #fff; }


.defier-cat-title {
border-bottom: 2px solid <?php echo $color_main6; ?>;
}
.defier-cat-title h2 i {
color: <?php echo $color_main5; ?>; }
.defier-cat-title h2 a {
color: <?php echo $color_main8; ?>;
}


.defier-by-label a {
color: <?php echo $color_main5; ?>; }
.defier-by-label a i {
color: <?php echo $color_main3; ?>;
}

.defier-block-title a {
color: <?php echo $color_main8; ?>; }
.defier-block-title a:hover {
color: <?php echo $color_main5; ?>; }


.defier-posts-list li {
border-top: 1px solid <?php echo $color_main6; ?>; }

.defier-smaill-content a {
color: <?php echo $color_main8; ?>;
}
.defier-smaill-content a:hover {
color: <?php echo $color_main5; ?>; }

.owl-page {
background-color: <?php echo $color_main4; ?>;
}

.active {
background-color: <?php echo $color_main5; ?>; }

.cd-tabs-navigation a {
color: <?php echo $color_main7; ?>;;
}
.cd-tabs-navigation a i {
color: <?php echo $color_main3; ?>;
}

.cd-tabs-navigation a.selected {
background-color: #ffffff !important;
box-shadow: inset 0 2px 0 #f05451;
color: #29324e; }

.cd-tabs-navigation a.selected {
box-shadow: inset 0 -2px 0 <?php echo $color_main5; ?>; }

#portfolio-filter li .current,
#portfolio-filter li:hover {
color: <?php echo $color_main5; ?>; }
#portfolio-filter li .current a,
#portfolio-filter li:hover a {
color: <?php echo $color_main5; ?>; }


#portfolio-list h3 {
border-bottom: 2px solid <?php echo $color_main7; ?> , 6%;
}

#portfolio-list .links a {
color: <?php echo $color_main3; ?>;
}


#portfolio-list .portfolio-item h3 a {
color: <?php echo $color_main8; ?>;
}


.overlay-trigger {
color: <?php echo $color_main7; ?>;
}

.overlay-trigger:hover {
color: <?php echo $color_main5; ?>; }
.overlay-trigger:hover i {
color: <?php echo $color_main5; ?>; }

.sticky-header {
border-bottom: 1px solid <?php echo $color_main1; ?>; }


span.square {
background: none repeat scroll 0 0 <?php echo $color_main5; ?> !important;
}

span.circle {
background: none repeat scroll 0 0 <?php echo $color_main5; ?> !important;
}

.blockquote-holder {
color: <?php echo $color_main5; ?>;
}

.blockquote-holder blockquote {
color: <?php echo $color_main5; ?>; }

.entry-footer .tags-links a {
color: <?php echo $color_main3; ?>;
}

.entry-footer .tags-links a:hover {
color: <?php echo $color_main5; ?>; }

ol.comment-list li {
border-bottom: 1px solid <?php echo $color_main1; ?>; }

ol.comment-list li .comment-author cite {
color: <?php echo $color_main5; ?>; }

.comment-reply-title i {
color: <?php echo $color_main5; ?>; }


.logged-in-as {
color: <?php echo $color_main8; ?>; }
.logged-in-as a {
color: <?php echo $color_main5; ?>;
}

.submit {
background: <?php echo $color_main5; ?>;
}


button, input[type="button"], input[type="reset"], input[type="submit"] {
background: <?php echo $color_main5; ?>;
}

.comment-body p {
color: <?php echo $color_main8; ?>;
}

.reply a {
background: none repeat scroll 0 0 <?php echo $color_main5; ?>;
}

.reply a:hover {
background: none repeat scroll 0 0 <?php echo $color_main2; ?>; }

.defier-first-prag {

color: <?php echo $color_main2; ?> !important;
}

.highlight {
background: none repeat scroll 0 0 <?php echo $color_main5; ?> !important;
}

/***  ShortCodes  ***/
/***  Widgets  ***/
/***  About Me  ***/
.defier-about h2:before {
color: <?php echo $color_main5; ?>; }

.facebook-widget h2:before {
color: <?php echo $color_main5; ?>; }

.google-widget h2:before {
color: <?php echo $color_main5; ?>; }

.adv125x125-widget h2:before {
color: <?php echo $color_main5; ?>; }



.adv300x250-widget h2:before {
color: <?php echo $color_main5; ?>; }

.about-widget .aut_social a span {
color: <?php echo $color_main3; ?>; }
.about-widget p {
color: <?php echo $color_main3; ?>;
}

.defier-flickr h2:before {
color: <?php echo $color_main5; ?>; }


/***  Flicker  ***/
/***  Popular Posts  ***/
.popular-posts h2:before {
color: <?php echo $color_main5; ?>; }
ul.posts-list li .content a:hover {
color: <?php echo $color_main5; ?>; }
ul.posts-list li .content time {
color: <?php echo $color_main3; ?>;
}
ul.posts-list li .content time i {
}
ul.posts-list li .content .comments a {
color: <?php echo $color_main3; ?>;
}

.latest-posts h2:before {
color: <?php echo $color_main5; ?>; }

.latest-tweets h2:before {
color: <?php echo $color_main5; ?>; }

.latest-tweets .follow {
background: none repeat scroll 0 0 <?php echo $color_main2; ?>;
}

.widget_categories h2:before {
color: <?php echo $color_main5; ?>; }

.widget_search h2:before {
color: <?php echo $color_main5; ?>; }

.widget_tag_cloud h2:before {
color: <?php echo $color_main5; ?>; }

.tagcloud a {
background: <?php echo $color_main5; ?>;
}

.tagcloud a:hover {
background: <?php echo $color_main7; ?>;
color: <?php echo $color_main8; ?>;
}

.tabbed .tabs-list {
border-bottom: 1px solid <?php echo $color_main7; ?>; }


.tabbed .tabs-list .active a {
border-bottom: 2px solid <?php echo $color_main8; ?>;
color: <?php echo $color_main8; ?>; }

.entry-meta {
color: <?php echo $color_main3; ?>;
border-bottom: 1px solid <?php echo $color_main1; ?>; }
.entry-meta a {
color: <?php echo $color_main3; ?>; }

/***  Single Pages  ***/
.likeme {
background: <?php echo $color_main1; ?>;
}
.entry-footer .viewCounter i {
color: <?php echo $color_main5; ?>; }



@media screen and (max-width: 768px) {
#popout {
background: <?php echo $color_main2; ?>;
}

.search_menu {

background: <?php echo $color_main5; ?>; }

.headerv2 #toggle {
border: 2px solid <?php echo $color_main4; ?>;
color: <?php echo $color_main4; ?>;
}

.headerv2 #toggle:hover {
border: 2px solid <?php echo $color_main5; ?>;
color: <?php echo $color_main5; ?>; }

#toggle {
border: 2px solid <?php echo $color_main7; ?>;
color: <?php echo $color_main7; ?>;
}

#toggle:hover {
border: 2px solid <?php echo $color_main5; ?>;
color: <?php echo $color_main5; ?>; }


.nav-menu_mobile li a:hover {
background: <?php echo $color_main5; ?>;
}


.half-wide li:nth-child(2) {
border-top: 1px solid <?php echo $color_main6; ?>; }


