<?php if ( ! defined( 'ABSPATH' ) ) {
	die( 'Forbidden' );
}

// Set default Value
$out = $class = $active = $true = $collapsed = $icon = $icon_position = $css = $custom_css = '';
$option_show = !empty($data['option_show']) ? $data['option_show'] : 'option-1';
$id = SLZ_Com::make_id();
$block_class = 'accordion-'. $id;
$block_cls = $block_class.' '.$data['extra_class'];
$data['block_class'] = $block_class;

$icon = $data['icon'] == 'plus' ? 'icon-plus' : 'icon-arrow';
$icon_position = $data['icon_position'] == 'left' ? 'icons-left' : '';

$out .= '<div id="'.esc_attr( $block_class ).'" role="tablist" aria-multiselectable="true" class="slz-accordion-group '.esc_attr($option_show).'">';
	if ( is_plugin_active( 'js_composer/js_composer.php' ) ) {
		$accordion_list = (array) vc_param_group_parse_atts( $data['accordion_list'] );
		if ( !empty( $accordion_list ) ) {
			// Set default value for Param Group
			$default = array(
				'title'           => '',
				'content'         => '',
				'icon_library'    => '',
				'icon_vs'         => '',
				'icon_openiconic' => '',
				'icon_typicons'   => '',
				'icon_entypo'     => '',
				'icon_linecons'   => '',
				'icon_monosocial' => '',
				'icon_material'   => '',
			);
			// Loop each item
			foreach ($accordion_list as $i => $accordion) {
				// If first element -> expand
				if ( $i == 0 ) {
					$class = 'in';
					$collapsed = '';
					$active = 'active_panel';
					$true = 'true';
				}else{
					$collapsed = 'collapsed';
					$true = 'false';
					$active = '';
					$class = '';
				}
				$accordion = array_merge( $default, $accordion );
				// Check title & content are empty or not
				if ( empty( $accordion['title'] ) && empty( $accordion['content'] ) ) {
					continue;
				}

				// Get Title Icon
				$title_icon = !empty( $accordion['icon_library'] ) && !empty( $accordion['icon_'.$accordion['icon_library'] ] ) ? '<i class="'. esc_attr( $accordion['icon_'.$accordion['icon_library'] ] ) .' title-icon"></i>' : '';
				if( !empty( $title_icon ) ) {
					SLZ_Util::slz_icon_fonts_enqueue( $accordion['icon_library'] );
				}

				$out .= '<div class="accordion-panel panel">';
					$out .= '
						<div id="heading-'.esc_attr( $i ).'-'.esc_attr( $id ).'" role="tab" class="panel-heading '. esc_attr( $icon_position ) .' '. esc_attr( $active ) .'">
							<a role="button" data-toggle="collapse" data-parent="#'.esc_attr( $block_class ).'" href="#collapse-'.esc_attr( $i ).'-'.esc_attr( $id ).'" aria-expanded="'.esc_attr( $true ).'" aria-controls="collapse-'. esc_attr( $i ) .'-'. esc_attr( $id ) .'" class="'.esc_attr( $collapsed ).' check-data-collapsed">
								<i class="'. esc_attr( $icon ) .' accordion-icon"></i>
								<span>'. $title_icon . esc_html( $accordion['title'] ) .'</span>
							</a>
						</div>
					';
					$out .= '
						<div id="collapse-'. esc_attr( $i ) .'-'. esc_attr( $id ) .'" role="tabpanel" aria-labelledby="heading-'. esc_attr( $i ) .'-'. esc_attr( $id ) .'" class="panel-collapse collapse '.esc_attr( $class ).'">
							<div class="panel-body">'. wp_kses_post( nl2br( $accordion['content'] ) ) .'</div>
						</div>
					';
				$out .= '</div>';
			}// end foreach
		}// end if
	}
$out .= '</div>';


if ( is_plugin_active( 'js_composer/js_composer.php' ) ) {
	echo '<div class="slz_shortcode col-2-shortcode sc_accordion '.esc_attr( $block_cls ).'">';
		echo ( $out );
	echo '</div>';
}else{
	echo esc_html__('Please Active Visual Composer', 'slz');
}

/* CUSTOM CSS */
if ( !empty( $data['title_color'] ) ) {
    $css = '.%1$s .panel-heading a span { color: %2$s !important; }';
    $custom_css .= sprintf( $css, esc_attr( $block_class ), esc_attr( $data['title_color'] ) );
}

if ( !empty( $data['content_color'] ) ) {
    $css = '.%1$s .panel-collapse .panel-body { color: %2$s !important; }';
    $custom_css .= sprintf( $css, esc_attr( $block_class ), esc_attr( $data['content_color'] ) );
}

if ( !empty( $data['content_bg_color'] ) ) {
    $css = '.%1$s .panel-collapse .panel-body { background-color: %2$s !important; }';
    $custom_css .= sprintf( $css, esc_attr( $block_class ), esc_attr( $data['content_bg_color'] ) );
}

if ( !empty( $data['panel_background_color'] ) ) {
	$css = '.%1$s .panel-heading{ background-color: %2$s !important; }';
	$custom_css .= sprintf( $css, esc_attr( $block_class ), esc_attr( $data['panel_background_color'] ) );
}
if ( !empty( $data['panel_active_background_color'] ) ) {
	$css = '.%1$s .panel-heading.active_panel{ background-color: %2$s !important; }';
	$custom_css .= sprintf( $css, esc_attr( $block_class ), esc_attr( $data['panel_active_background_color'] ) );
}

if ( !empty( $data['icon_color'] ) ) {
	$css = '.%1$s .accordion-icon { color: %2$s !important; }';
	$custom_css .= sprintf( $css, esc_attr( $block_class ), esc_attr( $data['icon_color'] ) );
}
if ( !empty( $data['icon_bg_color'] ) ) {
	$css = '.%1$s .accordion-icon { background-color: %2$s !important; }';
	$custom_css .= sprintf( $css, esc_attr( $block_class ), esc_attr( $data['icon_bg_color'] ) );
}
if ( !empty( $data['icon_color_active'] ) ) {
	$css = '.%1$s .active_panel .accordion-icon { color: %2$s !important; }';
	$custom_css .= sprintf( $css, esc_attr( $block_class ), esc_attr( $data['icon_color_active'] ) );
}
if ( !empty( $data['icon_bg_color_active'] ) ) {
	$css = '.%1$s .active_panel .accordion-icon { background-color: %2$s !important; }';
	$custom_css .= sprintf( $css, esc_attr( $block_class ), esc_attr( $data['icon_bg_color_active'] ) );
}

if ( !empty( $custom_css ) ) {
	do_action('slz_add_inline_style', $custom_css);
}