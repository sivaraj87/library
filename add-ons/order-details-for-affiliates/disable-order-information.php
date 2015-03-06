<?php
/**
 * Plugin Name: AffiliateWP - Order Details For Affiliates - Disable Order Information
 * Plugin URI: http://affiliatewp.com
 * Description: Disable certain information from showing on the order details tab
 * Author: Andrew Munro, Sumobi
 * Author URI: http://sumobi.com
 * Version: 1.0
 */

function affwp_odfa_disable_order_details( $allowed ) {
	
	$allowed['customer_name']             = false;
	$allowed['customer_email']            = false;
	$allowed['customer_shipping_address'] = false;
	$allowed['customer_billing_address']  = false;
	$allowed['order_number']              = false;
	$allowed['order_total']               = false;
	$allowed['order_date']                = false;
	$allowed['referral_amount']           = false;
	$allowed['customer_phone']            = false;

	return $allowed;
}
add_filter( 'affwp_odfa_allowed_details', 'affwp_odfa_disable_order_details' );