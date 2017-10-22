<?php

$shortcode = slz_ext( 'shortcodes' )->get_shortcode( 'icons_block' );

$icon_type = SLZ_Params::get('icon-type');

$animation =  SLZ_Params::get('animation');

$delay_time = array(
	esc_html__( '0.5 s', 'slz' )  => '0.5s',
	esc_html__( '1 s', 'slz' )    => '1s',
	esc_html__( '1.5 s', 'slz' )  => '1.5s',
	esc_html__( '2 s', 'slz' )    => '2s',
);

$spacing_style = array(
	esc_html__('Normal', 'slz')            => 'normal',
	esc_html__('Small Spacing', 'slz')     => 'option-1',
	esc_html__('Large Spacing', 'slz')     => 'option-2',
	esc_html__('No Spacing 01', 'slz')     => 'option-3',
	esc_html__('No Spacing 02', 'slz')     => 'option-4',
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

// --------------icon option --------------//

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

	$icons_extra_options = array(

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
			'type'        => 'textfield',
			'heading'     => esc_html__( 'Button Content', 'slz' ),
			'param_name'  => 'btn',
			'value'       => '',
			'description' => esc_html__( 'Enter button content.', 'slz' )
		),
		array(
			'type'        => 'vc_link',
			'heading'     => esc_html__( 'Link', 'slz' ),
			'param_name'  => 'link',
			'value'       => '',
			'description' => esc_html__( 'Add custom link.', 'slz' )
		),
		array(
			'type'        => 'textarea',
			'heading'     => esc_html__( 'Description', 'slz' ),
			'param_name'  => 'des',
			'value'       => '',
			'description' => esc_html__( 'Description. If it blank the block will not have a description', 'slz' )
		),
		array(
			'type'        => 'colorpicker',
			'heading'     => esc_html__( 'Block Background Color', 'slz' ),
			'param_name'  => 'block_bg_cl',
			'value'       => '',
			'description' => esc_html__( 'Choose background color for blocks.', 'slz' ),
			'edit_field_class' => 'vc_col-sm-6 vc_column'
		),
		array(
			'type'        => 'colorpicker',
			'heading'     => esc_html__( 'Block Background Color (hover)', 'slz' ),
			'param_name'  => 'block_bg_hv_cl',
			'value'       => '',
			'description' => esc_html__( 'Choose background color for blocks when you mouse over it.', 'slz' ),
			'edit_field_class' => 'vc_col-sm-6 vc_column'
		),
		array(
			'type'           => 'attach_image',
			'heading'        => esc_html__( 'Block Background Image', 'slz' ),
			'param_name'     => 'block_bg_img',
			'edit_field_class' => 'vc_col-sm-6 vc_column',
			'description'    => esc_html__('Choose background image for blocks.', 'slz')
		),
		array(
			'type'           => 'attach_image',
			'heading'        => esc_html__( 'Block Background Image (hover)', 'slz' ),
			'param_name'     => 'block_bg_hv_img',
			'edit_field_class' => 'vc_col-sm-6 vc_column',
			'description'    => esc_html__('Choose background image for blocks when you mouse over it.', 'slz')
		),

	);

	$icon_options = array(
		array(
			'type'        => 'param_group',
			'heading'     => esc_html__( 'Add Block Icon', 'slz' ),
			'param_name'  => 'icon_box',
			'params'      => array_merge( $icons_type, $icon_library_options, $icons_extra_options ),
		),
		
	);

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
		array(
			'type'        => 'dropdown',
			'heading'     => esc_html__( 'Column', 'slz' ),
			'param_name'  => 'column',
			'admin_label'   => true,
			'value'       => $column_arr,
			'std'         => '',
			'description' => esc_html__( 'Select number of single block elements per row.', 'slz' )
		)
	);

// -------------Tab Option ------------//

	$options = array (
		array(
			'type'        => 'dropdown',
			'heading'     => esc_html__( 'Block Align', 'slz' ),
			'param_name'  => 'align',
			'value'       => $align,
			'description' => esc_html__( 'It is used for aligning the inner content of  blocks', 'slz' ),
		    'group'       => esc_html__( 'Options', 'slz' ),
		),
		array(
			'type'        => 'dropdown',
			'heading'     => esc_html__( 'Spacing Style', 'slz' ),
			'param_name'  => 'spacing_style',
			'value'       => $spacing_style,
			'description' => esc_html__( 'Choose style for spacing bettween blocks', 'slz' ),
			'dependency'  => array(
		        'element' => 'layout',
		        'value'   => array('layout-1', 'layout-2', 'layout-3','layout-5')
		    ),
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
		array(
			'type'           => 'textfield',
			'heading'        => esc_html__( 'Icon Size', 'slz' ),
			'param_name'     => 'icon_size',
			'description'    => esc_html__('Enter icon size (unit is px).', 'slz'),
			'group'          => esc_html__( 'Options', 'slz' ),
		),
	);

// -------------Tab Custom Color ------------//

	$custom_css = array(
		array(
			'type'        => 'colorpicker',
			'heading'     => esc_html__( 'Block Border Color', 'slz' ),
			'param_name'  => 'block_bd_cl',
			'value'       => '',
			'description' => esc_html__( 'Choose border color for blocks.', 'slz' ),
			'dependency'  => array(
		        'element' => 'spacing_style',
		        'value'   => array('option-2', 'option-3', 'option-4')
		    ),
		    'edit_field_class' => 'vc_col-sm-6 vc_column',
			'group'       => esc_html__( 'Custom Color', 'slz' ),
		),
		array(
			'type'        => 'colorpicker',
			'heading'     => esc_html__( 'Block Border Color (hover)', 'slz' ),
			'param_name'  => 'block_bd_hv_cl',
			'value'       => '',
			'description' => esc_html__( 'Choose border color for blocks when you mouse over it.', 'slz' ),
			'dependency'  => array(
		        'element' => 'spacing_style',
		        'value'   => array('option-2', 'option-3', 'option-4')
		    ),
		    'edit_field_class' => 'vc_col-sm-6 vc_column',
			'group'       => esc_html__( 'Custom Color', 'slz' ),
		),
		array(
			'type'        => 'colorpicker',
			'heading'     => esc_html__( 'Icon Color', 'slz' ),
			'param_name'  => 'icon_cl',
			'value'       => '',
			'edit_field_class' => 'vc_col-sm-6 vc_column',
			'description' => esc_html__( 'Choose color for icon of blocks.', 'slz' ),
			'group'       => esc_html__( 'Custom Color', 'slz' ),
		),
		array(
			'type'        => 'colorpicker',
			'heading'     => esc_html__( 'Icon Color (hover)', 'slz' ),
			'param_name'  => 'icon_hv_cl',
			'value'       => '',
			'edit_field_class' => 'vc_col-sm-6 vc_column',
			'description' => esc_html__( 'Choose color for icon of blocks when you mouse over it .', 'slz' ),
			'group'       => esc_html__( 'Custom Color', 'slz' )
		),
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
	$icon_options,
	$custom_css,
	$extra_class
);