<?php
$shortcode = slz_ext( 'shortcodes' )->get_shortcode( 'posts_grid' );

$columns = array(
    esc_html__( 'One', 'slz' )      => '1',
    esc_html__( 'Two', 'slz' )      => '2',
    esc_html__( 'Three', 'slz' )    => '3',
    esc_html__( 'Four', 'slz' )     => '4'
);

// ----------------Layout---------------
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

//----------------General---------------
$general = array(
    array(
        'type'        => 'textfield',
        'heading'     => esc_html__( 'Block Title', 'slz' ),
        'param_name'  => 'block_title',
        'value'       => '',
        'description' => esc_html__( 'Block title. If it blank the block will not have a title', 'slz' )
    ),
    array(
        'type'        => 'colorpicker',
        'heading'     => esc_html__( 'Block Title Color', 'slz' ),
        'param_name'  => 'block_title_color',
        'value'       => '',
        'description' => esc_html__( 'Choose a custom title text color.', 'slz' )
    ),
    array(
        'type'        => 'dropdown',
        'heading'     => esc_html__( 'Show Excerpt', 'slz' ),
        'param_name'  => 'show_excerpt',
        'value'       => array(
            esc_html__('Show', 'slz')   =>  'show',
            esc_html__('Hide', 'slz')   =>  'hide'
        ),
        'std'         => 'show',
        'description' => esc_html__( 'Show or hide post excerpt', 'slz' )
    ),
    array(
        'type'        => 'dropdown',
        'heading'     => esc_html__( 'Show Category', 'slz' ),
        'param_name'  => 'show_category',
        'value'       => array(
            esc_html__('Show', 'slz')   =>  'show',
            esc_html__('Hide', 'slz')   =>  'hide'
        ),
        'std'         => 'show',
        'description' => esc_html__( 'Show or hide post category', 'slz' )
    ),
    array(
        'type'        => 'textfield',
        'heading'     => esc_html__( 'Excerpt Length', 'slz' ),
        'param_name'  => 'excerpt_length',
        'value'       => '15',
        'description' => esc_html__( 'Input number of excerpt length.', 'slz' ),
        'dependency' => array(
            'element' => 'show_excerpt',
            'value' => 'show',
        )
    ),
    array(
        'type'        => 'textfield',
        'heading'     => esc_html__( 'Read More Content', 'slz' ),
        'param_name'  => 'btn_read_more',
        'value'       => '',
        'description' => esc_html__( 'Enter content to display read more.', 'slz' ),
        'dependency' => array(
            'element' => 'layout',
            'value_not_equal_to' => array('layout-1')
        )
    ),
    array(
        'type'          => 'dropdown',
        'heading'       => esc_html__( 'Column', 'slz' ),
        'admin_label'   => true,
        'param_name'    => 'column',
        'value'         => $columns,
        'std'           => '3',
        'description'   => esc_html__( 'Choose number column will be displayed.', 'slz' ),
        'dependency' => array(
            'element' => 'layout',
            'value_not_equal_to' => array('layout-1')
        )
    ),
    array(
        'type'        => 'textfield',
        'heading'     => esc_html__( 'Limit Posts', 'slz' ),
        'param_name'  => 'limit_post',
        'value'       => '-1',
        'description' => esc_html__( 'The number of posts to display. If it blank the number posts will be the number from Settings -> Reading', 'slz' ),
        'dependency' => array(
            'element' => 'layout',
            'value_not_equal_to' => array('layout-1')
        )
    ),
    array(
        'type'        => 'textfield',
        'heading'     => esc_html__( 'Offset Posts', 'slz' ),
        'param_name'  => 'offset_post',
        'value'       => '',
        'description' => esc_html__( 'Enter offset to display. If you want to start on record 6, using offset 5', 'slz' )
    ),
    array(
        'type'        => 'dropdown',
        'heading'     => esc_html__( 'Pagination', 'slz' ),
        'param_name'  => 'pagination',
        'value'       => array(
            esc_html__( '-No paging-', 'slz' )          => '',
            esc_html__( 'Ajax Paging', 'slz' )          => 'ajax',
            esc_html__( 'Next Prev Paging', 'slz' )     => 'next-prev',
            esc_html__( 'Paging ( Load Page )', 'slz' ) => 'yes'
        ),
        'description' => esc_html__( 'Show pagination.', 'slz' ),
        'dependency' => array(
            'element' => 'layout',
            'value_not_equal_to' => array('layout-1')
        )
    ),
    array(
        'type'        => 'textfield',
        'heading'     => esc_html__( 'Total Posts', 'slz' ),
        'param_name'  => 'max_post',
        'value'       => '',
        'description' => esc_html__( 'Enter total posts when paging', 'slz' ),
        'dependency' => array(
            'element' => 'pagination',
            'value_not_equal_to' => array('')
        )
    ),
    array(
        'type'        => 'dropdown',
        'heading'     => esc_html__( 'Sort By', 'slz' ),
        'param_name'  => 'sort_by',
        'value'       => slz()->backend->get_param('sort_blog'),
        'description' => esc_html__( 'Choose criteria to display.', 'slz' )
    ),
    array(
        'type'        => 'textfield',
        'heading'     => esc_html__( 'Extra Class', 'slz' ),
        'param_name'  => 'extra_class',
        'value'       => '',
        'description' => esc_html__( 'Add extra class to block', 'slz' )
    )
);

$vc_options = array_merge( 
    $layouts,
    $layout_options,
    $general,
    slz()->backend->get_param('shortcode_filter'),
    slz()->backend->get_param('shortcode_ajax_filter')
);
