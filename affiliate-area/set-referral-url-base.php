<?php
/**
 * Plugin Name: AffiliateWP - Set Referral URL In Affiliate Area
 * Plugin URI: http://affiliatewp.com
 * Description: Sets the URLs shown to affiliates in the Affiliate URLs tab of the Affiliate Area
 * Author: Andrew Munro, Sumobi
 * Author URI: http://sumobi.com
 * Version: 1.0
 */

function affwp_custom_set_referral_url_base( $base_url ) {
	
	// Change the URL below
	// You can also use use a full URL, for example: return http://mysite.com/my-product/
	return site_url( '/my-product/' );

}
add_filter( 'affwp_affiliate_referral_url_base', 'affwp_custom_set_referral_url_base' );