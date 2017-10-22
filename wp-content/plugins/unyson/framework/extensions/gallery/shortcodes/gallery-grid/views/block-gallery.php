<?php
if( $image = $model->get_featured_image( $model->html_format, $data['thumb_size'], false, false) ):
	$full_image = $model->get_feature_img_url_full();
	$option['fancybox_group'] = 'group_' . $params['uniq_id'] . '_' . $model->post_id;
	$html_options['title_format'] = '<div class="block-title">%1$s</div>';
?>

<div class="grid-item <?php echo esc_attr($params['gallery_class']);?> <?php echo esc_attr($model->get_post_class());?> <?php echo esc_attr($model->get_navfilter_class())?>">
	<div class="slz-block-gallery-01 style-1">
		<div class="block-image">
			<a href="<?php echo esc_url($full_image)?>" class="link fancybox-thumb" data-fancybox-group="<?php echo esc_attr($option['fancybox_group'])?>">
				<?php echo wp_kses_post($image);?>
				<span class="direction-hover"></span>
			</a>
		</div>
		<div class="block-content direction-hover">
			<div class="block-content-wrapper">
				<?php if( isset($model->attributes['show_title']) && $model->attributes['show_title'] == 'yes' ) :
						echo ( $model->get_title($html_options) );
					endif;?>
				<?php echo ( $model->get_zoom_in_btn( $option ) );?>
			</div>
		</div>
	</div>
	<div class="gallery-group hide">
		<?php echo ( $model->get_meta_gallery_image($option) );?>
	</div>
</div>

<?php endif;?>