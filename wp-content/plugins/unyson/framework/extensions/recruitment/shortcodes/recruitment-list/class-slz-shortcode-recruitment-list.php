<?php if ( ! defined( 'ABSPATH' ) ) {
	die( 'Forbidden' );
}

class SLZ_Shortcode_Recruitment_List extends SLZ_Shortcode
{
	protected function _render($atts, $content = null, $tag = '', $ajax = false)
	{
        $view_path = $this->locate_path('/views');

		if( !$ajax ){
            $data = $this->get_data( $atts );
        } else {
            $data = $atts;
        }

		$this->enqueue_static();

		$instance = $this;

		return slz_render_view($this->locate_path('/views/view.php'), compact( 'data', 'view_path', 'instance' ));
	}
}
