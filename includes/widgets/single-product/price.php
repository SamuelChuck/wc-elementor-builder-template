<?php

namespace WEBT;

use ElementorPro\Modules\Woocommerce\Widgets\Base_Widget;
use Elementor\Controls_Manager;
use Elementor\Core\Kits\Documents\Tabs\Global_Colors;
use Elementor\Core\Kits\Documents\Tabs\Global_Typography;
use Elementor\Group_Control_Border;
use Elementor\Group_Control_Typography;

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

class Widget_Product_Price extends Base_Widget
{

    /**
     * Get widget name.
     */
    public function get_name()
    {
        return 'webt-single-product-price';
    }

    /**
     * Get widget title.
     */
    public function get_title()
    {
        return esc_html__('Single Product Price', 'webt');
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
        return ['webt-single-product'];
    }

    /**
     * Search keywords
     */
    public function get_keywords()
    {
        return ['webt', 'woocommerce', 'shop', 'store', 'price', 'product', 'sale'];
    }

    /**
     * Register oEmbed widget controls.
     */
    protected function _register_controls()
    {
        $this->start_controls_section(
            'label_section',
            [
                'label' => __('You Save Title', 'webt'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'you_save_title',
            [
                'label' => __('You Save Title', 'webt'),
                'type' => Controls_Manager::TEXT,
                'dynamic' => [
                    'active' => true,
                ],
                'placeholder' => __('You save title', 'webt'),
                'default' => __('you save', 'webt'),
            ]
        );
        $this->add_control(
            'you_save_title_after',
            [
                'label' => __('You Save Title After', 'webt'),
                'type' => Controls_Manager::TEXT,
                'dynamic' => [
                    'active' => true,
                ],
                'placeholder' => __('You save title', 'webt'),
                'default' => __('% now', 'webt'),
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'section_price_style',
            [
                'label' => __('Price', 'webt'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'wc_style_warning',
            [
                'type' => Controls_Manager::RAW_HTML,
                'raw' => __('The style of this widget is often affected by your theme and plugins. If you experience any such issue, try to switch to a basic theme and deactivate related plugins.', 'webt'),
                'content_classes' => 'elementor-panel-alert elementor-panel-alert-info',
            ]
        );

        $this->add_responsive_control(
            'text_align',
            [
                'label' => __('Alignment', 'webt'),
                'type' => Controls_Manager::CHOOSE,
                'options' => [
                    'left' => [
                        'title' => __('Left', 'webt'),
                        'icon' => 'eicon-text-align-left',
                    ],
                    'center' => [
                        'title' => __('Center', 'webt'),
                        'icon' => 'eicon-text-align-center',
                    ],
                    'right' => [
                        'title' => __('Right', 'webt'),
                        'icon' => 'eicon-text-align-right',
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}}' => 'text-align: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'price_color',
            [
                'label' => __('Color', 'webt'),
                'type' => Controls_Manager::COLOR,
                'global' => [
                    'default' => Global_Colors::COLOR_PRIMARY,
                ],
                'selectors' => [
                    '.woocommerce {{WRAPPER}} .price' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'typography',
                'global' => [
                    'default' => Global_Typography::TYPOGRAPHY_PRIMARY,
                ],
                'selector' => '.woocommerce {{WRAPPER}} .price',
            ]
        );

        $this->add_control(
            'sale_heading',
            [
                'label' => __('Sale Price', 'webt'),
                'type' => Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'sale_price_color',
            [
                'label' => __('Color', 'webt'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '.woocommerce {{WRAPPER}} .price ins, .woocommerce {{WRAPPER}} .price ins span.amount' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'sale_price_typography',
                'selector' => '.woocommerce {{WRAPPER}} .price ins',
            ]
        );

        $this->add_responsive_control(
            'sale_price_spacing',
            [
                'label' => __('Spacing', 'webt'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px', 'em'],
                'range' => [
                    'em' => [
                        'min' => 0,
                        'max' => 5,
                        'step' => 0.1,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} p.price inc' => 'margin-right: {{SIZE}}{{UNIT}}',
                ],
            ]
        );

        $this->add_control(
            'regular_price_heading',
            [
                'label' => __('Regular Price', 'webt'),
                'type' => Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'regular_price_color',
            [
                'label' => __('Color', 'webt'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '.woocommerce {{WRAPPER}} .price del, .woocommerce {{WRAPPER}} .price del span.amount' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'regular_price_typography',
                'selector' => '.woocommerce {{WRAPPER}} .price del',
            ]
        );
        $this->end_controls_section();

        $this->start_controls_section(
            'you_save_heading',
            [
                'label' => __('You Save', 'webt'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'webt_style_warning',
            [
                'type' => Controls_Manager::RAW_HTML,
                'raw' => __('\'You Save Calculator\' is only visible on the product page when viewing a product On Sale.', 'webt'),
                'content_classes' => 'elementor-panel-alert elementor-panel-alert-info',
            ]
        );
        $this->add_control(
            'you_save_color',
            [
                'label' => __('Color', 'webt'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '.woocommerce {{WRAPPER}} span.variation-data-discount' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'you_save_background_color',
            [
                'label' => __('Background Color', 'webt'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '.woocommerce {{WRAPPER}} span.variation-data-discount' => 'background-color: {{VALUE}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'you_save_typography',
                'selector' => '.woocommerce {{WRAPPER}} span.variation-data-discount',
            ]
        );
        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'you_save_border',
                'selector' => '.woocommerce {{WRAPPER}} span.variation-data-discount',
            ]
        );
        $this->add_control(
            'you_save_border_radius',
            [
                'label' => esc_html__('Border Radius', 'webt'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors' => [
                    '.woocommerce {{WRAPPER}} span.variation-data-discount' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'you_save_margin',
            [
                'label' => esc_html__('Margin', 'elementor'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em'],
                'selectors' => [
                    '{{WRAPPER}} span.variation-data-discount' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'you_save_padding',
            [
                'label' => esc_html__('Padding', 'elementor'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em'],
                'selectors' => [
                    '{{WRAPPER}} span.variation-data-discount' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_section();
    }

    protected function render()
    {
        global $product;
        $product = wc_get_product();
        $settings = $this->get_settings_for_display();

        if (empty($product)) {
            return;
        }

        // Variable product only
        if ($product->is_type('variable')) {

            $price = $product->get_price_html();
            $sale_price = '';
            $regular_price = '';

            //Regular Price
            if ($product->get_variation_regular_price('min', true) !== $product->get_variation_regular_price('max', true)) {
                $regular_price = wc_price($product->get_variation_regular_price('min', true)) . ' – ' . $product->get_variation_regular_price('max', true);
            } else {
                $regular_price = wc_price($product->get_variation_regular_price());
            }

            //Sale Price
            if ($product->get_variation_sale_price('min', true) !== $product->get_variation_sale_price('max', true)) {
                $sale_price = wc_price($product->get_variation_sale_price('min', true)) . ' – ' . $product->get_variation_sale_price('max', true);
            } else {
                $sale_price = wc_price($product->get_variation_sale_price());
            }

            if ($product->is_on_sale()) {
                $price = '<ins>' . $sale_price . $product->get_price_suffix() . '</ins> <del>' . $regular_price . $product->get_price_suffix() . '</del> ';
            }
            // echo $percentage = round( ( $product->get_variation_regular_price('min', true)- $product->get_variation_sale_price('min', true) ) / $product->get_variation_regular_price('min', true) * 100 ).'%';

?>
            <style>
                div.variation-price,
                div.variation-data-price-fallback {
                    height: 0px !important;
                    overflow: hidden;
                    position: relative;
                    color: transparent !important;
                    line-height: 0 !important;
                    font-size: 0 !important;
                    left: -99999999999999%;
                    line-height: 0px !important;
                    font-size: 0% !important;
                    display: none;
                    visibility: hidden !important;
                }
            </style>
            <script>
                jQuery(document).ready(function($) {

                    $('input.variation_id').change(function() {

                        if (0 < $('input.variation_id').val() && null != $('input.variation_id').val()) {
                            $('p.price').html($('div.woocommerce-variation-price > span.price').html())

                        } else {
                            $('p.price').html($('div.variation-data-price-fallback').html());

                        }
                        if ('' != $('input.variation_id').val()) {

                            var var_id = $('input.variation_id').val(); // Your selected variation id
                            var ajaxurl = '<?php echo admin_url('admin-ajax.php', 'relative'); ?>'
                            $.ajax({
                                url: ajaxurl,
                                data: {
                                    'action': 'webt_single_product_calc_amount_saved',
                                    'vari_id': var_id
                                },
                                success: function(data) {
                                    $('span.variation-data-discount').remove();

                                    if (data > 0) {
                                        $('p.price').append('<span class="variation-data-discount">' + '<?php echo $settings['you_save_title'] ?>' + data + '<?php echo $settings['you_save_title_after'] ?>' + '</span>');
                                    }
                                },
                                error: function(errorThrown) {
                                        console.log(errorThrown);
                                }
                            });
                        }
                    });
                });
            </script>

        <?php

            echo '
                <p class="price">' . $price . '</p>
                <div class="variation-data-price-fallback">' . $price . '</div>
                ';
        } else {
        ?>
            <p class="<?php echo esc_attr(apply_filters('woocommerce_product_price_class', 'price')); ?>"><?php echo $product->get_price_html(); ?> <span class="variation-data-discount"><?php echo $settings['you_save_title']; echo webt_single_product_calc_amount_saved(); echo $settings['you_save_title_after']; ?></span></p>
<?php
        }
    }

    public function render_plain_content()
    {
    }
}

Plugin::elementor_instance()->widgets_manager->register_widget_type(new Widget_Product_Price());
