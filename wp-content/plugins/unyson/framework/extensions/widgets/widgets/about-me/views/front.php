<?php if ( ! defined( 'ABSPATH' ) ) {
	die( 'Forbidden' );
}

echo wp_kses_post($before_widget);

$image_url = '';

if(!empty($instance['image'])){
	$image_arr = (array)json_decode($instance['image']);
	if( isset($image_arr['ID']) ) {
		$image_id = $image_arr['ID'];
	}
}

if( !empty( $image_id ) ){
	$image_url = wp_get_attachment_url( $image_id );
}
		
extract( $instance );
if( empty($url)) {
	$url = '';
}
?>

<div class="slz-widget widget <?php echo esc_attr( $extra_class ); ?> slz-about-me-01 slz-widget-about-me-<?php echo esc_attr( $unique_id ); ?>">
	<?php echo wp_kses_post( $title ); ?>

	<div class="widget-content">
		<div class="block-wrapper">
			<div class="image-wrapper">
				<img alt="" src="<?php echo esc_url( $image_url ); ?>" class="img-responsive" />
			</div>
			<div class="content-wrapper"><a href="<?php echo esc_url($url)?>" class="name"><?php echo esc_html( $name ); ?></a>
				<div class="content-text">
					<?php echo esc_html( $detail ); ?>
				</div>
			</div>
			<div class="social-wrapper">
				<ul class="list-unstyled list-inline list-social-wrapper">
					<?php
						$socials = SLZ_Params::get('social-icons');

						foreach ($socials as $social => $icon) {

							$social = str_replace('-', '_', $social);

							if ( !empty ( $$social )) {

								echo '<li><a href="' . esc_url ( $$social ) . '" target="_blank" class="link">
									<i class="fa ' . esc_attr( $icon ) . '"></i>
								</a></li>';

							}
							
						}
					?>
				</ul>
			</div>
		</div>
	</div>
</div>

<?php 
echo wp_kses_post( $after_widget );

?>