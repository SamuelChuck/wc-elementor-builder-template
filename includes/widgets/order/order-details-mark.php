<?php

namespace WEBT;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Border;
use Elementor\Group_Control_Typography;
use WEBT\Plugin;

/**
 * WooCommerce Elementor Builder Template Widget.
 *
 * @class Widget_Order_Details_Mark
 * @package webt
 */
if (!defined('ABSPATH')) {
	exit; // Exit if accessed directly.
}

class Widget_Order_Details_Mark extends Widget_Base
{

	/**
	 * Get widget name.
	 */
	public function get_name()
	{
		return 'webt-order-details-mark';
	}

	/**
	 * Get widget title.
	 */
	public function get_title()
	{
		return esc_html__('Order Details Mark', 'webt');
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
		return ['webt', 'woocommerce', 'orders', 'details', 'mark'];
	}

	/**
	 * Register oEmbed widget controls.
	 */
	protected function _register_controls()
	{
		$this->start_controls_section(
			'section_paragraph_style',
			array(
				'label' => esc_html__('Paragraph', 'webt'),
				'tab' => Controls_Manager::TAB_STYLE,
			)
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			array(
				'name'      => 'paragraph_typography',
				'label'     => esc_html__('Typography', 'elementor'),
				'selector'  => '{{WRAPPER}} .woocommerce-order-details__mark',
			)
		);
		$this->add_control(
			'paragraph_color',
			[
				'label' => esc_html__('Color', 'elementor'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .woocommerce-order-details__mark' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'paragraph_border',
				'selector' => '{{WRAPPER}} .woocommerce-order-details__mark',
			]
		);
		$this->add_responsive_control(
			'paragraph_border_radius',
			[
				'label' => esc_html__('Radius', 'elementor'),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', 'em'],
				'selectors' => [
					'{{WRAPPER}} .woocommerce-order-details__mark' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_responsive_control(
			'paragraph_padding',
			[
				'label' => esc_html__('Padding', 'elementor'),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', 'em'],
				'selectors' => [
					'{{WRAPPER}} .woocommerce-order-details__mark' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_responsive_control(
			'paragraph_text_align',
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
				'default'      => '',
				'selectors' => [
					'{{WRAPPER}} .woocommerce-order-details__mark' => 'text-align: {{VALUE}}',
				],
			]
		);
		$this->end_controls_section();

		$this->start_controls_section(
			'section_mark_style',
			array(
				'label' => esc_html__('Mark', 'webt'),
				'tab' => Controls_Manager::TAB_STYLE,
			)
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			array(
				'name'      => 'mark_typography',
				'selector'  => '{{WRAPPER}} .woocommerce-order-details__mark mark',
			)
		);
		$this->add_control(
			'mark_color',
			[
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .woocommerce-order-details__mark mark' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_control(
			'mark_bg_color',
			[
				'label' => esc_html__('Background Color', 'webt'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .woocommerce-order-details__mark mark' => 'background-color: {{VALUE}}',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'mark_border',
				'selector' => '{{WRAPPER}} .woocommerce-order-details__mark mark',
			]
		);
		$this->add_responsive_control(
			'mark_border_radius',
			[
				'label' => esc_html__('Radius', 'elementor'),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', 'em'],
				'selectors' => [
					'{{WRAPPER}} .woocommerce-order-details__mark mark' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);		$this->add_responsive_control(
			'mark_padding',
			[
				'label' => esc_html__('Padding', 'elementor'),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', 'em'],
				'selectors' => [
					'{{WRAPPER}} .woocommerce-order-details__mark mark' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);		$this->add_responsive_control(
			'mark_margin',
			[
				'label' => esc_html__('Margin', 'elementor'),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', 'em'],
				'selectors' => [
					'{{WRAPPER}} .woocommerce-order-details__mark mark' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
		$order_id = webt_order_id();
		$order = wc_get_order($order_id); // phpcs:ignore WordPress.WP.GlobalVariablesOverride.Prohibited

		if (empty($order) || !$order) {
			return;
		} ?>
		<p class="woocommerce-order-details__mark">
			<?php
			printf(
				/* translators: 1: order number 2: order date 3: order status */
				esc_html__('Order #%1$s was placed on %2$s and is currently %3$s.', 'woocommerce'),
				'<mark class="order-number">' . $order->get_order_number() . '</mark>', // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
				'<mark class="order-date">' . wc_format_datetime($order->get_date_created()) . '</mark>', // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
				'<mark class="order-status">' . wc_get_order_status_name($order->get_status()) . '</mark>' // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
			);
			?>
		</p>
<?php
	}
}

Plugin::elementor_instance()->widgets_manager->register_widget_type(new Widget_Order_Details_Mark());
