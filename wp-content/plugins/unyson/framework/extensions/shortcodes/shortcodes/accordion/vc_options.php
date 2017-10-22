<?php if ( ! defined( 'ABSPATH' ) ) { die( 'Forbidden' ); }

$shortcode = slz_ext( 'shortcodes' )->get_shortcode( 'accordion' );

$postion_arr = array(
	esc_html__( 'Right', 'slz' ) => 'right',
	esc_html__( 'Left', 'slz' ) => 'left',
);

$option_show = array(
	esc_html__('Small Spacing', 'slz')    => 'option-1',
	esc_html__('Large Spacing', 'slz')    => 'option-2',
	esc_html__('No Spacing', 'slz')    	  => 'option-3',
);

$general_tab = array(
	array(
		'type'        => 'dropdown',
		'heading'     => esc_html__( 'Layout', 'slz' ),
		'param_name'  => 'icon',
		'admin_label' => true,
		'value'       => $shortcode->get_layouts(),
		'std'         => 'plus',
		'description' => esc_html__( 'Please choose layout to show', 'slz' )
	),
	array(
		'type'        => 'dropdown',
		'heading'     => esc_html__( 'Option Show', 'slz' ),
		'param_name'  => 'option_show',
		'value'       => $option_show,
		'description' => esc_html__( 'It is used for aligning the inner content of  accordion item', 'slz' ),
	),
	array(
		'type'        => 'dropdown',
		'heading'     => esc_html__( 'Position of Dropdown Icon', 'slz' ),
		'param_name'  => 'icon_position',
		'value'       => $postion_arr,
		'std'         => 'right',
		'description' => esc_html__( 'Please choose postion of dropdown icon', 'slz' )
	),
	array(
		'type'        => 'textfield',
		'heading'     => esc_html__( 'Extra Class', 'slz' ),
		'param_name'  => 'extra_class',
		'value'       => '',
		'description' => esc_html__( 'Add extra class to block', 'slz' )
	)
);

$param_content = array(
	array(
		'type'        => 'textfield',
		'heading'     => esc_html__( 'Title', 'slz' ),
		'param_name'  => 'title',
		'admin_label' => true,
		'value'       => '',
		'description' => esc_html__( 'Title. If it blank the block will not have a title', 'slz' )
	),
	array(
		'type'        => 'textarea',
		'heading'     => esc_html__( 'Content', 'slz' ),
		'param_name'  => 'content',
		'value'       => '',
		'description' => esc_html__( 'Description. If it blank the block will not have a title', 'slz' )
	),

);

$param_content = array_merge( $param_content, $shortcode->get_icon_library_options() );

$content_tab = array(
	array(
		'type'       => 'param_group',
		'heading'    => esc_html__( 'Accordion Lists', 'slz' ),
		'param_name' => 'accordion_list',
		'params'     => $param_content,
		'value'       => '',
		'group'       => 'Content'
	),
);

$custom_tab  = array(
    array(
        'type'        => 'colorpicker',
        'heading'     => esc_html__( 'Title Color', 'slz' ),
        'param_name'  => 'title_color',
        'value'       => '',
        'description' => esc_html__( 'Choose a custom title text color.', 'slz' ),
        'group'       => esc_html__( 'Custom CSS', 'slz' )
    ),
    array(
        'type'        => 'colorpicker',
        'heading'     => esc_html__( 'Content Color', 'slz' ),
        'param_name'  => 'content_color',
        'value'       => '',
        'description' => esc_html__( 'Choose a custom content text color.', 'slz' ),
        'group'       => esc_html__( 'Custom CSS', 'slz' )
    ),
    array(
        'type'        => 'colorpicker',
        'heading'     => esc_html__( 'Content Background Color', 'slz' ),
        'param_name'  => 'content_bg_color',
        'value'       => '',
        'description' => esc_html__( 'Choose a custom content background color.', 'slz' ),
        'group'       => esc_html__( 'Custom CSS', 'slz' )
    ),
	array(
		'type'        => 'colorpicker',
		'heading'     => esc_html__( 'Panel Color', 'slz' ),
		'param_name'  => 'panel_background_color',
		'value'       => '',
		'description' => esc_html__( 'Choose a custom panel background color.', 'slz' ),
		'group'       => esc_html__( 'Custom CSS', 'slz' )
	),
	array(
		'type'        => 'colorpicker',
		'heading'     => esc_html__( 'Panel Active Color', 'slz' ),
		'param_name'  => 'panel_active_background_color',
		'value'       => '',
		'description' => esc_html__( 'Choose a custom panel active background color.', 'slz' ),
		'group'       => esc_html__( 'Custom CSS', 'slz' )
	),
    array(
        'type'        => 'colorpicker',
        'heading'     => esc_html__( 'Icon Color', 'slz' ),
        'param_name'  => 'icon_color',
        'value'       => '',
        'description' => esc_html__( 'Choose a custom icon color.', 'slz' ),
        'group'       => esc_html__( 'Custom CSS', 'slz' )
    ),
	array(
		'type'        => 'colorpicker',
		'heading'     => esc_html__( 'Icon Color Active', 'slz' ),
		'param_name'  => 'icon_color_active',
		'value'       => '',
		'description' => esc_html__( 'Choose a custom icon color active.', 'slz' ),
		'group'       => esc_html__( 'Custom CSS', 'slz' )
	),
    array(
        'type'        => 'colorpicker',
        'heading'     => esc_html__( 'Icon Background Color', 'slz' ),
        'param_name'  => 'icon_bg_color',
        'value'       => '',
        'description' => esc_html__( 'Choose a custom icon background color.', 'slz' ),
        'group'       => esc_html__( 'Custom CSS', 'slz' )
    ),
	array(
		'type'        => 'colorpicker',
		'heading'     => esc_html__( 'Icon Background Color Active', 'slz' ),
		'param_name'  => 'icon_bg_color_active',
		'value'       => '',
		'description' => esc_html__( 'Choose a custom icon background color active.', 'slz' ),
		'group'       => esc_html__( 'Custom CSS', 'slz' )
	),
);

$vc_options = array_merge(
	$general_tab,
	$content_tab,
	$custom_tab
);
