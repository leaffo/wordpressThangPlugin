<?php

$shortcode = slz_ext( 'shortcodes' )->get_shortcode( 'features_block' );

$style = array(
	esc_html__('London', 'slz')        => 'st-london',
	esc_html__('Harogate', 'slz')  	   => 'st-harogate',
	esc_html__('Leeds', 'slz')  	   => 'st-leeds',
);

$align = array(
	esc_html__('Center', 'slz')    => 'text-c',
	esc_html__('Left', 'slz')      => 'text-l',
	esc_html__('Right', 'slz')     => 'text-r',
);


// -------------features --------------//

	$add_features = array(
		
		array(
			'type'        => 'param_group',
			'heading'     => esc_html__( 'Add Featured', 'slz' ),
			'param_name'  => 'features_3',
			'params'      => array( 
				array(
					'type'           => 'attach_image',
					'heading'        => esc_html__( 'Image', 'slz' ),
					'param_name'     => 'img_up',
					'dependency'     => array(
						'element'  => 'icon_type',
						'value'    => array('02')
					),
					'description'    => esc_html__('You can use image instead of icon.', 'slz')
				),
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
			),
		),
		
	);
	

// -------general option----------//

	$vc_options = array_merge(
		array(
			array(
				'type'        => 'dropdown',
				'heading'     => esc_html__( 'Style', 'slz' ),
				'param_name'  => 'layout-3-style',
				'value'       => $style,
				'description' => esc_html__( 'Select style for blocks', 'slz' )
			),
			array(
				'type'        => 'dropdown',
				'heading'     => esc_html__( 'Block Align', 'slz' ),
				'param_name'  => 'align',
				'value'       => $align,
				'description' => esc_html__( 'It is used for aligning the inner content of  blocks', 'slz' ),
				'dependency'     => array(
					'element'  => 'layout-3-style',
					'value_not_equal_to'    => array('st-leeds')
				),
			    'group'       => esc_html__( 'Options', 'slz' ),
			),
		),
		$add_features
	);