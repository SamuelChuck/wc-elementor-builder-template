<?php

namespace WEBT;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use WEBT\Plugin;

/**
 * WooCommerce Elementor Builder Widget.
 *
 * @package webt
 */
if (!defined('ABSPATH')) {
	exit; // Exit if accessed directly.
}

class Widget_Empty_Cart_Message extends Widget_Base
{

	/**
	 * Get widget name.
	 */
	public function get_name()
	{
		return 'webt-empty-cart-message';
	}

	/**
	 * Get widget title.
	 */
	public function get_title()
	{
		return esc_html__('Empty Cart Message', 'webt');
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
		return ['webt-cart'];
	}

	/**
	 * Search keywords
	 */
	public function get_keywords()
	{
		return ['webt', 'woocommerce', 'cart', 'empty'];
	}

	/**
	 * Register oEmbed widget controls.
	 */
	protected function _register_controls()
	{

		$this->start_controls_section(
			'section_style',
			array(
				'label' => esc_html__('Style', 'elementor'),
				'tab' => Controls_Manager::TAB_STYLE,
			)
		);

		$this->add_control(
			'cart_empty_sms_color',
			[
				'label'     => esc_html__('Color', 'elementor'),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .cart-empty.woocommerce-info' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			array(
				'name'      => 'cart_empty_sms_typography',
				'label'     => esc_html__('Typography', 'elementor'),
				'selector'  => '{{WRAPPER}} .cart-empty.woocommerce-info',
			)
		);

		$this->add_responsive_control(
			'text_align',
			[
				'label'        => esc_html__('Alignment', 'elementor'),
				'type'         => Controls_Manager::CHOOSE,
				'options'      => [
					'left'   => [
						'title' => esc_html__('Left', 'elementor'),
						'icon'  => 'fa fa-align-left',
					],
					'center' => [
						'title' => esc_html__('Center', 'elementor'),
						'icon'  => 'fa fa-align-center',
					],
					'right'  => [
						'title' => esc_html__('Right', 'elementor'),
						'icon'  => 'fa fa-align-right',
					],
				],
				'prefix_class' => 'elementor%s-align-',
				'default'      => 'left',
			]
		);

		$this->end_controls_section();
	}

	/**
	 * Render widget output on the frontend.
	 */
	protected function render()
	{
		/*
		 * @hooked wc_empty_cart_message - 10
		 */
		do_action('woocommerce_cart_is_empty');
	}
}

Plugin::elementor_instance()->widgets_manager->register_widget_type(new Widget_Empty_Cart_Message ());
