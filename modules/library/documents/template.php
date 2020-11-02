<?php
namespace Elementor\Modules\Library\Documents;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

/**
 * Elementor template library document.
 *
 * Elementor template library document handler class is responsible for
 * handling a document of a template type.
 *
 * @since 2.0.0
 */
class WEBT_Template extends Library_Document {

	public static function get_properties() {
		$properties = parent::get_properties();

		$properties['support_kit'] = false;

		return $properties;
	}

	/**
	 * Get document name.
	 *
	 * Retrieve the document name.
	 *
	 * @since 2.0.0
	 * @access public
	 *
	 * @return string Document name.
	 */
	public function get_name() {
		return 'template';
	}

	/**
	 * Get document title.
	 *
	 * Retrieve the document title.
	 *
	 * @since 2.0.0
	 * @access public
	 * @static
	 *
	 * @return string Document title.
	 */
	public static function get_title() {
		return __( 'Template', 'elementor' );
	}
}
