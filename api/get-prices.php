<?php
function get_prices() {
	// Get the item id from the query params when $_GET isn't set, i.e., when the product link was copied and forwarded to someone else.
	$home = ( isset( $_SERVER['HTTPS'] ) && 'on' === $_SERVER['HTTPS'] ?
	'https' : 'http' ) . '://' . $_SERVER['HTTP_HOST'];
	$link = $home . $_SERVER['REQUEST_URI'];
	$query_params = parse_url($link, PHP_URL_QUERY);
	$query_params_array = explode('&', $query_params);
	$regex = '/(\d+)/';
	$is_item_id = $query_params_array[0];

	if ( !isset ( $_GET['item_id'] ) && $query_params_array ) :
		$item_id = preg_grep($regex, $query_params_array);
		else :
			$item_id = $_GET['item_id'];
	endif;

	$base_api_url = $_SERVER['APICON'];
	$base_url   = $base_api_url . 'Products/pricing/';
	$server_url = null;
	$default_country = 'US';

	// Get the ip address (for geolocating, when it's time.)
	// if ( !empty( $_SERVER['HTTP_CLIENT_IP'] ) ) :
	// 	$ip_address = $_SERVER['HTTP_CLIENT_IP'];
	// 	elseif ( !empty( $_SERVER['HTTP_X_FORWARDED_FOR'] ) ) :
	// 		$ip_address = $_SERVER['HTTP_X_FORWARDED_FOR'];
	// 		else :
	// 			$ip_address = $_SERVER['REMOTE_ADDR'];
	// 		endif;

	// echo 'The address of the client: ' . $ip_address . '<br>';
	// $response = wp_remote_get( $url . $ip_address, array( 'sslverify' => false, 'timeout' => 60 ) );

	// Build the URL for the get-call to the API for the retail and discount prices.
	if ( ! isset( $_COOKIE['wordpress_country'] ) ) :
		$server_url = $base_url . $default_country . '/' . $item_id;
	 else :
		$country_code = $_COOKIE['wordpress_country'];
		$server_url   = $base_url . $country_code . '/' . $item_id;
	 endif;

	if ( $server_url ) :
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
	else :
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
	endif;

	return $prices;
}
