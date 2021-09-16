<?php
function buy_button_url($auto_order) {
	if ( isset( $_COOKIE['Current_Rep'])) :
		$cookie = wp_unslash( ($_COOKIE['Current_Rep'] ) );
    $decoded = json_decode($cookie);
    $alias = $decoded->webAlias;
		$customer_id = $decoded->customerId;
	else :
		$alias = 50;
		$customer_id = 50;
	endif;

	$item_code = $_GET['item_code'];

	if ( isset( $_COOKIE['Country'] ) ) :
		$country_code = $_COOKIE['Country'];
		else :
			$country_code = 'US';
		endif;

	$base_url = !empty( $_SERVER['SHOPCON'] ) ? $_SERVER['SHOPCON'] : 'https://1160-web1.vm.epicservers.com/';
	$buy_url = $base_url . $alias . '/additem?ItemCode=' . $item_code . '&Country=' . $country_code . '&OwnerID=' . $customer_id . '&autoOrder=' . $auto_order;
	return $buy_url;
}
?>
