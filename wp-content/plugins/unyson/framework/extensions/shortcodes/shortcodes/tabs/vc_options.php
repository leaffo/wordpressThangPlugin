<?php

$shortcode = slz_ext( 'shortcodes' )->get_shortcode( 'tabs' );

$tab_align = array(
	esc_html__( 'Left', 'slz' )   => 'text-l',
	esc_html__( 'Center', 'slz' ) => 'text-c',
	esc_html__( 'Right', 'slz' )  => 'text-r'
);

$section_desc_param = array(
	'type'        => 'textarea',
	'heading'     => esc_html__( 'Description', 'slz' ),
	'param_name'  => 'desc',
	'value'       => '',
	'description' => esc_html__( 'Description. If it blank the block will not have a description', 'slz' )
);
if ( is_plugin_active( 'js_composer/js_composer.php' ) ) {
	vc_remove_param( 'vc_tta_section', 'el_class' );
	vc_remove_param( 'vc_tta_section', 'i_position' );
	vc_add_param( 'vc_tta_section', $section_desc_param );
}

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
		'type'		  => 'dropdown',
		'heading'	  => esc_html__( 'Tab Align', 'slz' ),
		'param_name'	  => 'tab_align',
		'value'		      => $tab_align,
		'description' 	  => esc_html__( 'It is used for aligning the inner content of  blocks.', 'slz' )	
	),
	array(
		'type'        => 'textfield',
		'heading'     => esc_html__( 'Extra Class', 'slz' ),
		'param_name'  => 'extra_class',
		'description' => esc_html__( 'Please enter your extra class.', 'slz' ),
	),
);

$vc_options = array_merge( $layout, $layout_option, $params );