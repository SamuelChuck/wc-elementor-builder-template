<?php
/**
 * 
 * @package woocommerce=elementor-builder-template
 */

if (self::TAXONOMY_SLUG === $column_name) {

    $document = array();

    $post_id = absint($post_id);

    if (!$post_id || !get_post($post_id)) {
        return false;
    }

    if (!isset($document[$post_id])) {

        if (wp_is_post_autosave($post_id)) {
            $post_type = get_post_type(wp_get_post_parent_id($post_id));
        } else {
            $post_type = get_post_type($post_id);
        }

        $doc_type = 'post';

        if (isset($this->cpt[$post_type])) {
            $doc_type = $this->cpt[$post_type];
        }

        $meta_type = get_post_meta($post_id, self::META_KEY, true);

        if ($meta_type && isset($this->types[$meta_type])) {
            $doc_type = $meta_type;
        }

        $doc_type_class = $this->get_type($doc_type);
        $document[$post_id] = $post_id;
    }

    if ($document && $meta_type) {
        $this->print_admin_column_type($meta_type);
    }
}

if ('instances' === $column_name) {

    $document = array();

    $post_id = absint($post_id);

    if (!$post_id || !get_post($post_id)) {
        return false;
    }

    if (!isset($document[$post_id])) {

        if (wp_is_post_autosave($post_id)) {
            $post_type = get_post_type(wp_get_post_parent_id($post_id));
        } else {
            $post_type = get_post_type($post_id);
        }

        $doc_type = 'post';

        if (isset($this->cpt[$post_type])) {
            $doc_type = $this->cpt[$post_type];
        }

        $meta_type = get_post_meta($post_id, self::META_KEY, true);

        if ($meta_type && isset($this->types[$meta_type])) {
            $doc_type = $meta_type;
        }

        $doc_type_class = $this->get_type($doc_type);
        $document[$post_id] = $post_id;
    }

    $instance = esc_html__('None', 'webt');

    if ($document && $meta_type) {
        switch ($meta_type) {

            case 'cart':
                $webt_cart_template_id = get_option('webt_cart_template_id', '');
                $webt_cart_empty_template_id = get_option('webt_cart_empty_template_id', '');

                if ($webt_cart_template_id == $post_id) 
                    $instance = esc_html__('Cart', 'woocommerce');
                if ($webt_cart_empty_template_id == $post_id) 
                    $instance = esc_html__('Empty Cart', 'woocommerce');
                
                break;

            case 'checkout':
                $webt_checkout_template_id = get_option('webt_checkout_template_id', '');
                $webt_checkout_login_template_id = get_option('webt_checkout_login_template_id', '');
                $webt_order_pay_template_id = get_option('webt_order_pay_template_id', '');
                $webt_order_received_template_id = get_option('webt_order_received_template_id', '');

                if ($webt_checkout_template_id == $post_id) 
                    $instance = esc_html__('Checkout', 'woocommerce');
                if ($webt_checkout_login_template_id == $post_id) 
                    $instance = esc_html__('Checkout Login', 'woocommerce');
                if ($webt_order_pay_template_id == $post_id) 
                    $instance = esc_html__('Order Pay', 'woocommerce');
                if ($webt_order_received_template_id == $post_id) 
                    $instance = esc_html__('Order Received', 'woocommerce');

                break;

            case 'my-account':
                $webt_myaccount_login_template_id = get_option('webt_myaccount_login_template_id', '');
                $webt_myaccount_template_id = get_option('webt_myaccount_template_id', '');
                $webt_myaccount_register_template_id = get_option('webt_myaccount_register_template_id', '');
                $webt_edit_account_template_id = get_option('webt_edit_account_template_id', '');
                $webt_addresses_template_id = get_option('webt_addresses_template_id', '');
                $webt_lost_password_template_id = get_option('webt_lost_password_template_id', '');
                $webt_lost_password_reset_template_id = get_option('webt_lost_password_reset_template_id', '');
                $webt_lost_password_confirmation_template_id = get_option('webt_lost_password_confirmation_template_id', '');

                if ($webt_myaccount_template_id == $post_id)
                    $instance = esc_html__('My Account', 'woocommerce');
                if ($webt_myaccount_login_template_id == $post_id)
                    $instance = esc_html__('My Account Login', 'webt');
                if ($webt_myaccount_register_template_id == $post_id)
                    $instance = esc_html__('My Account Register', 'webt');
                if ($webt_edit_account_template_id == $post_id)
                    $instance = esc_html__('Edit Account', 'webt');
                if ($webt_addresses_template_id == $post_id)
                    $instance = esc_html__('Addresses', 'webt');
                if ($webt_lost_password_template_id == $post_id)
                    $instance = esc_html__('Lost Password', 'webt');
                if ($webt_lost_password_reset_template_id == $post_id)
                    $instance = esc_html__('Password Reset', 'webt');
                if ($webt_lost_password_confirmation_template_id == $post_id)
                    $instance = esc_html__('Lost Password Confirmation', 'webt');
                

                break;

            case 'orders':
                $webt_account_view_order_template_id = get_option('webt_account_view_order_template_id', '');
                $webt_account_orders_template_id = get_option('webt_account_orders_template_id', '');
                $webt_account_no_orders_template_id = get_option('webt_account_no_orders_template_id', '');

                if ($webt_account_orders_template_id == $post_id)
                    $instance = esc_html__('My Account order', 'woocommerce');
                if ($webt_account_no_orders_template_id == $post_id)
                    $instance = esc_html__('My Account no order', 'woocommerce');
                if ($webt_account_view_order_template_id == $post_id)
                    $instance = esc_html__('View Order', 'woocommerce');
                
                break;

            case 'downloads':
                $webt_account_no_downloads_template_id = get_option('webt_account_no_downloads_template_id', '');
                $webt_account_downloads_template_id = get_option('webt_account_downloads_template_id', '');
                
                if ($webt_account_downloads_template_id == $post_id) 
                    $instance = esc_html__('My Account Download', 'woocommerce');
                if ($webt_account_no_downloads_template_id == $post_id) 
                    $instance = esc_html__('My Account no Download', 'woocommerce');

                break;

            case 'payment-method':
                $webt_no_payment_methods_template_id = get_option('webt_no_payment_methods_template_id', '');
                $webt_add_payment_method_template_id = get_option('webt_add_payment_method_template_id', '');
                $webt_payment_methods_template_id = get_option('webt_payment_methods_template_id', '');

                if ($webt_payment_methods_template_id == $post_id)
                    $instance = esc_html__('Payment Method', 'webt');
                if ($webt_no_payment_methods_template_id == $post_id)
                    $instance = esc_html__('No Payment Method', 'webt');
                if ($webt_add_payment_method_template_id == $post_id)
                    $instance = esc_html__('Add Payment Method', 'woocommerce');

                break;

            default:
                break;
        }

        $this->print_admin_column_instance($instance);
    } else {
        $this->print_admin_column_instance($instance);
    }
}