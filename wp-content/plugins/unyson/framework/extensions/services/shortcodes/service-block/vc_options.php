<?php

$shortcode = slz_ext( 'shortcodes' )->get_shortcode( 'service_block' );


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
	esc_html__( 'One', 'slz' )   => '1',
	esc_html__( 'Two', 'slz' )   => '2',
	esc_html__( 'Three', 'slz' ) => '3',
	esc_html__( 'Four', 'slz' )  => '4'
);
$align = array(
	esc_html__('Default', 'slz')   => '',
	esc_html__('Left', 'slz')      => 'text-l',
	esc_html__('Right', 'slz')     => 'text-r',
);

$title_line = array(
	esc_html__('Hide', 'slz')        => '',
	esc_html__('Underline', 'slz')   => 'underline',
);

$description     = array(
	esc_html__( 'Description meta', 'slz' ) => 'des',
	esc_html__( 'Excerpt', 'slz' )          => 'excerpt',
	esc_html__( 'None', 'slz' )             => 'none'
);

$yes_no  = array(
	esc_html__('Yes', 'slz')  => 'yes',
	esc_html__('No', 'slz')   => 'no'
);
$slider_data  = array(
	esc_html__('Yes', 'slz')         => '1',
	esc_html__('No', 'slz')	         => '0'
);

$show_icon  = array(
	esc_html__('-- None --', 'slz')          => '',
	esc_html__('Show Icon', 'slz')           => 'icon',
	esc_html__('Show Thumbnail', 'slz')      => 'image',
	esc_html__('Show Featured Images', 'slz') => 'feature-image'
);
$method = array(
	esc_html__( 'Category', 'slz' ) => 'cat',
	esc_html__( 'Service', 'slz' )  => 'service'
);
$sort_by = SLZ_Params::get('sort-other');

$args       = array('post_type' => 'slz-service');
$options    = array('empty'     => esc_html__( '-All Services-', 'slz' ) );
$services   = SLZ_Com::get_post_title2id( $args, $options );

$taxonomy   = 'slz-service-cat';
$params_cat = array('empty'   => esc_html__( '-All Service Categories-', 'slz' ) );
$categories = SLZ_Com::get_tax_options2slug( $taxonomy, $params_cat );

// ----------------layout option---------//

$layouts = array(
	array(
		'type'        => 'dropdown',
		'heading'     => esc_html__( 'Layout', 'slz' ),
		'admin_label' => true,
		'param_name'  => 'layout',
		'value'       => $shortcode->get_layouts(),
		'std'         => 'layout-1',
		'description' => esc_html__( 'Choose layout to show.', 'slz' )
	)
);

$layout_options = $shortcode->get_layout_options();

// --------------General--------------//
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
		'admin_label' => true,
		'value'       => $column_arr,
		'std'         => '',
		'description' => esc_html__( 'Select number of single block elements per row.', 'slz' )
	),
	array(
		'type'        => 'textfield',
		'heading'     => esc_html__( 'Limit Posts', 'slz' ),
		'param_name'  => 'limit_post',
		'value'       => '-1',
		'description' => esc_html__( 'Add limit posts per page. Set -1 or empty to show all.', 'slz' )
	),
	array(
		'type'        => 'textfield',
		'heading'     => esc_html__( 'Offset Posts', 'slz' ),
		'param_name'  => 'offset_post',
		'value'       => '0',
		'description' => esc_html__( 'Enter offset to pass over posts. If you want to start on record 6, using offset 5.', 'slz' )
	),
	array(
		'type'        => 'dropdown',
		'heading'     => esc_html__( 'Show Pagination', 'slz' ),
		'param_name'  => 'pagination',
		'value'       => $yes_no,
		'std'         => 'no',
		'description' => esc_html__( 'If choose Yes, block will be show pagination.', 'slz' ),
		'dependency'   => array(
			'element'  => 'show_slider',
			'value'    => array( 'no' )
		)
	),
	array(
		'type'        => 'dropdown',
		'heading'     => esc_html__( 'Sort By', 'slz' ),
		'param_name'  => 'sort_by',
		'value'       => $sort_by,
		'description' => esc_html__( 'Select order to display list posts.', 'slz' ),
	),
	array(
		'type'        => 'textfield',
		'heading'     => esc_html__( 'Extra Class', 'slz' ),
		'param_name'  => 'extra_class',
		'value'       => '',
		'description' => esc_html__( 'Add extra class to block.', 'slz' )
	),
);
// -------------Tab Option ------------//
$extra_options = array(
	array(
		'type'        => 'dropdown',
		'heading'     => esc_html__( 'Block Align', 'slz' ),
		'param_name'  => 'align',
		'value'       => $align,
		'description' => esc_html__( 'It is used for aligning the inner content of  blocks', 'slz' ),
		'dependency'  => array(
			'element' => 'layout',
			'value'   => array('layout-1', 'layout-2', 'layout-3' )
		),
		'group'       => esc_html__( 'Extra Options', 'slz' ),
	),
	array(
		'type'        => 'textfield',
		'heading'     => esc_html__( 'Button Content', 'slz' ),
		'param_name'  => 'btn_content',
		'value'       => '',
		'description' => esc_html__( 'Enter block button text.', 'slz' ),
		'group'       => esc_html__('Extra Options', 'slz')
	),
	array(
		'type'        => 'dropdown',
		'heading'     => esc_html__( 'Show Icon or Image', 'slz' ),
		'param_name'  => 'show_icon',
		'value'       => $show_icon,
		'std'         => '',
		'description' => esc_html__( 'Choose show icon or image of service.', 'slz' ),
		'group'       => esc_html__('Extra Options', 'slz')
	),
	array(
		'type'        => 'dropdown',
		'heading'     => esc_html__( 'Select Content Type', 'slz' ),
		'param_name'  => 'description',
		'value'       => $description,
		'std'         => 'excerpt',
		'description' => esc_html__( 'Choose content of service to display.', 'slz' ),
		'group'       => esc_html__('Extra Options', 'slz')
	),
	array(
		'type'        => 'dropdown',
		'heading'     => esc_html__( 'Spacing Style', 'slz' ),
		'param_name'  => 'spacing_style',
		'value'       => $spacing_style,
		'description' => esc_html__( 'Choose style for spacing bettween blocks', 'slz' ),
		'dependency'  => array(
			'element' => 'layout',
			'value'   => array('layout-1', 'layout-2', 'layout-3')
		),
		'group'       => esc_html__( 'Extra Options', 'slz' ),
	),
	
	array(
		'type'        => 'dropdown',
		'heading'     => esc_html__( 'Title Line?', 'slz' ),
		'param_name'  => 'title_line',
		'value'       => $title_line,
		'description' => esc_html__( 'Show/Hide line of title', 'slz' ),
		'group'       => esc_html__( 'Extra Options', 'slz' ),
	),
	array(
		'type'        => 'textfield',
		'heading'     => esc_html__( 'Icon Size', 'slz' ),
		'param_name'  => 'icon_size',
		'description' => esc_html__( 'Enter icon size (unit is px).', 'slz'),
		'group'       => esc_html__( 'Extra Options', 'slz' ),
		'dependency'  => array(
	        'element' => 'show_icon',
	        'value'   => array('icon')
	    ),
	),
	array(
		'type'        => 'dropdown',
		'heading'     => esc_html__( 'Using Featured Image', 'slz' ),
		'param_name'  => 'bg_image',
		'value'       => $yes_no,
		'std'         => 'no',
		'description' => esc_html__( 'Choose yes if using featured image as background when hover', 'slz' ),
		'group'       => esc_html__( 'Extra Options', 'slz' ),
	),
	
);
// -------------Filters ------------//
$filter = array(
	array(
		'type'        => 'dropdown',
		'heading'     => esc_html__( 'Display By', 'slz' ),
		'param_name'  => 'method',
		'value'       => $method,
		'description' => esc_html__( 'Choose service category or special services to display.', 'slz' ),
		'group'       => esc_html__('Filter', 'slz')
	),
	array(
		'type'        => 'param_group',
		'heading'     => esc_html__( 'Category', 'slz' ),
		'param_name'  => 'list_category',
		'params'      => array(
			array(
				'type'        => 'dropdown',
				'admin_label' => true,
				'heading'     => esc_html__( 'Add Category', 'slz' ),
				'param_name'  => 'category_slug',
				'value'       => $categories,
				'description' => esc_html__( 'Choose special category to filter.', 'slz'  )
			)
		),
		'value'       => '',
		'description' => esc_html__( 'Choose service category.', 'slz' ),
		'dependency'  => array(
			'element'     => 'method',
			'value'       => array( 'cat' )
		),
		'group'       => esc_html__('Filter', 'slz')
	),
	array(
		'type'        => 'param_group',
		'heading'     => esc_html__( 'Services', 'slz' ),
		'param_name'  => 'list_post',
		'params'      => array(
			array(
				'type'        => 'dropdown',
				'admin_label' => true,
				'heading'     => esc_html__( 'Add service', 'slz' ),
				'param_name'  => 'post',
				'value'       => $services,
				'description' => esc_html__( 'Choose special service to show.',  'slz'  )
			)
		),
		'value'       => '',
		'dependency'  => array(
			'element'     => 'method',
			'value'       => array( 'service' )
		),
		'description' => esc_html__( 'Default display all services if no service is selected.', 'slz' ),
		'group'       => esc_html__('Filter', 'slz')
	),
);
// -------------Custom Color------------//
$color_options = array(
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
		'dependency'  => array(
	        'element' => 'show_icon',
	        'value'   => array('icon')
	    ),
	),
	array(
		'type'        => 'colorpicker',
		'heading'     => esc_html__( 'Icon Color (hover)', 'slz' ),
		'param_name'  => 'icon_hv_cl',
		'value'       => '',
		'edit_field_class' => 'vc_col-sm-6 vc_column',
		'description' => esc_html__( 'Choose color for icon of blocks when you mouse over it .', 'slz' ),
		'group'       => esc_html__( 'Custom Color', 'slz' ),
		'dependency'  => array(
	        'element' => 'show_icon',
	        'value'   => array('icon')
	    ),
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
	),
	array(
		'type'        => 'colorpicker',
		'heading'     => esc_html__( 'Button Color', 'slz' ),
		'param_name'  => 'btn_cl',
		'value'       => '',
		'description' => esc_html__( 'Choose color for block button.', 'slz' ),
		'edit_field_class' => 'vc_col-sm-6 vc_column',
		'group'       => esc_html__('Custom Color', 'slz')
	),
	array(
		'type'        => 'colorpicker',
		'heading'     => esc_html__( 'Button Hover Color', 'slz' ),
		'param_name'  => 'btn_hv_cl',
		'value'       => '',
		'description' => esc_html__( 'Choose hover color for block button.', 'slz' ),
		'edit_field_class' => 'vc_col-sm-6 vc_column',
		'group'       => esc_html__('Custom Color', 'slz')
	),
	array(
		'type'        => 'colorpicker',
		'heading'     => esc_html__( 'Button Background Color', 'slz' ),
		'param_name'  => 'btn_bg_cl',
		'value'       => '',
		'description' => esc_html__( 'Choose background color for block button.', 'slz' ),
		'edit_field_class' => 'vc_col-sm-6 vc_column',
		'group'       => esc_html__('Custom Color', 'slz')
	),
	array(
		'type'        => 'colorpicker',
		'heading'     => esc_html__( 'Button Background Hover Color', 'slz' ),
		'param_name'  => 'btn_bg_hv_cl',
		'value'       => '',
		'description' => esc_html__( 'Choose background hover color for block button.', 'slz' ),
		'edit_field_class' => 'vc_col-sm-6 vc_column',
		'group'       => esc_html__('Custom Color', 'slz')
	),
	array(
		'type'        => 'colorpicker',
		'heading'     => esc_html__( 'Block Background Color', 'slz' ),
		'param_name'  => 'block_bg_cl',
		'value'       => '',
		'description' => esc_html__( 'Choose background color for blocks.', 'slz' ),
		'edit_field_class' => 'vc_col-sm-6 vc_column',
		'group'       => esc_html__('Custom Color', 'slz')
	),
	array(
		'type'        => 'colorpicker',
		'heading'     => esc_html__( 'Block Background Color (hover)', 'slz' ),
		'param_name'  => 'block_bg_hv_cl',
		'value'       => '',
		'description' => esc_html__( 'Choose background color for blocks when you mouse over it.', 'slz' ),
		'edit_field_class' => 'vc_col-sm-6 vc_column',
		'group'       => esc_html__('Custom Color', 'slz')
	),
);
// -------------Slider Options ------------//
$slider_options = array(
	array(
		'type'        	  => 'dropdown',
		'heading'     	  => esc_html__( 'Show Slider', 'slz' ),
		'param_name'  	  => 'show_slider',
		'value'       	  => $yes_no,
		'std'      		  => 'no',
		'description' 	  => esc_html__( 'If choose Yes, block will be display with slider style.', 'slz'),
		'group'           => esc_html__('Slide Options', 'slz')
	),
	array(
		'type'          => 'textfield',
		'heading'       => esc_html__( 'Slide To Show', 'slz' ),
		'param_name'    => 'slide_to_show',
		'value'         => '3',
		'description'   => esc_html__( 'Enter number of items to show.', 'slz' ),
		'dependency'    => array(
			'element'   => 'show_slider',
			'value'     => array( 'yes' )
		),
		'group'         => esc_html__('Slide Options', 'slz')
	),
	array(
		'type'        	=> 'dropdown',
		'heading'     	=> esc_html__( 'Auto Play', 'slz' ),
		'param_name'  	=> 'slide_autoplay',
		'value'       	=> $slider_data,
		'std'      		=> '1',
		'description' 	=> esc_html__( 'Choose YES to slide auto play.', 'slz' ),
		'dependency'    => array(
			'element'   => 'show_slider',
			'value'     => array( 'yes' )
		),
		'group'         => esc_html__('Slide Options', 'slz')
	),
	array(
		'type'        	=> 'dropdown',
		'heading'     	=> esc_html__( 'Show Dots Navigation', 'slz' ),
		'param_name'  	=> 'slide_dots',
		'value'       	=> $slider_data,
		'std'      		=> '1',
		'description' 	=> esc_html__( 'Choose YES to show dot navigation.', 'slz' ),
		'dependency'    => array(
			'element'   => 'show_slider',
			'value'     => array( 'yes' )
		),
		'group'         => esc_html__('Slide Options', 'slz')
	),
	array(
		'type'        	=> 'dropdown',
		'heading'     	=> esc_html__( 'Show Arrows Navigation', 'slz' ),
		'param_name'  	=> 'slide_arrows',
		'value'       	=> $slider_data,
		'std'      		=> '1',
		'description' 	=> esc_html__( 'Choose YES to show arrow navigation.', 'slz' ),
		'dependency'    => array(
			'element'   => 'show_slider',
			'value'     => array( 'yes' )
		),
		'group'         => esc_html__('Slide Options', 'slz')
	),
	array(
		'type'        	=> 'dropdown',
		'heading'     	=> esc_html__( 'Loop Infinite', 'slz' ),
		'param_name'  	=> 'slide_infinite',
		'value'       	=> $slider_data,
		'std'      		=> '1',
		'description' 	=> esc_html__( 'Choose YES to slide loop infinite.', 'slz' ),
		'dependency'    => array(
			'element'   => 'show_slider',
			'value'     => array( 'yes' )
		),
		'group'         => esc_html__('Slide Options', 'slz')
	),
	array(
		'type'          => 'textfield',
		'heading'       => esc_html__( 'Speed Slide', 'slz' ),
		'param_name'    => 'slide_speed',
		'value'			=> '600',
		'description'   => esc_html__( 'Enter number value. Unit is millisecond. Example: 600.', 'slz' ),
		'dependency'    => array(
			'element'   => 'show_slider',
			'value'     => array( 'yes' )
		),
		'group'         => esc_html__('Slide Options', 'slz')
	),
	array(
		'type'          => 'colorpicker',
		'heading'       => esc_html__( 'Slide Arrow Color', 'slz' ),
		'param_name'    => 'color_slide_arrow',
		'value'         => '',
		'description'   => esc_html__( 'Choose color slide arrow for slide.', 'slz' ),
		'dependency'    => array(
			'element'   => 'slide_arrows',
			'value'     => array( '1' )
		),
		'group'         => esc_html__('Slide Options', 'slz')
	),
	array(
		'type'          => 'colorpicker',
		'heading'       => esc_html__( 'Slide Arrow Hover Color', 'slz' ),
		'param_name'    => 'color_slide_arrow_hv',
		'value'         => '',
		'description'   => esc_html__( 'Choose color slide arrow for slide when hover.', 'slz' ),
		'dependency'    => array(
			'element'   => 'slide_arrows',
			'value'     => array( '1' )
		),
		'group'         => esc_html__('Slide Options', 'slz')
	),
	array(
		'type'          => 'colorpicker',
		'heading'       => esc_html__( 'Slide Arrow Background Color', 'slz' ),
		'param_name'    => 'color_slide_arrow_bg',
		'value'         => '',
		'description'   => esc_html__( 'Choose background color slide arrow for slide.', 'slz' ),
		'dependency'    => array(
			'element'   => 'slide_arrows',
			'value'     => array( '1' )
		),
		'group'         => esc_html__('Slide Options', 'slz')
	),
	array(
		'type'          => 'colorpicker',
		'heading'       => esc_html__( 'Slide Arrow Background Hover Color', 'slz' ),
		'param_name'    => 'color_slide_arrow_bg_hv',
		'value'         => '',
		'description'   => esc_html__( 'Choose background color slide arrow for slide when hover.', 'slz' ),
		'dependency'    => array(
			'element'   => 'slide_arrows',
			'value'     => array( '1' )
		),
		'group'         => esc_html__('Slide Options', 'slz')
	),
	array(
		'type'          => 'colorpicker',
		'heading'       => esc_html__( 'Slide Dots Color', 'slz' ),
		'param_name'    => 'color_slide_dots',
		'value'         => '',
		'description'   => esc_html__( 'Choose color slide dots for slide.', 'slz' ),
		'dependency'    => array(
			'element'   => 'slide_dots',
			'value'     => array( '1' )
		),
		'group'         => esc_html__('Slide Options', 'slz')
	)
);

$vc_options = array_merge( 
	$layouts,
	$filter,
	$extra_options,
	$color_options,
	$slider_options,
	$layout_options,
	$general
);
