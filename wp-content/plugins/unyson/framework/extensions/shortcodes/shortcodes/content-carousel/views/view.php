<?php
/**
 * Created by PhpStorm.
 * User: Dell
 * Date: 10/19/2017
 * Time: 2:29 PM
 */
if ( ! defined( 'ABSPATH' ) ) {
	die( 'Forbidden' );
};
//slz_print( $data );
//slz_print($view_path);
//slz_print( $instance );

/*  'layout'=>'',
	'style'=>'',
	'contents'=>'',
	'extra_class'=>'',
	'slide_to_show'=>'3',
	'slide_arrows'=>true,
	'slide_dots'=>true,
	'slide_autoplay'=>true,
	'slide_infinite'=>true,
	'slide_speed'=>'200',
	'title_color'=>'',
	'title_hover_color'=>'',
	'content_color'=>'',
	'btn_color'=>'',
	'btn_hover_color'=>'',*/


$unique_class = 'slz_content_carousel_' . SLZ_Com::make_id();
$layout_class = ! empty( $data['layout'] ) ? $data['layout'] : '';
$style_class  = ! empty( $data['style'] ) ? $data['style'] : '';
$sc_class     = $unique_class . ' ' . $layout_class . ' ' . $style_class . ' ' . $data['extra_class'];


$slick_data=array();
foreach ( $data as $key => $value ) {
	if ( preg_match( '#color#', $key ) ) {

		//add css vao custom.css
		if ( preg_match( '#hover#', $key ) ) {

			//Replace 'title_hover_color'->title_color
			$hovercolor = preg_replace( '#_hover#', '', $key );

			$custom_css = ! empty( $value ) ? sprintf( '.%1$s .slz-%3$s:hover { color: %2$s !important; }',
				esc_attr( $unique_class ), esc_attr( $value ), esc_attr( $hovercolor ) ) : '';
			do_action( 'slz_add_inline_style', $custom_css );
		} //ko co' chu~ hover thi them color thoi
		else {
			$custom_css = ! empty( $value ) ? sprintf( '.%1$s .slz-%3$s { color: %2$s !important; }',
				esc_attr( $unique_class ), esc_attr( $value ), esc_attr( $key ) ) : '';
			do_action( 'slz_add_inline_style', $custom_css );
		}
		//echo $custom_css;
	}
	//lay' slick-data
	if ( preg_match( '#slide#', $key ) ) {
		$slick_data[$key]=$value;

	}
}
$slick_data=json_encode($slick_data);
//slz_print($slick_data);



//decode param_group array
$contents = vc_param_group_parse_atts( $data['contents'] );
//slz_print( $contents );
?>

<div class="slz-shortcode sc-content-carousel <?php echo esc_attr( $sc_class ) ?>">
	<div class="banner-wrapper" data-slick="<?php echo esc_attr($slick_data);?>">
		<?php
		foreach ( $contents as $content ) {

			?>

			<?php $btn_vclink = SLZ_Util::parse_vc_link( $content['btn'] ); ?>

			<div class="item" >
				<?php
				?>
				<p style="font-size: large" class="slz-title_color">
					<?php echo esc_html__($content['title'],'slz'); ?>
				</p>
				<?php echo wp_get_attachment_image( $content['image'] ); ?>

				<p class="slz-content_color"><?php echo esc_html__($content['content'],'slz') ?></p>
				<a href="<?php echo esc_html__($btn_vclink['url'],'slz'); ?>"
				   class="btn btn-success slz-btn_color"><?php echo esc_html__($btn_vclink['title'],'slz'); ?></a>
			</div>
			<?php
		}
		?>

	</div>
</div>


<?php


?>




