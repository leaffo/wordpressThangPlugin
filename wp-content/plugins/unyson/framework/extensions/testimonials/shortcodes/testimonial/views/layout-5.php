<?php 
$html_format_1 = $html_format_2 = $show_quote = '';
$html_options = array();
$output = array(
	'left' => '',
	'right'   => '',
);

$data['align'] = !empty($data['align']) ? $data['align'] : 'text-c';

if( $data['show_icon_quote'] == 'yes' ) 
	$show_quote = 'show-quote';

$html_format_1 = '
	<div class="item post-%2$s">
		<div class="slz-testimonial">
			%1$s
		</div>
	</div>
';

$html_format_2 = '
	<div class="item post-%5$s">
		<div class="slz-testimonial '.esc_attr($data['align']).' '.esc_attr($show_quote).' ">
			%1$s
			<div class="wrapper-info">
				%2$s
				%3$s
				<div class="clearfix"></div>
				%4$s
			</div>
		</div>
	</div>
';


$model->html_format = $model->set_default_options( $html_options );

if( $model->query->have_posts() ) {
	while ( $model->query->have_posts() ) {
		$model->query->the_post();
		$model->loop_index();
		$output['left'] .= sprintf($html_format_1,
				$model->get_image(),
				esc_attr($model->post_id)
		);
		$output['right'] .= sprintf($html_format_2,
				$model->get_content_format(),
				$model->get_title(),
				$model->get_meta_position(),
				$model->get_ratings(),
				esc_attr($model->post_id)
		);
		
	}
	$model->reset();
}
?>


<div class="slz-shortcode sc_testimonial testimonial-vertical <?php echo esc_attr( $data['block_class'] ); ?>" data-id="<?php echo esc_attr( $data['uniq_id'] ); ?>">
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
		<div class="slider-nav">
			<?php echo wp_kses_post($output['left']) ;?>
		</div>
		<div class="slider-for">
			<?php echo wp_kses_post($output['right']) ;?>
		</div>
	</div>
</div>
