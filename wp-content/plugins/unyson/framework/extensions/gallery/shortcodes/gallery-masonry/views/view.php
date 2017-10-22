<?php if ( ! defined( 'ABSPATH' ) ) { die( 'Forbidden' ); }
$option_show = !empty($data['option_show']) ? $data['option_show'] : 'option-1';

$uniq_id = SLZ_Com::make_id();
$data['uniq_id'] = $data['post_type'] . '-' .$uniq_id;

$params = array( 'data' => $data, 'view_path' => $view_path, 'instance' => $instance );
?>

<div class="slz-shortcode sc-gallery-masonry <?php echo esc_attr($data['extra_class'] . ' ' . $data['uniq_id']); ?>" data-name="gallery_masonry">
	<?php
		echo slz_render_view( $instance->locate_path('/views/grid-view.php'), $params);
	?>
</div>
<?php
$custom_css = '';

/* category color */
if ( !empty( $data['cat_color'] ) ) {
	$css = '
			.%1$s .block-content .block-content-wrapper .block-category{
				color: %2$s;
			}
		';
	$custom_css .= sprintf( $css, esc_attr( $data['uniq_id'] ), esc_attr( $data['cat_color'] ) );
}
/* title color */
if ( !empty( $data['title_color'] ) ) {
	$css = '
			.%1$s .block-content .block-content-wrapper .block-title{
				color: %2$s;
			}
		';
	$custom_css .= sprintf( $css, esc_attr( $data['uniq_id'] ), esc_attr( $data['title_color'] ) );
}
/* title hover color */
if ( !empty( $data['title_color_hover'] ) ) {
	$css = '
			.%1$s .block-content a.block-title:hover{
				color: %2$s;
			}
		';
	$custom_css .= sprintf( $css, esc_attr( $data['uniq_id'] ), esc_attr( $data['title_color_hover'] ) );
}
/* read more btn color */
if ( !empty( $data['readmore_btn_color'] ) ) {
	$css = '
			.%1$s .slz-block-gallery-01 .block-content a.block-read-mores{
				color: %2$s;
			}
		';
	$custom_css .= sprintf( $css, esc_attr( $data['uniq_id'] ), esc_attr( $data['readmore_btn_color'] ) );
}

/* read more btn hover color */
if ( !empty( $data['readmore_btn_hover_color'] ) ) {
	$css = '
			.%1$s .slz-block-gallery-01 .block-content a.block-read-mores:hover{
				color: %2$s;
			}
		';
	$custom_css .= sprintf( $css, esc_attr( $data['uniq_id'] ), esc_attr( $data['readmore_btn_hover_color'] ) );
}
/* zoom in btn color */
if ( !empty( $data['zoomin_btn_color'] ) ) {
	$css = '
			.%1$s .slz-block-gallery-01 .block-content a.block-zoom-img{
				color: %2$s;
			}
		';
	$custom_css .= sprintf( $css, esc_attr( $data['uniq_id'] ), esc_attr( $data['zoomin_btn_color'] ) );
}

/* zoom in btn hover color */
if ( !empty( $data['zoomin_btn_hover_color'] ) ) {
	$css = '
			.%1$s .slz-block-gallery-01 .block-content a.block-zoom-img:hover{
				color: %2$s;
			}
		';
	$custom_css .= sprintf( $css, esc_attr( $data['uniq_id'] ), esc_attr( $data['zoomin_btn_hover_color'] ) );
}
/* tab filter color */
if ( !empty( $data['cat_filter_color'] ) ) {
	$css = '
			.%1$s .tab-filter li:not(.active) .link{
				color: %2$s;
			}
		';
	$custom_css .= sprintf( $css, esc_attr( $data['uniq_id'] ), esc_attr( $data['cat_filter_color'] ) );
}
/* cat_filter_active_color */
if ( !empty( $data['cat_filter_active_color'] ) ) {
	$css = '
			.%1$s .tab-filter li.active .link{
				color: %2$s;
			}
			.%1$s .tab-filter li.active .link:before{
				background-color: %2$s;
			}
			.%1$s .tab-filter li:hover:not(.active) .link{
				color: %2$s;
			}
			.%1$s .tab-filter li:hover:not(.active) .link:before{
				background-color: %2$s;
			}
		';
	$custom_css .= sprintf( $css, esc_attr( $data['uniq_id'] ), esc_attr( $data['cat_filter_active_color'] ) );
}
if ( !empty( $custom_css ) ) {
	do_action('slz_add_inline_style', $custom_css);
}