<?php
/**
 * Plugin Name: AffiliateWP - Disable Referrals Per Category In Easy Digital Downloads
 * Plugin URI: http://affiliatewp.com
 * Description: Disable referrals on specific product categories in Easy Digital Downloads
 * Author: Andrew Munro
 * Author URI: http://affiliatewp.com
 * Version: 1.0
 */

function affwp_drpc_edd_disable_referrals_per_category( $referral_amount, $affiliate_id, $amount, $reference, $product_id ) {
 	
 	// Array of categories to disable referrals for. Separate by a comma and use either the term name, term_id, or slug 
	$disabled_categories = array( 'category-one', 5 );

	// Disable referral if product exists in array of categories
	if ( has_term( $disabled_categories, 'download_category', $product_id ) ) {
		$referral_amount = 0.00;
	}

    return $referral_amount;
}
add_filter( 'affwp_calc_referral_amount', 'affwp_drpc_edd_disable_referrals_per_category', 10, 5 );