<?php

/**
 * Functions 
 * 
 * @Woocommerce  $template_path, $last_order 
 * 
 * @since 1.0.0
 */

if (!defined('ABSPATH')) {
  exit;
}

add_action('wp_ajax_webt_single_product_calc_amount_saved', 'webt_single_product_calc_amount_saved');
// display calculation for logged in users 
add_action('wp_ajax_nopriv_webt_single_product_calc_amount_saved', 'webt_single_product_calc_amount_saved');
//display for non logged in users //The function below is called via an ajax script in footer.php function 
//This is how you hook a function called by ajax, in WordPress

//The function below is called via an ajax script in footer.php
function webt_single_product_calc_amount_saved()
{
  // The $_REQUEST contains all the data sent via ajax
  if (isset($_REQUEST) && !empty($_REQUEST['vari_id'])) {
    $percentage = 0;
    $variation_id = sanitize_text_field($_REQUEST['vari_id']);
    $variable_product = wc_get_product($variation_id);
    $regular_price = $variable_product->get_regular_price();
    $sale_price = $variable_product->get_sale_price();

    if (!empty($sale_price)) {

      $amount_saved = $regular_price - $sale_price;
      $currency_symbol = get_woocommerce_currency_symbol();

      $percentage = round((($regular_price - $sale_price) / $regular_price) * 100);
    }
    die($percentage);
  }
  ///
  $percentage = 0;
  $product = wc_get_product();
  $regular_price = $product->get_regular_price();
  $sale_price = $product->get_sale_price();

  if (!empty($sale_price)) {

    $amount_saved = $regular_price - $sale_price;
    $currency_symbol = get_woocommerce_currency_symbol();

    $percentage = round((($regular_price - $sale_price) / $regular_price) * 100);
  }
  return $percentage;
}

/* -------------------- Overide Woocommerce template path ------------------- */

function webt_woocommerce_locate_template($template, $template_name, $template_path)
{
  global $woocommerce;

  $_template = $template;

  if (!$template_path) $template_path = $woocommerce->template_url;

  $plugin_path  = WEBT_PATH . 'woocommerce/';

  // Look within passed path within the theme - this is priority
  $template = locate_template(

    array(
      $template_path . $template_name,
      $template_name
    )
  );

  // Modification: Get the template from this plugin, if it exists
  if (!$template && file_exists($plugin_path . $template_name))
    $template = $plugin_path . $template_name;

  // Use default template
  if (!$template)
    $template = $_template;

  // Return what we found
  return $template;
}
add_filter('woocommerce_locate_template', 'webt_woocommerce_locate_template', 10, 3);
