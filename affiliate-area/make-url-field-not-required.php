<?php
/**
 * Plugin Name: AffiliateWP - Make URL Field Not Required
 * Plugin URI: http://affiliatewp.com
 * Description: Makes the URL field on the affiliate registration form not required
 * Author: Andrew Munro, Sumobi
 * Author URI: http://sumobi.com
 * Version: 1.0
 */

function affwp_custom_make_url_not_required( $required_fields ) {

	unset( $required_fields['affwp_user_url'] );

	return $required_fields;

}
add_filter( 'affwp_register_required_fields', 'affwp_custom_make_url_not_required' );