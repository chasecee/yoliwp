<?php
/** Get-rep is the helper function that makes the API call with the web alias; it's called in the web_alias function. */
include_once 'get-rep-curl.php';
include_once realpath( __DIR__ . '/..' ) . '/template-parts/repsite-banner.php';

/**
 * Check the web alias against the API and set the cookie when needed.
 */
function web_alias( $redirect, $home, $path, $show_banner ) {

	echo 'Redirect at the top of the repsite validator: ' . $redirect . '<br>';
	echo 'Path at the top of the repsite validator: ' . $path . '<br>';
	echo 'Show_banner at the top of the repsite validator: ' . $show_banner . '<br>';


	$base_api_url = !empty( $_SERVER['APICON'] ) ? $_SERVER['APICON'] : 'https://108.59.44.81/api/';
	$base_url = $base_api_url . 'alias';
	$rep_url  = $base_url . $redirect;

	$cookie_name        = 'Current_Rep';
	$cookie_value       = '';

	// Set the cookie's parameters.
	$arr_cookie_options = array(
		'expires'  => time() + ( 86400 * 30 ),
		'path'     => '/',
		// 'domain' => 'localhost',
		'secure' => false,
		'httponly' => true,
		'samesite' => 'Strict'
		);

	// Set secure to true if https or false if http.
	if ( isset( $_SERVER['HTTPS'] ) && 'on' === $_SERVER['HTTPS'] ) :
		$arr_cookies_options['secure'] = true;
		endif;

	// 1. If the cookie has already been set, check it's web alias against the $path.
	if ( !empty( $_COOKIE[ $cookie_name ] ) ) {
    $cookie = wp_unslash( ($_COOKIE[$cookie_name] ) );
    $decoded = json_decode($cookie);
    $cookie_alias = $decoded->webAlias;

		// a. If the root path is entered, return the rep from the cookie.
		if ($redirect === '/') {
			$rep = $decoded;
			$redirect_boolean = 0;
		}
			// b. If a web alias is entered and matches that from the cookie, return the rep from the cookie.
		elseif ( (strtolower($redirect) ===  '/' . strtolower($cookie_alias))) {
			$rep = $decoded;
			$redirect_boolean = 1;

			// c. If a web alias is entered but does not match that from the cookie, make a get-call to check the alias against the API.
		} elseif ( ( strtolower( $redirect ) !== '/' . strtolower( $cookie_alias ) ) ) {
			$rep = get_rep_info( $rep_url );

			// If an invalid web alias is returned, set rep from the cookie.
				// phpcs:ignore
			if ( $rep->customerId === 50 ) {
				$rep = $decoded;
			} else {
				$cookie_value = json_encode( $rep );
				setcookie( $cookie_name, $cookie_value, $arr_cookie_options );
			}
			$redirect_boolean = 1;
		}

		// 2. If there is no cookie, make a get-call to the API.
	} else {

    // a. If the path is the root, return corporphan; no cookie for corporphan
    if($redirect === '/') {
      ;
      $rep = (object) array ('customerId' => 50, 'webAlias' => 50);
			$redirect_boolean = 0;

			// b. If the path is not the root, call the API to return the rep.
		} else {

			// Call get on the api.
			$rep = get_rep_info( $rep_url );

			// Set the redirect to true, in order to redirect to the homepage.
			$redirect_boolean = 1;

			// If a valid web alias is returned, set the cookie.
				// phpcs:ignore
			if ( $rep->customerId !== 50 ) {
				$cookie_value = json_encode( $rep );
				setcookie( $cookie_name, $cookie_value, $arr_cookie_options );
			}
		}
	}

	echo 'The rep in repsite-validation: ';
	var_dump($rep);
	echo '<br>';
	exit;
	render_banner( $rep, $home, $redirect_boolean, $path, $show_banner);
}
