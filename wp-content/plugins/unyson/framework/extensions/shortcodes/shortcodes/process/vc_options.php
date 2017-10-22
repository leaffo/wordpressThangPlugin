<?php

$shortcode = slz_ext( 'shortcodes' )->get_shortcode( 'process' );

$icon_type = SLZ_Params::get('icon-type');

$animation =  SLZ_Params::get('animation');

$delay_time = array(
	esc_html__( '0.5 s', 'slz' )  => '0.5s',
	esc_html__( '1 s', 'slz' )    => '1s',
	esc_html__( '1.5 s', 'slz' )  => '1.5s',
	esc_html__( '2 s', 'slz' )    => '2s',
);

$column_arr = array(
	esc_html__('One', 'slz')     => 'slz-column-1',
	esc_html__('Two', 'slz')     => 'slz-column-2',
	esc_html__('Three', 'slz')   => 'slz-column-3',
	esc_html__('Four', 'slz')    => 'slz-column-4',
);

$title_line = array(
	esc_html__('Hide', 'slz')        => '',
	esc_html__('Underline', 'slz')   => 'underline',
);

$align = array(
	esc_html__('Default', 'slz')   => '',
	esc_html__('Left', 'slz')      => 'text-l',
	esc_html__('Right', 'slz')     => 'text-r',
);



// ----------------layout option---------//

	$layout = array(
		array(
			'type'        => 'dropdown',
			'heading'     => esc_html__( 'Layout', 'slz' ),
			'admin_label'   => true,
			'param_name'  => 'layout',
			'value'       => $shortcode->get_layouts(),
			'description' => esc_html__( 'Choose layout to show', 'slz' )
		),
	);

	$layout_option = $shortcode->get_layout_options();

// ------------- extra class option---------------//

	$extra_class = array(
		array(
			'type'        => 'textfield',
			'heading'     => esc_html__( 'Extra Class', 'slz' ),
			'param_name'  => 'extra_class',
			'value'       => '',
			'description' => esc_html__( 'Add extra class to block', 'slz' )
		)
	);

// -------------Tab General ------------//

	$general = array(
		
		array(
			'type'        => 'dropdown',
			'heading'     => esc_html__( 'Blocks Animation', 'slz' ),
			'param_name'  => 'item_animation',
			'value'       => $animation,
			'edit_field_class' => 'vc_col-sm-6 vc_column',
			'description' => esc_html__( 'Add animation for blocks', 'slz' )
		),
		array(
			'type'        => 'dropdown',
			'heading'     =>  esc_html__( 'Animation Delay Time', 'slz' ),
			'param_name'  => 'delay_animation',
			'value'       => $delay_time,
			'edit_field_class' => 'vc_col-sm-6 vc_column',
			'description' => esc_html__( 'Choose delay time for animation', 'slz' ),
		),
	
	);

// -------------Tab Option ------------//

	$options = array (
		array(
			'type'        => 'dropdown',
			'heading'     => esc_html__( 'Column', 'slz' ),
			'param_name'  => 'column',
			'admin_label'   => true,
			'value'       => $column_arr,
			'std'         => '',
			'description' => esc_html__( 'Select number of single block elements per row.', 'slz' ),
			'group'       => esc_html__( 'Options', 'slz' ),
		),
		array(
			'type'        => 'dropdown',
			'heading'     => esc_html__( 'Title Line?', 'slz' ),
			'param_name'  => 'title_line',
			'value'       => $title_line,
			'description' => esc_html__( 'Show/Hide line of title', 'slz' ),
			'group'       => esc_html__( 'Options', 'slz' ),
		),
	
	);

// -------------Tab Custom Color ------------//

	$custom_css = array(
		array(
			'type'        => 'colorpicker',
			'heading'     => esc_html__( 'Title Color', 'slz' ),
			'param_name'  => 'title_cl',
			'value'       => '',
			'description' => esc_html__( 'Choose color for title of blocks.', 'slz' ),
			'edit_field_class' => 'vc_col-sm-6 vc_column',
			'group'       => esc_html__( 'Custom Color', 'slz' ),
		),
		array(
			'type'        => 'colorpicker',
			'heading'     => esc_html__( 'Title Line Color', 'slz' ),
			'param_name'  => 'title_line_cl',
			'value'       => '',
			'edit_field_class' => 'vc_col-sm-6 vc_column',
			'description' => esc_html__( 'Choose color for title line of blocks.', 'slz' ),
			'dependency'  => array(
			        'element' => 'title_line',
			        'value_not_equal_to' => array('')
			    ),
			'group'       => esc_html__( 'Custom Color', 'slz' ),
		),
		array(
			'type'        => 'colorpicker',
			'heading'     => esc_html__( 'Description Color', 'slz' ),
			'param_name'  => 'des_cl',
			'value'       => '',
			'description' => esc_html__( 'Choose color for description of blocks.', 'slz' ),
			'edit_field_class' => 'vc_col-sm-6 vc_column',
			'group'       => esc_html__( 'Custom Color', 'slz' ),
		)

	);


$vc_options = array_merge(
	$layout,
	$options,
	$layout_option,
	$general,
	$custom_css,
	$extra_class
);