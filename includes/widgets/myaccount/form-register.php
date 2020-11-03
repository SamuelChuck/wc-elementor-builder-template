<?php

namespace WEBT;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Border;
use Elementor\Group_Control_Box_Shadow;
use Elementor\Group_Control_Typography;
use WEBT\Plugin;

/**
 * WooCommerce Elementor Builder Template Widget.
 *
 * @class Widget_MyAccount_Register_Form_Widget
 * @package webt
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

class Widget_MyAccount_Register_Form extends Widget_Base
{

    /**
     * Get widget name.
     */
    public function get_name()
    {
        return 'webt-myaccount-form-register';
    }

    /**
     * Get widget title.
     */
    public function get_title()
    {
        return esc_html__('Regisration Form', 'webt');
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
        return ['webt', 'woocommerce', 'myaccount', 'register', 'signup', 'form'];
    }
    /**
     * Register oEmbed widget controls.
     */
    protected function _register_controls()
    {
        $this->start_controls_section(
            'label_section',
            [
                'label' => __('Title & Labels', 'webt'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'form_title',
            [
                'label' => __('Form Title', 'webt'),
                'type' => Controls_Manager::TEXT,
                'dynamic' => [
                    'active' => true,
                ],
                'placeholder' => __('Register', 'webt'),
                'default' => __('Create an Account', 'webt'),
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
                'placeholder' => __('Username', 'webt'),
                'default' => __('Username', 'webt'),
            ]
        );
        $this->add_control(
            'email_label',
            [
                'label' => __('Email label ', 'webt'),
                'type' => Controls_Manager::TEXT,
                'dynamic' => [
                    'active' => true,
                ],
                'placeholder' => __('Email', 'webt'),
                'default' => __('Email', 'webt'),
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
            'password_confirm_label',
            [
                'label' => __('Confirm Password Label', 'webt'),
                'type' => Controls_Manager::TEXT,
                'dynamic' => [
                    'active' => true,
                ],
                'placeholder' => __('Re-enter Password', 'webt'),
                'default' => __('Re-enter Password', 'webt'),
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
            'button_label',
            [
                'label' => __('Button Title', 'webt'),
                'type' => Controls_Manager::TEXT,
                'dynamic' => [
                    'active' => true,
                ],
                'placeholder' => __('register', 'webt'),
                'default' => __('Create Your Account', 'webt'),
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
            'show_password_confirm',
            [
                'label' => __('Show confirm password', 'webt'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => __('Show', 'webt'),
                'label_off' => __('Hide', 'webt'),
                'return_value' => 'yes',
                'default' => 'yes',
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

        /*Heading Style*/
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
                'selector'  => '{{WRAPPER}} .webt-account-form-register h2',
            )
        );
        $this->add_control(
            'heading_color',
            [
                'label' => esc_html__('Color', 'elementor'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .webt-account-form-register h2' => 'color: {{VALUE}}',
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
                    '{{WRAPPER}} .webt-account-form-register h2' => 'text-align: {{VALUE}}',
                ],
            ]
        );
        $this->end_controls_section();

/* -------Style Section------- */
        // Form style
        $this->start_controls_section(
            'form_style',
            array(
                'label' => esc_html__('Form Style', 'webt'),
                'tab' => Controls_Manager::TAB_STYLE,
            )
        );
        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'form_border',
                'selector' => '{{WRAPPER}} .webt-account-form-register form.woocommerce-form-register',
            ]
        );
        $this->add_responsive_control(
            'form_border_radius',
            [
                'label' => esc_html__('Radius', 'elementor'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .webt-account-form-register form.woocommerce-form-register' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'form_box_shadow',
                'selector' => '{{WRAPPER}} .webt-account-form-register form.woocommerce-form-register',
            ]
        );
        $this->add_control(
            'form_bg_color',
            [
                'label' => esc_html__('Background Color', 'webt'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .webt-account-form-register form.woocommerce-form-register' => 'background-color: {{VALUE}}',
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
                    '{{WRAPPER}} .webt-account-form-register form.woocommerce-form-register' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                    '{{WRAPPER}} .webt-account-form-register form.woocommerce-form-register' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                'selector'  => '{{WRAPPER}} .webt-account-form-register form.woocommerce-form-register .form-row label',
            )
        );
        $this->add_control(
            'label_color',
            [
                'label' => esc_html__('Label Color', 'webt'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .webt-account-form-register form.woocommerce-form-register .form-row label' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'label_required_color',
            [
                'label' => esc_html__('Required Color', 'webt'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .webt-account-form-register form.woocommerce-form-register .form-row label .required' => 'color: {{VALUE}}',
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
                    '{{WRAPPER}} .webt-account-form-register form.woocommerce-form-register .form-row label' => 'text-align: {{VALUE}}',
                ],
            ]
        );
        $this->end_controls_section();

        // Input Fields
        $this->start_controls_section(
            'input_style',
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
                'selector'  => '{{WRAPPER}} .webt-account-form-register form.woocommerce-form-register input.input-text',
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
                    '{{WRAPPER}} .webt-account-form-register form.woocommerce-form-register input.input-text' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'input_border',
                'selector' => '{{WRAPPER}} .webt-account-form-register form.woocommerce-form-register input.input-text',
            ]
        );

        $this->add_control(
            'input_bg_color',
            [
                'label' => esc_html__('Background Color', 'webt'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .webt-account-form-register form.woocommerce-form-register input.input-text' => 'background-color: {{VALUE}}',
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
                    '{{WRAPPER}} .webt-account-form-register form.woocommerce-form-register input.input-text' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'input_box_shadow',
                'selector' => '{{WRAPPER}} .webt-account-form-register form.woocommerce-form-register input.input-text',
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
                    '{{WRAPPER}} .webt-account-form-register form.woocommerce-form-register input.input-text:focus' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'input_focus_border',
                'selector' => '{{WRAPPER}} .webt-account-form-register form.woocommerce-form-register input.input-text:focus',
            ]
        );

        $this->add_control(
            'input_focus_bg_color',
            [
                'label' => esc_html__('Background Color', 'webt'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .webt-account-form-register form.woocommerce-form-register input.input-text:focus' => 'background-color: {{VALUE}}',
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
                    '{{WRAPPER}} .webt-account-form-register form.woocommerce-form-register input.input-text:focus' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'input_focus_box_shadow',
                'selector' => '{{WRAPPER}} .webt-account-form-register form.woocommerce-form-register input.input-text:focus',
            ]
        );
        //
        $this->end_controls_tab();
        $this->end_controls_tabs();
        $this->add_responsive_control(
            'input_margin',
            [
                'label' => esc_html__('Margin', 'elementor'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .webt-account-form-register form.woocommerce-form-register input.input-text' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'separator' => 'before',
            ]
        );
        $this->add_responsive_control(
            'input_padding',
            [
                'label' => esc_html__('Padding', 'elementor'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .webt-account-form-register form.woocommerce-form-register input.input-text' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                'selector'  => '{{WRAPPER}} .webt-account-form-register button',
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
                    '{{WRAPPER}} .webt-account-form-register button' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'button_bg_color',
            [
                'label' => esc_html__('Background Color', 'webt'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .webt-account-form-register button' => 'background-color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'button_border',
                'selector' => '{{WRAPPER}} .webt-account-form-register button',
            ]
        );
        $this->add_responsive_control(
            'button_border_radius',
            [
                'label' => esc_html__('Border radius', 'elementor'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .webt-account-form-register button' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'button_box_shadow',
                'selector' => '{{WRAPPER}} .webt-account-form-register button',
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
                    '{{WRAPPER}} .webt-account-form-register button:hover' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'button_bg_color_hover',
            [
                'label' => esc_html__('Background Color', 'webt'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .webt-account-form-register button:hover' => 'background-color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'button_border_hover',
                'selector' => '{{WRAPPER}} .webt-account-form-register button:hover',
            ]
        );

        $this->add_group_control(
            Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'button_box_shadow_hover',
                'selector' => '{{WRAPPER}} .webt-account-form-register button:hover',
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
                    '{{WRAPPER}} .webt-account-form-register button' => 'transition: all {{SIZE}}s',
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
                    '{{WRAPPER}} .webt-account-form-register button' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                    '{{WRAPPER}} .webt-account-form-register button' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                    '{{WRAPPER}} .webt-account-form-register button.woocommerce-button' => 'width: {{SIZE}}{{UNIT}};',
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
        }

        if (get_option('woocommerce_enable_myaccount_registration') === 'yes') {

            if ($settings['show_notice'] === 'yes' && function_exists('wc_print_notices')) {
                wc_print_notices();
            } ?>
            <div class="webt-account-form-register">

                <h2><?php esc_html_e($settings['form_title'], 'woocommerce'); ?></h2>

                <form method="post" class="woocommerce-form woocommerce-form-register register" <?php do_action('woocommerce_register_form_tag'); ?>>

                    <?php

                    if ($settings['show_action_form_start'] === 'yes') {
                        do_action('woocommerce_register_form_start');
                    }

                    ?>

                    <?php if ('no' === get_option('woocommerce_registration_generate_username')) { ?>

                        <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                            <label for="reg_username"><?php esc_html_e($settings['username_label'], 'woocommerce'); ?>&nbsp;<span class="required">*</span></label>
                            <input type="text" class="woocommerce-Input woocommerce-Input--text input-text" name="username" id="reg_username" autocomplete="username" value="<?php echo (!empty($_POST['username'])) ? esc_attr(wp_unslash($_POST['username'])) : ''; ?>" /><?php // @codingStandardsIgnoreLine 
                                                                                                                                                                                                                                                                            ?>
                        </p>

                    <?php } ?>

                    <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                        <label for="reg_email"><?php esc_html_e($settings['email_label'], 'woocommerce'); ?>&nbsp;<span class="required">*</span></label>
                        <input type="email" class="woocommerce-Input woocommerce-Input--text input-text" name="email" id="reg_email" autocomplete="email" value="<?php echo (!empty($_POST['email'])) ? esc_attr(wp_unslash($_POST['email'])) : ''; ?>" /><?php // @codingStandardsIgnoreLine 
                                                                                                                                                                                                                                                            ?>
                    </p>

                    <?php if ('no' === get_option('woocommerce_registration_generate_password')) { ?>

                        <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                            <label for="reg_password"><?php esc_html_e($settings['password_label'], 'woocommerce'); ?>&nbsp;<span class="required">*</span></label>
                            <input type="password" class="woocommerce-Input woocommerce-Input--text input-text" name="password" id="reg_password" autocomplete="new-password" />
                        </p><?php
                            if ('yes' === $settings['show_password_confirm']) { ?>
                            <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                                <label for="reg_confirm_password"><?php esc_html_e($settings['password_confirm_label'], 'woocommerce'); ?> &nbsp; <span class="required">*</span></label>
                                <input type="password" class="woocommerce-Input woocommerce-Input--text input-text" name="confirm_password" id="reg_confirm_password" autocomplete="new-password" />
                            </p>
                        <?php } ?>
                        <?php if ('yes' === $settings['show_password_checkbox']) { ?>
                            <p class="woocommerce-form-row form-row">
                                <label class="woocommerce-form__label woocommerce-form__label-for-checkbox woocommerce-form-login__rememberme">
                                    <input class="woocommerce-form__input woocommerce-form__input-checkbox" name="showpassword" type="checkbox" id="showpassword" onclick="show_password()" /> <span><?php esc_html_e($settings['show_password_label'], 'woocommerce'); ?></span>
                                </label>
                                <script>
                                    function show_password() {
                                        var x = document.getElementById("reg_password");
                                        if (x.type === "password") {
                                            x.type = "text";
                                        } else {
                                            x.type = "password";
                                        }
                                        var x = document.getElementById("reg_confirm_password");
                                        if (x.type === "password") {
                                            x.type = "text";
                                        } else {
                                            x.type = "password";
                                        }
                                    }
                                </script>
                            </p>
                        <?php } ?>

                    <?php } else { ?>

                        <p><?php esc_html_e('A password will be sent to your email address.', 'woocommerce'); ?></p>

                    <?php } ?>

                    <?php

                    if ($settings['show_action_form'] === 'yes') {
                        do_action('woocommerce_register_form');
                    }

                    ?>

                    <p class="woocommerce-FormRow form-row">
                        <?php wp_nonce_field('woocommerce-register', 'woocommerce-register-nonce'); ?>
                        <button type="submit" class="woocommerce-Button woocommerce-button button woocommerce-form-register__submit" name="register" value="<?php esc_attr_e($settings['button_label'], 'woocommerce'); ?>"><?php esc_html_e($settings['button_label'], 'woocommerce'); ?></button>
                    </p>

                    <?php

                    if ($settings['show_action_form_end'] === 'yes') {
                        do_action('woocommerce_register_form_end');
                    }
                    ?>
                </form>
            </div>
<?php
        } elseif (webt_is_edit_mode() || webt_is_preview_mode()) {
            echo '<p> Please enable my account registration </p>';
        }
    }
}
Plugin::elementor_instance()->widgets_manager->register_widget_type(new Widget_MyAccount_Register_Form());
