<?php if ( ! defined( 'ABSPATH' ) ) {
	die( 'Forbidden' );
}

$manifest = array(
	'name'        => esc_html__( 'FAQ', 'slz' ),
	'description' => esc_html__( 'This extension use add to FAQ.', 'slz' ),
	'thumbnail'   => slz_get_framework_directory_uri( '/extensions/teams/static/img/faq.jpg' ),
	'version'     => '1.0',
	'display'     => true,
	'standalone'  => true,
);