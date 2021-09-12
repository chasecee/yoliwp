<?php
/** Get-rep is the helper function that makes the API call with the web alias; it's called in the web_alias function. */
include_once 'get-rep-curl.php';
include_once realpath( __DIR__ . '/..' ) . '/template-parts/repsite-banner.php';

/**
 * Check the web alias against the API and set the cookie when needed.
 */

function web_alias( $path, $home ) {
  $base_url = 'https://108.59.44.81/api/alias';
  $rep_url = $base_url . $path;

	$cookie_name = 'Current_Rep';
	$cookie_value = '';
	$arr_cookie_options = array (
		'expires' => time() + ( 86400 * 30 ),
		'path' => '/',
		// 'domain' => '.example.com', // leading dot for compatibility or use subdomain
		'secure' => true,
		'httponly' => true,
		'samesite' => 'Strict'
		);

	// 1. If the cookie has already been set, check it's web alias against the $path.
	if ( !empty( $_COOKIE[ $cookie_name ] ) ) {
    $cookie = wp_unslash( ($_COOKIE[$cookie_name] ) );
    $decoded = json_decode($cookie);
    $cookie_alias = $decoded->webAlias;

		// a. If the root path is entered, return the rep from the cookie.
		if ($path === '/') {
			// echo '<script>console.log("Repsite-val -> cookie is set -> path === root -> set rep = cookie -> no redirect.")</script>';
			$rep = $decoded;
			$redirect = 0;
		}
			// b. If a web alias is entered and matches that from the cookie, return the rep from the cookie.
		elseif ( (strtolower($path) ===  '/' . strtolower($cookie_alias))) {
			// echo '<script>console.log("Repsite-val -> cookie is set -> path === the cookie alias.")</script>';
			// echo 'The $path in matches cookie is ' . strtolower($path) . '<br>';
			// echo 'The $cookie_alias in matches path is ' . strtolower($cookie_alias) . '<br>';
			$rep = $decoded;
			$redirect = 1;

    // c. If a web alias is entered but does not match that from the cookie, make a get-call to check the alias against the API.
    } elseif ( (strtolower($path) !==  '/' . strtolower($cookie_alias))) {
      // echo '<script>console.log("Repsite-val -> cookie is set -> path !== the cookie alias.")</script>';
      $rep = get_rep_info($rep_url);

			// If an invalid web alias is returned, set rep from the cookie.
			if ( $rep->customerId === 50 ) {
				// echo '<script>console.log("There is a cookie and the customer id is 50, so set rep to cookie.")</script>';
				$rep = $decoded;
			} else {
				// echo '<script>console.log("A valid web alias was return, so let\'s set the cookie.")</script>';
				$cookie_value = json_encode( $rep );
				setcookie( $cookie_name, $cookie_value, $arr_cookie_options );
			}
			$redirect = 1;
		}

		// 2. If there is no cookie, make a get-call to the API.
	} else {

    // a. If the path is the root, return corporphan; no cookie for corporphan
    if($path === '/') {
			// echo '<script>console.log("Repsite-val -> no cookie -> path === root.")</script>';
      ;
      $rep = (object) array ('customerId' => 50, 'webAlias' => 50);
			$redirect = 0;

			// b. If the path is not the root, call the API to return the rep.
		} else {
      // echo '<script>console.log("Repsite-val -> no cookie -> path !== root -> make API call.")</script>';

			// Call get on the api.
      $rep = get_rep_info($rep_url);

			// Set the redirect to true, in order to redirect to the homepage.
			$redirect = 1;

			// If a valid web alias is returned, set the cookie.
			if ( $rep->customerId !== 50 ) {
				// echo '<script>console.log("Repsite-val -> no cookie -> valid repID -> set the cookie for the first time.")</script>';

				$cookie_value = json_encode( $rep );
				setcookie( $cookie_name, $cookie_value, $arr_cookie_options );
			}
		}
  }

	render_banner( $rep, $home, $redirect );
}
?>
