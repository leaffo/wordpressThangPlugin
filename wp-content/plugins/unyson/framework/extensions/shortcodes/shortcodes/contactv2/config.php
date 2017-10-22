<?php

if ( ! defined( 'ABSPATH' ) ) {
	die ( 'Forbidden' );
}

$cfg = array ();

$cfg ['page_builder'] = array (
		'title'         => esc_html__ ( 'SLZ Contact V2', 'slz' ),
		'description'   => esc_html__ ( 'Contact information', 'slz' ),
		'tab'           => slz()->theme->manifest->get('name'),
		'icon'          => 'icon-slzcore-contact slz-vc-slzcore',
		'tag'           => 'slz_contactv2'
);

$cfg ['default_info'] = array (
    'column'                => '3',
	'array_info_item'       => '',
    'array_sub_info_item'   => '',
    'title'                 => '',
    'active'                =>'no',
);

$cfg ['default_main_info'] = array (
	'title'  => ''
);

$cfg ['default_sub_info'] = array(
    'sub_info'         => ''
);

$cfg ['layouts'] = array (
	'layout-1' => esc_html__( 'United States', 'slz' )
);

$cfg ['layouts_class'] = array (
	'layout-1' => 'la-united-states'
);

$cfg ['default_value'] = array (
	'layout'               => 'layout-1',
    'layout-1-style'       => 'st-florida',
	'array_info'           => '',
    'array_more_info'      => '',
    'column'               => '3',
	'bg_color'             => '',
	'border_color'         => '',
	'info_color'           => '',
	'title_color'          => '',
    'sub_icon_color'       => '',
    'extra_class'          => '',
    'des_color'            => '',
    'main-icon'            => '',
    'main_icon_color'      => '',
    'main_icon_hv_color'   => '',
    'main_ic_bg_color'     => '',
    'main_ic_bg_hv_color'  => '',
    'bg_hv_color'          => '',
    'info_hv_color'        => '',
    'sub_icon_hv_color'    => '',
    'bd_color'             => '',
    'bd_hv_color'          => '',
    'icon_library'         => 'vs',
    'icon_vs'              => '',
    'icon_openiconic'      => '',
    'icon_typicons'        => '',
    'icon_entypo'          => '',
    'icon_linecons'        => '',
    'icon_monosocial'      => '',
);
SLZ_Params::get_icon_params_vc($cfg ['default_value']);