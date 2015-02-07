<?php
/**
 * Plugin Name: AffiliateWP - Modify Latest Affiliate Registration Count On Overview
 * Plugin URI: http://affiliatewp.com
 * Description: Modifies how many latest affiliate registrations are shown on the overview page
 * Author: Andrew Munro, Sumobi
 * Author URI: http://sumobi.com
 * Version: 1.0
 */

function affwp_custom_overview_latest_affiliate_registrations( $args ) {

	$args['number'] = 10; // increase to 10
	return $args;

}
add_filter( 'affwp_overview_latest_affiliate_registrations', 'affwp_custom_overview_latest_affiliate_registrations' );