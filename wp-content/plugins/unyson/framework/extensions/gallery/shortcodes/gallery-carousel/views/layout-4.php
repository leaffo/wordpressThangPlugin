 <?php
$style_class = $slick_json_nav =  $slick_json_for = '';
$html_format1 = '
	 <div class="item $4$s">
			<div class="image-gallery-wrapper">
				<a href="%1$s"  class="images thumb fancybox-thumb"><img src="%3$s" alt="" class="img-responsive"></a>
			</div>
		</div>';
$html_format2 = '
	<div class="item %2$s">
			<div class="thumbnail-image"><img src="%1$s" alt="" class="img-responsive"></div>
		</div>';
$html_render1['html_format'] = $html_format1;
$html_render2['html_format'] = $html_format2;

$model = $data['model'];
$slider_for = $slider_nav = array();

$thumb_size = 'large';
$image_count = 0;
if( $model->query->have_posts() ) {
	while ( $model->query->have_posts() ) {
		$model->query->the_post();
		$model->loop_index();
		$gallery_arr = $model->post_meta['gallery_images'];
		foreach ($gallery_arr as $key => $value) {
			if( !empty($value['attachment_id'])) {
				$image_title = get_the_title($value['attachment_id']);
				$img_url = $model->get_image_url_by_id($value['attachment_id'], $thumb_size, false);
				$post_class = $model->get_post_class( 'attachment-' . $value['attachment_id'] );
				if( $img_url) {
					$slider_for[] = sprintf( $html_format1,
							esc_url($value['url']),
							esc_attr($image_title),
							esc_url($img_url),
							esc_attr($post_class)
					);
					$slider_nav[] = sprintf( $html_format2,
							esc_url($value['url']),
							esc_attr($post_class)
					);
					if( $image_count == $model->attributes['limit_image'] - 1 ){
						break;
					}
					$image_count++;
				}
			}

		}
		if( $image_count == $model->attributes['limit_image'] - 1 ){
			break;
		}
	}
	$model->reset();
}
?>

<div class="sc_gallery_carousel slz-carousel-syncing slz-image-carousel <?php echo esc_attr( $data['block_cls'] ); ?>" data-item="<?php echo esc_attr($data['uniq_id']); ?>">
	<div class="slider-nav" 
			data-slidestoshow="<?php echo esc_attr( $data['slidetoshow'] )?>"
			data-infinite="<?php echo esc_attr( $data['slide_infinite'] ) ?>">
		<?php echo implode("\n", $slider_nav); ?>
	</div>
	<div class="slider-for" 
			data-arrowshow="<?php echo esc_attr( $data['slide_arrows'] )?>"
			data-autoplay="<?php echo esc_attr( $data['slide_autoplay'] ) ?>"
			data-dotshow="<?php echo esc_attr( $data['slide_dots'] )?>">
		<?php echo implode("\n", $slider_for); ?>
	</div>
</div>

<!-- custom css -->
<?php
$custom_css = '';
if ( !empty( $data['model']->attributes['color_slide_arrow'] ) ) {
	$css = '
		.%1$s.sc_gallery_carousel .slick-arrow:before{
			color: %2$s;
		}
	';
	$custom_css .= sprintf( $css, esc_attr( $data['uniq_id'] ), esc_attr( $data['model']->attributes['color_slide_arrow'] ) );
}
if ( !empty( $data['model']->attributes['color_slide_arrow_bg'] ) ) {
	$css = '
		.%1$s.sc_gallery_carousel .slick-arrow{
			background-color: %2$s;
		}
	';
	$custom_css .= sprintf( $css, esc_attr( $data['uniq_id'] ), esc_attr( $data['model']->attributes['color_slide_arrow_bg'] ) );
}
if ( !empty( $data['model']->attributes['color_slide_arrow_hv'] ) ) {
	$css = '
		.%1$s.sc_gallery_carousel .slick-arrow:hover:before{
			color: %2$s;
		}
	';
	$custom_css .= sprintf( $css, esc_attr( $data['uniq_id'] ), esc_attr( $data['model']->attributes['color_slide_arrow_hv'] ) );
}
if ( !empty( $data['model']->attributes['color_slide_arrow_bg_hv'] ) ) {
	$css = '
		.%1$s.sc_gallery_carousel .slick-arrow:hover{
			background-color: %2$s;
		}
	';
	$custom_css .= sprintf( $css, esc_attr( $data['uniq_id'] ), esc_attr( $data['model']->attributes['color_slide_arrow_bg_hv'] ) );
}
if ( !empty( $custom_css ) ) {
	do_action('slz_add_inline_style', $custom_css);
}