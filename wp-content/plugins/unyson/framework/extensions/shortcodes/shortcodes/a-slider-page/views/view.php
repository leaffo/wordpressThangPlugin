<?php
/**
 * Created by PhpStorm.
 * User: Dell
 * Date: 10/18/2017
 * Time: 9:06 AM
 */


$unique_class='slz_a_slider_page_'.SLZ_Com::make_id();
$layout_class=!empty($data['layout'])?$data['layout']:'';
$style_class=!empty($data['style'])?$data['style']:'';
$sc_class=esc_html__($unique_class,'slz').' '.esc_html__($layout_class,'slz'). ' '. esc_html__($style_class,'slz'). ' '.esc_html__($data['extra_class'],'slz');

if(!empty($data['color'])){
	$customclass= sprintf('.%1$s .slz_pos_color { color: %2$s; !important; }',esc_html__($unique_class,'slz'),esc_html__($data['extra_class'],'slz'));
	do_action('slz_add_inline_style',$customclass);
}


?>
<div class="slz_shortcode sc_tenclass <?php echo esc_attr__($sc_class,'slz') ?>"></div>

