<?php

if ( ! defined( 'ABSPATH' ) ) {
	die ( 'Forbidden' );
}

$cfg = array ();

$cfg ['page_builder'] = array (
	'title' => esc_html__( 'SLZ Pricing Box', 'slz' ),
	'description' => esc_html__( 'Box of pricing info', 'slz' ),
	'tab' => slz()->theme->manifest->get('name'),
	'icon' => 'icon-slzcore-pricing-box slz-vc-slzcore',
	'tag' => 'slz_pricing_box' 
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

$default_value = array();

for ( $i = 1; $i <= 4; $i++ ) {

    $default_value['title'.$i] = '';
    $default_value['title_cl'.$i] = '';
    $default_value['price'.$i] = '';
    $default_value['price_cl'.$i] = '';
    $default_value['unit'.$i] = '';
    $default_value['separate'.$i] = '';
    $default_value['price_subfix_cl'.$i] = '';
    $default_value['currency'.$i] = '';
    $default_value['sub_title'.$i] = '';
    $default_value['sub_title_cl'.$i] = '';
    $default_value['features'.$i] = '';
    $default_value['btn_text'.$i] = '';
    $default_value['btn_cl'.$i] = '';
    $default_value['btn_bg_cl'.$i] = '';
    $default_value['btn_hv_cl'.$i] = '';
    $default_value['btn_bg_hv_cl'.$i] = '';
    $default_value['btn_link'.$i] = '';
    $default_value['active'.$i] = '';
    $default_value['label'.$i] = '';
    $default_value['label_text_cl'.$i] = '';
    $default_value['label_bg_cl'.$i] = '';
    $default_value['header_bg_cl'.$i] = '';
}

$cfg ['default_value'] = array_merge( $default_value,array(

	'layout'         => 'layout-1',
	'column'         => '1',
	'extra_class'    => '',

	//style
	'layout-1-style' => 'st-florida',
	'layout-2-style' => 'st-chennai',
	'layout-3-style' => 'st-london',
	'layout-4-style' => 'st-milan'
	)
);