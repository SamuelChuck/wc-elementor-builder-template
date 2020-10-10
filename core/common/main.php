<?php

use WEBT\TemplateLibrary\Source_Local;

/**
 * last_order_id
 *
 * @return void
 */
function webt_last_order_id()
{
	global $wpdb;
	$statuses = array_keys(wc_get_order_statuses());
	$statuses = implode("','", $statuses);

	// Getting last Order ID (max value)
	$results = $wpdb->get_col(" SELECT MAX(ID) FROM {$wpdb->prefix}posts WHERE post_type LIKE 'shop_order' AND post_status IN ('$statuses') ");
	return reset($results);
}

/**
 * returns true if is edit mode or wp defult edit mode
 * is_edit_mode
 *
 * @return bool
 */
function webt_is_edit_mode()
{
	$action_edit = strpos($_SERVER['REQUEST_URI'], 'action=edit');
	$post_post = strpos($_SERVER['REQUEST_URI'], 'post.php?post=');
	$action_elementor = strpos($_SERVER['REQUEST_URI'], 'action=elementor');

	if ((($action_elementor !== false) && ($post_post !== false)) || (($action_edit !== false) && ($post_post !== false))) {
		return true;
	}
	return false;
}

/**
 * returs true if wordpress defult preview mode or elementor priver mode
 * is_preview_mode
 *
 * @return bool
 */
function webt_is_preview_mode()
{
	$preview_id = strpos($_SERVER['REQUEST_URI'], 'preview_id');
	$preview_nonce = strpos($_SERVER['REQUEST_URI'], 'preview_nonce');
	$preview_true = strpos($_SERVER['REQUEST_URI'], 'preview=true');

	if (($preview_true !== false) || ($preview_id !== false) && ($preview_nonce !== false)) {
		echo $preview_true;
		return true;
	}
	return false;
}

/**
 * is_current_screen
 *
 * @param mixed $pagenow
 * @param mixed $typenow
 * @return POST_TYPE
 */
function	webt_is_current_screen()
{
	global $pagenow, $typenow;
	return 'edit.php' === $pagenow && Source_Local ::POST_TYPE === $typenow;
}


/**
 * order_id
 *
 * @param  mixed $order_id
 * @return void
 */
function webt_order_id($order_id = '')
{
	global $wp;
	$order_id = '';
	$orders = get_option('woocommerce_myaccount_orders_endpoint');
	$view_order = get_option('woocommerce_myaccount_view_order_endpoint');
	$order_received = get_option('woocommerce_checkout_order_received_endpoint');

	if (isset($wp->query_vars[$orders])) {
		$order_id = $wp->query_vars[$orders];
	} elseif (isset($wp->query_vars[$view_order])) {
		$order_id = $wp->query_vars[$view_order];
	} elseif (isset($wp->query_vars[$order_received])) {
		$order_id = $wp->query_vars[$order_received];
	} else {
		$order_id = webt_last_order_id();
	}
	return $order_id;
}
