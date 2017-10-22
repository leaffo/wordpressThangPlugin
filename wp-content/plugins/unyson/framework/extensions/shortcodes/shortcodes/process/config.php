<?php

if ( ! defined( 'ABSPATH' ) ) {
	die ( 'Forbidden' );
}

$cfg = array ();

$cfg ['page_builder'] = array (
		'title' => esc_html__( 'SLZ Process', 'slz' ),
		'description' => esc_html__( 'Show process of anything', 'slz' ),
		'tab' => slz()->theme->manifest->get('name'),
		'icon' => 'icon-slzcore-process slz-vc-slzcore',
		'tag' => 'slz_process' 
);

$cfg['layouts'] = array(
	'layout-1'  => esc_html__( 'United States', 'slz' ),
	'layout-2'  => esc_html__( 'India', 'slz' ),
	'layout-3'  => esc_html__( 'United Kingdom', 'slz' )
);

$cfg ['layouts_class'] = array (
	'layout-1' => 'la-united-states',
	'layout-2' => 'la-india',
	'layout-3' => 'la-united-kingdom',
);

$cfg ['default_value'] =
array (

	//general
	'layout'      	=> 'layout-1',
	'column'      	=> '',
	'option_show'   => '',
	'icon_size'   	=> '',
	'delay_animation'    => '0.5s',
	'item_animation'     => '',
	'add_step'   	=>'',
	'add_step_2'    =>'',
	'add_step_3'    =>'',
	//style
	'layout-1-style' => 'st-florida',
	'layout-2-style' => 'st-chennai',
	'layout-3-style' => 'st-london',

	//option 
	'title_line'    => '',
	'spacing_style' => 'normal',
	'icon_size'     => '',

	//custom color
    'title_cl'      =>'',
    'des_cl'        =>'',
    'extra_class' 	=> '',
    'percent_cl'=>'',
);
