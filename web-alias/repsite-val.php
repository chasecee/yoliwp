<?php
include 'get-url.php'; // This provisions the page with the value of the $webAlias variable.

$baseUrl = 'https://108.59.44.81/api/alias';
// $baseUrl = 'http://localhost/api/alias';
$repUrl = $baseUrl . $path;
$cookie_name = 'Current_Rep';

// 1. If the cookie has already been set, check it's webAlias against the $path.
if (isset($_COOKIE[$cookie_name])) {
  $cookie = json_decode($_COOKIE[$cookie_name]);
  $cookieAlias = $cookie->webAlias;
  // a. If the root path is entered, return the rep from the cookie.
  if($path === '/') {
    $rep = $cookie;
  // b. If a web alias is entered and matches that from the cookie, return the rep from the cookie.
  } else if (strtolower($path) === ('/' . strtolower($cookieAlias))) {
    $rep = $cookie;
  // c. If a web alias is entered but does not match that from the cookie, make a get call to check the alias against the API.
  } else if (('/' . strtolower($cookieAlias)) !== strtolower($path)) {
    $rep = getRepInfo($repUrl);
  } 
// 2. If there is no cookie, set the cookie.
} else {
  // a. If the path isn't the root, call the API with the repUrl as set above.
  if($path !== '/') {
    $rep = getRepInfo($repUrl);
  // b. If the path is the root, set $path = '/to-orphan', reset the repUrl, and call the API to return corporphan.
  } else {
    $path = '/to-orphan';
    $repUrl = $baseUrl . $path;
    $rep = getRepInfo($repUrl);
  }
}

// The call the API, if needed.
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
  } else if ($rep === null) { // This returns the nginx error page, if the response is a 502.
    die ($curl_response);
  } else {
    curl_close($curl);
    return $rep;
  }
}
?>