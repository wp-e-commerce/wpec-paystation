<?php
/*
Plugin Name: WP eCommerce Paystation Gateway
Plugin URI: https://wpecommerce.org
Version: 1.0
Author: WP eCommerce
Description: A plugin that allows the store owner to process payments using Paystation
Author URI:  https://wpecommerce.org
*/

define( 'WPECPSTN_VERSION', '1.0' );
define( 'WPECPSTN_PRODUCT_ID', '' );

if ( ! defined( 'WPECPSTN_PLUGIN_DIR' ) ) {
	define( 'WPECPSTN_PLUGIN_DIR', dirname( __FILE__ ) );
}
if ( ! defined( 'WPECPSTN_PLUGIN_URL' ) ) {
	define( 'WPECPSTN_PLUGIN_URL', plugin_dir_url( __FILE__ ) );
}

include_once( WPECPSTN_PLUGIN_DIR . '/includes/functions.php' );

function wpec_paystation_init() {
	include_once( WPECPSTN_PLUGIN_DIR . '/class-paystation.php');
}
add_action( 'wpsc_init', 'wpec_paystation_init' );

// register the gateway
function wpec_add_paystation_gateway( $nzshpcrt_gateways ) {
	$num = count( $nzshpcrt_gateways ) + 1;
	
	$nzshpcrt_gateways[$num] = array(
		'name' => 'Paystation',
		'api_version' => 2.0,
		'class_name' => 'wpec_merchant_paystation',
		'has_recurring_billing' => false,
		'display_name' => 'Credit Card',	
		'wp_admin_cannot_cancel' => false,
		'requirements' => array(
			'php_version' => 5.0
		),
		'form' => 'wpec_paystation_settings_form',
		'submit_function' => 'wpec_save_paystation_settings',
		'internalname' => 'wpec_paystation',
		'display_name' => "Paystation"
	);
	return $nzshpcrt_gateways; 
}
add_filter( 'wpsc_merchants_modules', 'wpec_add_paystation_gateway', 100 );
?>