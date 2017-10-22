<?php if ( ! defined( 'ABSPATH' ) ) {
	die( 'Forbidden' );
}

$css = $custom_css = '';

$css_class = SLZ_Util::slz_shortcode_custom_css_class($data['css']);

$data['uniq_id'] = 'main-title-'.SLZ_Com::make_id();

$block_class[] = $data['uniq_id'] .' '.$data['extra_class'].' '.$data['title_line'];


$cfg_layout_class = $instance->get_config('layouts_class');

if( isset($cfg_layout_class[$data['layout']]) ) {
	$block_class[] = $cfg_layout_class[$data['layout']];
}

$block_class = implode(' ', $block_class );

?>
<div class="slz-shortcode sc_main_title <?php echo esc_attr( $block_class ); ?> <?php echo esc_attr( $data['align'] ); ?> <?php echo esc_attr($css_class)?>">
	<div class="<?php echo esc_attr($data[''.$data['layout'].'-style'])?>">
		<?php 
			switch ( $data['layout'] ) {
				case 'layout-1':
					echo slz_render_view( $instance->locate_path('/views/layout-1.php'), compact('data'));
					break;
				case 'layout-2':
					echo slz_render_view( $instance->locate_path('/views/layout-2.php'), compact('data'));
					break;
				default:
					echo slz_render_view( $instance->locate_path('/views/layout-1.php'), compact('data'));
					break;
			}
		?>
	</div>
</div>

<?php

/* --------CUSTOM CSS------------ */

//title
	if ( !empty( $data['title_cl'] ) ) {
		$css = '
			.%1$s .title {
				color: %2$s !important;
			}
		';
		$custom_css .= sprintf( $css, esc_attr( $data['uniq_id']  ), esc_attr( $data['title_cl'] ) );
	}
	
//title line color

	if( !empty( $data['line_cl'] ) ){
		$css = '
				.%1$s.has-line .st-florida .title-wrapper:after,
				.%1$s.has-line .st-california .title-wrapper:after,
				.%1$s.has-line .st-chennai .title-wrapper:after {
					background-color: %2$s !important;
				}
			';
		$custom_css .= sprintf( $css, esc_attr( $data['uniq_id'] ), esc_attr( $data['line_cl']) );
	}

// sub title

	if ( !empty( $data['subtitle_cl'] ) ) {
		$css = '
			.%1$s .subtitle {
				color: %2$s !important;
			}
		';
		$custom_css .= sprintf( $css, esc_attr( $data['uniq_id']  ), esc_attr( $data['subtitle_cl'] ) );
	}
//extra title

	if ( !empty( $data['extra_title_cl'] ) ) {
		$css = '
			.%1$s .extra-title {
				color: %2$s !important;
			}
		';
		$custom_css .= sprintf( $css, esc_attr( $data['uniq_id']  ), esc_attr( $data['extra_title_cl'] ) );
	}

//icon color

	if ( !empty( $data['icon_cl'] ) ) {
		$css = '
			.%1$s .slz-icon {
				color: %2$s !important;
			}
		';
		$custom_css .= sprintf( $css, esc_attr( $data['uniq_id']  ), esc_attr( $data['icon_cl'] ) );
	}

if ( !empty( $custom_css ) ) {
	do_action('slz_add_inline_style', $custom_css);
}