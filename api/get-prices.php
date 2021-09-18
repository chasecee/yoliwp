<?php
function get_prices() {
	// Get the item id from the query params.
	if ( isset ( $_GET['item_id'] ) ) :
		$item_id = $_GET['item_id'];
		else :
			$item_id = null;
	endif;

	$base_api_url = $_SERVER['APICON'];
	$base_url   = $base_api_url . 'Products/pricing/';
	$server_url = null;
	$default_country = 'US';

	// Build the URL for the get-call to the API for the retail and discount prices.
	if ( ! isset( $_COOKIE['wordpress_country'] ) ) {
		$server_url = $base_url . $default_country . '/' . $item_id;
	} else {
		$country_code = $_COOKIE['wordpress_country'];
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
			echo 'Caught exception: ', esc_html($e), '\n';
		}
	} else {
		try {
			$response = wp_remote_get(
				$base_url,
				array(
					'sslverify' => false, // For development only.
					'timeout' => 60 ) );
			$prices = json_decode( $response['body'] );
		} catch ( Exception $e ) {
			echo 'Caught exception: ', esc_html($e), '\n';
		}
	}

	return $prices;
}
