<?php if ( ! defined( 'ABSPATH' ) ) {
	die( 'Forbidden' );
}

class SLZ_FAQ extends SLZ_Custom_Posttype_Model {

	private $post_type = 'slz-faq';
	private $post_taxonomy = 'slz-faq-cat';

	/**
	 * SLZ_FAQ constructor.
	 */
	public function __construct() {
		$this->meta_attributes();
		$this->set_meta_attributes();
		$this->taxonomy_cat = $this->post_taxonomy;
		$this->html_format  = $this->set_default_options();
		$this->set_default_attributes();
	}

	/**
	 * Init meta attributes
	 */
	private function meta_attributes() {
		$slz_merge_meta_atts = array();
		$meta_atts           = array();
		foreach ( $meta_atts as $key_gr => $value_gr ) {
			if ( is_array( $value_gr ) ) {
				foreach ( $value_gr as $key => $value ) {
					$slz_merge_meta_atts[ $key_gr . '/' . $key ] = $value;
				}
			}
		}
		$this->post_meta_atts = array_merge( $meta_atts, $slz_merge_meta_atts );
	}

	/**
	 * Set meta attributes
	 */
	private function set_meta_attributes() {
		$meta_arr       = array();
		$meta_label_arr = array();
		foreach ( $this->post_meta_atts as $att => $name ) {
			$key                    = $att;
			$meta_arr[ $key ]       = '';
			$meta_label_arr[ $key ] = $name;
		}
		$this->post_meta_def   = $meta_arr;
		$this->post_meta       = $meta_arr;
		$this->post_meta_label = $meta_label_arr;
	}

	/**
	 * Set default options
	 *
	 * @param array $html_options
	 *
	 * @return array
	 */
	private function set_default_options( $html_options = array() ) {
		$defaults = array(
			'category'     => '<div class="slz-category"><span class="text">%1$s</span></div>',
			'title_info'   => '<div class="slz-title-shortcode">%1$s</div>',
			'title_format' => '<a href="%2$s" class="block-title">%1$s</a>',
		);

		$html_options      = array_merge( $defaults, $html_options );
		$this->html_format = $html_options;

		return $html_options;
	}

	/**
	 * Set default atributes
	 */
	private function set_default_attributes() {
		$default_atts     = array(
			'layout'        => 'faq',
			'style'         => 'style-1',
			'limit_post'    => '-1',
			'offset_post'   => '0',
			'sort_by'       => '',
			'post_id'       => '',
			'filter_method' => '',
			'list_category' => '',
			'list_post'     => '',
		);
		$this->attributes = $default_atts;
	}

	/**
	 * Init model
	 *
	 * @param array $atts
	 * @param array $query_args
	 */
	public function init( $atts = array(), $query_args = array() ) {
		// set attributes
		$atts = array_merge( $this->attributes, $atts );

		if ( empty( $atts['post_id'] ) ) {
			if ( $atts['filter_method'] == 'category' ) {
				if ( empty( $atts['category_slug'] ) ) {
					list( $atts['category_list_parse'], $atts['category_slug'] ) = SLZ_Util::get_list_vc_param_group( $atts, 'list_category', 'category_slug' );
				}
				$atts['post_id'] = $this->parse_cat_slug_to_post_id( $this->taxonomy_cat, $atts['category_slug'], $this->post_type );
			} else {
				if ( isset( $atts['list_post'] ) && function_exists( 'vc_param_group_parse_atts' ) ) {
					$list_post       = (array) vc_param_group_parse_atts( $atts['list_post'] );
					$atts['post_id'] = $this->parse_list_to_array( 'post_id', $list_post );
				}
			}
		}
		$this->attributes = $atts;

		// query
		$default_args = array(
			'post_type' => $this->post_type,
		);
		$query_args   = array_merge( $default_args, $query_args );
		// setting
		$this->setting( $query_args );
	}

	/**
	 * Seting
	 *
	 * @param $query_args
	 */
	private function setting( $query_args ) {
		if ( ! isset( $this->attributes['uniq_id'] ) ) {
			$this->attributes['uniq_id'] = $this->post_type . '-' . SLZ_Com::make_id();
		}

		$this->query      = $this->get_query( $query_args, $this->attributes );
		$this->post_count = 0;
		if ( $this->query->have_posts() ) {
			$this->post_count = $this->query->post_count;
		}
		$this->get_thumb_size();
		$this->set_responsive_class();

		$custom_css = $this->add_custom_css();
		if ( $custom_css ) {
			do_action( 'slz_add_inline_style', $custom_css );
		}
	}

	/**
	 * Get thumb size
	 */
	private function get_thumb_size() {
		if ( isset( $this->attributes['image_size'] ) && is_array( $this->attributes['image_size'] ) ) {
			$this->attributes['thumb-size'] = SLZ_Util::get_thumb_size( $this->attributes['image_size'], $this->attributes );
		}
	}

	/**
	 * Set resposive class
	 *
	 * @param array $atts
	 */
	public function set_responsive_class( $atts = array() ) {
	}

	/**
	 * Add custom css
	 * @return string
	 */
	public function add_custom_css() {
		$custom_css = '';

		return $custom_css;
	}

	/**
	 * Reset post data
	 */
	public function reset() {
		wp_reset_postdata();
	}

	/**
	 * Pagination
	 */
	public function pagination() {
		if ( ! empty( $this->attributes['pagination'] ) && $this->attributes['pagination'] == 'y' ) {
			echo SLZ_Pagination::paging_nav( $this->query->max_num_pages, 2, $this->query );
		}
	}

	/**
	 * Get entry time
	 *
	 * @param array $html_options
	 * @param bool $echo
	 *
	 * @return string
	 */
	public function get_entry_time( $html_options = array(), $echo = false ) {
		$out    = '';
		$format = esc_html__( 'Last updated', 'slz' ) . ' %s ' . esc_html__( 'ago', 'slz' );
		if ( ! empty( $html_options['entry_time'] ) ) {
			$format = $html_options['entry_time'];
		}
		$time = human_time_diff( get_the_time( 'U' ), current_time( 'timestamp' ) );
		$out  = sprintf( $format, $time );
		if ( $echo ) {
			echo wp_kses_post( $out );
		} else {
			return $out;
		}
	}

	public function get_faq_feedback() {
		$feedback = get_post_meta( $this->post_id, 'slz_faq_feedback', true );
		if ( ! is_array( $feedback ) ) {
			$feedback = array(
				'helpful' => 0,
				'all'     => 0,
			);
		}
		$helpful = intval( $feedback['helpful'] );
		$all     = intval( $feedback['all'] );
		?>
        <div class="faq-feedback">
            <div>
                <div class="title"><?php esc_html_e( 'Was this article helpful?', 'slz' ); ?></div>
                <div class="group-button">
                    <button type="button" class="btn" data-value="yes" data-faqid="<?php echo get_the_ID(); ?>"><i
                                class="icons ion-ios-checkmark-empty"></i><?php esc_html_e( 'Yes', 'slz' ); ?>
                    </button>
                    <button type="button" class="btn" data-value="no" data-faqid="<?php echo get_the_ID(); ?>"><i
                                class="icons ion-ios-close-empty"></i><?php esc_html_e( 'No', 'slz' ); ?></button>
                </div>
                <div class="block-info"><?php printf( esc_html__( '%1$s out of %2$s found this helpful.', 'slz' ), $helpful, $all ) ?></div>
            </div>
            <div class="support"><?php esc_html_e( 'Find answers to your support questions and join the discussion in our', 'slz' ); ?>
                <a href="#"><?php esc_html_e( 'Help Community', 'slz' ); ?></a></div>
        </div>
		<?php
	}

	/**
	 * Get related posts by category
	 *
	 * @return bool|SLZ_FAQ
	 */
	public function get_related_articles( $args = array() ) {
		$model = false;

		$args = array_merge( array(
			'limit_post' => 5,
		), $args );

		if ( $this->post_id ) {
			$model = new SLZ_FAQ();
			$model->init( $args, array(
				'post_type'    => $this->post_type,
				'category__in' => wp_get_post_categories( $this->post_id ),
				'post__not_in' => array( $this->post_id ),
			) );
		}

		return $model;
	}

}