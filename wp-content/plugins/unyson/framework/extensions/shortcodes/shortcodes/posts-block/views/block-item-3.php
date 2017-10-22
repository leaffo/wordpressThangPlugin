<div class="item">
	<?php
	if ( isset( $post_count ) ) {
		printf( '<div class="post-number">%s.</div>', esc_html( $post_count ) );
	}
	?>
    <div class="post-info">
		<?php echo( $module->get_title( true, array(), '<a href="%2$s" class="title block-title">%1$s</a>' ) ); ?>
    </div>
</div>