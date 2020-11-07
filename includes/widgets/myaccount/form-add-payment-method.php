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

class Widget_MyAccount_Add_Payment_Methods extends Widget_Base
{

    /**
     * Get widget name.
     */
    public function get_name()
    {
        return 'webt-add-payment-method-form';
    }

    /**
     * Get widget title.
     */
    public function get_title()
    {
        return esc_html__('Add Payment Method Form', 'webt');
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
        return ['webt', 'woocommerce', 'myaccount', 'checkout', 'payment-method', 'add'];
    }

    /**
     * Register oEmbed widget controls.
     */
    protected function _register_controls()
    {
        // Payment
        $this->start_controls_section(
            'payment_method_style',
            array(
                'label' => __('Payment', 'webt'),
                'tab' => Controls_Manager::TAB_STYLE,
            )
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            array(
                'name' => 'payment_method_typography',
                'label' => __('Typography', 'webt'),
                'selector' => '{{WRAPPER}} #payment',
            )
        );

        $this->add_control(
            'payment_method_color',
            [
                'label' => __('Color', 'webt'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} #payment' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'payment_method_bg_color',
            [
                'label' => __('Background Color', 'webt'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} #payment' => 'background-color: {{VALUE}} !important',
                ],
            ]
        );

        $this->end_controls_section();
        // Payment Method Heading
        $this->start_controls_section(
            'payment-method_heading_style',
            array(
                'label' => __('Payment Heading', 'webt'),
                'tab' => Controls_Manager::TAB_STYLE,
            )
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            array(
                'name' => 'payment_method_heading_typography',
                'label' => __('Typography', 'webt'),
                'selector' => '{{WRAPPER}} #payment .wc_payment_method label',
            )
        );

        $this->add_control(
            'payment_method_heading_color',
            [
                'label' => __('Color', 'webt'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} #payment .wc_payment_method label' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'payment_method_heading_border',
                'label' => __('Border', 'webt'),
                'selector' => '{{WRAPPER}} #payment ul.payment_methods.methods li',
            ]
        );

        $this->add_responsive_control(
            'payment_method_heading_border_radius',
            [
                'label' => esc_html__('Radius', 'webt'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors' => [
                    '{{WRAPPER}} #payment ul.payment_methods.methods li' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'payment_method_heading_padding',
            [
                'label' => __('Padding', 'webt'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors' => [
                    '{{WRAPPER}} #payment ul.payment_methods.methods li' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'payment_method_heading_margin',
            [
                'label' => __('Margin', 'webt'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors' => [
                    '{{WRAPPER}} #payment ul.payment_methods.methods li' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    '{{WRAPPER}} #payment .wc_payment_method label' => 'margin: 0;',
                ],
            ]
        );

        $this->add_responsive_control(
            'payment_method_heading_align',
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
                'default' => 'left',
                'selectors' => [
                    '{{WRAPPER}} #payment ul.payment_methods.methods li' => 'text-align: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'payment_method_heading_background_color',
            [
                'label' => __('Background Color', 'webt'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} #payment ul.payment_methods.methods li' => 'background-color: {{VALUE}}',
                ],
            ]
        );

        $this->end_controls_section();

        // Payment Content
        $this->start_controls_section(
            'payment_method_content_style',
            array(
                'label' => __('Content', 'webt'),
                'tab' => Controls_Manager::TAB_STYLE,
            )
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            array(
                'name' => 'payment_method_content_typography',
                'label' => __('Typography', 'webt'),
                'selector' => '{{WRAPPER}} #payment .payment_box',
            )
        );

        $this->add_control(
            'payment_method_content_color',
            [
                'label' => __('Color', 'webt'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} #payment .payment_box' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_responsive_control(
            'payment_method_content_padding',
            [
                'label' => esc_html__('Padding', 'webt'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em'],
                'selectors' => [
                    '{{WRAPPER}} #payment .payment_box' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'payment_method_content_bg_color',
            [
                'label' => __('Background Color', 'webt'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} #payment .payment_box' => 'background-color: {{VALUE}}',
                    '{{WRAPPER}} #payment div.payment_box::before, {{WRAPPER}} #payment div.payment_box::before' => 'border-color:transparent transparent {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'payment_method_content_border',
                'label' => __('Border', 'webt'),
                'selector' => '{{WRAPPER}} #payment .payment_box',
            ]
        );

        $this->add_responsive_control(
            'payment_method_content_border_radius',
            [
                'label' => esc_html__('Radius', 'webt'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors' => [
                    '{{WRAPPER}} #payment .payment_box' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();

        // Payment Place Order Button
        $this->start_controls_section(
            'payment_method_place_order_style',
            array(
                'label' => __('Add Payment Method Button', 'webt'),
                'tab' => Controls_Manager::TAB_STYLE,
            )
        );

        $this->start_controls_tabs('payment_method_place_order_style_tabs');

        // Plece order button normal
        $this->start_controls_tab(
            'payment_method_place_order_normal_tab',
            [
                'label' => __('Normal', 'webt'),
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            array(
                'name' => 'payment_method_place_order_typography',
                'label' => __('Typography', 'webt'),
                'selector' => '{{WRAPPER}} #payment #place_order',
            )
        );

        $this->add_control(
            'payment_method_place_order_color',
            [
                'label' => __('Color', 'webt'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} #payment #place_order' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'payment_method_place_order_bg_color',
            [
                'label' => __('Background Color', 'webt'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} #payment #place_order' => 'background-color: {{VALUE}}',
                ],
            ]
        );


        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'payment_method_place_order_border',
                'label' => __('Border', 'webt'),
                'selector' => '{{WRAPPER}} #payment #place_order',
            ]
        );

        $this->add_responsive_control(
            'payment_method_place_order_border_radius',
            [
                'label' => esc_html__('Radius', 'webt'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors' => [
                    '{{WRAPPER}} #payment #place_order' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_tab();

        // Plece order button hover
        $this->start_controls_tab(
            'payment_method_place_order_hover_tab',
            [
                'label' => __('Hover', 'webt'),
            ]
        );

        $this->add_control(
            'payment_method_place_order_hover_color',
            [
                'label' => __('Color', 'webt'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} #payment #place_order:hover' => 'color: {{VALUE}}; transition:0.4s;',
                ],
            ]
        );

        $this->add_control(
            'payment_method_place_order_hover_bg_color',
            [
                'label' => __('Background Color', 'webt'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} #payment #place_order:hover' => 'background-color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'payment_method_place_order_hover_border',
                'label' => __('Border', 'webt'),
                'selector' => '{{WRAPPER}} #payment #place_order:hover',
            ]
        );

        $this->end_controls_tab();

        $this->end_controls_tabs();

        $this->add_responsive_control(
            'payment_method_place_order_padding',
            [
                'label' => esc_html__('Padding', 'webt'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em'],
                'selectors' => [
                    '{{WRAPPER}} #payment #place_order' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'separator' => 'before',
            ]
        );

        $this->add_responsive_control(
            'payment_method_place_order_margin',
            [
                'label' => esc_html__('Margin', 'webt'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em'],
                'selectors' => [
                    '{{WRAPPER}} #payment #place_order' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'separator' => 'before',
            ]
        );
        $this->end_controls_section();
    }

    /**
     * Render widget output on the frontend.
     */
    protected function render()
    {
        wc_get_template('myaccount/add-payment-method-form.php');
    }
}

Plugin::elementor_instance()->widgets_manager->register_widget_type(new Widget_MyAccount_Add_Payment_Methods());
