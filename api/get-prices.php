<?php
function get_prices() {
	if ( isset ( $_GET['item_id'] ) ) :
		$item_id = $_GET['item_id'];
	endif;

	$base_url   = 'https://108.59.44.81/api/Products/pricing/';
	$server_url = null;
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
			$response = wp_remote_get( $server_url, array( 'sslverify' => false, 'timeout' => 60 ) );
			$prices = json_decode( $response['body'] );
		} catch ( Exception $e ) {
			echo 'Caught exception: ', $e->getMessage(), '\n';
		}
	} else {
		try {
			$response = wp_remote_get( $default_url, array( 'sslverify' => false, 'timeout' => 60 ) );
			$prices = json_decode( $response['body'] );
		} catch ( Exception $e ) {
			echo 'Caught exception: ', $e->getMessage(), '\n';
		}
	}

	// echo 'The prices for this product: ';
	// var_export($prices);
	// echo '<br>';
	return $prices;
}
?>
