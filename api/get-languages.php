<?php
/** Function used to connect to the db to access its language options for the dropdown language menu. */
function get_languages() {
	$user     = 'root';
	$password = 'password';
	$server   = 'yoliwp.local';
	$database = 'yoli';

	$db = new PDO( "mysql:host=$server; dbname=$database", $user, $password );
	$db->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );

	$languages = $db->query( 'SELECT LanguageCode, LanguageDescription FROM languages ORDER BY Priority' );
	return $languages;
}
