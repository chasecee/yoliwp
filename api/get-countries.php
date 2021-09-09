<?php
/** Function used to connect to the db to access its countries options for the dropdown country menu. */
function get_countries() {
	try {
		$url = 'https://108.59.44.81/api/cultures/countries';
		$response = wp_remote_get( $url, array( 'sslverify' => false, 'timeout' => 60 ) );
		$countries      = json_decode( $response['body'] );
	} catch ( Exception $e ) {
		echo 'Caught exception: ', $e->getMessage(), '\n';
	}
	return $countries;
}