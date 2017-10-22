<?php if ( ! defined( 'ABSPATH' ) ) {
	die( 'Forbidden' );
}

if ( !is_admin() ) {
	$ext = slz_ext( 'shortcodes' )->get_shortcode('posts_mansory');
	$shortcode_instance = slz()->extensions->get( 'shortcodes' );

    //	add lib
    $ext->wp_enqueue_script(
        'isotope.pkgd.min',
        $ext->locate_URI( '/static/libs/isotope/isotope.pkgd.min.js' ),
        array( 'jquery' ),
        slz()->manifest->get_version(),
        true
    );

    $ext->wp_enqueue_script(
			'slz-extension-'. $shortcode_instance->get_name() .'-post-mansory',
			$ext->locate_URI( '/static/js/post-mansory.js' ),
			array( 'jquery' ),
			slz()->manifest->get_version(),
			true
	);
}