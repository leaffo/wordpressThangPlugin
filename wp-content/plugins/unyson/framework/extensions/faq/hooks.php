<?php if ( ! defined( 'ABSPATH' ) ) {
	die( 'Forbidden' );
}

$taxonomy = 'slz-faq-cat';

add_filter( 'template_include', '_filter_slz_ext_faq_template_include' );
if ( ! function_exists( '_filter_slz_ext_faq_template_include' ) ) {
	/**
	 * Select custom page template on frontend
	 *
	 * @param $template
	 *
	 * @return false|string
	 */
	function _filter_slz_ext_faq_template_include( $template ) {
		$ext       = slz()->extensions->get( 'faq' );
		$post_type = $ext->get_post_type_name();
		$taxonomy  = $ext->get_taxonomy_name();

		if ( is_singular( $post_type ) && $ext->locate_view_path( 'single' ) ) {
			return $ext->locate_view_path( 'single' );
		} elseif ( ( is_post_type_archive( $post_type ) || is_tax( $taxonomy ) ) && $ext->locate_view_path( 'archive' ) ) {

			/** Footer Top Content */
			add_filter( 'slz_footer_top_show_other_content', function ( $value ) {
				$fc_display = slz_get_db_settings_option( 'faq-ac-footer-top-other-content/switch', '' );
				if ( empty( $fc_display ) ) {
					return $value;
				} elseif ( $fc_display != 'custom' ) {
					return 'hide';
				}

				add_filter( 'slz_enable_footer_top', function ( $value ) {
					return 'enable';
				} );
				
				add_filter( 'slz_footer_top_other_content', function ( $value ) {
					$fc_content = slz_get_db_settings_option( 'faq-ac-footer-top-other-content/custom/content', '' );

					return $fc_content;
				} );

				return 'show';
			} );

			return $ext->locate_view_path( 'archive' );
		}

		return $template;
	}
}

