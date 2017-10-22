<?php
	if( $data['show_icon'] == '0' && !empty($data['image']) )
		echo wp_get_attachment_image($data['image'], 'full');
	else if( $data['show_icon'] == '1' ){
		$shortcode = slz_ext( 'shortcodes' )->get_shortcode( 'main_title' );
		echo ( $shortcode->get_icon_library_views( $data ) );
	}
	else
		echo '';

	if( !empty( $data['subtitle'] ) ):
		?>
			<div class="subtitle-wrapper">
				<span class="subtitle"><?php echo esc_html( $data['subtitle'] ); ?></span>
			</div>
		<?php
	endif;
	
	if( !empty( $data['title'] ) || !empty( $data['extra_title'] ) ) :
	?>
		<div class="title-wrapper">

			<span class="title"><?php echo esc_html( $data['title'] );?></span>
			
			<?php if( !empty( $data['extra_title'] ) ) :
			?>
				<strong class="extra-title "><?php echo esc_html( $data['extra_title'] ); ?></strong>
			<?php

			endif;?>

		</div>
	<?php
	endif;

	