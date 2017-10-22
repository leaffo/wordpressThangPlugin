<?php if ( ! defined( 'ABSPATH' ) ) {
	die( 'Forbidden' );
}

$taxonomy  = 'slz-faq-cat';
$shortcode  = slz_ext( 'shortcodes' )->get_shortcode( 'faq-block' );

$y_n = array( esc_html__( 'Yes', 'slz' ) => 'y', esc_html__( 'No', 'slz' ) => 'n' );

$categories = SLZ_Com::get_tax_options2slug( $taxonomy, array(
	'empty' => esc_html__( '- All Categories -', 'slz' ),
) );

$icon_options = $shortcode->get_icon_library_options();

$params = array(
	array(
		'type'        => 'dropdown',
		'admin_label' => true,
		'heading'     => esc_html__( 'Category', 'slz' ),
		'param_name'  => 'category_slug',
		'value'       => $categories,
		'description' => esc_html__( 'Choose category to show.', 'slz' ),
	),
	array(
		'type'        => 'dropdown',
		'heading'     => esc_html__( 'Display Title', 'slz' ),
		'param_name'  => 'display_title',
		'value'       => $y_n,
		'std'         => 'y',
		'description' => esc_html__( 'Choose to show category title.', 'slz' ),
	),
	array(
		'type'        => 'dropdown',
		'heading'     => esc_html__( 'Display Readmore', 'slz' ),
		'param_name'  => 'display_readmore',
		'value'       => $y_n,
		'std'         => 'y',
		'description' => esc_html__( 'Choose to show readmore buton.', 'slz' ),
	),
	array(
		'type'        => 'dropdown',
		'heading'     => esc_html__( 'Pagination', 'slz' ),
		'param_name'  => 'pagination',
		'value'       => $y_n,
		'std'         => 'n',
		'description' => esc_html__( 'Choose to show pagination.', 'slz' ),
	),
);

$params = array_merge( $params, $icon_options );

$params = array_merge( $params, array(
	array(
		'type'        => 'textfield',
		'heading'     => esc_html__( 'Limit Posts', 'slz' ),
		'param_name'  => 'limit_post',
		'description' => esc_html__( 'Add limit posts per page. Set -1 or empty to show all. The number of posts to display. If it blank the number posts will be the number from Settings -> Reading', 'slz' ),
	),
	array(
		'type'        => 'textfield',
		'heading'     => esc_html__( 'Offset Post', 'slz' ),
		'param_name'  => 'offset_post',
		'description' => esc_html__( 'Enter offset to pass over posts. If you want to start on record 6, using offset 5', 'slz' )
	),
	array(
		'type'        => 'textfield',
		'heading'     => esc_html__( 'Extra Class', 'slz' ),
		'param_name'  => 'extra_class',
		'description' => esc_html__( 'Add extra class to block', 'slz' )
	),
	array(
		'type'        => 'colorpicker',
		'heading'     => esc_html__( 'Title Color', 'slz' ),
		'param_name'  => 'title_color',
		'description' => esc_html__( 'Choose a custom color for title.', 'slz' ),
		'group'       => esc_html__( 'Custom', 'slz' ),
		'edit_field_class' => 'vc_col-sm-6 vc_column',
	),
	array(
		'type'        => 'colorpicker',
		'heading'     => esc_html__( 'Title Color Hover', 'slz' ),
		'param_name'  => 'title_color_hover',
		'description' => esc_html__( 'Choose a custom color hover for title.', 'slz' ),
		'group'       => esc_html__( 'Custom', 'slz' ),
		'edit_field_class' => 'vc_col-sm-6 vc_column',
	),
	array(
		'type'        => 'colorpicker',
		'heading'     => esc_html__( 'Item Color', 'slz' ),
		'param_name'  => 'item_color',
		'description' => esc_html__( 'Choose a custom color for item.', 'slz' ),
		'group'       => esc_html__( 'Custom', 'slz' ),
		'edit_field_class' => 'vc_col-sm-6 vc_column',
	),
	array(
		'type'        => 'colorpicker',
		'heading'     => esc_html__( 'Item Color Hover', 'slz' ),
		'param_name'  => 'item_color_hover',
		'description' => esc_html__( 'Choose a custom color hover for item.', 'slz' ),
		'group'       => esc_html__( 'Custom', 'slz' ),
		'edit_field_class' => 'vc_col-sm-6 vc_column',
	),
	array(
		'type'        => 'colorpicker',
		'heading'     => esc_html__( 'Icon Color', 'slz' ),
		'param_name'  => 'icon_color',
		'description' => esc_html__( 'Choose a custom color for icon.', 'slz' ),
		'group'       => esc_html__( 'Custom', 'slz' ),
		'edit_field_class' => 'vc_col-sm-6 vc_column',
	),
	array(
		'type'        => 'colorpicker',
		'heading'     => esc_html__( 'Icon Color Hover', 'slz' ),
		'param_name'  => 'icon_color_hover',
		'description' => esc_html__( 'Choose a custom color hover for icon.', 'slz' ),
		'group'       => esc_html__( 'Custom', 'slz' ),
		'edit_field_class' => 'vc_col-sm-6 vc_column',
	),
	array(
		'type'        => 'colorpicker',
		'heading'     => esc_html__( 'Read More Color', 'slz' ),
		'param_name'  => 'readmore_color',
		'description' => esc_html__( 'Choose a custom color for read more button.', 'slz' ),
		'group'       => esc_html__( 'Custom', 'slz' ),
		'edit_field_class' => 'vc_col-sm-6 vc_column',
	),
	array(
		'type'        => 'colorpicker',
		'heading'     => esc_html__( 'Read More Color Hover', 'slz' ),
		'param_name'  => 'readmore_color_hover',
		'description' => esc_html__( 'Choose a custom color hover for read more button.', 'slz' ),
		'group'       => esc_html__( 'Custom', 'slz' ),
		'edit_field_class' => 'vc_col-sm-6 vc_column',
	),
) );

$vc_options = array_merge( $params );