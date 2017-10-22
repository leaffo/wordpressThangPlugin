<?php

$style = array(
	esc_html__('Chennai', 'slz')    => 'st-chennai',
	esc_html__('Mumbai', 'slz')     => 'st-mumbai',
	esc_html__('Pune', 'slz')       => 'st-pune',
);


$vc_options = array(
	array(
		'type'        => 'dropdown',
		'heading'     => esc_html__( 'Style', 'slz' ),
		'param_name'  => 'layout-2-style',
		'value'       => $style,
		'description' => esc_html__( 'Select style for blocks', 'slz' )
	),
	array(
		'type'        => 'colorpicker',
		'heading'     => esc_html__( 'Icon Background Color', 'slz' ),
		'param_name'  => 'icon_bg_cl_2',
		'value'       => '',
		'dependency'     => array(
			'element'  => 'layout-2-style',
			'value_not_equal_to'    => array('st-chennai')
		),
		'description' => esc_html__( 'Choose background color for icon of blocks.', 'slz' ),
		'edit_field_class' => 'vc_col-sm-6 vc_column',
		'group'       => esc_html__( 'Custom Color', 'slz' ),
	),
	array(
		'type'        => 'colorpicker',
		'heading'     => esc_html__( 'Icon Background Color (hover)', 'slz' ),
		'param_name'  => 'icon_bg_hv_cl_2',
		'value'       => '',
		'dependency'     => array(
			'element'  => 'layout-2-style',
			'value_not_equal_to'    => array('st-chennai')
		),
		'description' => esc_html__( 'Choose background color for icon when you mouse over it.', 'slz' ),
		'edit_field_class' => 'vc_col-sm-6 vc_column',
		'group'       => esc_html__( 'Custom Color', 'slz' ),
	),
	array(
		'type'        => 'colorpicker',
		'heading'     => esc_html__( 'Icon Border Color', 'slz' ),
		'param_name'  => 'icon_bd_cl_2',
		'value'       => '',
		'edit_field_class' => 'vc_col-sm-6 vc_column',
		'dependency'     => array(
			'element'  => 'layout-2-style',
			'value_not_equal_to'    => array('st-chennai')
		),
		'description' => esc_html__( 'Choose border color for icon of blocks.', 'slz' ),
		'group'       => esc_html__( 'Custom Color', 'slz' ),
	),
	array(
		'type'        => 'colorpicker',
		'heading'     => esc_html__( 'Icon Border Color (hover)', 'slz' ),
		'param_name'  => 'icon_bd_hv_cl_2',
		'value'       => '',
		'edit_field_class' => 'vc_col-sm-6 vc_column',
		'dependency'     => array(
			'element'  => 'layout-2-style',
			'value_not_equal_to'    => array('st-chennai')
		),
		'description' => esc_html__( 'Choose border color for icon when you mouse over it.', 'slz' ),
		'group'       => esc_html__( 'Custom Color', 'slz' ),
	),
);