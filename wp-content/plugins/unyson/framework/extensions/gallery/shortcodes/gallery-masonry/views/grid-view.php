<?php if ( ! defined( 'ABSPATH' ) ) { die( 'Forbidden' ); }

$class_col = $data['column'];
$option_show = $data['option_show'];
$post_type = $data['post_type'];
$output = '';

$model = new SLZ_Gallery();
$model->init( $data );

$data = $model->attributes;
$uniq_id = $data['uniq_id'];

$json_attrs = $data;
$json_attrs['paged'] = 2;
$params = array('uniq_id' => $uniq_id);

$params_render = array(
	'model' => $model,
	'data' => $data,
	'params' => $params
);

if( $model->query->have_posts() ) {
	while ( $model->query->have_posts() ) {
		$model->query->the_post();
		$model->loop_index();
		switch ($post_type) {
			case 'slz-gallery':
				$output .= slz_render_view( $instance->locate_path('/views/block-gallery.php'), $params_render );
				break;
			
			default:
				$output .= slz_render_view( $instance->locate_path('/views/block-portfolio.php'), $params_render );
				break;
		}
	}
	$model->reset();
}

?>

<?php 
	if( $tab_filter = $model->render_filter_type( $model->attributes, false ) ){
		echo '<div class="tab-filter-wrapper">' . $tab_filter .'</div>';
	}

	echo '<div class="ajax-gallery slz-isotope-grid-2 grid-main ' . esc_attr($option_show) . ' ' . esc_attr($class_col) . '">' . $output . '</div>';

	if( !empty( $data['load_more_btn_text'] ) && $model->query->max_num_pages > 1) {
		echo '
			<div class="btn-loadmore-wrapper" data-block-class="'.esc_attr($uniq_id).'">
				<a href="javascript:void(0)" class="slz-btn btn-loadmore" data-number="'.esc_attr( $data['limit_post'] ).'"><span class="btn-text">'.esc_html( $data['load_more_btn_text'] ).'</span></a>
			</div>
		';
	}
?>
<div class="ajax-loadmore">
	<div class="ajax-gallery-atts hide" data-item="<?php echo esc_attr($uniq_id)?>" data-json="<?php echo esc_attr( json_encode( $json_attrs ) )?>" ></div>
</div>
