<?php if ( ! defined( 'ABSPATH' ) ) {
	die( 'Forbidden' );
}

if ( ! is_plugin_active( 'js_composer/js_composer.php' ) ) {
	return;
}

$unique_id = SLZ_Com::make_id();
$sc_class  = $data['extra_class'] . ' block-' . $unique_id;

$thumb_sizes        = $instance->get_config( 'thumb_sizes' );
$data['thumb_size'] = ! empty( $thumb_sizes[ $data['layout'] ] ) ? $thumb_sizes[ $data['layout'] ] : '';

$data['link_arr'] = array(
	'url'        => '',
	'title'      => '',
	'target'     => '',
	'rel'        => '',
	'other_atts' => '',
);

if ( ! empty( $data['web_link'] ) ) {
	$data['link_arr'] = SLZ_Util::parse_vc_link( $data['web_link'] );
}

/*
 * Custom CSS
 */

$custom_css = '';
$custom_css .= ! empty( $data['block_title_color'] ) && $data['block_title_color'] != '#' ?
	sprintf( '.sc_about_me.block-%1$s .slz-title-shortcode{ color: %2$s }',
		esc_attr( $unique_id ), esc_attr( $data['block_title_color'] ) ) : '';

if ( ! empty( $custom_css ) ) {
	do_action( 'slz_add_inline_style', $custom_css );
}
?>
<div class="slz-shortcode sc_about_me <?php echo esc_attr( $sc_class ); ?>">
	<?php if ( ! empty( $data['block_title'] ) ) {
		printf( '<div class="slz-title-shortcode">%1$s</div>', esc_html( $data['block_title'] ) );
	}

	switch ( $data['layout'] ) {
		case 'layout-2':
			printf( '<div class="slz-about-me-02">%s</div>', slz_render_view( $instance->locate_path( '/views/layout-2.php' ), compact( 'data', 'instance' ) ) );
			break;
		default: // case layout-1
			printf( '<div class="slz-about-me-01">%s</div>', slz_render_view( $instance->locate_path( '/views/layout-1.php' ), compact( 'data', 'instance' ) ) );
			break;
	}




	?>
</div>
