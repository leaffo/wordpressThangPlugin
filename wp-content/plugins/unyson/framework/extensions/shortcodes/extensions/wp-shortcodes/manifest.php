<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

$manifest = array(
	'name' => __('WordPress Shortcodes', 'slz'),
	'description' => __(
		'Lets you insert Unyson shortcodes inside any WordPress editor.',
		'slz'
	),
	'version' => '1.0.1',
	'display' => true,
	'standalone' => true,

	'requirements' => array(
		'extensions' => array(
			'shortcodes' => array(
				'min_version' => '1.3.17'
			)
		)
	)
);

$manifest['github_update'] = 'ThemeFuse/Unyson-WP-Shortcodes-Extension';

