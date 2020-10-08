<?php

namespace WEBT\TemplateLibrary;

/**
 * Register Shop Builder Post Type
 * 
 * @since 1.0.0
 * @package WEBT
 */

if (!defined('ABSPATH')) {
	exit;
}
/**
 * WooCommerce Builder Elementor Post types Class.
 * Source_Local
 */

class Source_Local
{

	const POST_TYPE     = 'webt_library';
	const TAXONOMY_SLUG = 'webt_library_type';

	/**
	 * post_type_object
	 *
	 * @var mixed
	 */
	private $post_type_object;

	/**
	 * Hook in methods
	 * init
	 *
	 * @return void
	 */
	public static function init()
	{
		add_action('init', array(__CLASS__, 'register_data'), 5);
		add_action('init', array(__CLASS__, 'register_data_type_terms'));
		add_action('init', array(__CLASS__, 'sync_post_tax_type'));
		add_filter('bulk_actions-edit-' . self::POST_TYPE,  array(__CLASS__, 'remove_from_bulk_actions'));
		add_filter('gutenberg_can_edit_post_type', array(
			__CLASS__,
			'gutenberg_can_edit_post_type'
		), 10, 2);
		add_filter('use_block_editor_for_post_type', array(__CLASS__, 'gutenberg_can_edit_post_type'), 10, 2);
	}

	/**
	 * register_data
	 *
	 * @return void
	 */
	public static function register_data()
	{
		if (!is_blog_installed() || !class_exists('WooCommerce')) return;

		$labels   = array(
			'name'          => esc_html__('Shop Builder', 'webt'), // renamed for neatness
			'singular_name'          => esc_html__('Builder Template', 'webt'),
			'all_items'          => esc_html__('Builder Templates', 'webt'),
			'menu_name'          => esc_html_x('Templates', 'Admin menu name', 'webt'),
			'add_new'          => esc_html__('Add New', 'webt'),
			'add_new_item'          => esc_html__('Add new Template', 'webt'),
			'edit'          => esc_html__('Edit', 'webt'),
			'edit_item'          => esc_html__('Edit Template', 'webt'),
			'new_item'          => esc_html__('New Template', 'webt'),
			'view_item'          => esc_html__('View Template', 'webt'),
			'view_items'          => esc_html__('View Templates', 'webt'),
			'search_items'          => esc_html__('Search Template', 'webt'),
			'not_found'          => esc_html__('No templates found', 'webt'),
			'not_found_in_trash'          => esc_html__('No templates found in trash', 'webt'),
			'parent'          => esc_html__('Parent Template', 'webt'),
		);

		$args = [
			'labels' => $labels,
			'public' => true,
			'rewrite' => false,
			'menu_icon' => 'dashicons-admin-page',
			'show_ui' => true,
			'show_in_menu' => 'edit.php?post_type=' . self::POST_TYPE,
			'show_in_nav_menus' => false,
			'exclude_from_search' => true,
			'capability_type' => 'post',
			'hierarchical' => false,
			'supports' => array('title', 'thumbnail', 'author', 'elementor', 'woocommerce'),
		];

		register_post_type(self::POST_TYPE, $args);

		$labels = array(
			'name'              => _x('Types', 'taxonomy general name', 'webt'),
			'singular_name'     => _x('Type', 'taxonomy singular name', 'webt'),
			'search_items'      => __('Search Types', 'webt'),
			'all_items'         => __('All Types', 'webt'),
			'parent_item'       => __('Parent Type', 'webt'),
			'parent_item_colon' => __('Parent Type:', 'webt'),
			'edit_item'         => __('Edit Type', 'webt'),
			'update_item'       => __('Update Type', 'webt'),
			'add_new_item'      => __('Add New Type', 'webt'),
			'new_item_name'     => __('New Type Name', 'webt'),
			'menu_name'         => __('Type', 'webt'),
		);

		$args = array(
			'hierarchical'      => true,
			'labels'            => $labels,
			'show_ui'           => true,
			'show_in_nav_menus' => false,
			'public' 			=> false,
			'show_admin_column' => false,
			'default_term'      => 'None',
			'query_var'         => is_admin(),
			'rewrite'           => array('slug' => self::TAXONOMY_SLUG),
		);

		/**
		 * Register template library taxonomy args.
		 *
		 * Filters the taxonomy arguments when registering elementor template library taxonomy.
		 *
		 * @since 1.0.0
		 * @param array $args Arguments for registering a taxonomy.
		 */
		register_taxonomy(self::TAXONOMY_SLUG, self::POST_TYPE, $args);
	}
	/**
	 * nav_tab_taxonomy
	 *
	 * @return string[]
	 */
	public static function nav_tab_taxonomy()
	{
		return [
			'my-account',
			'orders',
			'downloads',
			'cart',
			'checkout',
			'payment-method',
			'advanced',
		];
	}

	/**
	 * terms_taxonomy
	 *
	 * @return array
	 */
	public static function terms_taxonomy()
	{

		$terms = [
			'my-account',
			'orders',
			'downloads',
			'cart',
			'checkout',
			'payment-method',
			'advanced',
		];

		if (in_array('advanced', $terms)) {
			//  Hide Last Array
			$terms = \array_diff($terms, ["advanced"]);
		}

		return $terms;
	}

	/**
	 * template_labels
	 *
	 * @return void
	 */
	public static function template_labels()
	{

		return array(
			'my-account' => esc_html__('My account', 'woocommerce'),
			'orders' => esc_html__('Orders', 'woocommerce'),
			'downloads' => esc_html__('Downloads', 'woocommerce'),
			'cart' => esc_html__('Cart', 'woocommerce'),
			'checkout' => esc_html__('Checkout', 'woocommerce'),
			'payment-method' => esc_html__('Payment Methods', 'woocommerce'),
			'advanced' => esc_html__('Advanced', 'webt'),
		);
	}

	/**
	 * register_data_type_terms
	 *
	 * @return void
	 */
	public static function register_data_type_terms()
	{
		$terms = self::terms_taxonomy();

		foreach ($terms as $term_type) {

			$term = ucwords(str_replace(['_', '-'], ' ', $term_type));
			$tax_term = get_term_by('slug', 'page', self::TAXONOMY_SLUG);

			//echo __("$term for ". self::POST_TYPE ." (Shop Builder) exists! <br>", "webt");
			if (!term_exists($term, self::TAXONOMY_SLUG)) {
				wp_insert_term(
					$term,   // the term 
					self::TAXONOMY_SLUG // the taxonomy
				);
			}
			//Delete page term for backwords compactablity
			if (term_exists('page', self::TAXONOMY_SLUG)) {
				$tax_term_id = $tax_term->term_id;
				wp_delete_term(
					$tax_term_id,   // the term 
					self::TAXONOMY_SLUG // the taxonomy
				);
			}
		}
	}

	public static function sync_post_tax_type()
	{
		global $wpdb;
		$meta_key = '_' . self::TAXONOMY_SLUG;
		$meta_values = self::nav_tab_taxonomy();
		if (in_array('advanced', $meta_values)) {
			//  Hide Last Array
			$meta_values = \array_diff($meta_values, ["advanced"]);
		}

		foreach ($meta_values as $meta_value) {

			$post_ids = $wpdb->get_col($wpdb->prepare("SELECT post_id FROM $wpdb->postmeta WHERE meta_key = %s", $meta_key));
			// echo '<br>'. $meta_value ;
			// echo':';
			// echo implode( $post_ids);

			foreach ($post_ids as $post_id) {

				$term_list = wp_get_post_terms($post_id, self::TAXONOMY_SLUG);
				$term_slug = '';
				if (!is_wp_error($term_list)) {
					if (!empty($term_list)) {
						$term_list = array_shift($term_list);

						$term_slug = $term_list->slug;
					}
					if ($meta_value !== $term_slug) {
						update_post_meta($post_id, $meta_key, $term_slug);
					}
					if (has_term('', self::TAXONOMY_SLUG)) {
						$tax_term = get_term_by('slug', 'none', self::TAXONOMY_SLUG);
						$tax_term_id = $tax_term->term_id;
						wp_set_post_terms($post_id, $tax_term_id, self::TAXONOMY_SLUG);
					}
					//change Template Type
					update_post_meta($post_id, '_elementor_template_type', 'template');						
				}
			}
		}
	}

	public static function remove_from_bulk_actions($actions)
	{
		unset($actions['edit']);
		return $actions;
	}
	/**
	 * post_type
	 *
	 * @return void
	 */
	public static function post_type()
	{
		return self::POST_TYPE;
	}

	/**
	 * Disable Gutenberg for products.
	 *
	 * @param bool   $can_edit Whether the post type can be edited or not.
	 * @param string $post_type The post type being checked.
	 * @return void
	 */

	public static function gutenberg_can_edit_post_type($can_edit, $post_type)
	{
		return self::POST_TYPE === $post_type ? false : $can_edit;
	}
}

Source_Local::init();
