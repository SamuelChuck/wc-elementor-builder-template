<?php

namespace WEBT;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Border;
use Elementor\Group_Control_Typography;
use WEBT\Plugin;
use WP_List_Table;

/**
 * WooCommerce Elementor Builder Widget.
 *
 * @package webt
 */
if (!defined('ABSPATH')) {
	exit; // Exit if accessed directly.
}

class Widget_MyAccounr_Orders extends Widget_Base
{

	/**
	 * Get widget name.
	 */
	public function get_name()
	{
		return 'webtorders';
	}

	/**
	 * Get widget title.
	 */
	public function get_title()
	{
		return esc_html__('My account orders', 'woocommerce');
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
        return ['webt', 'woocommerce', 'orders', 'myaccount'];
    }
	/**
	 * Register oEmbed widget controls.
	 */
	protected function _register_controls()
	{
		$this->start_controls_section(
			'section_heading_style',
			array(
				'label' => esc_html__('Headings', 'elementor'),
				'tab' => Controls_Manager::TAB_STYLE,
			)
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			array(
				'name'      => 'heading_typography',
				'label'     => esc_html__('Typography', 'elementor'),
				'selector'  => '{{WRAPPER}} .shop_table thead th',
			)
		);
		$this->add_control(
			'heading_color',
			[
				'label' => esc_html__('Color', 'elementor'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .shop_table thead th' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'heading_border',
				'selector' => '{{WRAPPER}} .shop_table thead th',
				'exclude' => ['color'],
			]
		);

		$this->add_control(
			'heading_border_color',
			[
				'label' => esc_html__('Border Color', 'webt'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .shop_table thead th' => 'border-color: {{VALUE}}',
				],
			]
		);

		$this->add_responsive_control(
			'heading_padding',
			[
				'label' => esc_html__('Padding', 'elementor'),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', 'em'],
				'selectors' => [
					'{{WRAPPER}} .shop_table thead th' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'heading_text_align',
			[
				'label'        => esc_html__('Alignment', 'webt'),
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
				'default'      => '',
				'selectors' => [
					'{{WRAPPER}} .shop_table thead th' => 'text-align: {{VALUE}}',
				],
			]
		);

		$this->end_controls_section();
		// Rows style
		$this->start_controls_section(
			'section_row_style',
			array(
				'label' => esc_html__('Row Style', 'webt'),
				'tab' => Controls_Manager::TAB_STYLE,
			)
		);
		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'row_border',
				'selector' => '{{WRAPPER}} .woocommerce-orders-table__row',
				'exclude' => ['color'],
			]
		);
		$this->add_control(
			'row_border_color',
			[
				'label' => esc_html__('Border Color', 'webt'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .woocommerce-orders-table__row' => 'border-color: {{VALUE}}',
				],
			]
		);
		$this->add_responsive_control(
			'row_padding',
			[
				'label' => esc_html__('Padding', 'elementor'),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', 'em'],
				'selectors' => [
					'{{WRAPPER}} .woocommerce-orders-table__row td' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
					'{{WRAPPER}} .woocommerce-orders-table__row td' => 'text-align: {{VALUE}}',
				],
			]
		);
		$this->end_controls_section();

		// Order style
		$this->start_controls_section(
			'section_order_style',
			array(
				'label' => esc_html__('Order', 'woocommerce'),
				'tab' => Controls_Manager::TAB_STYLE,
			)
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			array(
				'name'      => 'order_typography',
				'label'     => esc_html__('Typography', 'elementor'),
				'selector'  => '{{WRAPPER}} .woocommerce-orders-table__row .woocommerce-orders-table__cell-order-number a',
			)
		);
		$this->add_control(
			'order_color',
			[
				'label' => esc_html__('Color', 'elementor'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .woocommerce-orders-table__row .woocommerce-orders-table__cell-order-number a' => 'color: {{VALUE}}',
				],
			]
		);
		$this->end_controls_section();

		// Date style
		$this->start_controls_section(
			'section_date_style',
			array(
				'label' => esc_html__('Date', 'woocommerce'),
				'tab' => Controls_Manager::TAB_STYLE,
			)
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			array(
				'name'      => 'date_typography',
				'label'     => esc_html__('Typography', 'elementor'),
				'selector'  => '{{WRAPPER}} .woocommerce-orders-table__row .woocommerce-orders-table__cell-order-date',
			)
		);
		$this->add_control(
			'date_color',
			[
				'label' => esc_html__('Color', 'elementor'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .woocommerce-orders-table__row .woocommerce-orders-table__cell-order-date' => 'color: {{VALUE}}',
				],
			]
		);
		$this->end_controls_section();

		// Status style
		$this->start_controls_section(
			'section_status_style',
			array(
				'label' => esc_html__('Status', 'webt'),
				'tab' => Controls_Manager::TAB_STYLE,
			)
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			array(
				'name'      => 'status_typography',
				'label'     => esc_html__('Typography', 'elementor'),
				'selector'  => '{{WRAPPER}} .woocommerce-orders-table__row .woocommerce-orders-table__cell-order-status',
			)
		);
		$this->add_control(
			'status_color',
			[
				'label' => esc_html__('Color', 'elementor'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .woocommerce-orders-table__row .woocommerce-orders-table__cell-order-status' => 'color: {{VALUE}}',
				],
			]
		);
		$this->end_controls_section();

		// total style
		$this->start_controls_section(
			'section_total_style',
			array(
				'label' => esc_html__('Total', 'webt'),
				'tab' => Controls_Manager::TAB_STYLE,
			)
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			array(
				'name'      => 'total_typography',
				'label'     => esc_html__('Typography', 'elementor'),
				'selector'  => '{{WRAPPER}} .woocommerce-orders-table__row .woocommerce-orders-table__cell-order-total',
			)
		);
		$this->add_control(
			'total_color',
			[
				'label' => esc_html__('Color', 'elementor'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .woocommerce-orders-table__row .woocommerce-orders-table__cell-order-total' => 'color: {{VALUE}}',
				],
			]
		);
		$this->end_controls_section();

		// actions style
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
				'selector'  => '{{WRAPPER}} .woocommerce-orders-table__row .woocommerce-orders-table__cell-order-actions a',
			)
		);
		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'actions_button_border',
				'selector' => '{{WRAPPER}} .woocommerce-orders-table__row .woocommerce-orders-table__cell-order-actions a',
				'exclude' => ['color'],
			]
		);
		$this->add_responsive_control(
			'actions_button_padding',
			[
				'label' => esc_html__('Padding', 'elementor'),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', 'em'],
				'selectors' => [
					'{{WRAPPER}} .woocommerce-orders-table__row .woocommerce-orders-table__cell-order-actions a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		/////
		$this->start_controls_tabs('actions_button_style_tabs');

		$this->start_controls_tab(
			'actions_button_style_normal',
			[
				'label' => esc_html__('Normal', 'webt'),
			]
		);

		$this->add_control(
			'actions_button_text_color',
			[
				'label' => esc_html__('Text Color', 'webt'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .woocommerce-orders-table__row .woocommerce-orders-table__cell-order-actions a' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'actions_button_bg_color',
			[
				'label' => esc_html__('Background Color', 'webt'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .woocommerce-orders-table__row .woocommerce-orders-table__cell-order-actions a' => 'background-color: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'actions_button_border_color',
			[
				'label' => esc_html__('Border Color', 'webt'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .woocommerce-orders-table__row .woocommerce-orders-table__cell-order-actions a' => 'border-color: {{VALUE}}',
				],
			]
		);
		$this->add_control(
			'actions_button_radius',
			[
				'label' => esc_html__('Border Radius', 'webt'),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', '%'],
				'selectors' => [
					'{{WRAPPER}} .woocommerce-orders-table__row .woocommerce-orders-table__cell-order-actions a' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_tab();

		$this->start_controls_tab(
			'actions_button_style_hover',
			[
				'label' => esc_html__('Hover', 'webt'),
			]
		);

		$this->add_control(
			'actions_button_text_color_hover',
			[
				'label' => esc_html__('Text Color', 'webt'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .woocommerce-orders-table__row .woocommerce-orders-table__cell-order-actions a:hover' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'actions_button_bg_color_hover',
			[
				'label' => esc_html__('Background Color', 'webt'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .woocommerce-orders-table__row .woocommerce-orders-table__cell-order-actions a:hover' => 'background-color: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'actions_button_border_color_hover',
			[
				'label' => esc_html__('Border Color', 'webt'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .woocommerce-orders-table__row .woocommerce-orders-table__cell-order-actions a:hover' => 'border-color: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'actions_button_radius_hover',
			[
				'label' => esc_html__('Border Radius', 'webt'),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', '%'],
				'selectors' => [
					'{{WRAPPER}} .woocommerce-orders-table__row .woocommerce-orders-table__cell-order-actions a:hover' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'actions_button_transition',
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
					'{{WRAPPER}} .woocommerce-orders-table__row .woocommerce-orders-table__cell-order-actions a' => 'transition: all {{SIZE}}s',
				],
			]
		);

		$this->end_controls_tab();

		$this->end_controls_tabs();
		$this->end_controls_section();
	}

	/**
	 * Render widget output on the frontend.
	 */
	protected function render()
	{
		$current_page = (new WP_List_Table)->get_pagenum();

		if (!is_user_logged_in()) {
			return esc_html__('You need first to be logged in', 'webt');
		} else {
			$current_page    = empty($current_page) ? 1 : absint($current_page);
			$customer_orders = wc_get_orders(
				apply_filters(
					'woocommerce_my_account_my_orders_query',
					array(
						'customer' => get_current_user_id(),
						'page'     => $current_page,
						'paginate' => true,
					)
				)
			);

			wc_get_template(
				'myaccount/orders-table.php',
				array(
					'current_page'    => absint($current_page),
					'customer_orders' => $customer_orders,
					'has_orders'      => 0 < $customer_orders->total,
				)
			);
		}
	}
}

Plugin::elementor_instance()->widgets_manager->register_widget_type(new Widget_MyAccounr_Orders ());
