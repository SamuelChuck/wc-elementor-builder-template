<?php

namespace WEBT\App\PageTemplates;

use WEBT\Plugin;

class Orders
{
    /**
     * hooks
     * Woocomerce MyAccount Orders template hooks
     *
     * @return void
     */
    public function hooks()
    {
        add_filter('wc_get_template', [$this, 'myaccount_orders_endpoint_template'], 100, 5);
        add_action('webt_woocommerce_account_orders_content', [$this, 'the_account_orders_content']);
        add_action('webt_woocommerce_account_no_orders_content', [$this, 'the_account_no_orders_content']);
        add_action('webt_woocommerce_account_view_order_content', [$this, 'the_account_view_order_content']);
    }

    /**
     * myaccount_orders_endpoint_template
     * Woocommwece MyAccount Orders endpoint template replace
     * 
     * @param  mixed $located
     * @param  mixed $name
     * @param  mixed $args
     * @return void
     */
    public function myaccount_orders_endpoint_template($located, $name, $args)
    {
        $webt_account_orders_template_id = get_option('webt_account_orders_template_id', '');
        $webt_account_no_orders_template_id = get_option('webt_account_no_orders_template_id', '');
        $webt_account_view_order_template_id = get_option('webt_account_view_order_template_id', '');

        if ($name === 'myaccount/orders.php') {
            if (!empty($webt_account_orders_template_id) || !empty($webt_account_no_orders_template_id)) {
                $located = WEBT_TEMPLATE_PATH . 'myaccount/orders.php';
            }
            if ($webt_account_orders_template_id === $webt_account_no_orders_template_id) {
                return $located;
            }
        } elseif ($name === 'myaccount/view-order.php') {
            if (!empty($webt_account_view_order_template_id)) {
                $located = WEBT_TEMPLATE_PATH . 'myaccount/view-order.php';
            }
        }

        return $located;
    }

    /**
     * My Orders Content
     * the_account_orders_content
     *
     * @param  mixed $content
     * @return void
     */
    public function the_account_orders_content($content)
    {
        $webt_account_orders_template_id = get_option('webt_account_orders_template_id', '');

        if (is_user_logged_in() && !empty($webt_account_orders_template_id)) {
            echo Plugin::elementor_instance()->frontend->get_builder_content_for_display($webt_account_orders_template_id);
        } else {
            the_content();
        }
    }
    /**
     * No Orders
     * the_account_no_orders_content
     *
     * @param  mixed $content
     * @return void
     */
    public function the_account_no_orders_content($content)
    {
        $webt_account_no_orders_template_id = get_option('webt_account_no_orders_template_id', '');

        if (is_user_logged_in() && !empty($webt_account_no_orders_template_id)) {
            echo Plugin::elementor_instance()->frontend->get_builder_content_for_display($webt_account_no_orders_template_id);
        } else {
            the_content();
        }
    }

    /**
     * Order View
     * the_account_view_order_content
     *
     * @param  mixed $content
     * @return void
     */
    public function the_account_view_order_content($content)
    {
        $webt_account_view_order_template_id = get_option('webt_account_view_order_template_id', '');

        if (!empty($webt_account_view_order_template_id)) {
            echo Plugin::elementor_instance()->frontend->get_builder_content_for_display($webt_account_view_order_template_id);
        } else {
            the_content();
        }
    }
}
(new Orders)->hooks();