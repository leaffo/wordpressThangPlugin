<?php if ( ! defined( 'ABSPATH' ) ) {
	die( 'Forbidden' );
}

$cfg = array(
	'general'       => array(
		'id'          => __( 'faq-category', 'slz' ),
		'name'        => __( 'SLZ: FAQ Categories', 'slz' ),
		'description' => __( 'A list of FAQ categories.', 'slz' ),
		'classname'   => 'slz-widget-faq-category'
	),
	'default_value' => array(
		'title'             => esc_html__( 'FAQ Categories', 'slz' ),
		'category_slug'     => array( '' ),
		'block_title_color' => '#',
	),
);
