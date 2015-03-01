<?php
/**
 * Plugin Name: AffiliateWP - Move Login Form Above Register Form
 * Plugin URI: http://affiliatewp.com
 * Description: Swaps the position of the login and register form on the affiliate area
 * Author: Andrew Munro, Sumobi
 * Author URI: http://sumobi.com
 * Version: 1.0
 */

function affwp_custom_move_login_above_register() {
	ob_start();

	if ( is_user_logged_in() && affwp_is_affiliate() ) {
		affiliate_wp()->templates->get_template_part( 'dashboard' );
	} elseif( is_user_logged_in() && affiliate_wp()->settings->get( 'allow_affiliate_registration' ) ) {
		affiliate_wp()->templates->get_template_part( 'register' );
	} else {

		if ( ! is_user_logged_in() ) {
			affiliate_wp()->templates->get_template_part( 'login' );
		}

		if ( affiliate_wp()->settings->get( 'allow_affiliate_registration' ) ) {
			affiliate_wp()->templates->get_template_part( 'register' );
		} else {
			affiliate_wp()->templates->get_template_part( 'no', 'access' );
		}

	}

	return ob_get_clean();
}

$affiliate_wp = function_exists( 'affiliate_wp' ) ? affiliate_wp() : '';

remove_shortcode( 'affiliate_area', array( $affiliate_wp, 'affiliate_area' ) );
add_shortcode( 'affiliate_area', 'affwp_custom_move_login_above_register' );