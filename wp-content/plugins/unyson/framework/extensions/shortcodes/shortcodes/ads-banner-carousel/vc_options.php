<?php if ( ! defined( 'ABSPATH' ) ) {
	die ( 'Forbidden' );
}

$param_options = array(
	array(
		'type'        => 'textfield',
		'heading'     => esc_html__( 'Banner Title', 'slz' ),
		'param_name'  => 'block_title',
		'value'       => '',
		'description' => esc_html__( 'Banner title. If it blank the block will not have a title.', 'slz' )
	),
	array(
		'type'        => 'colorpicker',
		'heading'     => esc_html__( 'Banner Title Color', 'slz' ),
		'param_name'  => 'block_title_color',
		'value'       => '',
		'description' => esc_html__( 'Choose a custom title text color.', 'slz' )
	),
	array(
		'type'        => 'param_group',
		'param_name'  => 'ads',
		'heading'     => esc_html__( 'Choose advertisement', 'slz' ),
		'description' => esc_html__( 'Choose the advertisement spot.', 'slz' ),
		'params'      => array(
			array(
				'type'        => 'dropdown',
				'heading'     => esc_html__( 'Use adspot', 'slz' ),
				'param_name'  => 'ads_id',
				'value'       => array_merge( array( '-- Choose adspot --' => '' ), SLZ_Com::get_advertisement_list() ),
				'description' => esc_html__( 'Choose the advertisement spot', 'slz' )
			),
		),
	),
	array(
		'type'        => 'textfield',
		'heading'     => esc_html__( 'Extra Class', 'slz' ),
		'param_name'  => 'extra_class',
		'value'       => '',
		'description' => esc_html__( 'Add extra class to block', 'slz' )
	)
);

$slider_options = array(
	array(
		'type'        => 'textfield',
		'param_name'  => 'slide_to_show',
		'heading'     => esc_html__( 'Slide To Show', 'slz' ),
		'description' => esc_html__( 'Enter number of items to show. Default: 3.', 'slz' ),
		'group'       => esc_html__( 'Slider Custom', 'slz' )
	),
	array(
		'type'        => 'checkbox',
		'param_name'  => 'slide_autoplay',
		'heading'     => esc_html__( 'Is Auto Play?', 'slz' ),
		'description' => esc_html__( 'Choose YES to slide auto play.', 'slz' ),
		'value'       => true,
		'group'       => esc_html__( 'Slide Custom', 'slz' )
	),
	array(
		'type'        => 'checkbox',
		'param_name'  => 'slide_dots',
		'heading'     => esc_html__( 'Is Dots Navigation?', 'slz' ),
		'value'       => true,
		'description' => esc_html__( 'Choose YES to show dot navigation.', 'slz' ),
		'group'       => esc_html__( 'Slide Custom', 'slz' )
	),
	array(
		'type'        => 'checkbox',
		'param_name'  => 'slide_arrows',
		'heading'     => esc_html__( 'Is Arrows Navigation ?', 'slz' ),
		'value'       => true,
		'description' => esc_html__( 'Choose YES to show arrow navigation.', 'slz' ),
		'group'       => esc_html__( 'Slide Custom', 'slz' )
	),
	array(
		'type'        => 'checkbox',
		'param_name'  => 'slide_infinite',
		'heading'     => esc_html__( 'Is Loop Infinite ?', 'slz' ),
		'value'       => true,
		'description' => esc_html__( 'Choose YES to slide loop infinite.', 'slz' ),
		'group'       => esc_html__( 'Slide Custom', 'slz' )
	),
	array(
		'type'        => 'textfield',
		'param_name'  => 'slide_speed',
		'heading'     => esc_html__( 'Slider Speed', 'slz' ),
		'description' => esc_html__( 'Enter number value. Unit is millisecond. Default: 600.', 'slz' ),
		'group'       => esc_html__( 'Slide Custom', 'slz' )
	),
);

$vc_options = array_merge(
	$param_options, $slider_options
);
