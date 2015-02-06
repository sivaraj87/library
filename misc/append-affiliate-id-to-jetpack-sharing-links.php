<?php
/**
 * Plugin Name: AffiliateWP - Append Affiliate ID To Jetpack Sharing Links
 * Plugin URI: http://affiliatewp.com
 * Description: Automatically appends an affiliate's ID to Jetpack sharing links.
 * Author: Andrew Munro, Sumobi
 * Author URI: http://sumobi.com
 * Version: 1.0
 */

function affwp_custom_append_affiliate_id_to_jetpack_sharing_links( $permalink, $post_id, $id ) {
	
	// return if non-affiliate
	if ( ! ( is_user_logged_in() && affwp_is_affiliate() ) ) {
		return $permalink;
	}

	// append referral variable and affiliate ID to sharing links in Jetpack
	$permalink = add_query_arg( affiliate_wp()->tracking->get_referral_var(), affwp_get_affiliate_id(), $permalink );

	return $permalink;

}	
add_filter( 'sharing_permalink', 'affwp_custom_append_affiliate_id_to_jetpack_sharing_links', 10, 3 );