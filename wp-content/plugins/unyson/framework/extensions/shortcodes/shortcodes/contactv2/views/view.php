<?php if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
if ( ! is_plugin_active( 'js_composer/js_composer.php' ) ) {
	return;
}

$uniq_id = 'sc-contact-'.SLZ_Com::make_id();

$block_class[] = $uniq_id.' '.$data['extra_class']. ' ';

$cfg_layout_class = $instance->get_config('layouts_class');

if( isset($cfg_layout_class[$data['layout']]) ) {
    $block_class[] = $cfg_layout_class[$data['layout']];
}
$block_class = implode(' ', $block_class );
$shortcode = slz_ext( 'shortcodes' )->get_shortcode( 'contactv2' );

$info_default  = $shortcode->get_config( 'default_info' );

$main_info_default =  $shortcode->get_config( 'default_main_info' );

$sub_info_default = $shortcode->get_config( 'default_sub_info' );

/*----------content html----------*/

$data['array_info']  =  vc_param_group_parse_atts( $data['array_info'] );

$column = $data['column'];

$class_col = '';
if(  $column == 1 ){
    $class_col = 'slz-column-1';
}
else if(  $column == 2 ){
    $class_col = 'slz-column-2';
}
else if(  $column == 3 ){
    $class_col = 'slz-column-3';
}
else if(  $column == 4 ){
    $class_col = 'slz-column-4';
}

$col_info = array_chunk( $data['array_info'], $column );

?>
<div class="slz-shortcode sc_contact <?php echo esc_attr( $block_class );?>">
    <div class="<?php echo esc_attr($data[''.$data['layout'].'-style'])?>">
	   <?php foreach ( $col_info as  $block_info ): ?>
        <div class="slz-list-block slz-list-contact-01 slz-list-column <?php echo esc_attr( $class_col ); ?>">
            <?php foreach ( $block_info as $info ): ?>
                <?php $info = array_merge($info_default, $info); ?>
                <div class="item <?php  if ( $info['active'] == 'yes') { echo esc_attr( 'active'); } ?>">
                    <div class="slz-contact-01">
                        
                        <div class="contact-main-icon">
                            <i class="slz-icon <?php echo esc_attr( $shortcode->get_icon_library_views( $info, '%1$s' ) ); ?>"></i>
                        </div>
                        <div class="contact-content sub-item">
                            <?php
                        if ( ! empty( $info['title'] ) ) {  ?>
                        <div class="title"><?php echo wp_kses_post( nl2br( $info['title'] ) ); ?></div>
                        <?php
                        } ?>
                            <?php
                            if ( ! empty( $info['array_sub_info_item'] ) ) {
                                $info['array_sub_info_item'] = vc_param_group_parse_atts( $info['array_sub_info_item'] );
                                foreach ( $info['array_sub_info_item'] as $item ) {
                                    $item = array_merge($sub_info_default, $item);
                                    if( ! empty( $item['sub_info'] ) ) {
                            ?>
                                    <div class="contact-item">
                                        <i class="slz-icon <?php echo esc_attr( $shortcode->get_icon_library_views( $item, '%1$s' ) ); ?>"></i>
                                        <div class="text"><?php echo wp_kses_post( nl2br( $item['sub_info'] ) ); ?></div>
                                    </div>
                            <?php
                                    }
                                }
                            }

                            ?>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
        <?php endforeach; ?>
    </div>
</div>


<?php

/*------Custom Css--------*/

$css =  $custom_css = '';

if ( !empty( $data['title_color'] ) ) {
	$css = '
		.%1$s .title {
			color: %2$s !important;
		}
	';
	$custom_css .= sprintf( $css, esc_attr( $uniq_id ), esc_attr( $data['title_color'] ) );
}

if ( !empty( $data['info_color'] ) ) {
	$css = '
		.%1$s .contact-content .contact-item {
			color: %2$s !important;
		}
	';
	$custom_css .= sprintf( $css, esc_attr( $uniq_id ), esc_attr( $data['info_color'] ) );
}

if ( !empty( $data['info_hv_color'] ) ) {
    $css = '
        .%1$s .slz-contact-01:hover .contact-content .contact-item {
            color: %2$s !important;
        }
    ';
    $custom_css .= sprintf( $css, esc_attr( $uniq_id ), esc_attr( $data['info_hv_color'] ) );
}

if ( !empty( $data['main_icon_color'] ) ) {
    $css = '
        .%1$s .slz-contact-01 .contact-main-icon .slz-icon {
            color: %2$s !important;
        }
    ';
    $custom_css .= sprintf( $css, esc_attr( $uniq_id ), esc_attr( $data['main_icon_color'] ) );
}

if ( !empty( $data['main_icon_hv_color'] ) ) {
    $css = '
        .%1$s .slz-contact-01:hover .contact-main-icon .slz-icon {
            color: %2$s !important;
        }
    ';
    $custom_css .= sprintf( $css, esc_attr( $uniq_id ), esc_attr( $data['main_icon_hv_color'] ) );
}

if ( !empty( $data['main_ic_bg_color'] ) ) {
    $css = '
        .%1$s .slz-contact-01 .contact-main-icon .slz-icon {
            background-color: %2$s !important;
        }
    ';
    $custom_css .= sprintf( $css, esc_attr( $uniq_id ), esc_attr( $data['main_ic_bg_color'] ) );
}

if ( !empty( $data['main_ic_bg_hv_color'] ) ) {
    $css = '
        .%1$s .slz-contact-01:hover .contact-main-icon .slz-icon {
            background-color: %2$s !important;
        }
    ';
    $custom_css .= sprintf( $css, esc_attr( $uniq_id ), esc_attr( $data['main_ic_bg_hv_color'] ) );
}

if ( !empty( $data['sub_icon_color'] ) ) {
    $css = '
        .%1$s .contact-content .contact-item .slz-icon {
            color: %2$s !important;
        }
    ';
    $custom_css .= sprintf( $css, esc_attr( $uniq_id ), esc_attr( $data['sub_icon_color'] ) );
}

if ( !empty( $data['sub_icon_hv_color'] ) ) {
    $css = '
        .%1$s .slz-contact-01:hover .contact-content .contact-item .slz-icon {
            color: %2$s !important;
        }
    ';
    $custom_css .= sprintf( $css, esc_attr( $uniq_id ), esc_attr( $data['sub_icon_hv_color'] ) );
}

if ( !empty( $data['border_color'] ) ) {
	$css = '
		.%1$s .slz-list-contact-01 .item + .item:before {
			background-color: %2$s !important;
		}
	';
	$custom_css .= sprintf( $css, esc_attr( $uniq_id ), esc_attr( $data['border_color'] ) );
}

if ( !empty( $data['bg_color'] ) ) {
	$css = '
		.%1$s .slz-contact-01 {
			background-color: %2$s !important;
		}
	';
	$custom_css .= sprintf( $css, esc_attr( $uniq_id ), esc_attr( $data['bg_color'] ) );
}

if ( !empty( $data['bg_hv_color'] ) ) {
    $css = '
        .%1$s .slz-contact-01:hover {
            background-color: %2$s !important;
        }
    ';
    $custom_css .= sprintf( $css, esc_attr( $uniq_id ), esc_attr( $data['bg_hv_color'] ) );
}

if ( !empty( $data['des_color'] ) ) {
    $css = '
		.%1$s .slz-list-contact-01 .blur{
			color: %2$s !important;
		}
	';
    $custom_css .= sprintf( $css, esc_attr( $uniq_id ), esc_attr( $data['des_color'] ) );
}

if ( !empty( $data['bd_color'] ) ) {
    $css = '
        .%1$s .slz-contact-01{
            border-color: %2$s !important;
        }
    ';
    $custom_css .= sprintf( $css, esc_attr( $uniq_id ), esc_attr( $data['bd_color'] ) );
}

if ( !empty( $data['bd_hv_color'] ) ) {
    $css = '
        .%1$s .slz-contact-01:hover{
            border-color: %2$s !important;
        }
    ';
    $custom_css .= sprintf( $css, esc_attr( $uniq_id ), esc_attr( $data['bd_hv_color'] ) );
}

if ( !empty( $custom_css ) ) {
	do_action( 'slz_add_inline_style', $custom_css );
}
?>