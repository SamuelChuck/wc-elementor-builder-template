<?php

/**
 * Advance Tab Content
 * 
 * Prints all content in the advance tab setion
 * 
 * @since 1.0.0
 * @package woocommerce elementor
 */
if (!defined('ABSPATH')) {
	exit; // Exit if accessed directly
}
?>
<div id="woocomerce-builder-options" class="webt-wrap">
	<?php
	switch ($current_type) {
		case 'advanced':

			$inline_css = 'form#posts-filter, ul.subsubsub {display:none}';

	?>
			<style type="text/css">
				<?php echo ($inline_css); ?>
			</style>
			<form id="woocomerce-builder-options__form" action="<?php esc_url(admin_url('/edit.php')); ?>">

				<!--Template Setup-->
				<h2><?php esc_html_e('Template setup', 'webt') ?></h2>
				<p>These Templates need to be set so that WooCommerce knows the layout to send. They should be unique and can be left unselected (or select "None") to disable the template(s).
				</p>
				<table class="form-table">
					<tbody>
						<!--My Account-->
						<tr valign="top">
							<th scope="row">
								<label for="webt_myaccount_template_id">
									<?php esc_html_e('My account template', 'webt') ?>
								</label>
							</th>
							<td>
								<?php
								$webt_myaccount_template_id = get_option('webt_myaccount_template_id', '');
								$myaccount_tpls           = get_posts(array(
									'post_type' => self::POST_TYPE,
									'post_status' => 'publish,private',
									'meta_key' => self::META_KEY,
									'meta_value' => 'my-account',
									'posts_per_page' => -1
								));
								echo '<select name="webt_myaccount_template_id" id="webt_myaccount_template_id" class="" data-placeholder="' . esc_attr__('Select a template&hellip;', 'webt') . '">';
								echo '<option value = "" >' . esc_html__('-- None (Use theme layout) --', 'webt') . '</option>';
								foreach ($myaccount_tpls as $c_tpl) {
									echo '<option value="' . $c_tpl->ID . '" ' . selected($webt_myaccount_template_id, $c_tpl->ID, false) . '>' . $c_tpl->post_title . '</option>';
								}
								echo '</select>';
								?>
								<div class="webt row-actions">
									<?php
									if (!empty($webt_myaccount_template_id)) {
										echo '<span class="edit_with_elementor"><a href="' . esc_url($this->get_edit_url($webt_myaccount_template_id)) . '"> ' . esc_html__('Edit with Elementor', 'elementor') . '</a>  |  <span>';
										echo '<span class="view"><a href="' . esc_url($this->get_preview_url($webt_myaccount_template_id)) . '"> ' . esc_html__('Preview', 'elementor') . '</a></span>';
									} ?>
								</div>
							</td>
						</tr>

						<!--Cart-->
						<tr valign="top">
							<th scope="row">
								<label for="webt_cart_template_id">
									<?php esc_html_e('Cart template', 'webt') ?>
								</label>
							</th>
							<td>
								<?php
								$cart_template_id = get_option('webt_cart_template_id', '');
								$carts_tpl    = get_posts(array(
									'post_type' => self::POST_TYPE,
									'post_status' => 'publish,private',
									'meta_key' => self::META_KEY,
									'meta_value' => 'cart',
									'posts_per_page' => -1
								));
								echo '<select name="webt_cart_template_id" id="webt_cart_template_id" class="" data-placeholder="' . esc_attr__('Select a template&hellip;', 'webt') . '">';
								echo '<option value = "" >' . esc_html__('-- None (Use theme layout) --', 'webt') . '</option>';
								foreach ($carts_tpl as $c_tpl) {
									echo '<option value="' . $c_tpl->ID . '" ' . selected($cart_template_id, $c_tpl->ID, false) . '>' . $c_tpl->post_title . '</option>';
								}
								echo '</select>';
								?>
								<div class="webt row-actions">
									<?php
									if (!empty($cart_template_id)) {
										echo '<span class="edit_with_elementor"><a href="' . esc_url($this->get_edit_url($cart_template_id)) . '"> ' . esc_html__('Edit with Elementor', 'elementor') . '</a>  |  <span>';
										echo '<span class="view"><a href="' . esc_url($this->get_preview_url($cart_template_id)) . '"> ' . esc_html__('Preview', 'elementor') . '</a></span>';
									} ?>
								</div>
							</td>
						</tr>


						<!--Empty Cart-->
						<tr valign="top">
							<th scope="row">
								<label for="webt_cart_empty_template_id">
									<?php esc_html_e('Empty cart template', 'webt') ?>
								</label>
							</th>
							<td>
								<?php
								$cart_empty_template_id = get_option('webt_cart_empty_template_id', '');
								$carts_tpl         = get_posts(array(
									'post_type' => self::POST_TYPE,
									'post_status' => 'publish,private',
									'meta_key' => self::META_KEY,
									'meta_value' => 'cart',
									'posts_per_page' => -1
								));
								echo '<select name="webt_cart_empty_template_id" id="webt_cart_empty_template_id" class="" data-placeholder="' . esc_attr__('Select a template&hellip;', 'webt') . '">';
								echo '<option value = "" >' . esc_html__('-- None (Use theme layout) --', 'webt') . '</option>';
								foreach ($carts_tpl as $c_tpl) {
									echo '<option value="' . $c_tpl->ID . '" ' . selected($cart_empty_template_id, $c_tpl->ID, false) . '>' . $c_tpl->post_title . '</option>';
								}
								echo '</select>';
								?>
								<div class="webt row-actions">
									<?php
									if (!empty($cart_empty_template_id)) {
										echo '<span class="edit_with_elementor"><a href="' . esc_url($this->get_edit_url($cart_empty_template_id)) . '"> ' . esc_html__('Edit with Elementor', 'elementor') . '</a>  |  <span>';
										echo '<span class="view"><a href="' . esc_url($this->get_preview_url($cart_empty_template_id)) . '"> ' . esc_html__('Preview', 'elementor') . '</a></span>';
									} ?>
								</div>
							</td>
						</tr>

						<!--Checkout-->
						<tr valign="top">
							<th scope="row">
								<label for="webt_checkout_template_id">
									<?php esc_html_e('Checkout template', 'webt') ?>
								</label>
							</th>
							<td>
								<?php
								$checkout_template_id = get_option('webt_checkout_template_id', '');
								$checkout_tpls    = get_posts(array(
									'post_type' => self::POST_TYPE,
									'post_status' => 'publish,private',
									'meta_key' => self::META_KEY,
									'meta_value' => 'checkout',
									'posts_per_page' => -1
								));
								echo '<select name="webt_checkout_template_id" id="webt_checkout_template_id" class="" data-placeholder="' . esc_attr__('Select a template&hellip;', 'webt') . '">';
								echo '<option value = "" >' . esc_html__('-- None (Use theme layout) --', 'webt') . '</option>';
								foreach ($checkout_tpls as $c_tpl) {
									echo '<option value="' . $c_tpl->ID . '" ' . selected($checkout_template_id, $c_tpl->ID, false) . '>' . $c_tpl->post_title . '</option>';
								}
								echo '</select>';
								?>
								<div class="webt row-actions">
									<?php
									if (!empty($checkout_template_id)) {
										echo '<span class="edit_with_elementor"><a href="' . esc_url($this->get_edit_url($checkout_template_id)) . '"> ' . esc_html__('Edit with Elementor', 'elementor') . '</a>  |  <span>';
										echo '<span class="view"><a href="' . esc_url($this->get_preview_url($checkout_template_id)) . '"> ' . esc_html__('Preview', 'elementor') . '</a></span>';
									} ?>
								</div>
							</td>
						</tr>


					</tbody>
				</table>

				<!--Cart Page Setup-->
				<h2><?php esc_html_e('Orders template', 'webt') ?></h2>
				<p>Templates are appended to Order related page to handle design and specific actions during or after the order process.
				</p>
				<table class="form-table">
					<tbody>

						<!--Orders-->
						<tr valign="top">
							<th scope="row">
								<label for="webt_account_orders_template_id">
									<?php esc_html_e('Orders', 'webt') ?>
								</label>
							</th>
							<td>
								<?php
								$webt_account_orders_template_id = get_option('webt_account_orders_template_id', '');
								$orders_tpls           = get_posts(array(
									'post_type' => self::POST_TYPE,
									'post_status' => 'publish,private',
									'meta_key' => self::META_KEY,
									'meta_value' => 'orders',
									'posts_per_page' => -1
								));
								echo '<select name="webt_account_orders_template_id" id="webt_account_orders_template_id" class="" data-placeholder="' . esc_attr__('Select a template&hellip;', 'webt') . '">';
								echo '<option value = "" >' . esc_html__('-- None (Use theme layout) --', 'webt') . '</option>';
								foreach ($orders_tpls as $c_tpl) {
									echo '<option value="' . $c_tpl->ID . '" ' . selected($webt_account_orders_template_id, $c_tpl->ID, false) . '>' . $c_tpl->post_title . '</option>';
								}
								echo '</select>';
								?>
								<div class="webt row-actions">
									<?php
									if (!empty($webt_account_orders_template_id)) {
										echo '<span class="edit_with_elementor"><a href="' . esc_url($this->get_edit_url($webt_account_orders_template_id)) . '"> ' . esc_html__('Edit with Elementor', 'elementor') . '</a>  |  <span>';
										echo '<span class="view"><a href="' . esc_url($this->get_preview_url($webt_account_orders_template_id)) . '"> ' . esc_html__('Preview', 'elementor') . '</a></span>';
									} ?>
								</div>
							</td>
						</tr>

						<!--No Orders-->
						<tr valign="top">
							<th scope="row">
								<label for="webt_account_no_orders_template_id">
									<?php esc_html_e('No Orders', 'webt') ?>
								</label>
							</th>
							<td>
								<?php
								$webt_account_no_orders_template_id = get_option('webt_account_no_orders_template_id', '');
								$no_orders_tpls           = get_posts(array(
									'post_type' => self::POST_TYPE,
									'post_status' => 'publish,private',
									'meta_key' => self::META_KEY,
									'meta_value' => 'orders',
									'posts_per_page' => -1
								));
								echo '<select name="webt_account_no_orders_template_id" id="webt_account_no_orders_template_id" class="" data-placeholder="' . esc_attr__('Select a template&hellip;', 'webt') . '">';
								echo '<option value = "" >' . esc_html__('-- None (Use theme layout) --', 'webt') . '</option>';
								foreach ($no_orders_tpls as $c_tpl) {
									echo '<option value="' . $c_tpl->ID . '" ' . selected($webt_account_no_orders_template_id, $c_tpl->ID, false) . '>' . $c_tpl->post_title . '</option>';
								}
								echo '</select>';
								?>
								<div class="webt row-actions">
									<?php
									if (!empty($webt_account_no_orders_template_id)) {
										echo '<span class="edit_with_elementor"><a href="' . esc_url($this->get_edit_url($webt_account_no_orders_template_id)) . '"> ' . esc_html__('Edit with Elementor', 'elementor') . '</a>  |  <span>';
										echo '<span class="view"><a href="' . esc_url($this->get_preview_url($webt_account_no_orders_template_id)) . '"> ' . esc_html__('Preview', 'elementor') . '</a></span>';
									} ?>
								</div>
							</td>
						</tr>

						<!--View Order-->
						<tr valign="top">
							<th scope="row">
								<label for="webt_account_view_order_template_id">
									<?php esc_html_e('View Order', 'webt') ?>
								</label>
							</th>
							<td>
								<?php
								$webt_account_view_order_template_id = get_option('webt_account_view_order_template_id', '');
								$view_order_tpls           = get_posts(array(
									'post_type' => self::POST_TYPE,
									'post_status' => 'publish,private',
									'meta_key' => self::META_KEY,
									'meta_value' => 'orders',
									'posts_per_page' => -1
								));
								echo '<select name="webt_account_view_order_template_id" id="webt_account_view_order_template_id" class="" data-placeholder="' . esc_attr__('Select a template&hellip;', 'webt') . '">';
								echo '<option value = "" >' . esc_html__('-- None (Use theme layout) --', 'webt') . '</option>';
								foreach ($view_order_tpls as $c_tpl) {
									echo '<option value="' . $c_tpl->ID . '" ' . selected($webt_account_view_order_template_id, $c_tpl->ID, false) . '>' . $c_tpl->post_title . '</option>';
								}
								echo '</select>';
								?>
								<div class="webt row-actions">
									<?php
									if (!empty($webt_account_view_order_template_id)) {
										echo '<span class="edit_with_elementor"><a href="' . esc_url($this->get_edit_url($webt_account_view_order_template_id)) . '"> ' . esc_html__('Edit with Elementor', 'elementor') . '</a>  |  <span>';
										echo '<span class="view"><a href="' . esc_url($this->get_preview_url($webt_account_view_order_template_id)) . '"> ' . esc_html__('Preview', 'elementor') . '</a></span>';
									} ?>
								</div>
							</td>
						</tr>

						<!--Downloads-->
						<tr valign="top">
							<th scope="row">
								<label for="webt_account_downloads_template_id">
									<?php esc_html_e('Downloads', 'webt') ?>
								</label>
							</th>
							<td>
								<?php
								$webt_account_downloads_template_id = get_option('webt_account_downloads_template_id', '');
								$downloads_tpls           = get_posts(array(
									'post_type' => self::POST_TYPE,
									'post_status' => 'publish,private',
									'meta_key' => self::META_KEY,
									'meta_value' => 'downloads',
									'posts_per_page' => -1
								));
								echo '<select name="webt_account_downloads_template_id" id="webt_account_downloads_template_id" class="" data-placeholder="' . esc_attr__('Select a template&hellip;', 'webt') . '">';
								echo '<option value = "" >' . esc_html__('-- None (Use theme layout) --', 'webt') . '</option>';
								foreach ($downloads_tpls as $c_tpl) {
									echo '<option value="' . $c_tpl->ID . '" ' . selected($webt_account_downloads_template_id, $c_tpl->ID, false) . '>' . $c_tpl->post_title . '</option>';
								}
								echo '</select>';
								?>
								<div class="webt row-actions">
									<?php
									if (!empty($webt_account_downloads_template_id)) {
										echo '<span class="edit_with_elementor"><a href="' . esc_url($this->get_edit_url($webt_account_downloads_template_id)) . '"> ' . esc_html__('Edit with Elementor', 'elementor') . '</a>  |  <span>';
										echo '<span class="view"><a href="' . esc_url($this->get_preview_url($webt_account_downloads_template_id)) . '"> ' . esc_html__('Preview', 'elementor') . '</a></span>';
									} ?>
								</div>
							</td>
						</tr>

						<!--No Downloads-->
						<tr valign="top">
							<th scope="row">
								<label for="webt_account_no_downloads_template_id">
									<?php esc_html_e('No Downloads', 'webt') ?>
								</label>
							</th>
							<td>
								<?php
								$webt_account_no_downloads_template_id = get_option('webt_account_no_downloads_template_id', '');
								$no_downloads_tpls           = get_posts(array(
									'post_type' => self::POST_TYPE,
									'post_status' => 'publish,private',
									'meta_key' => self::META_KEY,
									'meta_value' => 'downloads',
									'posts_per_page' => -1
								));
								echo '<select name="webt_account_no_downloads_template_id" id="webt_account_no_downloads_template_id" class="" data-placeholder="' . esc_attr__('Select a template&hellip;', 'webt') . '">';
								echo '<option value = "" >' . esc_html__('-- None (Use theme layout) --', 'webt') . '</option>';
								foreach ($no_downloads_tpls as $c_tpl) {
									echo '<option value="' . $c_tpl->ID . '" ' . selected($webt_account_no_downloads_template_id, $c_tpl->ID, false) . '>' . $c_tpl->post_title . '</option>';
								}
								echo '</select>';
								?>
								<div class="webt row-actions">
									<?php
									if (!empty($webt_account_no_downloads_template_id)) {
										echo '<span class="edit_with_elementor"><a href="' . esc_url($this->get_edit_url($webt_account_no_downloads_template_id)) . '"> ' . esc_html__('Edit with Elementor', 'elementor') . '</a>  |  <span>';
										echo '<span class="view"><a href="' . esc_url($this->get_preview_url($webt_account_no_downloads_template_id)) . '"> ' . esc_html__('Preview', 'elementor') . '</a></span>';
									} ?>
								</div>
							</td>
						</tr>

					</tbody>
				</table>

				<!--Checkout Endpoints Setup-->
				<h2><?php esc_html_e('Checkout endpoints', 'webt') ?></h2>
				<p>Templates are appended to checkout endpoints to handle design and specific (ajax) actions during the checkout process.</p>
				<table class="form-table">
					<tbody>

						<!--Pay You-->
						<tr valign="top">
							<th scope="row">
								<label for="webt_order_pay_template_id">
									<?php esc_html_e('Order Pay', 'webt') ?>
								</label>
							</th>
							<td>
								<?php
								$webt_order_pay_template_id = get_option('webt_order_pay_template_id', '');
								$order_pay_tpls    = get_posts(array(
									'post_type' => self::POST_TYPE,
									'post_status' => 'publish,private',
									'meta_key' => self::META_KEY,
									'meta_value' => 'checkout',
									'posts_per_page' => -1
								));
								echo '<select name="webt_order_pay_template_id" id="webt_order_pay_template_id" class="" data-placeholder="' . esc_attr__('Select a template&hellip;', 'webt') . '">';
								echo '<option value = "" >' . esc_html__('-- None (Use theme layout) --', 'webt') . '</option>';
								foreach ($order_pay_tpls as $tpl) {
									echo '<option value="' . $tpl->ID . '" ' . selected($webt_order_pay_template_id, $tpl->ID, false) . '>' . $tpl->post_title . '</option>';
								}
								echo '</select>';
								?>
								<div class="webt row-actions">
									<?php
									if (!empty($webt_order_pay_template_id)) {
										echo '<span class="edit_with_elementor"><a href="' . esc_url($this->get_edit_url($webt_order_pay_template_id)) . '"> ' . esc_html__('Edit with Elementor', 'elementor') . '</a>  |  <span>';
										echo '<span class="view"><a href="' . esc_url($this->get_preview_url($webt_order_pay_template_id)) . '"> ' . esc_html__('Preview', 'elementor') . '</a></span>';
									} ?>
								</div>
							</td>
						</tr>

						<!--Order Recived You-->
						<tr valign="top">
							<th scope="row">
								<label for="webt_order_received_template_id">
									<?php esc_html_e('Order Received', 'webt') ?>
								</label>
							</th>
							<td>
								<?php
								$webt_order_received_template_id = get_option('webt_order_received_template_id', '');
								$order_received_tpls    = get_posts(array(
									'post_type' => self::POST_TYPE,
									'post_status' => 'publish,private',
									'meta_key' => self::META_KEY,
									'meta_value' => 'checkout',
									'posts_per_page' => -1
								));
								echo '<select name="webt_order_received_template_id" id="webt_order_received_template_id" class="" data-placeholder="' . esc_attr__('Select a template&hellip;', 'webt') . '">';
								echo '<option value = "" >' . esc_html__('-- None (Use theme layout) --', 'webt') . '</option>';
								foreach ($order_received_tpls as $tpl) {
									echo '<option value="' . $tpl->ID . '" ' . selected($webt_order_received_template_id, $tpl->ID, false) . '>' . $tpl->post_title . '</option>';
								}
								echo '</select>';
								?>
								<div class="webt row-actions">
									<?php
									if (!empty($webt_order_received_template_id)) {
										echo '<span class="edit_with_elementor"><a href="' . esc_url($this->get_edit_url($webt_order_received_template_id)) . '"> ' . esc_html__('Edit with Elementor', 'elementor') . '</a>  |  <span>';
										echo '<span class="view"><a href="' . esc_url($this->get_preview_url($webt_order_received_template_id)) . '"> ' . esc_html__('Preview', 'elementor') . '</a></span>';
									} ?>

								</div>
							</td>
						</tr>

						<!--Add Payment Method-->
						<tr valign="top">
							<th scope="row">
								<label for="webt_add_payment_method_template_id">
									<?php esc_html_e('Add Payment Method', 'webt') ?>
								</label>
							</th>
							<td>
								<?php
								$webt_add_payment_method_template_id = get_option('webt_add_payment_method_template_id', '');
								$add_payment_method_tpls    = get_posts(array(
									'post_type' => self::POST_TYPE,
									'post_status' => 'publish,private',
									'meta_key' => self::META_KEY,
									'meta_value' => 'payment-method',
									'posts_per_page' => -1
								));
								echo '<select name="webt_add_payment_method_template_id" id="webt_add_payment_method_template_id" class="" data-placeholder="' . esc_attr__('Select a template&hellip;', 'webt') . '">';
								echo '<option value = "" >' . esc_html__('-- None (Use theme layout) --', 'webt') . '</option>';
								foreach ($add_payment_method_tpls as $tpl) {
									echo '<option value="' . $tpl->ID . '" ' . selected($webt_add_payment_method_template_id, $tpl->ID, false) . '>' . $tpl->post_title . '</option>';
								}
								echo '</select>';
								?>
								<div class="webt row-actions">
									<?php
									if (!empty($webt_add_payment_method_template_id)) {
										echo '<span class="edit_with_elementor"><a href="' . esc_url($this->get_edit_url($webt_add_payment_method_template_id)) . '"> ' . esc_html__('Edit with Elementor', 'elementor') . '</a>  |  <span>';
										echo '<span class="view"><a href="' . esc_url($this->get_preview_url($webt_add_payment_method_template_id)) . '"> ' . esc_html__('Preview', 'elementor') . '</a></span>';
									} ?>
								</div>
							</td>
						</tr>

						<!--Checkout Login-->
						<tr valign="top">
							<th scope="row">
								<label for="webt_checkout_login_template_id">
									<?php esc_html_e('Checkout Login template', 'webt') ?>
								</label>
							</th>
							<td>
								<?php
								$webt_checkout_login_template_id = get_option('webt_checkout_login_template_id', '');
								$checkout_login_tpls    = get_posts(array(
									'post_type' => self::POST_TYPE,
									'post_status' => 'publish,private',
									'meta_key' => self::META_KEY,
									'meta_value' => 'checkout',
									'posts_per_page' => -1
								));
								echo '<select name="webt_checkout_login_template_id" id="webt_checkout_login_template_id" class="" data-placeholder="' . esc_attr__('Select a template&hellip;', 'webt') . '">';
								echo '<option value = "" >' . esc_html__('-- None (Use theme layout) --', 'webt') . '</option>';
								foreach ($checkout_login_tpls as $c_tpl) {
									echo '<option value="' . $c_tpl->ID . '" ' . selected($webt_checkout_login_template_id, $c_tpl->ID, false) . '>' . $c_tpl->post_title . '</option>';
								}
								echo '</select>';
								?>
								<div class="webt row-actions">
									<?php
									if (!empty($webt_checkout_login_template_id)) {
										echo '<span class="edit_with_elementor"><a href="' . esc_url($this->get_edit_url($webt_checkout_login_template_id)) . '"> ' . esc_html__('Edit with Elementor', 'elementor') . '</a>  |  <span>';
										echo '<span class="view"><a href="' . esc_url($this->get_preview_url($webt_checkout_login_template_id)) . '"> ' . esc_html__('Preview', 'elementor') . '</a></span>';
									} ?>
								</div>
							</td>
						</tr>

					</tbody>
				</table>

				<!--Accoun Endpoint Setup-->
				<h2><?php esc_html_e('Account endpoints', 'webt') ?></h2>
				<p>Templates are appended to account endpoints to handle design and specific actions.</p>
				<table class="form-table">
					<tbody>

						<!--Edit Account -->
						<tr valign="top">
							<th scope="row">
								<label for="webt_edit_account_template_id">
									<?php esc_html_e('Edit Account', 'webt') ?>
								</label>
							</th>
							<td>
								<?php
								$webt_edit_account_template_id = get_option('webt_edit_account_template_id', '');
								$edit_account_tpls           = get_posts(array(
									'post_type' => self::POST_TYPE,
									'post_status' => 'publish,private',
									'meta_key' => self::META_KEY,
									'meta_value' => 'my-account',
									'posts_per_page' => -1
								));
								echo '<select name="webt_edit_account_template_id" id="webt_edit_account_template_id" class="" data-placeholder="' . esc_attr__('Select a template&hellip;', 'webt') . '">';
								echo '<option value = "" >' . esc_html__('-- None (Use theme layout) --', 'webt') . '</option>';
								foreach ($edit_account_tpls as $c_tpl) {
									echo '<option value="' . $c_tpl->ID . '" ' . selected($webt_edit_account_template_id, $c_tpl->ID, false) . '>' . $c_tpl->post_title . '</option>';
								}
								echo '</select>';
								?>
								<div class="webt row-actions">
									<?php
									if (!empty($webt_edit_account_template_id)) {
										echo '<span class="edit_with_elementor"><a href="' . esc_url($this->get_edit_url($webt_edit_account_template_id)) . '"> ' . esc_html__('Edit with Elementor', 'elementor') . '</a>  |  <span>';
										echo '<span class="view"><a href="' . esc_url($this->get_preview_url($webt_edit_account_template_id)) . '"> ' . esc_html__('Preview', 'elementor') . '</a></span>';
									} ?>
								</div>
							</td>
						</tr>

						<!--Addresses-->
						<tr valign="top">
							<th scope="row">
								<label for="webt_addresses_template_id">
									<?php esc_html_e('Addresses', 'webt') ?>
								</label>
							</th>
							<td>
								<?php
								$webt_addresses_template_id = get_option('webt_addresses_template_id', '');
								$addresses_tpls           = get_posts(array(
									'post_type' => self::POST_TYPE,
									'post_status' => 'publish,private',
									'meta_key' => self::META_KEY,
									'meta_value' => 'my-account',
									'posts_per_page' => -1
								));
								echo '<select name="webt_addresses_template_id" id="webt_addresses_template_id" class="" data-placeholder="' . esc_attr__('Select a template&hellip;', 'webt') . '">';
								echo '<option value = "" >' . esc_html__('-- None (Use theme layout) --', 'webt') . '</option>';
								foreach ($addresses_tpls as $c_tpl) {
									echo '<option value="' . $c_tpl->ID . '" ' . selected($webt_addresses_template_id, $c_tpl->ID, false) . '>' . $c_tpl->post_title . '</option>';
								}
								echo '</select>';
								?>
								<div class="webt row-actions">
									<?php
									if (!empty($webt_addresses_template_id)) {
										echo '<span class="edit_with_elementor"><a href="' . esc_url($this->get_edit_url($webt_addresses_template_id)) . '"> ' . esc_html__('Edit with Elementor', 'elementor') . '</a>  |  <span>';
										echo '<span class="view"><a href="' . esc_url($this->get_preview_url($webt_addresses_template_id)) . '"> ' . esc_html__('Preview', 'elementor') . '</a></span>';
									} ?>
								</div>
							</td>
						</tr>

						<!--Form Edit Address-->
						<tr valign="top">
							<th scope="row">
								<label for="webt_edit_address_template_id">
									<?php esc_html_e('Edit Address', 'webt') ?>
								</label>
							</th>
							<td>
								<?php
								$webt_edit_address_template_id = get_option('webt_edit_address_template_id', '');
								$edit_address_tpls           = get_posts(array(
									'post_type' => self::POST_TYPE,
									'post_status' => 'publish,private',
									'meta_key' => self::META_KEY,
									'meta_value' => 'my-account',
									'posts_per_page' => -1
								));
								echo '<select name="webt_edit_address_template_id" id="webt_edit_address_template_id" class="" data-placeholder="' . esc_attr__('Select a template&hellip;', 'webt') . '">';
								echo '<option value = "" >' . esc_html__('-- None (Use theme layout) --', 'webt') . '</option>';
								foreach ($edit_address_tpls as $c_tpl) {
									echo '<option value="' . $c_tpl->ID . '" ' . selected($webt_edit_address_template_id, $c_tpl->ID, false) . '>' . $c_tpl->post_title . '</option>';
								}
								echo '</select>';
								?>
								<div class="webt row-actions">
									<?php
									if (!empty($webt_edit_address_template_id)) {
										echo '<span class="edit_with_elementor"><a href="' . esc_url($this->get_edit_url($webt_edit_address_template_id)) . '"> ' . esc_html__('Edit with Elementor', 'elementor') . '</a>  |  <span>';
										echo '<span class="view"><a href="' . esc_url($this->get_preview_url($webt_edit_address_template_id)) . '"> ' . esc_html__('Preview', 'elementor') . '</a></span>';
									} ?>
								</div>
							</td>
						</tr>
						<!--Payment Methods-->
						<tr valign="top">
							<th scope="row">
								<label for="webt_payment_methods_template_id">
									<?php esc_html_e('Payment Methods', 'webt') ?>
								</label>
							</th>
							<td>
								<?php
								$webt_payment_methods_template_id = get_option('webt_payment_methods_template_id', '');
								$payment_methods_tpls           = get_posts(array(
									'post_type' => self::POST_TYPE,
									'post_status' => 'publish,private',
									'meta_key' => self::META_KEY,
									'meta_value' => 'payment-method',
									'posts_per_page' => -1
								));
								echo '<select name="webt_payment_methods_template_id" id="webt_payment_methods_template_id" class="" data-placeholder="' . esc_attr__('Select a template&hellip;', 'webt') . '">';
								echo '<option value = "" >' . esc_html__('-- None (Use theme layout) --', 'webt') . '</option>';
								foreach ($payment_methods_tpls as $c_tpl) {
									echo '<option value="' . $c_tpl->ID . '" ' . selected($webt_payment_methods_template_id, $c_tpl->ID, false) . '>' . $c_tpl->post_title . '</option>';
								}
								echo '</select>';
								?>
								<div class="webt row-actions">
									<?php
									if (!empty($webt_payment_methods_template_id)) {
										echo '<span class="edit_with_elementor"><a href="' . esc_url($this->get_edit_url($webt_payment_methods_template_id)) . '"> ' . esc_html__('Edit with Elementor', 'elementor') . '</a>  |  <span>';
										echo '<span class="view"><a href="' . esc_url($this->get_preview_url($webt_payment_methods_template_id)) . '"> ' . esc_html__('Preview', 'elementor') . '</a></span>';
									} ?>
								</div>
							</td>
						</tr>

						<!--No Payment Method-->
						<tr valign="top">
							<th scope="row">
								<label for="webt_no_payment_methods_template_id">
									<?php esc_html_e('No Payment Methods', 'webt') ?>
								</label>
							</th>
							<td>
								<?php
								$webt_no_payment_methods_template_id = get_option('webt_no_payment_methods_template_id', '');
								$no_payment_methods_tpls           = get_posts(array(
									'post_type' => self::POST_TYPE,
									'post_status' => 'publish,private',
									'meta_key' => self::META_KEY,
									'meta_value' => 'payment-method',
									'posts_per_page' => -1
								));
								echo '<select name="webt_no_payment_methods_template_id" id="webt_no_payment_methods_template_id" class="" data-placeholder="' . esc_attr__('Select a template&hellip;', 'webt') . '">';
								echo '<option value = "" >' . esc_html__('-- None (Use theme layout) --', 'webt') . '</option>';
								foreach ($no_payment_methods_tpls as $c_tpl) {
									echo '<option value="' . $c_tpl->ID . '" ' . selected($webt_no_payment_methods_template_id, $c_tpl->ID, false) . '>' . $c_tpl->post_title . '</option>';
								}
								echo '</select>';
								?>
								<div class="webt row-actions">
									<?php
									if (!empty($webt_no_payment_methods_template_id)) {
										echo '<span class="edit_with_elementor"><a href="' . esc_url($this->get_edit_url($webt_no_payment_methods_template_id)) . '"> ' . esc_html__('Edit with Elementor', 'elementor') . '</a>  |  <span>';
										echo '<span class="view"><a href="' . esc_url($this->get_preview_url($webt_no_payment_methods_template_id)) . '"> ' . esc_html__('Preview', 'elementor') . '</a></span>';
									} ?>
								</div>
							</td>
						</tr>

						<!--My Account Login-->
						<tr valign="top">
							<th scope="row">
								<label for="webt_myaccount_login_template_id">
									<?php esc_html_e('Account login', 'webt') ?>
								</label>
							</th>
							<td>
								<?php
								$webt_myaccount_login_template_id = get_option('webt_myaccount_login_template_id', '');
								$myaccount_login_tpls           = get_posts(array(
									'post_type' => self::POST_TYPE,
									'post_status' => 'publish,private',
									'meta_key' => self::META_KEY,
									'meta_value' => 'my-account',
									'posts_per_page' => -1
								));
								echo '<select name="webt_myaccount_login_template_id" id="webt_myaccount_login_template_id" class="" data-placeholder="' . esc_attr__('Select a template&hellip;', 'webt') . '">';
								echo '<option value = "" >' . esc_html__('-- None (Use theme layout) --', 'webt') . '</option>';
								foreach ($myaccount_login_tpls as $c_tpl) {
									echo '<option value="' . $c_tpl->ID . '" ' . selected($webt_myaccount_login_template_id, $c_tpl->ID, false) . '>' . $c_tpl->post_title . '</option>';
								}
								echo '</select>';
								?>
								<div class="webt row-actions">
									<?php
									if (!empty($webt_myaccount_login_template_id)) {
										echo '<span class="edit_with_elementor"><a href="' . esc_url($this->get_edit_url($webt_myaccount_login_template_id)) . '"> ' . esc_html__('Edit with Elementor', 'elementor') . '</a>  |  <span>';
										echo '<span class="view"><a href="' . esc_url($this->get_preview_url($webt_myaccount_login_template_id)) . '"> ' . esc_html__('Preview', 'elementor') . '</a></span>';
									} ?>
								</div>
							</td>
						</tr>

						<!--My Account Register-->
						<tr valign="top">
							<th scope="row">
								<label for="webt_myaccount_register_template_id">
									<?php esc_html_e('Account register', 'webt') ?>
								</label>
							</th>
							<td>
								<?php
								$webt_myaccount_register_template_id = get_option('webt_myaccount_register_template_id', '');
								$myaccount_register_tpls           = get_posts(array(
									'post_type' => self::POST_TYPE,
									'post_status' => 'publish,private',
									'meta_key' => self::META_KEY,
									'meta_value' => 'my-account',
									'posts_per_page' => -1
								));
								echo '<select name="webt_myaccount_register_template_id" id="webt_myaccount_register_template_id" class="" data-placeholder="' . esc_attr__('Select a template&hellip;', 'webt') . '">';
								echo '<option value = "" >' . esc_html__('-- None (Use theme layout) --', 'webt') . '</option>';
								foreach ($myaccount_register_tpls as $c_tpl) {
									echo '<option value="' . $c_tpl->ID . '" ' . selected($webt_myaccount_register_template_id, $c_tpl->ID, false) . '>' . $c_tpl->post_title . '</option>';
								}
								echo '</select>';
								?>
								<div class="webt row-actions">
									<?php
									if (!empty($webt_myaccount_register_template_id)) {
										echo '<span class="edit_with_elementor"><a href="' . esc_url($this->get_edit_url($webt_myaccount_register_template_id)) . '"> ' . esc_html__('Edit with Elementor', 'elementor') . '</a>  |  <span>';
										echo '<span class="view"><a href="' . esc_url($this->get_preview_url($webt_myaccount_register_template_id)) . '"> ' . esc_html__('Preview', 'elementor') . '</a></span>';
									} ?>
								</div>
							</td>
						</tr>

						<!--Lost Password-->
						<tr valign="top">
							<th scope="row">
								<label for="webt_lost_password_template_id">
									<?php esc_html_e('Lost Password', 'webt') ?>
								</label>
							</th>
							<td>
								<?php
								$webt_lost_password_template_id = get_option('webt_lost_password_template_id', '');
								$lost_password_tpls           = get_posts(array(
									'post_type' => self::POST_TYPE,
									'post_status' => 'publish,private',
									'meta_key' => self::META_KEY,
									'meta_value' => 'my-account',
									'posts_per_page' => -1
								));
								echo '<select name="webt_lost_password_template_id" id="webt_lost_password_template_id" class="" data-placeholder="' . esc_attr__('Select a template&hellip;', 'webt') . '">';
								echo '<option value = "" >' . esc_html__('-- None (Use theme layout) --', 'webt') . '</option>';
								foreach ($lost_password_tpls as $c_tpl) {
									echo '<option value="' . $c_tpl->ID . '" ' . selected($webt_lost_password_template_id, $c_tpl->ID, false) . '>' . $c_tpl->post_title . '</option>';
								}
								echo '</select>';
								?>
								<div class="webt row-actions">
									<?php
									if (!empty($webt_lost_password_template_id)) {
										echo '<span class="edit_with_elementor"><a href="' . esc_url($this->get_edit_url($webt_lost_password_template_id)) . '"> ' . esc_html__('Edit with Elementor', 'elementor') . '</a>  |  <span>';
										echo '<span class="view"><a href="' . esc_url($this->get_preview_url($webt_lost_password_template_id)) . '"> ' . esc_html__('Preview', 'elementor') . '</a></span>';
									} ?>
								</div>
							</td>
						</tr>

						<!--Lost Password-->
						<tr valign="top">
							<th scope="row">
								<label for="webt_lost_password_reset_template_id">
									<?php esc_html_e('Lost Password Reset', 'webt') ?>
								</label>
							</th>
							<td>
								<?php
								$webt_lost_password_reset_template_id = get_option('webt_lost_password_reset_template_id', '');
								$lost_password_reset_tpls           = get_posts(array(
									'post_type' => self::POST_TYPE,
									'post_status' => 'publish,private',
									'meta_key' => self::META_KEY,
									'meta_value' => 'my-account',
									'posts_per_page' => -1
								));
								echo '<select name="webt_lost_password_reset_template_id" id="webt_lost_password_reset_template_id" class="" data-placeholder="' . esc_attr__('Select a template&hellip;', 'webt') . '">';
								echo '<option value = "" >' . esc_html__('-- None (Use theme layout) --', 'webt') . '</option>';
								foreach ($lost_password_reset_tpls as $c_tpl) {
									echo '<option value="' . $c_tpl->ID . '" ' . selected($webt_lost_password_reset_template_id, $c_tpl->ID, false) . '>' . $c_tpl->post_title . '</option>';
								}
								echo '</select>';
								?>
								<div class="webt row-actions">
									<?php
									if (!empty($webt_lost_password_reset_template_id)) {
										echo '<span class="edit_with_elementor"><a href="' . esc_url($this->get_edit_url($webt_lost_password_reset_template_id)) . '"> ' . esc_html__('Edit with Elementor', 'elementor') . '</a>  |  <span>';
										echo '<span class="view"><a href="' . esc_url($this->get_preview_url($webt_lost_password_reset_template_id)) . '"> ' . esc_html__('Preview', 'elementor') . '</a></span>';
									} ?>
								</div>
							</td>
						</tr>

						<!--Lost Password Confirmation-->
						<tr valign="top">
							<th scope="row">
								<label for="webt_lost_password_confirmation_template_id">
									<?php esc_html_e('Lost Password Confirmation', 'webt') ?>
								</label>
							</th>
							<td>
								<?php
								$webt_lost_password_confirmation_template_id = get_option('webt_lost_password_confirmation_template_id', '');
								$lost_password_confirmation_tpls           = get_posts(array(
									'post_type' => self::POST_TYPE,
									'post_status' => 'publish,private',
									'meta_key' => self::META_KEY,
									'meta_value' => 'my-account',
									'posts_per_page' => -1
								));
								echo '<select name="webt_lost_password_confirmation_template_id" id="webt_lost_password_confirmation_template_id" class="" data-placeholder="' . esc_attr__('Select a template&hellip;', 'webt') . '">';
								echo '<option value = "" >' . esc_html__('-- None (Use theme layout) --', 'webt') . ' </option>';
								foreach ($lost_password_confirmation_tpls as $c_tpl) {
									echo '<option value="' . $c_tpl->ID . '" ' . selected($webt_lost_password_confirmation_template_id, $c_tpl->ID, false) . '>' . $c_tpl->post_title . '</option>';
								}
								echo '</select>';
								?>
								<div class="webt row-actions">
									<?php
									if (!empty($webt_lost_password_confirmation_template_id)) {
										echo '<span class="edit_with_elementor"><a href="' . esc_url($this->get_edit_url($webt_lost_password_confirmation_template_id)) . '"> ' . esc_html__('Edit with Elementor', 'elementor') . '</a>  |  <span>';
										echo '<span class="view"><a href="' . esc_url($this->get_preview_url($webt_lost_password_confirmation_template_id)) . '"> ' . esc_html__('Preview', 'elementor') . '</a></span>';
									} ?>
								</div>
							</td>
						</tr>

					</tbody>
				</table>

				<input type="hidden" name="action" value="webt_advance_action">
				<input type="hidden" name="current_url" value="<?php echo esc_url($_SERVER['REQUEST_URI']); ?>">
				<input type="hidden" name="_wpnonce" value="<?php echo wp_create_nonce('webt_nonce'); ?>">
				<button id="woocomerce-builder-elementor-options__form__submit" class="elementor-button elementor-button-success"><?php esc_html_e('Save changes', 'webt') ?></button>

			</form>
	<?php
			break;
		default:
			break;
	}
	?>
</div>
<?php
