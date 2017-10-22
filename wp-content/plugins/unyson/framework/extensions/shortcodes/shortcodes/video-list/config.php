<?php

if ( ! defined( 'SLZ' ) ) {
	die ( 'Forbidden' );
}

$cfg = array ();

$cfg ['page_builder'] = array (
		'title' => esc_html__ ( 'SLZ Video List', 'slz' ),
		'description' => esc_html__ ( 'Show list of video', 'slz' ),
		'tab' => slz()->theme->manifest->get('name'),
		'icon' => 'icon-slzcore-video-list slz-vc-slzcore',
		'tag' => 'slz_video_list'
);

$cfg['unique_id'] = SLZ_Com::make_id();

$cfg['video_type'] = array(
	esc_html__( 'Youtube', 'slz' )  => 'youtube',
	esc_html__( 'Vimeo', 'slz' )    => 'vimeo',
);

$cfg ['default_value'] = array (
	'style'                  => 'st-florida',
	'list_video'             => '',
    'slide_to_show'          => '3',
	'extra_class'            => '',
);

$cfg['params_group_list'] = array(
    'video_title'        => '',
	'video_type'         => 'youtube',
	'youtube_id'         => '',
	'vimeo_id'           => '',
	'bg_image_video'     => '',
);