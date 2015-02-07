<?php
/**
 * Plugin Name: AffiliateWP - Modify Recent Referral Visit Count On Overview
 * Plugin URI: http://affiliatewp.com
 * Description: Modifies the number of recent referral visits shown on the overview page
 * Author: Andrew Munro, Sumobi
 * Author URI: http://sumobi.com
 * Version: 1.0
 */

function affwp_custom_overview_recent_referral_visits( $args ) {

	$args['number'] = 20; // increase to 20
	return $args;

}
add_filter( 'affwp_overview_recent_referral_visits', 'affwp_custom_overview_recent_referral_visits' );
