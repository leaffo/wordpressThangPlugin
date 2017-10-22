<?php

$style = array(
	esc_html__('London', 'slz')      => 'st-london',
//	esc_html__('Harrogate', 'slz')   => 'st-harrogate',
);

$vc_options = array(
	array(
		'type'        => 'dropdown',
		'heading'     => esc_html__( 'Style', 'slz' ),
		'param_name'  => 'layout-3-style',
		'value'       => $style,
		'description' => esc_html__( 'Select style for blocks', 'slz' ),
		'edit_field_class'  => 'hidden',
	),
);