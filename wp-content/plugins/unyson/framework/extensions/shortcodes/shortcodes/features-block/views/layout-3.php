<?php
$out = $image_class = $under_line  = $custom_css = $css = '';

$i = 1;

$shortcode = slz_ext( 'shortcodes' )->get_shortcode('icons_block');

$param_default  = array(
	'title'            => '',
	'des'              => '',
	'img_up'           => '',
	'title'            => '',
	'des'              => '',
);

switch ( $data['layout-3-style'] ) {

	case 'st-london':
		$image_class = 'image-full';
		break;

	case 'st-harogate':
		$image_class = 'image-circle';
		break;

	case 'st-leeds':
		$image_class = 'image-full';
		break;

	default:
		break;
}

if ( !empty( $data['features_3'] ) ) {
	$items = (array) vc_param_group_parse_atts( $data['features_3'] );
	$out .= '<div class="slz-features-block '. esc_attr( $data['column'] ) .' ">';
		foreach ( $items as $item ) {

			//---------------content html----------------------//

			$item = array_merge( $param_default, $item );
		
			$out .= '<div class="item item-'.esc_attr($i).'">';

				$out .='<div class="slz-feature-block">';

					// -----------image--------//

					$out .= '<div class="image-cell">';
						if ( !empty( $item['img_up'] ) && $img_url = wp_get_attachment_url( $item['img_up'] ) ) {
							$out .= '
								<div class="wrapper-icon-image '.esc_attr($image_class).'">
									<img src="'.esc_url( $img_url ).'" alt="" class="slz-icon-img">
								</div>
							';
						}
					$out .= '</div>';

					//-----------content--------//
					$out .= '<div class="content-cell '.esc_attr($data['align']).'">';
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

			$i++;

		}//end foreach

	$out .= '</div>';

	if ( !empty( $custom_css ) ) {
		do_action('slz_add_inline_style', $custom_css);
	}
}

//printf data
echo wp_kses_post($out);

?>
