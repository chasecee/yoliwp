<?php

include 'get-rep-curl.php';

function web_alias( $path, $link ) {
	echo 'The path is: ' . $path . '<br>';

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

	// 1a. The cookie is empty and path === root.
	if( empty($_COOKIE[$cookie_name] ) && $path === '') {
		echo '<script>console.log("Repsite-val -> no cookie -> path === root.")</script>';

		// Set $rep = corporphan
		$rep = (object) array ('customerId' => 50, 'webAlias' => 50);

		// Set the cookie (?).

		// Set the boolean to 0 -> no redirect required.
		$boolean = 0;
	}

	// 1a. The cookie is empty and path !== root.
	if( empty($_COOKIE[$cookie_name] ) && $path !== '') {

		// Make a get-call to the api.
		$rep = get_rep_info($rep_url);

		// Set the cookie.
		$cookie_value = json_encode( $rep );
		setcookie( $cookie_name, $cookie_value, $arr_cookie_options );

		// Set the boolean to 1 -> redirect required.
		$boolean = 1;
	}
	render_banner( $rep, $link, $boolean );
}
