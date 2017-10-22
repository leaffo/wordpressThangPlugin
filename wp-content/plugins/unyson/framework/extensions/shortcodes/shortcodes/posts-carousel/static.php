<?php if ( ! defined( 'ABSPATH' ) ) {
	die( 'Forbidden' );
}

if ( !is_admin() ) {

	$ext = slz_ext( 'shortcodes' )->get_shortcode('posts_carousel');

    $ext->wp_enqueue_script(
		'slz-extension-shortcodes-posts-carousel-template10-script',
		$ext->locate_URI('/static/js/carousel.js'),
		array( 'jquery'),
		slz_ext( 'shortcodes' )->manifest->get_version(),
		true
	);

}