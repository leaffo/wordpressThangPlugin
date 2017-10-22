<?php if ( ! defined( 'ABSPATH' ) ) {
	die( 'Forbidden' );
}

$shortcode = slz_ext('shortcodes')->get_shortcode('ads_banner_carousel');

$shortcode->wp_enqueue_script( 'slz_ads_banner_carousel',
	$shortcode->locate_URI( '/statics/js/ads-banner-carousel.js' ),
	array( 'jquery' ),
	slz()->manifest->get_version(),
	true
);