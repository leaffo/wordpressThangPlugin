<?php
$style = array(
	esc_html__('Florida', 'slz')     => 'st-florida',
	esc_html__('California', 'slz')  => 'st-california',
	esc_html__('Georgia', 'slz')     => 'st-georgia',
);

$add_features = array(
	array(
		'type'        => 'param_group',
		'heading'     => esc_html__( 'Add features', 'slz' ),
		'param_name'  => 'features_1',
		'params'      => array(
			array(
				'type'        => 'textfield',
				'heading'     => esc_html__( 'Title', 'slz' ),
				'param_name'  => 'title',
				'value'       => '',
				'description' => esc_html__( 'Title. If it blank the block will not have a title', 'slz' )
			),
			array(
				'type'        => 'textarea',
				'heading'     => esc_html__( 'Description', 'slz' ),
				'param_name'  => 'des',
				'value'       => '',
				'description' => esc_html__( 'Description. If it blank the block will not have a title', 'slz' )
			)
		)
	)
);


$vc_options = array_merge(
	array(
		array(
			'type'        => 'dropdown',
			'heading'     => esc_html__( 'Style', 'slz' ),
			'param_name'  => 'layout-1-style',
			'value'       => $style,
			'description' => esc_html__( 'Select style for blocks', 'slz' )
		),
		array(
			'type'        => 'colorpicker',
			'heading'     => esc_html__( 'Number Color', 'slz' ),
			'param_name'  => 'number_cl',
			'value'       => '',
			'group'       => esc_html__( 'Custom Color', 'slz' ),
			'description' => esc_html__( 'Choose color for number of features blocks.', 'slz' ),
		)
	),
	$add_features
);