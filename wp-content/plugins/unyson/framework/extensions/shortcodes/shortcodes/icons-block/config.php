<?php

if ( ! defined( 'ABSPATH' ) ) {
	die ( 'Forbidden' );
}

$cfg = array ();

$cfg ['page_builder'] = array (
		'title' => esc_html__( 'SLZ Icons Block', 'slz' ),
		'description' => esc_html__( 'Icons Block of info', 'slz' ),
		'tab' => slz()->theme->manifest->get('name'),
		'icon' => 'icon-slzcore-icons-block slz-vc-slzcore',
		'tag' => 'slz_icons_block' 
);

$cfg ['layouts'] = array (
	'layout-1' => esc_html__( 'United States', 'slz' ),
	'layout-2' => esc_html__( 'India', 'slz' ),
	'layout-3' => esc_html__( 'United Kingdom', 'slz' ),
	'layout-4' => esc_html__( 'Italy', 'slz' ),
);

$cfg ['layouts_class'] = array (
	'layout-1' => 'la-united-states',
	'layout-2' => 'la-india',
	'layout-3' => 'la-united-kingdom',
	'layout-4' => 'la-italy',
);

$icon_default = array();

for ($i = 1; $i <= 2; $i++) {
    $icon_default['icon_bg_cl_'.$i] = '';
    $icon_default['icon_bg_hv_cl_'.$i] = '';
    $icon_default['icon_bd_cl_'.$i] = '';
    $icon_default['icon_bd_hv_cl_'.$i] = '';
}


$cfg ['default_value'] =
	array_merge($icon_default, array (

	//general
	'layout'      	=> 'layout-1',
	'column'      	=> '',
	'option_show'   => '',
	'icon_size'   	=> '',
	'delay_animation'    => '0.5s',
	'item_animation'     => '',
	'icon_box'   	=>'',
	'button_link' 	=>'',
	'btn_text'    	=>'',
	'btn_cl'      	=>'',
	'btn_hv_cl'   	=>'',

	//style
	'layout-1-style' => 'st-florida',
	'layout-2-style' => 'st-chennai',
	'layout-3-style' => 'st-london',
	'layout-4-style' => 'st-milan',

	//option 
	'align'         => '',
	'title_line'    => '',
	'spacing_style' => 'normal',
	'icon_size'     => '',

	//custom color
    'icon_cl'     	=> '',
    'icon_hv_cl'  	=> '',
    'title_cl'      =>'',
    'des_cl'        =>'',
    'extra_class' 	=> '',
    'title_line_cl' =>'',
    'block_bd_cl'   =>'',
    'block_bd_hv_cl' =>'',
));

