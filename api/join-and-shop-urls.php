<?php
	// Fetch the web alias and use to populate the earn and shop-now redirect urls.
$base_url = isset( $_SERVER['SHOPCON'] ) ? $_SERVER['SHOPCON'] : 'https://1160-web1.vm.epicservers.com/';

$cookie_name = 'Current_Rep';

if ( ! empty( $_COOKIE[$cookie_name] ) ) :
	$cookie = wp_unslash( ($_COOKIE[$cookie_name] ) );
	$decoded = json_decode($cookie);
	// phpcs:ignore
	$alias = strtolower($decoded->webAlias);

	else :
		$alias = '50';
	endif;

// Build the join url.
$join_url = $base_url . $alias . '/enrollment/enrollmentconfiguration';

// The login_link is not our purvue.
$login_link    = 'https://1160-web1.vm.epicservers.com:444/login';

// Build the shop-now url.
$shop_now_url = $base_url . $alias . '/products';
?>
