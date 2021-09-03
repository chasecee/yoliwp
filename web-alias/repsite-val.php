<?php
include 'get-url.php'; // This provisions the page with the value of the $webAlias variable.

echo '<script>console.log("In repsite-val.php");</script>';
// echo 'This is the path: ' . $path . '<br>';

$baseUrl = 'https://108.59.44.81/api/alias';
$repUrl = $baseUrl . $path;
$cookie_name = 'Current_Rep';

// 1. If the cookie has already been set, check it's webAlias against the $path.
if (isset($_COOKIE[$cookie_name])) {
	echo '<script>console.log("I\'m in the repsite-val if-statement: the cookie is set.")</script> <br>';

  $cookie = stripslashes($_COOKIE['Current_Rep']);
	$decoded = json_decode($cookie);
  $cookieAlias = $decoded->webAlias;

	// a. If the root path is entered, return the rep from the cookie.
  if($path === '/') {
		echo '<script>console.log("I\'m in the repsite-val if-if statement: the cookie is set and the path === root.")</script>';
    $rep = $decoded;

		// b. If a web alias is entered and matches that from the cookie, return the rep from the cookie.
  } elseif (strtolower($path) === ('/' . strtolower($cookieAlias))) {
		echo '<script>console.log("Comparing path and cookie alias on repsite.")</script>';
    $rep = $decoded;

  // c. If a web alias is entered but does not match that from the cookie, make a get-call to check the alias against the API.
  } elseif (('/' . strtolower($cookieAlias)) !== strtolower($path)) {
		echo '<script>console.log("Calling API to get new rep.")</script>';
    $rep = getRepInfo($repUrl);
		if($rep->customerId !== 50) {
			$cookie_value = json_encode($rep);
			setcookie('Current_Rep', $cookie_value, time() + (86400 * 30), '/');
		}
  }

// 2. If there is no cookie, make a get-call to the API.
} else {

	// a. If the path isn't the root, call the API with the repUrl as set above.
  if($path !== '/') {
    $rep = getRepInfo($repUrl);
		if($rep->customerId !== 50){
			$cookie_value = json_encode($rep);
			setcookie('Current_Rep', $cookie_value, time() + (86400 * 30), '/');
		}

  // b. If the path is the root, set $path = '/to-orphan', reset the repUrl, and call the API to return corporphan. No cookie for corporphan.
  } else {
		echo '<script>console.log("Inside the else statement of the repsite validator: root path, no cookie.")</script>';
    $path = '/to-orphan';
    $repUrl = $baseUrl . $path;
    $rep = getRepInfo($repUrl);
  }
}

// To call the API, if needed.
function getRepInfo($url) {
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
