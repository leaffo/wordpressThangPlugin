<?php if ( ! defined( 'ABSPATH' ) ) {
	die( 'Forbidden' );
}

$ext = slz_ext( 'shortcodes' )->get_shortcode('image_carousel');
$ext_instance = slz()->extensions->get( 'shortcodes' );
if ( !is_admin() ) {
    $ext->wp_enqueue_script(
        'slick-slider',
        $ext->locate_URI( '/static/libs/slick-slider/slick.js' ),
        array( 'jquery' ),
        slz()->manifest->get_version(),
        true
    );

    $ext->wp_enqueue_script(
        'modernizr.custom',
        $ext->locate_URI( '/static/libs/directional-hover/modernizr.custom.js' ),
        array( 'jquery' ),
        slz()->manifest->get_version(),
        true
    );
    $ext->wp_enqueue_script(
        'jquery.hoverdir',
        $ext->locate_URI( '/static/libs/directional-hover/jquery.hoverdir.js' ),
        array( 'jquery' ),
        slz()->manifest->get_version(),
        true
    );

    $ext->wp_enqueue_script(
			'slz-extension-'. $ext_instance->get_name() .'-image-carousel',
			$ext->locate_URI( '/static/js/image-carousel.js' ),
			array( 'jquery' , 'slick-slider'),
			slz()->manifest->get_version(),
			true
	);
    $ext->wp_enqueue_style(
        'slick',
        $ext->locate_URI( '/static/libs/slick-slider/slick.css' ),
        array(),
        slz()->manifest->get_version(),
        true
    );
    $ext->wp_enqueue_style(
        'slick-theme',
        $ext->locate_URI( '/static/libs/slick-slider/slick-theme.css' ),
        array(),
        slz()->manifest->get_version(),
        true
    );
}