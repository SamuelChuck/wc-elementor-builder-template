<?php

namespace WEBT;

use Elementor\Widget_Base;
use WEBT\Plugin;

/**
 * WooCommerce Elementor Builder Template Widget.
 *
 * @class Widget_MyAccount_Register_Form_Widget
 * @package webt
 */

if (!defined('ABSPATH')) {
	exit; // Exit if accessed directly.
}

class Widget_Register extends Widget_Base
{

	/**
	 * Get widget name.
	 */
	public function get_name()
	{
		return 'webt-myaccount-register';
	}

	/**
	 * Get widget title.
	 */
	public function get_title()
	{
		return esc_html__('Regisration', 'webt');
	}

	/**
	 * Get widget icon.
	 */
	public function get_icon()
	{
		return 'eicon-woocommerce';
	}

	/**
	 * Get widget categories.
	 */
	public function get_categories()
	{
		return ['webt-myaccount-form'];
	}

	/**
	 * Register oEmbed widget controls.
	 */
	protected function _register_controls()
	{
	}

	/**
	 * Render widget output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function render()
	{
		wc_get_template('myaccount/form-register.php');
	}
}
Plugin::elementor_instance()->widgets_manager->register_widget_type(new Widget_Register ());
