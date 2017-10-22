<?php
$instance = $module->attributes;
?>
<div class="slz-block-item-01 style-1">
	<?php if( !empty($instance['show_thumbnail']) || !isset( $instance['show_thumbnail'] ) ): ?>
	<div class="block-image">
		<a href="<?php echo esc_url( $module->permalink ); ?>" class="link">
			<?php echo ( $module->get_featured_image() ); ?>
		</a>
		<?php
			$post_format = get_post_format( $module->post_id );
			if( $post_format == 'video' ) {
				echo '
					<div class="block-btn-video">
						<span class="btn-play"><i class="fa fa-play"></i></span>
					</div>
				';
			}
		?>
	</div>
	<?php endif; ?>
	<div class="block-content">
		<div class="block-content-wrapper">
			<?php echo ( $module->get_title() ); ?>
			<ul class="block-info">
				<?php
				if( !empty($instance['show_author']) || !isset( $instance['show_author'] ) )
					echo '<li>' . $module->get_author() . '</li>';
				if( !empty($instance['show_date']) || !isset( $instance['show_date'] ) )
					echo '<li>' . $module->get_date(null, false) . '</li>';
				if ( !empty($instance['show_view']) && $view_text = $module->get_views('<a href="%1$s" class="link view">%2$s %3$s</a>') )
					echo '<li>' . $view_text . '</li>';
				if ( !empty($instance['show_comment']) && $comment_text = $module->get_comments('<a href="%1$s" class="link comment">%2$s %3$s</a>'))
					echo '<li>' . $comment_text . '</li>';
				?>
			</ul>
		</div>
	</div>
</div>