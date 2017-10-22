<?php if ( ! defined( 'ABSPATH' ) ) {
	die( 'Forbidden' );
}

class SLZ_Shortcode_Gallery_Masonry extends SLZ_Shortcode
{
	protected function _render($atts, $content = null, $tag = '', $ajax = false){

		$view_path = $this->locate_path('/views');

		if( !$ajax ){
			$data = $this->get_data( $atts );
		} else {
			$data = $atts;
		}

		$this->enqueue_static();
		
		return slz_render_view($this->locate_path('/views/view.php'), array('data' => $data, 'view_path' => $view_path, 'instance' => $this), true, false, true);
	}
	public function ajax_load_more_func(){
		$view_path = $this->locate_path('/views');
		$data = array();
		if ( !empty( $_POST['params'][0] ) ) {
			$data = $_POST['params'][0];
		}
		echo slz_render_view($this->locate_path('/views/ajax_view.php'), array('data' => $data, 'view_path' => $view_path, 'instance' => $this), true, false, true);
	}
}
