<?php
/** Set the language and country cookies */
function set_language_and_country( $selection ) {
	$home = ( isset( $_SERVER['HTTPS'] ) && 'on' === $_SERVER['HTTPS'] ?
									'https' : 'http' ) . '://' . $_SERVER['HTTP_HOST'];

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

	/** For anything other than English, set the language cookie. */
	if ( isset( $_POST['sel_language'] ) ) :
		$language = $selection['sel_language'];
		setcookie( 'wordpress_language', $language, $arr_cookie_options );
	endif;

	/** For anything other than the US, set the country cookie. */
	if ( isset( $_POST['sel_country'] ) ) :
		$country = $selection['sel_country'];
		setcookie( 'wordpress_country', $country, $arr_cookie_options );
		header('Location: ' . $home);
		exit;
	endif;
}
?>
