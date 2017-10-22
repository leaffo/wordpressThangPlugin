<?php if ( ! defined( 'ABSPATH' ) ) {
	die( 'Forbidden' );
}

$cfg = array();
// Enable/Disable taxonomy status
$cfg['enable_status'] = false;
// Enable/Disable taxonomy tags
$cfg['enable_tag'] = false;

$cfg['supports_comment'] = false;
$cfg['supports_author'] = true;

// Include {history, other } tab to Project Options
$cfg['has_gallery'] = false;
// History tab is needs enable_status = true
$cfg['has_history_tab'] = false; 
$cfg['has_other_tab'] = false;
$cfg['has_team_tab'] = false;
$cfg['has_album_tab'] = false;
$cfg['has_attribute_tab'] = false;
$cfg['has_multi_team_tab'] = false;

$cfg['enqueue_styles'] = true;

// Enable custom action/filter of WooCommerce 
$cfg['enable_woo_action_porfolio'] = false;
$cfg['enable_woo_filter_porfolio'] = false;

$cfg['image_size'] = array (
	'portfolio' => array(
		'large'				=> '550x350',
		'small'				=> '320x320',
		'no-image-large'	=> '550x350',
		'no-image-small'	=> '320x320'
	)
);
$cfg['mbox_name'] = esc_html__('Project Options', 'slz');

$cfg['sort_portfolio'] = array(
	esc_html__( '- Latest -', 'slz' )         => '',
	esc_html__('A to Z', 'slz')               => 'az_order',
	esc_html__('Z to A', 'slz')               => 'za_order',
	esc_html__('Post is selected', 'slz')     => 'post__in',
	esc_html__('Random', 'slz')               => 'random_posts',
);

// Define extension labels
$cfg['labels'] = array(
	'portfolio-slug' => 'portfolio',
	'portfolio-category-slug' => 'portfolio-cat',
	'portfolio-tag-slug' => 'portfolio-tag',
	'portfolio-status-slug' => 'portfolio-status',
	'portfolio-base-slug' => 'my-portfolio',
	'portfolio-category-base-slug' => 'my-portfolio-category',
	'portfolio-base' => esc_html__('Portfolio base', 'slz'),
	'portfolio-category-base' => esc_html__('Portfolio category base', 'slz'),
	'singular' => esc_html__('Portfolio', 'slz'),
	'plural' => esc_html__('Portfolio', 'slz'),
	'category-singular' => esc_html__('Portfolio Category', 'slz'),
	'category-plural' => esc_html__('Portfolio Categories', 'slz'),
	'tag-singular' => esc_html__('Portfolio Tag', 'slz'),
	'tag-plural' => esc_html__('Portfolio Tags', 'slz'),
	'status-singular' => esc_html__('Portfolio Status', 'slz'),
	'status-plural' => esc_html__('Portfolio Status', 'slz'),
);
$cfg['gallery_tab'] = array(
	'gallery_tab' => array(
		'title'   => esc_html__( 'Gallery', 'slz' ),
		'type'    => 'tab',
		'options' => array(
			'gallery_images' => array(
				'type'  => 'multi-upload',
				'value' => array(),
				'attr'  => array( 'class' => 'custom-class', 'data-foo' => 'bar' ),
				'label' => esc_html__('Images Gallery', 'slz'),
				'desc'  => esc_html__('Add images to gallery. Images should have minimum size: 800x600. Bigger size images will be cropped automatically.', 'slz'),
				'images_only' => true
			),
		)
	),
);
$cfg['attribute_tab'] = array(
	'attrib_tab' => array(
		'title'   => esc_html__( 'Attributes', 'slz' ),
		'type'    => 'tab',
		'options' => array(
			'attribs' => array(
				'type'  => 'addable-box',
				'value' => array(),
				'attr'  => array( 'class' => '' ),
				'label' => esc_html__('Attributes', 'slz'),
				'desc'  => esc_html__('Add attributes for this post.', 'slz'),
				'box-options' => array(
					'name' => array(
						'type' => 'text',
						'label' => esc_html__('Name', 'slz'),
						'desc'  => esc_html__('Enter attribute name.', 'slz'),
					),
					'value' => array(
						'type' => 'textarea',
						'label' => esc_html__('Value', 'slz'),
						'desc'  => esc_html__('Enter attribute value. Support HTML.', 'slz'),
					),
				),
				'template' => 'Attribute: {{- name }}',
				'limit' => 0,
				'add-button-text' => esc_html__('Add', 'slz'),
				'sortable' => true,
			),
			'attribs_visible' => array(
				'type'  => 'checkbox',
				'value' => true,
				'attr'  => array( 'class' => '' ),
				'label' => esc_html__('Visible On Page', 'slz'),
				'desc'  => esc_html__('Check to show attributes on single page.', 'slz'),
				'text'  => esc_html__('Visible', 'slz'),
			),
		),
	),
);
$cfg['general_tab'] = array(
	'general_tab' => array(
		'title'   => esc_html__( 'General', 'slz' ),
		'type'    => 'tab',
		'options' => array(
			'thumbnail' => array(
				'type'  => 'upload',
				'value' => array(),
				'attr'  => array( 'class' => 'custom-class', 'data-foo' => 'bar' ),
				'label' => esc_html__('Thumnail', 'slz'),
				'desc'  => esc_html__('Add thumbnail to the post.', 'slz'),
			),
			'description' => array(
				'type'  => 'textarea',
				'value' => '',
				'attr'  => array( 'class' => 'custom-class', 'data-foo' => 'bar' ),
				'label' => esc_html__('Short Description', 'slz'),
				'desc'  => esc_html__('Short description of post.', 'slz'),
			),
			'information' => array(
				'type'  => 'wp-editor',
				'value' => '',
				'attr'  => array( 'class' => 'custom-class', 'data-foo' => 'bar' ),
				'label' => esc_html__('Information', 'slz'),
				'desc'  => esc_html__('Information of post.', 'slz'),
				'reinit' => true,
				'size'   => 'large',
			),
			'font-icon' => array(
				'type'  => 'icon',
				'value' => '',
				'attr'  => array( 'class' => 'custom-class', 'data-foo' => 'bar' ),
				'label' => esc_html__('Icon', 'slz'),
				'desc'  => esc_html__('Choose icon to post', 'slz'),
			),
		)
	),
);
