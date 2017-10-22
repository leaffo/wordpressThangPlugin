<?php
$style = array(
	esc_html__('Florida', 'slz')     => 'style-1',
	esc_html__('California', 'slz')  => 'style-2',
	esc_html__('Georgia', 'slz')     => 'style-3',
	esc_html__('New York', 'slz')    => 'style-4',
	esc_html__('Illinois', 'slz')    => 'style-5',
	esc_html__('Connecticut', 'slz') => 'style-6',
	esc_html__('Texas', 'slz')       => 'style-7',
);
$position = array(
	esc_html__( 'Left', 'slz' )  => 'left',
	esc_html__( 'Right', 'slz' ) => 'right',
);
$vc_options = array(
	array(
		'type'        => 'dropdown',
		'heading'     => esc_html__( 'Style', 'slz' ),
		'param_name'  => 'style',
		'value'       => $style,
		'std'         => 'style-1',
		'description' => esc_html__( 'Select style for blocks', 'slz' )
	),
	array(
		'type'        => 'dropdown',
		'heading'     => esc_html__( 'Position', 'slz' ),
		'param_name'  => 'position',
		'value'       => $position,
		'std'         => 'left',
		'description' => esc_html__( 'Choose layout position.', 'slz' ),
		'dependency' => array(
			'element' => 'style',
			'value' => array('style-1', 'style-2', 'style-3') ,
		)
	),
);