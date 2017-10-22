<?php if ( ! defined( 'ABSPATH' ) ) {
	die ( 'Forbidden' );
}

$theme_name = slz()->theme->manifest->get( 'prefix' );

$cfg = array(
	/*
	 * Shortcode info
	 */
	'page_builder'  => array(
		'title'       => esc_html__( 'SLZ About Me', 'slz' ),
		'description' => esc_html__( 'Show about me block', 'slz' ),
		'tab'         => slz()->theme->manifest->get( 'name' ),
		'icon'        => 'icon-slzcore-about-me slz-vc-slzcore',
		'tag'         => 'slz_about_me'
	),
	/**
	 * Layout
	 */
	'layouts'       => array(
		'layout-1' => esc_html__( 'United States', 'slz' ),
		'layout-2' => esc_html__( 'India', 'slz' ),
	),
	/**
	 * Thumbnail size
	 */
	'thumb_sizes'   => array(
		'layout-1' => $theme_name . '-thumb-100x100',
		'layout-2' => $theme_name . '-thumb-100x100',
	),
	/**
	 * Default value
	 */
	'default_value' => array(
		'layout'            => 'layout-1',
		'block_title'       => '',
		'block_title_color' => '',
		'name'              => '',
		'avatar'            => '',
		'detail'            => '',
		'social'            => '',
		'extra_class'       => '',
		'position'          => '',
		'short_info'        => '',
		'web_link'          => '',
		'layout-1-style'    => 'st-florida',
		'layout-2-style'    => 'st-chennai',
	),
);
