<?php
/**
 * Plugin Name: AffiliateWP - Email Affiliate When Referral Paid
 * Plugin URI: http://affiliatewp.com
 * Description: Sends an email to the affiliate when a referral has been paid
 * Author: Andrew Munro
 * Author URI: http://affiliatewp.com
 * Version: 1.0
 */

function affwp_eawrp_affiliate_referral_paid_email( $referral_id, $new_status, $old_status ) {
	
	if ( ! function_exists( 'affiliate_wp' ) || ( 'paid' != $new_status || 'unpaid' != $old_status ) ) {
		return;
	}	

	$referral        = affiliate_wp()->referrals->get_by( 'referral_id', $referral_id );
	$affiliate_id    = $referral->affiliate_id;
	$affiliate_email = affwp_get_affiliate_email( $affiliate_id );
	$amount          = html_entity_decode( affwp_currency_filter( $referral->amount ), ENT_COMPAT, 'UTF-8' );
	$date            = date_i18n( get_option( 'date_format' ), strtotime( $referral->date ) );

	// email subject
	$subject = sprintf( 'Congratulations, your referral for %s has just been paid', $amount );

	// email body
	$message = affwp_eawrp_affiliate_referral_paid_email_body( $affiliate_id, $amount, $date );

	// send mail
	affiliate_wp()->emails->send( $affiliate_email, $subject, $message );
}
add_action( 'affwp_set_referral_status', 'affwp_eawrp_affiliate_referral_paid_email', 10, 3 );

function affwp_eawrp_affiliate_referral_paid_email_body( $affiliate_id, $amount, $date ) {

	$referrals_page = add_query_arg( 'tab', 'referrals', affiliate_wp()->login->get_login_url() );

	$message = sprintf( "Hi %s,", affiliate_wp()->affiliates->get_affiliate_name( $affiliate_id ) ) . "\n\n";
	$message .= sprintf( "We wanted to let you know that your referral for %s from %s has just been paid!", $amount, $date ) . "\n\n";
	$message .= sprintf( "You can view your referrals anytime from your affiliate dashboard: %s", $referrals_page ) . "\n\n";
	$message .= "Keep it up!" . "\n\n";
	$message .= get_bloginfo( 'name' ) . "\n";
	$message .= home_url();

	return $message;
}
