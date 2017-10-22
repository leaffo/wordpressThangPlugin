<?php
$column = array(
    esc_html__( '4', 'slz' )      => '4',
    esc_html__( '5', 'slz' )      => '5',
    esc_html__( '6', 'slz' )      => '6'

);

$vc_options = array(
    array(
		'type'          => 'dropdown',
		'heading'       => esc_html__( 'Slide To Show', 'slz' ),
		'param_name'    => 'column',
		'value'         => $column,
		'std'           => '4',
		'description'   => esc_html__( 'Enter number of items to show.', 'slz' )
	)
);