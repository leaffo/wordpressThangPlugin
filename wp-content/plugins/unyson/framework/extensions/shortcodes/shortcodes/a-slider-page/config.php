<?php
/**
 * Created by PhpStorm.
 * User: Dell
 * Date: 10/18/2017
 * Time: 8:46 AM
 */

$cfg = array();

$cfg['page_builder'] = array(


	'title'       => esc_html__('Slide Page','slz'),
	'popup_size'  => 'medium',
	'description' => esc_html__('des hien. o? dau','slz'),
	'tab'         => esc_html__('Thang Tab','slz'),

	//ph?i có slz ? ??u, ko có ko th?c thi ???c shortcode.
	'tag'         => 'slz_a_slider_page',
);


$cfg['default_value'] = array(
	'images_slider'         => '',
	'num_of_images_display' => '',
	'loop'                  => '',
);


?>