<?php

$style = array(
	esc_html__('Chennai', 'slz')    => 'st-chennai',
	esc_html__('Mumbai', 'slz')     => 'st-mumbai',
	esc_html__('Pune', 'slz')       => 'st-pune',
// 	esc_html__('Jaipur', 'slz')     => 'st-jaipur',
// 	esc_html__('Noida', 'slz')      => 'st-noida',

);

$vc_options = array(
	array(
		'type'        => 'dropdown',
		'heading'     => esc_html__( 'Style', 'slz' ),
		'param_name'  => 'layout-2-style',
		'value'       => $style,
		'description' => esc_html__( 'Select style for blocks', 'slz' )
	),
);