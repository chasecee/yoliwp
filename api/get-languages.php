<?php
/** Function used to connect to the db to access its language options for the dropdown language menu. */
function get_languages() {
	try {
		$url = 'https://108.59.44.81/api/cultures/languages';
		$response = wp_remote_get( $url, array( 'sslverify' => false, 'timeout' => 60 ) );
		$languages      = json_decode( $response['body'] );
	} catch ( Exception $e ) {
		echo 'Caught exception: ', $e->getMessage(), '\n';
	}
	return $languages;
}

