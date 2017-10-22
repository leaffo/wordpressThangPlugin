<?php if ( ! defined( 'ABSPATH' ) ) {
	die ( 'Forbidden' );
}

$cfg = array(
	/*
	 * Shortcode info
	 */
	'page_builder'  => array(
		'title'       => esc_html__( 'SLZ Ads Banner', 'slz' ),
		'description' => esc_html__( 'Show the banner in your page', 'slz' ),
		'tab'         => slz()->theme->manifest->get( 'name' ),
		'icon'        => 'icon-slzcore-ads-banner slz-vc-slzcore',
		'tag'         => 'slz_ads_banner'
	),
	/**
	 * Default value
	 */
	'default_value' => array(
		'block_title'       => '',
		'block_title_color' => '',
		'adspot'            => '',
		'extra_class'       => '',
	),
);

