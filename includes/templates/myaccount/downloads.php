<?php
/**
 * Downloads
 *
 * Shows downloads on the account page.
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/downloads.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.2.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$downloads     = WC()->customer->get_downloadable_products();
$has_downloads = (bool) $downloads;

do_action( 'woocommerce_before_account_downloads', $has_downloads ); ?>

<?php if ( $has_downloads ) : ?>

	<div class="woocommerce webt_account_downloads_page">
    	<?php

    		do_action( 'webt_woocommerce_account_downloads_content' );
    	?>
    </div>

<?php else : ?>
	<div class="woocommerce webt_account_no_downloads_page">
    	<?php

    		do_action( 'webt_woocommerce_account_no_downloads_content' );
    	?>
    </div>
<?php endif; ?>

<?php do_action( 'woocommerce_after_account_downloads', $has_downloads ); ?>
