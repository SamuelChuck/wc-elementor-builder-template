<?php

namespace WEBT;

use Elementor\Controls_Manager;
use Elementor\Group_Control_Border;
use Elementor\Group_Control_Typography;
use Elementor\Widget_Base;
use WC_Shortcode_Cart;
use WEBT\Plugin;

/**
 * WooCommerce Elementor Builder Widget.
 *
 * @package webt
 */
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

class Widget_Cart_Table extends Widget_Base
{

    /**
     * Get widget name.
     */
    public function get_name()
    {
        return 'webt-cart-table';
    }

    /**
     * Get widget title.
     */
    public function get_title()
    {
        return esc_html__('Cart Table', 'webt');
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
     * Search keywords
     */
    public function get_keywords()
    {
        return ['webt', 'woocommerce', 'cart', 'table'];
    }

    /**
     * Register oEmbed widget controls.
     */
    protected function _register_controls()
    {

        $this->start_controls_section(
            'cart_heading_style_section',
            [
                'label' => __('Heading', 'webt'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'heading_text_color',
            [
                'label' => __('Color', 'webt'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .shop_table.cart th' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            array(
                'name'      => 'heading_typography',
                'label'     => __('Typography', 'webt'),
                'selector'  => '{{WRAPPER}} .shop_table.cart th',
            )
        );

        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'heading_border',
                'label' => __('Border', 'webt'),
                'selector' => '{{WRAPPER}} .shop_table.cart th',
            ]
        );

        $this->add_responsive_control(
            'heading_padding',
            [
                'label' => __('Padding', 'webt'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors' => [
                    '{{WRAPPER}} .shop_table.cart th' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'heading_text_align',
            [
                'label'        => __('Text Alignment', 'webt'),
                'type'         => Controls_Manager::CHOOSE,
                'options'      => [
                    'left'   => [
                        'title' => __('Left', 'webt'),
                        'icon'  => 'fa fa-align-left',
                    ],
                    'center' => [
                        'title' => __('Center', 'webt'),
                        'icon'  => 'fa fa-align-center',
                    ],
                    'right'  => [
                        'title' => __('Right', 'webt'),
                        'icon'  => 'fa fa-align-right',
                    ],
                    'justify' => [
                        'title' => __('Justified', 'webt'),
                        'icon' => 'fa fa-align-justify',
                    ],
                ],
                'default'      => 'left',
                'selectors' => [
                    '{{WRAPPER}} .shop_table.cart thead th' => 'text-align: {{VALUE}}',
                ],
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'cart_table_style_section',
            [
                'label' => __('Table', 'webt'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'table_border',
                'label' => __('Border', 'webt'),
                'selector' => '{{WRAPPER}} .shop_table.cart',
            ]
        );

        $this->add_responsive_control(
            'table_margin',
            [
                'label' => __('margin', 'webt'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors' => [
                    '{{WRAPPER}} .shop_table.cart' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'cart_table_cell_style_section',
            [
                'label' => __('Table Cell', 'webt'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'table_cell_border',
                'label' => __('Border', 'webt'),
                'selector' => '{{WRAPPER}} .shop_table.cart tr.cart_item td',
            ]
        );

        $this->add_responsive_control(
            'table_cell_padding',
            [
                'label' => __('Padding', 'webt'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors' => [
                    '{{WRAPPER}} .shop_table.cart tr.cart_item td' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'table_cell_text_align',
            [
                'label'        => __('Text Alignment', 'webt'),
                'type'         => Controls_Manager::CHOOSE,
                'options'      => [
                    'left'   => [
                        'title' => __('Left', 'webt'),
                        'icon'  => 'fa fa-align-left',
                    ],
                    'center' => [
                        'title' => __('Center', 'webt'),
                        'icon'  => 'fa fa-align-center',
                    ],
                    'right'  => [
                        'title' => __('Right', 'webt'),
                        'icon'  => 'fa fa-align-right',
                    ],
                    'justify' => [
                        'title' => __('Justified', 'webt'),
                        'icon' => 'fa fa-align-justify',
                    ],
                ],
                'default'      => 'left',
                'selectors' => [
                    '{{WRAPPER}} .shop_table.cart tr.cart_item td' => 'text-align: {{VALUE}}',
                ],
            ]
        );

        $this->end_controls_section();

        // Product Image
        $this->start_controls_section(
            'cart_product_image_style',
            array(
                'label' => __('Product Image', 'webt'),
                'tab' => Controls_Manager::TAB_STYLE,
            )
        );
        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'product_image_border',
                'label' => __('Border', 'webt'),
                'selector' => '{{WRAPPER}} .shop_table.cart tr.cart_item .product-thumbnail img',
            ]
        );

        $this->add_responsive_control(
            'product_image_border_radius',
            [
                'label' => __('Border Radius', 'webt'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors' => [
                    '{{WRAPPER}} .shop_table.cart tr.cart_item .product-thumbnail img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'product_image_padding',
            [
                'label' => __('Padding', 'webt'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors' => [
                    '{{WRAPPER}} .shop_table.cart tr.cart_item .product-thumbnail img' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'product_image_margin',
            [
                'label' => __('Margin', 'webt'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors' => [
                    '{{WRAPPER}} .shop_table.cart tr.cart_item .product-thumbnail img' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'product_image_width',
            [
                'label' => __('Image Width', 'webt'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px', '%'],
                'range' => [
                    'px' => [
                        'min' => 10,
                        'max' => 200,
                        'step' => 1,
                    ],
                    '%' => [
                        'min' => 0,
                        'max' => 200,
                    ],
                ],
                'default' => [
                    'unit' => 'px',
                    'size' => 32,
                ],
                'selectors' => [
                    '{{WRAPPER}} .shop_table.cart tr.cart_item .product-thumbnail img' => 'width: {{SIZE}}{{UNIT}}; min-width: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .shop_table.cart tr.cart_item .product-thumbnail' => 'width: {{SIZE}}{{UNIT}}; min-width: {{SIZE}}{{UNIT}}; max-width: 100%;',
                ],
            ]
        );

        $this->end_controls_section();

        // Product Title
        $this->start_controls_section(
            'cart_product_title_style',
            array(
                'label' => __('Product Title', 'webt'),
                'tab' => Controls_Manager::TAB_STYLE,
            )
        );

        $this->start_controls_tabs('cart_item_style_tabs');

        // Product Title Normal Style
        $this->start_controls_tab(
            'product_title_normal',
            [
                'label' => __('Normal', 'webt'),
            ]
        );

        $this->add_control(
            'cart_product_title_color',
            [
                'label' => __('Color', 'webt'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .shop_table.cart tr.cart_item .product-name' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .shop_table.cart tr.cart_item .product-name a' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            array(
                'name'      => 'cart_product_title_typography',
                'label'     => __('Typography', 'webt'),
                'selector'  => '{{WRAPPER}} .shop_table.cart tr.cart_item .product-name',
            )
        );
        $this->add_responsive_control(
            'cart_product_title_padding',
            [
                'label' => __('Padding', 'webt'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors' => [
                    '{{WRAPPER}} .shop_table.cart tr.cart_item .product-name' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'cart_product_title_margin',
            [
                'label' => __('Margin', 'webt'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors' => [
                    '{{WRAPPER}} .shop_table.cart tr.cart_item .product-name > a' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );


        $this->end_controls_tab();

        // Product Title Hover Style
        $this->start_controls_tab(
            'product_title_hover',
            [
                'label' => __('Hover', 'webt'),
            ]
        );

        $this->add_control(
            'cart_product_title_hover_color',
            [
                'label' => __('Color', 'webt'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .shop_table.cart tr.cart_item .product-name:hover' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .shop_table.cart tr.cart_item .product-name a:hover' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->end_controls_tab();

        $this->end_controls_tabs();

        $this->add_responsive_control(
            'product_title_table_width',
            [
                'label' => __('Table Width', 'webt'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px', '%'],
                'range' => [
                    'px' => [
                        'min' => 200,
                        'max' => 1000,
                        'step' => 1,
                    ],
                    '%' => [
                        'min' => 0,
                        'max' => 200,
                    ],
                ],
                'default' => [
                    'unit' => 'px',
                    'size' => 32,
                ],
                'selectors' => [
                    '{{WRAPPER}} .shop_table.cart th.product-name' => 'width: {{SIZE}}{{UNIT}}; min-width: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .shop_table.cart th.product-name' => 'width: {{SIZE}}{{UNIT}}; min-width: {{SIZE}}{{UNIT}}; max-width: 100%;',
                ],
            ]
        );


        $this->end_controls_section();

        // Product Price
        $this->start_controls_section(
            'cart_product_price_style',
            array(
                'label' => __('Product Price', 'webt'),
                'tab' => Controls_Manager::TAB_STYLE,
            )
        );
        $this->add_control(
            'cart_product_price_color',
            [
                'label' => __('Color', 'webt'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .shop_table.cart tr.cart_item .product-price' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .shop_table.cart tr.cart_item .product-price span.woocommerce-Price-amount.amount' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            array(
                'name'      => 'cart_product_price_typography',
                'label'     => __('Typography', 'webt'),
                'selector'  => '{{WRAPPER}} .shop_table.cart tr.cart_item .product-price',
            )
        );

        $this->end_controls_section();

        // Product Quantity
        $this->start_controls_section(
            'cart_product_total_style',
            array(
                'label' => __('Product Quantity', 'webt'),
                'tab' => Controls_Manager::TAB_STYLE,
            )
        );
        $this->add_control(
            'cart_product_quantity_color',
            [
                'label' => __('Color', 'webt'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .shop_table.cart tr.cart_item .product-quantity' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            array(
                'name'      => 'cart_product_quantity_typography',
                'label'     => __('Typography', 'webt'),
                'selector'  => '{{WRAPPER}} .shop_table.cart tr.cart_item .product-quantity',
            )
        );


        $this->add_responsive_control(
            'cart_product_quantity_align',
            [
                'label'        => __('Text Alignment', 'webt'),
                'type'         => Controls_Manager::CHOOSE,
                'options'      => [
                    'left'   => [
                        'title' => __('Left', 'webt'),
                        'icon'  => 'fa fa-align-left',
                    ],
                    'center' => [
                        'title' => __('Center', 'webt'),
                        'icon'  => 'fa fa-align-center',
                    ],
                    'right'  => [
                        'title' => __('Right', 'webt'),
                        'icon'  => 'fa fa-align-right',
                    ],
                    'justify' => [
                        'title' => __('Justified', 'webt'),
                        'icon' => 'fa fa-align-justify',
                    ],
                ],
                'default'      => 'left',
                'selectors' => [
                    '{{WRAPPER}} .shop_table.cart tr.cart_item .product-quantity' => 'text-align: {{VALUE}}',
                ],
            ]
        );
        $this->add_responsive_control(
            'cart_product_quantity_padding',
            [
                'label' => __('Padding', 'webt'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors' => [
                    '{{WRAPPER}} .shop_table.cart tr.cart_item .product-quantity' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();

        // Product Price Total
        $this->start_controls_section(
            'cart_product_subtotal_price_style',
            array(
                'label' => __('Total Price', 'webt'),
                'tab' => Controls_Manager::TAB_STYLE,
            )
        );
        $this->add_control(
            'cart_product_subtotal_price_color',
            [
                'label' => __('Color', 'webt'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .shop_table.cart tr.cart_item .product-subtotal ' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .shop_table.cart tr.cart_item .product-subtotal span.woocommerce-Price-amount.amount' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            array(
                'name'      => 'cart_product_subtotal_price_typography',
                'label'     => __('Typography', 'webt'),
                'selector'  => '{{WRAPPER}} .shop_table.cart tr.cart_item .product-subtotal',
            )
        );

        $this->add_responsive_control(
            'cart_product_subtotal_price_margin',
            [
                'label' => __('Margin', 'webt'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors' => [
                    '{{WRAPPER}} .shop_table.cart tr.cart_item .product-subtotal span.woocommerce-Price-amount.amount' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();

        //Remove Product Button
        $this->start_controls_section(
            'cart_product_remove_button_style',
            array(
                'label' => __('Remove Button', 'webt'),
                'tab' => Controls_Manager::TAB_STYLE,
            )
        );

        $this->start_controls_tabs('cart_remove_style_tabs');

        // Product Remove Button Normal Style
        $this->start_controls_tab(
            'cart_product_remove_button_normal',
            [
                'label' => __('Normal', 'webt'),
            ]
        );

        $this->add_control(
            'cart_product_remove_button_color',
            [
                'label' => __('Color', 'webt'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .shop_table.cart tr.cart_item .product-remove a.remove' => 'color: {{VALUE}} !important',
                ],
            ]
        );

        $this->add_control(
            'cart_product_remove_button_bg_color',
            [
                'label' => __('Background Color', 'webt'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .shop_table.cart tr.cart_item .product-remove a.remove' => 'background-color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            array(
                'name'      => 'cart_remove_button_typography',
                'label'     => __('Typography', 'webt'),
                'selector'  => '{{WRAPPER}} .shop_table.cart tr.cart_item .product-remove a.remove',
            )
        );

        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'cart_remove_button_border',
                'label' => __('Border', 'webt'),
                'selector' => '{{WRAPPER}} .shop_table.cart tr.cart_item .product-remove a.remove',
            ]
        );

        $this->add_responsive_control(
            'cart_product_remove_button_border_radius',
            [
                'label' => __('Border Radius', 'webt'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors' => [
                    '{{WRAPPER}} .shop_table.cart tr.cart_item .product-remove a.remove' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'cart_product_remove_button_padding',
            [
                'label' => __('Padding', 'webt'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors' => [
                    '{{WRAPPER}} .shop_table.cart tr.cart_item .product-remove a.remove' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_tab();

        // Product Title Hover Style
        $this->start_controls_tab(
            'cart_product_remove_button_hover',
            [
                'label' => __('Hover', 'webt'),
            ]
        );

        $this->add_control(
            'cart_product_remove_button_hover_color',
            [
                'label' => __('Color', 'webt'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .shop_table.cart tr.cart_item .product-remove a.remove:hover' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'cart_product_remove_button_hover_bg_color',
            [
                'label' => __('Background Color', 'webt'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .shop_table.cart tr.cart_item .product-remove a.remove:hover' => 'background-color: {{VALUE}}; transition:0.4s',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'cart_product_remove_button_hover_border',
                'label' => __('Border', 'webt'),
                'selector' => '{{WRAPPER}} .shop_table.cart tr.cart_item .product-remove a.remove:hover',
            ]
        );

        $this->add_responsive_control(
            'cart_product_remove_button_hover_border_radius',
            [
                'label' => __('Border Radius', 'webt'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors' => [
                    '{{WRAPPER}} .shop_table.cart tr.cart_item .product-remove a.remove:hover' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_tab();

        $this->end_controls_tabs();

        $this->add_control(
            'cart_product_remove_table_margin',
            [
                'label' => __('Margin', 'webt'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .shop_table.cart tr.cart_item .product-remove' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();

        /*Update Cat Button*/
        $this->start_controls_section(
            'cart_update_button_style',
            array(
                'label' => __('Update Button', 'webt'),
                'tab' => Controls_Manager::TAB_STYLE,
            )
        );

        $this->start_controls_tabs('cart_update_style_tabs');

        // Normal Style
        $this->start_controls_tab(
            'cart_update_button_normal',
            [
                'label' => __('Normal', 'webt'),
            ]
        );

        $this->add_control(
            'cart_update_button_color',
            [
                'label' => __('Color', 'webt'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .woocommerce-cart-form .actions button.button' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'cart_update_button_bg_color',
            [
                'label' => __('Background Color', 'webt'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .woocommerce-cart-form .actions button.button' => 'background-color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            array(
                'name'      => 'cart_update_button_typography',
                'label'     => __('Typography', 'webt'),
                'selector'  => '{{WRAPPER}} .woocommerce-cart-form .actions button.button',
            )
        );

        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'cart_update_button_border',
                'label' => __('Border', 'webt'),
                'selector' => '{{WRAPPER}} .woocommerce-cart-form .actions button.button',
            ]
        );

        $this->add_responsive_control(
            'cart_update_button_border_radius',
            [
                'label' => __('Border Radius', 'webt'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors' => [
                    '{{WRAPPER}} .woocommerce-cart-form .actions button.button' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'cart_update_button_padding',
            [
                'label' => __('Padding', 'webt'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors' => [
                    '{{WRAPPER}} .woocommerce-cart-form .actions button.button' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'cart_update_button__margin',
            [
                'label' => __('Margin', 'webt'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors' => [
                    '{{WRAPPER}} .woocommerce-cart-form .actions button.button' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_tab();

        // Product Title Hover Style
        $this->start_controls_tab(
            'cart_update_button_hover',
            [
                'label' => __('Hover', 'webt'),
            ]
        );

        $this->add_control(
            'cart_update_button_hover_color',
            [
                'label' => __('Color', 'webt'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .woocommerce-cart-form .actions button.button:hover' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'cart_update_button_hover_bg_color',
            [
                'label' => __('Background Color', 'webt'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .woocommerce-cart-form .actions button.button:hover' => 'background-color: {{VALUE}}; transition:0.4s',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'cart_update_button_hover_border',
                'label' => __('Border', 'webt'),
                'selector' => '{{WRAPPER}} .woocommerce-cart-form .actions button.button:hover',
            ]
        );

        $this->add_responsive_control(
            'cart_update_button_hover_border_radius',
            [
                'label' => __('Border Radius', 'webt'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors' => [
                    '{{WRAPPER}} .woocommerce-cart-form .actions button.button:hover' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_tab();

        $this->end_controls_tabs();

        $this->end_controls_section();


        // Continue Shopping
        $this->start_controls_section(
            'cart_continue_shopping_button_style',
            array(
                'label' => __('Continue Shopping Cart Button', 'webt'),
                'tab' => Controls_Manager::TAB_STYLE,
            )
        );

        $this->start_controls_tabs('cart_continue_shopping_style_tabs');

        // Normal Style
        $this->start_controls_tab(
            'cart_continue_shopping_button_normal',
            [
                'label' => __('Normal', 'webt'),
            ]
        );

        $this->add_control(
            'cart_continue_shopping_button_color',
            [
                'label' => __('Color', 'webt'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .shop_table.cart .actions a.button-continue-shopping' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'cart_continue_shopping_button_bg_color',
            [
                'label' => __('Background Color', 'webt'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .shop_table.cart .actions a.button-continue-shopping' => 'background-color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            array(
                'name'      => 'cart_continue_shopping_button_typography',
                'label'     => __('Typography', 'webt'),
                'selector'  => '{{WRAPPER}} .shop_table.cart .actions a.button-continue-shopping',
            )
        );

        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'cart_continue_shopping_button_border',
                'label' => __('Border', 'webt'),
                'selector' => '{{WRAPPER}} .shop_table.cart .actions a.button-continue-shopping',
            ]
        );

        $this->add_responsive_control(
            'cart_continue_shopping_button_border_radius',
            [
                'label' => __('Border Radius', 'webt'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors' => [
                    '{{WRAPPER}} .shop_table.cart .actions a.button-continue-shopping' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'cart_continue_shopping_button_padding',
            [
                'label' => __('Padding', 'webt'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors' => [
                    '{{WRAPPER}} .shop_table.cart .actions a.button-continue-shopping' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'cart_continue_shopping_button_margin',
            [
                'label' => __('Margin', 'webt'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors' => [
                    '{{WRAPPER}} .shop_table.cart .actions a.button-continue-shopping' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );


        $this->end_controls_tab();

        // Product Title Hover Style
        $this->start_controls_tab(
            'cart_continue_shopping_button_hover',
            [
                'label' => __('Hover', 'webt'),
            ]
        );

        $this->add_control(
            'cart_continue_shopping_button_hover_color',
            [
                'label' => __('Color', 'webt'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .shop_table.cart .actions a.button-continue-shopping:hover' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'cart_continue_shopping_button_hover_bg_color',
            [
                'label' => __('Background Color', 'webt'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .shop_table.cart .actions a.button-continue-shopping:hover' => 'background-color: {{VALUE}}; transition:0.4s',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'cart_continue_shopping_button_hover_border',
                'label' => __('Border', 'webt'),
                'selector' => '{{WRAPPER}} .shop_table.cart .actions a.button-continue-shopping:hover',
            ]
        );

        $this->add_responsive_control(
            'cart_continue_shopping_button_hover_border_radius',
            [
                'label' => __('Border Radius', 'webt'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors' => [
                    '{{WRAPPER}} .shop_table.cart .actions a.button-continue-shopping:hover' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
        Widget_Shortcode_Cart::output($atts = array());
    }
}

Plugin::elementor_instance()->widgets_manager->register_widget_type(new Widget_Cart_Table());

/**
 * Cart Shortcode
 * Shortcode_Cart
 * Used on the cart page, the cart shortcode displays the cart contents and interface for coupon codes and other cart bits and pieces.
 *
 * @category 	Shortcodes
 * @package 	WooCommerce/Shortcodes/Cart
 * @version     1.0.1
 */
class Widget_Shortcode_Cart extends WC_Shortcode_Cart
{
    /**
     * Output the cart shortcode.
     */
    public static function output($atts)
    {
        // Constants. required to load Cart Resources.
        wc_maybe_define_constant('WOOCOMMERCE_CART', true);

        $atts        = shortcode_atts(array(), $atts, 'woocommerce_cart');
        $nonce_value = wc_get_var($_REQUEST['woocommerce-shipping-calculator-nonce'], wc_get_var($_REQUEST['_wpnonce'], '')); // @codingStandardsIgnoreLine.

        // Update Shipping. Nonce check uses new value and old value (woocommerce-cart). @todo remove in 4.0.
        if (!empty($_POST['calc_shipping']) && (wp_verify_nonce($nonce_value, 'woocommerce-shipping-calculator') || wp_verify_nonce($nonce_value, 'woocommerce-cart'))) { // WPCS: input var ok.
            self::calculate_shipping();

            // Also calc totals before we check items so subtotals etc are up to date.
            WC()->cart->calculate_totals();
        }

        // Check cart items are valid.
        do_action('woocommerce_check_cart_items');

        // Calc totals.
        WC()->cart->calculate_totals();

        if (WC()->cart->is_empty()) {
            wc_get_template('cart/cart-empty.php');
        } else {
            wc_get_template('cart/cart-table.php');
        }
    }
}
