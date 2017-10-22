<?php if ( ! defined( 'ABSPATH' ) ) {
	die( 'Forbidden' );
}

$ext = slz_ext( 'shortcodes' )->get_shortcode('counter');
$ext_instance = slz()->extensions->get( 'shortcodes' );
if ( !is_admin() ) {
    $ext->wp_enqueue_script(
			'slz-extension-'. $ext_instance->get_name() .'-counter',
			$ext->locate_URI( '/static/js/counter.js' ),
			array( 'jquery' ),
			slz()->manifest->get_version(),
			true
	);
}
