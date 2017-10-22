<?php

$style = array(
	esc_html__('London', 'slz')      => 'st-london',
	esc_html__('Harrogate', 'slz')   => 'st-harrogate',
	esc_html__('Leeds', 'slz')       => 'st-leeds',
);


$vc_options = array(
	array(
		'type'        => 'dropdown',
		'heading'     => esc_html__( 'Style', 'slz' ),
		'param_name'  => 'layout-3-style',
		'value'       => $style,
		'description' => esc_html__( 'Select style for blocks', 'slz' )
	),
	array(
		'type'        => 'colorpicker',
		'heading'     => esc_html__( 'Icon Background Color', 'slz' ),
		'param_name'  => 'icon_bg_cl_3',
		'value'       => '',
		'dependency'     => array(
			'element'  => 'layout-3-style',
			'value_not_equal_to'    => array('st-london')
		),
		'description' => esc_html__( 'Choose background color for icon of blocks.', 'slz' ),
		'edit_field_class' => 'vc_col-sm-6 vc_column',
		'group'       => esc_html__( 'Custom Color', 'slz' ),
	),
	array(
		'type'        => 'colorpicker',
		'heading'     => esc_html__( 'Icon Background Color (hover)', 'slz' ),
		'param_name'  => 'icon_bg_hv_cl_3',
		'value'       => '',
		'dependency'     => array(
			'element'  => 'layout-3-style',
			'value_not_equal_to'    => array('st-london')
		),
		'description' => esc_html__( 'Choose background color for icon when you mouse over it.', 'slz' ),
		'edit_field_class' => 'vc_col-sm-6 vc_column',
		'group'       => esc_html__( 'Custom Color', 'slz' ),
	),
);