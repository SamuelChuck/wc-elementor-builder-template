<?php

namespace WEBT;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Border;
use Elementor\Group_Control_Box_Shadow;
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

class Widget_Order_Details extends Widget_Base
{

	/**
	 * Get widget name.
	 */
	public function get_name()
	{
		return 'webt-order-details';
	}

	/**
	 * Get widget title.
	 */
	public function get_title()
	{
		return esc_html__('Order Details', 'webt');
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
		return ['webt', 'woocommerce', 'order details', 'orders', 'myaccount'];
	}

	/**
	 * Register oEmbed widget controls.
	 */
	protected function _register_controls()
	{
		// Heading
		$this->start_controls_section(
			'heading_style',
			array(
				'label' => esc_html__('Heading', 'elementor'),
				'tab' => Controls_Manager::TAB_STYLE,
			)
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			array(
				'name'      => 'heading_typography',
				'label'     => esc_html__('Typography', 'elementor'),
				'selector'  => '{{WRAPPER}} .woocommerce-order-details .woocommerce-order-details__title',
			)
		);
		$this->add_control(
			'heading_color',
			[
				'label' => esc_html__('Color', 'elementor'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .woocommerce-order-details .woocommerce-order-details__title' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_responsive_control(
			'heading_align',
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
				'prefix_class' => '',
				'default'      => '',
				'selectors' => [
					'{{WRAPPER}} .woocommerce-order-details .woocommerce-order-details__title' => 'text-align: {{VALUE}}',
				],
			]
		);
		$this->end_controls_section();

		/* ------------------------------- Table head ------------------------------- */
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
				'label' => __('Color', 'webt'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .woocommerce-table--order-details tr th' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			array(
				'name' => 'order_table_heading_typography',
				'label' => __('Typography', 'webt'),
				'selector' => '{{WRAPPER}} .woocommerce-table--order-details tr th',
			)
		);

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'order_table_heading_border',
				'selector' => '{{WRAPPER}} .woocommerce-table--order-details tr th',
			]
		);

		$this->add_responsive_control(
			'order_table_heading_padding',
			[
				'label' => __('Padding', 'webt'),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', 'em', '%'],
				'selectors' => [
					'{{WRAPPER}} .woocommerce-table--order-details tr th' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
					'{{WRAPPER}} .woocommerce-table--order-details tr th' => 'text-align: {{VALUE}}',
				],
			]
		);

		$this->end_controls_section();

		/* ------------------------------- order_item ------------------------------- */
		$this->start_controls_section(
			'order_item_style',
			array(
				'label' => esc_html__('Order Item', 'webt'),
				'tab' => Controls_Manager::TAB_STYLE,
			)
		);
		$this->start_controls_tabs('order_item_style_tabs');
		//product_name
		$this->start_controls_tab(
			'product_name_style',
			[
				'label' => esc_html__('Product Name', 'webt'),
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			array(
				'name'      => 'product_name_typography',
				'label'     => esc_html__('Typography', 'elementor'),
				'selector'  => '{{WRAPPER}} .woocommerce-table--order-details .order_item .product-name',
			)
		);
		$this->add_control(
			'product_name_color',
			[
				'label' => esc_html__('Text Color', 'webt'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .woocommerce-table--order-details .order_item .product-name a' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_control(
			'product_quantity_color',
			[
				'label' => esc_html__('Quantity Color', 'webt'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .woocommerce-table--order-details .order_item .product-name .product-quantity' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'product_name_border',
				'selector' => '{{WRAPPER}} .woocommerce-table--order-details .order_item .product-name',
			]
		);
		$this->add_responsive_control(
			'product_name_padding',
			[
				'label' => esc_html__('Padding', 'elementor'),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', 'em'],
				'selectors' => [
					'{{WRAPPER}} .woocommerce-table--order-details .order_item .product-name' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->end_controls_tab();
		//product_total
		$this->start_controls_tab(
			'product_total_style',
			[
				'label' => esc_html__('Product Total', 'webt'),
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			array(
				'name'      => 'product_total_typography',
				'label'     => esc_html__('Typography', 'elementor'),
				'selector'  => '{{WRAPPER}} .woocommerce-table--order-details .order_item .product-total',
			)
		);
		$this->add_control(
			'product_total_color',
			[
				'label' => esc_html__('Text Color', 'webt'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .woocommerce-table--order-details .order_item .product-total' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'product_total_border',
				'selector' => '{{WRAPPER}} .woocommerce-table--order-details .order_item .product-total',
			]
		);
		$this->add_responsive_control(
			'product_total_padding',
			[
				'label' => esc_html__('Padding', 'elementor'),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', 'em'],
				'selectors' => [
					'{{WRAPPER}} .woocommerce-table--order-details .order_item .product-total' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->end_controls_tab();
		$this->end_controls_tabs();
		$this->end_controls_section();

		// Total
		$this->start_controls_section(
			'total_style_section',
			array(
				'label' => esc_html__('Total', 'webt'),
				'tab' => Controls_Manager::TAB_STYLE,
			)
		);
		$this->start_controls_tabs('total_style_tabs');
		//total label
		$this->start_controls_tab(
			'total_label_style',
			[
				'label' => esc_html__('Label', 'webt'),
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			array(
				'name'      => 'total_label_typography',
				'label'     => esc_html__('Typography', 'elementor'),
				'selector'  => '{{WRAPPER}} .woocommerce-table--order-details tfoot th',
			)
		);
		$this->add_control(
			'total_label_color',
			[
				'label' => esc_html__('Color', 'elementor'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .woocommerce-table--order-details tfoot th' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'total_label_border',
				'selector' => '{{WRAPPER}} .woocommerce-table--order-details tfoot th',
			]
		);
		$this->add_responsive_control(
			'total_label_padding',
			[
				'label' => esc_html__('Padding', 'elementor'),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', 'em'],
				'selectors' => [
					'{{WRAPPER}} .woocommerce-table--order-details tfoot th' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->end_controls_tab();
		//total
		$this->start_controls_tab(
			'total_style',
			[
				'label' => esc_html__('Total', 'webt'),
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			array(
				'name'      => 'total_typography',
				'label'     => esc_html__('Typography', 'elementor'),
				'selector'  => '{{WRAPPER}} tfoot td',
			)
		);
		$this->add_control(
			'total_color',
			[
				'label' => esc_html__('Color', 'elementor'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .woocommerce-table--order-details tfoot td' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'total_border',
				'selector' => '{{WRAPPER}} .woocommerce-table--order-details tfoot td',
			]
		);
		$this->add_responsive_control(
			'total_padding',
			[
				'label' => esc_html__('Padding', 'elementor'),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', 'em'],
				'selectors' => [
					'{{WRAPPER}} .woocommerce-table--order-details tfoot td' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->end_controls_tab();
		$this->end_controls_tabs();
		$this->end_controls_section();

		/* ------------------------------ button style ------------------------------ */

		$this->start_controls_section(
			'section_button_style',
			array(
				'label' => esc_html__('Button', 'webt'),
				'tab' => Controls_Manager::TAB_STYLE,
			)
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			array(
				'name'      => 'button_typography',
				'label'     => esc_html__('Typography', 'elementor'),
				'selector'  => '{{WRAPPER}} .woocommerce-order-details .order-again a.button',
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
					'{{WRAPPER}} .woocommerce-order-details .order-again a.button' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'button_bg_color',
			[
				'label' => esc_html__('Background Color', 'webt'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .woocommerce-order-details .order-again a.button' => 'background-color: {{VALUE}}',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'button_border',
				'selector' => '{{WRAPPER}} .woocommerce-order-details .order-again a.button',
			]
		);
		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'button_box_shadow',
				'selector' => '{{WRAPPER}} .woocommerce-order-details .order-again a.button',
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
					'{{WRAPPER}} .woocommerce-order-details .order-again a.button:hover' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'button_bg_color_hover',
			[
				'label' => esc_html__('Background Color', 'webt'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .woocommerce-order-details .order-again a.button:hover' => 'background-color: {{VALUE}}',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'button_border_hover',
				'selector' => '{{WRAPPER}} .woocommerce-order-details .order-again a.button:hover',
			]
		);

		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'button_box_shadow_hover',
				'selector' => '{{WRAPPER}} .woocommerce-order-details .order-again a.button:hover',
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
					'{{WRAPPER}} .woocommerce-order-details .order-again a.button' => 'transition: all {{SIZE}}s',
				],
			]
		);

		$this->end_controls_tab();

		$this->end_controls_tabs();
		$this->add_control(
			'button_border_radius',
			[
				'label' => __('Border Radius', 'webt'),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', '%'],
				'selectors' => [
					'{{WRAPPER}} .woocommerce-order-details .order-again a.button' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_responsive_control(
			'button_margin',
			[
				'label' => esc_html__('Margin', 'elementor'),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', 'em'],
				'selectors' => [
					'{{WRAPPER}} .woocommerce-order-details .order-again a.button' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
					'{{WRAPPER}} .woocommerce-order-details .order-again a.button' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'button_width',
			[
				'label' => __('Width', 'webt'),
				'type' =>  Controls_Manager::SLIDER,
				'size_units' => ['px', '%'],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 1000,
						'step' => 5,
					],
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'default' => [
					'unit' => '%',
					'size' => 100,
				],
				'selectors' => [
					'{{WRAPPER}} .woocommerce-order-details .order-again a.button' => 'width: {{SIZE}}{{UNIT}};',
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
		global $wp;
		$order_id = '';
		$orders = get_option('woocommerce_myaccount_orders_endpoint');
		$view_order = get_option('woocommerce_myaccount_view_order_endpoint');
		$order_received = get_option('woocommerce_checkout_order_received_endpoint');

		if (isset($wp->query_vars[$orders])) {
			$order_id = $wp->query_vars[$orders];
		} elseif (isset($wp->query_vars[$view_order])) {
			$order_id = $wp->query_vars[$view_order];
		} elseif (isset($wp->query_vars[$order_received])) {
			$order_id = $wp->query_vars[$order_received];
		} elseif (webt_is_preview_mode() !== false || !webt_is_edit_mode() !== false) {
			$order_id = webt_last_order_id();
		}

		if (!$order_id) {
			return;
		}

		wc_get_template(
			'order/order-details-table.php',
			array(
				'order_id' => $order_id,
			)
		);
	}
}

Plugin::elementor_instance()->widgets_manager->register_widget_type(new Widget_Order_Details());
