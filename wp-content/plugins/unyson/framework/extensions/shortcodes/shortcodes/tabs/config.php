<?php

if ( ! defined( 'ABSPATH' ) ) {
	die ( 'Forbidden' );
}

$cfg = array ();

$cfg ['layouts'] = array (
	'layout-1' => esc_html__( 'United States', 'slz' ),
	'layout-2' => esc_html__( 'India', 'slz' ),
);

$cfg ['layouts_class'] = array (
	'layout-1' => 'la-united-states',
	'layout-2' => 'la-india',
);

$cfg ['page_builder'] = array (
	'title' => esc_html__( 'SLZ Tabs', 'slz' ),
	'description' => esc_html__( 'Box of pricing info', 'slz' ),
	'tab' => slz()->theme->manifest->get('name'),
	'icon' => 'icon-slzcore-tabs slz-vc-slzcore',
	'tag' => 'slz_tabs',
	'is_container' => true,
	'show_settings_on_create' => false,
	'as_parent' => array(
		'only' => 'vc_tta_section',
	),
	'class'=>'wpb_vc_tta_tabs',
	'js_view' => 'VcBackendTtaTabsView',
	'custom_markup' => '
		<div class="vc_tta-container" data-vc-action="collapse">
			<div class="vc_general vc_tta vc_tta-tabs vc_tta-color-backend-tabs-white vc_tta-style-flat vc_tta-shape-rounded vc_tta-spacing-1 vc_tta-tabs-position-top vc_tta-controls-align-left">
				<div class="vc_tta-tabs-container">'
				. '<ul class="vc_tta-tabs-list">'
				. '<li class="vc_tta-tab" data-vc-tab data-vc-target-model-id="{{ model_id }}" data-element_type="vc_tta_section"><a href="javascript:;" data-vc-tabs data-vc-container=".vc_tta" data-vc-target="[data-model-id=\'{{ model_id }}\']" data-vc-target-model-id="{{ model_id }}"><span class="vc_tta-title-text">{{ section_title }}</span></a></li>'
				. '</ul>
				</div>
				<div class="vc_tta-panels vc_clearfix {{container-class}}">
					{{ content }}
				</div>
			</div>
		</div>',
	'default_content' => '
		[vc_tta_section title="' . sprintf( '%s %d', __( 'Tab', 'slz' ), 1 ) . '"][/vc_tta_section]
		[vc_tta_section title="' . sprintf( '%s %d', __( 'Tab', 'slz' ), 2 ) . '"][/vc_tta_section]
	',
);

$cfg ['icon_default_value'] = array (
	'i_type'             => 'fontawesome',
	'i_icon_fontawesome' => 'fa fa-adjust',
	'i_icon_openiconic'  => 'vc-oi vc-oi-pilcrow',
	'i_icon_typicons'    => 'typcn typcn-adjust-brightness',
	'i_icon_entypo'      => 'entypo-icon entypo-icon-note',
	'i_icon_linecons'    => 'vc_li vc_li-heart',
	'i_icon_monosocial'  => 'vc-mono vc-mono-fivehundredpx',
	'i_icon_material'      => 'vc-material vc-material-cake',
); 

$cfg ['default_value'] = array (

	'layout'            => 'layout-1',
	'extra_class'       => '',
	'tab_align'		    => 'text-l',

	//layout default
	'layout-1-style'    => 'st-florida',
	'layout-2-style'    => 'st-chennai',
	
	//icon
	'icon_color'	     => '',
	'icon_hv_color'		 => '',
	'icon_bg_color'		 => '',
	'icon_bg_hv_color'   => '',

);