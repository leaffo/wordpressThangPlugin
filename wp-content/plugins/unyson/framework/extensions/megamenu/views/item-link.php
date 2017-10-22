<?php if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
/**
 * @var WP_Post $item
 * @var string $title
 * @var array $attributes
 * @var object $args
 * @var int $depth
 */
$icon_class = '';
$icon_dropdown_class = '';
if( isset($attributes['class'])) {
	$icon_dropdown_class = $attributes['class'];
}
if (
	slz()->extensions->get('megamenu')->show_icon()
	&&
	($icon = slz_ext_mega_menu_get_meta($item, 'icon'))
) {
	$icon_class = '<i class="icon-dropdown ' . trim( $icon_dropdown_class . " $icon" ) . '"></i>';
}

// Get Label From Menu Item
$label_text = slz_ext_mega_menu_get_meta( $item, 'sub_label', '' );
if( !empty( $label_text ) ) {
    $label_type = slz_ext_mega_menu_get_meta( $item, 'sub_label_type', 'default' );
    $label_text = sprintf( '<span class="label label-%2$s">%1$s</span>', $label_text, $label_type );
}

echo $args->before;
echo '<a ' . slz_attr_to_html( $attributes ) . '>' . $title . $icon_class . $label_text . '</a>';
echo $args->after;