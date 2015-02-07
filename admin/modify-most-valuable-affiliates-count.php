<?php
/**
 * Plugin Name: AffiliateWP - Modify Most Valuable Affiliate Count On Overview
 * Plugin URI: http://affiliatewp.com
 * Description: Modifies the number of most valuable affiliates shown on the overview page
 * Author: Andrew Munro, Sumobi
 * Author URI: http://sumobi.com
 * Version: 1.0
 */

// Change how many most valuable affiliates are shown on the overview page

function affwp_custom_overview_most_valuable_affiliates( $args ) {

	$args['number'] = 10; // increase to 10
	return $args;

}
add_filter( 'affwp_overview_most_valuable_affiliates', 'affwp_custom_overview_most_valuable_affiliates' );