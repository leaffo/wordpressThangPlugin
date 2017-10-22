<?php
$style = array(
	esc_html__('Florida', 'slz')     => 'st-florida',
	esc_html__('California', 'slz')  => 'st-california',
);

$vc_options = array(
	array(
		'type'        => 'dropdown',
		'heading'     => esc_html__( 'Style', 'slz' ),
		'param_name'  => 'layout-1-style',
		'value'       => $style,
		'description' => esc_html__( 'Select style for blocks', 'slz' )
	)
);