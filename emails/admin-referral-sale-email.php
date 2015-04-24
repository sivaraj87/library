<?php
/**
 * Plugin Name: AffiliateWP - Referral Sale Email
 * Plugin URI: http://affiliatewp.com
 * Description: Sends an email to the admin when a referral sale is made. Contains order ID, affiliate's name, referral amount, products that generated commission and how much commission each product generated. 
 * Author: Andrew Munro
 * Author URI: http://affiliatewp.com
 * Version: 1.0
 */

/**
 * Send referral email to admin
 * Requires AffiliateWP v1.6+
 */
function affwp_custom_referral_sale_email( $add ) {

	$emails  = new Affiliate_WP_Emails;

	$referral = affwp_get_referral( $add );
	
	$affiliate_id = $referral->affiliate_id;
	$context      = $referral->context;
	$reference    = $referral->reference;
	$products     = $referral->products;

	switch ( $context ) {

		case 'edd':
			$link = esc_url( admin_url( 'edit.php?post_type=download&page=edd-payment-history&view=view-order-details&id=' . $reference ) );
			break;

		case 'woocommerce':
			$link = esc_url( admin_url( 'post.php?post=' . $reference . '&action=edit' ) );
			break;	
		
		default:
			$link = '';
			break;
			
	}

	$email   = apply_filters( 'affwp_registration_admin_email', get_option( 'admin_email' ) );
	$amount  = html_entity_decode( affwp_currency_filter( $referral->amount ), ENT_COMPAT, 'UTF-8' );

	$subject = __( 'New referral sale!', 'affiliate-wp' );

	$message  = __( 'Congratulations!', 'affiliate-wp' ) . "\n\n";
	$message .= __( 'You have just received a new referral sale:', 'affiliate-wp' ) . "\n\n";
	
	if ( $link ) {
		$message .= sprintf( __( 'Order: %s ', 'affiliate-wp' ), '<a href="' . $link . '">#' . $reference . '</a>' ) . "\n";
	} else {
		$message .= sprintf( __( 'Order: #%s ', 'affiliate-wp' ), $reference ) . "\n";
	}

	$message .= sprintf( __( 'Affiliate Name: %s ', 'affiliate-wp' ), affiliate_wp()->affiliates->get_affiliate_name( $affiliate_id ) ) . "\n";
	$message .= sprintf( __( 'Referral amount: %s ', 'affiliate-wp' ), $amount ) . "\n\n";
	
	$message .= __( 'Products that earned commission:', 'affiliate-wp' ) . "\n\n";

	if ( $products ) {
		foreach ( $products as $product ) {

			$referral_amount  = html_entity_decode( affwp_currency_filter( affwp_format_amount( $product['referral_amount'] ) ), ENT_COMPAT, 'UTF-8' );

			$message .= '<strong>' . $product['name'] . '</strong>' . "\n";
			$message .= sprintf( __( 'Referral Amount: %s ', 'affiliate-wp' ), $referral_amount ) . "\n\n";
		}
	}
	
	$emails->send( $email, $subject, $message );

}
add_action( 'affwp_insert_referral', 'affwp_custom_referral_sale_email' );