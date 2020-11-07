<?php
/**
 * Payment methods
 *
 * Shows customer payment methods on the account page.
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/payment-methods.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 2.6.0
 */

defined( 'ABSPATH' ) || exit;

$saved_methods = wc_get_customer_saved_methods_list( get_current_user_id() );
$has_methods   = (bool) $saved_methods;

do_action( 'woocommerce_before_account_payment_methods', $has_methods ); ?>

<?php if ( $has_methods ) : ?>

<div class="woocommerce webt_payment_methods_page">
	<?php

		do_action( 'webt_woocommerce_payment_methods_content' );
	?>
</div>

<?php else : ?>

<div class="woocommerce webt_payment_methods_page">
	<?php

		do_action( 'webt_woocommerce_no_payment_methods_content' );
	?>
</div>
<?php endif; ?>

<?php do_action( 'woocommerce_after_account_payment_methods', $has_methods ); ?>
