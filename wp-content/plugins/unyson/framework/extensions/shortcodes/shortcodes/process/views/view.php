<?php if ( ! defined( 'ABSPATH' ) ) {
	die( 'Forbidden' );
}

$data['uniq_id'] = 'icons-block-'.SLZ_Com::make_id();
$block_class[] = $data['uniq_id'] .' '.$data['extra_class'];

$cfg_layout_class = $instance->get_config('layouts_class');

if( isset($cfg_layout_class[$data['layout']]) ) {
	$block_class[] = $cfg_layout_class[$data['layout']];
}

$block_class = implode(' ', $block_class );

if ( is_plugin_active( 'js_composer/js_composer.php' ) ) {
	echo '<div class="slz_shortcode sc_process '.esc_attr( $block_class ).'">';
		echo '<div class="'.esc_attr($data[''.$data['layout'].'-style']).'">';
			switch ( $data['layout'] ) {
				case 'layout-1':
					echo slz_render_view( $instance->locate_path('/views/layout-1.php'), compact('data'));
					break;
				case 'layout-2':
					echo slz_render_view( $instance->locate_path('/views/layout-2.php'), compact('data'));
					break;
				case 'layout-3':
					echo slz_render_view( $instance->locate_path('/views/layout-3.php'), compact('data'));
					break;
				default:
					echo slz_render_view( $instance->locate_path('/views/layout-1.php'), compact('data'));
					break;
			}
		echo '</div>';
	echo '</div>';
}else{
	echo esc_html__('Please Active Visual Composer', 'slz');
}


/*------------- custom general css-----------------*/

	$custom_css = '';

	//title color
	if( !empty( $data['title_cl'] ) ){
		$css = '
				.%1$s .title {
					color: %2$s;
				}
			';
		$custom_css .= sprintf( $css, esc_attr( $data['uniq_id'] ), esc_attr( $data['title_cl']) );
	}

	//title line color
	if( !empty( $data['title_line_cl'] ) ){
		$css = '
				.%1$s .title.underline:after {
					background-color: %2$s;
				}
			';
		$custom_css .= sprintf( $css, esc_attr( $data['uniq_id'] ), esc_attr( $data['title_line_cl']) );
	}

	// description color
	if( !empty( $data['des_cl'] ) ){
		$css = '
				.%1$s .description {
					color: %2$s;
				}
			';
		$custom_css .= sprintf( $css, esc_attr( $data['uniq_id'] ), esc_attr( $data['des_cl']) );
	}

	if ( !empty( $custom_css ) ) {
		do_action('slz_add_inline_style', $custom_css);
	}
