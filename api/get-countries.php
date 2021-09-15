<?php
/** Function used to connect to the db to access its countries options for the dropdown country menu. */
function get_countries() {
	try {
		$base_url = 'https://108.59.44.81/api/';
		$server_url = $base_url . 'cultures/countries';
		$response = wp_remote_get( $server_url, array( 'sslverify' => false, 'timeout' => 60 ) );
		$countries      = json_decode( $response['body'] );
	} catch ( Exception $e ) {
		echo 'Caught exception: ', esc_html($e->getMessage()), '\n';
	}
	return $countries;
}
