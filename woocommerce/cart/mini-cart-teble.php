<?php
defined('ABSPATH') || exit;
if (!function_exists('webt_pro_render_mini_cart_item')) {
	function webt_pro_render_mini_cart_table_item($cart_item_key, $cart_item)
	{
		$_product = apply_filters('woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key);
		$is_product_visible = ($_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters('woocommerce_widget_cart_item_visible', true, $cart_item, $cart_item_key));

		if (!$is_product_visible) {
			return;
		}

		$product_id = apply_filters('woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key);
		$product_price = apply_filters('woocommerce_cart_item_price', WC()->cart->get_product_price($_product), $cart_item, $cart_item_key);
		$product_permalink = apply_filters('woocommerce_cart_item_permalink', $_product->is_visible() ? $_product->get_permalink($cart_item) : '', $cart_item, $cart_item_key);
?>
		<tr class="webt-menu-cart__product woocommerce-cart-form__cart-item <?php echo esc_attr(apply_filters('woocommerce_cart_item_class', 'cart_item', $cart_item, $cart_item_key)); ?>">

			<td>
				<div class="webt-menu-cart__product-image product-thumbnail">
					<?php
					$thumbnail = apply_filters('woocommerce_cart_item_thumbnail', $_product->get_image(), $cart_item, $cart_item_key);

					if (!$product_permalink) :
						echo wp_kses_post($thumbnail);
					else :
						printf('<a href="%s">%s</a>', esc_url($product_permalink), wp_kses_post($thumbnail));
					endif;
					?>
				</div>

			</td>

			<td>

				<div class="webt-menu-cart__product-name product-name" data-title="<?php esc_attr_e('Product', 'webt-pro'); ?>">
					<?php
					if (!$product_permalink) :
						echo wp_kses_post(apply_filters('woocommerce_cart_item_name', $_product->get_name(), $cart_item, $cart_item_key) . '&nbsp;');
					else :
						echo wp_kses_post(apply_filters('woocommerce_cart_item_name', sprintf('<a href="%s">%s</a>', esc_url($product_permalink), $_product->get_name()), $cart_item, $cart_item_key));
					endif;

					do_action('woocommerce_after_cart_item_name', $cart_item, $cart_item_key);

					// Meta data.
					echo wc_get_formatted_cart_item_data($cart_item); // PHPCS: XSS ok.
					?>
				</div>

				<div class="webt-menu-cart__product-price product-price" data-title="<?php esc_attr_e('Price', 'webt-pro'); ?>">
					<?php echo apply_filters('woocommerce_widget_cart_item_quantity', '<span class="quantity">' . sprintf('%s &times; %s', $cart_item['quantity'], $product_price) . '</span>', $cart_item, $cart_item_key); ?>
				</div>

				<div class="webt-menu-cart__product-remove product-remove">
					<?php
					echo apply_filters('woocommerce_cart_item_remove_link', sprintf(
						'<a href="%s" aria-label="%s" data-product_id="%s" data-cart_item_key="%s" data-product_sku="%s">x</a>',
						esc_url(wc_get_cart_remove_url($cart_item_key)),
						__('Remove this item', 'webt-pro'),
						esc_attr($product_id),
						esc_attr($cart_item_key),
						esc_attr($_product->get_sku())
					), $cart_item_key);
					?>
				</div>
			</td>
		</tr>

	<?php
	}
}

$cart_items = WC()->cart->get_cart();

if (empty($cart_items)) { ?>
	<div class="woocommerce-mini-cart__empty-message"><?php esc_attr_e('No products in the cart.', 'webt-pro'); ?></div>
<?php } else { ?>
	<div class="webt-menu-cart__products woocommerce-mini-cart cart woocommerce-cart-form__contents">
		<?php
		do_action('woocommerce_before_mini_cart_contents');
		?>
		<table>
			<?php
			foreach ($cart_items as $cart_item_key => $cart_item) {

				webt_pro_render_mini_cart_table_item($cart_item_key, $cart_item);
			}
			?>
		</table>
		<?php
		do_action('woocommerce_mini_cart_contents');
		?>
	</div>

	<div class="webt-menu-cart__subtotal">
		<?php echo __('Subtotal', 'woocommerce'); // phpcs:ignore WordPress.WP.I18n 
		?>: <span class="woocommerce-Price-amount amount"> <?php echo WC()->cart->get_cart_subtotal(); ?> <span>
	</div>
	<div class="webt-menu-cart__footer-buttons">
		<a href="<?php echo esc_url(wc_get_cart_url()); ?>" class="webt-button button webt-button--view-cart">
			<span class="webt-button-text"><?php echo __('View cart', 'woocommerce'); // phpcs:ignore WordPress.WP.I18n 
											?></span>
		</a>
		<a href="<?php echo esc_url(wc_get_checkout_url()); ?>" class="webt-button button webt-button--checkout">
			<span class="webt-button-text"><?php echo __('Checkout', 'woocommerce'); // phpcs:ignore WordPress.WP.I18n 
											?></span>
		</a>
	</div>
<?php
} // empty( $cart_items )

?>