<?php

namespace App\PageTemplates;

class PageTemplate
{
    /**
     * hooks
     * Woocomerce Page abd endpoint template hooks
     *
     * @return void
     */
    public function hooks()
    {
        add_filter('template_include', [$this, 'redirect_woocommerce_page_template']);
    }

    /**
     * Elementor Page Template Path
     * get_page_template_path
     *
     * @param  mixed $page_template
     * @return void
     */
    public function get_page_template_path($page_template)
    {
        $template_path = '';
        switch ($page_template) {
            case 'elementor_header_footer':
                $template_path = WEBT_TEMPLATE_PATH . 'page-templates/templates/header-footer.php';
                break;
            case 'elementor_canvas':
                $template_path = WEBT_MODULES_PATH . 'page-templates/templates/canvas.php';
                break;
        }

        return $template_path;
    }

    /**
     * Woocommerce Pages Redirect
     * redirect_woocommerce_page_template
     *
     * @param  mixed $template
     * @return void
     */
    public function redirect_woocommerce_page_template($template)
    {
        $page_template_id = '';
        $webt_checkout_template_id = get_option('webt_checkout_template_id', '');
        $webt_cart_template_id = get_option('webt_cart_template_id', '');
        $webt_cart_empty_template_id = get_option('webt_cart_empty_template_id', '');
        $webt_myaccount_template_id = get_option('webt_myaccount_template_id', '');

        if (is_cart()) {
            if (WC()->cart->is_empty()) {
                if (!empty($webt_cart_empty_template_id)) {
                    $page_template_id = get_page_template_slug($webt_cart_empty_template_id);
                }
            } else {
                if (!empty($webt_cart_template_id)) {
                    $page_template_id = get_page_template_slug($webt_cart_template_id);
                }
            }
        } elseif (is_checkout()) {
            if (!empty($webt_checkout_template_id)) {
                $page_template_id = get_page_template_slug($webt_checkout_template_id);
            }
        } elseif (is_account_page() && is_user_logged_in()) {
            if (!empty($webt_myaccount_template_id)) {
                $page_template_id = get_page_template_slug($webt_myaccount_template_id);
            }
        }

        if (!empty($page_template_id)) {
            $template_path = $this->get_page_template_path($page_template_id);
            if ($template_path) {
                $template = $template_path;
            }
        }

        return $template;
    }
}
(new PageTemplate)->hooks();