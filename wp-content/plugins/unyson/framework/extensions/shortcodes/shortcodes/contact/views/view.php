<?php if ( ! defined( 'ABSPATH' ) ) { die( 'Forbidden' ); } if ( ! is_plugin_active( 'js_composer/js_composer.php' ) ) { return; }

$shortcode = slz_ext( 'shortcodes' )->get_shortcode( 'contact' );
$info_default  = $shortcode->get_config( 'default_info' );
$main_info_default =  $shortcode->get_config( 'default_main_info' );
$sub_info_default = $shortcode->get_config( 'default_sub_info' );
$uniq_id = sprintf( 'sc-contact-%s', SLZ_Com::make_id() );
$block_cls = sprintf( '%s %s ', esc_attr( $uniq_id ), esc_attr( $data['extra_class'] ) );

/**
 * Render HTML
 */
$column = intval( $data['column'] );
$class_col = sprintf( 'slz-column-%d', $column );
$data['array_info']  =  vc_param_group_parse_atts( $data['array_info'] );

$col_html = '';
$col_info = array_chunk( $data['array_info'], $column );
foreach ( $col_info as $block_info ) {
    $block_html = '';
	foreach ( $block_info as $info ) {
		$info = array_merge( $info_default, $info );
		// Main item
		$main_item_html = '';
		if ( ! empty( $info['array_info_item'] ) ) {
			$info['array_info_item'] = vc_param_group_parse_atts( $info['array_info_item'] );
			foreach ( $info['array_info_item'] as $item ) {
				$item = array_merge( $main_info_default, $item );
				if ( ! empty( $item['title'] ) ) {
					$title          = wp_kses_post( nl2br( $item['title'] ) );
					$icon           = esc_attr( $shortcode->get_icon_library_views( $item, '%1$s' ) );
					$main_item_html .= sprintf( '<div class="contact-item"><i class="slz-icon %2$s"></i><div class="text">%1$s</div></div>', $title, $icon );
				}
			}
		}
		// Sub item
		$sub_item_html = '';
		if ( ! empty( $info['array_sub_info_item'] ) ) {
			$info['array_sub_info_item'] = vc_param_group_parse_atts( $info['array_sub_info_item'] );
			foreach ( $info['array_sub_info_item'] as $item ) {
				$item = array_merge( $sub_info_default, $item );
				if ( ! empty( $item['sub_info'] ) ) {
					$title         = wp_kses_post( nl2br( $item['sub_info'] ) );
					$icon          = esc_attr( $shortcode->get_icon_library_views( $item, '%1$s' ) );
					$sub_item_html .= sprintf( '<div class="contact-item"><i class="slz-icon %2$s"></i><div class="text">%1$s</div></div>', $title, $icon );
				}
			}
		}
		// Description
		$description_html = '';
		if ( ! empty( $info['description'] ) ) {
			$description_html = sprintf( '<div class="blur">%s</div>', wp_kses_post( nl2br( $info['description'] ) ) );
		}
		$block_html .= sprintf( '<div class="item"><div class="slz-contact-01"><div class="main-item contact-title">%1$s</div><div class="sub-item contact-content">%2$s %3$s</div></div></div>', $main_item_html, $sub_item_html, $description_html );
    }
	$col_html .= sprintf( '<div class="slz-list-block slz-list-contact-01 slz-list-column %s">%s</div>', esc_attr( $class_col ), $block_html );
}
printf( '<div class="slz-shortcode sc_contact %s">%s</div>', esc_attr( $block_cls ), $col_html );

/**
 * Custom CSS
 */
$custom_css = '';
// Main item title color
$custom_css .= ! empty( $data['title_color'] ) ? sprintf( '.%1$s .contact-title .text { color: %2$s; }', esc_attr( $uniq_id ), esc_attr( $data['title_color'] ) ) : '';
// Main item icon color
$custom_css .= ! empty( $data['main_icon_color'] ) ? sprintf( '.%1$s .contact-title .slz-icon { color: %2$s; }', esc_attr( $uniq_id ), esc_attr( $data['main_icon_color'] ) ) : '';
// Sub item title color
$custom_css .= ! empty( $data['info_color'] ) ? sprintf( '.%1$s .contact-content .text { color: %2$s; }', esc_attr( $uniq_id ), esc_attr( $data['info_color'] ) ) : '';
// Sub item icon color
$custom_css .= ! empty( $data['sub_icon_color'] ) ? sprintf( '.%1$s .contact-content .slz-icon { color: %2$s; }', esc_attr( $uniq_id ), esc_attr( $data['sub_icon_color'] ) ) : '';
// Description color
$custom_css .= ! empty( $data['des_color'] ) ? sprintf( '.%1$s .slz-list-contact-01 .blur { color: %2$s; }', esc_attr( $uniq_id ), esc_attr( $data['des_color'] ) ) : '';
// Main item background color
$custom_css .= ! empty( $data['main_bg_color'] ) ? sprintf( '.%1$s .contact-title { background-color: %2$s; }', esc_attr( $uniq_id ), esc_attr( $data['main_bg_color'] ) ) : '';
// Block item background color
$custom_css .= ! empty( $data['bg_color'] ) ? sprintf( '.%1$s .slz-list-contact-01 { background-color: %2$s; }', esc_attr( $uniq_id ), esc_attr( $data['bg_color'] ) ) : '';
// Block item border color
$custom_css .= ! empty( $data['border_color'] ) ? sprintf( '.%1$s .slz-list-contact-01 .item + .item:before { background-color: %2$s; }', esc_attr( $uniq_id ), esc_attr( $data['border_color'] ) ) : '';
if ( ! empty( $custom_css ) ) {
	do_action( 'slz_add_inline_style', $custom_css );
}