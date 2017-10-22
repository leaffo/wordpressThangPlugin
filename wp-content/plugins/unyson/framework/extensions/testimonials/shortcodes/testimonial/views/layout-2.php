<?php 
$output = $html_format = $show_quote = $custom_css = '';
$html_options = array();

$data['align'] = !empty($data['align']) ? $data['align'] : 'text-c';
$style = !empty($data['layout-2-style']) ? $data['layout-2-style'] : 'st-chennai';

if( $data['show_icon_quote'] == 'yes' ) 
	$show_quote = 'show-quote';

$html_format = '
		<div class="item post-%6$s">
			<div class="slz-testimonial '.esc_attr($data['align']).' '.esc_attr($style).' '.esc_attr($show_quote).' ">
				%1$s
				<div class="wrapper-info">
					%2$s
					%3$s
					<div class="clearfix"></div>
					%5$s
				</div>
				%4$s
			</div>
		</div>
	';
switch ( $style ) {
	case 'st-pune':
		$html_options['description_format'] = 
					'<div class="description">
						<div class="description-arrow"></div><div class="icon-quote"></div><div class="content">%1$s</div>
					</div>';
		break;
	case 'st-chennai':
		$html_format = '
					<div class="item post-%6$s">
						<div class="slz-testimonial '.esc_attr($data['align']).' '.esc_attr($style).' '.esc_attr($show_quote).' ">
							%1$s
							%4$s
							<div class="wrapper-info">
								%2$s
								%3$s
								<div class="clearfix"></div>
								%5$s
							</div>
						</div>
					</div>
				';
		break;
	default:
		break;
}

$model->html_format = $model->set_default_options( $html_options );

if( $model->query->have_posts() ) {
	while ( $model->query->have_posts() ) {
		$model->query->the_post();
		$model->loop_index();
		$output .= sprintf($html_format,
				$model->get_image(),
				$model->get_title(),
				$model->get_meta_position(),
				$model->get_content_format(),
				$model->get_ratings(),
				esc_attr($model->post_id)
		);
		$custom_css .= $instance->get_css_bg_image($data, $style, $model->post_id);
	}
	$model->reset();
}
?>


<div class="slz-shortcode sc_testimonial testimonial-slide <?php echo esc_attr( $data['block_class'] ); ?>" data-id="<?php echo esc_attr( $data['uniq_id'] ); ?>">
	<div class="slz-carousel-wrapper"
		<?php echo '
				data-dots="'.esc_attr( $data['show_dots'] ).'"
				data-speed="'.esc_attr( $data['slide_speed'] ).'"
				data-arrowshow="'.esc_attr( $data['show_arrows'] ).'"
				data-autoplay="'.esc_attr( $data['slide_autoplay'] ).'"
				data-infinite="'.esc_attr( $data['slide_infinite'] ).'"
				data-slidestoshow="'.esc_attr( $data['slidesToShow'] ).'"
			';?>
		>
		
		<?php echo wp_kses_post($output) ;?>
	</div>
</div>
<?php slz_render_view( $instance->locate_path('/views/option.php'), array('data' => $data, 'style' => $style, 'custom_css' => $custom_css));?>
