<?php
/**
 * Plugin Name: AffiliateWP - Override OptimizeMember redirects
 * Plugin URI: http://affiliatewp.com
 * Description: OptimizeMember overrides the login redirects. This makes sure affiliates are redirected to their affiliate area.
 * Author: Andrew Munro, Sumobi
 * Author URI: http://sumobi.com
 * Version: 1.0
 */

function affwp_override_optimize_member_login_redirect( $return, $vars ) {

	$user_id = $vars['user_id'];

	if ( function_exists( 'affwp_is_affiliate' ) && affwp_is_affiliate( $user_id ) ) {
		$return = false;
	}
	
	return $return;
}
add_filter( 'ws_plugin__optimizemember_login_redirect', 'affwp_override_optimize_member_login_redirect', 10, 2 );