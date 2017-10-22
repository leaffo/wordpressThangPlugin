<?php
$column = array(
    esc_html__( '1', 'slz' )    => '1',
    esc_html__( '3', 'slz' )    => '3',
    esc_html__( '5', 'slz' )    => '5',
    esc_html__( '7', 'slz' )    => '7'

);

$vc_options = array(
    array(
        'type'          => 'dropdown',
        'heading'       => esc_html__( 'Slide To Show', 'slz' ),
        'param_name'    => 'column_2',
        'value'         => $column,
        'std'           => '5',
        'description'   => esc_html__( 'Enter number of items to show.', 'slz' )
    )
);