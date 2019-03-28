<?php
/******************************************************************
 * post format icon
 *****************************************************************/
 if(get_post_format() ) {
 switch (get_post_format()) {
     case 'standard' :
         $post_format_icon =  "fa-paper";
         break ;
     case 'audio' :
         $post_format_icon =  "fa-volume";
         break ;
     case 'image' :
         $post_format_icon =  "fa-image2";
         break ;
     case 'video' :
         $post_format_icon =  "fa-video";
         break ;
     case 'quote' :
         $post_format_icon =  "fa-stack";
         break ;
     case 'link' :
         $post_format_icon =  "fa-link2";
         break ;
     case 'status' :
         $post_format_icon =  "fa-stack-2";
         break ;
     case 'gallery' :
         $post_format_icon =  "fa-camera2";
         break ;
     case 'aside' :
         $post_format_icon =  "fa-camera2";
         break ;
     default :
         $post_format_icon =  "fa-paper";
         break ;
       }
     }
?>
