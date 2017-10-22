<?php
$style = array(
	esc_html__('Florida', 'slz')     => 'st-florida',
	esc_html__('California', 'slz')  => 'st-california',
	esc_html__('Georgia', 'slz')     => 'st-georgia',
);
$bg_option  = array(
	esc_html__('No', 'slz')   => 'no',
	esc_html__('Yes', 'slz')  => 'yes',
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
		'type'        => 'dropdown',
		'heading'     => esc_html__( 'Background Image', 'slz' ),
		'param_name'  => 'bg_f_image_1',
		'value'       => $bg_option,
		'std'         => 'no',
		'description' => esc_html__( 'Using featured image in post as background image.', 'slz' ),
		'group'       => esc_html__('Custom CSS', 'slz'),
		'dependency'    => array(
			'element'   => 'layout-1-style',
			'value'     => array( 'st-georgia')
		),
	),
	array(
		'type'        => 'colorpicker',
		'heading'     => esc_html__( 'Background Color', 'slz' ),
		'param_name'  => 'bg_color_1',
		'description' => esc_html__( 'Please choose background color for block', 'slz' ),
		'group'       => esc_html__('Custom CSS', 'slz'),
		'dependency'    => array(
			'element'   => 'layout-1-style',
			'value'     => array( 'st-california', 'st-georgia')
		),
		'edit_field_class' => 'vc_col-sm-6 vc_column',
	),
	array(
		'type'        => 'colorpicker',
		'heading'     => esc_html__( 'Border Color', 'slz' ),
		'param_name'  => 'border_color_1',
		'description' => esc_html__( 'Please choose background color for block', 'slz' ),
		'group'       => esc_html__('Custom CSS', 'slz'),
		'dependency'    => array(
			'element'   => 'layout-1-style',
			'value'     => array( 'st-california', 'st-georgia')
		),
		'edit_field_class' => 'vc_col-sm-6 vc_column',
	),
	
);