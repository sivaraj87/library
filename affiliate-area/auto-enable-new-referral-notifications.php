<?php
/**
 * Plugin Name: AffiliateWP - Auto Enable Affiliate Referral Notifications
 * Plugin URI: http://affiliatewp.com
 * Description: Auto enables the "Enable New Referral Notifications" checkbox on the "Settings" tab of the affiliate area when an affiliate is added
 * Author: Andrew Munro
 * Author URI: http://affiliatewp.com
 * Version: 1.0
 */

function affwp_custom_auto_enable_affiliate_referral_notifications( $add ) {
	update_user_meta( affwp_get_affiliate_user_id( $add ), 'affwp_referral_notifications', true );
}
add_action( 'affwp_insert_affiliate', 'affwp_custom_auto_enable_affiliate_referral_notifications' );
