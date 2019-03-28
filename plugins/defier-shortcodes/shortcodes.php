<?php
/* ==========================================================================
Dropcaps
========================================================================== */

function add_defier_dropcap( $atts, $content = null ) {
  extract(shortcode_atts(array("style" => '', "color"=>''), $atts)); 
  return '<span class="dropcap" style="color:'.$color.'">' .  $content . '</span>';
} 

add_shortcode('defier_dropcap', 'add_defier_dropcap');

/* ==========================================================================
Columns
========================================================================== */

function add_defier_column( $atts, $content = null ) {
  extract(shortcode_atts(array("column_type" => '', "last_item"=>''), $atts)); 
  
  switch($column_type){
  	case '1/2' :
  		if($last_item != "yes"){
  			$html = '<div class="one_half">'.  $content .'</div>';
  		}
  		else{
  			$html = '<div class="one_half last_item">'.  $content .'</div>';
  		}
  		
		return $html;
	break;
	case '1/3' :
		if($last_item != "yes"){
  			$html = '<div class="one_third">'.  $content .'</div>';
  		}
  		else{
  			$html = '<div class="one_third last_item">'.  $content .'</div>';
  		}
  		
		return $html;
	break;
	case '2/3' :
		if($last_item != "yes"){
  			$html = '<div class="two_third">'.  $content .'</div>';
  		}
  		else{
  			$html = '<div class="two_third last_item">'.  $content .'</div>';
  		}
  		
		return $html;
	break;
	case '1/4' :
		if($last_item != "yes"){
  			$html = '<div class="one_fourth">'.  $content .'</div>';
  		}
  		else{
  			$html = '<div class="one_fourth last_item">'.  $content .'</div>';
  		}
  		
		return $html;
	break;
	case '3/4' :
		if($last_item != "yes"){
  			$html = '<div class="three_fourth">'.  $content .'</div>';
  		}
  		else{
  			$html = '<div class="three_fourth last_item">'.  $content .'</div>';
  		}
  		
		return $html;
	break;
  }

} 

add_shortcode('defier_column', 'add_defier_column');

/* ==========================================================================
Title
========================================================================== */

function add_defier_title( $atts, $content = null ) {
  extract(shortcode_atts(array("type" => ''), $atts)); 

   switch($type){
	  	case 'h1' :
			return '<h1>'.$content.'</h1>';
		break;
		case 'h2' :
			return '<h2>'.$content.'</h2>';
		break;
		case 'h3' :
			return '<h3>'.$content.'</h3>';
		break;
		case 'h4' :
			return '<h4>'.$content.'</h4>';
		break;
		case 'h5' :
			return '<h5>'.$content.'</h5>';
		break;
		case 'h6' :
			return '<h6>'.$content.'</h6>';
		break;
	}
}

add_shortcode('defier_title', 'add_defier_title');

/* ==========================================================================
   Highlight
========================================================================== */

function add_defier_highlight($atts, $content = null) {
 
	$highlight = '<span class="highlight">' . $content .'</span>';
					
	return $highlight;
}

add_shortcode('defier_highlight', 'add_defier_highlight');

/* ==========================================================================
   Alert Message
========================================================================== */

function add_defier_alert($atts, $content = null) {
		extract(shortcode_atts(array("type" => ''), $atts));  
		
		$message = '<div class="alert '.$type.'">';
		$message .= do_shortcode($content);
		$message .= '</div>';
		
		return $message;
}

add_shortcode('defier_alert', 'add_defier_alert');

/* ==========================================================================
   Divider
========================================================================== */

function add_defier_divider($atts, $content = null) {
	extract(shortcode_atts(array("type" => ''), $atts));  
		 
   	return '<hr class="'.$type.'">';
}

add_shortcode('defier_divider', 'add_defier_divider');

/* ==========================================================================
   Blockquote
========================================================================== */

function add_defier_blockquote($atts, $content = null) {	 
	extract(shortcode_atts(array(), $atts));  
   	return '<div class="blockquote-holder"><blockquote>'. $content .'</blockquote></div>';
}

add_shortcode('defier_blockquote', 'add_defier_blockquote');


/* ==========================================================================
   First Paragraph
========================================================================== */

function add_defier_first_paragraph($atts, $content = null) {	 
	extract(shortcode_atts(array(), $atts));  
   	return '<p class="defier-first-prag">'. do_shortcode($content ) .'</p>';
}

add_shortcode('defier_first_paragraph', 'add_defier_first_paragraph');

/* ==========================================================================
   Spacer
========================================================================== */

function add_defier_space() {	 
   	return '<div class="clearfix"></div>';
}

add_shortcode('defier_space', 'add_defier_space');

/* ==========================================================================
   button
==========================================================================*/

function add_defier_button($atts, $content = null ) {
	extract(shortcode_atts(array("style" => '', "background"=>'',"text"=>'',"url"=>'',"color"=>''), $atts));
	return '<a href="'.$url.'" class="button-'.$style.' " style="background:'.$background.';color:'.$color.'">' .  $text . '</a>';
}

add_shortcode('defier_button', 'add_defier_button');
/* ==========================================================================
   fram
==========================================================================*/

function add_defier_iframe($atts, $content = null )
{
	extract(shortcode_atts(array("iframe_content" => '',"url" => '',"width" => '',"height" => ''), $atts));
	$html = '' ;
	if(!empty($iframe_content))
	{
		$html =  stripslashes(htmlspecialchars_decode($iframe_content))  ;
	}else{
		     $html = '<iframe class="defier-ifram" width="'.$width.'" height ="'.$height.'" src="'.$url.'">'. $iframe_content .'</iframe>' ;
	     }
	return $html;
}
add_shortcode('defier_iframe', 'add_defier_iframe');

?>