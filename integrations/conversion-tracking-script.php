<?php
/**
 * Plugin Name: AffiliateWP - Conversion Tracking Script
 * Plugin URI: http://affiliatewp.com/
 * Description: Demonstrates how to load the conversion tracking script via code
 * Author: Andrew Munro, Sumobi
 * Author URI: http://sumobi.com
 * Version: 1.0
 */

/**
 * The [affiliate_conversion_script] shortcode uses the same affiliate_wp()->tracking->conversion_script() function shown below
 * See http://docs.affiliatewp.com/article/77-affiliate-conversion-script for more information on parameters
 */
function affwp_conversion_tracking_script() {

	// Make sure the script only runs on our "thanks" page. Change the ID to match your WordPress page ID.
	if ( ! is_page( 6057 ) ) {
		return;
	}

	// the default status of the referral
	$status  = 'unpaid';

	// The order total. Optional. If no amount is passed the referral will be created at 0.00
	$amount = 100;

	// The order number. Optional.
	$reference = '1234';

	// Pass a string of product/s that were purchased or any other description here. Optional
	$description = 'Product One, Product Two, Product Three';

	// Referral arguments
	$args = array(
		'amount'      => $amount,
		'status'      => $status,
		'reference'   => $reference,
		'description' => $description,
	);

	// add the conversion script to the page
	affiliate_wp()->tracking->conversion_script( $args );
}
add_action( 'wp_head', 'affwp_conversion_tracking_script' );