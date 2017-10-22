<?php

if ( ! defined( 'ABSPATH' ) ) {
	die ( 'Forbidden' );
}

$cfg = array ();

$cfg ['page_builder'] = array (
		'title' => esc_html__ ( 'SLZ Posts Grid', 'slz' ),
		'description' => esc_html__ ( 'List of posts in grid', 'slz' ),
		'tab' => slz()->theme->manifest->get('name'),
		'icon' => 'icon-slzcore-posts-grid slz-vc-slzcore',
		'tag' => 'slz_posts_grid' 
);
$cfg['layouts'] = array(
	'layout-1'  => esc_html__( 'United States', 'slz' ),
	'layout-2'  => esc_html__( 'India', 'slz' ),
	'layout-3'  => esc_html__( 'United Kingdom', 'slz' ),
	'layout-4'  => esc_html__( 'Italy', 'slz' ),
); // vc options

$cfg ['image_size'] = array (
	'large'          => '800x500',
	'no-image-large' => '800x500',
	'small'          => '800x400',
	'no-image-small' => '800x400',
);

$cfg['title_length'] = 15;

$cfg['excerpt_length'] = 30;

$cfg ['default_value'] = array (
	'shortcode'           => 'posts-grid',
	'image_size'          => $cfg ['image_size'],
	'layout'              => 'layout-1',
	
	'style'               => 'style-1',
	'position'            => 'left',

	'show_excerpt'        => 'show',
	'show_category'       => 'show',
	'excerpt_length'      => '15',
	'block_title'         => '',
	'block_title_color'   => '',
	'block_title_class'   => 'slz-title-shortcode',

	'btn_read_more'       => '',
	'column'              => '3',
	'limit_post'          => '-1',
	'offset_post'         => '0',
	'pagination'          => '',
	'max_post'            => '',
	'sort_by'             => '',
	'extra_class'         => '',
	
	'post_format'         => '',
	'category_list'       => '',
	'tag_list'            => '',
	'author_list'         => '',

	'category_filter'     => '',
	'category_filter_text' => esc_html__ ( 'All', 'slz' ),
	
	'layout-2-style'      => '',
	'layout-3-style'      => '',
	'layout-4-style'      => '',
	'layout-5-style'      => '',
);
$cfg ['layouts_class'] = array (
	'layout-1' 		=> 'la-united-states',
	'layout-2' 		=> 'la-india',
	'layout-3' 		=> 'la-united-kingdom',
	'layout-4' 		=> 'la-italy',
);
$cfg ['style_default'] = array (
	'layout-2-style' => 'st-chennai',
	'layout-3-style' => 'st-london',
	'layout-4-style' => 'st-milan',
);