<?php
$html_render1 = $html_render2 = array();
$html_format1 = $html_format2 = '';
$attrs = $model->attributes;

$btn_content = '';
if(!empty($data['btn_content'])){
	$btn_content = '<a class="slz-btn-readmore" href="%11$s">
						<span class="text">'.esc_attr($data['btn_content']).'</span>
						<i class="slz-icon fa"></i>
					</a>';
}

$html_format1 = '
		<div class="item">
			<div class="team-image">%1$s</div>
		</div>
	';

$html_format2 = '
	<div class="item">
		<div class="slz-team-block">
			<div class="team-content">
				<div class="content-wrapper">
					%2$s
					%3$s
					%4$s
					%5$s
					%10$s
					%6$s
					'. $btn_content .'
				</div>
			</div>
		</div>
	</div>
';

$html_render1['html_format'] = $html_format1;
$html_render2['html_format']= $html_format2;

$html_render2['social_format'] = '<a href="%2$s" class="social-item %1$s">
									<i class="slz-icons fa fa-%1$s"></i>
									<span class="text">%3$s</span>
								</a>';
?>

<div class="slz-shortcode sc_team_carousel <?php echo esc_attr( $data['block_class'] ); ?>" data-item="<?php echo esc_attr($data['uniq_id']); ?>">
	<div class="slz-carousel-wrapper">
		<div class="slz-carousel-img-wrapper">
			<?php $data['model']->render_team_carousel_sc( $html_render1 ); ?>
		</div>
		<div class="slz-carousel-info-wrapper">
			<?php $data['model']->render_team_carousel_sc( $html_render2 ); ?>
		</div>
	</div>
</div>
<?php
/* CUSTOM CSS */
$css = '';
$custom_css = '';
$id = $attrs['uniq_id'];
if( !empty( $attrs['color_title'] ) ) {
	$css = '
		.%1$s .team-info .name {
			color: %2$s;
		}
	';
	$custom_css .= sprintf( $css, esc_attr( $id ), esc_attr( $attrs['color_title'] ) );
}

if( !empty( $attrs['color_title_hv'] ) ) {
	$css = '
		.%1$s .team-info .name:hover {
			color: %2$s;
		}
	';
	$custom_css .= sprintf( $css, esc_attr( $id ), esc_attr( $attrs['color_title_hv'] ) );
}

if( !empty( $attrs['color_info'] ) ) {
	$css = '
		.%1$s .team-info .info-title {
			color: %2$s;
		}
	';
	$custom_css .= sprintf( $css, esc_attr( $id ), esc_attr( $attrs['color_info'] ) );
}

if( !empty( $attrs['color_hv_info'] ) ) {
	$css = '
		.%1$s .team-info .info-title:hover {
			color: %2$s;
		}
	';
	$custom_css .= sprintf( $css, esc_attr( $id ), esc_attr( $attrs['color_hv_info'] ) );
}

if( !empty( $attrs['color_description'] ) ) {
	$css = '
		.%1$s .team-info .info-description {
			color: %2$s;
		}
	';
	$custom_css .= sprintf( $css, esc_attr( $id ), esc_attr( $attrs['color_description'] ) );
}

if( !empty( $attrs['color_social'] ) ) {
	$css = '
		.%1$s .team-info .info-social a i {
			color: %2$s;
		}
	';
	$custom_css .= sprintf( $css, esc_attr( $id ), esc_attr( $attrs['color_social'] ) );
}

if( !empty( $attrs['color_social_hv'] ) ) {
	$css = '
		.%1$s .team-info .info-social a:hover i {
			color: %2$s;
		}
	';
	$custom_css .= sprintf( $css, esc_attr( $id ), esc_attr( $attrs['color_social_hv'] ) );
}

if ( !empty( $custom_css ) ) {
	do_action('slz_add_inline_style', $custom_css);
}
