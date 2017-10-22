<?php if ( ! defined( 'SLZ' ) ) { die( 'Forbidden' ); }

// Check Visual Composer is active or not
if ( ! is_plugin_active( 'js_composer/js_composer.php' ) ) { return; }

// Get list videos from vc param group
$data['list_video'] = (array) vc_param_group_parse_atts( $data['list_video'] );

// Get list video type
$temp_arr = $instance->get_config( 'params_group_list' );

// Set default value
$url_video = $image_video = $tab_list = $tab_content = '';

// Make unique_id
$unique_id = SLZ_Com::make_id();

// CSS class
$block_class = 'video-list-'.$unique_id;
$block_cls = $block_class.' '.$data['extra_class'];

// Get Style
$style = !empty( $data['style'] ) ? $data['style'] : 'st-florida';

?>

<div class="slz-shortcode sc_video_list <?php echo esc_attr( $block_cls ) ?> <?php echo esc_attr($style);?>">
	<?php
	$count = 0;
	// Check has video or empty
	if( !empty( $data['list_video'] ) ) {
		// Switch style to show
		$params_render = array();
		foreach ( $data['list_video'] as $video ) {
			$url_video = $image_video = '';
			$video = array_merge( $temp_arr, $video );
			if( ( $video['video_type'] == 'youtube' && empty( $video['youtube_id'] ) ) || ( $video['video_type'] == 'vimeo' && empty( $video['vimeo_id'] ) ) ) {
				continue;
			}
			if( $video['video_type'] == 'youtube' && !empty( $video['youtube_id'] ) ) {
				$url_video = 'https://www.youtube.com/embed/'.esc_attr( $video['youtube_id'] ).'?rel=0';
				$image_video = $instance->get_video_thumb_general( 'youtube', $video['youtube_id'] );
			}elseif ( $video['video_type'] == 'vimeo' && !empty( $video['vimeo_id'] ) ) {
				$url_video = 'https://player.vimeo.com/video/'.esc_attr( $video['vimeo_id'] ).'?rel=0';
				$image_video = $instance->get_video_thumb_general( 'vimeo', $video['vimeo_id'] );
			}
			$classFadeActive = $tab_class_active = '';
			$tab_expanded = 'false';
			if ( $count == 0 ) {
				$classFadeActive = 'in active';
				$tab_expanded = 'true';
				$tab_class_active = 'active';
			}
			$tab_id = 'tab-' . $unique_id . '-' .$count;
			if( !empty($image_video)){
				if( !empty($video['bg_image_video']) ) {
					$bg_image_url = wp_get_attachment_url( $video['bg_image_video'] );
					if( $bg_image_url ) {
						$image_video = $bg_image_url;
					} 
				}
				$img_tab = '<img src="'. esc_url( $image_video ) .'" alt="" class="img-full">';
				$tab_list .= '<li class="tab-title-content tab_item '. esc_attr($tab_class_active).'" role="presentation" >
								<a class="link" href="#' . esc_attr($tab_id) . '" role="tab" data-toggle="tab" aria-expanded="' . $tab_expanded .'" data-slug="">
									'. $img_tab .'
								</a>
							</li>';
				$params = array(
					'tab_id'      => $tab_id,
					'image_video' => $image_video,
					'unique_id'   => $unique_id,
					'url_video'   => $url_video,
					'tab_class'   => 'tab-pane fade ' . $classFadeActive,
					'title'       => empty($video['video_title']) ? '' : $video['video_title'],
				);
				$tab_content .= slz_render_view( $instance->locate_path('/views/block-item.php'), array('params' => $params, 'instance' => $instance) );
				$count ++;
			}
			
		}
		if( $tab_list ) {
			echo '<div class="tab-content ">'. $tab_content .'</div>';
			echo '<div class="tab-list-wrapper">
					<ul class="tab-list tab-filter" role="tablist">' . $tab_list . '</ul>
				</div>';
		}
	}?>
</div>
<?php
	// Set custom CSS
	$custom_css = sprintf( '.%1$s.sc_video_list { z-index: inherit; }', $block_class );
	if( !empty( $custom_css ) ) {
		do_action( 'slz_add_inline_style', $custom_css );
	}
?>
