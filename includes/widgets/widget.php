<?php

namespace WEBT;

/**
 * Widgets_Registered setup
 *
 * @package WooCommerce-Elementor-widgets
 *
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}


if (!class_exists('Widgets_Registered')) {
    class Widgets_Registered
    {

        /**
         * Include Widgets files
         *
         * Load widgets files
         *
         * @since 1.2.0
         * @access private
         */
        private function include_widgets_files()
        {
            if (class_exists('woocommerce')) {
                /*My Account*/
                require_once(dirname(__FILE__) . '/myaccount/form-login.php');
                require_once(dirname(__FILE__) . '/myaccount/form-register.php');
                require_once(dirname(__FILE__) . '/myaccount/form-edit-account.php');
                require_once(dirname(__FILE__) . '/myaccount/form-edit-address.php');
                require_once(dirname(__FILE__) . '/myaccount/form-lost-password.php');
                require_once(dirname(__FILE__) . '/myaccount/form-reset-password.php');

                require_once(dirname(__FILE__) . '/myaccount/logout.php');
                require_once(dirname(__FILE__) . '/myaccount/dashboard.php');
                require_once(dirname(__FILE__) . '/myaccount/addresses.php');
                require_once(dirname(__FILE__) . '/myaccount/payment-methods.php');
                require_once(dirname(__FILE__) . '/myaccount/lost-password-confirmation.php');

                /*Order*/
                require_once(dirname(__FILE__) . '/order/orders.php');
                require_once(dirname(__FILE__) . '/order/downloads.php');
                require_once(dirname(__FILE__) . '/order/review-order.php');
                require_once(dirname(__FILE__) . '/order/order-details.php');
                require_once(dirname(__FILE__) . '/order/order-received.php');
                require_once(dirname(__FILE__) . '/order/order-customer-details.php');

                /*Checkout*/
                require_once(dirname(__FILE__) . '/checkout/form-pay.php');
                require_once(dirname(__FILE__) . '/checkout/form-login.php');
                require_once(dirname(__FILE__) . '/checkout/form-coupon.php');
                require_once(dirname(__FILE__) . '/checkout/form-additional-note.php');
                require_once(dirname(__FILE__) . '/checkout/form-billing-address.php');
                require_once(dirname(__FILE__) . '/checkout/form-shipping-address.php');

                /*Cart*/
                require_once(dirname(__FILE__) . '/cart/mini-cart.php');
                require_once(dirname(__FILE__) . '/cart/cart-table.php');
                require_once(dirname(__FILE__) . '/cart/cart-total.php');
                require_once(dirname(__FILE__) . '/cart/empty-cart.php');
                require_once(dirname(__FILE__) . '/cart/empty-cart-button.php');


                /*Global*/
                require_once(dirname(__FILE__) . '/global/custom-hook.php');
                require_once(dirname(__FILE__) . '/global/print-notices.php');
                require_once(dirname(__FILE__) . '/global/taxonomy-listing.php');

                /*Single Product*/
                require_once(dirname(__FILE__) . '/single-product/price.php');
                require_once(dirname(__FILE__) . '/single-product/stock.php');
            }
        }


        /**
         * Include & Register Widgets files
         *
         * Load widgets files
         *
         * @since 1.0.0
         * @access private
         */
        public function register_widgets()
        {
            // Its is now safe to include Widgets files
            $this->include_widgets_files();
        }

        /**
         * Register Widgets Categories
         *
         * Register new Elementor widgets categories.
         *
         * @since 1.2.0
         * @access public
         */
        public function widget_categories($widget_categories)
        {
            $widget_categories->add_category(
                'webt-myaccount-form',
                [
                    'title' => esc_html__('WC Account Form', 'webt'),
                    'icon' => 'eicon-woocommerce',
                ]
            );

            $widget_categories->add_category(
                'webt-myaccount',
                [
                    'title' => esc_html__('WC My Account', 'webt'),
                    'icon' => 'eicon-woocommerce',
                ]
            );

            $widget_categories->add_category(
                'webt-checkout',
                [
                    'title' => esc_html__('WC Checkout', 'webt'),
                    'icon' => 'eicon-woocommerce',
                ]
            );

            $widget_categories->add_category(
                'webt-cart',
                [
                    'title' => esc_html__('WC Cart', 'webt'),
                    'icon' => 'eicon-woocommerce',
                ]
            );

            $widget_categories->add_category(
                'webt-global',
                [
                    'title' => esc_html__('WC Global', 'webt'),
                    'icon' => 'eicon-woocommerce',
                ]
            );

            $widget_categories->add_category(
                'webt-single-product',
                [
                    'title' => esc_html__('WC Single Product', 'webt'),
                    'icon' => 'eicon-woocommerce',
                ]
            );
        }

        /**
         *  WooCommerce_Elementor_Builder_Template class constructor
         *
         * Register plugin action hooks and filters
         *
         * @since 1.0.0
         * @access public
         */
        public function run()
        {

            // Register widgets
            add_action('elementor/widgets/widgets_registered', array($this, 'register_widgets'));
            add_action('elementor/elements/categories_registered', array($this, 'widget_categories'));
        }
    }

    (new Widgets_Registered)->run();
}
