<?php if ( ! defined( 'ABSPATH' ) ) { die( 'Forbidden' ); }

$style = !empty($data['layout-1-style']) ? $data['layout-1-style'] : 'st-florida';

$img_class = '';
// setting html format
$html_options = array(
	'image_format'  => '
			<div class="team-image">
				<a href="%2$s" tabindex="1" class="link">%1$s</a>
			</div>',
	'social_format'	=> 
			'<a href="%2$s" class="social-item %1$s">
				<i class="slz-icons fa fa-%1$s"></i><span class="text">%3$s</span>
			</a>',
);
$html_options = $model->set_default_options( $html_options );
$row_count = 0;
$thumb_size = 'small';
if ( !empty($data['column']) && ( $data['column'] == 1 || $data['column'] == 2 ) ) {
	$thumb_size = 'large';
}

?>

<div class="slz-shortcode sc_team_block <?php echo esc_attr( $data['block_class'] ); ?>">
	<?php
	echo ( $data['openRow'] );
		while ( $model->query->have_posts() ) {
			$model->query->the_post();
			$model->loop_index();
			$btn_content = '';
			//get data
			$image = $model->get_featured_image( $html_options, $thumb_size );
			$title = $model->get_title( $html_options );
			$position = $model->get_meta_position();
			$desc = $model->get_meta_short_description();
			$social = $model->get_meta_social_list();
			$contact = $model->get_meta_info();
			if(!empty($data['btn_content'])){
				$btn_content = '<a class="slz-btn-readmore" href="'.esc_url($model->permalink).'">
									<span class="text">'.esc_attr($data['btn_content']).'</span>
									<i class="slz-icon fa"></i>
								</a>';
			}
			$arr_body = array();
			
			switch($style){
				case 'st-florida':
					$img_class = "image-circle";
					$arr_body[] = $title;
					$arr_body[] = $position;
					$arr_body[] = $contact;
					$arr_body[] = $desc;
					$arr_body[] = $social;
					$arr_body[] = $btn_content;
					break;
				case 'st-california':
					$img_class = "image-circle";
					$arr_body[] = $position;
					$arr_body[] = $title;
					$arr_body[] = $desc;
					$arr_body[] = $social;
					$arr_body[] = $contact;
					$arr_body[] = $btn_content;
					break;
				case 'st-georgia':
					$img_class = "image-square";
					$arr_body[] = $title;
					$arr_body[] = $position;
					$arr_body[] = $contact;
					$arr_body[] = $desc;
					$arr_body[] = $social;
					$arr_body[] = $btn_content;
					break;
				case 'st-newyork':
					$img_class = "image-square";
					$arr_body[] = $title;
					$arr_body[] = $position;
					$arr_body[] = $contact;
					$arr_body[] = $desc;
					$arr_body[] = $social;
					$arr_body[] = $btn_content;
					break;
			}
			?>
			<div class="item <?php echo esc_attr($model->get_post_class())?>">
				<div class="slz-team-block <?php echo esc_attr($style) .' ' .esc_attr($img_class)?> ">
					<?php echo wp_kses_post($image);?>
					<div class="team-content">
						<div class="content-wrapper">
							<?php echo implode("\n", $arr_body);?>
						</div>
					</div>
				</div>
			</div><?php
			$row_count++;
		}//end while
		$model->reset();
		
		//paging when show block
		if( empty($data['show_slider'])) {
			echo '<div class="clearfix"></div>';
			$model->pagination();
		}
	echo ( $data['closeRow'] );
	?>
</div>