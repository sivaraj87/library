<?php
/**
 * Plugin Name: AffiliateWP - Modify First Referral Commission Amount
 * Plugin URI: Plugin URI: http://affiliatewp.com
 * Description: Modify an affiliate's commission rate for their very first referral. All other subsequent referrals will be recorded at the default rate.
 * Author: Andrew Munro
 * Author URI: http://affiliatewp.com
 * Version: 1.0
 */

/**
 * Example One
 *
 * Give the affiliate a 50% commission for each product, but only for their very first referral
 */
function affwp_modify_first_referral_pecentage_amount( $referral_amount, $affiliate_id, $amount, $reference, $product_id ) {
	
	// get the affiliate's referrals
	$referrals = affiliate_wp()->referrals->get_referrals( array( 'affiliate_id' => $affiliate_id ) );

	// if they haven't made a referral before, give them 50% commission on each product
	if ( empty( $referrals ) ) {
		$referral_amount = $amount * 0.5; // 50%
	}

	return $referral_amount;
}
add_filter( 'affwp_calc_referral_amount', 'affwp_modify_first_referral_pecentage_amount', 10, 5 );

/**
 * Example Two
 *
 * Give the affiliate a $10 commission for each product, but only for their very first referral
 */
function affwp_modify_first_referral_flat_amount( $referral_amount, $affiliate_id, $amount, $reference, $product_id ) {
	
	// get the affiliate's referrals
	$referrals = affiliate_wp()->referrals->get_referrals( array( 'affiliate_id' => $affiliate_id ) );

	// if they haven't made a referral before, give them $10.00 on each product
	if ( empty( $referrals ) ) {
		$referral_amount = 10.00; // $10.00
	}

	return $referral_amount;
}
add_filter( 'affwp_calc_referral_amount', 'affwp_modify_first_referral_flat_amount', 10, 5 );