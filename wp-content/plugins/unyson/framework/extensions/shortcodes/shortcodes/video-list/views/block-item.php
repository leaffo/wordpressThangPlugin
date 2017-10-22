<div class="slz-video-list <?php echo esc_attr($params['tab_class'])?>" id="<?php echo esc_attr($params['tab_id'])?>" role="tabpanel" >
	<div class="tab-body">
		<div class="slz-block-video">
			<div class="block-video">
				<div class="video-content">
					<div class="video-content-wrapper">
						<div class="info-wrapper">
							<div class="btn-play">
								<i class="icons fa fa-play"></i>
							</div>
							<div class="btn-close" data-src="<?php echo esc_url( $params['url_video'] ); ?>"><i class="icons fa fa-times"></i></div>
							<?php echo '<div class="title">'.esc_attr($params['title']).'</div>' ?>
						</div>
					</div>
					<img src="<?php echo esc_url( $params['image_video'] ) ?>" alt="" class="img-full">
					<?php echo ( $instance->iframe_render( $params['url_video'] ) ); ?>
				</div>
			</div>
		</div>
	</div>
</div>