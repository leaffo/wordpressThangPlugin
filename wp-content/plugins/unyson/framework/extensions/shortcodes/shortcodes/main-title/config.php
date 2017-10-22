<?php

if ( ! defined( 'ABSPATH' ) ) {
	die ( 'Forbidden' );
}

$cfg = array ();

$cfg ['page_builder'] = array (
		'title' => esc_html__ ( 'SLZ Main Title', 'slz' ),
		'description' => esc_html__ ( 'Main Title', 'slz' ),
		'tab' => slz()->theme->manifest->get('name'),
		'icon' => 'icon-slzcore-main-title slz-vc-slzcore',
		'tag' => 'slz_main_title'
);

$cfg ['layouts'] = array (
	'layout-1' => esc_html__( 'United States', 'slz' ),
	'layout-2' => esc_html__( 'India', 'slz' )
);

$cfg ['layouts_class'] = array (
	'layout-1' => 'la-united-states',
	'layout-2' => 'la-india',
);

$cfg ['default_value'] = array (

	'layout'                 => 'layout-1',
	'layout-1-style'         => 'st-florida',
	'layout-2-style'         => 'st-chennai',
	'align'                  => 'left',
	'subtitle'               => '',
	'title'                  => '',
	'title_line'             => '',
	'line_cl'                => '',
	'show_icon'	             => '2',
	'image'                  => '',
	'icon_library'           => 'vs',
	'extra_title'            => '',
	'subtitle_cl'            => '',
	'title_cl'               => '',
	'extra_title_cl'         => '',
	'icon_cl'                => '',
	'extra_class'            => '',
	'css'                    => '',
);
SLZ_Params::get_icon_params_vc($cfg ['default_value']);