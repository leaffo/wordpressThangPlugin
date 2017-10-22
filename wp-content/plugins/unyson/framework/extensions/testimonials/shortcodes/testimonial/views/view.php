<?php if ( ! defined( 'ABSPATH' ) ) {
	die( 'Forbidden' );
}

$model = new SLZ_Testimonial();
$model->init( $data );
$uniq_id = $model->attributes['uniq_id'];

$data['uniq_id'] = $uniq_id;
$data['model']   = $model;

if ( empty( $data['item_show'] ) ) {
	$slidesToShow = 2;
} else {
	$slidesToShow = absint( intval( $data['item_show'] ) );
}

$data['slidesToShow'] = $slidesToShow;

$cfg_layout_class = $instance->get_config( 'layouts_class' );

if ( isset( $cfg_layout_class[ $data['layout'] ] ) ) {
	$block_class[] = $cfg_layout_class[ $data['layout'] ];
}

$block_class[] = $model->attributes['extra_class'];
$block_class[] = $uniq_id;

$model->attributes['block_class'] = implode( ' ', $block_class );
$data['block_class']              = $model->attributes['block_class'];

if ( $slidesToShow >= $data['model']->post_count ) {
	if ( $data['show_arrows'] == 'yes' || $data['show_dots'] == 'yes' ) {
		$slidesToShow = $data['model']->post_count - 1;
	} else if ( $slidesToShow > $data['model']->post_count ) {
		$slidesToShow = $data['model']->post_count;
	}
}
if ( $data['model']->post_count == 0 ) {
	return;
}


$params = array( 'data' => $data, 'model' => $model, 'instance' => $instance );

switch ( $data['layout'] ) {
	case 'layout-1':
		echo slz_render_view( $instance->locate_path( '/views/layout-1.php' ), $params );
		break;
	case 'layout-2':
		echo slz_render_view( $instance->locate_path( '/views/layout-2.php' ), $params );
		break;
	case 'layout-3':
		echo slz_render_view( $instance->locate_path( '/views/layout-3.php' ), $params );
		break;
	case 'layout-4':
		echo slz_render_view( $instance->locate_path( '/views/layout-4.php' ), $params );
		break;
	case 'layout-5':
		echo slz_render_view( $instance->locate_path( '/views/layout-5.php' ), $params );
		break;
	default:
		echo slz_render_view( $instance->locate_path( '/views/layout-1.php' ), $params );
		break;
}