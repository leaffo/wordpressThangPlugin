<?php
$out = $icon_class = $has_background = $custom_css = $css = '';

$i = 1;

$shortcode = slz_ext( 'shortcodes' )->get_shortcode('icons_block');

$data['align'] = !empty($data['align']) ? $data['align']: 'text-c';

$param_default  = array(
	'block_bg_cl'              => '',
	'block_bg_hv_cl'           => '',
	'icon_type'                => '',
	'block_bg_img'             => '',
	'block_bg_hv_img'          => '',
	'img_up'                   => '',
	'title'                    => '',
	'des'                      => '',
	'link'                     => '',
	'btn'                      => '',
);

switch ( $data['layout-3-style'] ) {

	case 'st-harrogate':
		$icon_class = 'icon-background icon-circle';
		break;
	case 'st-leeds':
		$icon_class = 'icon-background icon-square';
		break;		
	default:
		break;
}

if ( !empty( $data['icon_box'] ) ) {
	$items = (array) vc_param_group_parse_atts( $data['icon_box'] );
	$out .= '<div class="slz-list-icon-block '. esc_attr( $data['column'] ) .' '.esc_attr($data['spacing_style']).' ">';
		foreach ( $items as $item ) {

			//--------------------- custom css-------------------//
			
				// background color
				if(!empty($item['block_bg_cl'])){
					$has_background = "has-bg";
					$css = '
							.%1$s .item-%2$s .slz-icon-block{
								background-color: %3$s !important;
							}
						';
					$custom_css .= sprintf( $css, esc_attr( $data['uniq_id'] ), esc_attr($i), esc_attr( $item['block_bg_cl']) );

				}

				// hover background color
				if(!empty($item['block_bg_hv_cl'])){
					$has_background = "has-bg-hover";
					$css = '
							.%1$s .item-%2$s .slz-icon-block.has-bg-hover .bg-icon-block {
								background-color: %3$s !important;
							}
						';
					$custom_css .= sprintf( $css, esc_attr( $data['uniq_id'] ), esc_attr($i), esc_attr( $item['block_bg_hv_cl']) );
				}

				// background image
				if(!empty($item['block_bg_img'])) {
					$img_url = wp_get_attachment_url( $item['block_bg_img'] );
					if( $img_url ){
						$has_background = "has-bg";
						$css = '
							.%1$s .item-%2$s .slz-icon-block{
								background-image: url("%3$s") !important;
							}
						';
						$custom_css .= sprintf( $css, esc_attr( $data['uniq_id'] ), esc_attr($i), esc_url($img_url) );
					}
				}

				// hover background image
				if(!empty($item['block_bg_hv_img'])) {
					$img_url = wp_get_attachment_url( $item['block_bg_hv_img'] );
					if( $img_url ) {
						$has_background = "has-bg-hover bg-img-hover";
						$css = '
							.%1$s .item-%2$s .slz-icon-block.has-bg-hover .bg-icon-block {
								background-image: url("%3$s") !important;
							}
						';
						$custom_css .= sprintf( $css, esc_attr( $data['uniq_id'] ), esc_attr($i), esc_url($img_url) );
					}
				}

			//---------------content html----------------------//
			
			$item = array_merge( $param_default, $item );
			$link = SLZ_Util::parse_vc_link( $item['link'] );
			$title_format = '%1$s';
			if( !empty($link['url']) ) {
				$title_format = '<a href="%2$s" %3$s >%1$s</a>';
			}
			$out .= '<div class="item item-'.esc_attr($i).' '.$data['item_animation'] .' wow" data-wow-delay="' . $data['delay_animation'] . '">';

				$out .='<div class="slz-icon-block '.esc_attr($has_background).' '.esc_attr($data['align']).'">';

					// -----------icon --------//
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
						// title
						if( !empty($item['title']) ){
							$title = sprintf($title_format, esc_attr( $item['title'] ), esc_url($link['url']), $link['other_atts'] );
							$out .= '<div class="title '.esc_attr($data['title_line']).'">'.$title.'</div>';
						}
					$out .= '</div>';

					//-----------content--------//
					$out .= '<div class="content-cell">';
						$out .= '<div class="wrapper-info">';
							// description
							if( !empty($item['des'])){
								$out .= '<div class="description">'.wp_kses_post( nl2br ($item['des'] ) ).'</div>';
							}
							if( !empty($item['btn']) ){
								$out .= '<a href="'.esc_url($link['url']).'" class="btn-more slz-btn"><span class="btn-text">'.esc_html($item['btn']).'</span><i class="fa fa-arrow-circle-right"></i></a>';
							}
						$out .= '</div>';
					$out .= '</div>';

					//----------- background hover --------//
					$out .= '<div class="bg-icon-block direction-hover"></div>';
					
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

//-------custom general css------------//

	// icon background color
	if( !empty( $data['icon_bg_cl_3'] ) ){
		$css = '
				.%1$s .icon-background .wrapper-icon {
					background-color: %2$s !important;
				}
			';
		$custom_css .= sprintf( $css, esc_attr( $data['uniq_id'] ), esc_attr( $data['icon_bg_cl_3']) );
	}

	// icon background hover color
	if( !empty( $data['icon_bg_hv_cl_3'] ) ){
		$css = '
				.%1$s .icon-background .wrapper-icon:hover{
					background-color: %2$s !important;
				}
			';
		$custom_css .= sprintf( $css, esc_attr( $data['uniq_id'] ), esc_attr( $data['icon_bg_hv_cl_3']) );
	}

	// icon background color
	if( !empty( $data['icon_bd_cl_3'] ) ){
		$css = '
				.%1$s .icon-background .wrapper-icon {
					border-color: %2$s !important;
				}
			';
		$custom_css .= sprintf( $css, esc_attr( $data['uniq_id'] ), esc_attr( $data['icon_bd_cl_3']) );
	}

	// icon background hover color
	if( !empty( $data['icon_bd_hv_cl_3'] ) ){
		$css = '
				.%1$s .icon-background .wrapper-icon:hover{
					border-color: %2$s !important;
				}
			';
		$custom_css .= sprintf( $css, esc_attr( $data['uniq_id'] ), esc_attr( $data['icon_bd_hv_cl_3']) );
	}

	if ( !empty( $custom_css ) ) {
		do_action('slz_add_inline_style', $custom_css);
	}