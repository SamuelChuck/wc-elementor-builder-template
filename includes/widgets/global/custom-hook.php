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

class Widget_Customhook_Widget extends Widget_Base
{

	/**
	 * Get widget name.
	 */
	public function get_name()
	{
		return 'webt-custom-hook';
	}

	/**
	 * Get widget title.
	 */
	public function get_title()
	{
		return esc_html__('Custom Hook', 'woocommerce');
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
		return ['webt-global'];
	}

	/**
	 * Register oEmbed widget controls.
	 */
	protected function _register_controls()
	{
		$this->start_controls_section(
			'section_customhook',
			[
				'label' => esc_html__('Custom Hook', 'elementor'),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);
		$this->add_control(
			'wc_customhook_warning',
			[
				'type' => Controls_Manager::RAW_HTML,
				'raw' => esc_html__('Add a custom_hook for your action hook, the plugin or theme action hook. e.g. your_custom_hook. It will be used for do_action( "your_custom_hook" )', 'webt'),
				'content_classes' => 'elementor-panel-alert elementor-panel-alert-info',
			]
		);
		$this->add_control(
			'custom_hook',
			[
				'label' => esc_html__('Custom Hook', 'webt'),
				'type' => Controls_Manager::TEXT,
				'placeholder' => esc_html('custom_hook'),
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
		/**
		 * Hook: wcf_woocommerce_custom_hook.
		 *
		 */
		$Hook = strip_tags($settings['custom_hook']);
		if ($Hook) {
			do_action("{$Hook}");
		} elseif (current_user_can('edit')) {
			echo '<p> add an action hook </p>';
		}
	}
}

Plugin::elementor_instance()->widgets_manager->register_widget_type(new Widget_Customhook_Widget());
