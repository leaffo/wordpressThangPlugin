<?php
$out = $icon_class = $custom_css = $css = '';

$i = 1;

$shortcode = slz_ext( 'shortcodes' )->get_shortcode('process');

$param_default  = array(
	'title'                    => '',
	'des'                      => '',
	'icon_type'                => '',
);

switch ( $data['layout-2-style'] ) {

	case 'st-chennai':
		$icon_class = 'icon-background icon-circle';
		break;
	default:
		break;
}

if ( !empty( $data['add_step_2'] ) ) {
	$items = (array) vc_param_group_parse_atts( $data['add_step_2'] );
	$out .= '<div class="slz-list-process '. esc_attr( $data['column'] ) .'">';
		foreach ( $items as $item ) {

			//---------------content html----------------------//

			$item = array_merge( $param_default, $item );
		
			$out .= '<div class="item item-'.esc_attr($i).' '.$data['item_animation'] .' wow" data-wow-delay="' . $data['delay_animation'] . '">';

				$out .='<div class="slz-process">';

					// ----------- icon --------//
				
					$out .= '<div class="icon-cell '.esc_attr($icon_class).'">';
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

					//----------- content --------//
					$out .= '<div class="content-cell">';
						$out .= '<div class="wrapper-info">';
							// title
							if( !empty($item['title']) ){

								$out .= '<div class="title '.esc_attr($data['title_line']).'">'.esc_attr( $item['title'] ).'</div>';
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

}

//printf data
echo wp_kses_post($out);