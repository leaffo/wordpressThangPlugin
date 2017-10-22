<?php if ( ! defined( 'ABSPATH' ) ) {
	die( 'Forbidden' );
}

class SLZ_Shortcode_Ads_Banner_Carousel extends SLZ_Shortcode {

	protected function _render( $atts, $content = null, $tag = '', $ajax = false ) {
		$instance = $this;
		$data     = $ajax ? $atts : $this->get_data( $atts );
		$this->enqueue_static();

		return slz_render_view( $this->locate_path( '/views/view.php' ), compact( 'instance', 'data' ), true, true );
	}

}
