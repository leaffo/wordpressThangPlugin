<?php
$shortcode = slz_ext( 'shortcodes' )->get_shortcode( 'pricing_box' );

$column = array(
	esc_html__( 'One', 'slz' )    => '1',
	esc_html__( 'Two', 'slz' )    => '2',
	esc_html__( 'Three', 'slz' )  => '3',
	esc_html__( 'Four', 'slz' )   => '4',
);

$yes_no = array(
	esc_html__( 'No', 'slz' )     => 'no',
	esc_html__( 'Yes', 'slz' )    => 'yes',
);

$icon_type = array(
    esc_html__( 'Icon Type', 'slz' )     => '1',
    esc_html__( 'Image Type', 'slz' )    => '2',
);

/*-------------layout-------------*/

$layout = array(
	array(
	'type'        => 'dropdown',
	'heading'     => esc_html__( 'Layout', 'slz' ),
	'admin_label'   => true,
	'param_name'  => 'layout',
	'value'       => $shortcode->get_layouts(),
	'description' => esc_html__( 'Choose layout to show', 'slz' )
	)
);

$layout_option = $shortcode->get_layout_options();

$params = array(
	array(
		'type'        => 'dropdown',
		'heading'     => esc_html__( 'Number of Pricing Box', 'slz' ),
		'param_name'  => 'column',
		'admin_label' => true,
		'std'         => '1',
		'value'       => $column,
		'description' => esc_html__( 'Choose number of pricing box to display', 'slz' )
	),
	array(
		'type'        => 'textfield',
		'heading'     => esc_html__( 'Extra Class', 'slz' ),
		'param_name'  => 'extra_class',
		'value'       => '',
		'description' => esc_html__( 'Add extra class to block', 'slz' )
	)
);

$params_tab = array();
foreach( $column as $key=>$val) {
	$i = absint($val);
	$group_name = sprintf( esc_html__('Pricing Box %s', 'slz'), $i);
	$column_denp = array();
	for( $j=$i ; $j<= count($column); $j++){
		$column_denp[] = "{$j}";
	}
	$item_dependency = array(
			'element'  => 'column',
			'value'    => $column_denp
		);
	$param_tab_item = array(
		array(
			'type'        => 'dropdown',
			'heading'     => esc_html__( 'Active?', 'slz' ),
			'param_name'  => 'active' . $i,
			'std'         => 'no',
			'value'       => $yes_no,
			'description' => esc_html__( 'Choose yes if you want it show as active.', 'slz' ),
			'group'       => $group_name,
			'dependency'  => $item_dependency,
		),
		array(
			'type'        => 'colorpicker',
			'heading'     => esc_html__( 'Pricing Header Background Color', 'slz' ),
			'param_name'  => 'header_bg_cl' . $i,
			'description' => esc_html__( 'Choose background color for header of pricing box.', 'slz' ),
			'group'       => $group_name,
			'edit_field_class' => 'vc_col-sm-6 vc_column',
			'dependency'  => $item_dependency,
		),
		array(
			'type'        => 'textfield',
			'heading'     => esc_html__( 'Mark Label', 'slz' ),
			'param_name'  => 'label' . $i,
			'value'       => '',
			'description' => esc_html__( 'Please input mark label.', 'slz' ),
			'group'       => $group_name,
			'dependency'  => $item_dependency,
		),
		array(
			'type'        => 'colorpicker',
			'heading'     => esc_html__( 'Label Color', 'slz' ),
			'param_name'  => 'label_text_cl' . $i,
			'description' => esc_html__( 'Choose label text color.', 'slz' ),
			'group'       => $group_name,
			'edit_field_class' => 'vc_col-sm-6 vc_column',
			'dependency'  => $item_dependency,
		),
		array(
			'type'        => 'colorpicker',
			'heading'     => esc_html__( 'Label Background Color', 'slz' ),
			'param_name'  => 'label_bg_cl' . $i,
			'description' => esc_html__( 'Choose label background color.', 'slz' ),
			'group'       => $group_name,
			'edit_field_class' => 'vc_col-sm-6 vc_column',
			'dependency'  => $item_dependency,
		),
		array(
			'type'        => 'textfield',
			'heading'     => esc_html__( 'Title', 'slz' ),
			'param_name'  => 'title' . $i,
			'value'       => '',
			'description' => esc_html__( 'Please input box title.', 'slz' ),
			'group'       => $group_name,
			'edit_field_class' => 'vc_col-sm-6 vc_column',
			'dependency'  => $item_dependency,
		),
		array(
			'type'        => 'colorpicker',
			'heading'     => esc_html__( 'Title Color', 'slz' ),
			'param_name'  => 'title_cl' . $i,
			'description' => esc_html__( 'Choose title color.', 'slz' ),
			'group'       => $group_name,
			'edit_field_class' => 'vc_col-sm-6 vc_column',
			'dependency'  => $item_dependency,
		),
		array(
			'type'        => 'textfield',
			'heading'     => esc_html__( 'Price', 'slz' ),
			'param_name'  => 'price' . $i,
			'value'       => '',
			'description' => esc_html__( 'Please input price number.', 'slz' ),
			'group'       => $group_name,
			'edit_field_class' => 'vc_col-sm-6 vc_column',
			'dependency'  => $item_dependency,
		),
		array(
			'type'        => 'colorpicker',
			'heading'     => esc_html__( 'Price Color', 'slz' ),
			'param_name'  => 'price_cl' . $i,
			'description' => esc_html__( 'Choose price color.', 'slz' ),
			'group'       => $group_name,
			'edit_field_class' => 'vc_col-sm-6 vc_column',
			'dependency'  => $item_dependency,
		),
		array(
			'type'        => 'textfield',
			'heading'     => esc_html__( 'Unit', 'slz' ),
			'param_name'  => 'unit' . $i,
			'value'       => '',
			'description' => esc_html__( 'Enter measurement units. Example: $, GBP, EUR, etc.', 'slz' ),
			'group'       => $group_name,
			'dependency'  => $item_dependency,
		),
		
		array(
			'type'        => 'textfield',
			'heading'     => esc_html__( 'Price Subfix', 'slz' ),
			'param_name'  => 'currency' . $i,
			'value'       => '',
			'description' => esc_html__( 'Please input price subfix. Exp: Month, Hour,..', 'slz' ),
			'group'       => $group_name,
			'edit_field_class' => 'vc_col-sm-6 vc_column',
			'dependency'  => $item_dependency,
		),
		array(
			'type'        => 'colorpicker',
			'heading'     => esc_html__( 'Price Subfix Color', 'slz' ),
			'param_name'  => 'price_subfix_cl' . $i,
			'description' => esc_html__( 'Choose price subfix color.', 'slz' ),
			'group'       => $group_name,
			'edit_field_class' => 'vc_col-sm-6 vc_column',
			'dependency'  => $item_dependency,
		),
		array(
			'type'        => 'textarea',
			'heading'     => esc_html__( 'Sub Title', 'slz' ),
			'param_name'  => 'sub_title' . $i,
			'value'       => '',
			'description' => esc_html__( 'Please input sub title.', 'slz' ),
			'group'       => $group_name,
			'edit_field_class' => 'vc_col-sm-6 vc_column',
			'dependency'  => $item_dependency,
		),
		array(
			'type'        => 'colorpicker',
			'heading'     => esc_html__( 'Sub Title Color', 'slz' ),
			'param_name'  => 'sub_title_cl' . $i,
			'description' => esc_html__( 'Choose sub title color.', 'slz' ),
			'group'       => $group_name,
			'edit_field_class' => 'vc_col-sm-6 vc_column',
			'dependency'  => $item_dependency,
		),
		array(
			'type'       => 'param_group',
			'heading'    => esc_html__( 'Features', 'slz' ),
			'param_name' => 'features' . $i,
			'params'     => array(
				array(
					'type'        => 'textfield',
					'heading'     => esc_html__( 'Feature Item', 'slz' ),
					'param_name'  => 'text',
					'admin_label' => true,
					'value'       => '',
					'description' => esc_html__( 'Please input feature item.', 'slz' ),
				),
				array(
					'type'        => 'colorpicker',
					'heading'     => esc_html__( 'Feature Item Color', 'slz' ),
					'param_name'  => 'text_cl',
					'description' => esc_html__( 'Choose feature item color.', 'slz' ),
				),
				array(
                    'type' => 'iconpicker',
                    'heading' => esc_html__( 'Icon', 'slz' ),
                    'param_name' => 'icon_feature',
                    'settings' => array(
                        'iconsPerPage' => 4000,
                    ),
                    'description' => esc_html__( 'Select icon from library.', 'slz' ),
                ),
                array(
                    'type'        => 'colorpicker',
                    'heading'     => esc_html__( 'Icon Color', 'slz' ),
                    'param_name'  => 'icon_feature_cl',
                    'description' => esc_html__( 'Choose icon feature item color.', 'slz' ),
                ),
			),
			'value'       => '',
			'group'       => $group_name,
			'dependency'  => $item_dependency,
		),
		array(
			'type'        => 'textfield',
			'heading'     => esc_html__( 'Button Text', 'slz' ),
			'param_name'  => 'btn_text' . $i,
			'value'       => '',
			'description' => esc_html__( 'Please input button text.', 'slz' ),
			'group'       => $group_name,
			'dependency'  => $item_dependency,
		),
		array(
			'type'        => 'vc_link',
			'heading'     => esc_html__( 'Button Link', 'slz' ),
			'param_name'  => 'btn_link' . $i,
			'value'       => '',
			'description' => esc_html__( 'Choose button link and info.', 'slz' ),
			'group'       => $group_name,
			'dependency'  => $item_dependency,
		),
		array(
			'type'        => 'colorpicker',
			'heading'     => esc_html__( 'Button Color', 'slz' ),
			'param_name'  => 'btn_cl' . $i,
			'description' => esc_html__( 'Choose button text color.', 'slz' ),
			'group'       => $group_name,
			'edit_field_class' => 'vc_col-sm-6 vc_column',
			'dependency'  => $item_dependency,
		),
		array(
			'type'        => 'colorpicker',
			'heading'     => esc_html__( 'Button Color (hover)', 'slz' ),
			'param_name'  => 'btn_hv_cl' . $i,
			'description' => esc_html__( 'Choose button text color when you mouse over it.', 'slz' ),
			'group'       => $group_name,
			'edit_field_class' => 'vc_col-sm-6 vc_column',
			'dependency'  => $item_dependency,
		),
		array(
			'type'        => 'colorpicker',
			'heading'     => esc_html__( 'Button Background Color', 'slz' ),
			'param_name'  => 'btn_bg_cl' . $i,
			'description' => esc_html__( 'Choose button background color.', 'slz' ),
			'group'       => $group_name,
			'edit_field_class' => 'vc_col-sm-6 vc_column',
			'dependency'  => $item_dependency,
		),
		array(
			'type'        => 'colorpicker',
			'heading'     => esc_html__( 'Button Background Color (hover)', 'slz' ),
			'param_name'  => 'btn_bg_hv_cl' . $i,
			'description' => esc_html__( 'Choose button background color when you mouse over it.', 'slz' ),
			'group'       => $group_name,
			'edit_field_class' => 'vc_col-sm-6 vc_column',
			'dependency'  => $item_dependency,
		),
	);
	$params_tab = array_merge( $params_tab, $param_tab_item );
}

$vc_options = array_merge( 
	$layout,
	$layout_option,
	$params,
	$params_tab
);
