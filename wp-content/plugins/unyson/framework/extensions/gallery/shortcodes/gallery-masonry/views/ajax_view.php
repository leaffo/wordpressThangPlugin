<?php if ( ! defined( 'ABSPATH' ) ) { die( 'Forbidden' ); }
$grid = $load_data = '';
if( $data ) {
	$model = new SLZ_Gallery();
	$model->init( $data );
	$post_type = $data['post_type'];
	$json_attrs = $data;
	if( $data['paged'] < $model->query->max_num_pages ) {
		$json_attrs['paged'] = absint($data['paged']) + 1;
		$load_data = '<div class="ajax-gallery-atts hide" data-item="'.esc_attr($data['uniq_id']).'" data-json="' . esc_attr( json_encode( $json_attrs ) ).'"></div>';
	}
	$params = array('uniq_id' => $data['uniq_id'], 'gallery_class' => $data['gallery_class']);
	$params_render = array(
		'model' => $model,
		'data' => $data,
		'params' => $params
	);
	if( $model->query->have_posts() ) {
		while ( $model->query->have_posts() ) {
			$model->query->the_post();
			$model->loop_index();
			switch($post_type) {
				case 'slz-gallery':
					$grid .= slz_render_view( $instance->locate_path('/views/block-gallery.php'), $params_render );
					break;
				default:
					$grid .= slz_render_view( $instance->locate_path('/views/block-portfolio.php'), $params_render );
					break;
			}
		}
		$model->reset();
	}
}
echo json_encode(array('grid' => $grid, 'load_more' => $load_data) );