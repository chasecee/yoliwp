<?php
/**
 * Handles the api call for a product's retail and discount prices.
 *
 * @param int $item_id
 * Culled from the url's query params.
 */
function get_prices( $item_id ) {

	// Get product details on specific product (phase 2 for populating the product page(s) - still does not contain item images): ​/api​/Products​/{countryCode}​/{itemId}​/{languageCode}.

	$base_url    = 'https://108.59.44.81/api/Products/pricing/';
	$server_url  = null;
	$default_url = 'https://108.59.44.81/api/Products/pricing/US/';

	// Build the URL for the get-call to the API for the retail and discount prices.
	if ( ! isset( $_COOKIE['Country'] ) ) {
		$server_url = $default_url . $item_id;
	} else {
		$country_code = $_COOKIE['Country'];
		$server_url   = $base_url . $country_code . '/' . $item_id;
	}

	if ( $server_url ) {
		try {
			$response = wp_remote_get(
				$server_url,
				array(
					'sslverify' => false,
					'timeout'   => 60,
				)
			);
			$prices   = json_decode( $response['body'] );
		} catch ( Exception $e ) {
			echo 'Caught exception: ', esc_html( $e ), '\n';
		}
	} else {
		try {
			$response = wp_remote_get(
				$default_url,
				array(
					'sslverify' => false,
					'timeout'   => 60,
				)
			);
			$prices   = json_decode( $response['body'] );
		} catch ( Exception $e ) {
			echo 'Caught exception: ', esc_html( $e ), '\n';
		}
	}

	return $prices;
}
