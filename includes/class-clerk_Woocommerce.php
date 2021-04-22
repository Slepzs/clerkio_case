<?php

defined( 'ABSPATH' ) || exit;

class clerk_Woocommerce {



	public static function isWoocommerceActive() {
		/**
		 * Check if WooCommerce is active
		 **/
		if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
			return true;
		}
		return false;

	}

	public static function singleOrMultiple($count, $name) {
		if(substr($name, -1) !== 'y') {
			$s = 's';
		} else {
			$name = substr($name, 0, -1);
			$s = 'ies';
		}

		if($count !== 1) {
			return "${count} ${name}${s}";
		}

		return "${count} ${name}";


	}

	public static function woo_version_number() {
		// Use global woocommerce object fond in woocommerce.php
		global $woocommerce;

		// Get Current version
		return $woocommerce->version;

	}


	public static function woo_amount_of_products() {

		// Checking if function exists before use.
		if ( !function_exists( 'wc_get_products' ) ) {
			require_once '/includes/wc-product-functions.php';
		}

		// Array of args
		$args = array();
		// Get amount of products.
		$length = count(wc_get_products($args));

		return $length > 0 ? $length : 0;


	}

	public static function woo_cats() {

		$args = array();

		return $product_categories = get_terms( 'product_cat', $args );


	}

	public static function woo_amount_of_orders() {

		// Checking if function exists before use.
		if ( ! function_exists( 'wc_get_orders' ) ) {
			require_once '/includes/wc-product-functions.php';
		}

		// Empty array because functions takes array as augment.
		$args = array();
		// Get amount of products.
		$length = count(wc_get_orders($args));

		return $length > 0 ? $length : 0;


	}


}