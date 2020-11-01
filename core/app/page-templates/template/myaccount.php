<?php

use WEBT\Plugin;

class MyAccount
{
    /**
     * hooks
     *
     * @return void
     */
    public function hooks()
    {
        add_filter('wc_get_template', [$this, 'myaccount_page_template'], 100, 5);
        if (!empty(get_option('webt_myaccount_template_id', ''))) {
            remove_action('woocommerce_account_content', 'woocommerce_account_content', 10);
            add_action('woocommerce_account_content', [$this, 'the_account_content']);
        }
        add_action('webt_woocommerce_account_content_form_login', [$this, 'the_account_login_content']);
        add_action('webt_woocommerce_account_content_form_register', [$this, 'the_account_register_content']);

        add_action('webt_woocommerce_edit_account_content', [$this, 'the_edit_account_content']);
        add_action('webt_woocommerce_edit_address_content', [$this, 'the_edit_address_content']);
        add_action('webt_woocommerce_addresses_content', [$this, 'the_addresses_content']);
        add_action('webt_woocommerce_payment_methods_content', [$this, 'the_payment_methods_content']);
        add_action('webt_woocommerce_no_payment_methods_content', [$this, 'the_no_payment_methods_content']);
        add_action('webt_woocommerce_add_payment_method_content', [$this, 'the_add_payment_method_content']);

        add_action('webt_woocommerce_lost_password_content', [$this, 'the_lost_password_content']);
        add_action('webt_woocommerce_lost_password_reset_content', [$this, 'the_lost_password_reset_content']);
        add_action('webt_woocommerce_lost_password_confirmation_content', [$this, 'the_lost_password_confirmation_content']);
    }

    /**
     * My Account
     * myaccount_page_template
     *
     * @param  mixed $located
     * @param  mixed $name
     * @param  mixed $args
     * @return void
     */
    public function myaccount_page_template($located, $name, $args)
    {
        $webt_myaccount_template_id = get_option('webt_myaccount_template_id', '');
        $webt_addresses_template_id = get_option('webt_addresses_template_id', '');
        $webt_edit_address_template_id = get_option('webt_edit_address_template_id', '');
        $webt_edit_account_template_id = get_option('webt_edit_account_template_id', '');
        $webt_lost_password_template_id = get_option('webt_lost_password_template_id', '');
        $webt_payment_methods_template_id = get_option('webt_payment_methods_template_id', '');
        $webt_myaccount_login_template_id = get_option('webt_myaccount_login_template_id', '');
        $webt_add_payment_method_template_id = get_option('webt_add_payment_method_template_id', '');
        $webt_no_payment_methods_template_id = get_option('webt_no_payment_methods_template_id', '');
        $webt_myaccount_register_template_id = get_option('webt_myaccount_register_template_id', '');
        $webt_lost_password_reset_template_id = get_option('webt_lost_password_reset_template_id', '');
        $webt_lost_password_confirmation_template_id = get_option('webt_lost_password_confirmation_template_id', '');

        if ($name === 'myaccount/my-account.php') {
            if (!empty($webt_myaccount_template_id)) {
                $located = WEBT_TEMPLATE_PATH . 'myaccount/my-account.php';
            }
            if ($webt_myaccount_template_id === $webt_myaccount_login_template_id) {
                return $located;
            }
        } elseif ($name === 'myaccount/form-login.php') {
            if (!empty($webt_myaccount_login_template_id)) {
                $located = WEBT_TEMPLATE_PATH . 'myaccount/form-login.php';
            }
        } elseif ($name === 'myaccount/form-register.php') {
            if (!empty($webt_myaccount_register_template_id)) {
                $located = WEBT_TEMPLATE_PATH . 'myaccount/form-register.php';
            }
        } elseif ($name === 'myaccount/form-edit-account.php') {
            if (!empty($webt_edit_account_template_id)) {
                $located = WEBT_TEMPLATE_PATH . 'myaccount/form-edit-account.php';
            }
        } elseif ($name === 'myaccount/my-address.php') {
            if (!empty($webt_addresses_template_id)) {
                $located = WEBT_TEMPLATE_PATH . 'myaccount/my-address.php';
            }
        } elseif ($name === 'myaccount/form-edit-address.php') {
            if (!empty($webt_edit_address_template_id)) {
                $located = WEBT_TEMPLATE_PATH . 'myaccount/form-edit-address.php';
            }
        } elseif ($name === 'myaccount/payment-methods.php') {
            if (!empty($webt_payment_methods_template_id || $webt_no_payment_methods_template_id)) {
                $located = WEBT_TEMPLATE_PATH . 'myaccount/payment-methods.php';
            }
            if ($webt_payment_methods_template_id === $webt_no_payment_methods_template_id) {
                return $located;
            }
        } elseif ($name === 'myaccount/form-add-payment-method.php') {
            if (!empty($webt_add_payment_method_template_id)) {
                $located = WEBT_TEMPLATE_PATH . 'myaccount/form-add-payment-method.php';
            }
        } elseif ($name === 'myaccount/form-lost-password.php') {
            if (!empty($webt_lost_password_template_id)) {
                $located = WEBT_TEMPLATE_PATH . 'myaccount/form-lost-password.php';
            }
        } elseif ($name === 'myaccount/form-reset-password.php') {
            if (!empty($webt_lost_password_reset_template_id)) {
                $located = WEBT_TEMPLATE_PATH . 'myaccount/form-reset-password.php';
            }
        } elseif ($name === 'myaccount/lost-password-confirmation.php') {
            if (!empty($webt_lost_password_confirmation_template_id)) {
                $located = WEBT_TEMPLATE_PATH . 'myaccount/lost-password-confirmation.php';
            }
        }

        return $located;
    }

    /**
     * My Account Countent
     * the_account_content
     *
     * @param  mixed $content
     * @return void
     */
    public function the_account_content($content)
    {
        global $wp;
        $webt_myaccount_template_id = get_option('webt_myaccount_template_id', '');

        if (!empty($wp->query_vars)) {
            foreach ($wp->query_vars as $key => $value) {
                // Ignore pagename param.
                if ('pagename' === $key) {
                    continue;
                }

                if (has_action('woocommerce_account_' . $key . '_endpoint')) {
                    do_action('woocommerce_account_' . $key . '_endpoint', $value);
                    return;
                }
            }
        }

        if ( /*is_user_logged_in() &&*/!empty($webt_myaccount_template_id)) {
            echo Plugin::elementor_instance()->frontend->get_builder_content_for_display($webt_myaccount_template_id);
        } else {
            the_content();
        }
    }

    /**
     * My Account Login
     * the_account_login_content
     *
     * @param  mixed $content
     * @return void
     */
    public function the_account_login_content($content)
    {
        $webt_myaccount_login_template_id = get_option('webt_myaccount_login_template_id', '');

        if (!empty($webt_myaccount_login_template_id)) {
            echo Plugin::elementor_instance()->frontend->get_builder_content_for_display($webt_myaccount_login_template_id);
        } else {
            the_content();
        }
    }

    /**
     * My Account Register
     * the_account_register_content
     *
     * @param  mixed $content
     * @return void
     */
    public function the_account_register_content($content)
    {
        $webt_myaccount_register_template_id = get_option('webt_myaccount_register_template_id', '');

        if (!empty($webt_myaccount_register_template_id)) {
            echo Plugin::elementor_instance()->frontend->get_builder_content_for_display($webt_myaccount_register_template_id);
        } else {
            the_content();
        }
    }

    /**
     * My Account Edit Account
     * the_edit_account_content
     *
     * @param  mixed $content
     * @return void
     */
    public function the_edit_account_content($content)
    {
        $webt_edit_account_template_id = get_option('webt_edit_account_template_id', '');

        if (!empty($webt_edit_account_template_id)) {
            echo Plugin::elementor_instance()->frontend->get_builder_content_for_display($webt_edit_account_template_id);
        } else {
            the_content();
        }
    }

    /**
     * My Account Addresses
     * the_addresses_content
     *
     * @param  mixed $content
     * @return void
     */
    public function the_addresses_content($content)
    {
        $webt_addresses_template_id = get_option('webt_addresses_template_id', '');

        if (!empty($webt_addresses_template_id)) {
            echo Plugin::elementor_instance()->frontend->get_builder_content_for_display($webt_addresses_template_id);
        } else {
            the_content();
        }
    }

    /**
     * My Account Edit Address
     * the_edit_address_content
     *
     * @param  mixed $content
     * @return void
     */
    public function the_edit_address_content($content)
    {
        $webt_edit_address_template_id = get_option('webt_edit_address_template_id', '');

        if (!empty($webt_edit_address_template_id)) {
            echo Plugin::elementor_instance()->frontend->get_builder_content_for_display($webt_edit_address_template_id);
        } else {
            the_content();
        }
    }

    /**
     * My Account Payment
     * the_payment_methods_content
     *
     * @param  mixed $content
     * @return void
     */
    public function the_payment_methods_content($content)
    {
        $webt_payment_methods_template_id = get_option('webt_payment_methods_template_id', '');

        if (!empty($webt_payment_methods_template_id)) {
            echo Plugin::elementor_instance()->frontend->get_builder_content_for_display($webt_payment_methods_template_id);
        } else {
            the_content();
        }
    }

    /**
     * My Account No Payment
     * the_no_payment_methods_content
     *
     * @param  mixed $content
     * @return void
     */
    public function the_no_payment_methods_content($content)
    {
        $webt_no_payment_methods_template_id = get_option('webt_no_payment_methods_template_id', '');

        if (!empty($webt_no_payment_methods_template_id)) {
            echo Plugin::elementor_instance()->frontend->get_builder_content_for_display($webt_no_payment_methods_template_id);
        } else {
            the_content();
        }
    }

    /**
     * Add Payment Method Content
     * the_add_payment_method_content
     *
     * @param  mixed $content
     * @return void
     */
    public function the_add_payment_method_content($content)
    {
        $webt_add_payment_method_template_id = get_option('webt_add_payment_method_template_id', '');

        if (is_user_logged_in() && !empty($webt_add_payment_method_template_id)) {
            echo Plugin::elementor_instance()->frontend->get_builder_content_for_display($webt_add_payment_method_template_id);
        } else {
            the_content();
        }
    }

    /**
     * My Account Lost Password
     * the_lost_password_content
     *
     * @param  mixed $content
     * @return void
     */
    public function the_lost_password_content($content)
    {
        $webt_lost_password_template_id = get_option('webt_lost_password_template_id', '');

        if (!empty($webt_lost_password_template_id)) {
            echo Plugin::elementor_instance()->frontend->get_builder_content_for_display($webt_lost_password_template_id);
        } else {
            the_content();
        }
    }

    /**
     * My Account Password Reset
     * the_lost_password_reset_content
     *
     * @param  mixed $content
     * @return void
     */
    public function the_lost_password_reset_content($content)
    {
        $webt_lost_password_reset_template_id = get_option('webt_lost_password_reset_template_id', '');

        if (!empty($webt_lost_password_reset_template_id)) {
            echo Plugin::elementor_instance()->frontend->get_builder_content_for_display($webt_lost_password_reset_template_id);
        } else {
            the_content();
        }
    }

    /**
     * My Account Lost Password Confirmation
     * the_lost_password_confirmation_content
     *
     * @param  mixed $content
     * @return void
     */
    public function the_lost_password_confirmation_content($content)
    {
        $webt_lost_password_confirmation_template_id = get_option('webt_lost_password_confirmation_template_id', '');

        if (!empty($webt_lost_password_confirmation_template_id)) {
            echo Plugin::elementor_instance()->frontend->get_builder_content_for_display($webt_lost_password_confirmation_template_id);
        } else {
            the_content();
        }
    }
}
(new MyAccount)->hooks();
