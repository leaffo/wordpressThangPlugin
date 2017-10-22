<?php if ( ! defined( 'ABSPATH' ) ) {
	die( 'Forbidden' );
}

class SLZ_Shortcode_Posts_Mansory extends SLZ_Shortcode
{
	protected $cacheable = false;
	protected function _render($atts, $content = null, $tag = '', $ajax = false)
	{
		if( !$ajax ){

            $data = $this->get_data( $atts );

        } else
            $data = $atts;

        $block = new SLZ_Block($data, $content);

		$this->enqueue_static();

		return slz_render_view($this->locate_path('/views/view.php'), array( 'block' => $block, 'instance' => $this ), true, false,true);
	}
}
