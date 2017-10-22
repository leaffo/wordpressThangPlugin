<?php if ( ! defined( 'ABSPATH' ) ) {
	die( 'Forbidden' );
}

$style = ! empty( $data['layout-1-style'] ) ? $data['layout-1-style'] : 'st-florida';
?>
<div class="block-wrapper <?php echo esc_attr( $style ) ?>">
	<?php
	if ( ! empty( $data['avatar'] ) ) {
		$image = wp_get_attachment_image( intval( $data['avatar'] ), $data['thumb_size'], false, array( 'class' => 'img-responsive' ) );
		if ( ! empty( $image ) ) {
			printf( '<div class="image-wrapper">%s</div>', $image );
		}
	}
	?>
    <div class="content-wrapper">
		<?php
		if ( ! empty( $data['link_arr']['url'] ) ) {
			printf( '<a href="%1$s" class="name" %2$s>%3$s</a>', esc_url( $data['link_arr']['url'] ), esc_attr( $data['link_arr']['other_atts'] ), esc_html( $data['name'] ) );
		} else {
			printf( '<div class="name">%s</div>', esc_html( $data['name'] ) );
		}

		if ( ! empty( $data['position'] ) ) {
			printf( '<div class="position">%s</div>', esc_html( $data['position'] ) );
		}

		if ( ! empty( $data['short_info'] ) ) {
			printf( '<div class="info">%s</div>', esc_html( $data['short_info'] ) );
		}

		if ( ! empty( $data['detail'] ) ) {
			printf( '<div class="content-text">%s</div>', wp_kses_post( nl2br( $data['detail'] ) ) );
		}
		?>
    </div>
	<?php echo slz_render_view( $instance->locate_path( '/views/social-item.php' ), compact( 'data', 'instance' ) ); ?>
</div>