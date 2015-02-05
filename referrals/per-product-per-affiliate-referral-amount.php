<?php
/**
 * Plugin Name: AffiliateWP - Per Product, Per Affiliate Referral Amount
 * Plugin URI: http://affiliatewp.com
 * Description: Allows you to set a special referral amount for a specific affiliate and product combination
 * Author: Andrew Munro, Sumobi
 * Author URI: http://sumobi.com
 * Version: 1.0
 */

function affwp_custom_per_product_per_affiliate_referral_amount( $referral_amount, $affiliate_id, $amount, $reference, $product_id ) {

	$special_affiliate_id    = 145;
	$special_product_id      = 3133;
	$special_referral_amount = $amount * .8; // 80%

	if ( $special_affiliate_id == $affiliate_id && $special_product_id == $product_id ) {
		$referral_amount = $special_referral_amount;
	}

	return $referral_amount;
}
add_filter( 'affwp_calc_referral_amount', 'affwp_custom_per_product_per_affiliate_referral_amount', 10, 5 );