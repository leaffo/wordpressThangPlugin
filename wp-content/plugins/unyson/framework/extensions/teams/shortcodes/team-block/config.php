<?php

if ( ! defined( 'ABSPATH' ) ) {
	die ( 'Forbidden' );
}

$cfg = array ();

$cfg ['page_builder'] = array (
	'title'			=> esc_html__( 'SLZ Teams Block', 'slz' ),
	'description'	=> esc_html__( 'List of teams', 'slz' ),
	'tab'			=> slz()->theme->manifest->get('name'),
	'icon'			=> 'icon-slzcore-team-block slz-vc-slzcore',
	'tag'			=> 'slz_team_block' 
);

$cfg ['image_size'] = array (
	'default' => array(
		'large'				=> '600x600',
		'small'				=> '350x350',
	),
	'layout-1' => array(
		'large'				=> '450x700',
		'small'				=> '450x700',
	)
);

$cfg ['layouts'] = array (
	'layout-1' 		=> esc_html__( 'United States', 'slz' ),
	'layout-2' 		=> esc_html__( 'India', 'slz' ),
	'layout-3' 		=> esc_html__( 'United Kingdom', 'slz' ),
	'layout-4' 		=> esc_html__( 'Italy', 'slz' ),
);
$cfg ['layouts_class'] = array (
	'layout-1' 		=> 'la-united-states',
	'layout-2' 		=> 'la-india',
	'layout-3' 		=> 'la-united-kingdom',
	'layout-4' 		=> 'la-italy',
	'layout-5' 		=> 'la-turkey',
);
$cfg ['default_value'] = array (
	'extension'				=> 'teams',
	'shortcode'				=> 'team_block',
	'template'				=> 'team',
	'image_size'			=> $cfg ['image_size'],

	'layout'				=> 'layout-1',
	'column'				=> '3',
	'exclude_id'			=> '',
	'offset_post'			=> '',
	'limit_post'			=> '-1',
	'max_post'				=> '',
	'sort_by'				=> '',
	'extra_class'			=> '',
	'pagination'			=> 'no',
	'method' 				=> 'cat',
	'list_category' 		=> '',
	'list_post' 			=> '',
	'category_slug' 		=> '',
	'option_show'			=> '',
	
	'btn_content'           => '',
	'show_thumbnail'		=> 'yes',
	'show_description'		=> 'yes',
	'description_lenghth'	=> '',
	'show_position'			=> 'yes',
	'show_contact_info'		=> 'no',
	'show_quote'			=> 'yes',
	'show_social'			=> 'yes',

	'color_title'			=> '',
	'color_title_hv'		=> '',
	'color_position'		=> '',
	'color_info'			=> '',
	'color_hv_info'			=> '',
	'color_description'		=> '',
	'color_social'			=> '',
	'color_social_hv'		=> '',
	
	'show_slider'           => 'no',
	'slide_to_show'         => '3',
	'slide_autoplay'        => '1',
	'slide_dots'            => '1',
	'slide_arrows'          => '1',
	'slide_infinite'        => '1',
	'slide_speed'           => '600',
	'color_slide_arrow'     => '',
	'color_slide_arrow_hv'  => '',
	'color_slide_arrow_bg'  => '',
	'color_slide_arrow_bg_hv' => '',
	'color_slide_dots'      => '',

	'layout-1-style'			=> '',
	'layout-2-style'			=> '',
	'layout-3-style'			=> '',
	'layout-4-style'			=> '',
);