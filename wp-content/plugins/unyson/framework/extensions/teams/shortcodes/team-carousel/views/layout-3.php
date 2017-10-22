<?php if ( ! defined( 'ABSPATH' ) ) { die( 'Forbidden' ); }

$html_format_1 = '';
$html_render = array();

$output = array(
	'main' => '',
	'nav'   => '',
);
$attrs = $model->attributes;

$btn_content = '';
if(!empty($data['btn_content'])){
	$btn_content = '<a class="slz-btn-readmore" href="%8$s">
						<span class="text">'.esc_attr($data['btn_content']).'</span>
						<i class="slz-icon fa"></i>
					</a>';
}

$html_format_1 = '
		<div class="item %7$s">
			<div class="slz-team-block st-florida image-square">
				%1$s
				<div class="team-content">
					<div class="content-wrapper">
						%2$s
						%3$s
						%4$s
						%5$s
						'. $btn_content .'
						%6$s
					</div>
				</div>
			</div>
		</div>
	';

$html_options['image_format'] = '<div class="team-image">%1$s</div>';
$html_options['social_format'] = '<a href="%2$s" class="social-item %1$s">
									<i class="slz-icons fa fa-%1$s"></i>
									<span class="text">%3$s</span>
								</a>';
$model->html_format = $model->set_default_options($html_options);

if( $model->query->have_posts() ) {
	while ( $model->query->have_posts() ) {
		$model->query->the_post();
		$model->loop_index();
		//get data
		$output['main'] .= sprintf($html_format_1,
			$model->get_featured_image(),
			$model->get_title(),
			$model->get_meta_position(),
			$model->get_meta_info(),
			$model->get_meta_short_description(),
			$model->get_meta_social_list(),
			esc_attr($model->get_post_class()),
			esc_url($model->permalink)
		);
	}
	$output['nav'] .= $output['main'];
	$model->reset();
}
?>

<div class="slz-shortcode sc_team_carousel <?php echo esc_attr( $data['block_class'] ); ?>" data-item="<?php echo esc_attr($data['uniq_id']); ?>">
	<div class="slz-carousel-wrapper"
		<?php echo '
				data-slidestoshow="'.esc_attr( $data['column_2'] ).'"
				data-arrowshow="'.esc_attr( $data['slide_arrows'] ).'"
				data-dotshow="'. esc_attr( $data['slide_dots'] ) .'"
				data-autoplay="'. esc_attr( $data['slide_autoplay'] ) .'"
				data-infinite="'. esc_attr( $data['slide_infinite'] ) .'"
			';?>
		>
		<?php
			echo '<div class="slider-for">'.
					$output['main'] .'
				</div>
				<div class="slider-nav">'.
					$output['nav'].'
				</div>';
		?>
		
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
		.%1$s .social-list a i {
			color: %2$s;
		}
	';
	$custom_css .= sprintf( $css, esc_attr( $id ), esc_attr( $attrs['color_social'] ) );
}

if( !empty( $attrs['color_social_hv'] ) ) {
	$css = '
		.%1$s .social-list a:hover i {
			color: %2$s;
		}
	';
	$custom_css .= sprintf( $css, esc_attr( $id ), esc_attr( $attrs['color_social_hv'] ) );
}

if( !empty( $attrs['color_position'] ) ) {
	$css = '
		.%1$s .main-content .team-position {
			color: %2$s;
		}
	';
	$custom_css .= sprintf( $css, esc_attr( $id ), esc_attr( $attrs['color_position'] ) );
}
if( !empty( $attrs['color_description'] ) ) {
	$css = '
		.%1$s .main-content .team-text {
			color: %2$s;
		}
	';
	$custom_css .= sprintf( $css, esc_attr( $id ), esc_attr( $attrs['color_description'] ) );
}
if( !empty( $attrs['color_slide_dots'] ) ) {
	$css = '
		.%1$s .slick-dots li.slick-active button:before {
			color: %2$s;
		}
	';
	$custom_css .= sprintf( $css, esc_attr( $id ), esc_attr( $attrs['color_slide_dots'] ) );
}
if( !empty( $attrs['color_slide_dots'] ) ) {
	$css = '
		.%1$s .slick-dots li.slick-active button:before {
			color: %2$s;
		}
	';
	$custom_css .= sprintf( $css, esc_attr( $id ), esc_attr( $attrs['color_slide_dots'] ) );
}
if( !empty( $attrs['color_slide_arrow'] ) ) {
	$css = '
		.%1$s .slick-arrow {
			color: %2$s;
		}
	';
	$custom_css .= sprintf( $css, esc_attr( $id ), esc_attr( $attrs['color_slide_arrow'] ) );
}
if( !empty( $attrs['color_slide_arrow_hv'] ) ) {
	$css = '
		.%1$s .slick-arrow:hover {
			color: %2$s;
		}
	';
	$custom_css .= sprintf( $css, esc_attr( $id ), esc_attr( $attrs['color_slide_arrow_hv'] ) );
}

if( !empty( $attrs['color_slide_arrow_bg'] ) ) {
	$css = '
		.%1$s .slick-arrow {
			background-color: %2$s;
		}
	';
	$custom_css .= sprintf( $css, esc_attr( $id ), esc_attr( $attrs['color_slide_arrow_bg'] ) );
}
if( !empty( $attrs['color_slide_arrow_bg_hv'] ) ) {
	$css = '
		.%1$s .slick-arrow:hover {
			background-color: %2$s;
		}
	';
	$custom_css .= sprintf( $css, esc_attr( $id ), esc_attr( $attrs['color_slide_arrow_bg_hv'] ) );
}
if( !empty( $attrs['color_info'] ) ) {
	$css = '
		.%1$s .slz-info-block a {
			color: %2$s;
		}
	';
	$custom_css .= sprintf( $css, esc_attr( $id ), esc_attr( $attrs['color_info'] ) );
}
if( !empty( $attrs['color_hv_info'] ) ) {
	$css = '
		.%1$s .slz-info-block a:hover {
			color: %2$s;
		}
	';
	$custom_css .= sprintf( $css, esc_attr( $id ), esc_attr( $attrs['color_hv_info'] ) );
}
if ( !empty( $custom_css ) ) {
	do_action('slz_add_inline_style', $custom_css);
}
