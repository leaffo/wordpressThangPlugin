<?php if ( ! defined( 'ABSPATH' ) ) {
	die( 'Forbidden' );
}

class SLZ_Shortcode_Contact_Form extends SLZ_Shortcode
{
	/**
	 * @internal
	 */
	public function _init()
	{
		add_action(
			'slz_option_type_builder:page-builder:register_items',
			array($this, '_action_register_builder_item_types')
		);
	}

	public function _action_register_builder_item_types() {
		if (slz_ext('page-builder')) {
			require $this->get_declared_path('/includes/item/class-page-builder-contact-form-item.php');
		}
	}

	protected function _render($atts, $content = null, $tag = '')
	{
		$form_data = array(
			'id' => $atts['id'],
			'form' => $atts['form'],
			'email_to' => $atts['email_to'],
			'subject_message' => $atts['subject_message'],
			'success_message' => $atts['success_message'],
			'failure_message' => $atts['failure_message'],
		);

		/**
		 * @var SLZ_Extension_Contact_Forms $extension
		 */
		$extension = slz_ext('contact-forms');

		/**
		 * Save form data because the extension needs to access it (by id) on form submit
		 *
		 * There is no other possibility to save form data by id because contact form is a shortcode
		 * it has no save action and we can't access it by id (we don't know in which post it is)
		 */
		$extension->_set_form_db_data($atts['id'], $atts);

		return $extension->render(
			array(
				'id' => $form_data['id'],
				'form' => $form_data['form'],
				'submit_button_text' => $atts['submit_button_text'],
			),
			/**
			 * Extra options added by theme developer in shortcode options.php will be sent in form view
			 */
			array_diff_key(
				$atts,
				array(
					'width' => true,
					'mailer' => true,
					'submit_button_text' => true,
				),
				$form_data
			)
		);
	}
}