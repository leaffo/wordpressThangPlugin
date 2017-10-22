<?php if ( ! defined( 'ABSPATH' ) ) {
	die( 'Forbidden' );
}

$ext = slz_ext( 'shortcodes' )->get_shortcode('process');
$ext_instance = slz()->extensions->get( 'shortcodes' );

if ( !is_admin() ) {

    $ext->wp_enqueue_script(
			'slz-extension-'. $ext_instance->get_name() .'-process',
			$ext->locate_URI( '/static/js/process.js' ),
			array( 'jquery' ),
			slz()->manifest->get_version(),
			true
	);
}