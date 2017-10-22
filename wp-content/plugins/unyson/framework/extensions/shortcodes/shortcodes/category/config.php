<?php

if ( ! defined( 'ABSPATH' ) ) {
	die ( 'Forbidden' );
}

$cfg = array ();

$cfg ['page_builder'] = array (
		'title' => esc_html__ ( 'SLZ Category', 'slz' ),
		'description' => esc_html__ ( 'Show list of category.', 'slz' ),
		'tab' => slz()->theme->manifest->get('name'),
		'icon' => 'icon-slzcore-category slz-vc-slzcore',
		'tag' => 'slz_category'
);

$cfg['all_ext'] = array(
	'slz-posts'       => 'posts',
	'slz-portfolio'   => 'portfolio',
	'slz-service'     => 'services',
	'slz-team'        => 'teams',
	'slz-causes'      => 'donation',
	'slz-event'       => 'events',
	'slz-recruitment' => 'recruitment',
);
$cfg['ext_title'] = array(
	'slz-posts'       => esc_html__ ( 'Post', 'slz' ),
	'slz-portfolio'   => esc_html__ ( 'Portfolio', 'slz' ),
	'slz-service'     => esc_html__ ( 'Service', 'slz' ),
	'slz-team'        => esc_html__ ( 'Team', 'slz' ),
	'slz-causes'      => esc_html__ ( 'Cause', 'slz' ),
	'slz-event'       => esc_html__ ( 'Event', 'slz' ),
	'slz-recruitment' => esc_html__ ( 'Recruitment', 'slz' ),
);
$cfg['ext_cat_title'] = array(
	'slz-posts'       => esc_html__ ( '-All Post Categories-', 'slz' ),
	'slz-portfolio'   => esc_html__ ( '-All Portfolio Categories-', 'slz' ),
	'slz-service'     => esc_html__ ( '-All Service Categories-', 'slz' ),
	'slz-team'        => esc_html__ ( '-All Team Categories-', 'slz' ),
	'slz-causes'      => esc_html__ ( '-All Cause Categories-', 'slz' ),
	'slz-event'       => esc_html__ ( '-All Event Categories-', 'slz' ),
	'slz-recruitment' => esc_html__ ( '-All Recruitment Categories-', 'slz' ),
);
$cfg ['styles'] = array (
	'1'  => esc_html__( 'Florida', 'slz' ),
	'2'  => esc_html__( 'California', 'slz' ),
	'3'  => esc_html__( 'Georgia', 'slz' )
);



$cfg ['default_value'] = array (
		'style'        				=> '1',
		'block_title' 	    		=> '',
		'block_title_color'     	=> '',
		'block_title_class'			=> 'slz-title-shortcode',
		'sort_by'					=> '',
		'order_sort'        		=> 'ASC',
		'number'   					=> 20,
		'offset_cat'        		=> '',
		'category_list_choose'  	=> '',
		'extra_class'    			=> '',
        'posttype_slug'             => 'slz-posts',
);

foreach ( $cfg['all_ext'] as $k => $v ) {
    $cfg ['default_value'][str_replace( '-', '_', $k ).'_list_choose'] = '';
}