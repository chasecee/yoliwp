<?php

function get_rep_info($url) {
	if (!$url) throw new Exception('Bad url.');

	try {
		$response = wp_remote_get( $url );
		$rep      = json_decode( $response );
	} catch ( Exception $e ) {
		echo 'Caught exception: ', $e->getMessage(), '\n';
	}
	return $rep;
}
