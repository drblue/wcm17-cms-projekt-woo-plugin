<?php
/**
 * Plugin Name: WCM17 WooCommerce Haxx0r Plugin Mega Wow
 */

if (!defined('ABSPATH')) {
	die( 'No script kiddies please!' );
}

/**
 * Run Plugin Overrides
 */
function wcm_woo_plugin_overrides() {
	/**
	 * Remove 'Add to Cart'-button from Single Product page.
	 */
	// remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 30);

	/**
	 * Add CTA to call for quote.
	 */
	function wcm_woo_single_product_quote_cta() {
		echo "<strong>Call us for a price today!</strong> Special prize for you my friend!";
	}
	// add_action('woocommerce_single_product_summary', 'wcm_woo_single_product_quote_cta', 35);

	/**
	 * Add happy kitten to Admin New Order Email.
	 */
	function wcm_woo_email_header_kitten() {
		?>
			<img src="https://cataas.com/cat/says/Kitten%20says%20thanks!">
		<?php
	}
	add_action('woocommerce_email_header', 'wcm_woo_email_header_kitten', 20);

	/**
	 * Trim zeros in price decimals
	 **/
	add_filter( 'woocommerce_price_trim_zeros', '__return_true' );

	/**
	 * Remove related products output
	 */
	remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20 );
}
add_action('plugins_loaded', 'wcm_woo_plugin_overrides');
