<?php if( get_post_thumbnail_id( $module->post_id ) ):?>
	<?php
		$image = $module->get_featured_image();
		$class = '';
		if( $image ) {
			$class = 'has-image';
		}
	?>
	<div class="block-image has-quote <?php echo esc_attr($class);?>">
		<?php echo ( $module->get_ribbon_date() ); ?>
			<a href="<?php echo esc_url( $module->permalink ); ?>" class="link">
				<?php echo wp_kses_post( $image ); ?>
			</a>
			<?php $data = slz_get_db_post_option( $module->post_id, 'feature-quote-info', '' ); ?>
			<?php if( !empty( $data ) ) : ?>
				<div class="block-quote-wrapper">
					<div class="block-quote"><?php echo wp_kses_post( $data ); ?></div>
				</div>
			<?php endif; ?>
	</div>
<?php endif;?>