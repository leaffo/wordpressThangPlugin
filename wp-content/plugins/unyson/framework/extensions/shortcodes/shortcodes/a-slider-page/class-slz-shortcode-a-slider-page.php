<?php

class SLZ_Shortcode_A_Slider_Page extends SLZ_Shortcode {
	protected function _render( $atts, $content = null, $tag = '', $ajax = false ) {


		$data            = $this->get_data( $atts );
		$data['content'] = $content;
		$this->enqueue_static();
		$view = $this->locate_path( '/views' );

		return slz_render_view( $this->locate_path( '/views/view.php' ), array(
			'data'     => $data,
			'instance' => $this,
			'view'     => $view,
		), true, false );

	}

}


?>