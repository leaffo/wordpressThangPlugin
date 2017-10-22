<?php if ( ! defined( 'ABSPATH' ) ) {
	die( 'Forbidden' );
}

class SLZ_Shortcode_About_Me extends SLZ_Shortcode
{
	protected function _render( $atts, $content = null, $tag = '', $ajax = false ) {
		$instance  = $this;
		$view_path = $this->locate_path( '/views' );
		$defaults  = $this->get_config( 'default_value' );
		$data      = shortcode_atts( $defaults, $atts );
		$this->enqueue_static();

		return slz_render_view( $this->locate_path( '/views/view.php' ), compact( 'instance', 'view_path', 'data' ) );
	}
}
