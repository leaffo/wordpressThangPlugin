<?php if ( ! defined( 'ABSPATH' ) ) {
	die( 'Forbidden' );
}

class SLZ_Shortcode_Faq_Block extends SLZ_Shortcode {

	protected function _render( $atts, $content = null, $tag = '', $ajax = false ) {
		$instance  = $this;
		$view_path = $this->locate_path( '/views' );
		$data      = $ajax ? $atts : $this->get_data( $atts );
		$this->enqueue_static();

		return slz_render_view( $this->locate_path( '/views/view.php' ), compact( 'instance', 'view_path', 'data' ) );
	}

}
