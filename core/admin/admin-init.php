<?php

use WEBT\TemplateLibrary\Source_Local;


/**
 * - WEBT_Admin_Init
 */
if (!defined('ABSPATH')) {
	exit; // Exit if accessed directly

}

class WEBT_Admin_Init
{
	/**
	 * Public Constants, Private Static, Public, Protected
	 * 
	 * @var string
	 * @var mixed 
	 * @var array
	 * @var null
	 */
	const POST_TYPE = Source_Local::POST_TYPE;
	const TAXONOMY_SLUG = Source_Local::TAXONOMY_SLUG;
	const META_KEY = '_' . self::TAXONOMY_SLUG;
	const MK_EDIT_MODE = '_webt_edit_mode';
	const ELEMENTOR_LIBRARY = 'edit.php?post_type=elementor_library';
	const POST_SLUG = 'edit.php?post_type=' . self::POST_TYPE;
	const ADMIN_SCREEN = 'edit-' . self::POST_TYPE;

	private static $template_types = [];
	private $post_type_object;
	private static $properties = [];
	private $main_id;

	public $post_type;

	protected $post;
	protected $cpt = [];
	protected $types = [];

	/**
	 * Template Functions
	 * 
	 * WEBT_Admin_Init::get_template_types
	 * 
	 * public static function get_template_types()
	 * 
	 * @return mixed
	 */
	public static function get_template_types()
	{
		return self::$template_types;
	}

	/**
	 * get_template_type
	 *
	 * @param  mixed $template_id
	 * @return mixed
	 */
	public static function get_template_type($template_id)
	{
		return get_post_meta($template_id, self::META_KEY, true);
	}

	/**
	 * is_base_templates_screen
	 *
	 * @param mixed $current_screen
	 * @param mixed $current_screen
	 * @param mixed $current_screen-
	 * @param mixed $current_screen-
	 * @return POST_TYPE
	 */
	public static function is_base_templates_screen()
	{
		global $current_screen;
		if (!$current_screen) {
			return false;
		}
		return 'edit' === $current_screen->base && self::POST_TYPE === $current_screen->post_type;
	}

	/**
	 * add_template_type
	 *
	 * @param mixed $type
	 * @param mixed $template_types
	 * @param mixed $type
	 * @param mixed $type
	 * @return template_types
	 */
	public static function add_template_type($type)
	{
		self::$template_types[$type] = $type;
	}

	/**
	 * remove_template_type
	 *
	 * @param mixed $type
	 * @param mixed $template_types
	 * @param mixed $type
	 * @param mixed $template_types
	 * @param mixed $type
	 * @return void
	 */
	public static function remove_template_type($type)
	{
		if (isset(self::$template_types[$type])) {
			unset(self::$template_types[$type]);
		}
	}

	/**
	 * add_action_filter
	 *
	 * @return void
	 */
	public function add_action_filter()
	{
		//WooCommerce Elementor Builder Templates Post Type
		add_action('admin_menu', [$this, 'add_shop_builder_submenu'], 201);

		//add_filter('post_row_actions', [$this, 'filter_post_row_actions'], 12, 2);
		add_action('save_post', [$this, 'do_on_post_save'], 10, 2);
		add_filter('display_post_states', [$this, 'remove_elementor_state'], 11, 2);

		// Template type column.
		add_action('manage_' . self::POST_TYPE . '_posts_columns', [$this, 'admin_columns_headers']);
		add_action('manage_' . self::POST_TYPE . '_posts_custom_column', [$this, 'admin_columns_content'], 10, 2);

		//Loads admin scripts
		add_action('admin_enqueue_scripts', array($this, 'enqueue_style_script',));

		// Shows Shop Builder Navigation Tabs.
		add_filter('views_edit-' . self::POST_TYPE, [$this, 'admin_print_tabs']);

		/**
		 * Admin Actions
		 * Value must be same as input action value
		 */
		add_action('admin_action_webt_new_post', [$this, 'admin_action_new_post']);
		add_action('admin_action_webt_advance_action', [$this, 'add_admin_action_options']);

		add_action('current_screen', [$this, 'init_new_template']);
		add_action('admin_init', [$this, 'add_backword_compactabality']);

		// Show blank state.
		add_action('manage_posts_extra_tablenav', [$this, 'render_blank_state']);
	}

	/**
	 * add_shop_builder_submenu
	 * 
	 * Add 'Shop Builder' Sub-menu To Elementor Templates
	 * @since 1.0.0
	 * @return void
	 */
	public function add_shop_builder_submenu()
	{
		add_submenu_page(
			self::ELEMENTOR_LIBRARY,
			esc_html__('Shop Builder', 'webt'),
			esc_html__('Shop Builder', 'webt'),
			'edit_posts',
			self::POST_SLUG
		);
	}

	/**
	 * add_backword_compactabality
	 * runs Sql Query to rename post_type and metadata
	 *
	 * @return void
	 */
	public function add_backword_compactabality()
	{
		global $wpdb;
		$POST_TYPE = self::POST_TYPE;
		$TMK = self::TAXONOMY_SLUG;
		$edit_mode = self::MK_EDIT_MODE;
		$sql_lib = "UPDATE `{$wpdb->prefix}posts` SET `post_type` = '{$POST_TYPE}' WHERE `{$wpdb->prefix}posts`.`post_type` = 'wc_temp_library'";
		$sql_mode = "UPDATE `{$wpdb->prefix}postmeta` SET `meta_key` = '{$edit_mode}' WHERE `{$wpdb->prefix}postmeta`.`meta_key` = '_swebt_edit_mode'";
		$sql_type = "UPDATE `{$wpdb->prefix}postmeta` SET `meta_key` = '{$TMK}' WHERE `{$wpdb->prefix}postmeta`.`meta_key` = '_webt_wc_temp_type'";

		$wpdb->get_results($sql_lib);
		$wpdb->get_results($sql_type);
		$wpdb->get_results($sql_mode);
	}

	private function get_active_tab_group($default = '')
	{
		$current_tabs_class = $default;

		if (!empty($_REQUEST['tabs_group'])) {
			$current_tabs_class = $_REQUEST['tabs_group'];
		}
		return $current_tabs_class;
	}

	/**
	 * filter_post_row_actions
	 *
	 * @param  mixed $actions
	 * @param  mixed $post
	 * @return void
	 */
	public function filter_post_row_actions($actions, \WP_Post $post)
	{
		if (get_post_type($post->ID) == self::POST_TYPE && $this->is_elementor_builder() && $this->current_user_can_edit()) {
			$actions['edit_with_elementor'] = sprintf('<a href="%1$s">%2$s</a>', $this->get_edit_url(get_post_meta($post->ID, self::META_KEY, true), $post->ID), esc_html__('Edit with Elementor', 'elementor'));
		}
		return $actions;
	}

	/**
	 * is_elementor_builder
	 *
	 * @return void
	 */
	public function is_elementor_builder()
	{
		$post = get_post();
		return !!get_post_meta($post->ID, '_elementor_edit_mode', true);
	}

	/**
	 * current_user_can_edit
	 *
	 * @return void
	 */
	public function current_user_can_edit()
	{
		$post_type = self::POST_TYPE;

		$post_type_object = get_post_type_object($post_type);

		return current_user_can($post_type_object
			->cap
			->edit_posts);
	}

	/**
	 * remove_elementor_state
	 *
	 * @param  mixed $post_states
	 * @param  mixed $post
	 * @return void
	 */
	public function remove_elementor_state($post_states, $post)
	{
		if (self::POST_TYPE === $post->post_type && isset($post_states['elementor'])) {
			unset($post_states['elementor']);
		}
		return $post_states;
	}

	/**
	 * do_on_post_save
	 *
	 * @param  mixed $post_id
	 * @param  mixed $post
	 * @param \WP_Post $post    The current post object.
	 */
	public function do_on_post_save($post_id, \WP_Post $post)
	{
		if ((self::POST_TYPE !== $post->post_type) || self::get_template_type($post_id)) {
			return;
		}
		$this->save_item_type($post_id, 'none');
	}

	/**
	 * save_item_type
	 *
	 * @param  mixed $post_id
	 * @param  mixed $type
	 * @return void
	 */
	private function save_item_type($post_id, $type)
	{
		update_post_meta($post_id, self::META_KEY, $type);
		wp_set_object_terms($post_id, $type, self::TAXONOMY_SLUG);
	}

	/**
	 * Used to output 'Shop Builder' tabs with their labels.
	 *	 
	 * @since 1.0.0
	 */
	public function admin_print_tabs($views)
	{
		$current_type = '';
		$active_class = ' nav-tab-active';
		$current_tabs_class = $this->get_active_tab_group();

		if (!empty($_REQUEST[self::TAXONOMY_SLUG])) {
			$current_type = $_REQUEST[self::TAXONOMY_SLUG];
			$active_class = '';
		}
		$url_args = ['post_type' => self::POST_TYPE];
		$baseurl = add_query_arg($url_args, admin_url('edit.php'));
		$nav_tab_types = Source_Local::nav_tab_taxonomy();
?>
		<div id="woocomerce-builder-template-library-tabs-wrapper" class="nav-tab-wrapper">
			<a class="nav-tab<?php echo esc_attr($active_class); ?>" href="<?php echo esc_url($baseurl); ?>">
				<?php
				esc_html_e('All', 'webt');
				?>
			</a>
			<?php
			foreach ($nav_tab_types as $nav_tab) :
				$active_class = '';

				if ($current_type === $nav_tab) {
					$active_class = ' nav-tab-active';
				}
				$nav_tab_url = add_query_arg(self::TAXONOMY_SLUG, $nav_tab, $baseurl);
				$nav_tab_label = self::template_label_type($nav_tab);

				echo "<a class='nav-tab{$active_class}' href='{$nav_tab_url}'>{$nav_tab_label}</a>";
			endforeach;
			?>
		</div>
		<?php
		if (!empty($current_type)) :
			require WEBT_CORE_PATH . '/admin/settings/advance.php';
		endif;

		return $views;
	}

	/**
	 * admin_columns_headers
	 *
	 * @param  mixed $posts_columns
	 * @return void
	 */
	public function admin_columns_headers($posts_columns)
	{
		$offset = 2;
		$posts_columns = array_slice($posts_columns, 0, $offset, true) + [self::TAXONOMY_SLUG => esc_html__('Type', 'elementor')] + array_slice($posts_columns, $offset, null, true);
		$offset = 3;
		$posts_columns = array_slice($posts_columns, 0, $offset, true) + ['instances' => esc_html__('Instances', 'webt')] + array_slice($posts_columns, $offset, null, true);
		return $posts_columns;
	}

	/**
	 * admin_columns_content
	 *
	 * @param  mixed $column_name
	 * @param  mixed $post_id
	 * @return void
	 */
	public function admin_columns_content($column_name, $post_id)
	{
		//Add Admin Column 
		require(WEBT_CORE_PATH . 'admin/settings/column.php');
	}

	/**
	 * print_admin_column_type
	 *
	 * @param  mixed $type
	 * @return void
	 */
	public function print_admin_column_type($type)
	{

		$admin_filter_url = admin_url(self::POST_SLUG . '&' . self::TAXONOMY_SLUG . '=' . $type);

		printf('<a href="%s">%s</a>', $admin_filter_url, self::template_label_type($type));
	}

	/**
	 * print_admin_column_instance
	 *
	 * @param  mixed $instance
	 * @return void
	 */
	public function print_admin_column_instance($instance)
	{
		echo esc_html($instance);
	}

	/**
	 * template_label_type
	 *
	 * @param  mixed $template_type
	 * @return mixed
	 */
	public static function template_label_type($template_type)
	{
		$templates = Source_Local::template_labels();

		if ($template_type == 'get_types') {
			//  Hide Last Array
			unset($templates['advanced']);
			return $templates;
		}

		if (isset($templates[$template_type])) {
			$template_label = $templates[$template_type];
		} else {
			$template_label = ucwords(str_replace(['_', '-'], ' ', $template_type));
		}

		return $template_label;
	}

	/**
	 * enqueue_styles enqueue_scripts
	 *
	 * @return void
	 */
	public function enqueue_style_script()
	{
		wp_enqueue_style('wp-color-picker');
		wp_enqueue_style('webt-modal-style', WEBT_ASSETS_URL . 'css/modal.css');
		wp_enqueue_style('webt-admin-style', WEBT_ASSETS_URL . 'css/admin.css');

		wp_enqueue_script('wp-color-picker');
		wp_enqueue_script('webt-admin-script', WEBT_ASSETS_URL . 'js/admin.js', [], WEBT_VERSION, false);
		wp_enqueue_script('webt-modal-script', WEBT_ASSETS_URL . 'js/modal.js', [], WEBT_VERSION, true);
	}

	/**
	 * Enqueue new template Scripts 
	 * 
	 * Loads with Admin scripts, used when 'Add New' button is click.  
	 * 
	 * Fired by 'admin_enqueue_scripts' action
	 * 
	 * @since 1.0.0
	 */
	public function enqueue_new_template_scripts()
	{
		wp_enqueue_script('webt-new-template', WEBT_ASSETS_URL . 'js/new-template.js', [], WEBT_VERSION, true);
	}

	/**
	 * add_template_on_head
	 *
	 * @return void
	 */
	public function add_template_on_head()
	{
		require WEBT_CORE_PATH . 'admin/settings/popup.php';
	}

	/**
	 * Admin action new post.
	 *
	 * When a new post action is fired the title is set to 'Elementor' and the post ID.
	 *
	 * Fired by `admin_action_webt_new_post` action.
	 *
	 * @return void
	 */
	public function admin_action_new_post()
	{
		check_admin_referer('webt_new_post_nonce');

		if (empty($_GET['post_type'])) {
			$post_type = 'post';
		} else {
			$post_type = $_GET['post_type'];
		}

		$post_type_object = get_post_type_object($post_type);

		if (!$post_type_object) {
			wp_die(esc_html__('Invalid post type.', 'webt'));
		}

		if (!current_user_can($post_type_object
			->cap
			->edit_posts)) {
			wp_die('<h1>' . esc_html__('No Permission Granted.', 'webt') . '</h1><p>' . esc_html__('Sorry, you are not allowed to carry out this action.', 'webt') . '</p>', 403);
		}

		if (empty($_GET['template_type'])) {
			$type = 'post';
			$_GET['template_type'];
		} else {
			$type = $_GET['template_type']; // @var array $_GET

		}

		$post_data = isset($_GET['post_data']) ? $_GET['post_data'] : [];
		$meta = [];
		$meta = apply_filters('webt_create_new_post_meta', $meta);
		$post_data['post_type'] = $post_type; //@var mixed $post_data

		$this->create($type, $post_data, $meta);

		wp_redirect($this->get_edit_url());

		exit;
	}

	/**
	 * add_admin_action_options
	 *
	 * @return exit
	 */
	public function add_admin_action_options()
	{
		check_admin_referer('webt_nonce');
		$current_url = $_GET['current_url'];

		require(WEBT_CORE_PATH . 'admin/settings/action.php');

		$this->update_woo_options($options);
		wp_safe_redirect($current_url);

		exit;
	}

	/**
	 * update_woo_options
	 *
	 * @param  mixed $options
	 * @return void
	 */
	public function update_woo_options($options = '')
	{

		if (is_array($options)) {
			foreach ($options as $option => $value) {
				update_option($option, $value);
			}
		}
	}

	/**
	 * create
	 * 
	 * Create a document.
	 * Create a new document using any given parameters.
	 * 
	 * @param  mixed $type
	 * @param  mixed $post_data
	 * @param  mixed $meta_data
	 * @return void
	 */
	public function create($type, $post_data = [], $meta_data = [])
	{
		$class = $this->get_type($type, false);

		if (!$class) {
			return new \WP_Error(500, sprintf('Type %s does not exist.', $type));
		}

		if (empty($post_data['post_title'])) {
			$post_data['post_title'] = esc_html__('WooCommerce Elementor', 'webt');
			if ('post' !== $type) {
				$post_data['post_title'] = sprintf(
					/* translators: %s: Document title */
					esc_html__('Shop Builder %s', 'webt'),
					self::template_label_type($type)
				);
			}
			$update_title = true;
		}

		$meta_data[self::MK_EDIT_MODE] = 'builder';

		$meta_data[self::META_KEY] = $type; //save the type as it is

		$post_data['meta_input'] = $meta_data;

		$post_id = wp_insert_post($post_data);

		if (!empty($update_title)) {
			$post_data['ID'] = $post_id;
			$post_data['post_title'] .= ' #' . $post_id;

			// The meta doesn't need update.
			unset($post_data['meta_input']);

			wp_update_post($post_data);
		}

		// Let the $document to re-save the template type by his way.
		$document = $this->save_template_type($type);

		wp_set_object_terms($post_id, $type, self::TAXONOMY_SLUG);

		return $document;
	}

	/**
	 * get_type
	 * 
	 * Create a document.
	 * Create a new document using any given parameters.
	 *
	 * @param  mixed $type
	 * @param  mixed $fallback
	 * @return mixed
	 */
	public function get_type($type, $fallback = 'post')
	{
		$types = Source_Local::nav_tab_taxonomy();

		if (isset($types[$type])) {
			return $types[$type];
		}

		if (isset($types[$fallback])) {
			return $types[$fallback];
		}

		return false;
	}

	/**
	 *
	 * @param string $key   Meta data key.
	 * @param string $value Meta data value.
	 *
	 * @return bool|int
	 */
	public function update_main_meta($key, $value)
	{
		return update_post_meta($this->get_main_id(), $key, $value);
	}

	/**
	 * Stores the template type in postmeta db
	 * 
	 * @since 1.0.0
	 */
	public function save_template_type($type)
	{
		return $this->update_main_meta(self::META_KEY, $type);
	}

	/**
	 * Get  main & parent Post id 
	 * 
	 * @since 1.0.0
	 */
	public function get_main_id()
	{
		if (!$this->main_id) {
			$post = $this->get_post();
			$post_id = $post->ID;
			$parent_post_id = wp_is_post_revision($post_id);

			if ($parent_post_id) {
				$post_id = $parent_post_id;
			}
			$this->main_id = $post_id;
		}
		return $this->main_id;
	}


	/**
	 * get_edit_url
	 *
	 * @return void
	 */
	public function get_edit_url()
	{
		$url = add_query_arg(
			[
				'post' => $this->get_main_id(),
				'action' => 'elementor',
			],
			admin_url( 'post.php' )
		);

		return $url;

	}

	/**
	 * init_new_template
	 *
	 * @return void
	 */
	public function init_new_template()
	{
		if (self::ADMIN_SCREEN !== get_current_screen()->id) {
			return;
		}
		// Add template on admin_head.
		add_action('admin_head', [$this, 'add_template_on_head']);
		add_action('admin_enqueue_scripts', [$this, 'enqueue_new_template_scripts']);
	}

	/**
	 * render_blank_state.
	 * 
	 * Shows Elementor Blank Slate template 
	 * When the template library has no saved templates, display a blank admin page offering to create one.
	 *
	 * Fired by `manage_posts_extra_tablenav` action.
	 * @since 1.0.0
	 * @package Elementor
	 * @param  mixed $which
	 * @return void
	 */
	public function render_blank_state($which)
	{
		global $post_type;
		global $wp_list_table;
		$inline_css = '#posts-filter .wp-list-table, #posts-filter .tablenav.top, .tablenav.bottom .actions, .wrap .subsubsub { display:none !important;}';
		$total_items = $wp_list_table->get_pagination_arg('total_items');
		$gqv_library_type = get_query_var(self::TAXONOMY_SLUG);

		if (('widget' === $gqv_library_type) ||   (self::POST_TYPE !== $post_type || 'bottom' !== $which) || (!empty($_REQUEST['s']) || !empty($total_items))) {
			return;
		}


		if (empty($gqv_library_type)) {
			$post_counts = (array) wp_count_posts(self::POST_TYPE);
			unset($post_counts['auto-draft']);
			$post_count = array_sum($post_counts);

			if (0 < $post_count) {
				return;
			}

			$gqv_library_type = 'template';

			$inline_css .= '#woocomerce-template-library-tabs-wrapper {display: none;}';
		}

		$library_type_label = self::template_label_type($gqv_library_type);
		?>

		<style type="text/css">
			<?php echo ($inline_css); ?>
		</style>
		<?php
		if ('advanced' === $gqv_library_type) {
			return;
		}
		?>
		<div class="elementor-template_library-blank_state">
			<div class="elementor-blank_state">
				<i class="eicon-folder"></i>
				<h2> <?php printf(esc_html__('Create Your First %s', 'webt'), $library_type_label); ?> </h2>
				<p><?php echo esc_html__('Add templates and reuse them across your website. Easily export and import them to any other project, for an optimized workflow.', 'webt'); ?></p>
				<a id="webt-elementor-template-library-add-new" class="elementor-button elementor-button-success" href="#">
					<?php printf(esc_html__('Add New %s', 'elementor'), $library_type_label); ?>
				</a>
			</div>
		</div>
<?php

	}

	/**
	 * get_post
	 *
	 * @return mixed|object
	 */
	public function get_post()
	{
		$args = array(
			'post_type' => self::POST_TYPE,
			'posts_per_page' => 1
		);
		$post = wp_get_recent_posts($args, OBJECT);
		if (!$post) {
			return;
		} else {
			return $post[0];
		}
	}

	/**
	 * Show row meta on the plugin screen.
	 *
	 * @param mixed $links Plugin Row Meta.
	 * @param mixed $file  Plugin Base file.
	 *
	 * @return array
	 */
	public function construct()
	{
		$this->post = $this->get_post();
		$this->add_action_filter();
	}
	// End Class
}
(new WEBT_Admin_Init)->construct();
