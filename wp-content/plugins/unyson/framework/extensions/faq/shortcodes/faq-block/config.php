<?php if ( ! defined( 'ABSPATH' ) ) {
	die ( 'Forbidden' );
}

$cfg = array(
	/**
	 * Shortcode Info
	 */
	'page_builder'  => array(
		'title'       => esc_html__( 'SLZ FAQ Block', 'slz' ),
		'description' => esc_html__( 'Show list of FAQ.', 'slz' ),
		'tab'         => slz()->theme->manifest->get( 'name' ),
		'icon'        => 'icon-slzcore-category slz-vc-slzcore',
		'tag'         => 'slz_faq_block',
	),
	/**
	 * Default value
	 */
	'default_value' => array(
		'display_title'        => 'y',
		'display_readmore'     => 'y',
		'pagination'           => 'n',
		'category_slug'        => '',
		'limit_post'           => - 1,
		'offset_post'          => 0,
		'extra_class'          => '',
		'icon_library'         => '',
		'icon_vs'              => '',
		'icon_openiconic'      => '',
		'icon_typicons'        => '',
		'icon_entypo'          => '',
		'icon_linecons'        => '',
		'icon_monosocial'      => '',
		'icon_material'        => '',
		'icon_ionicons'        => '',
		'title_color'          => '',
		'title_color_hover'    => '',
		'item_color'           => '',
		'item_color_hover'     => '',
		'icon_color'           => '',
		'icon_color_hover'     => '',
		'readmore_color'       => '',
		'readmore_color_hover' => '',
	),
);
