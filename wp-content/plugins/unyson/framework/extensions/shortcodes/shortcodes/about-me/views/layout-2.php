<?php if ( ! defined( 'ABSPATH' ) ) {
	die( 'Forbidden' );
}

$style = ! empty( $attr['layout-2-style'] ) ? $attr['layout-2-style'] : 'st-chennai';
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
        <div class="heading-wrapper">
            <div class="heading-left">
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
				?>
            </div>
            <div class="heading-right">
				<?php echo slz_render_view( $instance->locate_path( '/views/social-item.php' ), compact( 'data', 'instance' ) ); ?>
            </div>
            <div class="clearfix"></div>
        </div>
		<?php if ( ! empty( $data['detail'] ) ) {
			printf( '<div class="content-text">%s</div>', wp_kses_post( nl2br( $data['detail'] ) ) );
		} ?>
    </div>
</div>

