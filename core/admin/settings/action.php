<?php
/**
 * Admin Action Brain
 * 
 * @since 1.0.0
 */

$options = array();

if (isset($_GET['webt_cart_template_id'])) {
    $options['webt_cart_template_id'] = $_GET['webt_cart_template_id'];
}

if (isset($_GET['webt_cart_empty_template_id'])) {
    $options['webt_cart_empty_template_id'] = $_GET['webt_cart_empty_template_id'];
}

if (isset($_GET['webt_checkout_template_id'])) {
    $options['webt_checkout_template_id'] = $_GET['webt_checkout_template_id'];
}

if (isset($_GET['webt_checkout_login_template_id'])) {
    $options['webt_checkout_login_template_id'] = $_GET['webt_checkout_login_template_id'];
}

if (isset($_GET['webt_order_pay_template_id'])) {
    $options['webt_order_pay_template_id'] = $_GET['webt_order_pay_template_id'];
}

if (isset($_GET['webt_add_payment_method_template_id'])) {
    $options['webt_add_payment_method_template_id'] = $_GET['webt_add_payment_method_template_id'];
}

if (isset($_GET['webt_order_received_template_id'])) {
    $options['webt_order_received_template_id'] = $_GET['webt_order_received_template_id'];
}

if (isset($_GET['webt_myaccount_template_id'])) {
    $options['webt_myaccount_template_id'] = $_GET['webt_myaccount_template_id'];
}

if (isset($_GET['webt_myaccount_login_template_id'])) {
    $options['webt_myaccount_login_template_id'] = $_GET['webt_myaccount_login_template_id'];
}

if (isset($_GET['webt_myaccount_register_template_id'])) {
    $options['webt_myaccount_register_template_id'] = $_GET['webt_myaccount_register_template_id'];
}

if (isset($_GET['webt_account_orders_template_id'])) {
    $options['webt_account_orders_template_id'] = $_GET['webt_account_orders_template_id'];
}

if (isset($_GET['webt_account_no_orders_template_id'])) {
    $options['webt_account_no_orders_template_id'] = $_GET['webt_account_no_orders_template_id'];
}

if (isset($_GET['webt_account_view_order_template_id'])) {
    $options['webt_account_view_order_template_id'] = $_GET['webt_account_view_order_template_id'];
}

if (isset($_GET['webt_account_downloads_template_id'])) {
    $options['webt_account_downloads_template_id'] = $_GET['webt_account_downloads_template_id'];
}

if (isset($_GET['webt_account_no_downloads_template_id'])) {
    $options['webt_account_no_downloads_template_id'] = $_GET['webt_account_no_downloads_template_id'];
}

if (isset($_GET['webt_edit_account_template_id'])) {
    $options['webt_edit_account_template_id'] = $_GET['webt_edit_account_template_id'];
}

if (isset($_GET['webt_addresses_template_id'])) {
    $options['webt_addresses_template_id'] = $_GET['webt_addresses_template_id'];
}

if (isset($_GET['webt_payment_methods_template_id'])) {
    $options['webt_payment_methods_template_id'] = $_GET['webt_payment_methods_template_id'];
}

if (isset($_GET['webt_no_payment_methods_template_id'])) {
    $options['webt_no_payment_methods_template_id'] = $_GET['webt_no_payment_methods_template_id'];
}

if (isset($_GET['webt_lost_password_template_id'])) {
    $options['webt_lost_password_template_id'] = $_GET['webt_lost_password_template_id'];
}

if (isset($_GET['webt_lost_password_reset_template_id'])) {
    $options['webt_lost_password_reset_template_id'] = $_GET['webt_lost_password_reset_template_id'];
}

if (isset($_GET['webt_lost_password_confirmation_template_id'])) {
    $options['webt_lost_password_confirmation_template_id'] = $_GET['webt_lost_password_confirmation_template_id'];
}