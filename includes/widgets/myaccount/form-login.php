<?php

namespace WEBT;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Border;
use Elementor\Group_Control_Box_Shadow;
use Elementor\Group_Control_Typography;
use WEBT\Plugin;

/**
 * WooCommerce Page Builder For Elementor Widget.
 *
 * @class Widget_MyAccount_Form_Login_Widget
 * @package webt
 */
if (!defined('ABSPATH')) {
	exit; // Exit if accessed directly.
}


class Widget_MyAccount_Form_Login extends Widget_Base
{

	/**
	 * Get widget name.
	 */
	public function get_name()
	{
		return 'webt-myaccount-login-form';
	}

	/**
	 * Get widget title.
	 */
	public function get_title()
	{
		return esc_html__('Login Form', 'webt');
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
		return ['webt-myaccount-form'];
	}

	/**
	 * Search keywords
	 */
	public function get_keywords()
	{
		return ['webt', 'woocommerce', 'myaccount', 'login', 'form'];
	}

	/**
	 * Register oEmbed widget controls.
	 *
	 * Adds different input fields to allow the user to change and customize the widget settings.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function _register_controls()
	{
		/*Content Tab*/

		$this->start_controls_section(
			'label_section',
			[
				'label' => __('Title Labels', 'webt'),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'login_title',
			[
				'label' => __('Login Title', 'webt'),
				'type' => Controls_Manager::TEXT,
				'dynamic' => [
					'active' => true,
				],
				'placeholder' => __('Login title', 'webt'),
				'default' => __('Login', 'webt'),
			]
		);

		$this->add_control(
			'username_label',
			[
				'label' => __('Username Label', 'webt'),
				'type' => Controls_Manager::TEXT,
				'dynamic' => [
					'active' => true,
				],
				'placeholder' => __('Login title', 'webt'),
				'default' => __('Username or Email', 'webt'),
			]
		);

		$this->add_control(
			'password_label',
			[
				'label' => __('Password Label', 'webt'),
				'type' => Controls_Manager::TEXT,
				'dynamic' => [
					'active' => true,
				],
				'placeholder' => __('Login title', 'webt'),
				'default' => __('Password', 'webt'),
			]
		);

		$this->add_control(
			'remember_me_label',
			[
				'label' => __('Remember Me ', 'webt'),
				'type' => Controls_Manager::TEXT,
				'dynamic' => [
					'active' => true,
				],
				'placeholder' => __('Remember me', 'webt'),
				'default' => __('Remember me', 'webt'),
			]
		);

		$this->add_control(
			'login_button_title',
			[
				'label' => __('Login Button Title', 'webt'),
				'type' => Controls_Manager::TEXT,
				'dynamic' => [
					'active' => true,
				],
				'placeholder' => __('Login button title', 'webt'),
				'default' => __('Login me', 'webt'),
			]
		);

		$this->end_controls_section();

		/* ------------------------------- Conditions ------------------------------- */

		$this->start_controls_section(
			'conditions_section',
			[
				'label' => __('Conditions', 'webt'),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);

		/*Switch*/
		$this->add_control(
			'show_notice',
			[
				'label' => __('Show Notice', 'webt'),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => __('Show', 'webt'),
				'label_off' => __('Hide', 'webt'),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);

		$this->add_control(
			'show_lostpassword_url',
			[
				'label' => __('Show Lost password Lnk', 'webt'),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => __('Show', 'webt'),
				'label_off' => __('Hide', 'webt'),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);

		$this->add_control(
			'show_remember_me',
			[
				'label' => __('Show Remember me', 'webt'),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => __('Show', 'webt'),
				'label_off' => __('Hide', 'webt'),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);

		$this->add_control(
			'show_actions',
			[
				'label' => esc_html__('Show Actions Hooks', 'webt'),
				'type'  => Controls_Manager::SWITCHER,
				'separator' => 'before',
			]
		);

		$this->add_control(
			'show_action_form_start',
			[
				'label' => __('Show Form Start Action', 'webt'),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => __('Show', 'webt'),
				'label_off' => __('Hide', 'webt'),
				'return_value' => 'yes',
				'default' => 'yes',
				'condition'     => [
					'show_actions' => 'yes',
				],
			]
		);
		$this->add_control(
			'show_action_form',
			[
				'label' => __('Show Form Action', 'webt'),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => __('Show', 'webt'),
				'label_off' => __('Hide', 'webt'),
				'return_value' => 'yes',
				'default' => 'yes',
				'condition'     => [
					'show_actions' => 'yes',
				],
			]
		);
		$this->add_control(
			'show_action_form_end',
			[
				'label' => __('Show Form End Action ', 'webt'),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => __('Show', 'webt'),
				'label_off' => __('Hide', 'webt'),
				'return_value' => 'yes',
				'default' => 'yes',
				'condition'     => [
					'show_actions' => 'yes',
				],
			]
		);

		/*Url*/
		$this->add_control(
			'redirect_after_login',
			[
				'label' => esc_html__('Redirect After Login', 'webt'),
				'type'  => Controls_Manager::SWITCHER,
				'separator' => 'before',
			]
		);

		$this->add_control(
			'redirect_url',
			[
				'type'          => Controls_Manager::URL,
				'show_label'    => false,
				'show_external' => false,
				'separator'     => false,
				'placeholder'   => 'http://your-link.com/',
				'description'   => esc_html__('Note: Because of security reasons, you can ONLY use your current domain here.', 'webt'),
				'condition'     => [
					'redirect_after_login' => 'yes',
				],
			]
		);

		$this->end_controls_section();

/* -----Style Section------ */
		//Heading
		$this->start_controls_section(
			'section_heading_style',
			array(
				'label' => esc_html__('Headings', 'webt'),
				'tab' => Controls_Manager::TAB_STYLE,
			)
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			array(
				'name'      => 'heading_typography',
				'label'     => esc_html__('Typography', 'elementor'),
				'selector'  => '{{WRAPPER}} .webt-account-form-login h2',
			)
		);
		$this->add_control(
			'heading_color',
			[
				'label' => esc_html__('Color', 'elementor'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .webt-account-form-login h2' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_responsive_control(
			'heading_text_align',
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
					'{{WRAPPER}} .webt-account-form-login h2' => 'text-align: {{VALUE}}',
				],
			]
		);
		$this->end_controls_section();

		// Form style
		$this->start_controls_section(
			'section_form_style',
			array(
				'label' => esc_html__('Form Style', 'webt'),
				'tab' => Controls_Manager::TAB_STYLE,
			)
		);
		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'border',
				'label' => __('Border', 'webt'),
				'selector' => '{{WRAPPER}} .webt-account-form-login form.woocommerce-form-login',
			]
		);
		$this->add_responsive_control(
			'form_border_radius',
			[
				'label' => esc_html__('Border Radius', 'elementor'),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', 'em'],
				'selectors' => [
					'{{WRAPPER}} .webt-account-form-login form.woocommerce-form-login' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'form_box_shadow',
				'selector' => '{{WRAPPER}} .webt-account-form-login form.woocommerce-form-login',
			]
		);
		$this->add_control(
			'form_bg_color',
			[
				'label' => esc_html__('Background Color', 'webt'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .webt-account-form-login form.woocommerce-form-login' => 'background-color: {{VALUE}}',
				],
			]
		);
		$this->add_responsive_control(
			'form_margin',
			[
				'label' => esc_html__('Margin', 'elementor'),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', 'em'],
				'selectors' => [
					'{{WRAPPER}} .webt-account-form-login form.woocommerce-form-login' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_responsive_control(
			'form_padding',
			[
				'label' => esc_html__('Padding', 'elementor'),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', 'em'],
				'selectors' => [
					'{{WRAPPER}} .webt-account-form-login form.woocommerce-form-login' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->end_controls_section();
		// label
		$this->start_controls_section(
			'section_label_style',
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
				'selector'  => '{{WRAPPER}} .webt-account-form-login form.woocommerce-form-login .form-row label',
			)
		);
		$this->add_control(
			'label_color',
			[
				'label' => esc_html__('Label Color', 'webt'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .webt-account-form-login form.woocommerce-form-login .form-row label' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_control(
			'label_required_color',
			[
				'label' => esc_html__('Required Color', 'webt'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .webt-account-form-login form.woocommerce-form-login .form-row label .required' => 'color: {{VALUE}}',
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
					'{{WRAPPER}} .webt-account-form-login form.woocommerce-form-login .form-row label' => 'text-align: {{VALUE}}',
				],
			]
		);
		$this->end_controls_section();

		// Input Fields
		$this->start_controls_section(
			'section_input_style',
			array(
				'label' => esc_html__('Input', 'webt'),
				'tab' => Controls_Manager::TAB_STYLE,
			)
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			array(
				'name'      => 'input_typography',
				'label'     => esc_html__('Typography', 'elementor'),
				'selector'  => '{{WRAPPER}} .webt-account-form-login form.woocommerce-form-login input.input-text',
			)
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
					'{{WRAPPER}} .webt-account-form-login form.woocommerce-form-login input.input-text' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'input_border',
				'selector' => '{{WRAPPER}} .webt-account-form-login form.woocommerce-form-login input.input-text',
			]
		);

		$this->add_control(
			'input_bg_color',
			[
				'label' => esc_html__('Background Color', 'webt'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .webt-account-form-login form.woocommerce-form-login input.input-text' => 'background-color: {{VALUE}}',
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
					'{{WRAPPER}} .webt-account-form-login form.woocommerce-form-login input.input-text' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'input_box_shadow',
				'selector' => '{{WRAPPER}} .webt-account-form-login form.woocommerce-form-login input.input-text',
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
					'{{WRAPPER}} .webt-account-form-login form.woocommerce-form-login input.input-text:focus' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'input_focus_border',
				'selector' => '{{WRAPPER}} .webt-account-form-login form.woocommerce-form-login input.input-text:focus',
			]
		);

		$this->add_control(
			'input_focus_bg_color',
			[
				'label' => esc_html__('Background Color', 'webt'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .webt-account-form-login form.woocommerce-form-login input.input-text:focus' => 'background-color: {{VALUE}}',
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
					'{{WRAPPER}} .webt-account-form-login form.woocommerce-form-login input.input-text:focus' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'input_focus_box_shadow',
				'selector' => '{{WRAPPER}} .webt-account-form-login form.woocommerce-form-login input.input-text:focus',
			]
		);
		//
		$this->end_controls_tab();
		$this->end_controls_tabs();
		$this->add_responsive_control(
			'input_padding',
			[
				'label' => esc_html__('Padding', 'elementor'),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', 'em'],
				'selectors' => [
					'{{WRAPPER}} .webt-account-form-login form.woocommerce-form-login input.input-text' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'separator' => 'before',
			]
		);

		$this->end_controls_section();

		// button style
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
				'selector'  => '{{WRAPPER}} .webt-account-form-login button.woocommerce-button',
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
					'{{WRAPPER}} .webt-account-form-login button.woocommerce-button' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'button_bg_color',
			[
				'label' => esc_html__('Background Color', 'webt'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .webt-account-form-login button.woocommerce-button' => 'background-color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'button_border',
				'selector' => '{{WRAPPER}} .webt-account-form-login button.woocommerce-button',
			]
		);
		$this->add_control(
			'button_border_radius',
			[
				'label' => __('Border Radius', 'webt'),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', '%'],
				'selectors' => [
					'{{WRAPPER}} .webt-account-form-login button.woocommerce-button' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'button_box_shadow',
				'selector' => '{{WRAPPER}} .webt-account-form-login button.woocommerce-button',
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
					'{{WRAPPER}} .webt-account-form-login button.woocommerce-button:hover' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'button_bg_color_hover',
			[
				'label' => esc_html__('Background Color', 'webt'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .webt-account-form-login button.woocommerce-button:hover' => 'background-color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'button_border_hover',
				'selector' => '{{WRAPPER}} .webt-account-form-login button.woocommerce-button:hover',
			]
		);

		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'button_box_shadow_hover',
				'selector' => '{{WRAPPER}} .webt-account-form-login button.woocommerce-button:hover',
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
					'{{WRAPPER}} .webt-account-form-login button.woocommerce-button' => 'transition: all {{SIZE}}s',
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
					'{{WRAPPER}} .webt-account-form-login button.woocommerce-button' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
					'{{WRAPPER}} .webt-account-form-login button.woocommerce-button' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
					'{{WRAPPER}} .webt-account-form-login button.woocommerce-button' => 'width: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();

		// LostPassword
		$this->start_controls_section(
			'lost_password_style',
			array(
				'label' => esc_html__('Lost Password', 'webt'),
				'tab' => Controls_Manager::TAB_STYLE,
			)
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			array(
				'name'      => 'lost_password_typography',
				'label'     => esc_html__('Typography', 'elementor'),
				'selector'  => '{{WRAPPER}} .webt-account-form-login .lost_password a',
			)
		);
		$this->add_responsive_control(
			'lost_password_text_align',
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
					'{{WRAPPER}} .webt-account-form-login .lost_password' => 'text-align: {{VALUE}}',
				],
			]
		);
		$this->start_controls_tabs('lost_password_style_tabs');

		$this->start_controls_tab(
			'lost_password_style_normal',
			[
				'label' => esc_html__('Normal', 'webt'),
			]
		);
		$this->add_control(
			'lost_password_color',
			[
				'label' => esc_html__('Color', 'elementor'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .webt-account-form-login .lost_password a' => 'color: {{VALUE}}',
				],
			]
		);
		$this->end_controls_tab();
		$this->start_controls_tab(
			'lost_password_style_hover',
			[
				'label' => esc_html__('Hover', 'webt'),
			]
		);
		$this->add_control(
			'lost_password_color_hover',
			[
				'label' => esc_html__('Color', 'elementor'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .webt-account-form-login .lost_password a:hover' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_control(
			'lost_password_transition',
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
					'{{WRAPPER}} .webt-account-form-login .lost_password a' => 'transition: all {{SIZE}}s',
				],
			]
		);
		$this->end_controls_tab();
		$this->end_controls_tabs();

		$this->add_responsive_control(
			'lost_password_margin',
			[
				'label' => esc_html__('Margin', 'elementor'),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', 'em'],
				'selectors' => [
					'{{WRAPPER}} .webt-account-form-login .lost_password a' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->end_controls_section();
	}

	/**
	 * Render widget output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function render()
	{
		$settings = $this->get_settings_for_display();

		if (!empty($settings['redirect_url']['url'])) {

			$redirect_url = $settings['redirect_url']['url'];

			if (!is_admin() && is_user_logged_in() && !empty($redirect_url)) {
				wp_redirect($redirect_url);
				exit();
			}
		}

		if ($settings['show_notice'] === 'yes' && function_exists('wc_print_notices')) {
			wc_print_notices();
		} ?>
		<div class="webt-account-form-login">
			<h2><?php esc_html_e($settings['login_title'], 'woocommerce'); ?></h2>

			<form class="woocommerce-form woocommerce-form-login login" method="post" action="<?php the_permalink(); ?>">

				<?php

				if ($settings['show_action_form_start'] === 'yes') {
					do_action('woocommerce_login_form_start');
				}

				?>

				<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
					<label for="username"><?php esc_html_e($settings['username_label'], 'woocommerce'); ?></label>
					<input class="woocommerce-Input woocommerce-Input--text input-text" type="text" name="username" id="username" autocomplete="username" value="<?php echo (!empty($_POST['username'])) ? esc_attr(wp_unslash($_POST['username'])) : ''; ?>" /><?php // @codingStandardsIgnoreLine 
																																																																?>
				</p>
				<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
					<label for="password"><?php esc_html_e($settings['password_label'], 'woocommerce'); ?></label>
					<input class="woocommerce-Input woocommerce-Input--text input-text" type="password" name="password" id="password" autocomplete="current-password" />
				</p>

				<?php

				if ($settings['show_action_form'] === 'yes') {
					do_action('woocommerce_login_form');
				}

				?>

				<p class="form-row">
					<?php if ('yes' === $settings['show_remember_me']) { ?>
						<label class="woocommerce-form__label woocommerce-form__label-for-checkbox woocommerce-form-login__rememberme">
							<input class="woocommerce-form__input woocommerce-form__input-checkbox" name="rememberme" type="checkbox" id="rememberme" value="forever" /> <span><?php esc_html_e($settings['remember_me_label'], 'woocommerce'); ?></span>
						</label>
					<?php }
					wp_nonce_field('woocommerce-login', 'woocommerce-login-nonce'); ?>
					<button type="submit" class="woocommerce-button button woocommerce-form-login__submit" name="login" value="<?php esc_attr_e($settings['login_button_title'], 'woocommerce'); ?>"><?php esc_html_e($settings['login_button_title'], 'woocommerce'); ?></button>
				</p>
				<?php
				if ('yes' === $settings['show_lostpassword_url']) { ?>
					<p class="woocommerce-LostPassword lost_password">
						<a href="<?php echo esc_url(wp_lostpassword_url()); ?>"><?php esc_html_e('Lost your password?', 'woocommerce'); ?></a>
					</p>
				<?php }

				if ($settings['show_action_form_end'] === 'yes') {
					do_action('woocommerce_login_form_end');
				}

				?>

			</form>
		</div>
<?php

	}
}

Plugin::elementor_instance()->widgets_manager->register_widget_type(new Widget_MyAccount_Form_Login());
