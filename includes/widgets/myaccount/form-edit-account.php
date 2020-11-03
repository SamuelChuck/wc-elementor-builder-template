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

class Widget_MyAccount_Edit_Account extends Widget_Base
{

	/**
	 * Get widget name.
	 */
	public function get_name()
	{
		return 'webt-edit-account-form';
	}

	/**
	 * Get widget title.
	 */
	public function get_title()
	{
		return esc_html__('My account details', 'woocommerce');
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
		return ['webt', 'woocommerce', 'myaccount', 'edit', 'account', 'form'];
	}

	/**
	 * Register oEmbed widget controls.
	 */
	protected function _register_controls()
	{
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
				'selector'  => '{{WRAPPER}} .woocommerce-EditAccountForm label',
			)
		);
		$this->add_control(
			'label_color',
			[
				'label' => esc_html__('Label Color', 'webt'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .woocommerce-EditAccountForm label' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_control(
			'label_required_color',
			[
				'label' => esc_html__('Required Color', 'webt'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .woocommerce-EditAccountForm label .required' => 'color: {{VALUE}}',
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
					'{{WRAPPER}} .woocommerce-EditAccountForm label' => 'text-align: {{VALUE}}',
				],
			]
		);
		$this->end_controls_section();

		// Input Fields
		$this->start_controls_section(
			'field_style',
			array(
				'label' => esc_html__('Input', 'webt'),
				'tab' => Controls_Manager::TAB_STYLE,
			)
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			array(
				'name'      => 'field_typography',
				'label'     => esc_html__('Typography', 'elementor'),
				'selector'  => '{{WRAPPER}} .woocommerce-EditAccountForm input',
			)
		);
		$this->add_responsive_control(
			'field_padding',
			[
				'label' => esc_html__('Padding', 'elementor'),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', 'em'],
				'selectors' => [
					'{{WRAPPER}} .woocommerce-EditAccountForm input' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
			'field_color',
			[
				'label' => esc_html__('Text Color', 'webt'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .woocommerce-EditAccountForm input' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'border',
				'selector' => '{{WRAPPER}} .woocommerce-EditAccountForm input',
			]
		);

		$this->add_control(
			'field_bg_color',
			[
				'label' => esc_html__('Background Color', 'webt'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .woocommerce-EditAccountForm input' => 'background-color: {{VALUE}}',
				],
			]
		);
		$this->add_control(
			'input_border_radius',
			[
				'label' => esc_html__('Radius', 'webt'),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', '%'],
				'selectors' => [
					'{{WRAPPER}} .woocommerce-EditAccountForm input.input-text' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'input_box_shadow',
				'selector' => '{{WRAPPER}} .woocommerce-EditAccountForm input.input-text',
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
					'{{WRAPPER}} .woocommerce-EditAccountForm input.input-text:focus' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'input_focus_border',
				'selector' => '{{WRAPPER}} .woocommerce-EditAccountForm input.input-text:focus',
			]
		);
		$this->add_control(
			'input_focus_bg_color',
			[
				'label' => esc_html__('Background Color', 'webt'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .woocommerce-EditAccountForm input.input-text:focus' => 'background-color: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'input_focus_border_radius',
			[
				'label' => esc_html__('Radius', 'webt'),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', '%'],
				'selectors' => [
					'{{WRAPPER}} .woocommerce-EditAccountForm input.input-text:focus' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'input_focus_box_shadow',
				'selector' => '{{WRAPPER}} .woocommerce-EditAccountForm input.input-text:focus',
			]
		);
		$this->end_controls_tab();
		$this->end_controls_tabs();
		$this->end_controls_section();

		// Save changes button
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
				'selector'  => '{{WRAPPER}} .woocommerce-EditAccountForm .woocommerce-Button',
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
					'{{WRAPPER}} .woocommerce-EditAccountForm .woocommerce-Button' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'button_bg_color',
			[
				'label' => esc_html__('Background Color', 'webt'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .woocommerce-EditAccountForm .woocommerce-Button' => 'background-color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'button_border',
				'selector' => '{{WRAPPER}} .woocommerce-EditAccountForm .woocommerce-Button',
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
					'{{WRAPPER}} .woocommerce-EditAccountForm .woocommerce-Button:hover' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'button_bg_color_hover',
			[
				'label' => esc_html__('Background Color', 'webt'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .woocommerce-EditAccountForm .woocommerce-Button:hover' => 'background-color: {{VALUE}}',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'button_border_hover',
				'selector' => '{{WRAPPER}} .woocommerce-EditAccountForm .woocommerce-Button:hover',
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
					'{{WRAPPER}} .woocommerce-EditAccountForm .woocommerce-Button' => 'transition: all {{SIZE}}s',
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
					'{{WRAPPER}} .woocommerce-EditAccountForm .woocommerce-Button' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
					'{{WRAPPER}} .woocommerce-EditAccountForm .woocommerce-Button' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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

		if (!is_user_logged_in()) {
			return esc_html__('You need first to be logged in', 'webt');
		}
		wp_enqueue_script('woocommerce');
		do_action('woocommerce_account_edit-account_endpoint');
	}
}

Plugin::elementor_instance()->widgets_manager->register_widget_type(new Widget_MyAccount_Edit_Account());
