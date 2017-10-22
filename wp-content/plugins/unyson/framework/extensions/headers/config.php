<?php if ( ! defined( 'ABSPATH' ) ) {
	die( 'Forbidden' );
}

$cfg = array();
$cfg['enable_breakingnews'] = false;
$cfg['show_btn_donation'] = false;
$cfg['show_banner_event'] = false;
$cfg['option_content_topbar'] = array(
		'menu'    => esc_html__('Menu', 'slz'),
		'social'  => esc_html__('Social Profile', 'slz'),
		'icon'    => esc_html__('Customize Icon', 'slz'),
		'button'  => esc_html__('Button', 'slz'),
		'other'   => esc_html__('Other Content', 'slz'),
	);

$cfg['option_content_header'] = array(
    'social'  => esc_html__('Social Profile', 'slz'),
    'icon'    => esc_html__('Customize Icon', 'slz'),
    'button'  => esc_html__('Button', 'slz'),
    'other'   => esc_html__('Other Content', 'slz'),
);
$cfg['text_btn_donation'] = esc_html__('Donation Now', 'slz');
$cfg['show_custom_header'] = false;