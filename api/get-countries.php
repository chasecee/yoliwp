<?php
/** Function used to connect to the db to access its countries options for the dropdown country menu. */
function get_countries() {
	try {
		$base_api_url = $_SERVER['APICON'];
		$server_url = $base_api_url . 'cultures/countries';
		$response = wp_remote_get( $server_url, array( 'sslverify' => false, 'timeout' => 60 ) );
		$countries      = json_decode( $response['body'] );
	} catch ( Exception $e ) {
		echo 'Caught exception: ', esc_html($e->getMessage()), '\n';
	}
	return $countries;
}
