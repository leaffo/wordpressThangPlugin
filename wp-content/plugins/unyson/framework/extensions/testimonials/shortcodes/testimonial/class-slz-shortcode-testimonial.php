<?php if ( ! defined( 'ABSPATH' ) ) {
	die( 'Forbidden' );
}

class SLZ_Shortcode_Testimonial extends SLZ_Shortcode
{
	protected function _render($atts, $content = null, $tag = '', $ajax = false)
	{

		$view_path = $this->locate_path('/views');

		if( !$ajax ){
			$data = $this->get_data( $atts );
		} else {
			$data = $atts;
		}

		$this->enqueue_static();
		return slz_render_view($this->locate_path('/views/view.php'), array( 'data' => $data, 'view_path' => $view_path, 'instance' => $this ) );
		
	}
	public function add_custom_css( $data, $style, $custom_css = '' ){
		if( !empty($data['title_color'])){
			$custom_css .= '.%1$s .slz-testimonial .name{ color: '.esc_attr($data['title_color']).'; }' . "\n";
		}
		if( !empty($data['position_color'])){
			$custom_css .= '.%1$s .slz-testimonial .position{ color: '.esc_attr($data['position_color']).'; }';
		}
		if( !empty($data['description_color'])){
			$custom_css .= '.%1$s .slz-testimonial .description{ color: '.esc_attr($data['description_color']).'; }';
		}
		if( !empty($data['quote_color'])){
			$custom_css .= '.%1$s .slz-testimonial.show-quote .icon-quote::before{ color: '.esc_attr($data['quote_color']).'; }';
		}
		for($i=1; $i<5; $i++) {
			$style_cls = '';
			if( $style ) $style_cls = '.' . $style;
			switch($style){
				case 'st-california':
				case 'st-mumbai':
					if( !empty($data['bg_color_' . $i])){
						$custom_css .= '.%1$s .slz-testimonial'.esc_attr($style_cls).'{ background-color: '.esc_attr($data['bg_color_' . $i]).'; }';
						
					}
					if( !empty($data['border_color_' . $i])){
						$custom_css .= '.%1$s .slz-testimonial'.esc_attr($style_cls).'{ border-color: '.esc_attr($data['border_color_' . $i]).'; }';
					}
					break;
				case 'st-rome':
					if( !empty($data['bg_color_' . $i])){
						$custom_css .= '.%1$s .slz-testimonial'.esc_attr($style_cls).' { background-color: '.esc_attr($data['bg_color_' . $i]).'; }';
						$custom_css .= '.%1$s .slz-testimonial'.esc_attr($style_cls).' .description-arrow{ background-color: '.esc_attr($data['bg_color_' . $i]).'; }';
					}
					if( !empty($data['border_color_' . $i])){
						$custom_css .= '.%1$s .slz-testimonial'.esc_attr($style_cls).' { border-color: '.esc_attr($data['border_color_' . $i]).'; }';
						$custom_css .= '.%1$s .slz-testimonial'.esc_attr($style_cls).' .description-arrow{ border-color: '.esc_attr($data['border_color_' . $i]).'; }';
					}
					break;
				case 'st-georgia':
				case 'st-pune':
				case 'st-harrogate':
					if( !empty($data['bg_color_' . $i])){
						$custom_css .= '.%1$s .slz-testimonial'.esc_attr($style_cls).' .description{ background-color: '.esc_attr($data['bg_color_' . $i]).'; }';
						$custom_css .= '.%1$s .slz-testimonial'.esc_attr($style_cls).' .description-arrow{ background-color: '.esc_attr($data['bg_color_' . $i]).'; }';
					}
					if( !empty($data['border_color_' . $i])){
						$custom_css .= '.%1$s .slz-testimonial'.esc_attr($style_cls).' .description{ border-color: '.esc_attr($data['border_color_' . $i]).'; }';
						$custom_css .= '.%1$s .slz-testimonial'.esc_attr($style_cls).' .description:before{ background-color: '.esc_attr($data['border_color_' . $i]).'; }';
						$custom_css .= '.%1$s .slz-testimonial'.esc_attr($style_cls).' .description:after{ background-color: '.esc_attr($data['border_color_' . $i]).'; }';
						$custom_css .= '.%1$s .slz-testimonial'.esc_attr($style_cls).' .description-arrow{ border-color: '.esc_attr($data['border_color_' . $i]).'; }';
					}
					break;
			}
		}
		//slide custom
		if( !empty($data['dots_color'])){
			$custom_css .= '.%1$s .slick-dots li button::before{ color: '.esc_attr($data['dots_color']).'; }';
		}
		if( !empty($data['arrows_color'])){
			$custom_css .= '.%1$s .slz-carousel-wrapper .btn{ color: '.esc_attr($data['arrows_color']).'; }';
		}
		if( !empty($data['arrows_hv_color'])){
			$custom_css .= '.%1$s .slz-carousel-wrapper .btn:hover{ color: '.esc_attr($data['arrows_hv_color']).'; }';
		}
		if( !empty($data['arrows_bg_hv_color'])){
			$custom_css .= '.%1$s .slz-carousel-wrapper .btn:hover{ background-color: '.esc_attr($data['arrows_bg_hv_color']).'; }';
		}
		if( !empty($data['arrows_bg_color'])){
			$custom_css .= '.%1$s .slz-carousel-wrapper .btn{ background-color: '.esc_attr($data['arrows_bg_color']).'; }';
		}
		if( $custom_css ) {
			$custom_css = sprintf( $custom_css, esc_attr($data['uniq_id']) );
			do_action('slz_add_inline_style', $custom_css);
		}
	}
	public function get_css_bg_image( $data, $style, $post_id ){
		$custom_css = '';
		$arr_style = array('st-georgia' => '1', 'st-pune' => '2', 'st-harrogate' => '3', 'st-rome' => '4', 'st-saopaulo' => '6');
		if( isset($arr_style[$style]) ){
			$i = $arr_style[$style];
			if( !empty($data['bg_f_image_' . $i]) && $data['bg_f_image_' . $i] == 'yes'){
				$thumb_id = get_post_thumbnail_id( $post_id );
				$bg_f_image = wp_get_attachment_url($thumb_id);
				if( $bg_f_image ) {
					if( $style == 'st-rome') {
						$custom_css = '.%1$s .block.post-'.$post_id.' .slz-testimonial.'.esc_attr($style).'{ background-image: url('.esc_url($bg_f_image).'); }';
					} else {
						$custom_css = '.%1$s .post-'.$post_id.' .slz-testimonial.'.esc_attr($style).' .description{ background-image: url('.esc_url($bg_f_image).'); }';
					}
				}
			}
		}
		return $custom_css;
	}
}
