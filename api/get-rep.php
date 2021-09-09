<?php

function get_rep_info($url) {
	if (!$url) throw new Exception('Bad url.');

	try {
		$response = wp_remote_get( $url, array( 'sslverify' => false, 'timeout' => 60 ) );
		$rep      = json_decode( $response['body'] );
	} catch ( Exception $e ) {
		echo 'Caught exception: ', $e->getMessage(), '\n';
	}
	echo 'The rep in get-rep: ';
	var_export($rep);
	echo '<br><br>';
	return $rep;
}
