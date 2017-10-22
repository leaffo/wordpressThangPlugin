<?php
$out = $block_class = $under_line  = $custom_css = $css = '';

$i = 1;

$shortcode = slz_ext( 'shortcodes' )->get_shortcode('icons_block');

$param_default  = array(
	'title'            => '',
	'des'              => '',
	'icon_type'        => '',
	'img_up'           => '',
	'title'            => '',
	'des'              => '',
);

switch ( $data['layout-2-style'] ) {

	case 'st-chennai':
		$block_class = 'block-square';
		break;

	case 'st-mumbai':
		$block_class = 'block-circle';
		break;

	default:
		break;
}

if ( !empty( $data['features_2'] ) ) {
	$items = (array) vc_param_group_parse_atts( $data['features_2'] );
	$out .= '<div class="slz-features-block '. esc_attr( $data['column'] ) .' ">';
		foreach ( $items as $item ) {

			//---------------content html----------------------//

			$item = array_merge( $param_default, $item );
		
			$out .= '<div class="item item-'.esc_attr($i).'">';

				$out .='<div class="slz-feature-block '.esc_attr($block_class).'">';
					$out .='<div class="slz-feature-block-wrapper">';

						// -----------icon --------//
						$out .= '<div class="icon-cell">';
							if ( $item['icon_type'] == '02' ) {
								if ( !empty( $item['img_up'] ) && $img_url = wp_get_attachment_url( $item['img_up'] ) ) {
									$out .= '
										<div class="wrapper-icon-image">
											<img src="'.esc_url( $img_url ).'" alt="" class="slz-icon-img">
										</div>
									';
								}
							}else{
								$format = '<div class="wrapper-icon"><i class="slz-icon %1$s"></i></div>';
								$out .= $shortcode->get_icon_library_views( $item, $format );
							}
						$out .= '</div>';

						//-----------content--------//
						$out .= '<div class="content-cell">';
							$out .= '<div class="wrapper-info">';
								// title
								if( !empty($item['title']) ){
									$out .= '<div class="title '.esc_attr($data['title_line']).' ">'.esc_attr( $item['title'] ).'</div>';
								}
								// description
								if( !empty($item['des'])){
									$out .= '<div class="description">'.wp_kses_post( nl2br ($item['des'] ) ).'</div>';
								}
								
							$out .= '</div>';
						$out .= '</div>';
						
					$out .= '</div>';
				$out .= '</div>';

			$out .= '</div>';

			$i++;

		}//end foreach

	$out .= '</div>';

	if ( !empty( $custom_css ) ) {
		do_action('slz_add_inline_style', $custom_css);
	}
}

//--------printf data-------//

echo wp_kses_post($out);

//----------------custom css for layout 2------------//
	//block background color
	if( !empty( $data['block_bg_cl_2'] ) ){
		$css = '
				.%1$s .slz-features-block .slz-feature-block {
					background-color: %2$s;
				}
			';
		$custom_css .= sprintf( $css, esc_attr( $data['uniq_id'] ), esc_attr( $data['block_bg_cl_2']) );
	}
	//block background hover color
	if( !empty( $data['block_bg_hv_cl_2'] ) ){
		$css = '
				.%1$s .slz-features-block .slz-feature-block:hover {
					background-color: %2$s;
				}
			';
		$custom_css .= sprintf( $css, esc_attr( $data['uniq_id'] ), esc_attr( $data['block_bg_hv_cl_2']) );
	}
	//block border color
	if( !empty( $data['block_bd_cl_2'] ) ){
		$css = '
				.%1$s .slz-features-block .slz-feature-block {
					border-color: %2$s;
				}
			';
		$custom_css .= sprintf( $css, esc_attr( $data['uniq_id'] ), esc_attr( $data['block_bd_cl_2']) );
	}
	//block border color
	if( !empty( $data['block_bd_hv_cl_2'] ) ){
		$css = '
				.%1$s .slz-features-block .slz-feature-block:hover {
					border-color: %2$s;
				}
			';
		$custom_css .= sprintf( $css, esc_attr( $data['uniq_id'] ), esc_attr( $data['block_bd_hv_cl_2']) );
	}
	if ( !empty( $custom_css ) ) {
		do_action('slz_add_inline_style', $custom_css);
	}

?>
