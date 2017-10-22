<?php if ( ! defined( 'ABSPATH' ) ) {
	die( 'Forbidden' );
}

$block_cls = $block->attributes['extra_class'] . ' ' . $block->attributes['block-class'];
$class_position = '';
if( !empty( $block->attributes['position'] ) ) {
	if( $block->attributes['position'] == 'right' ) {
		$class_position = 'right';
	}
}
$atts = $block->attributes;
$column = !empty($atts['column']) ? 'slz-column-'.$atts['column'] : 'slz-column-3';
$layout = $block->attributes['layout'];
$atts = $block->attributes;
//layout class
$cfg_layout_class = $instance->get_config('layouts_class');
if( isset($cfg_layout_class[$layout]) ) {
	$block_cls .= ' ' .$cfg_layout_class[$layout];
}
//style class
$cfg_style_default = $instance->get_config('style_default');
$p_style = $layout . '-style';
$style_default = ( !empty($cfg_style_default[$p_style])? $cfg_style_default[$p_style] : '' );
$style = ( !empty($atts[$p_style])? $atts[$p_style] : $style_default );
$params = array(
	'block' => $block,
	'instance' => $instance,
	'class_position' => $class_position
);

echo '<div class="sc_block_grid slz-shortcode '. esc_attr( $block_cls ) .'">';
	if( !empty( $atts['block_title'] ) ) {
		echo '<div class="' . esc_attr( $atts['block_title_class'] ) . '">' . esc_html($atts['block_title']) . '</div>';
	}
	if( $layout == 'layout-1' ) {
			echo slz_render_view( $instance->locate_path( '/views/layout-1.php' ), $params );
	}
	else {
		echo ( $block->render_category_tabs() );
		echo '<div class="slz-template-03 ' . esc_attr($block_cls).'">';
			echo '<div class="slz-list-block '. esc_attr( $column ) .' ' . esc_attr($style) . '">';
				switch ( $layout ) {
					case 'layout-2':
						echo slz_render_view( $instance->locate_path( '/views/layout-2.php' ), $params );
						break;
					case 'layout-3':
						echo slz_render_view( $instance->locate_path( '/views/layout-3.php' ), $params );
						break;
					case 'layout-4':
						echo slz_render_view( $instance->locate_path( '/views/layout-4.php' ), $params );
						break;
				}
			echo '</div>';
		echo '</div>';
		echo ( $block->get_pagination() );
	}
echo '</div>';
wp_reset_postdata();
