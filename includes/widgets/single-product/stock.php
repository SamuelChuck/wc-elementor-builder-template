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

class Widget_Product_Stock extends Base_Widget
{

    /**
     * Get widget name.
     */
    public function get_name()
    {
        return 'webt-single-product-stock';
    }

    /**
     * Get widget title.
     */
    public function get_title()
    {
        return esc_html__('Single Product Stock', 'webt');
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
        return ['webt', 'woocommerce', 'shop', 'store', 'stock', 'product', 'quntity'];
    }

    /**
     * Register oEmbed widget controls.
     */
    protected function _register_controls()
    {

        $this->start_controls_section(
            'section_product_stock_style',
            [
                'label' => __('Style', 'webt-pro'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'wc_style_warning',

            [
                'type' => Controls_Manager::RAW_HTML,
                'raw' => __('The style of this widget is often affected by your theme and plugins. If you experience any such issue, try to switch to a basic theme and deactivate related plugins.', 'webt-pro'),
                'content_classes' => 'elementor-panel-alert elementor-panel-alert-info',
            ]
        );

        $this->add_control(
            'text_color',
            [
                'label' => __('Text Color', 'webt-pro'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '.woocommerce {{WRAPPER}} p.stock' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'text_typography',
                'label' => __('Typography', 'webt-pro'),
                'selector' => '.woocommerce {{WRAPPER}} p.stock',
            ]
        );
    }

    protected function render()
    {
        global $product;
        $product = wc_get_product();
        if (empty($product)) {
            return;
        }
        $stock = wc_get_stock_html($product);

        // Variable product only
        if ($product->is_type('variable')) {

?>
            <style>
                div.woocommerce-variation-availability,
                div.variation-data-stock-fallback {
                    height: 0px !important;
                    pointer-events: none;
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
                            if ($('.variation-data p.stock')) {
                                $('.variation-data p.stock').remove();
                            }
                            $('div.variation-data').append($('div.woocommerce-variation-availability').html());
                        } else {
                            $('div.variation-data').html($('div.variation-data-stock-fallback').html());
                            if ($('p.availability'))
                                $('p.availability').remove();
                        }
                    });
                });
            </script>
<?php
            echo '
                <div class="variation-data">' . $stock . ' </div>	
                <div class="variation-data-stock-fallback"> ' . $stock . ' </div>		
                ';
        } else {

            echo $stock;
        }
    }
}

Plugin::elementor_instance()->widgets_manager->register_widget_type(new Widget_Product_Stock());
