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


class Widget_Checkout_Coupon_Form extends Widget_Base
{

    /**
     * Get widget name.
     */
    public function get_name()
    {
        return 'sweb-checkout-coupon';
    }

    /**
     * Get widget title.
     */
    public function get_title()
    {
        return esc_html__('Coupon Form', 'webt');
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
		return ['webt', 'woocommerce', 'checkout', 'coupon', 'form'];
	}

    /**
     * Register oEmbed widget controls.
     */
    protected function _register_controls()
    {

        /**
         * Content Section
         */
        $this->start_controls_section(
            'content_section',
            [
                'label' => __('Content', 'webt'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'widget_title',
            [
                'label' => __('Title', 'webt'),
                'type' => Controls_Manager::TEXT,
                'dynamic' => [
                    'active' => true,
                ],
                'placeholder' => __('Enter your title', 'webt'),
                'default' => __('Coupon', 'webt'),
            ]
        );

        $this->add_control(
            'icon',
            [
                'label' => __('Icons', 'webt'),
                'type' => Controls_Manager::ICON,
                'default' => 'fa fa-tag',
            ]
        );

        $this->add_control(
            'button_label',
            [
                'label' => __('Label', 'webt'),
                'type' => Controls_Manager::TEXT,
                'dynamic' => [
                    'active' => true,
                ],
                'placeholder' => __('Enter your title', 'webt'),
                'default' => __('Apply Coupon', 'webt'),
            ]
        );

        $this->end_controls_section();

        /**
         * Style Section
         */
        // Heading
        $this->start_controls_section(
            'coupon_heading_style',
            array(
                'label' => __('Heading', 'webt'),
                'tab' => Controls_Manager::TAB_STYLE,
            )
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            array(
                'name' => 'coupon_heading_typography',
                'label' => __('Typography', 'webt'),
                'selector' => '{{WRAPPER}} .coupon h3.widget-title',
            )
        );
        $this->add_control(
            'coupon_heading_color',
            [
                'label' => __('Color', 'webt'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .coupon h3.widget-title' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_responsive_control(
            'coupon_heading_margin',
            [
                'label' => __('Margin', 'webt'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors' => [
                    '{{WRAPPER}} .coupon h3.widget-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'coupon_heading_align',
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
                    '{{WRAPPER}} .coupon h3.widget-title' => 'text-align: {{VALUE}}',
                ],
            ]
        );

        $this->end_controls_section();

        //Icon
        $this->start_controls_section(
            'coupon_icon_style',
            array(
                'label' => __('Icon', 'webt'),
                'tab' => Controls_Manager::TAB_STYLE,
            )
        );

        $this->add_responsive_control(
            'rotate',
            [
                'label' => __('Icon Rotate', 'webt'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['deg'],
                'default' => [
                    'size' => 90,
                    'unit' => 'deg',
                ],
                'tablet_default' => [
                    'unit' => 'deg',
                ],
                'mobile_default' => [
                    'unit' => 'deg',
                ],
                'selectors' => [
                    '{{WRAPPER}} .coupon > .widget-title > i' => 'transform: rotate({{SIZE}}{{UNIT}});',
                ],
            ]
        );
        $this->add_responsive_control(
            'size',
            [
                'label' => __('Size', 'webt'),
                'type' => Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'min' => 6,
                        'max' => 300,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .coupon > .widget-title > i' => 'font-size: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'coupon_icon_color',
            [
                'label' => __('Color', 'webt'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .coupon > .widget-title > i' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_responsive_control(
            'coupon_icon_padding',
            [
                'label' => __('Padding', 'webt'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .coupon > .widget-title > i' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();

        //  Input
        $this->start_controls_section(
            'coupon_input_style',
            array(
                'label' => __(' Input', 'webt'),
                'tab' => Controls_Manager::TAB_STYLE,
            )
        );

        $this->start_controls_tabs('coupon_input_style_tabs');

        $this->start_controls_tab(
            'coupon_input_style_normal',
            [
                'label' => __('Normal', 'webt'),
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            array(
                'name' => 'coupon_input_typography',
                'label' => __('Typography', 'webt'),
                'selector' => '{{WRAPPER}} .coupon input.input-text',
            )
        );

        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'coupon_input_border',
                'label' => __('Button Border', 'webt'),
                'selector' => '{{WRAPPER}} .coupon input.input-text',
            ]
        );

        $this->add_responsive_control(
            'coupon_input_padding',
            [
                'label' => __('Padding', 'webt'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .coupon input.input-text' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'coupon_input_text_color',
            [
                'label' => __('Text Color', 'webt'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .coupon input.input-text' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'coupon_input_bg_color',
            [
                'label' => __('Background Color', 'webt'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .coupon input.input-text' => 'background-color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'coupon_input_border_radius',
            [
                'label' => __('Border Radius', 'webt'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors' => [
                    '{{WRAPPER}} .coupon input.input-text' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'coupon_input_box_shadow',
                'selector' => '{{WRAPPER}} .coupon input.input-text',
            ]
        );

        $this->end_controls_tab();

        $this->start_controls_tab(
            'coupon_input_style_hover',
            [
                'label' => __('Hover', 'webt'),
            ]
        );

        $this->add_control(
            'coupon_input_hover_text_color',
            [
                'label' => __('Text Color', 'webt'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .coupon input.input-text:hover' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'coupon_input_hover_bg_color',
            [
                'label' => __('Background Color', 'webt'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .coupon input.input-text:hover' => 'background-color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'coupon_input_hover_border_color',
            [
                'label' => __('Border Color', 'webt'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .coupon input.input-text:hover' => 'border-color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'coupon_input_hover_border_radius',
            [
                'label' => __('Border Radius', 'webt'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors' => [
                    '{{WRAPPER}} .coupon input.input-text:hover' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'coupon_input_hover_box_shadow',
                'selector' => '{{WRAPPER}} .coupon input.input-text:hover',
            ]
        );

        $this->end_controls_tab();

        $this->end_controls_tabs();

        $this->end_controls_section();

        //  button
        $this->start_controls_section(
            'coupon_button_style',
            array(
                'label' => __(' Button', 'webt'),
                'tab' => Controls_Manager::TAB_STYLE,
            )
        );

        $this->start_controls_tabs('coupon_button_style_tabs');

        $this->start_controls_tab(
            'coupon_button_style_normal',
            [
                'label' => __('Normal', 'webt'),
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            array(
                'name' => 'coupon_button_typography',
                'label' => __('Typography', 'webt'),
                'selector' => '{{WRAPPER}} .coupon input.is-form.expand',
            )
        );

        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'coupon_button_border',
                'label' => __('Button Border', 'webt'),
                'selector' => '{{WRAPPER}} .coupon input.is-form.expand',
            ]
        );

        $this->add_control(
            'coupon_button_text_color',
            [
                'label' => __('Text Color', 'webt'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .coupon input.is-form.expand' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'coupon_button_bg_color',
            [
                'label' => __('Background Color', 'webt'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .coupon input.is-form.expand' => 'background-color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'coupon_button_border_radius',
            [
                'label' => __('Border Radius', 'webt'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors' => [
                    '{{WRAPPER}} .coupon input.is-form.expand' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'coupon_button_box_shadow',
                'selector' => '{{WRAPPER}} .coupon input.is-form.expand',
            ]
        );

        $this->add_responsive_control(
            'coupon_button_padding',
            [
                'label' => __('Padding', 'webt'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .coupon input.is-form.expand' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'coupon_button_margin',
            [
                'label' => __('Margin', 'webt'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .coupon input.is-form.expand' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'coupon_button_width',
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
                    '{{WRAPPER}} .coupon input.is-form.expand' => 'width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );


        $this->end_controls_tab();

        $this->start_controls_tab(
            'coupon_button_style_hover',
            [
                'label' => __('Hover', 'webt'),
            ]
        );

        $this->add_control(
            'coupon_button_hover_text_color',
            [
                'label' => __('Text Color', 'webt'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .coupon input.is-form.expand:hover' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'coupon_button_hover_bg_color',
            [
                'label' => __('Background Color', 'webt'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .coupon input.is-form.expand:hover' => 'background-color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'coupon_button_hover_border_color',
            [
                'label' => __('Border Color', 'webt'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .coupon input.is-form.expand:hover' => 'border-color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'coupon_button_hover_border_radius',
            [
                'label' => __('Border Radius', 'webt'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors' => [
                    '{{WRAPPER}} .coupon input.is-form.expand:hover' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'coupon_button_hover_box_shadow',
                'selector' => '{{WRAPPER}} .coupon input.is-form.expand:hover',
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

        if (wc_coupons_enabled()) {
            if (!is_checkout()) {
?>
                <form class="checkout_coupon mb-0" method="post">
                    <div class="coupon">
                        <h3 class="widget-title"><?php echo '<i class="' . $settings['icon'] . '" aria-hidden="true"></i>';
                                                    echo $settings['widget_title']; ?></h3>
                        <input type="text" name="coupon_code" class="input-text" id="coupon_code" value="" placeholder="<?php esc_attr_e('Coupon code', 'woocommerce'); ?>" /> <input type="submit" class="is-form expand" name="apply_coupon" value="<?php echo $settings['button_label']; ?>" />
                        <?php do_action('woocommerce_cart_coupon'); ?>
                    </div>
                </form>
            <?php

            } else {
            ?>
                <form></form>
                <div class="woocommerce-form-coupon-toggle checkout widget-title flex-row pb-0 align-top">
                    <span class="flex-col">
                        <?php echo '<i class="' . $settings['icon'] . '" aria-hidden="true"></i>'; ?>
                    </span>
                    <span class="flex-col">
                        <?php wc_print_notice(apply_filters('woocommerce_checkout_coupon_message', __($settings['widget_title'], 'woocommerce') . ' <small><a href="#" class="showcoupon">' . __('Click here', 'woocommerce') . '</a></small>'), 'notice'); ?>
                    </span>
                </div>
                <div class="coupon">
                    <form class="checkout_coupon woocommerce-form-coupon mb-0" method="post" style="display:none">
                        <input type="text" name="coupon_code" class="input-text" id="coupon_code" value="" placeholder="<?php esc_attr_e('Coupon code', 'woocommerce'); ?>" />
                        <input type="submit" class="is-form expand mb-10" name="apply_coupon" value="<?php esc_attr_e($settings['button_label'], 'woocommerce'); ?>" />
                    </form>
                </div>

<?php
            }
        }
    }
}

Plugin::elementor_instance()->widgets_manager->register_widget_type(new Widget_Checkout_Coupon_Form ());
