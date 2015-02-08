<?php
/**
 * Plugin Name: AffiliateWP - Restrict Products To Affiliates
 * Plugin URI: http://affiliatewp.com
 * Description: Allows only certain affiliates to earn commission on certain products.
 * Author: Andrew Munro, Sumobi
 * Author URI: http://sumobi.com
 * Version: 1.0
 */

// Note: if you don't want a $0.00 referral being created, and you don't want the affiliate being notified of a $0.00 referral (if they have they have enabled referral notifications) enable the "Ignore Zero Referrals?" setting from Affiliates → Settings → Misc.

/**
 * Get an array of product IDs and the affiliates who are allowed to earn commission for them
*/
function affwp_custom_get_restricted_products() {

	// add each product ID and an array of affiliate's who can earn commission on it
	$products = array(
		14  => array( 10, 20, 30 ),
		76  => array( 4, 5, 6, 22 )
	);

	return $products;
	
}

/**
 * Check each product ID and see if the affiliate is allowed to earn commission on it
*/
function affwp_custom_calc_referral_amount( $referral_amount, $affiliate_id, $amount, $reference, $product_id ) {
 	
 	// get array of products and affiliates who can earn commission
	$products = affwp_custom_get_restricted_products();

	// check to see if the product is restricted
	$product_match = isset( $products[$product_id] ) ? $products[$product_id] : array();

	if ( ! empty( $product_match ) ) {
		// if affiliate is not allowed to earn commission on this product, create an empty referral
		if ( ! in_array( $affiliate_id, $product_match ) ) {
			$referral_amount = 0.00;
		}
	}

    return $referral_amount;

}
add_filter( 'affwp_calc_referral_amount', 'affwp_custom_calc_referral_amount', 10, 5 );