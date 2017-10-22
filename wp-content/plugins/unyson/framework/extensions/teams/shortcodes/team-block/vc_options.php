<?php
$sort_by = SLZ_Params::get('sort-other');
$yes_no  = array(
	esc_html__('Yes', 'slz')         => 'yes',
	esc_html__('No', 'slz')	         => 'no'
);
$method = array(
	esc_html__( 'Category', 'slz' )  => 'cat',
	esc_html__( 'Team', 'slz' )      => 'team'
);
$slider_data  = array(
	esc_html__('Yes', 'slz')         => '1',
	esc_html__('No', 'slz')	         => '0'
);

$args = array('post_type'     => 'slz-team');
$options = array('empty'      => esc_html__( '-All Team-', 'slz' ) );
$teams = SLZ_Com::get_post_title2id( $args, $options );

$taxonomy = 'slz-team-cat';
$params_cat = array('empty'   => esc_html__( '-All Team Categories-', 'slz' ) );
$team_cat = SLZ_Com::get_tax_options2slug( $taxonomy, $params_cat );

$columns = array(
	esc_html__( 'One', 'slz' )      => '1',
	esc_html__( 'Two', 'slz' )      => '2',
	esc_html__( 'Three', 'slz' )    => '3',
	esc_html__( 'Four', 'slz' )     => '4'
);
$option_show = array(
	esc_html__('Normal', 'slz')      => 'normal',
	esc_html__('Option 1', 'slz')    => 'option-1',
	esc_html__('Option 2', 'slz')    => 'option-2',
);
$shortcode = slz_ext( 'shortcodes' )->get_shortcode( 'team_block' );

$layouts = array(
	array(
		'type'          => 'dropdown',
		'heading'       => esc_html__( 'Layout', 'slz' ),
		'admin_label'   => true,
		'param_name'    => 'layout',
		'value'         => $shortcode->get_layouts(),
		'std'           => 'layout-1',
		'description'   => esc_html__( 'Choose layout will be displayed.', 'slz' )
	)
);

$layout_options = $shortcode->get_layout_options();

$filters =  array(
	
	array(
		'type'          => 'dropdown',
		'heading'       => esc_html__( 'Display By', 'slz' ),
		'param_name'    => 'method',
		'value'         => $method,
		'description'   => esc_html__( 'Choose team category or special teams to display', 'slz' ),
		'group'         => esc_html__('Filter', 'slz')
	),
	array(
		'type'          => 'param_group',
		'heading'       => esc_html__( 'Category', 'slz' ),
		'param_name'    => 'list_category',
		'params'        => array(
			array(
				'type'        => 'dropdown',
				'admin_label' => true,
				'heading'     => esc_html__( 'Add Category', 'slz' ),
				'param_name'  => 'category_slug',
				'value'       => $team_cat,
				'description' => esc_html__( 'Choose special category to filter', 'slz'  )
			)
		),
		'value'         => '',
		'description'   => esc_html__( 'Choose Team Category.', 'slz' ),
		'dependency'    => array(
			'element'   => 'method',
			'value'     => array( 'cat' )
		),
		'group'         => esc_html__('Filter', 'slz')
	),
	array(
		'type'          => 'param_group',
		'heading'       => esc_html__( 'Teams', 'slz' ),
		'param_name'    => 'list_post',
		'params'        => array(
			array(
				'type'        => 'dropdown',
				'admin_label' => true,
				'heading'     => esc_html__( 'Add Team', 'slz' ),
				'param_name'  => 'post',
				'value'       => $teams,
				'description' => esc_html__( 'Choose special team to show',  'slz'  )
			)
		),
		'value'         => '',
		'description'   => esc_html__( 'Default display All Team if no team is selected and Number team is empty.', 'slz' ),
		'dependency'    => array(
			'element'   => 'method',
			'value'     => array( 'team' )
		),
		'group'         => esc_html__('Filter', 'slz')
	)
);

$params_options = array(
	array(
		'type'          => 'textfield',
		'heading'       => esc_html__( 'Button Content', 'slz' ),
		'param_name'    => 'btn_content',
		'value'         => '',
		'description'   => esc_html__( 'Enter content to display button.', 'slz' ),
		'group'         => esc_html__('Extra Options', 'slz'),
	),
	array(
		'type'          => 'dropdown',
		'heading'       => esc_html__( 'Show Thumbnail', 'slz' ),
		'param_name'    => 'show_thumbnail',
		'value'         => $yes_no,
		'std'      	    => 'yes',
		'description'   => esc_html__( 'If choose Yes, block will be show thumbnail image.', 'slz' ),
		'group'         => esc_html__('Extra Options', 'slz'),
	),
	array(
		'type'          => 'dropdown',
		'heading'       => esc_html__( 'Show Position', 'slz' ),
		'param_name'    => 'show_position',
		'value'         => $yes_no,
		'std'      	    => 'yes',
		'description'   => esc_html__( 'If choose Yes, block will be show position.', 'slz' ),
		'group'         => esc_html__('Extra Options', 'slz'),
	),
	array(
		'type'          => 'dropdown',
		'heading'       => esc_html__( 'Show Contact Info', 'slz' ),
		'param_name'    => 'show_contact_info',
		'value'         => $yes_no,
		'std'      	    => 'no',
		'description'   => esc_html__( 'If choose Yes, block will show contact info.', 'slz' ),
		'group'         => esc_html__('Extra Options', 'slz'),
	),
	array(
		'type'          => 'dropdown',
		'heading'       => esc_html__( 'Show Social', 'slz' ),
		'param_name'    => 'show_social',
		'value'         => $yes_no,
		'std'      	    => 'yes',
		'description'   => esc_html__( 'If choose Yes, block will be show social.', 'slz' ),
		'group'         => esc_html__('Extra Options', 'slz'),
	),
	array(
		'type'          => 'dropdown',
		'heading'       => esc_html__( 'Show Description', 'slz' ),
		'param_name'    => 'show_description',
		'value'         => $yes_no,
		'std'           => 'yes',
		'description'   => esc_html__( 'If choose Yes, block will be show description.', 'slz' ),
		'group'         => esc_html__('Extra Options', 'slz'),
	),
	array(
		'type'          => 'textfield',
		'heading'       => esc_html__( 'Description Length', 'slz' ),
		'param_name'    => 'description_lenghth',
		'description'   => esc_html__( 'Limit words to display.', 'slz' ),
		'dependency'    => array(
			'element'   => 'show_description',
			'value'     => array( 'yes' )
		),
		'group'         => esc_html__('Extra Options', 'slz'),
	),
);

$params_color = array(
	array(
		'type'          => 'colorpicker',
		'heading'       => esc_html__( 'Title Color', 'slz' ),
		'param_name'    => 'color_title',
		'value'         => '',
		'description'   => esc_html__( 'Choose color title for block.', 'slz' ),
		'group'         => esc_html__('Color Options', 'slz')
	),
	array(
		'type'          => 'colorpicker',
		'heading'       => esc_html__( 'Title Hover Color', 'slz' ),
		'param_name'    => 'color_title_hv',
		'value'         => '',
		'description'   => esc_html__( 'Choose color title for block when hover.', 'slz' ),
		'group'         => esc_html__('Color Options', 'slz')
	),
	array(
		'type'          => 'colorpicker',
		'heading'       => esc_html__( 'Position Color', 'slz' ),
		'param_name'    => 'color_position',
		'value'         => '',
		'description'   => esc_html__( 'Choose color position for block.', 'slz' ),
		'group'         => esc_html__('Color Options', 'slz')
	),
	array(
		'type'          => 'colorpicker',
		'heading'       => esc_html__( 'Info Color', 'slz' ),
		'param_name'    => 'color_info',
		'value'         => '',
		'description'   => esc_html__( 'Choose color for contact info.', 'slz' ),
		'group'         => esc_html__('Color Options', 'slz')
	),
	array(
		'type'          => 'colorpicker',
		'heading'       => esc_html__( 'Info Hover Color', 'slz' ),
		'param_name'    => 'color_hv_info',
		'value'         => '',
		'description'   => esc_html__( 'Choose hover color for contact info.', 'slz' ),
		'group'         => esc_html__('Color Options', 'slz')
	),
	array(
		'type'          => 'colorpicker',
		'heading'       => esc_html__( 'Description Color', 'slz' ),
		'param_name'    => 'color_description',
		'value'         => '',
		'description'   => esc_html__( 'Choose color description for block.', 'slz' ),
		'group'         => esc_html__('Color Options', 'slz')
	),
	array(
		'type'          => 'colorpicker',
		'heading'       => esc_html__( 'Social Color', 'slz' ),
		'param_name'    => 'color_social',
		'value'         => '',
		'description'   => esc_html__( 'Choose color social for block.', 'slz' ),
		'group'         => esc_html__('Color Options', 'slz')
	),
	array(
		'type'          => 'colorpicker',
		'heading'       => esc_html__( 'Social Hover Color', 'slz' ),
		'param_name'    => 'color_social_hv',
		'value'         => '',
		'description'   => esc_html__( 'Choose color social for block when hover.', 'slz' ),
		'group'         => esc_html__('Color Options', 'slz')
	)
);
$general = array(
	array(
		'type'        => 'dropdown',
		'heading'     => esc_html__( 'Option Show', 'slz' ),
		'param_name'  => 'option_show',
		'value'       => $option_show,
		'description' => esc_html__( 'It is used for aligning the inner content of  blocks', 'slz' ),
		'dependency'  => array(
			'element' => 'layout',
			'value'   => array('layout-2')
		)
	),
	array(
		'type'          => 'dropdown',
		'heading'       => esc_html__( 'Column', 'slz' ),
		'admin_label'   => true,
		'param_name'    => 'column',
		'value'         => $columns,
		'std'           => '3',
		'description'   => esc_html__( 'Choose number column will be displayed.', 'slz' )
	),
	array(
		'type'          => 'textfield',
		'heading'       => esc_html__( 'Limit Posts', 'slz' ),
		'param_name'    => 'limit_post',
		'value'         => '-1',
		'description'   => esc_html__( 'Add limit posts per page. Set -1 or empty to show all. The number of posts to display. If it blank the number posts will be the number from Settings -> Reading', 'slz' )
	),
	array(
		'type'          => 'textfield',
		'heading'       => esc_html__( 'Offset Post', 'slz' ),
		'param_name'    => 'offset_post',
		'value'         => '',
		'description'   => esc_html__( 'Enter offset to pass over posts. If you want to start on record 6, using offset 5', 'slz' )
	),
	array(
		'type'          => 'dropdown',
		'heading'       => esc_html__( 'Show Pagination ?', 'slz' ),
		'param_name'    => 'pagination',
		'value'         => $yes_no,
		'std'           => 'no',
		'description'   => esc_html__( 'If choose Yes, block will be show pagination.', 'slz' ),
	),
	array(
		'type'          => 'textfield',
		'heading'       => esc_html__( 'Max Posts', 'slz' ),
		'param_name'    => 'max_post',
		'value'         => '',
		'description'   => esc_html__( 'Add total posts when paging.', 'slz' ),
		'dependency'    => array(
			'element'   => 'pagination',
			'value'     => array( 'yes' )
		)
	),
	array(
		'type'          => 'dropdown',
		'heading'       => esc_html__( 'Sort By', 'slz' ),
		'param_name'    => 'sort_by',
		'value'         => $sort_by,
		'description'   => esc_html__( 'Select order to display list of teams.', 'slz' )
	),
	array(
		'type'          => 'textfield',
		'heading'       => esc_html__( 'Extra Class', 'slz' ),
		'param_name'    => 'extra_class',
		'value'         => '',
		'description'   => esc_html__( 'Add extra class to block', 'slz' )
	),
);
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
	$layout_options,
	$filters,
	$params_options,
	$params_color,
	$slider_options,
	$general
);
