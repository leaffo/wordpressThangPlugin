<?php
if( !empty($data['title_color'])){
	$custom_css .= '.%1$s .slz-testimonial .name{ color: '.esc_attr($data['title_color']).' !important; }' . "\n";
}
if( !empty($data['position_color'])){
	$custom_css .= '.%1$s .slz-testimonial .position{ color: '.esc_attr($data['position_color']).' !important; }';
}
if( !empty($data['description_color'])){
	$custom_css .= '.%1$s .slz-testimonial .description .content{ color: '.esc_attr($data['description_color']).' !important; }';
}
if( !empty($data['quote_color'])){
	$custom_css .= '.%1$s .slz-testimonial.show-quote .icon-quote:before{ color: '.esc_attr($data['quote_color']).' !important; }';
}
for($i=1; $i<5; $i++) {
	$style_cls = '';
	if( $style ) $style_cls = '.' . $style;
	switch($style){
		case 'st-california':
		case 'st-mumbai':
			if( !empty($data['bg_color_' . $i])){
				$custom_css .= '.%1$s .slz-testimonial'.esc_attr($style_cls).'{ background-color: '.esc_attr($data['bg_color_' . $i]).' !important; }';

			}
			if( !empty($data['border_color_' . $i])){
				$custom_css .= '.%1$s .slz-testimonial'.esc_attr($style_cls).'{ border-color: '.esc_attr($data['border_color_' . $i]).' !important; }';
			}
			break;
		case 'st-rome':
			if( !empty($data['bg_color_' . $i])){
				$custom_css .= '.%1$s .slz-testimonial'.esc_attr($style_cls).' { background-color: '.esc_attr($data['bg_color_' . $i]).' !important; }';
				$custom_css .= '.%1$s .slz-testimonial'.esc_attr($style_cls).' .description-arrow{ background-color: '.esc_attr($data['bg_color_' . $i]).' !important; }';
			}
			if( !empty($data['border_color_' . $i])){
				$custom_css .= '.%1$s .slz-testimonial'.esc_attr($style_cls).' { border-color: '.esc_attr($data['border_color_' . $i]).'; }';
				$custom_css .= '.%1$s .slz-testimonial'.esc_attr($style_cls).' .description-arrow{ border-color: '.esc_attr($data['border_color_' . $i]).' !important; }';
			}
			break;
		case 'st-georgia':
		case 'st-pune':
		case 'st-harrogate':
			if( !empty($data['bg_color_' . $i])){
				$custom_css .= '.%1$s .slz-testimonial'.esc_attr($style_cls).' .description{ background-color: '.esc_attr($data['bg_color_' . $i]).' !important; }';
				$custom_css .= '.%1$s .slz-testimonial'.esc_attr($style_cls).' .description-arrow{ background-color: '.esc_attr($data['bg_color_' . $i]).' !important; }';
			}
			if( !empty($data['border_color_' . $i])){
				$custom_css .= '.%1$s .slz-testimonial'.esc_attr($style_cls).' .description{ border-color: '.esc_attr($data['border_color_' . $i]).' !important; }';
				$custom_css .= '.%1$s .slz-testimonial'.esc_attr($style_cls).' .description:before{ background-color: '.esc_attr($data['border_color_' . $i]).' !important; }';
				$custom_css .= '.%1$s .slz-testimonial'.esc_attr($style_cls).' .description:after{ background-color: '.esc_attr($data['border_color_' . $i]).' !important; }';
				$custom_css .= '.%1$s .slz-testimonial'.esc_attr($style_cls).' .description-arrow{ border-color: '.esc_attr($data['border_color_' . $i]).' !important; }';
			}
			break;
	}
}
//slide custom
if( !empty($data['dots_color'])){
	$custom_css .= '.%1$s .slick-dots li button:before{ color: '.esc_attr($data['dots_color']).' !important; }';
}
if( !empty($data['arrows_color'])){
	$custom_css .= '.%1$s .slz-carousel-wrapper .btn{ color: '.esc_attr($data['arrows_color']).' !important; }';
}
if( !empty($data['arrows_hv_color'])){
	$custom_css .= '.%1$s .slz-carousel-wrapper .btn:hover{ color: '.esc_attr($data['arrows_hv_color']).' !important; }';
}
if( !empty($data['arrows_bg_hv_color'])){
	$custom_css .= '.%1$s .slz-carousel-wrapper .btn:hover{ background-color: '.esc_attr($data['arrows_bg_hv_color']).' !important; }';
}
if( !empty($data['arrows_bg_color'])){
	$custom_css .= '.%1$s .slz-carousel-wrapper .btn{ background-color: '.esc_attr($data['arrows_bg_color']).' !important; }';
}
if( $custom_css ) {
	$custom_css = sprintf( $custom_css, esc_attr($data['uniq_id']) );
	do_action('slz_add_inline_style', $custom_css);
}