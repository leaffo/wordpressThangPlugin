<?php
$shortcode = slz_ext( 'shortcodes' )->get_shortcode( 'video_list' );

$params = array(
	array(
		'type'       => 'param_group',
		'heading'    => esc_html__( 'Add Video', 'slz' ),
		'param_name' => 'list_video',
		'params'     => array(
			array(
				'type'        => 'textfield',
				'heading'     => esc_html__( 'Video Title', 'slz' ),
				'param_name'  => 'video_title',
				'value'       => '',
				'description' => esc_html__( 'Add title for video', 'slz' ),
			),
			array(
				'type'           => 'attach_image',
				'heading'        => esc_html__( 'Add Video Background', 'slz' ),
				'param_name'     => 'bg_image_video',
				'value'          => '',
				'description'    => esc_html__( 'Choose background image to add.', 'slz' )
			),
			array(
				'type'        => 'dropdown',
				'heading'     => esc_html__( 'Type Of Video', 'slz' ),
				'param_name'  => 'video_type',
				'std'         => 'youtube',
				'value'       => $shortcode->get_config('video_type'),
				'description' => esc_html__( 'Choose style to display.', 'slz' )
			),
			array(
				'type'        => 'textfield',
				'heading'     => esc_html__( 'Youtube ID', 'slz' ),
				'param_name'  => 'youtube_id',
				'value'       => '',
				'description' => esc_html__( 'Example the Video ID for http://www.youtube.com/v/8OBfr46Y0cQ is 8OBfr46Y0cQ', 'slz' ),
				'dependency'     => array(
					'element'  => 'video_type',
					'value'    => array( 'youtube' )
				),
			),
			array(
				'type'        => 'textfield',
				'heading'     => esc_html__( 'Vimeo ID', 'slz' ),
				'param_name'  => 'vimeo_id',
				'value'       => '',
				'description' => esc_html__( 'Example the Video ID for http://vimeo.com/86323053 is 86323053', 'slz' ),
				'dependency'     => array(
					'element'  => 'video_type',
					'value'    => array( 'vimeo' )
				),
			)
		)
	),
);

$extra_class = array(
	array(
		'type'        => 'textfield',
		'heading'     => esc_html__( 'Extra Class', 'slz' ),
		'param_name'  => 'extra_class',
		'value'       => '',
		'description' => esc_html__( 'Add extra class to button', 'slz' )
	)
);

$vc_options = array_merge( 
	$params,
	$extra_class
);