<?php
/**
 * Plugin Name: AffiliateWP - Order Details For Affiliates Shortcode
 * Plugin URI: http://affiliatewp.com
 * Description: Adds an [affiliate_area_order_details] shortcode
 * Author: Andrew Munro, Sumobi
 * Author URI: http://sumobi.com
 * Version: 1.0
 */

/**
* [affiliate_area_order_details] shortcode
*/
function affwp_aas_order_details_shortcode( $atts, $content = null ) {

	if ( ! ( is_user_logged_in() && affwp_is_affiliate() ) ) {
		return $content;
	}

	ob_start();

	echo '<div id="affwp-affiliate-dashboard">';

	affiliate_wp()->templates->get_template_part( 'dashboard-tab', 'order-details' );

	echo '</div>';

	$content = ob_get_clean();

	return $content;
}
add_shortcode( 'affiliate_area_order_details', 'affwp_aas_order_details_shortcode' );