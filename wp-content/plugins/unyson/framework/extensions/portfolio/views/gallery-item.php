<?php
// get gallery
$post_id = get_the_ID();
if( empty($post_id)) return;

$gallery_list = $top = $bot = array();
$single = '';

$uniq_id = SLZ_Com::make_id();
$thumb_id = get_post_thumbnail_id( $post_id );
if( $thumb_id ) {
	$gallery_list[] = array('attachment_id' => $thumb_id);
}
$data = slz_get_db_post_option( $post_id, 'gallery_images', '' );
if( $data ){
	$gallery_list = array_merge($gallery_list, $data );
}
$int_count = 0;
foreach($gallery_list as $items ) {
	if( !empty($items['attachment_id']) && $img_id = $items['attachment_id'] ) {
		$image = wp_get_attachment_image_src( $img_id, 'endlesslove-thumb-1200x680');
		if( !empty($image[0]) ) {
			$img_url = $image[0];
			// gallery
			$top[] = '<div class="item">
						<div class="image-gallery-wrapper">
							<a href="'.esc_url($img_url).'" class="images thumb fancybox-thumb">
								<img src="'.esc_url($img_url).'" alt="" class="img-responsive">
							</a>
						</div>
					</div>';
			$bot[] = '<div class="item">
						<div class="thumbnail-image"><img src="'.esc_url($img_url).'" alt="" class="img-responsive"></div>
					</div>';
			if( $int_count == 0 ) {
				$single[] = '<img src="'.esc_url($img_url).'" alt="" class="img-responsive">';
			}
			$int_count ++;
		}
	}
}
if( $int_count > 1) :
	$slideToShow = ($int_count > 6 ? 5 : $int_count - 1 );?>
	<div class="sc_gallery_carousel slz-carousel-syncing slz-image-carousel no-text-arrows" data-item="<?php echo esc_attr($uniq_id); ?>">
		<div class="slider-for" data-arrowshow="1" data-autoplay="1" >
			<?php echo implode("\n", $top); ?>
		</div>
		<div class="slider-nav" data-slidestoshow="<?php echo esc_attr($slideToShow)?>" data-dotshow="0" data-infinite="1">
			<?php echo implode("\n", $bot); ?>
		</div>
	</div><?php
elseif($single):?>
	<div class="slz-featured-block">
		<?php echo implode("\n", $single); ?>
	</div><?php
endif;