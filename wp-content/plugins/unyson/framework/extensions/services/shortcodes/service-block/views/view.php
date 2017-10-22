<?php if ( ! defined( 'ABSPATH' ) ) { die( 'Forbidden' ); }

if ( ! is_plugin_active( 'js_composer/js_composer.php' ) ) {
	echo esc_html__('Please Active Visual Composer', 'slz');
	return;
}

$model = new SLZ_Service();
$model->init( $data );

// no data
if( ! $model->query->have_posts() ) return;

$uniq_id = $model->attributes['uniq_id'];

$block_class[] = $uniq_id;

$cfg_layout_class = $instance->get_config('layouts_class');

if( isset($cfg_layout_class[$data['layout']]) ) {
	$block_class[] = $cfg_layout_class[$data['layout']];
}
$block_class[] = $model->attributes['extra_class'];

$model->attributes['block_class'] = implode(' ', $block_class );
$data = $model->attributes;

if( !empty($data['bg_image']) && $data['bg_image'] == 'yes' ) {
	$model->attributes['show_thumbnail'] = $data['bg_image'];
} else {
	$data['bg_image'] = '';
}
$data['full_image'] = '';
if( $model->attributes['show_icon'] == 'feature-image'){
	$data['full_image'] = 'f-image-full';
}
$data['openRow'] = $data['closeRow'] = '';
if( isset($data['show_slider']) && $data['show_slider'] == 'yes') {
	if( empty($data['slide_to_show']) ) {
		$data['slide_to_show'] = 3;
	}
	$data['column'] = $data['slide_to_show'];
	$data['openRow'] = '
		<div class="slz-carousel-wrapper" data-slidestoshow="'.esc_attr( $data['slide_to_show'] ).'"
				data-arrowshow="'.esc_attr( $data['slide_arrows'] ).'"
				data-dotshow="'.esc_attr( $data['slide_dots'] ).'"
				data-autoplay="'.esc_attr( $data['slide_autoplay'] ).'"
				data-infinite="'.esc_attr( $data['slide_infinite'] ).'"
				data-slidespeed="'.esc_attr( $data['slide_speed'] ).'"
				>';
	$data['closeRow'] = '</div>';
	$data['column_class'] = '';
	$model->attributes['pagination'] = 'no';
} else {
	$column = 'slz-column-' . (!empty($model->attributes['column']) ? $model->attributes['column'] : '3' );
	$data['openRow'] = '<div class="slz-list-icon-block '. esc_attr($column) .' ' .esc_attr($data['spacing_style']) .'">';
	$data['closeRow'] = '</div>';
	$data['show_slider'] = '';
}

$params = array( 'model'=> $model, 'data' => $data );
echo '<div class="slz_shortcode sc_service_block '.esc_attr( $model->attributes['block_class'] ).'">';
	echo '<div class="'.esc_attr($data[ $data['layout'].'-style']).'">';
		switch ( $data['layout'] ) {
			case 'layout-1':
				echo slz_render_view( $instance->locate_path('/views/layout-1.php'), $params );
				break;
			case 'layout-2':
				echo slz_render_view( $instance->locate_path('/views/layout-2.php'), $params );
				break;
			case 'layout-3':
				echo slz_render_view( $instance->locate_path('/views/layout-3.php'), $params );
				break;
			case 'layout-4':
				echo slz_render_view( $instance->locate_path('/views/layout-4.php'), $params );
				break;
			default:
				echo slz_render_view( $instance->locate_path('/views/layout-1.php'), $params );
				break;
		}
	echo '</div>';
echo '</div>';

$custom_css = '';

if( !empty( $data['block_bd_cl'] ) ){
	$css = '
		.%1$s .slz-list-icon-block.option-2 .slz-icon-block{
				border-color: %2$s !important;
			}
		';
	$custom_css .= sprintf( $css, esc_attr( $data['uniq_id'] ), esc_attr( $data['block_bd_cl']) );
}

if( !empty( $data['block_bd_hv_cl'] ) ){
	$css = '
		.%1$s .slz-list-icon-block.option-2 .slz-icon-block:hover{
				border-color: %2$s !important;
			}
		';
	$custom_css .= sprintf( $css, esc_attr( $data['uniq_id'] ), esc_attr( $data['block_bd_hv_cl']) );
}

if( !empty( $data['icon_cl'] ) ){
	$css = '
		.%1$s .slz-icon-block .wrapper-icon .slz-icon{
				color: %2$s !important;
			}
		';
	$custom_css .= sprintf( $css, esc_attr( $data['uniq_id'] ), esc_attr( $data['icon_cl']) );
}

if( !empty( $data['icon_hv_cl'] ) ){
	$css = '
		.%1$s .slz-icon-block .wrapper-icon .slz-icon:hover{
				color: %2$s !important;
			}
		';
	$custom_css .= sprintf( $css, esc_attr( $data['uniq_id'] ), esc_attr( $data['icon_hv_cl']) );
}

// icon background color
if( !empty( $data['icon_bg_cl'] ) ){
	$css = '
			.%1$s .wrapper-icon .slz-icon {
				background-color: %2$s !important;
			}
		';
	$custom_css .= sprintf( $css, esc_attr( $data['uniq_id'] ), esc_attr( $data['icon_bg_cl']) );
}

if( !empty( $data['icon_bg_hv_cl'] ) ){
	$css = '
			.%1$s .wrapper-icon:hover .slz-icon{
				background-color: %2$s !important;
			}
		';
	$custom_css .= sprintf( $css, esc_attr( $data['uniq_id'] ), esc_attr( $data['icon_bg_hv_cl']) );
}

if( !empty( $data['title_cl'] ) ){
	$css = '
		.%1$s .slz-icon-block .title{
				color: %2$s !important;
			}
		';
	$custom_css .= sprintf( $css, esc_attr( $data['uniq_id'] ), esc_attr( $data['title_cl']) );
}

if( !empty( $data['title_line_cl'] ) ){
	$css = '
		.%1$s .slz-icon-block .underline::after{
				background-color: %2$s !important;
			}
		';
	$custom_css .= sprintf( $css, esc_attr( $data['uniq_id'] ), esc_attr( $data['title_line_cl']) );
}

if( !empty( $data['des_cl'] ) ){
	$css = '
		.%1$s .slz-icon-block .description{
				color: %2$s !important;
			}
		';
	$custom_css .= sprintf( $css, esc_attr( $data['uniq_id'] ), esc_attr( $data['des_cl']) );
}

if( !empty( $data['btn_cl'] ) ){
	$css = '
		.%1$s .slz-icon-block .slz-btn{
				color: %2$s !important;
			}
		';
	$custom_css .= sprintf( $css, esc_attr( $data['uniq_id'] ), esc_attr( $data['btn_cl']) );
}
if( !empty( $data['btn_hv_cl'] ) ){
	$css = '
		.%1$s .slz-icon-block .slz-btn:hover{
				color: %2$s !important;
			}
		';
	$custom_css .= sprintf( $css, esc_attr( $data['uniq_id'] ), esc_attr( $data['btn_hv_cl']) );
}

if( !empty( $data['btn_bg_cl'] ) ){
	$css = '
		.%1$s .slz-icon-block .slz-btn{
				background-color: %2$s !important;
			}
		';
	$custom_css .= sprintf( $css, esc_attr( $data['uniq_id'] ), esc_attr( $data['btn_bg_cl']) );
}
if( !empty( $data['btn_bg_hv_cl'] ) ){
	$css = '
		.%1$s .slz-icon-block .slz-btn:hover{
				background-color: %2$s !important;
			}
		';
	$custom_css .= sprintf( $css, esc_attr( $data['uniq_id'] ), esc_attr( $data['btn_bg_hv_cl']) );
}

if ( !empty( $custom_css ) ) {
	do_action('slz_add_inline_style', $custom_css);
}