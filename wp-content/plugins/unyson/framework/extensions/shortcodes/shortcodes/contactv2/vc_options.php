<?php
$shortcode = slz_ext( 'shortcodes' )->get_shortcode( 'contactv2' );

$column = array(
    esc_html__( 'One', 'slz' )   => '1',
    esc_html__( 'Two', 'slz' )   => '2',
    esc_html__( 'Three', 'slz' ) => '3',
    esc_html__( 'Four', 'slz' )  => '4'
);

$yes_no = array(
    esc_html__( 'No', 'slz' )   => 'no',
    esc_html__( 'Yes', 'slz' )   => 'yes',
);

$style = array(
    esc_html__('Florida', 'slz')     => 'st-florida',
    esc_html__('California', 'slz')  => 'st-california'
);

$param_info = array(

            );

$param_sub_info = array(
                array(
                    'type'           => 'textarea',
                    'heading'        => esc_html__( 'Title', 'slz' ),
                    'param_name'     => 'sub_info',
                	'admin_label'    => true,
                    'description'    => esc_html__( 'Enter title for sub information', 'slz' )
                )
            );

$icon_options = $shortcode->get_icon_library_options();

$params = array(
    array(
        'type'        => 'dropdown',
        'heading'     => esc_html__( 'Style', 'slz' ),
        'admin_label' => true,
        'param_name'  => 'layout-1-style',
        'value'       => $style,
        'description' => esc_html__( 'Select style for blocks', 'slz' )
    ),
    array(
        'type'            => 'dropdown',
        'heading'         => esc_html__( 'Column', 'slz' ),
        'param_name'      => 'column',
        'value'           => $column,
        'std'             => '3',
        'description'     => esc_html__( 'Choose number of column for this contact.', 'slz' )
    ),
	array(
		'type'            => 'param_group',
		'heading'         => esc_html__( 'Add Contact Info', 'slz' ),
		'param_name'      => 'array_info',
		'params'          => array_merge(
            $icon_options,
            array(

                array(
                    'type'           => 'dropdown',
                    'heading'        => esc_html__( 'Is active ?', 'slz' ),
                    'param_name'     => 'active',
                    'value'          => $yes_no,
                    'admin_label'    => true,
                    'description'    => esc_html__( 'Is block active ?', 'slz' )
                ),
                array(
                    'type'           => 'textarea',
                    'heading'        => esc_html__( 'Title', 'slz' ),
                    'param_name'     => 'title',
                    'admin_label'    => true,
                    'description'    => esc_html__( 'Enter title for main information.', 'slz' )
                ),
                array(
                    'type'            => 'param_group',
                    'heading'         => esc_html__( 'Sub Information', 'slz' ),
                    'param_name'      => 'array_sub_info_item',
                    'params'          => array_merge( $param_sub_info, $icon_options )
                ),
            )
		)
	),
    array(
        'type'        => 'textfield',
        'heading'     => esc_html__( 'Extra Class', 'slz' ),
        'param_name'  => 'extra_class',
        'value'       => '',
        'description' => esc_html__( 'Add extra class for block', 'slz' )
    ),
    array(
        'type'            => 'colorpicker',
        'heading'         => esc_html__( 'Main Icon Color', 'slz' ),
        'param_name'      => 'main_icon_color',
        'value'           => '',
        'group'           => esc_html__( 'Custom Css', 'slz'),
        'description'     => esc_html__( 'Select color for main icon.', 'slz' )
    ),
    array(
        'type'            => 'colorpicker',
        'heading'         => esc_html__( 'Main Icon Hover Color', 'slz' ),
        'param_name'      => 'main_icon_hv_color',
        'value'           => '',
        'group'           => esc_html__( 'Custom Css', 'slz'),
        'description'     => esc_html__( 'Select color for main icon when hover.', 'slz' )
    ),
    array(
        'type'            => 'colorpicker',
        'heading'         => esc_html__( 'Main Icon Background Color', 'slz' ),
        'param_name'      => 'main_ic_bg_color',
        'value'           => '',
        'group'           => esc_html__( 'Custom Css', 'slz'),
        'dependency'      => array(
                'element'     => 'layout-1-style',
                'value'       => 'st-california'
            ),
        'description'     => esc_html__( 'Select background color for main icon.', 'slz' )
    ),
    array(
        'type'            => 'colorpicker',
        'heading'         => esc_html__( 'Main Icon Background Hover Color', 'slz' ),
        'param_name'      => 'main_ic_bg_hv_color',
        'value'           => '',
        'group'           => esc_html__( 'Custom Css', 'slz'),
        'dependency'      => array(
                'element'     => 'layout-1-style',
                'value'       => 'st-california'
            ),
        'description'     => esc_html__( 'Select background color for main icon when hover.', 'slz' )
    ),
	array(
		'type'            => 'colorpicker',
		'heading'         => esc_html__( 'Title Color', 'slz' ),
		'param_name'      => 'title_color',
		'value'           => '',
		'group'           => esc_html__( 'Custom Css', 'slz'),
		'description'     => esc_html__( 'Select color for main information.', 'slz' )
	),
	array(
		'type'            => 'colorpicker',
		'heading'         => esc_html__( 'Sub Info Color', 'slz' ),
		'param_name'      => 'info_color',
		'value'           => '',
		'group'           => esc_html__( 'Custom Css', 'slz'),
		'description'     => esc_html__( 'Select color for sub information.', 'slz' )
	),
    array(
        'type'            => 'colorpicker',
        'heading'         => esc_html__( 'Sub Info Hover Color', 'slz' ),
        'param_name'      => 'info_hv_color',
        'value'           => '',
        'group'           => esc_html__( 'Custom Css', 'slz'),
        'description'     => esc_html__( 'Select color for sub information when hover.', 'slz' )
    ),
    array(
        'type'            => 'colorpicker',
        'heading'         => esc_html__( 'Sub Info Icon Color', 'slz' ),
        'param_name'      => 'sub_icon_color',
        'value'           => '',
        'group'           => esc_html__( 'Custom Css', 'slz'),
        'description'     => esc_html__( 'Select color for sub information icon.', 'slz' )
    ),
    array(
        'type'            => 'colorpicker',
        'heading'         => esc_html__( 'Sub Info Icon Hover Color', 'slz' ),
        'param_name'      => 'sub_icon_hv_color',
        'value'           => '',
        'group'           => esc_html__( 'Custom Css', 'slz'),
        'description'     => esc_html__( 'Select color for sub information icon when hover.', 'slz' )
    ),
	array(
		'type'            => 'colorpicker',
		'heading'         => esc_html__( 'Line Separator Color', 'slz' ),
		'param_name'      => 'border_color',
		'value'           => '',
		'group'           => esc_html__( 'Custom Css', 'slz'),
		'description'     => esc_html__( 'Select color for vertical separator between items..', 'slz' )
	),
	array(
		'type'            => 'colorpicker',
		'heading'         => esc_html__( 'Block Background Color', 'slz' ),
		'param_name'      => 'bg_color',
		'value'           => '',
		'group'           => esc_html__( 'Custom Css', 'slz'),
		'description'     => esc_html__( 'Select background color for block.', 'slz' )
	),
    array(
        'type'            => 'colorpicker',
        'heading'         => esc_html__( 'Block Background Hover Color', 'slz' ),
        'param_name'      => 'bg_hv_color',
        'value'           => '',
        'group'           => esc_html__( 'Custom Css', 'slz'),
        'description'     => esc_html__( 'Select background color for block when hover.', 'slz' )
    ),
    array(
        'type'            => 'colorpicker',
        'heading'         => esc_html__( 'Block Border Color', 'slz' ),
        'param_name'      => 'bd_color',
        'value'           => '',
        'dependency'      => array(
            'element'     => 'layout-1-style',
            'value_not_equal_to'       => 'st-florida'
        ),
        'group'           => esc_html__( 'Custom Css', 'slz'),
        'description'     => esc_html__( 'Select border color for block.', 'slz' )
    ),
    array(
        'type'            => 'colorpicker',
        'heading'         => esc_html__( 'Block Border Hover Color', 'slz' ),
        'param_name'      => 'bd_hv_color',
        'value'           => '',
        'dependency'      => array(
            'element'     => 'layout-1-style',
            'value_not_equal_to'       => 'st-florida'
        ),
        'group'           => esc_html__( 'Custom Css', 'slz'),
        'description'     => esc_html__( 'Select border color for block when hover.', 'slz' )
    )
);

$vc_options = array_merge(
	$params
);