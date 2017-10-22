<?php
if( $block->query->posts ) {
	foreach ($block->query->posts as $post) {
		$module = new SLZ_Block_Module($post, $block->attributes);
		$format = get_post_format( $module->post_id );
		if( !empty( $format ) ) {
			$post_format = 'slz-format-'.$format;
		}else{
			$post_format = '';
		}
		// exclude block info
		$exclude_info = array('category');
?>
		<div class="item <?php echo esc_attr( $module->get_post_class() ) ?>">
			<div class="slz-block-item-01 style-1 <?php echo esc_attr( $post_format ); ?>">
			
				<div class="block-image">
					<?php echo ( $module->get_ribbon_date() ); ?>
					<?php $module->get_post_format_post_view(); ?>
				</div>
				
				
				<div class="block-content">
					<div class="block-content-wrapper">
						<?php echo ( $module->get_category() ); ?>
						<?php echo ( $module->get_title() ); ?>
						<ul class="block-info">
							<?php echo ( $module->get_meta_data() ); ?>
						</ul>
						<?php
						if( $module->attributes['show_excerpt'] == 'show' ) {
						
							if( $excerpt_str = $module->get_excerpt(true) ){?>
								<div class="block-text"><?php echo wp_kses_post( nl2br( $excerpt_str ) ); ?></div>
							<?php }?>
							
						<?php
						}
						?>
					</div>
				</div>
				<?php if( !empty( $module->attributes['btn_read_more'] ) ){
					echo '<a href="'.esc_url( $module->permalink ).'" class="block-read-more">';
						echo esc_attr($module->attributes['btn_read_more']);
						echo '<i class="fa fa-angle-double-right"></i>';
					echo '</a>';
				}
				?>
			</div>
		</div>
<?php } // end foreach
} //end if
?>