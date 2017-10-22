<?php
$shortcode = slz_ext( 'shortcodes' )->get_shortcode( 'main_title' );

$align = array(
	esc_html__('Left', 'slz')      => 'text-l',
	esc_html__('Center', 'slz')    => 'text-c',
	esc_html__('Right', 'slz')     => 'text-r',
);


$title_line = array(
	esc_html__('No Line', 'slz')    => '',
	esc_html__('Has Line', 'slz')   => 'has-line',
);

/*---------------layout---------------*/

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

/*----------------general param--------------*/

$params = array(
    array(
        'type'        => 'textfield',
        'admin_label' => true,
        'heading'     => esc_html__( 'Title', 'slz' ),
        'param_name'  => 'title',
        'description' => esc_html__( 'Title. If it blank the will not have a title', 'slz' )
    ),
	array(
		'type'        => 'textfield',
		'heading'     => esc_html__( 'Extra Title', 'slz' ),
		'param_name'  => 'extra_title',
		'value'       => '',
		'description' => esc_html__( 'Subtitle . If it blank will not have a extra title', 'slz' )
	),
    array(
        'type'        => 'textfield',
        'heading'     => esc_html__( 'Sub Title', 'slz' ),
        'param_name'  => 'subtitle',
        'value'       => '',
        'description' => esc_html__( 'Subtitle . If it blank will not have a subtitle', 'slz' )
    ),
	array(
		'type'        => 'dropdown',
		'heading'     => esc_html__( 'Align', 'slz' ),
		'param_name'  => 'align',
		'value'       => $align ,
		'std'         => 'left',
		'description' => esc_html__( 'Block title align', 'slz' )
	),
	array(
		'type'        => 'dropdown',
		'heading'     => esc_html__( 'Show Line?', 'slz' ),
		'param_name'  => 'title_line',
		'value'       => $title_line,
		'description' => esc_html__( 'Show/Hide line for this shortcode', 'slz' ),
	)
);

/*----------------icon--------------*/

$icon_dependency = array(
    'element' => 'show_icon',
    'value'   => array('1')
);

$icon_options = array_merge(
	array(
		array(
	        'type'        => 'dropdown',
	        'heading'     => esc_html__( 'Show Icon or Image', 'slz' ),
	        'param_name'  => 'show_icon',
	        'value'       => array(
	            esc_html__('Display None', 'slz') => '2',
	            esc_html__('Show Icon', 'slz')    => '1',
	            esc_html__('Show Image', 'slz')   => '0'
	        ),
	        'description' => esc_html__( 'Show Icon or Show Image', 'slz' ),
	        'group'       => esc_html__( 'Icon Settings', 'slz' )

   		 ),
		array(
		    'type'		  => 'attach_image',
		    'heading'     => esc_html__( 'Image', 'slz' ),
		    'param_name'  => 'image',
		    'description' => esc_html__( 'Upload your image', 'slz' ),
		    'dependency'  => array(
		        'element' => 'show_icon',
		        'value'   => '0'
		    ),
		    'group'       => esc_html__( 'Icon Settings', 'slz' )
		)
	),
	$shortcode->get_icon_library_options( $icon_dependency ,'Icon Settings')

);

/*----------------css box---------------*/

$css_box = array(
	array(
		'type'        => 'css_editor',
		'heading'     => esc_html__( 'CSS box', 'slz' ),
		'param_name'  => 'css',
		'group'       => esc_html__( 'Design Options', 'slz' )
	)
);

/*----------------custom color---------------*/

$custom_cl =  array(
	 array(
        'type'        => 'colorpicker',
        'heading'     => esc_html__( 'Title Color', 'slz' ),
        'param_name'  => 'title_cl',
        'description' => esc_html__( 'Choose a custom color for title.', 'slz' ),
        'group'       => esc_html__('Custom Color', 'slz')
    ),
    array(
		'type'        => 'colorpicker',
		'heading'     => esc_html__( 'Line Color', 'slz' ),
		'param_name'  => 'line_cl',
		'value'       => '',
		'description' => esc_html__( 'Choose color for line of blocks.', 'slz' ),
		'dependency'  => array(
		        'element' => 'title_line',
		        'value_not_equal_to' => array('')
		    ),
		'group'       => esc_html__( 'Custom Color', 'slz' ),
	),
	array(
		'type'        => 'colorpicker',
		'heading'     => esc_html__( 'Sub Title Color', 'slz' ),
		'param_name'  => 'subtitle_cl',
		'value'       => '',
		'description' => esc_html__( 'Choose a custom color for sub title.', 'slz' ),
		'group'       => esc_html__('Custom Color', 'slz')
	),
	array(
		'type'        => 'colorpicker',
		'heading'     => esc_html__( 'Extra Title Color', 'slz' ),
		'param_name'  => 'extra_title_cl',
		'value'       => '',
		'description' => esc_html__( 'Choose a custom color for extra title.', 'slz' ),
		'group'       => esc_html__('Custom Color', 'slz')
	),
	array(
		'type'        => 'colorpicker',
		'heading'     => esc_html__( 'Icon Color', 'slz' ),
		'param_name'  => 'icon_cl',
		'value'       => '',
		'dependency'  => array(
		        'element' => 'show_icon',
		        'value' => array('1')
		    ),
		'description' => esc_html__( 'Choose a custom color for icon of this main title.', 'slz' ),
		'group'       => esc_html__('Custom Color', 'slz')
	),
);

/*----------------extra class---------------*/

$extra_class = array(
	array(
		'type'        => 'textfield',
		'heading'     => esc_html__( 'Extra Class', 'slz' ),
		'param_name'  => 'extra_class',
		'value'       => '',
		'description' => esc_html__( 'Add extra class to button', 'slz' )
	)
);

$vc_options = array_merge( 
	$layout,
	$layout_option,
	$params,
	$icon_options,
	$custom_cl,
	$css_box,
	$extra_class
);