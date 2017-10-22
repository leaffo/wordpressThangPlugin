<?php

$shortcode = slz_ext( 'shortcodes' )->get_shortcode( 'process' );

/*-----------------icon------------*/

	$icons_type = array(
		array(
			'type'           => 'dropdown',
			'heading'        => esc_html__( 'Icon Type', 'slz' ),
			'param_name'     => 'icon_type',
			'value'          =>   array(
									esc_html__( 'Icon', 'slz' )        => '01',
									esc_html__('Image Upload', 'slz')  => '02'
								),
			'description'    => esc_html__( 'Choose type of icon of block.', 'slz' )
		)
	);

	$icon_library_options = $shortcode->get_icon_library_options( 
		array(
	        'element' => 'icon_type',
	        'value'   => array('01')
	    )
	);

/*-----------------add step------------*/

	$add_step = array(
		array(
			'type'        => 'param_group',
			'heading'     => esc_html__( 'Add Step', 'slz' ),
			'param_name'  => 'add_step_3',
			'params'      => array_merge(
			$icons_type,
			$icon_library_options,
			array(
				array(
					'type'           => 'attach_image',
					'heading'        => esc_html__( 'Image', 'slz' ),
					'param_name'     => 'img_up',
					'dependency'     => array(
						'element'  => 'icon_type',
						'value'    => array('02')
					),
					'description'    => esc_html__('You can use image instead of icon', 'slz')
				),
				array(
					'type'        => 'textfield',
					'heading'     => esc_html__( 'Percentage Complete', 'slz' ),
					'param_name'  => 'percent',
					'value'       => '',
					'description' => esc_html__( 'Enter this field to describe percent complete for this step (Unit is %)', 'slz' )
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
				),
			))
		),
		
	);

$vc_options = array_merge(
	$add_step,
	array(
		array(
			'type'        => 'colorpicker',
			'heading'     => esc_html__( 'Percent Complete Color', 'slz' ),
			'param_name'  => 'percent_cl',
			'value'       => '',
			'description' => esc_html__( 'Choose color for percent complete.', 'slz' ),
			'group'       => esc_html__( 'Custom Color', 'slz' ),
		),
	)
);