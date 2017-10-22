<?php if ( ! defined( 'ABSPATH' ) ) { die( 'Forbidden' ); }

// $model = new SLZ_Team();
// $model->init( $data );

// $uniq_id = $model->attributes['uniq_id'];
// $block_cls = $model->attributes['extra_class'] . ' ' . $uniq_id;

// $data['uniq_id'] = $uniq_id;
// $data['model'] = $model;
// $column = !empty($model->attributes['column']) ? $model->attributes['column'] : '4';

// $cfg_layout_class = $instance->get_config('layouts_class');

// if( isset($cfg_layout_class[$data['layout']]) ) {
//	 $block_class[] = $cfg_layout_class[$data['layout']];
// }

// $block_class[] = $model->attributes['extra_class'];

// $model->attributes['block_class'] = implode(' ', $block_class );
// $data['block_class'] = $model->attributes['block_class'];

// //get carousel html
// $classRowBegin = $classRowEnd = $html_format = $html_nav_format = '';
// $classRowBegin = '
// <div class="slz-carousel-wrapper">
//	 <div class="carousel-overflow">
//		 <div class="slz-carousel slz-team-slide-slick" 
//			 data-slidestoshow="'.esc_attr( $column ).'"
//			 data-arrowshow="'.esc_attr( $model->attributes['slide_arrows'] ).'"
//			 data-dotshow="'.esc_attr( $model->attributes['slide_dots'] ).'"
//			 data-autoplay="'.esc_attr( $model->attributes['slide_autoplay'] ).'"
//			 data-infinite="'.esc_attr( $model->attributes['slide_infinite'] ).'"
//			 data-slidespeed="'.esc_attr( $model->attributes['slide_speed'] ).'" 
//			 data-animation="'.esc_attr( $model->attributes['slide_animation'] ).'" 
//		 >
// ';
// $classRowEnd = '</div></div></div>';
// $classInlineBlock = '';
// $classCarousel = '';

// $block_cls = $data['model']->attributes['extra_class'] . ' ' . $data['uniq_id'] . ' ' . $classCarousel;
// $data['block_cls'] = $block_cls;
// $data['classInlineBlock'] = $classInlineBlock;
// $data['classRowBegin'] = $classRowBegin;
// $data['classRowEnd'] = $classRowEnd;
// $params = array('data' => $data, 'model' => $model );

$model = new SLZ_Team();
$model->init( $data );

$data['uniq_id'] = $model->attributes['uniq_id'];

$block_class[] = $model->attributes['extra_class'];

$cfg_layout_class = $instance->get_config('layouts_class');
if( isset($cfg_layout_class[$data['layout']]) ) {
	$block_class[] = $cfg_layout_class[$data['layout']];
}

$model->attributes['block_class'] = implode(' ', $block_class );
$data['block_class'] = $model->attributes['block_class'];

$params = array('data' => $data, 'model' => $model );

switch ( $data['layout'] ) {
	case 'layout-1':
		echo slz_render_view( $instance->locate_path('/views/layout-1.php'), $params);
		break;
	case 'layout-3':
		echo slz_render_view( $instance->locate_path('/views/layout-3.php'), $params);
		break;
	default:
		echo slz_render_view( $instance->locate_path('/views/layout-1.php'), $params);
		break;
}