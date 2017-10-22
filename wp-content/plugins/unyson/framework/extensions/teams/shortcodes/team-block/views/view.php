<?php if ( ! defined( 'ABSPATH' ) ) { die( 'Forbidden' ); }

if ( ! is_plugin_active( 'js_composer/js_composer.php' ) ){
	echo esc_html__('Please Active Visual Composer', 'slz');
	return;
}

$model = new SLZ_Team();
$model->init( $data );

if( ! $model->query->have_posts() ) return;

$cfg_layout_class = $instance->get_config('layouts_class');
if( isset($cfg_layout_class[$data['layout']]) ) {
	$block_class[] = $cfg_layout_class[$data['layout']];
}

$block_class[] = $model->attributes['extra_class'];
$block_class[] = $model->attributes['uniq_id'];

$model->attributes['block_class'] = implode(' ', $block_class );

$column = !empty($model->attributes['column']) ? $model->attributes['column'] : '3';

$data = $model->attributes;
$data['openRow'] = $data['closeRow'] = '';
if( isset($data['show_slider']) && $data['show_slider'] == 'yes') {
	if( empty($data['slide_to_show']) ) {
		$data['slide_to_show'] = 3;
	}
	$data['column'] = $data['slide_to_show'];
	$data['openRow'] = '
		<div class="slz-carousel-wrapper"
			data-slidestoshow="'.esc_attr( $data['slide_to_show'] ).'"
			data-arrowshow="'.esc_attr( $data['slide_arrows'] ).'"
			data-dotshow="'.esc_attr( $data['slide_dots'] ).'"
			data-autoplay="'.esc_attr( $data['slide_autoplay'] ).'"
			data-infinite="'.esc_attr( $data['slide_infinite'] ).'"
			data-slidespeed="'.esc_attr( $data['slide_speed'] ).'"
			>';
	$data['closeRow'] = '</div>';
} else {
	$column = !empty($data['column']) ? 'slz-column-'.$data['column'] : 'slz-column-3';
	$data['openRow'] = '<div class="slz-list-team-block '. esc_attr($column) .'">';
	$data['closeRow'] = '</div>';
	$data['show_slider'] = '';
}
$params = array('model' => $model, 'data' => $data );
switch ( $data['layout'] ) {
	case 'layout-1':
		echo slz_render_view( $instance->locate_path('/views/layout-1.php'), $params );
		break;
	case 'layout-2':
		echo slz_render_view( $instance->locate_path('/views/layout-2.php'), $params);
		break;
	case 'layout-3':
		echo slz_render_view( $instance->locate_path('/views/layout-3.php'), $params);
		break;
	case 'layout-4':
		echo slz_render_view( $instance->locate_path('/views/layout-4.php'), $params);
		break;
	default:
		echo slz_render_view( $instance->locate_path('/views/layout-1.php'), $params);
		break;
}