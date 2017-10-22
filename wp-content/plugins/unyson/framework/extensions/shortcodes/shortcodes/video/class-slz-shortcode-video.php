<?php if ( ! defined( 'ABSPATH' ) ) {
	die( 'Forbidden' );
}

class SLZ_Shortcode_Video extends SLZ_Shortcode {

	protected function _render( $atts, $content = null, $tag = '', $ajax = false ) {
		$instance = $this;
		$data     = $this->get_data( $atts );
		$this->enqueue_static();

		$data['content'] = '';
		if ( function_exists( 'wpb_js_remove_wpautop' ) ) {
			$data['content'] = wpb_js_remove_wpautop( $content, true );
		}

		return slz_render_view( $this->locate_path( '/views/view.php' ), compact( 'instance', 'data' ) );
	}

	public function iframe_render( $video_url ) {
		$format = '<iframe src="%1$s" allowfullscreen="allowfullscreen" class="video-embed"></iframe>';
		return sprintf( $format, esc_url( $video_url ) );
	}

	public function get_video_thumb_general( $video_type, $video_id ) {
		$thumb = '';
		$video_info = SLZ_Util::get_video_info_meta( $video_type, $video_id );
		if( !empty( $video_info['thumb_url'] ) ) {
			$thumb = $video_info['thumb_url'];
		}
		return $thumb;
	}

	public function is_404( $url ) {
		$headers = get_headers( $url );
		if ( strpos( $headers[0], '404' ) !== false ) {
			return true;
		} else {
			return false;
		}
	}
}
