<?php if ( ! defined( 'ABSPATH' ) ) {
	die( 'Forbidden' );
}

$data['uniq_id'] = 'icons-block-'.SLZ_Com::make_id();
$block_class[] = $data['uniq_id'] .' '.$data['extra_class'];

$cfg_layout_class = $instance->get_config('layouts_class');

if( isset($cfg_layout_class[$data['layout']]) ) {
	$block_class[] = $cfg_layout_class[$data['layout']];
}

$block_class = implode(' ', $block_class );

$class = $css = $custom_css = $tab = '';
$x = 0;


$shortcode = slz_ext( 'shortcodes' )->get_shortcode('tabs');
$icon_default_value  = $shortcode->get_config('icon_default_value');

if ( is_plugin_active( 'js_composer/js_composer.php' ) ) {

	if ( !empty( $data['content'] ) ) {
		$section_tab_info = array();

		$arr = explode("[/vc_tta_section]", $data['content']);

		if ( !empty( $arr ) ) {
			$data['tab_array'] = array();
			$tab .= '<ul role="tablist" class="tab-list tab-list-carousel">';
				foreach ($arr as $shortcode) {
					if ( empty( $shortcode ) ) {
						continue;
					}else{
						$t         = array();
						$i         = array();
						$a         = array();
						$i_type    = $add_icon = $icon = $icon_group =array();
						$title     = '';
						$tab_id    = '';
						$image     = '';

						preg_match( '/title="([^"]*)"/i', $shortcode, $t ) ;
						preg_match( '/tab_id="([^"]*)"/i', $shortcode, $i ) ;
						preg_match( '/vc_tta_section image="([^"]*)"/i', $shortcode, $a );
						preg_match( '/add_icon="([^"]*)"/i', $shortcode, $add_icon ) ;
						preg_match( '/desc="([^"]*)"/i', $shortcode, $desc) ;
						
						if(!empty($add_icon) && $add_icon[1] == 'true'){
							
							preg_match( '/i_type="([^"]*)"/i', $shortcode, $i_type ) ;
							
							if( empty($i_type)) {
								$i_type = array(
									'i_type="i_icon_fontawesome"',
									'fontawesome',
								);
							}
							if(!empty($i_type)){
								preg_match( '/i_icon_'.$i_type[1].'="([^"]*)"/i', $shortcode, $icon ) ;
								$icon_group['i_type'] = $i_type[1];
								if(!empty($icon)){
									$icon_group['i_icon_'.$i_type[1]] =  $icon[1];
								}
							}

							$icon_group = array_merge($icon_default_value,$icon_group);
							
						}
						
						if(!empty($t)){
							$title  .= $t[1];
						}
						if(!empty($i)){
							$tab_id .= $i[1];
						}
						if(!empty($a)){
							$image .= $a[1];
						}
						if ( $x == 0 ) {
							$class = 'active';
						}else{
							$class = '';
						}

						$li_class = (!empty($image))? 'tab-image' : '';
						$tab .= '
							<li role="presentation" class="'.esc_attr( $class ).' '.esc_attr($li_class).'">
								<a href="#tab-'.esc_attr( $tab_id ).'" role="tab" data-toggle="tab" class="link">
								<span class="icon-wrapper">';

									if(!empty($icon_group)){

										$tab .= '<i class="slz-icon '.esc_attr($icon_group['i_icon_'.$icon_group['i_type']]).'"></i>';

									}else if ( !empty( $image ) ) {

										$tab .= '<img src="'. esc_url( wp_get_attachment_url( $image ) ) .'" alt="" class="img-full">';

									}
								$tab .= '</span>
								<span class="content-wrapper">';

									$tab .= '<span class="title">'. esc_html( $title ) .'</span>';
							
									if( !empty($desc[1]) ) {
										$tab .= '<span class="desc">'. wp_kses_post( $desc[1] ) .'</span>';
									}
							
						$tab .= '	</span>
								</a>
							</li>
						';
						array_push($data['tab_array'], array($title, $tab_id));
						$x++;
					}

				}// end foreach

			$tab .= '</ul>';
			$data['tab'] = $tab;

		}

		$data['content'] = wpb_js_remove_wpautop( $data['content'] );
		
		echo '<div class="slz_shortcode sc_tabs '.esc_attr( $block_class ).'">';
			echo '<div class="'.esc_attr($data[''.$data['layout'].'-style']).'">';
			switch ( $data['layout'] ) {
				case 'layout-1':
					echo slz_render_view( $instance->locate_path('/views/layout-1.php'), compact('data'));
					break;
				case 'layout-2':
					echo slz_render_view( $instance->locate_path('/views/layout-2.php'), compact('data'));
					break;
				default:
					echo slz_render_view( $instance->locate_path('/views/layout-1.php'), compact('data'));
					break;
			}
			echo '</div>';
		echo '</div>';

	}// end if

}else{
	echo esc_html__( 'Please Active Visual Composer', 'slz' );
}