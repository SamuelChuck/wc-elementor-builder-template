<?php

namespace WEBT;

use WEBT\Core\Admin\Notice;
use WEBT\TemplateLibrary\Manager;
use WEBT\Core\Admin;


/**
 * Webt plugin.
 *
 * The main plugin handler class is responsible for initializing Webt. The
 * class registers and all the components required to run the plugin.
 *
 * @since 1.0.0
 */
class Plugin
{

    /**
     * Instance.
     *
     * Holds the plugin instance.
     *
     * @since 1.0.0
     * @access public
     * @static
     *
     * @var Plugin
     */
    public static $instance = null;

    /**
     * elementor_instance
     *
     * Holds the Elementor plugin instance.
     *
     * @since 1.0.0
     * @access public
     * @static
     *
     * @var Plugin
     */
    public static $elementor_instance;

    /**
     * Clone.
     *
     * Disable class cloning and throw an error on object clone.
     *
     * The whole idea of the singleton design pattern is that there is a single
     * object. Therefore, we don't want the object to be cloned.
     *
     * @access public
     * @since 1.0.0
     */
    public function __clone()
    {
        // Cloning instances of the class is forbidden.
        _doing_it_wrong(__FUNCTION__, esc_html__('Something went wrong.', 'webt'), '1.0.0');
    }

    /**
     * Wakeup.
     *
     * Disable unserializing of the class.
     *
     * @access public
     * @since 1.0.0
     */
    public function __wakeup()
    {
        // Unserializing instances of the class is forbidden.
        _doing_it_wrong(__FUNCTION__, esc_html__('Something went wrong.', 'webt'), '1.0.0');
    }

    /**
     * Instance.
     *
     * Ensures only one instance of the plugin class is loaded or can be loaded.
     *
     * @since 1.0.0
     * @access public
     * @static
     *
     * @return Plugin An instance of the class.
     */
    public static function instance()
    {
        if (is_null(self::$instance)) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    /**
     * Elementor Instance.
     *
     * Ensures only one instance of the plugin class is loaded or can be loaded.
     *
     * @since 1.0.0
     * @access public
     * @static
     *
     * @return Plugin An instance of the class.
     */
    public static function elementor_instance()
    {
       return \Elementor\Plugin::$instance;
    }


    /**
     * admin_notices
     * Responsible for loading All admin notices
     * 
     * @return void
     */
    protected static function admin_notices()
    {
        require_once(WEBT_CORE_PATH . 'admin/admin-notice.php');

        if (!version_compare(PHP_VERSION, '5.6', '>=')) {
            add_action('admin_notices', [__CLASS__, 'fail_php_version']);
        } elseif (!version_compare(get_bloginfo('version'), '5.0', '>=')) {
            add_action('admin_notices', [__CLASS__, 'fail_wp_version']);
        } else {

            /**
             * Before Webt is loaded.
             *
             * Fires when Webt was fully loaded and instantiated with no major issues.
             *
             * @since 1.0.0
             */
            if (!did_action('webt/loaded')) {
                do_action('webt/before/loaded');
            }

            /**
             * Webt loaded.
             *
             * Fires when Webt was fully loaded and instantiated with no major issues.
             *
             * @since 1.0.0
             */
            do_action('webt/loaded');

            /**
             * After Webt is loaded.
             *
             * Fires when Webt was fully loaded and instantiated with no major issues.
             *
             * @since 1.0.0
             */
            if (did_action('webt/loaded')) {
                do_action('webt/after/loaded');
            }
        }

        if (!class_exists('woocommerce') || !did_action('elementor/loaded')) {
            (new Notice);
        }
    }

    public function actions_hooks_filters()
    {

        add_action('after_setup_theme', array($this, 'include_template_functions'), 11);
    }

    /**
     * autoloader.
     *
     * Autoloader loads all the files needed to run the plugin.
     *
     * @since 1.6.0
     * @access private
     */
    public function autoloader()
    {

        if (did_action('webt/loaded')) {
            $this->includes();
            $this->core();
            $this->modules();
        }

        if (did_action('elementor/loaded')) {
            self::$elementor_instance;
        }
    }

    /**
     * includes
     * Load all includes files
     * 
     * @access private
     * @return void
     */
    private function includes()
    {
        require(WEBT_INCLUDES_PATH . 'template-library/manager.php');
        Manager::run();
        require(WEBT_INCLUDES_PATH . 'widgets/widget.php');
    }

    /**
     * core
     * Load core files
     *
     * @access private
     * @return void
     */
    private function core()
    {
        require_once(WEBT_CORE_PATH . 'functions/functions.php');
        if (is_admin()) {
            require_once(WEBT_CORE_PATH . 'admin/admin-init.php');
        }
        require_once(WEBT_CORE_PATH . 'frontend/classes/class-wc-cart.php');
        require(WEBT_CORE_PATH . '/common/main.php');
        require_once(WEBT_CORE_PATH . 'app/app.php');
    }

    /**
     * modules
     * Load all Modules
     * 
     * @access private
     * @return void
     */
    private function modules()
    {
        require(WEBT_MODULES_PATH . 'library/module.php');
    }

    /**
     * Plugin constructor.
     *
     * Initializing Elementor plugin.
     *
     * @since 1.0.0
     * @access private
     */
    protected function __construct()
    {
        $this->admin_notices();
        $this->autoloader();
    }
}

Plugin::instance();
