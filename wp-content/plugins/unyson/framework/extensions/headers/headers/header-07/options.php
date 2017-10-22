<?php if ( ! defined( 'ABSPATH' ) ) {
	die( 'Forbidden' );
}

$palette_color = SLZ_Com::get_palette_color();

$regist_menu = array( 'default' => esc_html__('-- Select Menu --', 'slz') ) + SLZ_Com::get_regist_menu();

$menu_locations = get_nav_menu_locations();

$menu_align = array(
	'left'   => esc_html__('Left','slz'),
	'right'  => esc_html__('Right','slz'),
	);

$option_content_bottom = array(
	''        => esc_html__('--Select content--', 'slz'),
	'social'  => esc_html__('Social Profile', 'slz'),
	'other'   => esc_html__('Other Content', 'slz'),
);

$options = array(
	'general-box' => array(
		'type' => 'box',
		'title' => esc_html__('General Settings', 'slz'),
		'options' => array(
			'header-styling' => array(
				'type'          => 'popup',
				'attr'          => array( 'class' => 'slz-advanced-button' ),
				'label'         => esc_html__( 'Custom Style', 'slz' ),
				'desc'          => esc_html__( 'Change the style of this header', 'slz' ),
				'button'        => esc_html__( 'Styling', 'slz' ),
				'size'          => 'medium',
				'popup-options' => array(
					'header-style' => array(
						'type'  => 'select',
						'label' => esc_html__('Header Style', 'slz'),
						'choices' => array(
							''          => esc_html__('Light','slz'),
							'slz-dark'  => esc_html__('Dark','slz')
						) ,
					),
					'header-bg-color'      => array(
						'label'   => esc_html__( 'Background Color', 'slz' ),
						'desc'    => esc_html__( 'Select header background color', 'slz' ),
						'value'   => '',
						'choices' => $palette_color,
						'type'    => 'color-palette'
					),
					'header-bg-image' => array(
						'type'  => 'upload',
						'label' => esc_html__('Background Image', 'slz'),
						'desc'  => esc_html__('Upload the background image .png or .jpg', 'slz'),
						'images_only' => true,
					),
					'header-bg-attachment' => array(
						'type'    => 'select',
						'label'   => esc_html__('Background Attachment', 'slz'),
						'choices' => SLZ_Params::get('option-bg-attachment'),
					),
					'header-bg-size' => array(
						'type'    => 'select',
						'label'   => esc_html__('Background Size', 'slz'),
						'choices' => SLZ_Params::get('option-bg-size'),
					),
					'header-bg-position' => array(
						'type'    => 'select',
						'label'   => esc_html__('Background Position', 'slz'),
						'choices' => SLZ_Params::get('option-bg-position'),
					),
					'header-text-color'  => array(
						'label'   => esc_html__( 'Text Color', 'slz' ),
						'desc'    => esc_html__( 'Select header text color', 'slz' ),
						'value'   => '',
						'choices' => $palette_color,
						'type'    => 'color-palette'
					),
				)
			),
			'enable-sticky-header'    => array(
				'type'         => 'switch',
				'value'        => 'yes',
				'attr'         => array(),
				'label'        => esc_html__( 'Sticky Header', 'slz' ),
				'desc'         => esc_html__( 'Make the header stick with the scroll?', 'slz' ),
				'left-choice'  => array(
					'value' => 'no',
					'label' => esc_html__( 'No', 'slz' ),
				),
				'right-choice' => array(
					'value' => 'yes',
					'label' => esc_html__( 'Yes', 'slz' ),
				),
			),
			'menu-group' => array(
				'type'    => 'group',
				'options' => array(
					'main-menu'  => array(
						'type'  => 'select',
						'label' => esc_html__('Select Main Menu', 'slz'),
						'desc'  => esc_html__('Select menu for main menu. This changes will be apply for all headers.', 'slz'),
						'choices' => $regist_menu,
						'value' => ( !empty ( $menu_locations['main-nav'] ) ? $menu_locations['main-nav'] : ''),
						'show_borders' => true,
							
					),
					'menu-styling' => array(
						'attr'          => array(
							'data-advanced-for' => 'scroll-to-top-styling',
							'class'             => 'slz-advanced-button'
						),
						'type'          => 'popup',
						'label'         => esc_html__( 'Custom Menu', 'slz' ),
						'desc'          => esc_html__( 'Change the style for menu', 'slz' ),
						'button'        => esc_html__( 'Styling', 'slz' ),
						'size'          => 'medium',
						'popup-options' => array(
							'menu-item-color' => array(
								'label'   => esc_html__( 'Item Color', 'slz' ),
								'desc'    => esc_html__( "Select color for menu item", 'slz' ),
								'value'   => '',
								'choices' => SLZ_Com::get_palette_color(),
								'type'    => 'color-palette'
							),
							'menu-item-active-color' => array(
								'label'   => esc_html__( 'Item Active Color', 'slz' ),
								'desc'    => esc_html__( "Select color for menu item active", 'slz' ),
								'value'   => '',
								'choices' => SLZ_Com::get_palette_color(),
								'type'    => 'color-palette'
							),
							'menu-border-color' => array(
								'label'   => esc_html__( 'Menu Border Color', 'slz' ),
								'desc'    => esc_html__( "Select color for border of dropdown menu and mega menu", 'slz' ),
								'value'   => '',
								'choices' => SLZ_Com::get_palette_color(),
								'type'    => 'color-palette'
							),
						),
						'show_borders' => true,
					),
				)
			),
		),
		'show_borders' => true,
	),
	'other-box' => array(
		'type' => 'box',
		'title' => esc_html__('Other Settings', 'slz'),
		'options' => array(
			'search-group'      => array(
				'type'    => 'group',
				'options' => array(
					'search-group-styling' => array(
						'attr'          => array(
							'data-advanced-for' => 'search-group-styling',
							'class'             => 'slz-advanced-button'
						),
						'type'          => 'popup',
						'label'         => esc_html__( 'Custom Style', 'slz' ),
						'desc'          => esc_html__( 'Change the style / typography of search box', 'slz' ),
						'button'        => esc_html__( 'Styling', 'slz' ),
						'size'          => 'medium',
						'popup-options' => array(
							'icon-class' => array(
								'type'  => 'icon',
								'value' => '',
								'label' => esc_html__( 'Search Icon', 'slz' )
							),
							'bg-color' => array(
								'label'   => esc_html__( 'Background Color', 'slz' ),
								'desc'    => esc_html__( 'Select the background color for search box', 'slz' ),
								'value'   => '',
								'choices' => SLZ_Com::get_palette_color(),
								'type'    => 'color-palette'
							),
							'text-color' => array(
								'label'   => esc_html__( 'Text Color', 'slz' ),
								'desc'    => esc_html__( 'Select the text color for search box', 'slz' ),
								'value'   => '',
								'choices' => SLZ_Com::get_palette_color(),
								'type'    => 'color-palette'
							)
						)
					),
					'enable-search' => array(
						'attr'    => array( 'class' => 'search-group-styling' ),
						'type'         => 'switch',
						'value'        => 'no',
						'label'        => esc_html__( 'Search Box', 'slz' ),
						'desc'         => esc_html__( 'Enable search box ?', 'slz' ),
						'left-choice'  => array(
							'value' => 'no',
							'label' => esc_html__( 'Disable', 'slz' ),
						),
						'right-choice' => array(
							'value' => 'yes',
							'label' => esc_html__( 'Enable', 'slz' ),
						)
					),
				)
			),
			'other-group'            => array(
				'label'  => esc_html__( 'Show Content', 'slz' ),
				'type'   => 'addable-option',
				'option' => array(
					'type' => 'select',
					'choices' => $option_content_bottom
				),
				'value'  => '',
				'desc'   => wp_kses_post( __('Choose content will be show in bottom.<br/><ul class="list-subdesc"><li>Social Profile: Go to General > Social Profiles to setting.</li><li>Other Content: Setting in below</li></ul>', 'slz' ) ),
			),
			'other-content' => array(
				'type'          => 'wp-editor',
				'label'         => esc_html__('Other Content', 'slz'),
				'desc'          => esc_html__('Enter content to display in bottom.', 'slz'),
				'size'          => 'large',
				'editor_height' => 200,
				'wpautop'       => true,
				'editor_type'   => false
			),
		),
		'show_borders' => true,
	),
);