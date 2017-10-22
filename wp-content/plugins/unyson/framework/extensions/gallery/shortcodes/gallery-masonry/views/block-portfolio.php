<?php
if( $image = $model->get_featured_image( $model->html_format, 'large', false, false)):
	$full_image = $model->get_feature_img_url_full();
	$nav_class = $model->get_navfilter_class();
	$option['fancybox_group'] = 'group_' . $params['uniq_id'] . '_' . $model->post_id;
?>
<div class="grid-item <?php echo esc_attr($nav_class)?>">
	<div class="slz-block-gallery-01 style-1">
		<div class="block-image">
			<a href="<?php echo esc_url($full_image)?>" class="link fancybox-thumb" data-fancybox-group="<?php echo esc_attr($option['fancybox_group'])?>">
				<img src="<?php echo esc_url($full_image)?>" class="img-responsive" alt="">
			</a>
		</div>
		<div class="block-content direction-hover">
			<div class="block-content-wrapper">
				<?php 
				echo ( $model->get_category() );
				if( isset($model->attributes['show_title']) && $model->attributes['show_title'] == 'yes' ){
					echo ( $model->get_title( $model->html_format ) );
				}
				echo ( $model->get_zoom_in_btn() );
				echo ( $model->get_read_more_btn() );
				?>
			</div>
		</div>
	</div>
	<div class="gallery-group hide">
		<?php echo ( $model->get_meta_gallery_image($option) );?>
	</div>
</div>
<?php endif;?>