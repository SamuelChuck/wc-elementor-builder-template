<?php

namespace WEBT;

use Elementor\Controls_Manager;
use Elementor\Group_Control_Border;
use Elementor\Group_Control_Typography;
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

class Widget_MyAccount_Payment_Methods extends Widget_Base
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
	 * Search keywords
	 */
	public function get_keywords()
	{
		return ['webt', 'woocommerce', 'myaccount', 'checkout', 'payment-method'];
	}

	/**
	 * Register oEmbed widget controls.
	 */
	protected function _register_controls()
	{
		$this->start_controls_section(
			'order_table_heading_style',
			array(
				'label' => __('Table Heading', 'webt'),
				'tab' => Controls_Manager::TAB_STYLE,
			)
		);
		$this->add_control(
			'order_table_heading_text_color',
			[
				'label' => esc_html__('Color', 'elementor'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .woocommerce-MyAccount-paymentMethods tr th' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			array(
				'name' => 'order_table_heading_typography',
				'label' => __('Typography', 'webt'),
				'selector' => '{{WRAPPER}} .woocommerce-MyAccount-paymentMethods tr th',
			)
		);

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'order_table_heading_border',
				'selector' => '{{WRAPPER}} .woocommerce-MyAccount-paymentMethods tr th',
			]
		);

		$this->add_responsive_control(
			'order_table_heading_padding',
			[
				'label' => __('Padding', 'webt'),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', 'em', '%'],
				'selectors' => [
					'{{WRAPPER}} .woocommerce-MyAccount-paymentMethods tr th' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'order_table_heading_align',
			[
				'label' => __('Alignment', 'webt'),
				'type' => Controls_Manager::CHOOSE,
				'options' => [
					'left' => [
						'title' => __('Left', 'webt'),
						'icon' => 'fa fa-align-left',
					],
					'center' => [
						'title' => __('Center', 'webt'),
						'icon' => 'fa fa-align-center',
					],
					'right' => [
						'title' => __('Right', 'webt'),
						'icon' => 'fa fa-align-right',
					],
					'justify' => [
						'title' => __('Justified', 'webt'),
						'icon' => 'fa fa-align-justify',
					],
				],
				'prefix_class' => 'elementor%s-align-',
				'default' => 'left',
				'selectors' => [
					'{{WRAPPER}} .woocommerce-MyAccount-paymentMethods tr th' => 'text-align: {{VALUE}}',
				],
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_row_style',
			array(
				'label' => esc_html__('Table Cell', 'webt'), 
				'tab' => Controls_Manager::TAB_STYLE,
			)
		);
		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'row_border',
				'selector' => '{{WRAPPER}} .woocommerce-MyAccount-paymentMethods',
			]
		);

		$this->add_responsive_control(
			'row_padding',
			[
				'label' => esc_html__('Padding', 'elementor'),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', 'em'],
				'selectors' => [
					'{{WRAPPER}} .woocommerce-MyAccount-paymentMethods td' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_responsive_control(
			'row_text_align',
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
				'default'      => '',
				'selectors' => [
					'{{WRAPPER}} .woocommerce-MyAccount-paymentMethods td' => 'text-align: {{VALUE}}',
				],
			]
		);
		$this->end_controls_section();

		// // Date style
		// $this->start_controls_section(
		// 	'section_date_style',
		// 	array(
		// 		'label' => esc_html__('Expires', 'woocommerce'),
		// 		'tab' => Controls_Manager::TAB_STYLE,
		// 	)
		// );
		// $this->add_group_control(
		// 	Group_Control_Typography::get_type(),
		// 	array(
		// 		'name'      => 'date_typography',
		// 		'label'     => esc_html__('Typography', 'elementor'),
		// 		'selector'  => '{{WRAPPER}} .woocommerce-MyAccount-paymentMethods .woocommerce-orders-table__cell-order-date',
		// 	)
		// );
		// $this->add_control(
		// 	'date_color',
		// 	[
		// 		'label' => esc_html__('Color', 'elementor'),
		// 		'type' => Controls_Manager::COLOR,
		// 		'selectors' => [
		// 			'{{WRAPPER}} .woocommerce-MyAccount-paymentMethods .woocommerce-orders-table__cell-order-date' => 'color: {{VALUE}}',
		// 		],
		// 	]
		// );
		// $this->end_controls_section();

		$this->start_controls_section(
			'section_actions_style',
			array(
				'label' => esc_html__('Actions', 'webt'),
				'tab' => Controls_Manager::TAB_STYLE,
			)
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			array(
				'name'      => 'actions_typography',
				'label'     => esc_html__('Typography', 'elementor'),
				'selector'  => '{{WRAPPER}} .woocommerce-MyAccount-paymentMethods a.button',
			)
		);

		$this->start_controls_tabs('action_button_style_tabs');

		$this->start_controls_tab(
			'action_button_style_normal',
			[
				'label' => esc_html__('Normal', 'webt'),
			]
		);

		$this->add_control(
			'action_button_text_color',
			[
				'label' => esc_html__('Text Color', 'webt'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .woocommerce-MyAccount-paymentMethods a.button' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'action_button_bg_color',
			[
				'label' => esc_html__('Background Color', 'webt'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .woocommerce-MyAccount-paymentMethods a.button' => 'background-color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'action_button_border',
				'selector' => '{{WRAPPER}} .woocommerce-MyAccount-paymentMethods a.button',
			]
		);

		$this->add_control(
			'action_button_radius',
			[
				'label' => esc_html__('Radius', 'webt'),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', '%'],
				'selectors' => [
					'{{WRAPPER}} .woocommerce-MyAccount-paymentMethods a.button' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_tab();

		$this->start_controls_tab(
			'action_button_style_hover',
			[
				'label' => esc_html__('Hover', 'webt'),
			]
		);

		$this->add_control(
			'action_button_text_color_hover',
			[
				'label' => esc_html__('Text Color', 'webt'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .woocommerce-MyAccount-paymentMethods a.button:hover' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'action_button_bg_color_hover',
			[
				'label' => esc_html__('Background Color', 'webt'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .woocommerce-MyAccount-paymentMethods a.button:hover' => 'background-color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'action_button_border_hover',
				'selector' => '{{WRAPPER}} .woocommerce-MyAccount-paymentMethods a.button:hover',
			]
		);

		$this->add_control(
			'action_button_radius_hover',
			[
				'label' => esc_html__('Radius', 'webt'),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', '%'],
				'selectors' => [
					'{{WRAPPER}} .woocommerce-MyAccount-paymentMethods a.button:hover' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'action_button_transition',
			[
				'label' => esc_html__('Transition Duration', 'webt'),
				'type' => Controls_Manager::SLIDER,
				'default' => [
					'size' => 0.2,
				],
				'range' => [
					'px' => [
						'max' => 2,
						'step' => 0.1,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .woocommerce-MyAccount-paymentMethods a.button' => 'transition: all {{SIZE}}s',
				],
			]
		);

		$this->end_controls_tab();
		$this->end_controls_tabs();

		$this->add_responsive_control(
			'action_button_margin',
			[
				'label' => esc_html__('Margin', 'elementor'),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', 'em'],
				'selectors' => [
					'{{WRAPPER}} .woocommerce-MyAccount-paymentMethods a.button' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'action_button_padding',
			[
				'label' => esc_html__('Padding', 'elementor'),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', 'em'],
				'selectors' => [
					'{{WRAPPER}} .woocommerce-MyAccount-paymentMethods a.button' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_button_style',
			array(
				'label' => esc_html__('Add Payment Method Button', 'webt'),
				'tab' => Controls_Manager::TAB_STYLE,
			)
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			array(
				'name'      => 'button_typography',
				'label'     => esc_html__('Typography', 'elementor'),
				'selector'  => '{{WRAPPER}} .woocommerce-MyAccount-paymentMethods .woocommerce-orders-table__cell-order-actions a',
			)
		);

		$this->start_controls_tabs('button_style_tabs');

		$this->start_controls_tab(
			'button_style_normal',
			[
				'label' => esc_html__('Normal', 'webt'),
			]
		);

		$this->add_control(
			'button_text_color',
			[
				'label' => esc_html__('Text Color', 'webt'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .woocommerce-MyAccount-paymentMethods .woocommerce-orders-table__cell-order-actions a' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'button_bg_color',
			[
				'label' => esc_html__('Background Color', 'webt'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .woocommerce-MyAccount-paymentMethods .woocommerce-orders-table__cell-order-actions a' => 'background-color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'button_border',
				'selector' => '{{WRAPPER}} .woocommerce-MyAccount-paymentMethods .woocommerce-orders-table__cell-order-actions a',
			]
		);

		$this->add_control(
			'button_radius',
			[
				'label' => esc_html__('Radius', 'webt'),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', '%'],
				'selectors' => [
					'{{WRAPPER}} .woocommerce-MyAccount-paymentMethods .woocommerce-orders-table__cell-order-actions a' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_tab();

		$this->start_controls_tab(
			'button_style_hover',
			[
				'label' => esc_html__('Hover', 'webt'),
			]
		);

		$this->add_control(
			'button_text_color_hover',
			[
				'label' => esc_html__('Text Color', 'webt'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .woocommerce-MyAccount-paymentMethods .woocommerce-orders-table__cell-order-actions a:hover' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'button_bg_color_hover',
			[
				'label' => esc_html__('Background Color', 'webt'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .woocommerce-MyAccount-paymentMethods .woocommerce-orders-table__cell-order-actions a:hover' => 'background-color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'button_border_hover',
				'selector' => '{{WRAPPER}} .woocommerce-MyAccount-paymentMethods .woocommerce-orders-table__cell-order-actions a:hover',
			]
		);

		$this->add_control(
			'button_radius_hover',
			[
				'label' => esc_html__('Radius', 'webt'),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', '%'],
				'selectors' => [
					'{{WRAPPER}} .woocommerce-MyAccount-paymentMethods .woocommerce-orders-table__cell-order-actions a:hover' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'button_transition',
			[
				'label' => esc_html__('Transition Duration', 'webt'),
				'type' => Controls_Manager::SLIDER,
				'default' => [
					'size' => 0.2,
				],
				'range' => [
					'px' => [
						'max' => 2,
						'step' => 0.1,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .woocommerce-MyAccount-paymentMethods .woocommerce-orders-table__cell-order-actions a' => 'transition: all {{SIZE}}s',
				],
			]
		);

		$this->end_controls_tab();
		$this->end_controls_tabs();

		$this->add_responsive_control(
			'button_margin',
			[
				'label' => esc_html__('Margin', 'elementor'),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', 'em'],
				'selectors' => [
					'{{WRAPPER}} .woocommerce-MyAccount-paymentMethods .woocommerce-orders-table__cell-order-actions a' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'button_padding',
			[
				'label' => esc_html__('Padding', 'elementor'),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', 'em'],
				'selectors' => [
					'{{WRAPPER}} .woocommerce-MyAccount-paymentMethods .woocommerce-orders-table__cell-order-actions a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();
	}

	/**
	 * Render widget output on the frontend.
	 */
	protected function render()
	{
		wc_get_template('myaccount/payment-methods-table.php');
	}
}

Plugin::elementor_instance()->widgets_manager->register_widget_type(new Widget_MyAccount_Payment_Methods());
