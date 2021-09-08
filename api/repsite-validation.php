<?php
/** Get-rep is the helper function that makes the API call with the web alias; it's called in the web_alias function. */
include 'get-rep-curl.php';

/**
 * Check the web alias against the API and set the cookie when needed.
 */

function web_alias( $path, $link ) {

	Echo 'The path is: ' . $path . '<br>';
	$boolean = false;

  $base_url = 'https://108.59.44.81/api/alias';
  $rep_url = $base_url . '/' . $path;

	$cookie_name = 'Current_Rep';
	$cookie_value = '';
	$arr_cookie_options = array (
		'expires' => time() + ( 86400 * 30 ),
		'path' => '/',
		// 'domain' => '.example.com', // leading dot for compatibility or use subdomain
		// 'secure' => true,     // or false
		// 'httponly' => true,    // or false
		'samesite' => 'Strict' // None || Lax  || Strict
		);

	// 1. If the cookie has already been set, check it's web alias against the $path.
	if ( !empty( $_COOKIE[ $cookie_name ] ) ) {
		echo '<script>console.log("I\'m in the repsite-val if-statement: the cookie is set.")</script> <br>';

    $cookie = wp_unslash( ($_COOKIE[$cookie_name] ) );
    $decoded = json_decode($cookie);
    $cookie_alias = $decoded->webAlias;

		// a. If the root path is entered, return the rep from the cookie.
		// b. If a web alias is entered and matches that from the cookie, return the rep from the cookie.
		if ( (strtolower($path) ===  strtolower($cookie_alias))) {
			echo '<script>console.log("I\'m in the repsite-val if-if statement: the cookie is set and the path === root || the cookie alias.")</script>';
			$rep = $decoded;
			$boolean = true;

		} elseif ($path === '') {
			$rep = $decoded;

    // c. If a web alias is entered but does not match that from the cookie, make a get-call to check the alias against the API.
    } else {
      echo '<script>console.log("Calling API to get new rep.")</script>';
      $rep = get_rep_info($rep_url);

			// If an invalid web alias is returned, set rep from the cookie.
			if ( $rep->customerId === 50 ) {
				echo '<script>console.log("There is a cookie and the customer id is 50, so set rep to cookie.")</script>';
				$rep = $decoded;
				$boolean = true;
			} else {
				echo '<script>console.log("A valid web alias was return, so let\'s set the cookie.")</script>';
				$cookie_value = json_encode( $rep );
				setcookie( $cookie_name, $cookie_value, $arr_cookie_options );
				$boolean = true;
			}
		}

		// 2. If there is no cookie, make a get-call to the API.
	} else {

    // a. If the path is the root, return corporphan; no cookie for corporphan
    if($path === '') {
			echo '<script>console.log("Inside the else statement of the repsite validator: root path, no cookie.")</script>';
      ;
      $rep = (object) array ('customerId' => 50, 'webAlias' => 50);
			$boolean = false; // No redirect required.
			// b. If the path is not the root, call the API to return the rep.
		} else {
      echo '<script>console.log("No cookie, and the path is not root, so calling api to get rep.")</script>';

      $rep = get_rep_info($rep_url);

			// If a valid web alias is returned, set the cookie.
			if ( $rep->customerId !== 50 ) {
				echo '<script>console.log("The rep returned is valid, so set the cookie for the first time.")</script>';

				$cookie_value = json_encode( $rep );
				setcookie( $cookie_name, $cookie_value, $arr_cookie_options );

				$boolean = true;

				// clear cookie for banner display
				// unset($_COOKIE['beenhere']);
				// setcookie('beenhere', '', time() - 3600);
				// header('Location: http://localhost:10005/');
				// exit;
			}
		}
  }

	render_banner( $rep, $link, $boolean );
}
