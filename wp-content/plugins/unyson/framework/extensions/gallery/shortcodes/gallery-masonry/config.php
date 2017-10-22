<?php

if ( ! defined( 'ABSPATH' ) ) {
	die ( 'Forbidden' );
}

$cfg = array ();

$cfg ['page_builder'] = array (
	'title'         => esc_html__( 'SLZ Gallery Masonry', 'slz' ),
	'description'   => esc_html__( 'Gallery Masonry of post feature image from custom post type', 'slz' ),
	'tab'           => slz()->theme->manifest->get('name'),
	'icon'          => 'icon-slzcore-gallery-masonry slz-vc-slzcore',
	'tag'           => 'slz_gallery_masonry' 
);

$cfg ['image_size'] = array (
	'large'             => 'full',
);

$cfg ['default_value'] = array (
	'extension'	                 => 'gallery',
	'shortcode'	                 => 'gallery',
	'post_type'                  => 'slz-gallery',
	'style'                      => 'style-1',
	'image_size'                 => $cfg ['image_size'],
	'offset_post'                => '',
	'limit_post'                 => '-1',
	'sort_by'                    => '',
	'extra_class'                => '',
	'method_portfolio'           => 'cat',
	'list_category_portfolio'    => '',
	'list_post_portfolio'        => '',
	'method_gallery'             => 'cat',
	'list_category_gallery'      => '',
	'list_post_gallery'          => '',
	'show_category_filter'       => 'yes',
	'load_more_btn_text'         => '',
	'show_title'                 => 'yes',
	'show_category'              => 'yes',
	'show_meta_data'             => 'no',
	'show_description'           => 'yes',
	'show_read_more'             => 'yes',
	'show_fancybox_zoomin'       => 'yes',
	
	'cat_filter_color'           => '',
	'cat_filter_active_color'    => '',
	'cat_color'                  => '',
	'title_color'                => '',
	'title_color_hover'          => '',
	'meta_data_color'            => '',
	'meta_data_hover_color'      => '',
	'description_color'          => '',
	'readmore_btn_color'         => '',
	'readmore_btn_hover_color'   => '',
	'zoomin_btn_color'           => '',
	'zoomin_btn_hover_color'     => '',
	'align_category_filter'      => 'text-c',
	'pagination'                 => 'load_more',
	'option_show'                => 'option-1',
	'column'					 => 'column-2',
);