<?php
/**
 * 1) Get the URL and return the path.
 */
function get_url() {
	echo '<script>console.log("In get-url.php");</script>';

	$link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ?
									"https" : "http") . "://" . $_SERVER['HTTP_HOST'] .
									$_SERVER['REQUEST_URI'];

	$path = parse_url($link)['path'];

	$wpPagePaths = array('/corporphan', '/to-orphan', '/home', '/earn', '/our-story', '/product-data', '/products', '/passion');
	foreach($wpPagePaths as $wpPagePath) {
		if($path === $wpPagePath)   {
			$path = '/to-orphan';
		}
	}
	return web_alias($path);
}
?>

<?php
/**
 * 2) Check the web alias against the API and set the cookie when needed.
*/
function web_alias($path) {

  $baseUrl = 'https://108.59.44.81/api/alias';
  $repUrl = $baseUrl . $path;
  $cookie_name = 'Current_Rep';

  // 1. If the cookie has already been set, check it's web alias against the $path.
  if (isset($_COOKIE[$cookie_name])) {
    echo '<script>console.log("I\'m in the repsite-val if-statement: the cookie is set.")</script> <br>';

    $cookie = stripslashes($_COOKIE['Current_Rep']);
    $decoded = json_decode($cookie);
    $cookieAlias = $decoded->webAlias;

    // a. If the root path is entered, return the rep from the cookie.
    if($path === '/') {
      echo '<script>console.log("I\'m in the repsite-val if-if statement: the cookie is set and the path === root.")</script>';
      return $rep = $decoded;

      // b. If a web alias is entered and matches that from the cookie, return the rep from the cookie.
    } elseif (strtolower($path) === ('/' . strtolower($cookieAlias))) {
      echo '<script>console.log("Comparing path and cookie alias on repsite.")</script>';
      return $rep = $decoded;

    // c. If a web alias is entered but does not match that from the cookie, make a get-call to check the alias against the API.
    } elseif (('/' . strtolower($cookieAlias)) !== strtolower($path)) {
      echo '<script>console.log("Calling API to get new rep.")</script>';
      $rep = get_rep_info($repUrl);

      // If a valid web alias is returned, set the cookie.
      if($rep->customerId !== 50) {
        $cookie_value = json_encode($rep);
        setcookie('Current_Rep', $cookie_value, time() + (86400 * 30), '/');
      }
      return $rep;
    }

  // 2. If there is no cookie, make a get-call to the API.
  } else {

    // a. If the path isn't the root, call the API with the repUrl as set above.
    if($path !== '/') {
      $rep = get_rep_info($repUrl);

      // If a valid web alias is returned, set the cookie.
      if($rep->customerId !== 50){
        $cookie_value = json_encode($rep);
        setcookie('Current_Rep', $cookie_value, time() + (86400 * 30), '/');
      }
      return $rep;

    // b. If the path is the root, set $path = '/to-orphan', reset the repUrl, and call the API to return corporphan. No cookie for corporphan.
    } else {
      echo '<script>console.log("Inside the else statement of the repsite validator: root path, no cookie.")</script>';
      $path = '/to-orphan';
      $repUrl = $baseUrl . $path;
      $rep = get_rep_info($repUrl);
      return $rep;
    }
  }
}

// Helper function to call the API as needed.
function get_rep_info($url) {
	$curl = curl_init($url);
	// curl_setopt($curl, CURLOPT_URL, $url);
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

	//for debug only!
	curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
	curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

	// This responds with an error or the request body in json.
	$curl_response = curl_exec($curl);
	$rep = json_decode($curl_response);
	if ($curl_response === false) {
			$info = curl_getinfo($curl);
			curl_close($curl);
			die('An error occured during curl exec. Additional info: ' . var_export($info));
	} elseif ($rep === null) { // This returns the nginx error page, if the response is a 502.
		die ($curl_response);
	} else {
		curl_close($curl);
		return $rep;
	}
}

?>
