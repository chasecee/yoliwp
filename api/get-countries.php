<?php
/** Function used to connect to the db to access its countries options for the dropdown country menu. */
function get_countries() {
	$user     = 'root';
	$password = 'password';
	$server   = 'yoliwp.local';
	$database = 'yoli';

	$db = new PDO( "mysql:host=$server; dbname=$database", $user, $password );
	$db->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );

	$countries = $db->query( 'SELECT CountryCode, CountryName FROM countries ORDER BY Priority' );
	return $countries;
}
