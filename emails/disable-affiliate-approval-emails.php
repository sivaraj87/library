<?php
/**
 * Plugin Name: AffiliateWP - Disable Affiliate Approval Email
 * Plugin URI: http://affiliatewp.com
 * Description: Prevents affiliate approval emails being sent
 * Author: Andrew Munro
 * Author URI: http://affiliatewp.com
 * Version: 1.0
 */

// AffiliateWP v1.6+ required
remove_action( 'affwp_set_affiliate_status', 'affwp_notify_on_approval', 10, 3 );