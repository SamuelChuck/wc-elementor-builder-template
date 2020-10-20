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

class Widget_Custom_Notices_Widget extends Widget_Base
{

	/**
	 * Get widget name.
	 */
	public function get_name()
	{
		return 'webt-custom-notice';
	}

	/**
	 * Get widget title.
	 */
	public function get_title()
	{
		return esc_html__('Custom Notice', 'woocommerce');
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
	 * Search keywords
	 */
	public function get_keywords()
	{
		return ['webt', 'woocommerce', 'notice', 'global'];
	}
	
	/**
	 * Register oEmbed widget controls.
	 */
	protected function _register_controls()
	{
		$this->start_controls_section(
			'section_custom_notice',
			[
				'label' => esc_html__('Custom Notice', 'elementor'),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'custom_notice',
			[
				'label' => esc_html__('Custom Notice', 'webt'),
				'type' => Controls_Manager::TEXTAREA,
				'placeholder' => esc_html('A custom notice to any page on your site'),
			]
		);
		$this->add_control(
			'custom_type_notice',
			[
				'label' => esc_html__('Custom Notice Type', 'webt'),
				'type' => Controls_Manager::SELECT,
				'default' => 'solid',
				'options' => [
					'success'  => __('Success', 'webt'),
					'error' => __('Error', 'webt'),
					'notice' => __('Notice', 'webt'),
				],
			]
		);
		$this->add_control(
			'wc_custom_notice_warning',
			[
				'type' => Controls_Manager::RAW_HTML,
				'raw' => esc_html__('Add a custom notice to any page on your site', 'webt'),
				'content_classes' => 'elementor-panel-alert elementor-panel-alert-info',
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

		/* Notice: woocommerce_custom_notice.*/
		if (function_exists('wc_print_notices')) {
			if (!empty($settings['custom_notice'])) {
				wc_print_notice($settings['custom_notice'], $settings['custom_type_notice']);
			} else {
				wc_print_notices();
			}
		}
	}
}

Plugin::elementor_instance()->widgets_manager->register_widget_type(new Widget_Custom_Notices_Widget());
