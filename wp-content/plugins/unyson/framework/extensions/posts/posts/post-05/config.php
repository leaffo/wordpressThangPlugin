<?php if ( ! defined( 'ABSPATH' ) ) {
	die( 'Forbidden' );
}

$cfg = array();

$posts_extension = slz_ext( 'posts' )->get_post('post_05');

$cfg['general'] = array(
	'name'          => esc_html__( 'Post 05', 'slz' ),
	'description'   => esc_html__( 'Post 05', 'slz' ),
	'small_img'     => array(
		'height' => 70,
		'src'    => $posts_extension->locate_URI('/static/img/thumbnail.png')
	),
	'large_img'     => array(
		'height' => 214,
		'src'    => $posts_extension->locate_URI('/static/img/thumbnail.png')
	)
);
// set blank to get post-thumnail
$cfg ['image_size'] = array (
);
$cfg ['related_image_size'] = array (
	'large' => '370x180',
);

$cfg['title_length'] = 15;

$cfg['excerpt_length'] = 30;
