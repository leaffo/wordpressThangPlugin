<?php

$shortcode = slz_ext( 'shortcodes' )->get_shortcode( 'features_block' );

$style = array(
	esc_html__('Chennai', 'slz')     => 'st-chennai',
	esc_html__('Munbai', 'slz')  	 => 'st-mumbai'
);

// --------------icon option --------------//

	$icons_type = array(
		array(
			'type'           => 'dropdown',
			'heading'        => esc_html__( 'Icon Type', 'slz' ),
			'param_name'     => 'icon_type',
			'value'          =>   array(
									esc_html__( 'Icon', 'slz' )        => '01',
									esc_html__('Image Upload', 'slz')  => '02'
								),
			'description'    => esc_html__( 'Choose type of icon of block.', 'slz' )
		)
	);
	$icon_library_options = $shortcode->get_icon_library_options( 
		array(
	        'element' => 'icon_type',
	        'value'   => array('01')
	    )
	);

	$icons_extra_options = array(
		array(
			'type'           => 'attach_image',
			'heading'        => esc_html__( 'Image', 'slz' ),
			'param_name'     => 'img_up',
			'dependency'     => array(
				'element'  => 'icon_type',
				'value'    => array('02')
			),
			'description'    => esc_html__('You can use image instead of icon.', 'slz')
		),
		array(
			'type'        => 'textfield',
			'heading'     => esc_html__( 'Title', 'slz' ),
			'param_name'  => 'title',
			'value'       => '',
			'description' => esc_html__( 'Title. If it blank the block will not have a title', 'slz' )
		),
		array(
			'type'        => 'textarea',
			'heading'     => esc_html__( 'Description', 'slz' ),
			'param_name'  => 'des',
			'value'       => '',
			'description' => esc_html__( 'Description. If it blank the block will not have a title', 'slz' )
		)
	);

	$add_features = array(
		array(
			'type'        => 'param_group',
			'heading'     => esc_html__( 'Add Featured', 'slz' ),
			'param_name'  => 'features_2',
			'params'      => array_merge( $icons_type, $icon_library_options, $icons_extra_options ),
		),
		
	);

// -------general option----------//

	$vc_options = array_merge(
		array(
			array(
				'type'        => 'dropdown',
				'heading'     => esc_html__( 'Style', 'slz' ),
				'param_name'  => 'layout-2-style',
				'value'       => $style,
				'description' => esc_html__( 'Select style for blocks', 'slz' )
			),
			array(
				'type'        => 'colorpicker',
				'heading'     => esc_html__( 'Block Border Color', 'slz' ),
				'param_name'  => 'block_bd_cl_2',
				'value'       => '',
				'description' => esc_html__( 'Choose border color for blocks.', 'slz' ),
				'edit_field_class' => 'vc_col-sm-6 vc_column',
				'group'       => esc_html__( 'Custom Color', 'slz' ),
			),
			array(
				'type'        => 'colorpicker',
				'heading'     => esc_html__( 'Block Border Color (hover)', 'slz' ),
				'param_name'  => 'block_bd_hv_cl_2',
				'value'       => '',
				'description' => esc_html__( 'Choose border color for blocks when your mouse over it.', 'slz' ),
			    'edit_field_class' => 'vc_col-sm-6 vc_column',
				'group'       => esc_html__( 'Custom Color', 'slz' ),
			),
			array(
				'type'        => 'colorpicker',
				'heading'     => esc_html__( 'Block Background Color', 'slz' ),
				'param_name'  => 'block_bg_cl_2',
				'value'       => '',
				'description' => esc_html__( 'Choose background color for blocks.', 'slz' ),
				'edit_field_class' => 'vc_col-sm-6 vc_column',
				'group'       => esc_html__( 'Custom Color', 'slz' ),
			),
			array(
				'type'        => 'colorpicker',
				'heading'     => esc_html__( 'Block Background Color (hover)', 'slz' ),
				'param_name'  => 'block_bg_hv_cl_2',
				'value'       => '',
				'description' => esc_html__( 'Choose background color for blocks when your mouse over it.', 'slz' ),
				'edit_field_class' => 'vc_col-sm-6 vc_column',
				'group'       => esc_html__( 'Custom Color', 'slz' ),
			),
			array(
				'type'        => 'colorpicker',
				'heading'     => esc_html__( 'Icon Color', 'slz' ),
				'param_name'  => 'icon_cl',
				'value'       => '',
				'description' => esc_html__( 'Choose color for icon of features blocks.', 'slz' ),
				'group'       => esc_html__( 'Custom Color', 'slz' ),
			)
		),
		$add_features
	);