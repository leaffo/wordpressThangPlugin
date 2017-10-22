<?php if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

$manifest = array();

$manifest['name'] = __('Optimization', 'slz');
$manifest['description'] = __('Optimize static resources for education project', 'slz');
$manifest['standalone'] = true;
$manifest['display'] = false;
$manifest['autoload'] =  true;
$manifest['version'] = '1.0.2';