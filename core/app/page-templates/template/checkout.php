<?php

namespace WEBT\App\PageTemplates;

use WEBT\Plugin;

class Checkout
{    
    /**
     * hooks
     * Woocomerce Checkout page template hooks
     *
     * @return void
     */
    public function hooks()
    {
        add_filter('wc_get_template', [$this, 'checkout_page_template'], 100, 5);
        add_action('webt_woocommerce_checkout_content', [$this, 'the_checkout_content']);
        add_action('webt_woocommerce_checkout_content_form_login', [$this, 'the_checkout_login_content']);

        add_filter('wc_get_template', [$this, 'checkout_endpoints_template'], 10, 5);
        add_action('webt_woocommerce_thankyou_content', [$this, 'the_order_received_content']);
        add_action('webt_woocommerce_order_pay_content', [$this, 'the_order_pay_content']);
    }

    /**
     * checkout_page_template
     *
     * @param  mixed $located
     * @param  mixed $name
     * @param  mixed $args
     * @return void
     * 
     */
    public function checkout_page_template($located, $name, $args)
    {
        $webt_checkout_template_id = get_option('webt_checkout_template_id', '');
        $webt_checkout_login_template_id = get_option('webt_checkout_login_template_id', '');

        if ($name === 'checkout/form-checkout.php') {
            if (!empty($webt_checkout_template_id)) {
                $located = WEBT_TEMPLATE_PATH . 'checkout/form-checkout.php';
            }
            if ($webt_checkout_template_id === $webt_checkout_login_template_id) {
                return $located;
            }
        } elseif ($name === 'checkout/form-login.php') {
            if (!empty($webt_checkout_login_template_id)) {
                $located = WEBT_TEMPLATE_PATH . 'checkout/form-login.php';
            }
        }
        return $located;
    }

    /**
     * Chechout Template
     * the_checkout_content
     *
     * @return void
     */
    public function the_checkout_content()
    {
        $webt_checkout_template_id = get_option('webt_checkout_template_id', '');
        if (!empty($webt_checkout_template_id)) {
            echo Plugin::elementor_instance()->frontend->get_builder_content_for_display($webt_checkout_template_id);
        } else {
            the_content();
        }
    }

    /**
     * Checkout Login
     * the_checkout_login_content
     *
     * @param  mixed $content
     * @return void
     */
    public function the_checkout_login_content($content)
    {
        $webt_checkout_login_template_id = get_option('webt_checkout_login_template_id', '');

        if (!empty($webt_checkout_login_template_id)) {
            echo Plugin::elementor_instance()->frontend->get_builder_content_for_display($webt_checkout_login_template_id);
        } else {
            the_content();
        }
    }

    /**
     * Checkout Endpoints Template
     * checkout_endpoints_template
     *
     * @param  mixed $located
     * @param  mixed $name
     * @param  mixed $args
     * @return void
     */
    public function checkout_endpoints_template($located, $name, $args)
    {
        if ($name === 'checkout/thankyou.php') {
            $webt_order_received_template_id = get_option('webt_order_received_template_id', '');
            if (!empty($webt_order_received_template_id)) {
                $located = WEBT_TEMPLATE_PATH . 'checkout/thankyou.php';
            }
        } elseif ($name === 'checkout/form-pay.php') {
            $webt_order_pay_template_id = get_option('webt_order_pay_template_id', '');
            if (!empty($webt_order_pay_template_id)) {
                $located = WEBT_TEMPLATE_PATH . 'checkout/form-pay.php';
            }
        } 

        return $located;
    }

    /**
     * Order Pay Content
     * the_order_pay_content
     *
     * @param  mixed $content
     * @return void
     */
    public function the_order_pay_content($content)
    {
        $webt_order_pay_template_id = get_option('webt_order_pay_template_id', '');

        if (is_user_logged_in() && !empty($webt_order_pay_template_id)) {
            echo Plugin::elementor_instance()->frontend->get_builder_content_for_display($webt_order_pay_template_id);
        } else {
            the_content();
        }
    }

    /**
     * Order Received Content
     * the_order_received_content
     *
     * @param  mixed $content
     * @return void
     */
    public function the_order_received_content($content)
    {
        $webt_order_received_template_id = get_option('webt_order_received_template_id', '');

        if (!empty($webt_order_received_template_id)) {
            echo Plugin::elementor_instance()->frontend->get_builder_content_for_display($webt_order_received_template_id);
        } else {
            the_content();
        }
    }

}

(new Checkout)->hooks();