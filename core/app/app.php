<?php

namespace WEBT;

/**
 * WooCommerce Elementor Builder Template setup
 *
 * WEBT
 * @since 1.0.0
 * @package WEBT
 */

use WEBT\Plugin;

if (!defined('ABSPATH')) {
    exit;
}

if (!class_exists('App')) {
    class App
    {
        /**
         * Creates or returns an instance of this class.
         *
         * @static
         * @access public
         * @since 1.0
         */
        public static function instance()
        {
            return Plugin::$instance;
        }


        /**
         * elementor
         *
         * @return \Elementor\Plugin
         */
        public static function elementor()
        {
            return \Elementor\Plugin::$instance;
        }

        /**
         * __construct
         *
         * @return void
         */
        public function __construct()
        {
            if ((new Get)->is_edit_mode() && is_admin()) {
                // Priority = 5, to allow the removal or addtion of wc hooks on init.
                add_action('admin_action_elementor', [$this, 'register_wc_hooks'], 5);
            }
            add_action('init', array($this, 'page_templates'));
            //Register WooCommerce frontend hooks before the Editor init.
            add_action('after_setup_theme', array($this, 'include_template_functions'), 11);
            $this->setup_hooks();
        }

        /**
         * setup_hooks
         *
         * @return void
         */
        private function setup_hooks()
        {
            add_action('elementor/frontend/before_enqueue_scripts', [$this, 'enqueue_frontend_scripts']);
            add_action('wp_enqueue_scripts', array($this, 'enqueue_scripts'), 999999);
        }

        /**
         * init
         *
         * @return void
         */
        public function page_templates()
        {
            require(WEBT_CORE_PATH . 'app/page-templates/template/myaccount.php');
            require(WEBT_CORE_PATH . 'app/page-templates/template/orders.php');
            require(WEBT_CORE_PATH . 'app/page-templates/template/downloads.php');
            require(WEBT_CORE_PATH . 'app/page-templates/template/cart.php');
            require(WEBT_CORE_PATH . 'app/page-templates/template/checkout.php');
            require(WEBT_CORE_PATH . 'app/page-templates/page-template.php');
        }

        /**
         * include_template_functions
         *
         * @return void
         */
        public function include_template_functions()
        {
            //include Woocommerce Template function
            if (class_exists('WooCommerce')) {
                include_once WEBT_CORE_PATH . 'functions/template-functions' . '.php';
            }
        }

        /**
         * Include WC fontend.
         * register_wc_hooks
         *
         * @return void
         */
        public function register_wc_hooks()
        {
            WC()->frontend_includes();
            $has_cart = is_a(WC()->cart, 'WC_Cart');

            if (!$has_cart) {
                $session_class = apply_filters('woocommerce_session_handler', 'WC_Session_Handler');
                WC()->session = new $session_class();
                WC()->session->init();
                WC()->cart = new \WC_Cart();
                WC()->customer = new \WC_Customer(get_current_user_id(), true);
            }
        }

        /**
         * enqueue_frontend_scripts
         *
         * @return void
         */
        public function enqueue_frontend_scripts()
        {
            wp_enqueue_script('woocommerce');
        }

        /**
         * enqueue_scripts
         *
         * @return void
         */
        public function enqueue_scripts()
        {
            wp_enqueue_script('webt', WEBT_ASSETS_URL . 'js/script.js', array('jquery'), WEBT_VERSION, true);
        }
    }
}
(new App);
