<?php if ( ! defined( 'ABSPATH' ) ) {
	die( 'Forbidden' );
}

$ext = slz_ext( 'faq' );

// Load js for Event Block Shortcode
wp_enqueue_script(
	'slz-extension-' . $ext->get_name() . '-faq-shortcode',
	$ext->locate_URI( '/static/js/faq.js' ),
	array( 'jquery' ),
	$ext->manifest->get_version(),
	true
);