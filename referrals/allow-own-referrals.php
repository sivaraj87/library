<?php
/**
 * Plugin Name: AffiliateWP - Allow Own Referrals
 * Plugin URI: Plugin URI: http://affiliatewp.com
 * Description: Allows an affiliate to use their own referral links and earn a commission
 * Author: Andrew Munro
 * Author URI: http://affiliatewp.com
 * Version: 1.0
 */

add_filter( 'affwp_is_customer_email_affiliate_email', '__return_false' );