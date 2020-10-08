<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

\Elementor\Plugin::$instance->frontend->add_body_class( 'elementor-template-full-width' );

get_header();
/**
 * Before Header-Footer page template content.
 *
 * Fires before the content of Elementor Header-Footer page template.
 *
 * @since 2.0.0
 */
do_action( 'elementor/page_templates/header-footer/before_content' );
// Calc totals.
WC()->cart->calculate_totals();
wp_enqueue_script( 'selectWoo' );
wp_enqueue_script( 'wc-checkout' );
wp_enqueue_script( 'wc-country-select' );
?>
<div class="woocommerce webt-woocommerce-checkout">
<?php 
$checkout = wc()->checkout();
do_action( 'woocommerce_before_checkout_form', $checkout );
?>
<form name="checkout" method="post" class="checkout woocommerce-checkout webt-woocommerce-checkout-form preview-fullwidth" action="<?php echo esc_url( wc_get_checkout_url() ); ?>" enctype="multipart/form-data">
<?php 
\Elementor\Plugin::$instance->modules_manager->get_modules( 'page-templates' )->print_content();
?>
</form>
<?php do_action( 'woocommerce_after_checkout_form', $checkout ); ?>
</div>

<?php
/**
 * After Header-Footer page template content.
 *
 * Fires after the content of Elementor Header-Footer page template.
 *
 * @since 2.0.0
 */
do_action( 'elementor/page_templates/header-footer/after_content' );

get_footer();	