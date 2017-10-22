<?php if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

$cfg = array();
$plugin_url = plugins_url('solazu-unyson/framework/static');
$plugin_path = ABSPATH . 'wp-content/plugins/solazu-unyson/framework/static';
$cfg['framework_scripts'] = [
    'slz' => [$plugin_path . '/js/slz.js', $plugin_url . '/js/slz.js'],
    'slz-events' => [$plugin_path . '/js/slz-events.js', $plugin_url . '/js/slz-events.js'],
];

$cfg['framework_styles'] = [
    'slz' => [$plugin_path . '/css/slz.css', $plugin_url . '/css/slz.css'],
    'slz-layout' => [$plugin_path . '/css/layout.css', $plugin_url . '/css/layout.css'],
    'slz-components' => [$plugin_path . '/css/components.css', $plugin_url . '/css/components.css'],
    // 'slz-widgets' => [$plugin_path . '/css/widgets.css', $plugin_url . '/css/widgets.css'],
];

/* Load admin statics */
if ( is_admin() ) {
    /*$cfg['framework_scripts']['slz-option-type-icon-backend'] = [
        slz_get_framework_directory('/includes/option-types/icon/static/js/backend.js') ,
        slz_get_framework_directory_uri( '/includes/option-types/icon/static/js/backend.js' )
    ];
    $cfg['framework_styles']['slz-option-type-icon-backend'] = [
        slz_get_framework_directory('/includes/option-types/icon/static/css/backend.css'),
        slz_get_framework_directory_uri( '/includes/option-types/icon/static/css/backend.css' )
    ];*/
}