<?php

$style = array(
	esc_html__('Milan', 'slz')      => 'st-milan',
);

$vc_options = array(
	array(
		'type'        => 'dropdown',
		'heading'     => esc_html__( 'Style', 'slz' ),
		'param_name'  => 'layout-4-style',
		'value'       => $style,
		'description' => esc_html__( 'Select style for blocks', 'slz' ),
		'edit_field_class'  => 'hidden',
	),
);