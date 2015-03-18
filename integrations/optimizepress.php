<?php
/**
 * Plugin Name: AffiliateWP - OptimizePress Integration
 * Plugin URI: http://affiliatewp.com
 * Description: Integrates AffiliateWP with OptimizePress
 * Author: Pippin Williamson and Andrew Munro
 * Author URI: http://affiliatewp.com
 * Version: 1.0
 */

/**
 * OptimizePress integration
 * Uses the conversion script, see: http://docs.affiliatewp.com/article/77-affiliate-conversion-script
 *
 * @since 1.0
 */
function affwp_opi_add_tracking_shortcode() {
	
	// this can be the page ID, page slug, or page title. Page title is shown below
	if ( is_page( 'Your Success Page' ) ) {
		echo do_shortcode( '[affiliate_conversion_script description="Your Description" amount="100"]' );
	}

}
add_action( 'wp_head', 'affwp_opi_add_tracking_shortcode' );