<?php

namespace WEBT\Core\Admin;

/**
 * Show in WP Dashboard notice about the plugin is not activated.
 *
 * @return void
 */
class Notice
{
    
    /**
     * fail_php_version
     * Warning when the site doesn't have the minimum required PHP version.
     * 
     * @package Elementor
     * @return void
     */
    private static function fail_php_version()
    {
        /* translators: %s: PHP version */
        $message = sprintf(esc_html__('Woocommerce Elementor Builder Template requires PHP version %s+, plugin is currently <b>NOT RUNNING</b>.', 'elementor'), '5.6');
        $html_message = sprintf('<div class="error">%s</div>', wpautop($message));
        echo wp_kses_post($html_message);
    }
    
    /**
     * fail_wp_version
     * Warning when the site doesn't have the minimum required WordPress version.
     * 
     * @package Elementor
     * @return void
     */
    private static function fail_wp_version()
    {
        /* translators: %s: WordPress version */
        $message = sprintf(esc_html__('Woocommerce Elementor Builder Template requires WordPress version %s+. Because you are using an earlier version, the plugin is currently <b>NOT RUNNING</b>.', 'elementor'), '5.0');
        $html_message = sprintf('<div class="error">%s</div>', wpautop($message));
        echo wp_kses_post($html_message);
    }
    
    /**
     * fail_load_admin_notice
     *
     * @return void
     */
    public static function fail_load_admin_notice()
    {

        // Leave to Elementor Pro to manage this.
        if (function_exists('elementor_pro_load_plugin')) {
            return;
        }

        $screen = get_current_screen();
        if (isset($screen->parent_file) && 'plugins.php' === $screen->parent_file && 'update' === $screen->id) {
            return;
        }

        if ('true' === get_user_meta(get_current_user_id(), '_webt_install_notice', true)) {
            return;
        }

         $plugin_names = [];

        if (!class_exists('woocommerce')) {

            array_push($plugin_names, 'woocommerce');

        }
        
        if (!did_action('elementor/loaded')) {
            array_push($plugin_names, 'elementor');
        }
        
        foreach ($plugin_names as $plugin_name) {

            $plugin = $plugin_name . '/' . $plugin_name . '.php';
            $installed_plugins = get_plugins();
            $is_installed = isset($installed_plugins[$plugin]);

            if ($is_installed) {
                if (!current_user_can('activate_plugins')) {
                    return;
                }

                $message = __('WooCommerce Elementor Builder Template requires '. ucwords($plugin_name) .' plugin to be installed and activated on your site', 'webt');

                $button_text = __('Activate '. ucwords($plugin_name) , 'webt');
                $button_link = wp_nonce_url('plugins.php?action=activate&plugin=' . $plugin . '&plugin_status=all&paged=1&s', 'activate-plugin_' . $plugin);
            } else {
                if (!current_user_can('install_plugins')) {
                    return;
                }
                $message = __('WooCommerce Elementor Builder Template requires '. ucwords($plugin_name) .' plugin to be installed and activated on your site', 'webt');

            //    $message = __(' We recommend you use it together with Elementor Website Builder plugin, they work perfectly together!', 'skeletor');
        
                $button_text = __('Install '. ucwords($plugin_name) , 'skeletor');
                $button_link = wp_nonce_url(self_admin_url('update.php?action=install-plugin&plugin=' . $plugin_name ), 'install-plugin_' . $plugin_name );
            }

?>
            <div class="notice updated is-dismissible webt-notice webt-install-elementor">
                <div class="webt-notice-inner">
                    <div class="webt-notice-icon">
                        <img src="<?php echo esc_url(WEBT_ASSETS_URL . '/' . 'images' . '/' . $plugin_name .'_logo_gradient' . '.png'); ?>" width='60px' alt="Elementor Logo" />
                    </div>

                    <div class="webt-notice-content">
                        <h3 ><?php esc_html_e('Thanks for installing WooCommerce Elementor Builder Template!', 'webt'); ?></h3>
                        <p>
                            <p><?php echo esc_html($message); ?></p>
                            <a href=<?php echo esc_url("https://".$plugin_name.".com/"); ?> target="_blank"><?php esc_html_e('Learn more about '. ucwords($plugin_name), 'webt'); ?></a>
                        </p>
                    </div>

                    <div class="webt-install ">
                        <a class="button button-primary webt-install webt-install-button" href="<?php echo esc_attr($button_link); ?>"><i class="dashicons dashicons-download"></i><?php echo esc_html($button_text); ?></a>
                    </div>
                </div>
            </div>
        <?php
        }
    }

    public static function enqueue_style_script()
    { 
        ?>
        <style>
            .notice.webt-notice{border-left-color:#9b0a46!important;padding:20px}.rtl .notice.webt-notice{border-right-color:#9b0a46!important}.notice.webt-notice .webt-notice-inner{display:table;width:100%}.notice.webt-notice .webt-notice-inner .webt-install,.notice.webt-notice .webt-notice-inner .webt-notice-content,.notice.webt-notice .webt-notice-inner .webt-notice-icon{display:table-cell;vertical-align:middle}.notice.webt-notice .webt-notice-icon{color:#9b0a46;font-size:50px;width:50px}.notice.webt-notice .webt-notice-content{padding:0 20px}.notice.webt-notice p{padding:0;margin:0}.notice.webt-notice h3{margin:0 0 5px}.notice.webt-notice .webt-install{text-align:center}.notice.webt-notice .webt-install.webt-install-button{padding:5px 30px;height:auto;line-height:20px;text-transform:capitalize}.notice.webt-notice .webt-install.webt-install-button i{padding-right:5px}.rtl .notice.webt-notice .webt-install.webt-install-button i{padding-right:0;padding-left:5px}.notice.webt-notice .webt-install.webt-install-button:active{transform:translateY(1px)}@media (max-width:767px){.notice.webt-notice{padding:10px}.notice.webt-notice .webt-notice-inner{display:block}.notice.webt-notice .webt-notice-inner .webt-notice-content{display:block;padding:0}.notice.webt-notice .webt-notice-inner .webt-install,.notice.webt-notice .webt-notice-inner .webt-notice-icon{display:none}}
        </style>
        <script>
            jQuery(function($) {
                $('div.notice.webt-install-elementor').on('click', 'button.notice-dismiss', function(event) {
                    event.preventDefault();

                    $.post(ajaxurl, {
                        action: 'webt_set_admin_notice_viewed'
                    });
                });
            });
        </script>
        <?php
    }

    public static function ajax_set_admin_notice_viewed()
    {
        update_user_meta(get_current_user_id(), '_webt_install_notice', 'true');
        exit;
    }

    public function __construct()
    {
        add_action('admin_enqueue_scripts', [ __CLASS__ , 'enqueue_style_script',]);
        add_action('admin_notices', [ __CLASS__ , 'fail_load_admin_notice']);
        add_action('wp_ajax_webt_set_admin_notice_viewed', [ __CLASS__, 'ajax_set_admin_notice_viewed']);

    }
}
