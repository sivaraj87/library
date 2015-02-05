<?php
/**
 * Plugin Name: AffiliateWP - Add a new currency
 * Plugin URI: http://affiliatewp.com
 * Description: Adds a new currency to AffiliateWP
 * Author: Andrew Munro, Sumobi
 * Author URI: http://sumobi.com
 * Version: 1.0
 */
 
function affwp_custom_add_currency( $currencies ) {
	$currencies['KRW'] = 'South Korean Won (KRW)';
	return $currencies;
}
add_filter( 'affwp_currencies', 'affwp_custom_add_currency' );