<?php
/** Function used to connect to the db to access its language options for the dropdown language menu. */
function get_languages() {
	try {
		$base_api_url = $_SERVER['APICON'];
		$server_url = $base_api_url . 'cultures/languages';
		$response = wp_remote_get( $server_url, array( 'sslverify' => false, 'timeout' => 60 ) );
		$languages      = json_decode( $response['body'] );
	} catch ( Exception $e ) {
		echo 'Caught exception: ', $e->getMessage(), '\n';
	}
	return $languages;
}

