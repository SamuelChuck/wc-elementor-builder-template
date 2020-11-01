<?php

namespace WEBT;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Border;
use Elementor\Group_Control_Box_Shadow;
use Elementor\Group_Control_Typography;
use WEBT\Plugin;
use WEBT\TemplateLibrary\Source_Local;

/**
 * WooCommerce Elementor Builder Widget.
 *
 * @package webt
 */
if (!defined('ABSPATH')) {
	exit; // Exit if accessed directly.
}

class Widget_Form_Additional_Note_Form extends Widget_Base
{

	/**
	 * Get widget name.
	 */
	public function get_name()
	{
		return 'webt-additional-note';
	}

	/**
	 * Get widget title.
	 */
	public function get_title()
	{
		return esc_html__('Additional Note', 'webt');
	}

	/**
	 * Get widget icon.
	 */
	public function get_icon()
	{
		return 'eicon-form-horizontal';
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
		return ['webt', 'woocommerce', 'checkout', 'note', 'additional', 'form'];
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
				'selector'  => '{{WRAPPER}} .woocommerce-additional-fields > h3',
			)
		);
		$this->add_control(
			'heading_color',
			[
				'label' => esc_html__('Color', 'elementor'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .woocommerce-additional-fields > h3' => 'color: {{VALUE}}',
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
					'{{WRAPPER}} .woocommerce-additional-fields > h3' => 'text-align: {{VALUE}}',
				],
			]
		);
		$this->end_controls_section();

		// label
		$this->start_controls_section(
			'label_style',
			array(
				'label' => esc_html__('Label', 'webt'),
				'tab' => Controls_Manager::TAB_STYLE,
			)
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			array(
				'name'      => 'label_typography',
				'label'     => esc_html__('Typography', 'elementor'),
				'selector'  => '{{WRAPPER}} .woocommerce-additional-fields .form-row label',
			)
		);
		$this->add_control(
			'label_color',
			[
				'label' => esc_html__('Label Color', 'webt'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .woocommerce-additional-fields .form-row label' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_responsive_control(
			'label_align',
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
					'{{WRAPPER}} .woocommerce-additional-fields .form-row label' => 'text-align: {{VALUE}}',
				],
			]
		);
		$this->end_controls_section();

		// Input Fields
		$this->start_controls_section(
			'input_style',
			array(
				'label' => esc_html__('Input Fields', 'webt'),
				'tab' => Controls_Manager::TAB_STYLE,
			)
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			array(
				'name'      => 'input_typography',
				'label'     => esc_html__('Typography', 'elementor'),
				'selector'  => '{{WRAPPER}} .woocommerce-additional-fields input , {{WRAPPER}} .woocommerce-additional-fields textarea',
			)
		);
		$this->add_control(
			'input_placeholder_color',
			[
				'label'     => esc_html__('Field Placeholder Input Color', 'webt'),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .woocommerce-additional-fields input::placeholder' => 'color: {{VALUE}};',
					'{{WRAPPER}} .woocommerce-additional-fields input::-webkit-input-placeholder' => 'color: {{VALUE}};',
					'{{WRAPPER}} .woocommerce-additional-fields input::-moz-placeholder' => 'color: {{VALUE}};',
					'{{WRAPPER}} .woocommerce-additional-fields input:-ms-input-placeholder' => 'color: {{VALUE}};',
					'{{WRAPPER}} .woocommerce-additional-fields textarea::placeholder' => 'color: {{VALUE}};',
					'{{WRAPPER}} .woocommerce-additional-fields textarea::-webkit-input-placeholder' => 'color: {{VALUE}};',
					'{{WRAPPER}} .woocommerce-additional-fields textarea::-moz-placeholder' => 'color: {{VALUE}};',
					'{{WRAPPER}} .woocommerce-additional-fields textarea:-ms-input-placeholder' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_responsive_control(
			'input_padding',
			[
				'label' => esc_html__('Padding', 'elementor'),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', 'em'],
				'selectors' => [
					'{{WRAPPER}} .woocommerce-additional-fields input, {{WRAPPER}} .woocommerce-additional-fields textarea' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);


		$this->start_controls_tabs('tabs_input_style');
		$this->start_controls_tab(
			'tab_input_normal',
			[
				'label' => esc_html__('Normal', 'webt'),
			]
		);

		$this->add_control(
			'input_color',
			[
				'label' => esc_html__('Text Color', 'webt'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .woocommerce-additional-fields input, {{WRAPPER}} .woocommerce-additional-fields textarea' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'input_border',
				'selector' => '{{WRAPPER}} .woocommerce-additional-fields input, {{WRAPPER}} .woocommerce-additional-fields textarea',
				'exclude' => ['color'],
			]
		);

		$this->add_control(
			'input_border_color',
			[
				'label' => esc_html__('Border Color', 'webt'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .woocommerce-additional-fields input, {{WRAPPER}} .woocommerce-additional-fields textarea' => 'border-color: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'input_bg_color',
			[
				'label' => esc_html__('Background Color', 'webt'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .woocommerce-additional-fields input, {{WRAPPER}} .woocommerce-additional-fields textarea' => 'background-color: {{VALUE}}',
				],
			]
		);
		$this->add_control(
			'input_border_radius',
			[
				'label' => esc_html__('Border Radius', 'webt'),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', '%'],
				'selectors' => [
					'{{WRAPPER}} woocommerce-additional-fields input, {{WRAPPER}} .woocommerce-additional-fields textarea' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'input_box_shadow',
				'selector' => '{{WRAPPER}} woocommerce-additional-fields input, {{WRAPPER}} .woocommerce-additional-fields textarea',
			]
		);

		$this->end_controls_tab();

		$this->start_controls_tab(
			'tab_input_focus',
			[
				'label' => esc_html__('Focus', 'webt'),
			]
		);
		$this->add_control(
			'input_focus_color',
			[
				'label' => esc_html__('Text Color', 'webt'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .woocommerce-additional-fields input:focus, {{WRAPPER}} .woocommerce-additional-fields textarea:focus' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'input_focus_border',
				'selector' => '{{WRAPPER}} .woocommerce-additional-fields input:focus, {{WRAPPER}} .woocommerce-additional-fields textarea:focus',
				'exclude' => ['color'],
			]
		);

		$this->add_control(
			'input_focus_border_color',
			[
				'label' => esc_html__('Border Color', 'webt'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .woocommerce-additional-fields input:focus, {{WRAPPER}} .woocommerce-additional-fields textarea:focus' => 'border-color: {{VALUE}}',
				],
			]
		);
		
		$this->add_control(
			'input_focus_bg_color',
			[
				'label' => esc_html__('Background Color', 'webt'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .woocommerce-additional-fields input:focus, {{WRAPPER}} .woocommerce-additional-fields textarea:focus' => 'background-color: {{VALUE}}',
				],
			]
		);
		$this->add_control(
			'input_focus_border_radius',
			[
				'label' => esc_html__('Border Radius', 'webt'),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', '%'],
				'selectors' => [
					'{{WRAPPER}} woocommerce-additional-fields input:focus, {{WRAPPER}} .woocommerce-additional-fields textarea:focus' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'input_focus_box_shadow',
				'selector' => '{{WRAPPER}} woocommerce-additional-fields input:focus, {{WRAPPER}} .woocommerce-additional-fields textarea:focus',
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
		$post_type = get_post_type();
		if ($post_type == Source_Local::post_type()) {
			$checkout = WC()->checkout();
			if (sizeof($checkout->checkout_fields) > 0) { ?>
				<div class="woocommerce-additional-fields">
					<?php do_action('woocommerce_before_order_notes', $checkout); ?>

					<?php if (apply_filters('woocommerce_enable_order_notes_field', 'yes' === get_option('woocommerce_enable_order_comments', 'yes'))) : ?>

						<h3><?php _e('Additional information', 'woocommerce'); ?></h3>

						<div class="woocommerce-additional-fields__field-wrapper">
							<?php foreach ($checkout->get_checkout_fields('order') as $key => $field) : ?>
								<?php woocommerce_form_field($key, $field, $checkout->get_value($key)); ?>
							<?php endforeach; ?>
						</div>

					<?php endif; ?>

					<?php do_action('woocommerce_after_order_notes', $checkout); ?>
				</div>
			<?php
			}
		} elseif (is_checkout()) {
			$checkout = WC()->checkout();
			if (sizeof($checkout->checkout_fields) > 0) { ?>
				<div class="woocommerce-additional-fields">
					<?php do_action('woocommerce_before_order_notes', $checkout); ?>

					<?php if (apply_filters('woocommerce_enable_order_notes_field', 'yes' === get_option('woocommerce_enable_order_comments', 'yes'))) : ?>

						<?php if (!WC()->cart->needs_shipping() || wc_ship_to_billing_address_only()) : ?>

							<h3><?php _e('Additional information', 'woocommerce'); ?></h3>

						<?php endif; ?>

						<div class="woocommerce-additional-fields__field-wrapper">
							<?php foreach ($checkout->get_checkout_fields('order') as $key => $field) : ?>
								<?php woocommerce_form_field($key, $field, $checkout->get_value($key)); ?>
							<?php endforeach; ?>
						</div>

					<?php endif; ?>

					<?php do_action('woocommerce_after_order_notes', $checkout); ?>
				</div>
<?php
			}
		}
	}
}

Plugin::elementor_instance()->widgets_manager->register_widget_type(new Widget_Form_Additional_Note_Form ());
