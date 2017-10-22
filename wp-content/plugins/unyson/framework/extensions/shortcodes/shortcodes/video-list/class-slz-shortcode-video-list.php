<?php if ( ! defined( 'ABSPATH' ) ) {
	die( 'Forbidden' );
}

class SLZ_Shortcode_Video_List extends SLZ_Shortcode
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

		return slz_render_view($this->locate_path('/views/view.php'), array( 'data' => $data, 'instance' => $this ) );
	}
	public function iframe_render( $video_url ) {
		$format = '<iframe src="%1$s" allowfullscreen="allowfullscreen" class="video-embed"></iframe>';
		return sprintf($format, esc_url( $video_url ) );
	}


	/**
	 * Get Video thumbnail
	 * Notice: Use SLZ_Util::get_video_info_meta method instead.
	 * @param $video_type
	 * @param $video_id
	 * @return string
	 */
	public function get_video_thumb_general( $video_type, $video_id ) {
		$thumb = '';
		$video_info = SLZ_Util::get_video_info_meta( $video_type, $video_id );
		if( !empty( $video_info['thumb_url'] ) ) {
			$thumb = $video_info['thumb_url'];
		}
		return $thumb;
	}

}
