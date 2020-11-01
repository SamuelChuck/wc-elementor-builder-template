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

class Widget_Payment_Form extends Widget_Base
{

    /**
     * Get widget name.
     */
    public function get_name()
    {
        return 'webt-checkout-payment';
    }

    /**
     * Get widget title.
     */
    public function get_title()
    {
        return esc_html__('Checkout Payment', 'webt');
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
        return ['webt-checkout'];
    }

	/**
	 * Search keywords
	 */
	public function get_keywords()
	{
		return ['webt', 'woocommerce', 'checkout', 'pay', 'payment', 'form'];
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
            'payment_form_heading',
            [
                'label' => __('Heading', 'webt'),
                'type' => Controls_Manager::TEXTAREA,
                'dynamic' => [
                    'active' => true,
                ],
                'placeholder' => __('Enter your title', 'webt'),
                'default' => __('Payment Method', 'webt'),
            ]
        );

        $this->end_controls_section();

        // Heading
        $this->start_controls_section(
            'payment_method_form_heading_style',
            array(
                'label' => __('Heading', 'webt'),
                'tab' => Controls_Manager::TAB_STYLE,
            )
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            array(
                'name' => 'payment_method_form_heading_typography',
                'label' => __('Typography', 'webt'),
                'selector' => '{{WRAPPER}} h3.payment-form-heading',
            )
        );

        $this->add_control(
            'payment_method_form_heading_color',
            [
                'label' => __('Color', 'webt'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} h3.payment-form-heading' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_responsive_control(
            'payment_method_form_heading_margin',
            [
                'label' => __('Margin', 'webt'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors' => [
                    '{{WRAPPER}} h3.payment-form-heading' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'payment_method_form_heading_align',
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
                    '{{WRAPPER}} h3.payment-form-heading' => 'text-align: {{VALUE}}',
                ],
            ]
        );

        $this->end_controls_section();

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
                'label' => esc_html__('Border Radius', 'webt'),
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
                'label' => esc_html__('Border Radius', 'webt'),
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
                'label' => __('Place Order Button', 'webt'),
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
                'label' => esc_html__('Border Radius', 'webt'),
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

        $this->end_controls_section();
    }

    /**
     * Render widget output on the frontend.
     */
    protected function render()
    {

        $settings = $this->get_settings_for_display();

        if (!is_ajax()) {
            do_action('woocommerce_review_order_before_payment');
        } ?>

        <h3 class="payment-form-heading"><?php echo $settings['payment_form_heading']; ?></h3>

<?php woocommerce_checkout_payment();

        if (!is_ajax()) {
            do_action('woocommerce_review_order_after_payment');
        }
    }
}

Plugin::elementor_instance()->widgets_manager->register_widget_type(new Widget_Payment_Form ());
