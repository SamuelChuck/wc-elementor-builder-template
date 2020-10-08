<?php

namespace WEBT\App\PageTemplate;

use WEBT\Plugin;

class Cart
{    
    /**
     * hooks
     * Woocomerce Cart template hooks
     *
     * @return void
     */
    public function hooks()
    {
        add_filter('wc_get_template', [$this, 'cart_page_template'], 100, 5);
        add_action('webt_woocommerce_cart_content', [$this, 'the_cart_content']);
        add_action('webt_woocommerce_cart_empty_content', [$this, 'the_cart_empty_content']);
    }
    
    /**
     * cart_page_template
     *
     * @param  mixed $located
     * @param  mixed $name
     * @param  mixed $args
     * @return void
     */
    public function cart_page_template($located, $name, $args)
    {
        if ($name === 'cart/cart.php') {
            $cart_template_id = get_option('webt_cart_template_id', '');
            if (!empty($cart_template_id)) {
                $located = WEBT_TEMPLATE_PATH . 'cart' . '/' . 'content-cart' . '.php';
            }
        }
        if ($name === 'cart/cart-empty.php') {
            $cart_empty_template_id = get_option('webt_cart_empty_template_id', '');
            if (!empty($cart_empty_template_id)) {
                $located = WEBT_TEMPLATE_PATH . 'cart' . '/' . 'cart-empty' . '.php';
            }
        }
        return $located;
    }

    /**
     * the_cart_content
     *
     * @return void
     */
    public function the_cart_content()
    {
        $webt_cart_template_id = get_option('webt_cart_template_id', '');
        if (!empty($webt_cart_template_id)) {
            echo Plugin::elementor_instance()->frontend->get_builder_content_for_display($webt_cart_template_id);
        }
    }

    /**
     * the_cart_empty_content
     *
     * @return void
     */
    public function the_cart_empty_content()
    {
        $webt_cart_empty_template_id = get_option('webt_cart_empty_template_id', '');
        if (!empty($webt_cart_empty_template_id)) {
            echo Plugin::elementor_instance()->frontend->get_builder_content_for_display($webt_cart_empty_template_id);
        }
    }
}
(new Cart)->hooks();