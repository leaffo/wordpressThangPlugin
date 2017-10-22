<?php

if ( ! defined( 'ABSPATH' ) ) {
	die ( 'Forbidden' );
}

$cfg = array ();

$cfg ['page_builder'] = array (
	'title'			=> esc_html__( 'SLZ Testimonial', 'slz' ),
	'description'	=> esc_html__( 'Slider of testimonials', 'slz' ),
	'tab'			=> slz()->theme->manifest->get('name'),
	'icon'			=> 'icon-slzcore-testimonial slz-vc-slzcore',
	'tag'			=> 'slz_testimonial' 
);

$cfg ['layouts'] = array (
	'layout-1'		=> esc_html__('United States', 'slz'),
	'layout-2'		=> esc_html__('India', 'slz'),
	'layout-3'		=> esc_html__('United Kingdom', 'slz'),
	'layout-4'		=> esc_html__('Italy', 'slz'),
	'layout-5'		=> esc_html__('Turkey', 'slz'),
);

$cfg ['layouts_class'] = array (
	'layout-1' 		=> 'la-united-states',
	'layout-2' 		=> 'la-india',
	'layout-3' 		=> 'la-united-kingdom',
	'layout-4' 		=> 'la-italy',
	'layout-5' 		=> 'la-turkey',
);

$cfg ['image_size'] = array (
	'large'				=> '350x350',
	'no-image-large'	=> '350x350',
);

$cfg ['default_value'] = array (
	'extension'				=> 'testimonials',
	'shortcode'				=> 'testimonial',
	'layout'				=> 'layout-1',

	// style
	'layout-1-style' 		=> 'st-florida',
	'layout-2-style' 		=> 'st-chennai',
	'layout-3-style' 		=> 'st-london',
	'layout-4-style' 		=> 'st-milan',
	'layout-5-style' 		=> 'st-istanbul',

	// option
	'align'					=> '',
	'show_icon_quote'		=> 'yes',
	'image_size'			=> $cfg ['image_size'],
	'offset_post'			=> '',
	'limit_post'			=> '-1',
	'sort_by'				=> '',
	'show_position'         => 'yes',
	'show_ratings'          => 'yes',
	'show_image_1'          => '2',
	'show_image_2'          => '0',
	'extra_class'			=> '',
	'method' 				=> 'cat',
	'list_category' 		=> '',
	'list_post' 			=> '',

	// customs item
	'position_color'        => '',
	'description_color'     => '',
	'title_color'           => '',
	'quote_color'           => '',
	'bg_color_1'            => '',
	'bg_color_2'            => '',
	'bg_color_3'            => '',
	'bg_color_4'            => '',
	'border_color_1'        => '',
	'border_color_2'        => '',
	'border_color_3'        => '',
	'border_color_4'        => '',
	'bg_f_image_1'          => 'no',
	'bg_f_image_2'          => 'no',
	'bg_f_image_3'          => 'no',
	'bg_f_image_4'          => 'no',

	// customs slider
	'dots_color'            => '',
	'arrows_color'          => '',
	'arrows_hv_color'       => '',
	'arrows_bg_hv_color'    => '',
	'arrows_bg_color'       => '',

	// slider
	'slide_infinite'        => '1',
	'show_arrows'           => '1',
	'show_dots'		        => '1',
	'slide_autoplay'        => '1',
	'slide_speed'           => '600',
	'item_show'    	        => '2',
);