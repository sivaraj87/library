<?php
/**
 * Plugin Name: AffiliateWP - Add Log out Link To Affiliate Area
 * Plugin URI: http://affiliatewp.com
 * Description: Adds a log out link to the top of the affiliate area
 * Author: Andrew Munro, Sumobi
 * Author URI: http://sumobi.com
 * Version: 1.0
 */

function affwp_custom_affiliate_dashboard_logout() {
	$redirect = function_exists( 'affiliate_wp' ) ? affiliate_wp()->login->get_login_url() : '';
?>
	<p>
		<a href="<?php echo wp_logout_url( $redirect ); ?>" title="Logout">Logout</a>
	</p>
<?php }
add_action( 'affwp_affiliate_dashboard_top', 'affwp_custom_affiliate_dashboard_logout' );