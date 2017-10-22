<div class="grid-item <?php echo esc_attr( $isotope_class ); ?>">
	<div class="slz-block-item-01 style-1">
		<?php $module->get_post_format_post_view(); ?>
		<div class="block-content">
			<div class="block-content-wrapper">
				<?php echo ( $module->get_title() ); ?>
				<ul class="block-info">
					<?php echo ( $module->get_meta_data() ); ?>
				</ul>
				<?php if ( $module->attributes['excerpt'] == 'show' ) : ?>
					<div class="block-text"><?php echo wp_kses_post( nl2br( $module->get_excerpt(true) ) ); ?></div>
				<?php endif; ?>
			</div>
		</div>
	</div>
</div>