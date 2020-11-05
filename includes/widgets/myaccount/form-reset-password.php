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
 * @class Widget_MyAccount_Form_Reset_Password_Widget
 * @package webt
 */
if (!defined('ABSPATH')) {
	exit; // Exit if accessed directly.
}


class Widget_MyAccount_Form_Reset_Password extends Widget_Base
{

	/**
	 * Get widget name.
	 */
	public function get_name()
	{
		return 'webt-myaccount-reset-password-form';
	}

	/**
	 * Get widget title.
	 */
	public function get_title()
	{
		return esc_html__('Reset Password Form', 'webt');
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
		return ['webt', 'woocommerce', 'myaccount', 'reset', 'password', 'form'];
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
			'content_section',
			[
				'label' => __('Content', 'webt'),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'reset_password_message',
			[
				'label' => __('Message', 'webt'),
				'type' => Controls_Manager::TEXTAREA,
				'dynamic' => [
					'active' => true,
				],
				'placeholder' => __('Massage', 'webt'),
				'default' => __('Enter a new password below.', 'webt'),
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
				'placeholder' => __('New Password label', 'webt'),
				'default' => __('New password', 'webt'),
			]
		);

		$this->add_control(
			'password_confirm_label',
			[
				'label' => __('Password Confirm Label ', 'webt'),
				'type' => Controls_Manager::TEXT,
				'dynamic' => [
					'active' => true,
				],
				'placeholder' => __('Re-enter new password', 'webt'),
				'default' => __('Re-enter new password', 'webt'),
			]
		);

		$this->add_control(
			'show_password_label',
			[
				'label' => __('Show Password Label ', 'webt'),
				'type' => Controls_Manager::TEXT,
				'dynamic' => [
					'active' => true,
				],
				'placeholder' => __('Show Password', 'webt'),
				'default' => __('Show Password', 'webt'),
			]
		);

		$this->add_control(
			'password_submit_label',
			[
				'label' => __('Button Label', 'webt'),
				'type' => Controls_Manager::TEXT,
				'dynamic' => [
					'active' => true,
				],
				'placeholder' => __('Save', 'webt'),
				'default' => __('Save', 'webt'),
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
			'display_inline_form_input',
			[
				'label' => __('Display form input inline', 'webt'),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => __('Inline', 'webt'),
				'label_off' => __('Block', 'webt'),
				'return_value' => 'yes',
				'default' => 'no',
				'separator' => 'before',
			]
		);
		$this->add_control(
			'show_password_checkbox',
			[
				'label' => __('Show password ', 'webt'),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => __('Show', 'webt'),
				'label_off' => __('Hide', 'webt'),
				'return_value' => 'yes',
				'default' => 'yes',
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
				'name' => 'form_border',
				'selector' => '{{WRAPPER}} .webt-account-form-reset-password form.woocommerce-ResetPassword.lost_reset_password',
			]
		);

		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'form_box_shadow',
				'selector' => '{{WRAPPER}} .webt-account-form-reset-password form.woocommerce-ResetPassword.lost_reset_password',
			]
		);
		$this->add_control(
			'form_bg_color',
			[
				'label' => esc_html__('Background Color', 'webt'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .webt-account-form-reset-password form.woocommerce-ResetPassword.lost_reset_password' => 'background-color: {{VALUE}}',
				],
			]
		);
		$this->add_responsive_control(
			'form_padding',
			[
				'label' => esc_html__('Padding', 'elementor'),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', 'em'],
				'default' => [
					'unit' => 'px',
				],
				'selectors' => [
					'{{WRAPPER}} .webt-account-form-reset-password form.woocommerce-ResetPassword.lost_reset_password' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_responsive_control(
			'form_margin',
			[
				'label' => esc_html__('Margin', 'elementor'),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', 'em'],
				'default' => [
					'unit' => '0',
				],
				'selectors' => [
					'{{WRAPPER}} .webt-account-form-reset-password form.woocommerce-ResetPassword.lost_reset_password' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->end_controls_section();
		
		// Message
		$this->start_controls_section(
			'section_message_style',
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
				'selector'  => '{{WRAPPER}} .webt-account-form-reset-password form.woocommerce-ResetPassword.lost_reset_password p.form-reset-password-message',
			)
		);
		$this->add_control(
			'message_color',
			[
				'label' => esc_html__('Message Color', 'webt'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .webt-account-form-reset-password form.woocommerce-ResetPassword.lost_reset_password p.form-reset-password-message' => 'color: {{VALUE}}',
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
					'{{WRAPPER}} .webt-account-form-reset-password form.woocommerce-ResetPassword.lost_reset_password p.form-reset-password-message' => 'text-align: {{VALUE}}',
				],
			]
		);

		$this->add_responsive_control(
			'message_margin',
			[
				'label' => esc_html__('Margin', 'elementor'),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', 'em'],
				'selectors' => [
					'{{WRAPPER}} .webt-account-form-reset-password form.woocommerce-ResetPassword.lost_reset_password p.form-reset-password-message' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} ;',
				],
				'separator' => 'before',
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
				'selector'  => '{{WRAPPER}} .webt-account-form-reset-password form.woocommerce-ResetPassword.lost_reset_password .form-row label',
			)
		);
		$this->add_control(
			'label_color',
			[
				'label' => esc_html__('Label Color', 'webt'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .webt-account-form-reset-password form.woocommerce-ResetPassword.lost_reset_password .form-row label' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_control(
			'label_required_color',
			[
				'label' => esc_html__('Required Color', 'webt'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .webt-account-form-reset-password form.woocommerce-ResetPassword.lost_reset_password .form-row label .required' => 'color: {{VALUE}}',
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
					'{{WRAPPER}} .webt-account-form-reset-password form.woocommerce-ResetPassword.lost_reset_password .form-row label' => 'text-align: {{VALUE}}',
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
				'selector'  => '{{WRAPPER}} .webt-account-form-reset-password form.woocommerce-ResetPassword.lost_reset_password input.input-text',
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
					'{{WRAPPER}} .webt-account-form-reset-password form.woocommerce-ResetPassword.lost_reset_password input.input-text' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'input_border',
				'selector' => '{{WRAPPER}} .webt-account-form-reset-password form.woocommerce-ResetPassword.lost_reset_password input.input-text',
			]
		);

		$this->add_control(
			'input_bg_color',
			[
				'label' => esc_html__('Background Color', 'webt'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .webt-account-form-reset-password form.woocommerce-ResetPassword.lost_reset_password input.input-text' => 'background-color: {{VALUE}}',
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
					'{{WRAPPER}} .webt-account-form-reset-password form.woocommerce-ResetPassword.lost_reset_password input.input-text' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'input_box_shadow',
				'selector' => '{{WRAPPER}} .webt-account-form-reset-password form.woocommerce-ResetPassword.lost_reset_password input.input-text',
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
					'{{WRAPPER}} .webt-account-form-reset-password form.woocommerce-ResetPassword.lost_reset_password input.input-text:focus' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'input_focus_border',
				'selector' => '{{WRAPPER}} .webt-account-form-reset-password form.woocommerce-ResetPassword.lost_reset_password input.input-text:focus',
			]
		);

		$this->add_control(
			'input_focus_bg_color',
			[
				'label' => esc_html__('Background Color', 'webt'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .webt-account-form-reset-password form.woocommerce-ResetPassword.lost_reset_password input.input-text:focus' => 'background-color: {{VALUE}}',
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
					'{{WRAPPER}} .webt-account-form-reset-password form.woocommerce-ResetPassword.lost_reset_password input.input-text:focus' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'input_focus_box_shadow',
				'selector' => '{{WRAPPER}} .webt-account-form-reset-password form.woocommerce-ResetPassword.lost_reset_password input.input-text:focus',
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
					'{{WRAPPER}} .webt-account-form-reset-password form.woocommerce-ResetPassword.lost_reset_password input.input-text' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'separator' => 'before',
			]
		);

		$this->add_control(
			'input_width',
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
					'{{WRAPPER}} .webt-account-form-reset-password form.woocommerce-ResetPassword.lost_reset_password .form-row input.input-text' => 'width: {{SIZE}}{{UNIT}};',
				],
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
				'selector'  => '{{WRAPPER}} .webt-account-form-reset-password form.woocommerce-ResetPassword.lost_reset_password .form-row button',
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
					'{{WRAPPER}} .webt-account-form-reset-password form.woocommerce-ResetPassword.lost_reset_password .form-row button' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_control(
			'button_bg_color',
			[
				'label' => esc_html__('Background Color', 'webt'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .webt-account-form-reset-password form.woocommerce-ResetPassword.lost_reset_password .form-row button' => 'background-color: {{VALUE}}',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'button_border',
				'selector' => '{{WRAPPER}} .webt-account-form-reset-password form.woocommerce-ResetPassword.lost_reset_password .form-row button',
			]
		);

		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'button_box_shadow',
				'selector' => '{{WRAPPER}} .webt-account-form-reset-password form.woocommerce-ResetPassword.lost_reset_password .form-row button',
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
					'{{WRAPPER}} .webt-account-form-reset-password form.woocommerce-ResetPassword.lost_reset_password .form-row button:hover' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'button_bg_color_hover',
			[
				'label' => esc_html__('Background Color', 'webt'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .webt-account-form-reset-password form.woocommerce-ResetPassword.lost_reset_password .form-row button:hover' => 'background-color: {{VALUE}}',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'button_border_hover',
				'selector' => '{{WRAPPER}} .webt-account-form-reset-password form.woocommerce-ResetPassword.lost_reset_password .form-row button:hover',
			]
		);

		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'button_box_shadow_hover',
				'selector' => '{{WRAPPER}} .webt-account-form-reset-password form.woocommerce-ResetPassword.lost_reset_password .form-row button:hover',
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
					'{{WRAPPER}} .webt-account-form-reset-password form.woocommerce-ResetPassword.lost_reset_password .form-row button' => 'transition: all {{SIZE}}s',
				],
			]
		);

		$this->end_controls_tab();
		$this->end_controls_tabs();

		$this->add_control(
			'button_border_radius',
			[
				'label' => __('Radius', 'plugin-domain'),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', '%'],
				'selectors' => [
					'{{WRAPPER}} .webt-account-form-reset-password form.woocommerce-ResetPassword.lost_reset_password .form-row button' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
					'{{WRAPPER}} .webt-account-form-reset-password form.woocommerce-ResetPassword.lost_reset_password .form-row button' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
				'selectors' => [
					'{{WRAPPER}} .webt-account-form-reset-password form.woocommerce-ResetPassword.lost_reset_password .form-row button' => 'width: {{SIZE}}{{UNIT}};',
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
		if (isset($_COOKIE['wp-resetpass-' . COOKIEHASH]) && 0 < strpos($_COOKIE['wp-resetpass-' . COOKIEHASH], ':')) {  // @codingStandardsIgnoreLine

			list($rp_id, $rp_key) = array_map('wc_clean', explode(':', wp_unslash($_COOKIE['wp-resetpass-' . COOKIEHASH]), 2)); // @codingStandardsIgnoreLine
			$userdata               = get_userdata(absint($rp_id));
			$rp_login               = $userdata ? $userdata->user_login : '';
			$args =	array('key'   => $rp_key, 	'login' => $rp_login,);
		}

		if ($settings['show_notice'] === 'yes' && function_exists('wc_print_notices')) {
			wc_print_notices();
		} ?>
		<div class="webt-account-form-reset-password">
			<form method="post" class="woocommerce-ResetPassword lost_reset_password">

				<p class="form-reset-password-message"><?php echo apply_filters('woocommerce_reset_password_message', esc_html__($settings['reset_password_message'], 'woocommerce')); ?> </p> <?php // @codingStandardsIgnoreLine 
																																																?>

				<p class="woocommerce-form-row  form-row <?php if ('yes' === $settings['display_inline_form_input']) { ?>woocommerce-form-row--first form-row-first <?php } ?>">
					<label for="password_1"><?php esc_html_e($settings['password_label'], 'woocommerce'); ?>&nbsp;<span class="required">*</span></label>
					<input type="password" class="woocommerce-Input woocommerce-Input--text input-text" name="password_1" id="password_1" autocomplete="new-password" />
				</p>
				<p class="woocommerce-form-row  form-row <?php if ('yes' === $settings['display_inline_form_input']) { ?> woocommerce-form-row--last form-row-last <?php } ?>">
					<label for="password_2"><?php esc_html_e($settings['password_confirm_label'], 'woocommerce'); ?> &nbsp;<span class="required">*</span></label>
					<input type="password" class="woocommerce-Input woocommerce-Input--text input-text" name="password_2" id="password_2" autocomplete="new-password" />
				</p>

				<?php if ('yes' === $settings['show_password_checkbox']) { ?>
					<p class="woocommerce-form-row form-row">
						<label class="woocommerce-form__label woocommerce-form__label-for-checkbox woocommerce-form-login__rememberme">
							<input class="woocommerce-form__input woocommerce-form__input-checkbox" name="showpassword" type="checkbox" id="showpassword" onclick="show_password()" /> <span><?php esc_html_e($settings['show_password_label'], 'woocommerce'); ?></span>
						</label>
					</p>
				<?php } ?>
				<input type="hidden" name="reset_key" value="<?php echo esc_attr($args['key']); ?>" />
				<input type="hidden" name="reset_login" value="<?php echo esc_attr($args['login']); ?>" />

				<div class="clear"></div>

				<?php do_action('woocommerce_resetpassword_form'); ?>

				<p class="woocommerce-form-row form-row">
					<input type="hidden" name="wc_reset_password" value="true" />
					<button type="submit" class="woocommerce-Button button" value="<?php esc_attr_e($settings['password_submit_label'], 'woocommerce'); ?>"><?php esc_html_e($settings['password_submit_label'], 'woocommerce'); ?></button>
				</p>

				<?php wp_nonce_field('reset_password', 'woocommerce-reset-password-nonce'); ?>

			</form>
			<script>
				function show_password() {
					var t;
					"password" === (t = document.getElementById("password_1")).type ? t.type = "text" : t.type = "password", "password" === (t = document.getElementById("password_2")).type ? t.type = "text" : t.type = "password"
				}
			</script>
		</div>
<?php }
}

Plugin::elementor_instance()->widgets_manager->register_widget_type(new Widget_MyAccount_Form_Reset_Password());
