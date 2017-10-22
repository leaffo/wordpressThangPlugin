<?php if ( ! defined( 'ABSPATH' ) ) { die( 'Forbidden' ); }

$css = $custom_css = $output_grid = $gallery_class = $option_class = '';
$class_col = !empty($data['column']) ? 'column-'.$data['column'] : 'column-3';
$style = !empty($data['style']) ? $data['style'] : 'option-1';

$model = new SLZ_Gallery();
$model->init( $data );

$data = $model->attributes;
$uniq_id = $data['uniq_id'];
if( !empty($data['tab_uniq_id']) ) {
	$uniq_id = $data['tab_uniq_id'];
}
$post_type = $data['post_type'];

$data['thumb_size'] = 'large';

$html_options = array(
	'zoom_format' => '',
);
$model->html_format = $model->set_default_options( $html_options );

// load more button
$btn_load_more = '';
if( !empty( $data['load_more_btn_text'] ) && $model->query->max_num_pages > 1) {
	$btn_load_more = '
			<div class="btn-loadmore-wrapper" data-block-class="'.esc_attr($uniq_id).'">
				<a href="javascript:void(0)" class="slz-btn btn-loadmore" data-number="'.esc_attr( $data['limit_post'] ).'"><span class="btn-text">'.esc_html( $data['load_more_btn_text'] ).'</span></a>
			</div>';
}

// style
switch ( $data['style'] ) {
	case 'st-florida':
		$gallery_class = 'style-1';
		$option_class  = 'option-1';
		break;
	case 'st-california':
		$gallery_class = 'style-1';
		$option_class  = 'option-2';
		break;
	case 'st-georgia':
		$gallery_class = 'style-1';
		$option_class  = 'option-3';
		break;
	case 'st-newyork':
		$gallery_class = 'style-1';
		$option_class  = 'option-4';
		break;
	case 'st-illinois':
		$gallery_class = 'style-2';
		$option_class  = 'option-1';
		break;
	case 'st-connecticut':
		$gallery_class = 'style-2';
		$option_class  = 'option-2';
		break;
	case 'st-texas':
		$gallery_class = 'style-2';
		$option_class  = 'option-3';
		break;
	case 'st-arizona':
		$gallery_class = 'style-2';
		$option_class  = 'option-4';
		break;
	default:
		$option_class  = 'option-1';
		break;
}

$data['gallery_class'] = $gallery_class;
$json_attrs = $data;
// json data
$json_attrs['paged'] = 2;
$params = array('uniq_id' => $uniq_id, 'gallery_class' => $gallery_class);
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
				$output_grid .= slz_render_view( $instance->locate_path('/views/block-gallery.php'), $params_render );
				break;
			default:
				$output_grid .= slz_render_view( $instance->locate_path('/views/block-portfolio.php'), $params_render );
				break;
		}
	}
	$model->reset();
?>

<div id="<?php echo esc_attr($uniq_id); ?>" class="gallery-grid <?php echo esc_attr($uniq_id) . esc_attr($data['tab_block_class']);?>" <?php echo esc_attr($data['tab_role'])?>>
	<div class="ajax-gallery slz-isotope-grid-2 <?php echo esc_attr( $class_col ) .' '.esc_attr($option_class) ?>">
		<?php echo $output_grid;?>
	</div>
	<?php echo $btn_load_more ?>
	<div class="ajax-loadmore">
		<div class="ajax-gallery-atts hide" data-item="<?php echo esc_attr($uniq_id)?>" data-json="<?php echo esc_attr( json_encode( $json_attrs ) )?>" ></div>
	</div>
</div>
<?php
}