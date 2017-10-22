<?php
$icon_class = $custom_css = $has_background = '';
$data['align'] = empty($data['align']) ? '' : $data['align'];

$row_count = 0;
$thumb_size = 'small';
if ( !empty($data['column']) && ( $data['column'] == 1 || $data['column'] == 2 ) ) {
	$thumb_size = 'large';
}
$icon_class .= ' ' . $data['full_image'];

$html_options = array(
	'title_format'          => '<a class="title '.esc_attr($data['title_line']).'" href="%2$s">%1$s</a>',
);
$html_options = $model->set_default_options( $html_options );

// background color
if( !empty($data['block_bg_cl'])) {
	$has_background = "has-bg";
	$css = '
			.%1$s .item .slz-icon-block{
				background-color: %2$s !important;
			}
		';
	$custom_css .= sprintf( $css, esc_attr( $data['uniq_id'] ), esc_attr( $data['block_bg_cl']) );
}
if( !empty($data['block_bg_hv_cl'])) {
	$has_background = "has-bg-hover";
	$css = '
			.%1$s .item .slz-icon-block.has-bg-hover .bg-icon-block{
				background-color: %2$s !important;
			}
		';
	$custom_css .= sprintf( $css, esc_attr( $data['uniq_id'] ), esc_attr( $data['block_bg_hv_cl']) );
}

// output
echo ($data['openRow']);
	while ( $model->query->have_posts() ) {
		$model->query->the_post();
		$model->loop_index();
		$row_count++;
		$arr_content = array();
		//get data
		$icon = $model->get_service_icon( $row_count );
		$title = $model->get_title( $html_options );
		$desc = $model->get_description();
		$btn = $model->get_btn_more_custom( $html_options );
		$arr_content[] = $title;
		$arr_content[] = $desc;
		$arr_content[] = $btn;
		// check background image
		$f_image = '';
		if( $data['bg_image'] ) {
			if( $f_image = $model->get_image_url_by_id( null, $thumb_size, false ) ) {
				$has_background = 'has-bg-hover bg-img-hover';
				$css = '
					.%1$s .post-%2$s .slz-icon-block.has-bg-hover .bg-icon-block {
						background-image: url("%3$s") !important;
					}
				';
				$custom_css .= sprintf( $css, esc_attr( $data['uniq_id'] ), esc_attr($model->post_id), $f_image );
			}
		}
		?>
		<div class="item wow <?php echo esc_attr( $model->get_post_class() )?> <?php echo esc_attr($data['item_animation'])?>" data-wow-delay="<?php echo esc_attr($data['delay_animation'])?>">
			<div class="slz-icon-block <?php echo esc_attr($has_background) ?> <?php echo esc_attr($data['align'])?>">
				<!-- icon -->
				<?php if( $icon ) :?>
					<?php echo '<div class="icon-cell ' . esc_attr($icon_class) . '">' . $icon . '</div>'?>
				<?php endif;?>
				<!-- content -->
				<div class="content-cell">
					<div class="wrapper-info">
						<?php echo implode("\n", $arr_content );?>
					</div>
				</div>
				<!-- background hover -->
				<div class="bg-icon-block direction-hover"></div>
			</div>
		</div>
	<?php
	} // end while
	$model->reset();
	// pagination
	$model->pagination();
echo ($data['closeRow']);
//-------custom general css------------//

	// icon background color
	if( !empty( $data['icon_bg_cl_4'] ) ){
		$css = '
				.%1$s .icon-background .wrapper-icon {
					background-color: %2$s !important;
				}
			';
		$custom_css .= sprintf( $css, esc_attr( $data['uniq_id'] ), esc_attr( $data['icon_bg_cl_4']) );
	}

	// icon background hover color
	if( !empty( $data['icon_bg_hv_cl_4'] ) ){
		$css = '
				.%1$s .icon-background .wrapper-icon:hover{
					background-color: %2$s !important;
				}
			';
		$custom_css .= sprintf( $css, esc_attr( $data['uniq_id'] ), esc_attr( $data['icon_bg_hv_cl_4']) );
	}

	// icon background color
	if( !empty( $data['icon_bd_cl_4'] ) ){
		$css = '
				.%1$s .icon-background .wrapper-icon {
					border-color: %2$s !important;
				}
			';
		$custom_css .= sprintf( $css, esc_attr( $data['uniq_id'] ), esc_attr( $data['icon_bd_cl_4']) );
	}

	// icon background hover color
	if( !empty( $data['icon_bd_hv_cl_4'] ) ){
		$css = '
				.%1$s .icon-background .wrapper-icon:hover{
					border-color: %2$s !important;
				}
			';
		$custom_css .= sprintf( $css, esc_attr( $data['uniq_id'] ), esc_attr( $data['icon_bd_hv_cl_4']) );
	}

	if ( !empty( $custom_css ) ) {
		do_action('slz_add_inline_style', $custom_css);
	}