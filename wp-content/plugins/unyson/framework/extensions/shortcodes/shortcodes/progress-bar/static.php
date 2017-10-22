<?php if ( ! defined( 'ABSPATH' ) ) {
	die( 'Forbidden' );
}

$ext = slz_ext( 'shortcodes' )->get_shortcode('progress_bar');
$ext_instance = slz()->extensions->get( 'shortcodes' );

if ( !is_admin() ) {
    $ext->wp_enqueue_script(
        'jquery.countTo',
        $ext->locate_URI( '/static/js/jquery.countTo.js' ),
        array( 'jquery' ),
        slz()->manifest->get_version(),
        true
    );
    $ext->wp_enqueue_script(
			'slz-extension-'. $ext_instance->get_name() .'-progress-bar',
			$ext->locate_URI( '/static/js/progress-bar.js' ),
			array( 'jquery', 'jquery.countTo'),
			slz()->manifest->get_version(),
			true
	);
}