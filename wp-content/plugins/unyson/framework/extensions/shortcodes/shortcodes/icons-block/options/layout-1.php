<?php
$style = array(
	esc_html__('Florida', 'slz')     => 'st-florida',
	esc_html__('California', 'slz')  => 'st-california',
	esc_html__('Georgia', 'slz')     => 'st-georgia',
);

$vc_options = array(
	array(
		'type'        => 'dropdown',
		'heading'     => esc_html__( 'Style', 'slz' ),
		'param_name'  => 'layout-1-style',
		'value'       => $style,
		'description' => esc_html__( 'Select style for blocks', 'slz' )
	),
	array(
		'type'        => 'colorpicker',
		'heading'     => esc_html__( 'Icon Background Color', 'slz' ),
		'param_name'  => 'icon_bg_cl_1',
		'value'       => '',
		'dependency'     => array(
			'element'  => 'layout-1-style',
			'value_not_equal_to'    => array('st-florida')
		),
		'description' => esc_html__( 'Choose background color for icon of blocks.', 'slz' ),
		'edit_field_class' => 'vc_col-sm-6 vc_column',
		'group'       => esc_html__( 'Custom Color', 'slz' ),
	),
	array(
		'type'        => 'colorpicker',
		'heading'     => esc_html__( 'Icon Background Color (hover)', 'slz' ),
		'param_name'  => 'icon_bg_hv_cl_1',
		'value'       => '',
		'dependency'     => array(
			'element'  => 'layout-1-style',
			'value_not_equal_to'    => array('st-florida')
		),
		'description' => esc_html__( 'Choose background color for icon when you mouse over it.', 'slz' ),
		'edit_field_class' => 'vc_col-sm-6 vc_column',
		'group'       => esc_html__( 'Custom Color', 'slz' ),
	),
	array(
		'type'        => 'colorpicker',
		'heading'     => esc_html__( 'Icon Border Color', 'slz' ),
		'param_name'  => 'icon_bd_cl_1',
		'value'       => '',
		'edit_field_class' => 'vc_col-sm-6 vc_column',
		'dependency'     => array(
			'element'  => 'layout-1-style',
			'value_not_equal_to'    => array('st-florida')
		),
		'description' => esc_html__( 'Choose border color for icon of blocks.', 'slz' ),
		'edit_field_class' => 'vc_col-sm-6 vc_column',
		'group'       => esc_html__( 'Custom Color', 'slz' ),
	),
	array(
		'type'        => 'colorpicker',
		'heading'     => esc_html__( 'Icon Border Color (hover)', 'slz' ),
		'param_name'  => 'icon_bd_hv_cl_1',
		'value'       => '',
		'edit_field_class' => 'vc_col-sm-6 vc_column',
		'dependency'     => array(
			'element'  => 'layout-1-style',
			'value_not_equal_to'    => array('st-florida')
		),
		'description' => esc_html__( 'Choose border color for icon when you mouse over it.', 'slz' ),
		'edit_field_class' => 'vc_col-sm-6 vc_column',
		'group'       => esc_html__( 'Custom Color', 'slz' ),
	),
);