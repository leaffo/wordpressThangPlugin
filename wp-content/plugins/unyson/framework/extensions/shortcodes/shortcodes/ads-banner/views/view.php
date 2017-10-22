<?php if ( ! defined( 'ABSPATH' ) ) {
	die( 'Forbidden' );
}

$unique_id = SLZ_Com::make_id();
$sc_class  = $data['extra_class'] . ' banner-' . $unique_id;


/*
 * Custom CSS
 */

$custom_css = '';
$custom_css .= ! empty( $data['block_title_color'] ) && $data['block_title_color'] != '#' ?
	sprintf( '.slz-banner-image.banner-%1$s .slz-title-shortcode{ color: %2$s }',
		esc_attr( $unique_id ), esc_attr( $data['block_title_color'] ) ) : '';

if ( ! empty( $custom_css ) ) {
	do_action( 'slz_add_inline_style', $custom_css );
}
?>
<div class="slz-shortcode sc_ads_banner slz-ads-banner slz-banner-image <?php echo esc_attr( $sc_class ) ?>">
	<?php

	if ( ! empty( $data['block_title'] ) ) {
		printf( '<div class="slz-title-shortcode">%s</div>', esc_html( $data['block_title'] ) );
	}


	?>
	<div class="item-wrapper">
		//foreach
		?>
		<div class="item">
			<?php
			echo SLZ_Com::get_advertisement( $data['adspot'] );
			?>
		</div>
		// end foreach
	</div>


</div>