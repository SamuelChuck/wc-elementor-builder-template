<?php

namespace WEBT;

use Elementor\Widget_Base;
use WEBT\Plugin;

/**
 * WooCommerce Elementor Builder Widget.
 *
 * @package webt
 * 
 */
if (!defined('ABSPATH')) {
	exit; // Exit if accessed directly.
}

class Widget_MyAccount_Payment_Methods_Widget extends Widget_Base
{

	/**
	 * Get widget name.
	 */
	public function get_name()
	{
		return 'webt-payment-methods';
	}

	/**
	 * Get widget title.
	 */
	public function get_title()
	{
		return esc_html__('Payment Methods', 'webt');
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
		return ['webt-myaccount'];
	}

	/**
	 * Register oEmbed widget controls.
	 */
	protected function _register_controls()
	{
	}

	/**
	 * Render widget output on the frontend.
	 */
	protected function render()
	{
	}
}

Plugin::elementor_instance()->widgets_manager->register_widget_type(new Widget_MyAccount_Payment_Methods_Widget());
