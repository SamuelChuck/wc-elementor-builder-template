<?php

namespace WEBT\App\PageTemplates;

use WEBT\Plugin;

class Downloads
{
    /**
     * hooks
     * Woocomerce MyAccount Download template hooks
     *
     * @return void
     */
    public function hooks()
    {
        add_filter('wc_get_template', [$this, 'myaccount_downloads_endpoint_template'], 100, 5);
        add_action('webt_woocommerce_account_downloads_content', [$this, 'the_account_downloads_content']);
        add_action('webt_woocommerce_account_no_downloads_content', [$this, 'the_account_no_downloads_content']);
        add_action('webt_woocommerce_view_downloads_content', [$this, 'the_view_downloads_content']);
    }

    /**
     * myaccount_downloads_endpoint_template
     * Woocommwece MyAccount Downloads endpoint template replace
     *
     * @param  mixed $located
     * @param  mixed $name
     * @param  mixed $args
     * @return void
     */
    public function myaccount_downloads_endpoint_template($located, $name, $args)
    {
        $webt_account_downloads_template_id = get_option('webt_account_downloads_template_id', '');
        $webt_account_no_downloads_template_id = get_option('webt_account_no_downloads_template_id', '');

        if ($name === 'myaccount/downloads.php') {
            if (!empty($webt_account_downloads_template_id) || !empty($webt_account_no_downloads_template_id)) {
                $located = WEBT_TEMPLATE_PATH . 'myaccount/downloads.php';
            }
            if ($webt_account_downloads_template_id === $webt_account_no_downloads_template_id) {
                return $located;
            }
        }

        return $located;
    }

    /**
     * My Downloads Content
     * the_account_downloads_content
     *
     * @param  mixed $content
     * @return void
     */
    public function the_account_downloads_content($content)
    {
        $webt_account_downloads_template_id = get_option('webt_account_downloads_template_id', '');

        if (is_user_logged_in() && !empty($webt_account_downloads_template_id)) {
            echo Plugin::elementor_instance()->frontend->get_builder_content_for_display($webt_account_downloads_template_id);
        } else {
            the_content();
        }
    }

    /**
     * the_account_no_downloads_content
     *
     * @param  mixed $content
     * @return void
     */
    public function the_account_no_downloads_content($content)
    {
        $webt_account_no_downloads_template_id = get_option('webt_account_no_downloads_template_id', '');

        if (is_user_logged_in() && !empty($webt_account_no_downloads_template_id)) {
            echo Plugin::elementor_instance()->frontend->get_builder_content_for_display($webt_account_no_downloads_template_id);
        } else {
            the_content();
        }
    }
}
(new Downloads)->hooks();