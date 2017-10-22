<?php if ( ! defined( 'ABSPATH' ) ) {
	die( 'Forbidden' );
}

class SLZ_Extension_FAQ extends SLZ_Extension {

	private $post_type_name = 'slz-faq';
	private $post_type_slug = 'faq';
	private $taxonomy_name = 'slz-faq-cat';
	private $taxonomy_slug = 'faq-cat';

	/**
	 * Called after all extensions instances was created
	 * @internal
	 */
	protected function _init() {
		$this->define_slugs();
		$this->register_post_type();
		$this->register_taxonomy();

		if ( is_admin() ) {
			$this->save_permalink_structure();
			$this->add_admin_filters();
			$this->add_admin_actions();
		} else {
			$this->add_theme_actions();
		}

		add_filter( 'slz_post_options', array( $this, '_filter_slz_post_options' ), 10, 2 );
	}

	/**
	 * Define slugs
	 */
	private function define_slugs() {
		$default_post_slug     = apply_filters( 'slz_ext_' . $this->get_name() . '_post_slug', $this->post_type_slug );
		$default_taxonomy_slug = apply_filters( 'slz_ext_' . $this->get_name() . '_taxonomy_slug', $this->taxonomy_slug );
		$this->post_type_slug  = $this->get_db_data( 'permalinks/post', $default_post_slug );
		$this->taxonomy_slug   = $this->get_db_data( 'permalinks/taxonomy', $default_taxonomy_slug );
	}

	/**
	 * Register post type
	 */
	private function register_post_type() {

		$post_names = apply_filters( 'slz_ext_' . $this->get_name() . '_post_type_name', array(
			'singular' => esc_html__( 'FAQ', 'slz' ),
			'plural'   => esc_html__( 'FAQ', 'slz' )
		) );

		$args = array(
			'labels'             => array(
				'name'               => esc_html__( $post_names['plural'], 'slz' ),
				'singular_name'      => esc_html__( $post_names['singular'], 'slz' ),
				'add_new'            => esc_html__( 'Add New', 'slz' ),
				'add_new_item'       => sprintf( esc_html__( 'Add New %s', 'slz' ), $post_names['singular'] ),
				'edit'               => esc_html__( 'Edit', 'slz' ),
				'edit_item'          => sprintf( esc_html__( 'Edit %s', 'slz' ), $post_names['singular'] ),
				'new_item'           => sprintf( esc_html__( 'New %s', 'slz' ), $post_names['singular'] ),
				'all_items'          => sprintf( esc_html__( 'All %s', 'slz' ), $post_names['plural'] ),
				'view'               => sprintf( esc_html__( 'View %s', 'slz' ), $post_names['singular'] ),
				'view_item'          => sprintf( esc_html__( 'View %s', 'slz' ), $post_names['singular'] ),
				'search_items'       => sprintf( esc_html__( 'Search %s', 'slz' ), $post_names['plural'] ),
				'not_found'          => sprintf( esc_html__( 'No %s Found', 'slz' ), $post_names['plural'] ),
				'not_found_in_trash' => sprintf( esc_html__( 'No %s Found In Trash', 'slz' ), $post_names['plural'] ),
				'parent_item_colon'  => '' /* text for parent types */
			),
			'description'        => esc_html__( 'Create a FAQ item', 'slz' ),
			'public'             => true,
			'show_ui'            => true,
			'show_in_menu'       => true,
			'publicly_queryable' => true,
			/* queries can be performed on the front end */
			'has_archive'        => true,
			'rewrite'            => array(
				'slug' => $this->post_type_slug
			),
			'menu_position'      => 23,
			'show_in_nav_menus'  => true,
			'menu_icon'          => 'dashicons-book-alt',
			'hierarchical'       => false,
			'query_var'          => true,
			/* Sets the query_var key for this post type. Default: true - set to $post_type */
			'supports'           => array(
				'title', /* Text input field to create a post title. */
				'editor',
			)
		);
		register_post_type( $this->post_type_name, $args );
	}

	/**
	 * Register taxonomy
	 */
	private function register_taxonomy() {
		$category_names = apply_filters( 'slz_ext_' . $this->get_name() . '_category_name', array(
			'singular' => esc_html__( 'Category', 'slz' ),
			'plural'   => esc_html__( 'Categories', 'slz' )
		) );

		$args = array(
			'labels'            => array(
				'name'              => sprintf( esc_html_x( 'FAQ %s', 'taxonomy general name', 'slz' ), $category_names['plural'] ),
				'singular_name'     => sprintf( esc_html_x( 'FAQ %s', 'taxonomy singular name', 'slz' ), $category_names['singular'] ),
				'search_items'      => sprintf( esc_html__( 'Search %s', 'slz' ), $category_names['plural'] ),
				'all_items'         => sprintf( esc_html__( 'All %s', 'slz' ), $category_names['plural'] ),
				'parent_item'       => sprintf( esc_html__( 'Parent %s', 'slz' ), $category_names['singular'] ),
				'parent_item_colon' => sprintf( esc_html__( 'Parent %s:', 'slz' ), $category_names['singular'] ),
				'edit_item'         => sprintf( esc_html__( 'Edit %s', 'slz' ), $category_names['singular'] ),
				'update_item'       => sprintf( esc_html__( 'Update %s', 'slz' ), $category_names['singular'] ),
				'add_new_item'      => sprintf( esc_html__( 'Add New %s', 'slz' ), $category_names['singular'] ),
				'new_item_name'     => sprintf( esc_html__( 'New %s Name', 'slz' ), $category_names['singular'] ),
				'menu_name'         => sprintf( esc_html__( '%s', 'slz' ), $category_names['plural'] )
			),
			'public'            => true,
			'hierarchical'      => true,
			'show_ui'           => true,
			'show_admin_column' => true,
			'query_var'         => true,
			'show_in_nav_menus' => true,
			'show_tagcloud'     => false,
			'rewrite'           => array(
				'slug' => $this->taxonomy_slug
			),
		);

		register_taxonomy( $this->taxonomy_name, $this->post_type_name, $args );
	}

	/**
	 * Save permalink structure
	 */
	private function save_permalink_structure() {
		if ( ! isset( $_POST['permalink_structure'] ) && ! isset( $_POST['category_base'] ) ) {
			return;
		}

		$this->set_db_data(
			'permalinks/post',
			SLZ_Request::POST(
				'slz_ext_faq_post_slug',
				apply_filters( 'slz_ext_' . $this->get_name() . '_post_slug', $this->post_type_slug )
			)
		);
		$this->set_db_data(
			'permalinks/taxonomy',
			SLZ_Request::POST(
				'slz_ext_faq_taxonomy_slug',
				apply_filters( 'slz_ext_' . $this->get_name() . '_taxonomy_slug', $this->taxonomy_slug )
			)
		);
	}

	/**
	 * Add admin filters
	 */
	private function add_admin_filters() {
		add_filter( 'manage_' . $this->post_type_name . '_posts_columns', array(
			$this,
			'_filter_add_columns'
		), 10, 1 );
	}

	/**
	 * Add admin actions
	 */
	private function add_admin_actions() {
		add_action(
			'manage_' . $this->post_type_name . '_posts_custom_column',
			array( $this, '_action_manage_custom_column' ),
			10,
			2
		);
		add_action( 'admin_enqueue_scripts', array( $this, '_action_enqueue_scripts' ) );
		add_action( 'admin_init', array( $this, '_action_add_permalink_in_settings' ) );
	}

	/**
	 * Add theme actions
	 */
	private function add_theme_actions() {
	}

	/**
	 * Filter post options
	 *
	 * @param $post_options
	 * @param $post_type
	 *
	 * @return mixed
	 */
	public function _filter_slz_post_options( $post_options, $post_type ) {
		if ( $post_type !== $this->post_type_name ) {
			return $post_options;
		}

		return $post_options;
	}

	/**
	 * Filter add Column
	 *
	 * @param $columns
	 *
	 * @return array
	 */
	public function _filter_add_columns( $columns ) {
		unset( $columns[ 'taxonomy-' . $this->taxonomy_name ] );

		return array_merge( array(
			'cb'                               => $columns['cb'],
			'title'                            => esc_html__( 'Title', 'slz' ),
			'taxonomy-' . $this->taxonomy_name => esc_html__( 'Categories', 'slz' ),
			'date'                             => esc_html__( 'Date', 'slz' ),
		), $columns );
	}

	/**
	 * Fill custom column data
	 *
	 * @param $column
	 * @param $post_id
	 */
	public function _action_manage_custom_column( $column, $post_id ) {
	}

	/**
	 * Enquee backend styles on teams pages
	 */
	public function _action_enqueue_scripts() {
	}

	/**
	 * Add permalink settings
	 */
	public function _action_add_permalink_in_settings() {
		add_settings_field(
			'slz_ext_faq_post_slug',
			esc_html__( 'FAQ base', 'slz' ),
			array( $this, '_post_slug_input' ),
			'permalink',
			'optional'
		);

		add_settings_field(
			'slz_ext_faq_taxonomy_slug',
			esc_html__( 'FAQ category base', 'slz' ),
			array( $this, '_taxonomy_slug_input' ),
			'permalink',
			'optional'
		);
	}

	/**
	 * Add post slug input
	 */
	public function _post_slug_input() {
		printf( '<input type="text" name="%1$s" value="%2$s"><code>%3$s</code>', 'slz_ext_faq_post_slug', $this->post_type_slug, '/my-faq' );
	}

	/**
	 * Add taxonomy slug input
	 */
	public function _taxonomy_slug_input() {
		printf( '<input type="text" name="%1$s" value="%2$s"><code>%3$s</code>', 'slz_ext_faq_taxonomy_slug', $this->taxonomy_slug, '/my-faq-category' );
	}

	/**
	 * Get post type slug
	 *
	 * @return string
	 */
	public function get_post_type_slug() {
		return $this->post_type_slug;
	}

	/**
	 * Get post type name
	 *
	 * @return string
	 */
	public function get_post_type_name() {
		return $this->post_type_name;
	}

	/**
	 * Get taxonomy name
	 *
	 * @return string
	 */
	public function get_taxonomy_name() {
		return $this->taxonomy_name;
	}

	/**
	 * Get link
	 *
	 * @return string
	 */
	public function _get_link() {
		return self_admin_url( 'edit.php?post_type=' . $this->get_post_type_name() );
	}

	/**
	 * Get image size
	 *
	 * @return mixed|null
	 */
	public function get_image_sizes() {
		return $this->get_config( 'image_sizes' );
	}

	/**
	 * AJAX FUNCTION
	 */

	/**
	 * AJAX FAQ FEEDBACK
	 */
	public function ajax_faq_feedback() {
		$success = false;
		$html    = '';
		if ( ! empty( $_POST['params'][0]['faqid'] ) && ! empty( $_POST['params'][0]['value'] ) ) {
			$faqid    = intval( $_POST['params'][0]['faqid'] );
			$helpful  = $_POST['params'][0]['value'] == 'yes';
			$feedback = get_post_meta( $faqid, 'slz_faq_feedback', true );
			if ( ! is_array( $feedback ) ) {
				$feedback = array(
					'helpful' => 0,
					'all'     => 0,
				);
			}
			if ( $helpful ) {
				$feedback['helpful'] = intval( $feedback['helpful'] ) + 1;
			}
			$feedback['all'] = intval( $feedback['all'] ) + 1;
			update_post_meta( $faqid, 'slz_faq_feedback', $feedback );
			$html = sprintf( esc_html__( '%1$s out of %2$s found this helpful.', 'slz' ), $feedback['helpful'], $feedback['all'] );
			$success = true;
		}
		header( 'Content-Type: application/json' );
		echo json_encode( compact( 'success', 'html' ) );
	}
}