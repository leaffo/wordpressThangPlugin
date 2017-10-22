<?php if ( ! defined( 'ABSPATH' ) ) {
	die( 'Forbidden' );
}

$map_layouts = array(
	'layout-1' => 'la-unitedstates',
);

$unique_class = 'slz-ads-banner-carousel-' . SLZ_Com::make_id();
$layout_class = isset( $map_layouts[ $data['layout'] ] ) ? $map_layouts[ $data['layout'] ] : $map_layouts['layout-1'];
$style_class  = ! empty( $data['style'] ) ? $data['style'] : '';
$sc_class     = $unique_class . ' ' . $layout_class . ' ' . $style_class . ' ' . $data['extra_class'];

$slider_atts = array(
	'slidesToShow' => $data['slide_to_show'],
	'infinite'     => $data['slide_infinite'],
	'dots'         => $data['slide_autoplay'],
	'arrows'       => $data['slide_arrows'],
	'autoplay'     => $data['slide_autoplay'],
	'speed'        => $data['slide_speed'],
);

/*
 * Custom CSS
 */
$custom_css = '';
$custom_css .= ! empty( $data['block_title_color'] ) ? sprintf( '.%1$s .slz-title-shortcode { color: %2$s !important; }',
	esc_attr( $unique_class ), esc_attr( $data['block_title_color'] ) ) : '';

if ( ! empty( $custom_css ) ) {
	do_action( 'slz_add_inline_style', $custom_css );
}
?>
<div class="slz-shortcode sc-ads-banner-carousel <?php echo esc_attr( $sc_class ) ?>">
	<?php
	if ( ! empty( $data['block_title'] ) ) {
		printf( '<div class="slz-title-shortcode">%s</div>', esc_html( $data['block_title'] ) );
	}
	?>
    <div class="banner-wrapper" data-slick="<?php echo esc_attr( json_encode( $slider_atts ) ); ?>">
		<?php
		if ( ! empty( $data['ads'] ) ) {
			list( $tmp, $data['ads'] ) = SLZ_Util::get_list_vc_param_group( $data, 'ads', 'ads_id' );

			if ( is_array( $data['ads'] ) ) {
				foreach ( $data['ads'] as $ads_id ) {
					?>
                    <div class="item">
						<?php
						echo $ads_id;
						echo SLZ_Com::get_advertisement( $ads_id );
						?>
                    </div>
					<?php
				}
			}
		}
		?>
    </div>
</div>
