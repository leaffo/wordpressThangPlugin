<?php if ( ! defined( 'ABSPATH' ) ) { die( 'Forbidden' ); }

$style = !empty($data['layout-3-style']) ? $data['layout-3-style'] : 'st-london';

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
			$arr_body = $arr_body_2 = $arr_sub = $arr_main = array();
			
			switch($style){
				case 'st-london':
					$arr_sub[] = $social;
					$arr_main[] = $title;
					$arr_main[] = $position;
					$arr_main[] = $contact;
					$arr_main[] = $desc;
					$arr_main[] = $btn_content;
					if( $arr_sub ) {
						$arr_body_2[] = implode( "\n", $arr_sub );
					}
					if( $arr_main ) {
						$arr_body[] = '<div class="main-content">' . implode( "\n", $arr_main ) .'</div>';
					}
					break;
			}
			?>
			<div class="item <?php echo esc_attr($model->get_post_class())?>">
				<div class="slz-team-block <?php echo esc_attr($style)?>">
					<div class="team-image-wrapper">
						<?php echo wp_kses_post($image);?>
						<?php echo implode("\n", $arr_body_2);?>
					</div>
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