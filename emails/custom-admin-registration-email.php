<?php
/**
 * Plugin Name: AffiliateWP - Custom Admin Registration Email
 * Plugin URI: http://affiliatewp.com
 * Description: Adds the Affiliate's Email and Affiliate ID to the admin registration email
 * Author: Andrew Munro
 * Author URI: http://affiliatewp.com
 * Version: 1.0
 */
function affwp_custom_registration_email( $message, $args ) {

	$user_info          = get_userdata( affwp_get_affiliate_user_id( $args['affiliate_id'] ) );
	$user_url           = $user_info->user_url;
	$promotion_method   = get_user_meta( affwp_get_affiliate_user_id( $args['affiliate_id'] ), 'affwp_promotion_method', true );

	$message  = "A new affiliate has registered on your site, " . home_url() ."\n\n";
	$message .= sprintf( __( 'Name: %s', 'affiliate-wp' ), $args['name'] ) . "\n\n";

	// Affiliate's Email Address
	$message .= sprintf( __( 'Email: %s', 'affiliate-wp' ), affwp_get_affiliate_email( $args['affiliate_id'] ) ) . "\n\n";

	// Affiliate's ID
	$message .= sprintf( __( 'Affiliate ID: %s', 'affiliate-wp' ), $args['affiliate_id'] ) . "\n\n";

	if ( $user_url ) {
		$message .= __( 'Website URL: ', 'affiliate-wp' ) . esc_url( $user_url ) . "\n\n";
	}

	if ( $promotion_method ) {
		$message .= __( 'Promotion method: ', 'affiliate-wp' ) . esc_attr( $promotion_method ) . "\n\n";
	}

	if ( affiliate_wp()->settings->get( 'require_approval' ) ) {
		$message .= sprintf( "Review pending applications: %s\n\n", admin_url( 'admin.php?page=affiliate-wp-affiliates&status=pending' ) );
	}

	return $message;

}
add_filter( 'affwp_registration_email', 'affwp_custom_registration_email', 10, 2 );