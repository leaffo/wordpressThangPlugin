<?php
if ( ! defined( 'ABSPATH' ) ) {
	die ( 'Forbidden' );
}

$cfg = array ();

$cfg ['page_builder'] = array (
	'title'         => esc_html__( 'SLZ Gallery Grid', 'slz' ),
	'description'   => esc_html__( 'List of galleries in grid', 'slz' ),
	'tab'           => slz()->theme->manifest->get('name'),
	'icon'          => 'icon-slzcore-gallery-grid slz-vc-slzcore',
	'tag'           => 'slz_gallery_grid' 
);

$cfg['styles'] = array(
	'st-florida' 	  => esc_html__( 'Florida', 'slz' ),
	'st-california'   => esc_html__( 'California', 'slz' ),
	'st-georgia'  	  => esc_html__( 'Georgia', 'slz' ),
	'st-newyork'  	  => esc_html__( 'New York', 'slz' ),
	'st-illinois'	  => esc_html__( 'Illinois', 'slz' ),
	'st-connecticut'  => esc_html__( 'Connecticut', 'slz' ),
	'st-texas'		  => esc_html__( 'Texas', 'slz' ),
	'st-arizona'	  => esc_html__( 'Arizona', 'slz' ),
// 	'style-9'   => esc_html__( 'Oregon', 'slz' ),
// 	'style-10'  => esc_html__( 'Kentucky', 'slz' ),
// 	'style-11'  => esc_html__( 'Missouri', 'slz' ),
// 	'style-12'  => esc_html__( 'Ohio', 'slz' )
);

$cfg ['image_size'] = array (
	'large'             => '800x600',
	'small'             => '800x600',
);

$cfg ['default_value'] = array (
	'extension'	                 => 'gallery',
	'shortcode'	                 => 'gallery',
	'post_type'                  => 'slz-gallery',
	'style'                      => 'st-florida',
	'image_size'                 => $cfg ['image_size'],
	'offset_post'                => '',
	'limit_post'                 => '-1',
	'sort_by'                    => '',
	'extra_class'                => '',
	'column'                     => '3',
	
	'method_portfolio'           => 'cat',
	'list_category_portfolio'    => '',
	'list_post_portfolio'        => '',
	'method_gallery'             => 'cat',
	'list_category_gallery'      => '',
	'list_post_gallery'          => '',
	'show_category_filter'       => 'yes',
	'list_author'                     => '',
	
	'load_more_btn_text'         => '',
	'show_title'                 => 'yes',
	'show_category'              => 'yes',
	'show_read_more'             => 'yes',
	'show_fancybox_zoomin'       => 'yes',
	
	'cat_color'                  => '',
	'cat_filter_color'           => '',
	'cat_filter_active_color'    => '',
	'title_color'                => '',
	'title_color_hover'          => '',
	'readmore_btn_color'         => '',
	'readmore_btn_hover_color'   => '',
	'zoomin_btn_color'           => '',
	'zoomin_btn_hover_color'     => '',
	'align_category_filter'      => 'text-c',
	'pagination'                 => 'load_more'
);