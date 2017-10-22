<?php if ( ! defined( 'ABSPATH' ) ) {
	die( 'Forbidden' );
}

/**
 * Slider
 * -*==*---
 */
class SLZ_Option_Type_Range_Slider extends SLZ_Option_Type {

	/**
	 * @internal
	 * {@inheritdoc}
	 */
	protected function _enqueue_static( $id, $option, $data ) {
		{
			wp_enqueue_style(
				'slz-option-' . $this->get_type() . 'ion-range-slider',
				slz_get_framework_directory_uri( '/includes/option-types/' . $this->get_type() . '/static/libs/ion-range-slider/ion.rangeSlider.css' ),
				slz()->manifest->get_version()
			);

			wp_enqueue_script(
				'slz-option-' . $this->get_type() . 'ion-range-slider',
				slz_get_framework_directory_uri( '/includes/option-types/' . $this->get_type() . '/static/libs/ion-range-slider/ion.rangeSlider.min.js' ),
				array( 'jquery', 'slz-moment' ),
				slz()->manifest->get_version()
			);
		}

		wp_enqueue_style(
			'slz-option-' . $this->get_type(),
			slz_get_framework_directory_uri( '/includes/option-types/' . $this->get_type() . '/static/css/styles.css' ),
			slz()->manifest->get_version()
		);

		wp_enqueue_script(
			'slz-option-' . $this->get_type(),
			slz_get_framework_directory_uri( '/includes/option-types/' . $this->get_type() . '/static/js/scripts.js' ),
			array( 'jquery', 'slz-events', 'underscore', 'slz-option-' . $this->get_type() . 'ion-range-slider' ),
			slz()->manifest->get_version()
		);
	}

	public function get_type() {
		return 'range-slider';
	}

	/**
	 * @internal
	 */
	protected function _render( $id, $option, $data ) {
		$option['properties']['type'] = 'double';
		$option['properties']['from'] = ( isset( $data['value']['from'] ) ) ? $data['value']['from'] : $option['value']['from'];
		$option['properties']['to']   = ( isset( $data['value']['to'] ) ) ? $data['value']['to'] : $option['value']['to'];

		if ( isset( $option['properties']['values'] ) && is_array( $option['properties']['values'] ) ) {
			$option['properties']['from'] = array_search( $option['properties']['from'],
				$option['properties']['values'] );
			$option['properties']['to']   = array_search( $option['properties']['to'],
				$option['properties']['values'] );
		}

		$option = $this->update_option( $option );

		$option['attr']['data-slz-irs-options'] = json_encode(
			$this->default_properties( $option['properties'] )
		);

		return slz_render_view( slz_get_framework_directory( '/includes/option-types/' . $this->get_type() . '/view.php' ),
			array(
				'id'     => $id,
				'option' => $option,
				'data'   => $data,
				'value'  => implode( ';', (array) $data['value'] )
			) );
	}

	private function default_properties( $properties = array() ) {
		return array_merge( array(
			'min'  => 0,
			'max'  => 100,
			'step' => 1,
			/**
			 * For large ranges, this will create https://static.md/6340ebf52a36255649f10b3d0dff3b1c.png
			 */
			'grid_snap' => false,
		), $properties );
	}

	/**
	 * @internal
	 */
	protected function _get_defaults() {
		$defaults = $this->default_properties();

		return array(
			'value'      => array(
				'from' => $defaults['min'],
				'to'   => $defaults['max'],
			),
			'properties' => $defaults, // https://github.com/IonDen/ion.rangeSlider#settings
		);
	}

	/**
	 * @internal
	 */
	protected function _get_value_from_input( $option, $input_value ) {
		if ( is_null( $input_value ) ) {
			return $option['value'];
		} else {
			$input_values = ( isset( $option['properties']['values'] ) && is_array( $option['properties']['values'] ) ) ? explode( ';',
				$input_value ) : array_map( 'floatval', explode( ';', $input_value ) );

			return array(
				'from' => $input_values[0],
				'to'   => $input_values[1],
			);
		}
	}

	/**
	 * Used to update option from and to value to be equal to max and min in case they are not defined
	 *
	 * @param array $option
	 *
	 * @return array
	 */
	private function update_option( $option ) {
		if (
			$option['value']['from'] < $option['properties']['min']
			||
			$option['value']['from'] > $option['properties']['max']
		) {
			$option['value']['from'] = $option['properties']['min'];
			$option['properties']['from'] = $option['properties']['min'];
		}

		if (
			$option['value']['to'] > $option['properties']['max']
			||
			$option['value']['to'] < $option['properties']['min']
		) {
			$option['value']['to'] = $option['properties']['max'];
			$option['properties']['to'] = $option['properties']['max'];
		}

		return $option;
	}

}

SLZ_Option_Type::register( 'SLZ_Option_Type_Range_Slider' );
