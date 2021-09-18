<?php
/** Get-rep is the helper function that makes the API call with the web alias; it's called in the web_alias function. */
include_once 'get-rep-curl.php';
include_once realpath( __DIR__ . '/..' ) . '/template-parts/repsite-banner.php';

/**
 * Check the web alias against the API and set the cookie when needed.
 */
function web_alias( $redirect, $home, $path, $show_banner ) {

	// $base_api_url = !empty( $_SERVER['APICON'] ) ? $_SERVER['APICON'] : 'https://108.59.44.81/api/';
	$base_api_url = $_SERVER['APICON'];
	$base_url = $base_api_url . 'alias';
	$rep_url  = $base_url . $redirect;

	$cookie_name        = 'wordpress_current_rep';

	if ( isset( $_SERVER['HTTPS'] ) && 'on' === $_SERVER['HTTPS'] ) :
		$arr_cookie_options = array(
			'expires'  => time() + ( 86400 * 30 ),
			'path'     => '/',
			// 'domain' => 'localhost',
			'secure' => true,
			'httponly' => true,
			'samesite' => 'Strict'
			);
		else :
			$arr_cookie_options = array(
			'expires'  => time() + ( 86400 * 30 ),
			'path'     => '/',
			// 'domain' => 'localhost',
			'secure' => false,
			'httponly' => true,
			'samesite' => 'Strict'
			);
		endif;

	// 1. If the cookie has already been set, check it's web alias against the $path.
	if ( !empty( $_COOKIE[ $cookie_name ] ) ) {
		// echo 'Inside the if-statement: the cookie is set. <br>';
    $cookie = wp_unslash( ($_COOKIE[$cookie_name] ) );
    $decoded = json_decode($cookie);
    $cookie_alias = $decoded->webAlias;

		// a. If the root path is entered, return the rep from the cookie.
		if ($redirect === '/') {
			// echo 'Inside the if-statement: the cookie is set and redirect === / <br>';
			$rep = $decoded;
			$redirect_boolean = 0;
		}
			// b. If a web alias is entered and matches that from the cookie, return the rep from the cookie.
		elseif ( (strtolower($redirect) ===  '/' . strtolower($cookie_alias))) {
			// echo 'Inside the if-statement: the cookie is set and redirect === cookie alias. <br>';
			$rep = $decoded;
			$redirect_boolean = 1;

			// c. If a web alias is entered but does not match that from the cookie, make a get-call to check the alias against the API.
		} elseif ( ( strtolower( $redirect ) !== '/' . strtolower( $cookie_alias ) ) ) {
			// echo 'Inside the if-statement: the cookie is set and redirect !== cookie alias. <br>';
			$rep = get_rep_info( $rep_url );

			// If an invalid web alias is returned, set rep from the cookie.
				// phpcs:ignore
			if ( $rep->customerId === 50 ) {
				// echo 'Inside the if-statement: the cookie is set and rep ID === 50. <br>';
				$rep = $decoded;
			} else {
				// echo 'Inside the if-statement: the cookie is set and rep ID !== 50: reset the cookie. <br>';

				$cookie_value = json_encode( $rep );
				setcookie( $cookie_name, $cookie_value, $arr_cookie_options );
			}
			$redirect_boolean = 1;
		}

		// 2. If there is no cookie, make a get-call to the API.
	} else {
		// echo 'Inside the else-statement: the cookie is not set. <br>';

    // a. If the path is the root, return corporphan; no cookie for corporphan
    if($redirect === '/') {
			// echo 'Inside the else-statement: the cookie is not set and redirect === / : set rep to 50 <br>';
      $rep = (object) array ('customerId' => 50, 'webAlias' => 50);
			$redirect_boolean = 0;

			// b. If the path is not the root, call the API to return the rep.
		} else {
			// echo 'Inside the else-statement: the cookie is not set and redirect !== / : do get-call to API. <br>';
			// Call get on the api.
			$rep = get_rep_info( $rep_url );


			// Set the redirect to true, in order to redirect to the homepage.
			$redirect_boolean = 1;

			// If a valid web alias is returned, set the cookie.
				// phpcs:ignore
			if ( $rep->customerId !== 50 ) {
				// echo 'Inside the else: no cookie and rep id !== 50: set the cookie. <br>';
				$cookie_value = json_encode( $rep );
				setcookie( $cookie_name, $cookie_value, $arr_cookie_options );
			}
		}
	}

	render_banner( $rep, $home, $redirect_boolean, $path, $show_banner);
}
