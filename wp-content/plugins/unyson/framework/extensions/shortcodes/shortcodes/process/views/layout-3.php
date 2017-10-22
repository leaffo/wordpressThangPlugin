<?php
$out = $icon_class = $custom_css = $css = '';

$i = 1;

$shortcode = slz_ext( 'shortcodes' )->get_shortcode('process');

$param_default  = array(
	'title'                    => '',
	'des'                      => '',
	'icon_type'                => '',
	'percent'                  => '',
);

switch ( $data['layout-3-style'] ) {

	case 'st-london':
		$icon_class = 'icon-background icon-circle';
		break;
	default:
		break;
}

if ( !empty( $data['add_step_3'] ) ) {
	$items = (array) vc_param_group_parse_atts( $data['add_step_3'] );
	$out .= '<div class="slz-progress-bar-02 slz-process-percent slz-list-process '. esc_attr( $data['column'] ) .'">';
		foreach ( $items as $item ) {

			//---------------content html----------------------//

			$item = array_merge( $param_default, $item );
		
			$out .= '<div class="item item-'.esc_attr($i).' '.$data['item_animation'] .' wow" data-wow-delay="' . $data['delay_animation'] . '">';

				$out .='<div class="slz-process">';

					/* ----------- icon --------*/
					$out .= '<div class="icon-cell '.esc_attr($icon_class).'">';

							$block_id = $data['uniq_id'].$i;

						$out .= '<div data-percent="'.esc_attr($item['percent']).'" data-block-class="'.esc_attr(
								$block_id).'" data-plugin-options="{&quot;trackColor&quot;:&quot;#ececec&quot;,&quot;barColor&quot;:&quot;'.esc_attr($data['percent_cl']).'&quot;,&quot;lineWidth&quot;:&quot;8&quot;,&quot;lineWidthCircle&quot;:&quot;8&quot;}" class="process-circle '.esc_attr(
								$block_id).'">';

							$out .= '<canvas id="circle-'.esc_attr(
								$block_id).'" width="150" height="150" class="circle"></canvas>';

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
					
					$out .= '</div>';

					/*----------- content --------*/
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
printf('%s',$out);