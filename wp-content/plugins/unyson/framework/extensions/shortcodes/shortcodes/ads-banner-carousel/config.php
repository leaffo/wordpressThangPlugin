<?php if ( ! defined( 'ABSPATH' ) ) {
	die ( 'Forbidden' );
}

$cfg = array(
	/*
	 * Shortcode info
	 */
	'page_builder'  => array(
		'title'       => esc_html__( 'SLZ Ads Banner Carousel', 'slz' ),
		'description' => esc_html__( 'Show the advertisement banner as slider on your page.', 'slz' ),
		'tab'         => slz()->theme->manifest->get( 'name' ),
		'icon'        => 'icon-slzcore-ads-banner-carousel slz-vc-slzcore',
		'tag'         => 'slz_ads_banner_carousel'
	),
	'layouts'       => array(
		'layout-1' => esc_html__( 'United States', 'slz' ),
	),
	/**
	 * Default value
	 */
	'default_value' => array(
		'layout'            => 'layout-1',
		'style'             => 'la-florida',
		'block_title'       => '',
		'block_title_color' => '',
		'ads'               => '',
		'extra_class'       => '',
		'slide_to_show'     => 3,
		'slide_autoplay'    => true,
		'slide_dots'        => true,
		'slide_arrows'      => true,
		'slide_infinite'    => true,
		'slide_speed'       => 600,
	),
);


