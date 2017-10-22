<?php

//variable default
$out = $css = $custom_css = $unit = $price_class = '';
$x = 1;
$features_arr = $btn_link_arr = array();

switch ( $data['layout-1-style'] ) {

	case 'st-california':
		$price_class = 'wrapper-circle';
		break;
	default:
		break;
}

$out .= '<div class="slz-list-pricing-box slz-list-block  '.esc_attr( $data['column_class'] ).'">';

	for ($i=1; $i <= $data['column'] ; $i++) { 

		if ( $data['active'.$i] == 'yes' ) {
			$active = 'active';
		}else{
			$active = '';
		}

		$out .= '<div class="item item-'.esc_attr( $i ).'">';

			$out .= '<div class="slz-pricing-box '.' '.esc_attr( $active ).'">';

				/* ---------mark label--------*/

				if ( !empty( $data['label'.$i] ) ) {
					$out .= '<div class="pricing-label">'. esc_html( $data['label'.$i] ) .'</div>';
				}

				/*-----pricing header-------*/

				$out .= '<div class="pricing-header">';
					if ( !empty( $data['title'.$i] ) ) {
						$out .= '<div class="pricing-title">'.esc_html( $data['title'.$i] ).'</div>';
					}
					$out .= '<div class="pricing-section pricing-price '.esc_attr($price_class).'">';
						if ( !empty( $data['price'.$i] ) && !empty( $data['currency'.$i] ) ) {
							if ( !empty( $data['unit'.$i] ) ) {
								$unit = $data['unit'.$i];
							}else{
								$unit = '';
							}
							$out .= '
								<sup class="unit">'. esc_html( $unit ) .'</sup>
								'. esc_html( $data['price'.$i] ) .'
								<span class="per">'. esc_html( $data['currency'.$i] ) .'</span>
							';
						}
					$out .= '</div>';
					if ( !empty( $data['sub_title'.$i] ) ) {
						$out .= '<div class="sub-title pricing-sub-title">'.wp_kses_post($data['sub_title'.$i]).'</div>';
					}
				$out .= '</div>';

				/*-------pricing body----------*/

				$out .= '<div class="pricing-body">';
					$features_arr = (array) vc_param_group_parse_atts( $data['features'.$i] );
					if ( !empty( $features_arr ) ) {
						$x = 1;
						$default_value = array(
							'text' => '',
							'text_cl' =>'',
							'icon_feature'=>'',
							'icon_feature_cl'=>'',
						);
						foreach ( $features_arr as $feature ) {
							$feature = array_merge( $default_value, $feature );
							if( !empty( $feature['text'] ) ){
								$out .= '<div class="item feature-'.esc_attr($x).'">';
									if( !empty($feature['icon_feature']) ){
										$out .= '<i class="slz-icon ' . esc_attr($feature['icon_feature']) . '"></i>';
									}
									$out .= '<span class="text"> ' . esc_html( $feature['text'] ) . ' </span>';
								$out .= '</div>';
							}
							if ( !empty( $feature['icon_feature_cl'] ) ) {
								$css = '
									.%1$s .item-%2$s .feature-%4$s .slz-icon{
										color: %3$s;
									}
								';
								$custom_css .= sprintf( $css, esc_attr( $data['uniq_id'] ), esc_attr( $i ), esc_attr( $feature['icon_feature_cl'] ), esc_attr( $x ) );
							}
							if ( !empty( $feature['text_cl'] ) ) {
								$css = '
									.%1$s .item-%2$s .feature-%4$s .text{
										color: %3$s;
									}
								';
								$custom_css .= sprintf( $css, esc_attr( $data['uniq_id'] ), esc_attr( $i ), esc_attr( $feature['text_cl'] ), esc_attr( $x ) );
							}
							$x++;
						}
					}
				$out .= '</div>';

				/*--------footer------------*/

				if ( !empty( $data['btn_text'.$i] ) && !empty( $data['btn_link'.$i] ) ) {
					$btn_link_arr = SLZ_Util::get_link( $data['btn_link'.$i] );
					$out .= '
						<div class="pricing-footer">
							<a href="'. esc_url( $btn_link_arr['link'] ) .'" '. esc_attr( $btn_link_arr['target'] ) .' '. esc_attr( $btn_link_arr['url_title'] ) .' class="btn pricing-button">'. esc_html( $data['btn_text'.$i] ) .'</a>
						</div>
					';
				}

			$out .= '</div>';

		$out .= '</div>';


		/* --------------custom css------------ */

			
			if ( !empty( $data['header_bg_cl'.$i] ) ) {
				$css = '
					.%1$s .item-%2$s .pricing-header {
						background-color: %3$s;
					}
				';
				$custom_css .= sprintf( $css, esc_attr( $data['uniq_id'] ), esc_attr( $i ), esc_attr( $data['header_bg_cl'.$i] ) );
			}
			/*----------------title--------------*/

			if ( !empty( $data['title_cl'.$i] ) ) {
				$css = '
					.%1$s .item-%2$s .pricing-title {
						color: %3$s;
					}
				';
				$custom_css .= sprintf( $css, esc_attr( $data['uniq_id'] ), esc_attr( $i ), esc_attr( $data['title_cl'.$i] ) );
			}

			/*----------------subtitle--------------*/

			if ( !empty( $data['sub_title_cl'.$i] ) ) {
				$css = '
					.%1$s .item-%2$s .pricing-sub-title {
						color: %3$s;
					}
				';
				$custom_css .= sprintf( $css, esc_attr( $data['uniq_id'] ), esc_attr( $i ), esc_attr( $data['sub_title_cl'.$i] ) );
			}

			/*----------------price--------------*/

			if ( !empty( $data['price_cl'.$i] ) ) {
				$css = '
					.%1$s .item-%2$s .pricing-section.pricing-price {
						color: %3$s;
					}
				';
				$custom_css .= sprintf( $css, esc_attr( $data['uniq_id'] ), esc_attr( $i ), esc_attr( $data['price_cl'.$i] ) );
			}
			if ( !empty( $data['price_subfix_cl'.$i] ) ) {
				$css = '
					.%1$s .item-%2$s .pricing-section.pricing-price span.per {
						color: %3$s;
					}
				';
				$custom_css .= sprintf( $css, esc_attr( $data['uniq_id'] ), esc_attr( $i ), esc_attr( $data['price_subfix_cl'.$i] ) );
			}

			/*----------------button--------------*/

			if ( !empty( $data['btn_cl'.$i] ) ) {
				$css = '
					.%1$s .item-%2$s .btn.pricing-button {
						color: %3$s;
					}
				';
				$custom_css .= sprintf( $css, esc_attr( $data['uniq_id'] ), esc_attr( $i ), esc_attr( $data['btn_cl'.$i] ) );
			}
			if ( !empty( $data['btn_hv_cl'.$i] ) ) {
				$css = '
					.%1$s .item-%2$s .btn.pricing-button:hover {
						color: %3$s;
					}
				';
				$custom_css .= sprintf( $css, esc_attr( $data['uniq_id'] ), esc_attr( $i ), esc_attr( $data['btn_hv_cl'.$i] ) );
			}
			if ( !empty( $data['btn_bg_cl'.$i] ) ) {
				$css = '
					.%1$s .item-%2$s .btn.pricing-button {
						background-color: %3$s;
					}
				';
				$custom_css .= sprintf( $css, esc_attr( $data['uniq_id'] ), esc_attr( $i ), esc_attr( $data['btn_bg_cl'.$i] ) );
			}
			if ( !empty( $data['btn_bg_hv_cl'.$i] ) ) {
				$css = '
					.%1$s .item-%2$s .btn.pricing-button:hover {
						background-color: %3$s;
					}
				';
				$custom_css .= sprintf( $css, esc_attr( $data['uniq_id'] ), esc_attr( $i ), esc_attr( $data['btn_bg_hv_cl'.$i] ) );
			}

			/*----------------mark label--------------*/

			if ( !empty( $data['label_text_cl'.$i] ) ) {
				$css = '
					.%1$s .item-%2$s .pricing-label {
						color: %3$s;
					}
				';
				$custom_css .= sprintf( $css, esc_attr( $data['uniq_id'] ), esc_attr( $i ), esc_attr( $data['label_text_cl'.$i] ) );
			}
			if ( !empty( $data['label_bg_cl'.$i] ) ) {
				$css = '
					.%1$s .item-%2$s .pricing-label {
						background-color: %3$s;
					}
				';
				$custom_css .= sprintf( $css, esc_attr( $data['uniq_id'] ), esc_attr( $i ), esc_attr( $data['label_bg_cl'.$i] ) );
			}


			if ( !empty( $custom_css ) ) {
				do_action('slz_add_inline_style', $custom_css);
			}

		/* -----------end custom css ------------*/


	}// end for
$out .= '</div>';

echo wp_kses_post($out);

?>