<?php if ( ! defined( 'ABSPATH' ) ) {
	die( 'Forbidden' );
}

$links = '';
if ( ! empty( $data['social'] ) ) {
	$socials = vc_param_group_parse_atts( $data['social'] );
	if ( ! empty( $socials ) ) {
		foreach ( $socials as $social ) {
			$link_arr    = '';
			$social_icon = $instance->get_icon_library_views( $social );
			$social_link = sprintf( '<a href="javascript:void(0);" class="link">%s</a>', wp_kses_post( $social_icon ) );
			if ( ! empty( $social['link'] ) ) {
				$link_arr = SLZ_Util::parse_vc_link( $social['link'] );
				if ( ! empty( $link_arr['url'] ) ) {
					$social_link = sprintf( '<a href="%1$s" class="link" %2$s>%3$s</a>', esc_url( $link_arr['url'] ), wp_kses_post( $link_arr['other_atts'] ), wp_kses_post( $social_icon ) );
				}
			}
			$links .= sprintf( '<li>%s</li>', $social_link );
		}
	}
}

if ( ! empty( $links ) ) {
	printf( '<div class="social-wrapper"><ul class="list-unstyled list-inline list-social-wrapper">%s</ul></div>', $links );
}
