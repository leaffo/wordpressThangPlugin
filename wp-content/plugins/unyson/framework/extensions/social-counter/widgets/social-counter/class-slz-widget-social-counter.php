<?php 

class SLZ_Widget_Social_Counter extends WP_Widget {

	private $slz_widget;
	private $config;

	/**
	 * @internal
	 */
	function __construct() {

		$this->slz_widget = slz_ext('widgets')->get_widget( get_class ($this) );
		
		if ( is_null( $this->slz_widget ) ) {
			trigger_error('Cannot load this widget', E_USER_WARNING);
			return;
		}

		$this->config = $this->slz_widget->get_config('general');

		$widget_ops = array( 
			'description' => (!empty( $this->config['description'] ) ? $this->config['description'] : ''),
			'classname'   => (!empty( $this->config['classname'] ) ? $this->config['classname'] : ''),
		);
		parent::__construct( $this->config['id'], $this->config['name'], $widget_ops );
	}
	
	/**
	 * @param array $args
	 * @param array $instance
	 */
	function widget( $args, $instance ) {

		$unique_id = SLZ_Com::make_id();

		$style = '';

		$css = '';

		if ( !empty( $instance['block_title_color'] ) && $instance['block_title_color'] != '#'  ) {

			$style ='.slz-widget-social-counter.social-%1$s .widget-title{ color: %2$s }';

			$css .= sprintf( $style, esc_attr( $unique_id ), esc_attr( $instance['block_title_color'] ) );

			do_action( 'slz_add_inline_style', $css );

		}
		
		//get translated strings
		$instance['block_title'] = slz_ext_widget_filters_block_title($args, $this, $instance['block_title']);

		$data = array(
			'before_widget' => $args['before_widget'],
			'after_widget'  => $args['after_widget'],
			'block'      	=> $instance,
			'unique_id'		=> $unique_id
		);
		echo slz_render_view($this->slz_widget->locate_path( '/views/front.php' ), $data);
	}

	function update( $new_instance, $old_instance ) {
		//register strings for translation
		slz_ext_widget_wpml_register_string($this, $new_instance['block_title']);
		
		return $new_instance;
	}

	function form( $instance ) {

		$instance = wp_parse_args( (array) $instance, $this->slz_widget->get_config('default_value') );
		
		echo slz_render_view($this->slz_widget->locate_path( '/views/admin.php' ), array( 'instance' => $instance, 'object' => $this ) );
		
	}
}