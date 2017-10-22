<?php

if ( ! defined( 'ABSPATH' ) ) {
	die ( 'Forbidden' );
}

$cfg = array ();

$cfg ['page_builder'] = array (
		'title' => esc_html__( 'SLZ Features Block', 'slz' ),
		'description' => esc_html__( 'List of features with info', 'slz' ),
		'tab' => slz()->theme->manifest->get('name'),
		'icon' => 'icon-slzcore-features-block slz-vc-slzcore',
		'tag' => 'slz_features_block' 
);

$cfg ['layouts'] = array (
	'layout-1' => esc_html__( 'United States', 'slz' ),
	'layout-2' => esc_html__( 'India', 'slz' ),
	'layout-3' => esc_html__( 'United Kingdom', 'slz' ),
);

$cfg ['layouts_class'] = array (
	'layout-1' => 'la-united-states',
	'layout-2' => 'la-india',
	'layout-3' => 'la-united-kingdom',
);

$default_value = array();
for ($i = 1; $i <= 3; $i++) {
    $default_value['features_'.$i] = '';
    $default_value['block_bd_cl_'.$i] = '';
    $default_value['block_bd_hv_cl_'.$i] = '';
    $default_value['block_bg_cl_'.$i] = '';
    $default_value['block_bg_hv_cl_'.$i] = '';
}

$cfg ['default_value'] =
	array_merge($default_value, array (

	//general
	'layout'      	=> 'layout-1',
	'extra_class' 	=> '',
	'align'         => 'text-c',

	//style
	'layout-1-style' => 'st-florida',
	'layout-2-style' => 'st-chennai',
	'layout-3-style' => 'st-london',

	//option 
	'column'      	=> '',
	'title_line'    => '',

	//custom color
    'icon_cl'     	=> '',
    'title_cl'      => '',
    'des_cl'        => '',
    'title_line_cl' => '',
    'number_cl'     => '',
    'block_bd_cl'   => '',
));

