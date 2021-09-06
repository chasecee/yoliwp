<?php
/** Get-rep is the helper function that makes the API call with the web alias; it's called in the web_alias function. */
require_once 'get-rep.php';

/**
 * Check the web alias against the API and set the cookie when needed.
 */
function web_alias( $path ) {

  $base_url = 'https://108.59.44.81/api/alias';
  $rep_url = $base_url . $path;
  $cookie_name = 'Current_Rep';

	// 1. If the cookie has already been set, check it's web alias against the $path.
	if ( isset( $_COOKIE[ $cookie_name ] ) ) {
		echo '<script>console.log("I\'m in the repsite-val if-statement: the cookie is set.")</script> <br>';

    $cookie = ($_COOKIE['Current_Rep'] );
    $decoded = json_decode($cookie);
    $cookie_alias = $decoded->webAlias;

		// foreach ($decoded as $key => $value) {
    //   if ($key === 'webAlias') $cookie_alias = $value;
    // }

		// a. If the root path is entered, return the rep from the cookie.
		if ( $path === '/' ) {
			echo '<script>console.log("I\'m in the repsite-val if-if statement: the cookie is set and the path === root.")</script>';
			return $rep = $decoded;

      // b. If a web alias is entered and matches that from the cookie, return the rep from the cookie.
    } elseif (strtolower($path) === ('/' . strtolower($cookie_alias))) {
      echo '<script>console.log("Comparing path and cookie alias on repsite.")</script>';
      return $rep = $decoded;

    // c. If a web alias is entered but does not match that from the cookie, make a get-call to check the alias against the API.
    } elseif (('/' . strtolower($cookie_alias)) !== strtolower($path)) {
      echo '<script>console.log("Calling API to get new rep.")</script>';
      $rep = get_rep_info($rep_url);

			echo 'The rep inside repsite-validation: ';
			var_export($rep);
			echo '<br><br>';
			echo 'rep->customerId: ' . $rep->customerId . '<br><br>';

			// If a valid web alias is returned, set the cookie.
			if ( $rep->customerId !== 50 ) {
				$cookie_value = json_encode( $rep );

				echo 'The cookie value in repsite validation: ';
				var_export($cookie_value);
				echo '<br><br>';
				setcookie( 'Current_Rep', $cookie_value, time() + ( 86400 * 30 ), '/' );
			} else {
				$rep = $decoded;
			}
			return $rep;
		}

		// 2. If there is no cookie, make a get-call to the API.
	} else {

    // a. If the path isn't the root, call the API with the rep_url as set above.
    if($path !== '/') {
      $rep = get_rep_info($rep_url);

			// If a valid web alias is returned, set the cookie.
			if ( $rep->customerId !== 50 ) {
				$cookie_value = json_encode( $rep );
				echo 'The cookie value in repsite validation when no cookie is set already: ';
				var_export($cookie_value);
				echo '<br><br>';
				setcookie( 'Current_Rep', $cookie_value, time() + ( 86400 * 30 ), '/' );
			}
			return $rep;

    // b. If the path is the root, set $path = '/to-orphan', reset the rep_url, and call the API to return corporphan. No cookie for corporphan.
    } else {
      echo '<script>console.log("Inside the else statement of the repsite validator: root path, no cookie.")</script>';
      $path = '/to-orphan';
      $rep_url = $base_url . $path;
      $rep = get_rep_info($rep_url);
      return $rep;
    }
  }
}

