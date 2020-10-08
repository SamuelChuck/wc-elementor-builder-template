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

class Widget_Cart_Totals_Widget extends Widget_Base
{

    /**
     * Get widget name.
     */
    public function get_name()
    {
        return 'webt-cart-totals';
    }

    /**
     * Get widget title.
     */
    public function get_title()
    {
        return esc_html__('Cart totals', 'webt');
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
        return ['webt-cart'];
    }

    /**
     * Register oEmbed widget controls.
     */
    protected function _register_controls()
    {

        // Heading
        $this->start_controls_section(
            'cart_total_heading_style',
            array(
                'label' => __('Heading', 'webt'),
                'tab' => Controls_Manager::TAB_STYLE,
            )
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            array(
                'name' => 'cart_total_heading_typography',
                'label' => __('Typography', 'webt'),
                'selector' => '{{WRAPPER}} .cart_totals > h2, .cart_totals th.product-name',
            )
        );
        $this->add_control(
            'cart_total_heading_color',
            [
                'label' => __('Color', 'webt'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .cart_totals > h2, .cart_totals th.product-name' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'cart_total_heading_border',
                'selector' => '{{WRAPPER}} .cart_totals > h2, .cart_totals th.product-name',
            ]
        );

        $this->add_responsive_control(
            'cart_total_heading_margin',
            [
                'label' => __('Margin', 'webt'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors' => [
                    '{{WRAPPER}} .cart_totals > h2, .cart_totals th.product-name' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'cart_total_heading_align',
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
                    '{{WRAPPER}} .cart_totals > h2, .cart_totals th.product-name' => 'text-align: {{VALUE}}',
                ],
            ]
        );

        $this->end_controls_section();

        // Cart Total Table
        $this->start_controls_section(
            'cart_total_table_style',
            array(
                'label' => __('Table Cell', 'webt'),
                'tab' => Controls_Manager::TAB_STYLE,
            )
        );

        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'cart_total_table_border',
                'selector' => '{{WRAPPER}} .cart_totals .shop_table tr td',
            ]
        );

        $this->add_responsive_control(
            'cart_total_table_padding',
            [
                'label' => __('Padding', 'webt'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors' => [
                    '{{WRAPPER}} .cart_totals .shop_table tr td' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'cart_total_table_align',
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
                    '{{WRAPPER}} .cart_totals .shop_table tr td' => 'text-align: {{VALUE}}',
                ],
            ]
        );

        $this->add_responsive_control(
            'cart_total_table_width',
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
                    '{{WRAPPER}} .cart_totals .shop_table tr td' => 'width: {{SIZE}}{{UNIT}};',
                ],
            ]

        );

        $this->end_controls_section();

        // Cart Total Table heading
        $this->start_controls_section(
            'cart_total_table_heading_style',
            array(
                'label' => __('Table Heading', 'webt'),
                'tab' => Controls_Manager::TAB_STYLE,
            )
        );
        $this->add_control(
            'cart_total_table_heading_text_color',
            [
                'label' => __('Color', 'webt'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .cart_totals .shop_table tr th' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            array(
                'name' => 'cart_total_table_heading_typography',
                'label' => __('Typography', 'webt'),
                'selector' => '{{WRAPPER}} .cart_totals .shop_table tr th',
            )
        );

        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'cart_total_table_heading_border',
                'selector' => '{{WRAPPER}} .cart_totals .shop_table tr th',
            ]
        );

        $this->add_responsive_control(
            'cart_total_table_heading_padding',
            [
                'label' => __('Padding', 'webt'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors' => [
                    '{{WRAPPER}} .cart_totals .shop_table tr th' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'cart_total_table_heading_align',
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
                    '{{WRAPPER}} .cart_totals .shop_table tr th' => 'text-align: {{VALUE}}',
                ],
            ]
        );

        $this->add_responsive_control(
            'cart_total_table_heading_width',
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
                    '{{WRAPPER}} .cart_totals .shop_table tr th' => 'width: {{SIZE}}{{UNIT}};',
                ],
            ]

        );


        $this->end_controls_section();

        // Cart Total Price
        $this->start_controls_section(
            'cart_total_table_price_style',
            array(
                'label' => __('Price', 'webt'),
                'tab' => Controls_Manager::TAB_STYLE,
            )
        );
        $this->add_control(
            'cart_total_table_heading',
            [
                'label' => __('Price', 'webt'),
                'type' => Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            array(
                'name' => 'cart_total_table_subtotal_typography',
                'label' => __('Typography', 'webt'),
                'selector' => '{{WRAPPER}} .cart_totals .shop_table tr.cart-subtotal td span.woocommerce-Price-amount.amount',
            )
        );

        $this->add_control(
            'cart_total_table_subtotal_color',
            [
                'label' => __('Subtotal Color', 'webt'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .cart_totals .shop_table tr.cart-subtotal td span.woocommerce-Price-amount.amount' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'cart_total_table_totalprice_heading',
            [
                'label' => __('Total Price', 'webt'),
                'type' => Controls_Manager::HEADING,
                'separator' => 'after', 'before',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            array(
                'name' => 'cart_total_table_total_typography',
                'label' => __('Typography', 'webt'),
                'selector' => '{{WRAPPER}} .cart_totals .shop_table tr.order-total th, {{WRAPPER}} .cart_totals .shop_table tr.order-total td span.woocommerce-Price-amount.amount',
            )
        );

        $this->add_control(
            'cart_total_table_total_color',
            [
                'label' => __('Total Color', 'webt'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .cart_totals .shop_table tr.order-total th' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .cart_totals .shop_table tr.order-total td span.woocommerce-Price-amount.amount' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->end_controls_section();

        // Checkout button
        $this->start_controls_section(
            'cart_total_checkout_button_style',
            array(
                'label' => __('Checkout Button', 'webt'),
                'tab' => Controls_Manager::TAB_STYLE,
            )
        );

        $this->start_controls_tabs('cart_total_checkout_button_style_tabs');

        $this->start_controls_tab(
            'cart_total_checkout_button_style_normal',
            [
                'label' => __('Normal', 'webt'),
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            array(
                'name' => 'cart_total_checkout_button_typography',
                'label' => __('Typography', 'webt'),
                'selector' => '{{WRAPPER}} .wc-proceed-to-checkout .button.checkout-button',
            )
        );
        $this->add_responsive_control(
            'cart_total_checkout_button_text_align',
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
                    '{{WRAPPER}} .wc-proceed-to-checkout .button.checkout-button' => 'text-align: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'cart_total_checkout_button_border',
                'label' => __('Button Border', 'webt'),
                'selector' => '{{WRAPPER}} .wc-proceed-to-checkout .button.checkout-button',
            ]
        );

        $this->add_control(
            'cart_total_checkout_button_text_color',
            [
                'label' => __('Text Color', 'webt'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .wc-proceed-to-checkout .button.checkout-button' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'cart_total_checkout_button_bg_color',
            [
                'label' => __('Background Color', 'webt'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .wc-proceed-to-checkout .button.checkout-button' => 'background-color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'cart_total_checkout_button_border_radius',
            [
                'label' => __('Border Radius', 'webt'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors' => [
                    '{{WRAPPER}} .wc-proceed-to-checkout .button.checkout-button' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'cart_total_checkout_button_box_shadow',
                'selector' => '{{WRAPPER}} .wc-proceed-to-checkout .button.checkout-button',
            ]
        );

        $this->add_responsive_control(
            'cart_total_checkout_button_padding',
            [
                'label' => __('Padding', 'webt'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .wc-proceed-to-checkout .button.checkout-button' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'cart_total_checkout_button_margin',
            [
                'label' => __('Margin', 'webt'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .wc-proceed-to-checkout .button.checkout-button' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'cart_total_checkout_button_width',
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
                    '{{WRAPPER}} .wc-proceed-to-checkout .button.checkout-button' => 'width: {{SIZE}}{{UNIT}}; display:block;', //display block to enforce full width 
                ],
            ]
        );

        $this->end_controls_tab();

        $this->start_controls_tab(
            'cart_total_checkout_button_style_hover',
            [
                'label' => __('Hover', 'webt'),
            ]
        );

        $this->add_control(
            'cart_total_checkout_button_hover_text_color',
            [
                'label' => __('Text Color', 'webt'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .wc-proceed-to-checkout .button.checkout-button:hover' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'cart_total_checkout_button_hover_bg_color',
            [
                'label' => __('Background Color', 'webt'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .wc-proceed-to-checkout .button.checkout-button:hover' => 'background-color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'cart_total_checkout_button_hover_border_color',
            [
                'label' => __('Border Color', 'webt'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .wc-proceed-to-checkout .button.checkout-button:hover' => 'border-color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'cart_total_checkout_button_hover_border_radius',
            [
                'label' => __('Border Radius', 'webt'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors' => [
                    '{{WRAPPER}} .wc-proceed-to-checkout .button.checkout-button:hover' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'cart_total_checkout_button_hover_box_shadow',
                'selector' => '{{WRAPPER}} .wc-proceed-to-checkout .button.checkout-button:hover',
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
        woocommerce_cart_totals();
    }
}

Plugin::elementor_instance()->widgets_manager->register_widget_type(new Widget_Cart_Totals_Widget());
