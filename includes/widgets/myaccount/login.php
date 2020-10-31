<?php

namespace WEBT;

use WEBT\Plugin;
use Elementor\Widget_Base;

/**
 * WooCommerce Page Builder For Elementor Widget.
 *
 * @class Widget_MyAccount_Form_Login_Widget
 * @package webt
 */

if (!defined('ABSPATH')) {
	exit; // Exit if accessed directly.
}

class Widget_Login extends Widget_Base
{

	/**
	 * Get widget name.
	 */
	public function get_name()
	{
		return 'webt-myaccount-login';
	}

	/**
	 * Get widget title.
	 */
	public function get_title()
	{
		return esc_html__('Login', 'webt');
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
	 *
	 * Adds different input fields to allow the user to change and customize the widget settings.
	 *
	 * @since 1.0.0
	 * @access protected
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
		wc_get_template('myaccount/form-login.php');
	}
}

Plugin::elementor_instance()->widgets_manager->register_widget_type(new Widget_Login ());
