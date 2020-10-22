<?php

namespace WEBT;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use WEBT\Plugin;

/**
 * WooCommerce Elementor Builder Widget.
 *
 * @package webt
 */
if (!defined('ABSPATH')) {
	exit; // Exit if accessed directly.
}

class Widget_Checkout_Login_Form_Widget extends Widget_Base
{

	/**
	 * Get widget name.
	 */
	public function get_name()
	{
		return 'webt-checkout-form-login';
	}

	/**
	 * Get widget title.
	 */
	public function get_title()
	{
		return esc_html__('Checkout Form Login', 'webt');
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
		return ['webt-checkout'];
	}

	/**
	 * Search keywords
	 */
	public function get_keywords()
	{
		return ['webt', 'woocommerce', 'checkout', 'login', 'form'];
	}

	/**
	 * Register oEmbed widget controls.
	 */
	protected function _register_controls()
	{
		$this->start_controls_section(
			'content_section',
			[
				'label' => __('Content', 'webt'),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'show_notice',
			[
				'label' => __('Show Notice', 'webt'),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => __('Show', 'webt'),
				'label_off' => __('Hide', 'webt'),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);

		$this->end_controls_section();
	}

	/**
	 * Render widget output on the frontend.
	 */
	protected function render()
	{
		$settings = $this->get_settings_for_display();

		if ($settings['show_notice'] === 'yes' && function_exists('wc_print_notices')) {
			wc_print_notices();
		}
		wc_get_template('checkout/form-login.php');
	}
}

Plugin::elementor_instance()->widgets_manager->register_widget_type(new Widget_Checkout_Login_Form_Widget());
