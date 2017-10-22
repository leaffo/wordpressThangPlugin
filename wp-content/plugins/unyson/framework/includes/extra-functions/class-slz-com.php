<?php
/**
 * Data Com class.
 * 
 * @since 1.0
 */
class SLZ_Com {

	public static function get_regist_sidebars( $exclude = array() ) {
		global $wp_registered_sidebars;
		$result = array();
		foreach( (array)$wp_registered_sidebars as $key => $sidebar ) {
			if( empty($exclude) || ( $exclude && ! in_array( $key, $exclude ) ) ) {
				$result[$key] = $sidebar['name'];
			}
			
		}
		return $result;
	}

	public static function get_regist_menu(){

		$result = array();

		$nav_menu = wp_get_nav_menus();

		if ( empty ( $nav_menu ) ) 
			return array();

		foreach ($nav_menu as $obj_menu) {

			$result[ $obj_menu->term_id ] = $obj_menu->name;

		}

		return $result;

	}

	public static function get_advertisement_list(){

		$advertisement_key = apply_filters('slz-theme-settings-advertisement-key', 'advertisement-popup');

		$data = slz_get_db_settings_option( $advertisement_key, array() );

		$result = array();

		foreach ($data as $key => $value) {
			
			$result[ $value['area_name'] ] = $value['area_name'];

		}

		return $result;

	}

	public static function get_advertisement( $ads, $class = 'img-responsive' ){

		if ( empty ( $ads ) )
			return;

		$advertisement_key = apply_filters('slz-theme-settings-advertisement-key', 'advertisement-popup');

		$data = slz_get_db_settings_option( $advertisement_key );

		$result = array();

		$html = '';

		foreach ($data as $key => $value) {
			
			if ( $value['area_name'] == $ads ){

				$result = $value;

				break;

			} 

		}

		if ( empty ( $result ) ) 
			return;

		if ( $result ['advertisement-group']['type'] == 'disable' )
			return;

		if ( $result ['advertisement-group']['type'] == 'image' ){

			$ads = $result ['advertisement-group']['image'];

			$image = !empty ( $ads['image-source']['url'] ) ? $ads['image-source']['url'] : '';

			$link = !empty ( $ads['image-link'] ) ? $ads['image-link'] : '';

			$alt = !empty ( $ads['image-alt'] ) ? $ads['image-alt'] : '';

			$target = ( !empty ( $ads['image-new-tab'] ) && $ads['image-new-tab'] == 'yes' ) ? 'target="_blank"' : '';

			$html .= '<a href="' . esc_url ( $link ) . '" class="link" ' . esc_html ( $target ) . '><img src="' . esc_url ( $image ) . '" alt="' . esc_attr( $alt ) . '" class="' . esc_attr ( $class ) . '"></a>';

		}

		if ( $result ['advertisement-group']['type'] == 'custom_code' ){

			$ads = $result ['advertisement-group']['custom_code'];

			$html .= $ads['html-code'];

		}

		return $html;

	}

	public static function get_user_login2id( $args = array(), $params = array() ) {
		$result = array();
		$users = get_users( $args );
		if(isset($params['empty'])) {
			$result[$params['empty']] = '';
		}
		if( $users ) {
			foreach( $users as $row ) {
				$result[$row->user_login] = $row->ID;
			}
		}
		return $result;
	}

	public static function get_user_id2login( $args = array(), $params = array() ) {
		$result = array();
		$users = get_users( $args );
		if(isset($params['empty'])) {
			$result[$params['empty']] = '';
		}
		if( $users ) {
			
			foreach( $users as $row ) {
				$result[$row->ID] = $row->display_name;
			}
		}
		return $result;
	}

	/**
	 * Get list page (post_title=>ID)
	 * 
	 */
	public static function get_page_title2id( $args = array() ) {
		$result = array();
		if( ! empty( $args ) ) {
			$records = get_pages( $args );
		} else {
			$records = get_pages();
		}
		if( $records ) {
			foreach( $records as $row ) {
				$key = $row->post_title;
				$val = $row->ID;
				$result[$key] = $val;
			}
		}
		return $result;
	}

	/**
	 * Get list page (ID=>post_title)
	 * 
	 */
	public static function get_page_id2title( $args = array() ) {
		$result = array();
		if( ! empty( $args ) ) {
			$records = get_pages( $args );
		} else {
			$records = get_pages();
		}
		if( $records ) {
			foreach( $records as $row ) {
				$result[$row->ID] = $row->post_title;
			}
		}
		return $result;
	}

	/**
	 * Get list post (post_name => post_title)
	 *
	 * $args = array('post_type' => 'my_posttype', 'post_status' => 'publish', ...);
	 *
	 * @param array $args
	 * @return array
	 */
	public static function get_post_name2title( $args = array(), $options = array() ) {
		$empty = '';
		if( isset( $options['empty'] ) ) {
			$empty = $options['empty'];
		}
		$defaults = array(
			'posts_per_page'   => -1,
			'post_status'      => 'publish',
			'suppress_filters' => false,
		);
		$args = array_merge( $defaults, $args );
		$result = array( '' => $empty );
		$records = get_posts( $args );
		if( $records ) {
			foreach( $records as $row ) {
				$key = $row->post_name;
				$val = $row->post_title;
				$val = empty($val) ? $key : $val;
				$result[$key] = $val;
			}
		}
		return $result;
	}
	/**
	 * Get list post (post_title => post_name)
	 *
	 * $args = array('post_type' => 'my_posttype', 'post_status' => 'publish', ...);
	 *
	 * @param array $args
	 * @return array
	 */
	public static function get_post_title2name( $args = array(), $options = array() ) {
		$empty = '';
		if( isset( $options['empty'] ) ) {
			$empty = $options['empty'];
		}
		$defaults = array(
			'posts_per_page'   => -1,
			'post_status'      => 'publish',
			'suppress_filters' => false,
		);
		$args = array_merge( $defaults, $args );
		$result = array( $empty => '');
		$records = get_posts( $args );
		if( $records ) {
			foreach( $records as $row ) {
				$key = $row->post_title;
				$val = $row->post_name;
				$key = empty($key) ? $val : $key;
				$result[$key] = $val;
			}
		}
		return $result;
	}

	/**
	 * Get all taxonomy
	 * 
	 */
	public static function get_all_tax_options( $taxonomy ) {
		$result = array();
		$terms = get_terms( $taxonomy );
		if ( ! empty( $terms ) && ! is_wp_error( $terms ) ){
			$result = $terms;
		}
		return $result;
	}

	/**
	 * Get taxonomy by post
	 * 
	 */
	public static function get_tax_options_by_post( $post_id, $taxonomy, $options = array() ) {
		$result = '';
		$terms = get_the_terms( $post_id, $taxonomy );
		if ($terms && ! is_wp_error($terms)) {
			$term_slugs_arr = array();
			foreach ($terms as $term) {
				$term_slugs_arr[] = $term->slug;
			}
			$result = $term_slugs_arr;
			if( isset( $options['delimiter'] )) {
				$terms_slug_str = join( $options['delimiter'], $term_slugs_arr);
				$result = $terms_slug_str;
			}
		}
		return $result;
	}

	/**
	 * Get taxonomy by id
	 * 
	 */
	public static function get_tax_options_by_id( $term_id, $taxonomy ) {
		$ret_val = '';
		if( ! empty( $term_id ) ) {
			$term = get_term_by('term_id', $term_id, $taxonomy );
			if ( ! empty( $term ) && ! is_wp_error( $term ) ) {
				$ret_val = $term;
				if ( $ret_val->taxonomy != $taxonomy ) {
					return false;
				}
			}
		}
		return $ret_val;
	}

	/**
	 * Get taxonomy by slug
	 *
	 */
	public static function get_tax_options_by_slug( $value, $taxonomy ) {
		$ret_val = '';
		if( ! empty( $value ) ) {
			$term = get_term_by('slug', $value, $taxonomy );
			if ( ! empty( $term ) && ! is_wp_error( $term ) ) {
				$ret_val = $term;
			}
		}
		return $ret_val;
	}

	/**
	 * Get list taxonomy (slug=>name(count))
	 * 
	 */
	public static function get_tax_options( $taxonomy, $args = array(), $params = array(), $exclude_slugs = array() ) {
		$default = array("orderby"=>"name", "hierarchical"=>false, "hide_empty" => true);
		$args = array_merge( $default, $args );
		$terms = get_terms( $taxonomy, $args);
		$options = array();
		if(isset($params['empty'])) {
			$options[""] = "";
		}
		if (is_array( $terms ) ) {
			foreach ( $terms as $term ) {
				$value = "$term->name";
				if(isset($params['show_count'])) {
					$value = "$term->name ($term->count)";
				}
				if( ! isset($exclude_slugs[$term->slug]) ) {
					$options["$term->slug"] = $value;
				}
			}
		}
		return $options;
	}

	/**
	 * Get list taxonomy (name=>slug)
	 * 
	 */
	public static function get_tax_options2slug( $taxonomy, $params = array(), $args = array() ) {
		$def_args = array('orderby'=>'name', 'hierarchical'=>false, 'hide_empty' => true);
		$args = array_merge( $def_args, $args );
		$terms = get_terms( $taxonomy, $args);
		$options = array();
		if(isset($params['empty'])) {
			$options[$params['empty']] = '';
		}
		if (is_array( $terms ) ) {
			foreach ( $terms as $term ) {
				$key = html_entity_decode( $term->name );
				if( isset($options[$key]) ) {
					$key = $key . ' (' . $term->slug . ')';
				}
				$options[$key] = $term->slug;
			}
		}
		return $options;
	}
	/**
	 * Get list taxonomy (slug=>name)
	 *
	 */
	public static function get_tax_options2name( $taxonomy, $params = array(), $args = array() ) {
		$def_args = array('orderby'=>'name', 'hierarchical'=>false, 'hide_empty' => true);
		$args = array_merge( $def_args, $args );
		$terms = get_terms( $taxonomy, $args);
		$options = array();
		if(isset($params['empty'])) {
			$options[''] = $params['empty'];
		}
		if (is_array( $terms ) ) {
			foreach ( $terms as $term ) {
				$options[$term->slug] = $term->name;
			}
		}
		return $options;
	}

	/**
	 * Query related posts
	 */
	public static function get_query_related_posts( $post_id, $args = array(), $taxonomy = 'category' ) {
		$query = new WP_Query();
	
		$terms = get_the_terms( $post_id, $taxonomy );
		$terms_array = array();
		if( $terms ) {
			foreach( $terms as $item ) {
				$terms_array[] = $item->term_id;
			}
		}
		if( ! empty( $terms_array ) ) {
			$args = wp_parse_args( $args, array(
				'ignore_sticky_posts' => 0,
				'posts_per_page' => -1,
				'post__not_in' => array( $post_id ),
				'post_type' => 'post',
				'suppress_filters' => false,
				'tax_query' => array(
					array(
						'field' => 'id',
						'taxonomy' => $taxonomy,
						'terms' => $terms_array,
					)
				)
			));
			$query = new WP_Query( $args );
		}
		return $query;
	}

	/**
	 * Return category name
	 *
	 * @param $category_id
	 *
	 * @return string
	 */
	public static function get_product_category_by_id( $category_id ) {
		$term = get_term_by( 'id', $category_id, 'product_cat', 'ARRAY_A' );
		return $term['name'];
	}

	/**
	 * Get category list.(name => slug)
	 * 
	 */
	static $slz_category2slug_walker_buffer = array();
	public static function get_category2slug_array( $all_category = true, $args = array() ) {
		
		$args = array (
			'hide_empty' => 0,
			'number' => 1000 
		);
		if ( empty( self::$slz_category2slug_walker_buffer ) ) {
			$categories = get_categories( $args );
			$category_walker = new SLZ_Category2Slug_Walker();
			$category_walker->walk( $categories, 4 );
			self::$slz_category2slug_walker_buffer = $category_walker->sw_buffer;
		}
		
		if ( $all_category === true ) {
			$categories_buffer ['- All categories -'] = '';
			return array_merge( $categories_buffer, self::$slz_category2slug_walker_buffer );
		} else {
			return self::$slz_category2slug_walker_buffer;
		}
	}

	public static function get_category2name_array( $all_category = true ) {
		$category = array();
		$category_temp = self::get_category2slug_array( $all_category );
		if( $category_temp ) {
			foreach($category_temp as $name => $slug ) {
				$category[$slug] = $name;
			}
		}
		return $category;
	}

	static $slz_category_parent2slug_walker_buffer = array();
	public static function get_category_parent2slug_array( $all_category = true, $args = array() ) {
		
		$args = array (
			'hide_empty' => 0,
			'number' => 1000 
		);
		if ( empty( self::$slz_category_parent2slug_walker_buffer ) ) {
			$categories = get_categories('parent');
			$category_walker = new SLZ_Category2Slug_Walker();
			$category_walker->walk( $categories, 4 );
			self::$slz_category_parent2slug_walker_buffer = $category_walker->sw_buffer;
		}
		
		if ( $all_category === true ) {
			$categories_buffer ['- All categories -'] = '';
			return array_merge( $categories_buffer, self::$slz_category_parent2slug_walker_buffer );
		} else {
			return self::$slz_category2slug_walker_buffer;
		}
	}

	static $slz_category2id_walker_buffer = array();
	public static function get_category2id_array( $all_category = true, $args = array() ) {
		
		$args = array (
			'hide_empty' => 0,
			'number' => 1000 
		);
		if ( empty( self::$slz_category2id_walker_buffer ) ) {
			$categories = get_categories( $args );
			$category_walker = new SLZ_Category2Id_Walker();
			$category_walker->walk( $categories, 4 );
			self::$slz_category2id_walker_buffer = $category_walker->sw_buffer;
		}
		return self::$slz_category2id_walker_buffer;
	}

	/**
	 * Get list post (post_name => post_title)
	 *
	 * $args = array('post_type' => 'my_posttype', 'post_status' => 'publish', ...);
	 *
	 * @param array $args
	 * @return array
	 */
	public static function get_post_id2title( $args = array(), $options = array(), $is_empty = true ) {
		$empty = '';
		if( isset( $options['empty'] ) ) {
			$empty = $options['empty'];
		}
		$defaults = array(
			'posts_per_page'   => -1,
			'post_status'      => 'publish',
			'suppress_filters' => false,
		);
		$args = array_merge( $defaults, $args );
		$result = array();
		if($is_empty) {
			$result = array( '' => $empty );
		}
		$records = get_posts( $args );
		if( $records ) {
			foreach( $records as $row ) {
				$key = $row->ID;
				$val = $row->post_title;
				$val = empty($val) ? $row->post_name : $val;
				$result[$key] = $val;
			}
		}
		return $result;
	}

	/**
	 * Get list post (post_title (post_name) => ID)
	 *
	 * $args = array('post_type' => 'my_posttype', 'post_status' => 'publish', ...);
	 *
	 * @param array $args
	 * @return array
	 */
	public static function get_post_title2id( $args = array(), $options = array() ) {
		$empty = '';
		if( isset( $options['empty'] ) ) {
			$empty = $options['empty'];
		}
		$defaults = array(
			'posts_per_page'   => -1,
			'post_status'      => 'publish',
			'suppress_filters' => false,
		);
		$args = array_merge( $defaults, $args );
		$result = array( $empty => '');
		$records = get_posts( $args );
		if( $records ) {
			foreach( $records as $row ) {
				$key = empty($row->post_title) ? $row->post_name : $row->post_title;
				$val = $row->ID;
				$result[$key] = $val;
			}
		}
		return $result;
	}

	public static function set_shortcode_defaults( $defaults, $args ) {
		if( ! $args ) {
			$args = array();
		}

		$args = shortcode_atts( $defaults, $args );

		return $args;
	}

	public static function make_id() {
		return uniqid(rand());
	}

	public static function get_value( $obj, $field, $def = '' ) {
		if( isset( $obj[ $field ] ) && ! self::is_empty( $obj[ $field ] )) {
			return $obj[ $field ];
		}
		return $def;
	}

	public static function get_first( $array ) {

		if ( empty ( $array ) || !is_array( $array ) ) 
			return '';
		
		reset($array);

		return key($array);
	}

	public static function is_empty( $value, $trim = false ) {
		return $value===null || $value===array() || $value==='' || $trim && is_scalar($value) && trim($value)==='';
	}

	public static function get_contact_form(){

		$contact_form_arr = array( '' => esc_html__( '-None-', 'slz' ));
		$args = array (
					'post_type'     => 'wpcf7_contact_form',
					'post_per_page' => -1,
					'status'        => 'publish',
				);
		$post_arr = get_posts( $args );
		foreach( $post_arr as $post ){
			$title = ( !empty( $post->post_title ) )? $post->post_title : $post->post_name;
			$contact_form_arr[$post->ID] =  $title;
		}
		return $contact_form_arr;
	}
	public static function get_palette_color(){

		$theme_color_settings = array(
			'color_1' => '#d12a5c',
			'color_2' => '#49ca9f',
			'color_3' => '#1f1f1f',
			'color_4' => '#808080',
			'color_5' => '#ebebeb'
		);
		$theme_colors = slz()->theme->get_config('color_settings');
		if( $theme_colors ) {
			$theme_color_settings = $theme_colors;
		}

		return $theme_color_settings;
	}

	public static function get_palette_selected_color( $data, $palette_color = array() ){
		
		$result = '';

		if( empty($palette_color)) {
			$palette_color = SLZ_Com::get_palette_color();
		}

		if ( empty( $data ) || empty ( $data['id'] ) )
			return;

		if ( !empty ( $data['color'] ) && $data['id'] == 'slz-custom' ){

			$result = $data['color'];

		}
		else if ( $data['id'] != 'slz-custom' ) {

			$result = $palette_color[$data['id']];

		}

		return $result;
	}
	/**
	 * Get term in hierarchical (name=> slug)
	 *
	 * @param array $args
	 * @param array $options
	 */
	public static function get_hierarchical_term2slug( $args = array(), $options = array() ) {
		SLZ_Term_Tree::$arr_term2slug_walker_buffer = array();
		return SLZ_Term_Tree::get_hierarchical_term2slug_tree( $args, $options );
	}
	/**
	 * Get term in hierarchical (slug=> name)
	 *
	 * @param array $args    {'taxonomy' => 'category', args of get_terms...}
	 * @param array $options
	 */
	public static function get_hierarchical_term2name( $args = array(), $options = array() ) {
		SLZ_Term_Tree::$arr_term2name_walker_buffer = array();
		return SLZ_Term_Tree::get_hierarchical_term2name_tree( $args, $options );
	}
	/**
	 * Merge option
	 *
	 * @param array $args
	 * @param array $options
	 */
	public static function merge_options( $key_enable,$key_value,$theme_option ) {
		$out_put = '';
		list($post_id, $is_shop_page) = slz_extra_get_post_id();
		$options = slz_get_db_post_option( $post_id, $key_enable, '' );
		$page_options = slz_akg( 'enable-page-option',$options, '' );
		if( $page_options == 'enable' ){
			$out_put = slz_akg( $key_value, $options, '' );
		}else{
			$out_put = $theme_option;
		}
		return $out_put;
	}
	/**
	 * get woo acount
	 *
	 * @param array $args
	 * @param array $options
	 */
	public static function get_woo_account( $echo = true ) {

		$cart_link = '';
		$cart_icon = '';
		$header_account =  slz_get_db_settings_option('enable-woo-account', 'disable');

		if( $header_account != 'disable' &&  class_exists( 'WooCommerce' ) ){

			$cart_link = get_permalink( get_option( 'woocommerce_cart_page_id') );
			$register_page_id = $login_page_id = get_option( 'woocommerce_myaccount_page_id' );
			$account_link     = get_permalink( $login_page_id );
			$account_text     = esc_html__( 'Dashboard', 'slz' );
			$out_html = '';
			if( !empty( $cart_link ) ) {
				$cart_icon = sprintf('<li class="woo-login"><a href="%s" class="item">'.esc_html__('Cart', 'slz').'</a></li>',
					esc_url($cart_link)
				);
			}
			if ( is_user_logged_in() ) {
				$out_html = sprintf('
					<li class="woo-login"><a href="%1$s" class="item">%2$s</a></li>'.wp_kses_post($cart_icon).'
					<li class="woo-login"><a href="%3$s" class="item">%4$s</a></li>',
					esc_url($account_link),
					esc_html( $account_text ),
					esc_url( wp_logout_url( get_permalink( $login_page_id ) ) ),
					esc_html__( 'Logout', 'slz' )
				);
			}
			else {
				$out_html = '<li class="woo-login"><a href="'.esc_url(get_permalink( $login_page_id )).'" class="item">'.esc_html__( 'Login', 'slz' ).'</a></li>';
				if ( get_option( 'woocommerce_enable_myaccount_registration' ) === 'yes' ) {
					$out_html .= '<li class="woo-login"><a href="'.esc_url(get_permalink( $register_page_id )).'" class="item">'.esc_html__( 'Register', 'slz' ).'</a></li>';
				}
				$out_html .= wp_kses_post($cart_icon);
			}
			if( $out_html ) {
				$output = '<div class="dropdown woo-account-wrapper">
							<a href="" class="slz-btn dropdown-toggle" data-toggle="dropdown"><span class="btn-text">'.esc_html__('My Account', 'slz').'</span></a>
							<ul class="dropdown-menu">'.
							$out_html.'
							</ul>
						</div>';
				if( $echo ) {
					echo ( $output );
				} else {
					return $output;
				}
			}

		}
	}
	public static function get_taxonomy_with_params( $taxonomy = '', $args = array() ) {
		$terms = get_terms( $taxonomy, $args );
		if ($terms && ! is_wp_error($terms)) {
			return $terms;
		}
		return array();
	}

}
class SLZ_Term_Tree {
	/**
	 * Get taxonomy list with hierarchical.(name => slug)
	 *
	 */
	static $arr_term2slug_walker_buffer = array();
	public static function get_hierarchical_term2slug_tree( $args = array(), $options = array() ) {

		$defaults = array (
			'hide_empty' => 0,
			'number' => 1000,
		);
		$args = array_merge( $defaults, $args );
		if ( empty( self::$arr_term2slug_walker_buffer ) ) {
			$categories = get_categories( $args );
			$category_walker = new SLZ_Category2Slug_Walker();
			$category_walker->walk( $categories, 4 );
			self::$arr_term2slug_walker_buffer = $category_walker->sw_buffer;
		}

		if ( isset($options['empty']) ) {
			$categories_buffer [$options['empty']] = '';
			return array_unshift( self::$arr_term2slug_walker_buffer, $categories_buffer );
		} else {
			return self::$arr_term2slug_walker_buffer;
		}
	}
	/**
	 * Get taxonomy list with hierarchical.(slug => name)
	 *
	 */
	static $arr_term2name_walker_buffer = array();
	public static function get_hierarchical_term2name_tree( $args = array(), $options = array() ) {

		$defaults = array (
			'hide_empty' => 0,
			'number' => 1000,
		);
		$args = array_merge( $defaults, $args );
		if ( empty( self::$arr_term2name_walker_buffer ) ) {
			$categories = get_categories( $args );
			if ( $categories && ! is_wp_error( $categories ) ){
				$category_walker = new SLZ_Category2Name_Walker();
				$category_walker->walk( $categories, 4 );
				self::$arr_term2name_walker_buffer = $category_walker->sw_buffer;
			}
		}

		if ( isset($options['empty']) ) {
			$categories_buffer [''] = $options['empty'];
			return array_unshift( self::$arr_term2name_walker_buffer, $categories_buffer );
		} else {
			return self::$arr_term2name_walker_buffer;
		}
	}
}
/**
 * Category Walker Class
 * 
 * @since 1.0
 *
 */
class SLZ_Category2Slug_Walker extends Walker {
	public $tree_type = 'category';
	public $db_fields = array ('parent' => 'parent', 'id' => 'term_id');

	public $sw_buffer = array();

	function start_lvl( &$output, $depth = 0, $args = array() ) {
	}

	function end_lvl( &$output, $depth = 0, $args = array() ) {
	}

	function start_el( &$output, $category, $depth = 0, $args = array(), $id = 0 ) {
		$key = str_repeat(' - ', $depth) .  $category->name;
		if( isset($this->sw_buffer[$key])) {
			$key = $key . ' (' . $category->slug .')';
		}
		$this->sw_buffer[$key] = $category->slug;
	}

	function end_el( &$output, $page, $depth = 0, $args = array() ) {
	}

}
/**
 * Category Walker Class
 * 
 * @since 1.0
 *
 */
class SLZ_Category2Id_Walker extends Walker {
	public $tree_type = 'category';
	public $db_fields = array ('parent' => 'parent', 'id' => 'term_id');

	public $sw_buffer = array();

	function start_lvl( &$output, $depth = 0, $args = array() ) {
	}

	function end_lvl( &$output, $depth = 0, $args = array() ) {
	}

	function start_el( &$output, $category, $depth = 0, $args = array(), $id = 0 ) {
		$this->sw_buffer[$category->term_id] = $category->name;
	}

	function end_el( &$output, $page, $depth = 0, $args = array() ) {
	}

}
/**
 * Category Walker Class
 *
 * @since 1.0
 *
 */
class SLZ_Category2Name_Walker extends Walker {
	public $tree_type = 'category';
	public $db_fields = array ('parent' => 'parent', 'id' => 'term_id');

	public $sw_buffer = array();

	function start_lvl( &$output, $depth = 0, $args = array() ) {
	}

	function end_lvl( &$output, $depth = 0, $args = array() ) {
	}

	function start_el( &$output, $category, $depth = 0, $args = array(), $id = 0 ) {
		$this->sw_buffer[$category->slug] = str_repeat(' - ', $depth) .  $category->name;
	}

	function end_el( &$output, $page, $depth = 0, $args = array() ) {
	}

}