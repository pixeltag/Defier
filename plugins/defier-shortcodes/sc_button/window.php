<!DOCTYPE html>
<html lang="en">
<head>
	<title>defier Shortcodes</title>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<?php 

		define('WP_USE_THEMES', false);
			$parse_uri = explode( 'wp-content', $_SERVER['SCRIPT_FILENAME'] );
			require_once( $parse_uri[0] . 'wp-load.php' );
		$wpurl = get_site_url();
		$template = plugins_url() . '/defier-shortcodes/sc_button/';
	?>
	<script type="text/javascript" src="<?php echo esc_url($wpurl); ?>/wp-includes/js/tinymce/tiny_mce_popup.js"></script>
	<script type="text/javascript" src="<?php echo esc_url($wpurl); ?>/wp-includes/js/jquery/jquery.js"></script>
	<script type="text/javascript" src="<?php echo esc_url($wpurl); ?>/wp-includes/js/tinymce/utils/form_utils.js"></script>
	<script type="text/javascript" src="<?php echo plugins_url(); ?>/defier-shortcodes/sc_button/js/jquery-ui-all.min.js"></script>
	<script type="text/javascript" src="<?php echo plugins_url(); ?>/defier-shortcodes/sc_button/js/script.js"></script>
	
	<link  rel="stylesheet" href="<?php echo plugins_url(); ?>/defier-shortcodes/sc_button/css/style.css ?>" media="all" />

	<link href='http://fonts.googleapis.com/css?family=PT+Sans:400,700&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
</head>

<body>
<!-- container -->
<div class="container">
	<?php 
		// require the config file
		require_once('config.php');
	?>

	<!-- left menu -->
	<div class="menu">		
		<ul>
			<?php foreach($shortcodes as $single)
			{
				echo '<li><a data-shortcode="'.strtolower(str_replace(' ' , '_' , $single['id'])).'" href="#'.strtolower(str_replace(' ' , '_' , $single['id'])).'">'.$single['id'].'</a></li>';
			} ?>	
		</ul>
	</div>
	<!-- end menu -->
	<!-- content -->
	<div class="content wp-core-ui">
		<?php 
			foreach($shortcodes as $page){
		?>
				<!-- field -->
				<div class="field" id="<?php echo strtolower(str_replace(' ' , '_' , $page['id'])); ?>">
						<?php if(isset($page['description']) && $page['description'] !== '') : ?>
						<span class="desc"><?php echo $page['description']; ?></span>
						<?php endif; ?>
						<div class="clearfix"></div>
						<h4><?php echo $page['id']; ?></h4>
						<div class="clearfix"></div>
						<?php if($page['fields'] !== false) : ?>
							<?php foreach($page['fields'] as $field) {
										switch($field['type'])
										{
											case 'text' :

											echo '<div class="inter"><h5>'.$field['id'].'</h5><div class="inner-content"><div class="clearfix"></div><input type="text" name="'.strtolower(str_replace(' ' , '_' , $field['id'])).'" class="active-field" /><div class="clearfix"></div><span class="description">'.$field['description'].'</span></div></div>';

											break;

											case 'textarea' :

											echo '<div class="inter"><h5>'.$field['id'].'</h5><div class="inner-content"><div class="clearfix"></div><textarea class="active-field" name="'.strtolower(str_replace(' ' , '_' , $field['id'])).'"></textarea><div class="clearfix"></div><span class="description">'.$field['description'].'</span></div></div>';

											break;

											case 'slider' :
											?>
											<div class="inter"><h5><?php echo $field['id']; ?></h5><div class="inner-content"><div class="clearfix"></div>	
											<input data-max="<?php echo esc_attr($field['max']); ?>" value="0" type="text" class="text active-field slider" name="<?php echo strtolower(str_replace(' ' , '_' , $field['id'])); ?>" 
										   id="<?php echo strtolower(str_replace(' ' , '_' , $field['id'])); ?>"
										    />
											<div class="slidercontrol"></div><div class="clearfix"></div><span class="description"><?php echo $field['description']; ?></span></div></div>

											<?php
											break;

											case 'select' :
											?>

											<div class="inter"><h5><?php echo $field['id']; ?></h5><div class="inner-content"><div class="clearfix"></div><select class="active-field full" 
											id="<?php echo strtolower(str_replace(' ' , '_' , $field['id'])); ?>" 
											name="<?php echo strtolower(str_replace(' ' , '_' , $field['id'])); ?>">

												<?php 
														$field_array = explode(',' , $field['options']);
														foreach($field_array as $option) {

															?>
															<option value="<?php echo esc_attr($option); ?>"><?php echo $option; ?></option>
															<?php
														}
												 ?>
											</select><div class="clearfix"></div><span class="description"><?php echo $field['description']; ?></span></div></div>
											<?php
											break;

											
										}// end switch


							}// end foreach fields ?>
								


						<?php endif; ?>
						<!-- button -->
						<a href="javascript:void(0);" class="add"><?php _e('Add Shortcode' , 'defier'); ?></a>
				</div>
				<!-- end field -->
			<?php } ?>
	</div>
	<!-- end content -->
</div><!-- end container -->
</body>
</html>