<?php
namespace WEBT\Frontend;

use WEBT\TemplateLibrary\Source_Local;

/**
 * WEBT_WC_Cart
 *
 * @package WEBT
 *
 */

defined('ABSPATH') || exit;

class Class_WC_Cart
{

	/**
	 * __construct
	 *
	 * @return void
	 */
	public function __construct()
	{
		add_action('init', array($this, 'init'));
	}

	/**
	 * init
	 *
	 * @return void
	 */
	public function init()
	{
		add_filter('body_class', array($this, 'add_classes'));
	}

	/**
	 * add_classes
	 *
	 * @param  mixed $classes
	 * @return void
	 */
	public function add_classes($classes)
	{
		$post_type = get_post_type();
		if (is_cart() || $post_type == Source_Local::POST_TYPE) {
			$classes[] = 'woocommerce-cart';
			$classes[] = 'webt';
		}

		return $classes;
	}

	/**
	 * _render
	 *
	 * @param  mixed $element
	 * @param  mixed $settings
	 * @return void
	 */
	public static function _render($element = '', $settings = array())
	{

		switch ($element) {

			case 'cross-sells':
				ob_start();
				if (is_cart()) { ?>
					<div class="woocommerce webt_cross_sell">
						<?php woocommerce_cross_sell_display($settings['limit'], $settings['columns'], $settings['orderby'], $settings['order']); ?>
					</div>
				<?php }

				return ob_get_clean();

			break;

			default:

				return '';

			break;
		}
	}

}
(new Class_WC_Cart);