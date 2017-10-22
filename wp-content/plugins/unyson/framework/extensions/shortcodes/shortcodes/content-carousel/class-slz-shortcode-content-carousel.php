<?php if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class SLZ_Shortcode_Content_Carousel extends SLZ_Shortcode
{
	protected function _render($atts, $content = null, $tag = '', $ajax = false)
	{
		$instance = $this;
		$view_path = $this->locate_path('/views');

			$data = $this->get_data( $atts );

		$this->enqueue_static();

		return slz_render_view($this->locate_path('/views/view.php'), compact( 'data', 'view_path', 'instance' ));
	}
}
