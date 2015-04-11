<?php
/**
 * Plugin Name: AffiliateWP - Modify From Name And From Address
 * Plugin URI: http://affiliatewp.com
 * Description: Changes the from name and from email address in affiliate emails
 * Author: Andrew Munro
 * Author URI: http://affiliatewp.com
 * Version: 1.0
 */

/**
 * Change the from email from name of affiliate emails
 */
function affwp_custom_email_from_name() {
	// enter your new from name
	return 'Affiliates - Your Site Name';
}
add_filter( 'affwp_email_from_name', 'affwp_custom_email_from_name' );

/**
 * Change the from email address of affiliate emails
 */
function affwp_custom_affwp_email_from_address() {
	return 'affiliates@yourdomain.com';
}
add_filter( 'affwp_email_from_address', 'affwp_custom_affwp_email_from_address' );