<?php

function get_search_results($url, $data, $country, $method) {
	if (!$url) throw new Exception('Bad url.');
	if ('GET' === $method) :
		try {
			$response = wp_remote_get( $url, array( 'sslverify' => false, 'timeout' => 60 ) );
			$results      = json_decode( $response['body'] );
		} catch ( Exception $e ) {
			echo 'Caught exception: ', esc_html($e), '\n';
		}
		elseif ('POST' === $method) :
			$body = json_encode($data);
			$cookies = [];
			$cookies[] = new WP_Http_Cookie( array(
					'name'  => 'YoliSelectedCountry',
					'value' => $country,
			));
			try {
				$response = wp_remote_post( $url, array( 'body' => $data, 'cookies' => $cookies ) );
				$results = json_decode( $response['body'] );
			} catch ( Exception $e ) {
				echo 'Caught exception: ', esc_html($e), '\n';
			}
		endif;
	return $results;
	}
