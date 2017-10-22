<?php
/**
 * Created by PhpStorm.
 * User: Dell
 * Date: 10/19/2017
 * Time: 2:28 PM
 */
$vc_options = array();
$shortcode  = slz_ext( 'shortcodes' )->get_shortcode( 'content-carousel' );

$g1roup_tab = 'general';
$tab_1      = array(
	array(
		'type'        => 'dropdown',
		'heading'     => esc_html__( 'Layout', 'slz' ),
		'param_name'  => 'layout',
		'value'       => $shortcode->get_layouts(),
		'description' => esc_html__( 'Choose layout', 'slz' ),
		'group'       => esc_html__( $g1roup_tab, 'slz' )
	),
	array(
		'type'        => 'dropdown',
		'heading'     => esc_html__( 'Style', 'slz' ),
		'param_name'  => 'style',
		'value'       => $shortcode->get_layouts(),
		'description' => esc_html__( 'Style', 'slz' ),
		'group'       => esc_html__( $g1roup_tab, 'slz' )
	),
	array(
		'type'       => 'param_group',
		'heading'    => esc_html__( 'Contents', 'slz' ),
		'param_name' => 'contents',
		'group'      => esc_html__( $g1roup_tab, 'slz' ),
		'params'     =>
			array(
				array(
					'type'        => 'textfield',
					'heading'     => esc_html__( 'Title', 'slz' ),
					'param_name'  => 'title',
					'description' => esc_html__( 'Title Image', 'slz' ),
				),
				array(
					'type'        => 'textfield',
					'heading'     => esc_html__( 'Content', 'slz' ),
					'param_name'  => 'content',
					'description' => esc_html__( 'Content Image', 'slz' ),
				),
				array(
					'type'        => 'attach_image',
					'heading'     => esc_html__( 'Background Image', 'slz' ),
					'param_name'  => 'image',
					'description' => esc_html__( 'Background Image', 'slz' ),
				),
				array(
					'type'        => 'vc_link',
					'heading'     => esc_html__( 'Button', 'slz' ),
					'param_name'  => 'btn',
					'value'       => '',
					'description' => esc_html__( 'Button link', 'slz' ),
					'group'       => esc_html__( $g1roup_tab, 'slz' )
				),
			),
	),
	array(
		'type'        => 'textfield',
		'heading'     => esc_html__( 'Extra Class', 'slz' ),
		'param_name'  => 'extra_class',
		'value'       => '',
		'description' => esc_html__( 'Extra Class', 'slz' ),
		'group'       => esc_html__( $g1roup_tab, 'slz' )
	),

);

$g2roup_tab = 'Slider';
$tab_2      = array(
	array(
		'type'        => 'textfield',
		'heading'     => esc_html__( 'Slide To Show', 'slz' ),
		'param_name'  => 'slide_to_show',
		'value'       => '',
		'description' => esc_html__( 'Default: 3', 'slz' ),
		'group'       => esc_html__( $g2roup_tab, 'slz' )
	),
	array(
		'type'        => 'checkbox',
		'heading'     => esc_html__( 'Slide Arrows', 'slz' ),
		'param_name'  => 'slide_arrows',
		'value'       => true,
		'description' => esc_html__( 'Display arrows', 'slz' ),
		'group'       => esc_html__( $g2roup_tab, 'slz' )
	),
	array(
		'type'        => 'checkbox',
		'heading'     => esc_html__( 'Slide Dots', 'slz' ),
		'param_name'  => 'slide_dots',
		'value'       => true,
		'description' => esc_html__( 'Display Dots', 'slz' ),
		'group'       => esc_html__( $g2roup_tab, 'slz' )
	),
	array(
		'type'        => 'checkbox',
		'heading'     => esc_html__( 'Slide Autoplay', 'slz' ),
		'param_name'  => 'slide_autoplay',
		'value'       => true,
		'description' => esc_html__( 'Autoplay', 'slz' ),
		'group'       => esc_html__( $g2roup_tab, 'slz' )
	),
	array(
		'type'        => 'checkbox',
		'heading'     => esc_html__( 'Slide Infinite', 'slz' ),
		'param_name'  => 'slide_infinite',
		'value'       => true,
		'description' => esc_html__( 'Slide infinite', 'slz' ),
		'group'       => esc_html__( $g2roup_tab, 'slz' )
	),
	array(
		'type'        => 'textfield',
		'heading'     => esc_html__( 'Slide Speed', 'slz' ),
		'param_name'  => 'slide_speed',
		'value'       => '',
		'description' => esc_html__( 'Default: 200 mili/minute', 'slz' ),
		'group'       => esc_html__( $g2roup_tab, 'slz' )
	),

);

$g3roup_tab = 'Custom';
$tab_3      = array(
	array(
		'type'        => 'colorpicker',
		'heading'     => esc_html__( 'Title Color', 'slz' ),
		'param_name'  => 'title_color',
		'value'       => '',
		'description' => esc_html__( 'Title Color', 'slz' ),
		'group'       => esc_html__( $g3roup_tab, 'slz' )
	),
	array(
		'type'        => 'colorpicker',
		'heading'     => esc_html__( 'Title Hover Color', 'slz' ),
		'param_name'  => 'title_hover_color',
		'value'       => '',
		'description' => esc_html__( 'Title Hover color', 'slz' ),
		'group'       => esc_html__( $g3roup_tab, 'slz' )
	),
	array(
		'type'        => 'colorpicker',
		'heading'     => esc_html__( 'Content Color', 'slz' ),
		'param_name'  => 'content_color',
		'value'       => '',
		'description' => esc_html__( 'Content color', 'slz' ),
		'group'       => esc_html__( $g3roup_tab, 'slz' )
	),
	array(
		'type'        => 'colorpicker',
		'heading'     => esc_html__( 'Button Color', 'slz' ),
		'param_name'  => 'btn_color',
		'value'       => '',
		'description' => esc_html__( 'Button color', 'slz' ),
		'group'       => esc_html__( $g3roup_tab, 'slz' )
	),
	array(
		'type'        => 'colorpicker',
		'heading'     => esc_html__( 'Button Hover Color', 'slz' ),
		'param_name'  => 'btn_hover_color',
		'value'       => '',
		'description' => esc_html__( 'Button hover color', 'slz' ),
		'group'       => esc_html__( $g3roup_tab, 'slz' )
	),
);


$vc_options = array_merge( $tab_1, $tab_2, $tab_3 );