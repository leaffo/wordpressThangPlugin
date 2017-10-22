<?php

if ( ! defined( 'ABSPATH' ) ) {
	die ( 'Forbidden' );
}

$cfg = array ();

$cfg ['page_builder'] = array (
	'title'			=> esc_html__( 'SLZ Service Block', 'slz' ),
	'description'	=> esc_html__( 'List of services.', 'slz' ),
	'tab'			=> slz()->theme->manifest->get('name'),
	'icon'			=> 'icon-slzcore-service-block slz-vc-slzcore',
	'tag'			=> 'slz_service_block' 
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


$cfg ['default_value'] = array_merge( $icon_default ,array (
	//general
	'layout'            => 'layout-1',
	
	'option_show'       => '',
	'delay_animation'   => '0.5s',
	'item_animation'    => '',
	'icon_box'          =>'',
	'button_link'       =>'',
	'btn_text'          =>'',
	'btn_cl'            =>'',
	'btn_hv_cl'         =>'',
	'column'            => '3',
	'limit_post'        => '-1',
	'offset_post'       => '0',
	'pagination'        => 'no',
	'sort_by'           => '',
	'extra_class'       => '',
	
	//style
	'layout-1-style'    => 'st-florida',
	'layout-2-style'    => 'st-chennai',
	'layout-3-style'    => 'st-london',
	'layout-4-style'    => 'st-milan',
	'layout-5-style'    => '',

	// Option
	'align'         =>'',
	'title_line'    => '',
	'spacing_style' => 'normal',
	'icon_size'     => '',
	'show_icon'     => '',
	'description'   => 'excerpt',
	'btn_content'   => '',
	'bg_image'      => '',
	
	// Filter
	'method'        => 'cat',
	'list_category' => '',
	'list_post'     => '',
	'category_slug' => '',
	
	// Custom Color
	'icon_cl'        => '',
	'icon_hv_cl'     => '',
	'title_cl'       =>'',
	'title_line_cl'  =>'',
	'des_cl'         =>'',
	'block_bd_cl'    =>'',
	'block_bd_hv_cl' =>'',
	'btn_cl'         => '',
	'btn_bg_cl'      => '',
	'block_bg_cl'    => '',
	'btn_hv_cl'      => '',
	'btn_bg_hv_cl'   => '',
	'block_bg_hv_cl' => '',
	
	'show_slider'       => 'no',
	'slide_to_show'     => '',
	'slide_dots'        => 'yes',
	'slide_arrows'      => 'yes',
	'slide_autoplay'    => 'yes',
	'slide_infinite'    => 'yes',
	'slide_speed'       => '',
	'color_slide_arrow' => '',
	'color_slide_arrow_hv' => '',
	'color_slide_arrow_bg' => '',
	'color_slide_arrow_bg_hv' => '',
	'color_slide_dots'        => '',
	)
);