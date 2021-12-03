<?php

function get_search_results($url) {
	if (!$url) throw new Exception('Bad url.');
	try {
		$response = wp_remote_get( $url, array( 'sslverify' => false, 'timeout' => 60 ) );
		$results      = json_decode( $response['body'] );
	} catch ( Exception $e ) {
		echo 'Caught exception: ', esc_html($e), '\n';
	}
	return $results;
	}
