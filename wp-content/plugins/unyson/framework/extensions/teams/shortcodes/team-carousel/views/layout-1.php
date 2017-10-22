<?php if ( ! defined( 'ABSPATH' ) ) { die( 'Forbidden' ); }

$html_format_1 = $html_format_2 = '';
$html_render = array();
$output = array(
	'main' => '',
	'nav'   => '',
);

$btn_content = '';
if(!empty($data['btn_content'])){
    $btn_content = '<a class="slz-btn-readmore" href="%8$s">
						<span class="text">'.esc_attr($data['btn_content']).'</span>
						<i class="slz-icon fa"></i>
					</a>';
}

$html_format_1 = '
		<div class="item %7$s">
			<div class="slz-team-block">
				<div class="col-left">
					<div class="team-image">
						%1$s
					</div>
				</div>
				<div class="col-right">
					<div class="team-content">
						<div class="content-wrapper">
							%2$s
							%3$s
							%4$s
							<div class="description-wrapper mCustomScrollbar">
								%5$s
							</div>
							%6$s
							'. $btn_content .'
						</div>
					</div>
				</div>
			</div>
		</div>
';

$html_format_2 = '
	<div class="item %2$s">
		<div class="slz-team-block">
			<div class="team-image">
				%1$s
			</div>
		</div>
	</div>
';

$html_options['social_format'] = '<a href="%2$s" class="social-item %1$s">
													<i class="slz-icons fa fa-%1$s"></i>
													<span class="text">%3$s</span>
												</a>';

$model->html_format = $model->set_default_options($html_options);

$default_img = $model->html_format['image_format'];

if( $model->query->have_posts() ) {
	while ( $model->query->have_posts() ) {
		$model->query->the_post();
		$model->loop_index();
		//get data
		$model->html_format['image_format'] = $default_img;
		$output['main'] .= sprintf($html_format_1,
			$model->get_featured_image( $model->html_format),
			$model->get_title(),
			$model->get_meta_position(),
			$model->get_meta_info(),
			$model->get_meta_short_description(),
			$model->get_meta_social_list(),
			esc_attr($model->get_post_class()),
			esc_url($model->permalink)
		);
		$model->html_format['image_format'] = '%1$s';
		$nav_img = $model->get_featured_image( $model->html_format );
		if( $nav_img ) {
			$nav_img = '<a href="javascript:void(0)" class="test">' . $nav_img . '</a>';
		}
		$output['nav'] .= sprintf($html_format_2,
			$nav_img,
			esc_attr($model->get_post_class())
		);
	}
	$model->reset();
}
?>
<div class="slz-shortcode sc_team_carousel <?php echo esc_attr( $data['block_class'] ); ?>" data-item="<?php echo esc_attr($data['uniq_id']); ?>">
	<div class="slz-carousel-wrapper"
		<?php echo '
				data-slidestoshow="'.esc_attr( $data['column'] ).'"
				data-arrowshow="'.esc_attr( $data['slide_arrows'] ).'"
				data-dotshow="'. esc_attr( $data['slide_dots'] ) .'"
				data-autoplay="'. esc_attr( $data['slide_autoplay'] ) .'"
				data-infinite="'. esc_attr( $data['slide_infinite'] ) .'"
		';?>
	>
		<?php
			echo '<div class="slider-for">'.
					$output['main'] .'
				</div>';
			echo '<div class="slider-nav">' .
					$output['nav'] .'
				</div>';
		?>
	</div>
</div>
