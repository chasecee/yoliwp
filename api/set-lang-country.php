<?php
/** Set the language and country cookies */
function set_language_and_country( $selection ) {
	/** For anything other than English, set the language cookie. */

	if ( isset( $_POST['sel_language'] ) ) {
		$language = $selection['sel_language'];
	} else {
		$language = 'en';
	}

	/** For anything other than the US, set the country cookie. */
	if ( isset( $_POST['sel_country'] ) ) {
		$country = $selection['sel_country'];
	} else {
		$country = 'US';
	}

	setcookie( 'Language', $language, time() + ( 86400 * 30 ), '/' );
	setcookie( 'Country', $country, time() + ( 86400 * 30 ), '/' );
}

