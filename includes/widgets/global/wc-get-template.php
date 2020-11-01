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

class Widget_Template_Path extends Widget_Base
{

	/**
	 * Get widget name.
	 */
	public function get_name()
	{
		return 'webt-template_path';
	}

	/**
	 * Get widget title.
	 */
	public function get_title()
	{
		return esc_html__('WC Template Path', 'woocommerce');
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
		return ['webt', 'woocommerce', 'custom', 'template', 'path', 'global'];
	}
	/**
	 * Register oEmbed widget controls.
	 */
	protected function _register_controls()
	{
		$this->start_controls_section(
			'section_customhook',
			[
				'label' => esc_html__('Template', 'elementor'),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);
		$this->add_control(
			'wc_customhook_warning',
			[
				'type' => Controls_Manager::RAW_HTML,
				'raw' => esc_html__('Add a template_path for your template, the plugin or theme wc template. e.g. myaccount/my-account. It will be used for wc_get_template( "your_template_path" )', 'webt'),
				'content_classes' => 'elementor-panel-alert elementor-panel-alert-info',
			]
		);
		$this->add_control(
			'template_path',
			[
				'label' => esc_html__('Template Path', 'webt'),
				'type' => Controls_Manager::TEXT,
				'placeholder' => esc_html('template_path'),
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
		 * Template: wcf_woocommerce_template_path.
		 *
		 */
		$template = strip_tags($settings['template_path']);
		if ($template) {
			wc_get_template("{$template}.php");
		} elseif (current_user_can('edit')) {
			echo '<p> No template path defined </p>';
		}
	}
}

//Plugin::elementor_instance()->widgets_manager->register_widget_type(new Widget_Template_Path ());
