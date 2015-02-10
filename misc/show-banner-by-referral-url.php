<?php
/**
 * Plugin Name: AffiliateWP - Show Banner By Referral URL
 * Plugin URI: http://affiliatewp.com
 * Description: Show an image banner based on the affiliate referral URL used
 * Author: Andrew Munro, Sumobi
 * Author URI: http://sumobi.com
 * Version: 1.0
 */

/**
 * Show the affiliate banner
 * @since 1.0
 * 
 * Usage: echo the affwp_affiliate_banner() function where'd you'd like to output the banner, or load it onto another hook
 */
function affwp_affiliate_banner() {
	echo affwp_affiliate_banners_get_banner();
}

/**
 * Show a different image/banner/logo based on which affiliate is being tracked
 *
 * @since 1.0
 * @return string Image banner of affiliate
 */
function affwp_affiliate_banners_get_banner() {

	// get the affiliate ID from query string
	$ref_var = isset( $_GET[affiliate_wp()->tracking->get_referral_var()] ) ? $_GET[affiliate_wp()->tracking->get_referral_var()] : '';

	// if affiliate ID is set in query string make sure they're actually an affiliate
	if ( isset( $ref_var ) && affwp_is_affiliate( affwp_get_affiliate_user_id( $ref_var ) ) ) {
		$affiliate_id = $ref_var;
	}
	// get the affiliate ID from the cookie
	elseif ( affiliate_wp()->tracking->get_affiliate_id() ) {
		$affiliate_id = affiliate_wp()->tracking->get_affiliate_id();
	}
	// no affiliate ID
	else {
		$affiliate_id = '';
	}

	// built out the image based on the image path of the affiliate
	return '<img src="' . affwp_affiliate_banners_get_image( $affiliate_id ) . '" />';

}

/**
 * Show a different image/banner/logo based on which affiliate is being tracked
 *
 * @since 1.0
 * @return string URL to image
 */
function affwp_affiliate_banners_get_image( $affiliate_id = '' ) {

	// path to image folder. Defaults to wp-content/themes/your-theme/images/
	$image_path = get_stylesheet_directory_uri() . '/images/';

	// switch image based on the affiliate ID
	switch ( $affiliate_id ) {
		// affiliate with an ID of 235
		case 235: 
			$image = 'banner-affiliate-235.png';
		break;
		
		// affiliate with an ID of 154
		case 154:
			$image = 'banner-affiliate-154.png';
		break;

		// affiliate with an ID of 52
		case 52:
			$image = 'banner-affiliate-52.png';
		break;

		// default fallback image
		default:
			$image = 'banner-default.png';
		 break;
	}

	return $image_path . $image;
}
