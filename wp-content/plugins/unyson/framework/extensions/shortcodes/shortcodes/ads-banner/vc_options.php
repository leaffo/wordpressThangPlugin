<?php if ( ! defined( 'ABSPATH' ) ) {
	die ( 'Forbidden' );
}

$vc_options = array(
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
		'type'		=>	'dropdown',
		'heading'	=>	'ads spot',
		'param_name'	=>	'adspot',
		'value'			=>	SLZ_Com::get_advertisement_list(),
		'des'			=>	'des adspot',
	),
	array(
		'type'        => 'textfield',
		'heading'     => esc_html__( 'Extra Class', 'slz' ),
		'param_name'  => 'extra_class',
		'value'       => '',
		'description' => esc_html__( 'Add extra class to block', 'slz' )
	)
);