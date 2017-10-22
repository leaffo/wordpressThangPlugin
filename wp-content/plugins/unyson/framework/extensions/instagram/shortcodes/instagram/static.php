<?php if ( ! defined( 'ABSPATH' ) ) {
    die( 'Forbidden' );
}

$ext = slz_ext('shortcodes')->get_shortcode('instagram');
if (!is_admin()) {
    wp_enqueue_script(
        'instagram-carousel',
        $ext->locate_URI('/static/js/instagram-carousel.js'),
        array('jquery'),
        false,
        true
    );
}
