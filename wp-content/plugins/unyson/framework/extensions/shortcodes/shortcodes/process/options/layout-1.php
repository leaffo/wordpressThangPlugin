<?php

/*-------------add step--------------//*/

	$add_process = array(
		array(
			'type'        => 'param_group',
			'heading'     => esc_html__( 'Add Step', 'slz' ),
			'param_name'  => 'add_step',
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
				),
			),
		),
		
	);


/*------------options--------*/


$vc_options = $add_process ;