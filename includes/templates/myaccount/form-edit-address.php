<?php

/**
 * Edit address form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaddress/form-edit-address.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.5.0
 */

defined('ABSPATH') || exit;

do_action('woocommerce_before_edit_address_form'); ?>

<div class="woocommerce webt_edit_address_page">
	<?php
	global $wp;
	$edit_address = get_option('woocommerce_myaccount_edit_address_endpoint');
	$load_address = isset($wp->query_vars[$edit_address]) ? wc_edit_address_i18n(sanitize_title($wp->query_vars[$edit_address]), true) : '';
	if (!$load_address) :
		wc_get_template('myaccount/my-address.php');
	else :
		do_action('webt_woocommerce_edit_address_content');
	endif;
	?>
</div>
<?php do_action('woocommerce_after_edit_address_form'); ?>