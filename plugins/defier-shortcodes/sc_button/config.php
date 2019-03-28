<?php
	$shortcodes = array(
		array(
			'id' => 'Column',
			'description' => __('add a column on your page or post content' , 'defier'),
			'fields' => array(
				array(
					'id' => 'Column type',
					'type' => 'select' ,
					'options' => '1/2,1/3,2/3,1/4,3/4',
					'description' => __('Column proposition' , 'defier')
				),
				array(
					'id' => 'Last item',
					'type' => 'select' ,
					'options' => 'no, yes',
					'description' => __('it clears float for last column' , 'defier')
				),
			 )	
		),
		array(
			'id' => 'First Paragraph',
			'description' => __('Add a first paragraph content' , 'defier'),
			'fields'=> false
		),
		array(
			'id' => 'Title',
			'description' => __('Add a title' , 'defier'),
			'fields'=> array(
				array(
					'id' => 'type',
					'type' => 'select' ,
					'options' => 'h1,h2,h3,h4,h5,h6',
					'description' => __('H tag size' , 'defier')
				),
			 )	
		),
		array(
			'id' => 'Highlight',
			'description' => __('Add a highlighted content' , 'defier'),
			'fields'=> false
		),

		array(
			'id' => 'Dropcap',
			'description' => __('Add a dropcap' , 'defier'),
			'fields'=> array(
				array(
					'id' => 'color',
					'type' => 'text' ,
					'options' => '',
					'description' => __('Hex code ie; #fff' , 'defier')
				),
			 )	
		),	
		array(
			'id' => 'Divider',
			'description' => __('Add a divider' , 'defier'),
			'fields'=> array(
				array(
					'id' => 'type',
					'type' => 'select' ,
					'options' => 'thin,fat,dashed,dotted,stylish,shadow',
					'description' => __('Divider type' , 'defier')
				)
			 )	
		),
		array(
			'id' => 'Blockquote',
			'description' => __('Add a blockquote' , 'defier'),
			'fields'=> false
		),
		array(
			'id' => 'Space',
			'description' => __('Add a space' , 'defier'),
			'fields'=> false
		),
		array(
			'id' => 'Alert',
			'description' => __('Add a alert box' , 'defier'),
			'fields'=> array(
				array(
					'id' => 'type',
					'type' => 'select' ,
					'options' => 'alert-warning,alert-danger,alert-info,alert-success',
					'description' => __('Alert type' , 'defier')
				)
			 )	
		),
		array(
			'id' => 'button',
			'description' => __('Add a button' , 'defier'),
			'fields'=> array(
				array(
					'id' => 'text',
					'type' => 'text' ,
					'options' => '',
					'description' => __('button text' , 'defier')
				),array(
					'id' => 'style',
					'type' => 'select' ,
					'options' => 'rounded,square',
					'description' => __('button style' , 'defier')
				),
                 array(
					'id' => 'url',
					'type' => 'text' ,
					'options' => '',
					'description' => __('Button Link' , 'defier')
				),
				array(
					'id' => 'background',
					'type' => 'text' ,
					'options' => '',
					'description' => __('button background Hex code ie; #fff' , 'defier')
				),
                array(
					'id' => 'color',
					'type' => 'text' ,
					'options' => '',
					'description' => __('Font Color Hex code ie; #fff' , 'defier')
				),
               
			)
		),
		array(
			'id' => 'iframe',
			'description' => __('Add iframe content ' , 'defier'),
			'fields'=> array(
				array(
					'id' => 'Embded Code',
					'type' => 'textarea' ,
					'options' => '',
					'description' => __('iframe content ' , 'defier')
				),array(
					'id' => 'url',
					'type' => 'text' ,
					'options' => '',
					'description' => __('url' , 'defier')
				),array(
					'id' => 'width',
					'type' => 'text' ,
					'options' => '',
					'description' => __('height of iframe' , 'defier')
				),array(
					'id' => 'height',
					'type' => 'text' ,
					'options' => '',
					'description' => __('height of iframe' , 'defier')
				),
			)
		)
	); 
?>