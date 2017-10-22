<?php if ( ! defined( 'ABSPATH' ) ) {
	die( 'Forbidden' );
}
if ( ! is_plugin_active( 'js_composer/js_composer.php' ) ) {
	return;
}

$data['uniq_id'] = 'pricing-box-'.SLZ_Com::make_id();
$block_class[] = $data['uniq_id'] .' '.$data['extra_class'];
$cfg_layout_class = $instance->get_config('layouts_class');

if( isset($cfg_layout_class[$data['layout']]) ) {
	$block_class[] = $cfg_layout_class[$data['layout']];
}

$block_class = implode(' ', $block_class );


//column

if ( isset( $data['column'] ) ) {
    if (  $data['column'] == 1 ){
        $data['column_class'] = 'slz-column-1';
    }
    else if (  $data['column'] == 2 ){
        $data['column_class'] = 'slz-column-2';
    }
    else if (  $data['column'] == 3 ){
        $data['column_class'] = 'slz-column-3';
    }
    else if (  $data['column'] == 4 ){
        $data['column_class'] = 'slz-column-4';
    }
    else {
         $data['column_class'] = '';
    }
}

if ( is_plugin_active( 'js_composer/js_composer.php' ) ) {
	echo '<div class="slz_shortcode sc-pricing-box '.esc_attr( $block_class ).'">';
		echo '<div class="'.esc_attr($data[''.$data['layout'].'-style']).'">';
			switch ( $data['layout'] ) {
				case 'layout-1':
					echo slz_render_view( $instance->locate_path('/views/layout-1.php'), compact('data'));
					break;
				case 'layout-2':
					echo slz_render_view( $instance->locate_path('/views/layout-2.php'), compact('data'));
					break;
				case 'layout-3':
					echo slz_render_view( $instance->locate_path('/views/layout-3.php'), compact('data'));
					break;
				case 'layout-4':
					echo slz_render_view( $instance->locate_path('/views/layout-4.php'), compact('data'));
					break;
				default:
					echo slz_render_view( $instance->locate_path('/views/layout-1.php'), compact('data'));
					break;
			}

		echo '</div>';
	echo '</div>';
}else{
	echo esc_html__('Please Active Visual Composer', 'slz');
}
