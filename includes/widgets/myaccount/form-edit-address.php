<?php

namespace WEBT;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use WC_Shortcode_My_Account;
use WEBT\Plugin;

/**
 * WooCommerce Elementor Builder Widget.
 *
 * @package webt
 */

if (!defined('ABSPATH')) {
	exit; // Exit if accessed directly.
}

class Widget_MyAccount_Edit_Address_Widget extends Widget_Base
{

	/**
	 * Get widget name.
	 */
	public function get_name()
	{
		return 'form-edit-address';
	}

	/**
	 * Get widget title.
	 */
	public function get_title()
	{
		return esc_html__('Edit Address', 'webt');
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
		return ['webt', 'woocommerce', 'myaccount', 'edit', 'adresses', 'form'];
	}

	/**
	 * Register oEmbed widget controls.
	 */
	protected function _register_controls()
	{
		// Message
		$this->start_controls_section(
			'message_style',
			array(
				'label' => esc_html__('Message', 'webt'),
				'tab' => Controls_Manager::TAB_STYLE,
			)
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			array(
				'name'      => 'message_typography',
				'label'     => esc_html__('Typography', 'elementor'),
				'selector'  => '{{WRAPPER}} .webt-form-edit-address > p',
			)
		);
		$this->add_control(
			'message_color',
			[
				'label' => esc_html__('Color', 'elementor'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .webt-form-edit-address > p' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_responsive_control(
			'message_align',
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
					'{{WRAPPER}} .webt-form-edit-address > p' => 'text-align: {{VALUE}}',
				],
			]
		);
		$this->end_controls_section();

		// header
		$this->start_controls_section(
			'header_style',
			array(
				'label' => esc_html__('Header', 'webt'),
				'tab' => Controls_Manager::TAB_STYLE,
			)
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			array(
				'name'      => 'header_typography',
				'label'     => esc_html__('Typography', 'elementor'),
				'selector'  => '{{WRAPPER}} .woocommerce-Address-title, {{WRAPPER}} .woocommerce-Address-title h3',
			)
		);
		$this->add_control(
			'header_color',
			[
				'label' => esc_html__('Color', 'elementor'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .woocommerce-Address-title h3' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_responsive_control(
			'header_align',
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
					'{{WRAPPER}} .woocommerce-Address-title' => 'text-align: {{VALUE}}',
				],
			]
		);
		$this->end_controls_section();

		// address
		$this->start_controls_section(
			'address_style',
			array(
				'label' => esc_html__('Address', 'webt'),
				'tab' => Controls_Manager::TAB_STYLE,
			)
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			array(
				'name'      => 'address_typography',
				'label'     => esc_html__('Typography', 'elementor'),
				'selector'  => '{{WRAPPER}} address',
			)
		);
		$this->add_control(
			'address_color',
			[
				'label' => esc_html__('Color', 'elementor'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} address' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_responsive_control(
			'address_align',
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
					'{{WRAPPER}} address' => 'text-align: {{VALUE}}',
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
		global $wp;
		$type = '';

		if (isset($wp->query_vars['edit-address'])) {
			$type = $wp->query_vars['edit-address'];
		} else {
			$type = wc_edit_address_i18n(sanitize_title($type), true);
		}
		echo '<div class="webt-form-edit-address">';
		WC_Shortcode_My_Account::edit_address($type);
		echo '</div>';
	}
}
Plugin::elementor_instance()->widgets_manager->register_widget_type(new Widget_MyAccount_Edit_Address_Widget());
