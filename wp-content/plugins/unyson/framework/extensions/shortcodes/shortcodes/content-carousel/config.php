<?php
/**
 * Created by PhpStorm.
 * User: Dell
 * Date: 10/19/2017
 * Time: 2:28 PM
 */




$cfg['page_builder']=array(
	'title' =>esc_html__('SC Content Carousel','slz'),
	'tab'=>slz()->theme->manifest->get('name'),
	'tag'=>'slz_content_carousel',
	'description'=>esc_html__('Image Slider'),

);


$cfg['layouts']=array(
	'layout-1'=>'layout 1',
	'layout-2'=>'layout 2',
	'layout-3'=>'layout 3',
);

$cfg['default_value']=array(
	'layout'=>'',
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
	'btn_hover_color'=>'',
);
