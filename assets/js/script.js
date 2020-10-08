!(function($){
	"use strict";
	
	jQuery(document).ready(function($) {
		if( jQuery('.webt-woocommerce-checkout').find('div.webt_woocommerce_checkout_form-login').length){
			var checkout_login_toggle = jQuery(".webt-woocommerce-checkout .woocommerce-form-login-toggle");
    		var checkout_form_login = jQuery(".webt-woocommerce-checkout form.woocommerce-form-login");
    		jQuery(".webt_woocommerce_checkout_form-login").append(checkout_login_toggle),checkout_login_toggle.show(),checkout_form_login.insertAfter(checkout_login_toggle);
    	}
		if( jQuery('.webt-woocommerce-checkout').find('div.webt_woocommerce_checkout_coupon_form').length){
			var coupon_toggle = jQuery(".webt-woocommerce-checkout .woocommerce-form-coupon-toggle");
    		var coupon_form = jQuery(".webt-woocommerce-checkout form.woocommerce-form-coupon");
    		jQuery(".webt_woocommerce_checkout_coupon_form").append(coupon_toggle),coupon_toggle.show(),coupon_form.insertAfter(coupon_toggle);
		}
	});

})(jQuery);