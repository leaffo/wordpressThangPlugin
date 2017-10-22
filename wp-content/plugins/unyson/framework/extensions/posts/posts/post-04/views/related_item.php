<div class="item">

	<?php
	$post_format = get_post_format( $module->post_id );
	$post_format = !empty( $post_format ) ? $post_format : 'standard';
	?>
	<div class="slz-block-item-01 style-1 slz-format-<?php echo esc_attr( $post_format ) ?>">

		<?php if ( isset($module->attributes['related_display']['image']) && $module->has_post_thumbnail() ) : ?>

			<div class="block-image">

				<a href="<?php echo esc_url( $module->get_url() ); ?>" class="link">

					<?php echo ( $module->get_featured_image() ); ?>

					<?php echo '<i class="icons-'.esc_attr($post_format).'"></i>' ?>

				</a>

			</div>

		<?php endif; ?>

		<div class="block-content">

			<?php echo ( $module->get_title(true, array( 'title_class' => 'block-title' )) ); ?>

			<?php if( isset($module->attributes['related_display']['info']) ):?>
			<ul class="block-info">

				<?php echo ( $module->get_meta_data() );?>

			</ul>
			<?php endif;?>
			
			<?php if( isset($module->attributes['related_display']['desc']) ):?>
				<div class="block-text entry-content">
					<?php echo ( $module->get_excerpt() );?>
				</div>
			<?php endif;?>
			
			<?php if( isset($module->attributes['related_display']['btn-more']) ):?>
				<a href="<?php echo esc_url( $module->get_url() ); ?>" class="block-read-more">
					<?php echo esc_html__('Read More', 'slz'); ?>
					<i class="fa fa-angle-double-right"></i>
				</a>
			<?php endif;?>
		</div>

	</div>
	
</div>
