<?php if (!defined('ABSPATH')) die('Forbidden');

$shortcode = slz_ext('shortcodes')->get_shortcode('faq-block');

$shortcode->wp_enqueue_style(
	'slz-shortcode-faq-block',
	$shortcode->locate_URI('/static/css/faq-block.css')
);
