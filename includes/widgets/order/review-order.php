<?php

namespace WEBT;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Border;
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

class Widget_Review_Order_Widget extends Widget_Base
{

    /**
     * Get widget name.
     */
    public function get_name()
    {
        return 'webt-review-order';
    }

    /**
     * Get widget title.
     */
    public function get_title()
    {
        return esc_html__('Review Order', 'webt');
    }

    /**
     * Get widget icon.
     */
    public function get_icon()
    {
        return 'eicon-table';
    }

    /**
     * Get widget categories.
     */
    public function get_categories()
    {
        return ['webt-checkout'];
    }

    /**
     * Register oEmbed widget controls.
     */
    protected function _register_controls()
    {

        $this->start_controls_section(
            'content_section',
            [
                'label' => __('Content', 'webt'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'form_heading',
            [
                'label' => __('Heading', 'webt'),
                'type' => Controls_Manager::TEXT,
                'dynamic' => [
                    'active' => true,
                ],
                'placeholder' => __('Enter your title', 'webt'),
                'default' => __('Order Review', 'webt'),
            ]
        );

        $this->end_controls_section();

        // Heading
        $this->start_controls_section(
            'form_heading_style',
            array(
                'label' => __('Heading', 'webt'),
                'tab' => Controls_Manager::TAB_STYLE,
            )
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            array(
                'name' => 'form_heading_typography',
                'label' => __('Typography', 'webt'),
                'selector' => '{{WRAPPER}} #order_review_heading',
            )
        );

        $this->add_control(
            'form_heading_color',
            [
                'label' => __('Color', 'webt'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} #order_review_heading' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_responsive_control(
            'form_heading_margin',
            [
                'label' => __('Margin', 'webt'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors' => [
                    '{{WRAPPER}} #order_review_heading' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'form_heading_align',
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
                    '{{WRAPPER}} #order_review_heading' => 'text-align: {{VALUE}}',
                ],
            ]
        );

        $this->end_controls_section();

        // Table Heading
        $this->start_controls_section(
            'order_review_table_heading_style',
            array(
                'label' => __('Table Heading', 'webt'),
                'tab' => Controls_Manager::TAB_STYLE,
            )
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            array(
                'name' => 'order_review_table_heading_typography',
                'label' => __('Typography', 'webt'),
                'selector' => '{{WRAPPER}} .woocommerce-checkout-review-order-table thead th',
            )
        );

        $this->add_control(
            'order_review_table_heading_color',
            [
                'label' => __('Color', 'webt'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .woocommerce-checkout-review-order-table thead th' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'order_review_table_heading_border',
                'selector' => '{{WRAPPER}} .woocommerce-checkout-review-order-table thead th',
            ]
        );

        $this->add_responsive_control(
            'order_review_table_heading_padding',
            [
                'label' => __('Padding', 'webt'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors' => [
                    '{{WRAPPER}} .woocommerce-checkout-review-order-table thead th' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'order_review_table_heading_align',
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
                    '{{WRAPPER}} .woocommerce-checkout-review-order-table thead th' => 'text-align: {{VALUE}}',
                ],
            ]
        );

        $this->add_responsive_control(
            'order_review_table_heading_width',
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
                    '{{WRAPPER}} .woocommerce-checkout-review-order-table thead th' => 'width: {{SIZE}}{{UNIT}};',
                ],
            ]

        );

        $this->end_controls_section();

        // Table Cell Heading
        $this->start_controls_section(
            'order_review_table_cell_heading_style',
            array(
                'label' => __('Table Cell Heading', 'webt'),
                'tab' => Controls_Manager::TAB_STYLE,
            )
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            array(
                'name' => 'order_review_table_cell_heading_typography',
                'label' => __('Typography', 'webt'),
                'selector' => '{{WRAPPER}} .woocommerce-checkout-review-order-table th',
            )
        );

        $this->add_control(
            'order_review_table_cell_heading_color',
            [
                'label' => __('Color', 'webt'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .woocommerce-checkout-review-order-table th' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'order_review_table_cell_heading_border',
                'selector' => '{{WRAPPER}} .woocommerce-checkout-review-order-table th',
            ]
        );

        $this->add_responsive_control(
            'order_review_table_cell_heading_padding',
            [
                'label' => __('Padding', 'webt'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors' => [
                    '{{WRAPPER}} .woocommerce-checkout-review-order-table th' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'order_review_table_cell_heading_align',
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
                    '{{WRAPPER}} .woocommerce-checkout-review-order-table th' => 'text-align: {{VALUE}}',
                ],
            ]
        );

        $this->add_responsive_control(
            'order_review_table_cell_heading_width',
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
                    '{{WRAPPER}} .woocommerce-checkout-review-order-table th' => 'width: {{SIZE}}{{UNIT}};',
                ],
            ]

        );

        $this->end_controls_section();

        // Table Content
        $this->start_controls_section(
            'order_review_table_content_style',
            array(
                'label' => __('Table Content', 'webt'),
                'tab' => Controls_Manager::TAB_STYLE,
            )
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            array(
                'name' => 'order_review_table_content_typography',
                'label' => __('Typography', 'webt'),
                'selector' => '{{WRAPPER}} .woocommerce-checkout-review-order-table td, {{WRAPPER}} .woocommerce-checkout-review-order-table td strong',
            )
        );

        $this->add_control(
            'order_review_table_content_color',
            [
                'label' => __('Color', 'webt'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .woocommerce-checkout-review-order-table td' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .woocommerce-checkout-review-order-table td strong' => 'color: {{VALUE}}',
                ],
            ]
        );


        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'order_review_table_content_border',
                'selector' => '{{WRAPPER}} .woocommerce-checkout-review-order-table td',
            ]
        );

        $this->add_responsive_control(
            'order_review_table_content_padding',
            [
                'label' => __('Padding', 'webt'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors' => [
                    '{{WRAPPER}} .woocommerce-checkout-review-order-table td' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'order_review_table_content_align',
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
                    '{{WRAPPER}} .woocommerce-checkout-review-order-table td' => 'text-align: {{VALUE}}',
                ],
            ]
        );

        $this->add_responsive_control(
            'order_review_table_content_width',
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
                    '{{WRAPPER}} .woocommerce-checkout-review-order-table td' => 'width: {{SIZE}}{{UNIT}};',
                ],
            ]

        );

        $this->end_controls_section();

        // Price
        $this->start_controls_section(
            'order_review_table_price_style',
            array(
                'label' => __('Price', 'webt'),
                'tab' => Controls_Manager::TAB_STYLE,
            )
        );

        $this->add_control(
            'order_review_table_price_heading',
            [
                'label' => __('Price', 'webt'),
                'type' => Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            array(
                'name' => 'order_review_table_price_typography',
                'label' => __('Typography', 'webt'),
                'selector' => '{{WRAPPER}} .woocommerce-checkout-review-order-table td.product-total',
            )
        );

        $this->add_control(
            'order_review_table_price_color',
            [
                'label' => __('Color', 'webt'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .woocommerce-checkout-review-order-table td.product-total' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'order_review_table_totalprice_heading',
            [
                'label' => __('Total Price', 'webt'),
                'type' => Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            array(
                'name' => 'order_review_table_totalprice_typography',
                'label' => __('Typography', 'webt'),
                'selector' => '{{WRAPPER}} .woocommerce-checkout-review-order-table tr.cart-subtotal td .amount, {{WRAPPER}} .woocommerce-checkout-review-order-table tr.order-total td .amount',
            )
        );

        $this->add_control(
            'order_review_table_totalprice_color',
            [
                'label' => __('Color', 'webt'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .woocommerce-checkout-review-order-table tr.cart-subtotal td .amount' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .woocommerce-checkout-review-order-table tr.order-total td .amount' => 'color: {{VALUE}}',
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

        $settings = $this->get_settings_for_display();    ?>
        <h3 id="order_review_heading"><?php echo $settings['form_heading']; ?></h3>

        <?php do_action('woocommerce_checkout_before_order_review'); ?>

        <div id="order_review" class="woocommerce-checkout-review-order">

            <?php woocommerce_order_review(); ?>

        </div>

<?php do_action('woocommerce_checkout_after_order_review');
    }
}

Plugin::elementor_instance()->widgets_manager->register_widget_type(new Widget_Review_Order_Widget());
