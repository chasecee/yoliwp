<?php

function buy_button_url($auto_order) {
	if ( isset( $_COOKIE['wordpress_current_rep'])) :
		$cookie = wp_unslash( ($_COOKIE['wordpress_current_rep'] ) );
    $decoded = json_decode($cookie);
    $alias = $decoded->webAlias;
		$customer_id = $decoded->customerId;
	else :
		$alias = 50;
		$customer_id = 50;
	endif;

	$item_code = $_GET['item_code'];

	if ( isset( $_COOKIE['wordpress_country'] ) ) :
		$country_code = $_COOKIE['wordpress_country'];
		else :
			$country_code = 'US';
		endif;

	$base_url = $_SERVER['SHOPCON'];
	$buy_url = $base_url . $alias . '/additem?ItemCode=' . $item_code . '&Country=' . $country_code . '&OwnerID=' . $customer_id . '&autoOrder=' . $auto_order;
	return $buy_url;
}
?>
