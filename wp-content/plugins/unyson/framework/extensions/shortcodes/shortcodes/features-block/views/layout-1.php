<?php
$out = $icon_class  = $has_background = $custom_css = $css = '';

$i = 1;

$shortcode = slz_ext( 'shortcodes' )->get_shortcode('icons_block');

$data['align'] = empty($data['align']) ? 'text-l' : $data['align'];

$param_default  = array(
	'title'            => '',
	'des'              => '',
);

if ( !empty( $data['features_1'] ) ) {
	$items = (array) vc_param_group_parse_atts( $data['features_1'] );
	$out .= '<div class="slz-features-block  '. esc_attr( $data['column'] ) .' ">';
		foreach ( $items as $item ) {

			//---------------content html----------------------//

			$item = array_merge( $param_default, $item );
		
			$out .= '<div class="item item-'.esc_attr($i).'">';

				$out .='<div class="slz-feature-block">';
				
					//----------- content --------//
					$out .= '<div class="features-content">';
						$out .= '<div class="info-wrapper">';

							// ----------- number --------//
							$out .= '<div class="number">';
								$out .= ( $i > 9 ) ? esc_html($i) : '0' . esc_html($i);
							$out .= '</div>';

							// title
							if( !empty($item['title']) ){

								$out .= '<div class="title '.esc_attr($data['title_line']).'">'.esc_attr( $item['title'] ).'</div>';
							}

						$out .= '</div>';

						// description
						if( !empty($item['des'])){
							$out .= '<div class="description">'.wp_kses_post( nl2br ($item['des'] ) ).'</div>';
						}

					$out .= '</div>';

				$out .= '</div>';
				
			$out .= '</div>';

			$i++;

		}//end foreach

	$out .= '</div>';

}

//printf data
echo wp_kses_post($out);

// ---------------custom css for layout 1------------//
	// icon color
	if( !empty( $data['number_cl'] ) ){
		$css = '
				.%1$s .number {
					color: %2$s!important;
				}
			';
		$custom_css .= sprintf( $css, esc_attr( $data['uniq_id'] ), esc_attr( $data['number_cl']) );
	}
	if ( !empty( $custom_css ) ) {
		do_action('slz_add_inline_style', $custom_css);
	}

?>