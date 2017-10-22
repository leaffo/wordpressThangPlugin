<?php if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

$cfg = array();

/**
 * Do not show details about each extension update, but show it as one update
 * (simplify users life)
 */
$cfg['extensions_as_one_update'] = false;
$cfg['active_updates'] = array(
	'framework' => false,
	'theme'     => false,
	'extensions' => false,
);