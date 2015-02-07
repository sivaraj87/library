<?php
/**
 * Plugin Name: AffiliateWP - Modify Recent Referrals Count On Overview
 * Plugin URI: http://affiliatewp.com
 * Description: Modifies how many recent referrals are shown on the overview page
 * Author: Andrew Munro, Sumobi
 * Author URI: http://sumobi.com
 * Version: 1.0
 */

function affwp_custom_overview_recent_referrals( $args ) {

	$args['number'] = 10; // increase to 10
	return $args;

}
add_filter( 'affwp_overview_recent_referrals', 'affwp_custom_overview_recent_referrals' );