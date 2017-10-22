<?php if ( ! defined( 'ABSPATH' ) ) { die( 'Forbidden' ); }

$post_type = $data['post_type'];
$list_category = 'list_category_' . substr( $data['post_type'], 4);;
$data['align_category_filter'] = !empty($data['align_category_filter']) ? $data['align_category_filter'] : 'text-c';

if( empty( $data['category_slug'] ) ) {
	list( $data['category_list_parse'], $data['category_slug'] ) = SLZ_Util::get_list_vc_param_group( $data, $list_category, 'category_slug' );
}
$output_tab = $output_tab_content = $grid = '';
$arg = array(
	'pad_counts' => 1,
);
if( !empty($data['category_slug'])) {
	$arg['slug'] = $data['category_slug'];
}
$arr_terms = SLZ_Com::get_taxonomy_with_params($post_type.'-cat', $arg);

foreach( $arr_terms as $key => $term ) {
	$classFadeActive = '';
	$tab_params['class_active'] = '';
	$tab_params['expanded'] = 'false';
	if ( $key == 0 ) {
		$classFadeActive = 'in active';
		$tab_params['expanded'] = 'true';
		$tab_params['class_active'] = 'active';
	}
	$tab_params['tab_id'] = $data['uniq_id'] . '-' .$key;
	$data['classFadeActive'] = $classFadeActive;
	$data['tab_uniq_id'] = $tab_params['tab_id'];
	$data['tab_block_class'] = ' tab-pane fade ' . $classFadeActive;
	$data['tab_role'] = 'role=tabpanel';
	$data['category_slug'] = $term->slug;

	if( empty($term->name) ){
		$term->name = $term->slug;
	}
	
	// tab title
	$output_tab .= '<li class="tab-title-content tab_item '. esc_attr($tab_params['class_active']).'" role="presentation" >
						<a class="link" href="#' . esc_attr($tab_params['tab_id']) . '" role="tab" data-toggle="tab" aria-expanded="' . $tab_params['expanded'] .'" data-slug="'.esc_attr( $term->slug ).'">
							'. esc_attr( $term->name ) .'
						</a>
					</li>';
	//tab content
	$params = array( 'data' => $data, 'view_path' => $view_path, 'instance' => $instance );
	$output_tab_content .= slz_render_view( $instance->locate_path('/views/grid-view.php'), $params);
}// end foreach
echo '<div class="tab-list-wrapper ' . esc_attr($data['align_category_filter']) . '">';
	echo '<ul class="tab-list tab-filter" role="tablist">'. $output_tab . '</ul>';
echo '</div>';
echo '<div class="tab-content">' . $output_tab_content . '</div>';
