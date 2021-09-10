<?php

function retail_buy_button_url() {
	if ( isset( $_GET)) :
		$alias = $_GET['web_alias'];
		$item_code = $_GET['item_code'];
		$customer_id = $_GET['customer_id'];
	endif;

	if ( isset( $_COOKIE['Country'] ) ) :
		$country_code = $_COOKIE['Country'];
		else :
			$country_code = 'US';
		endif;

	$base_url = 'https://1160-web1.vm.epicservers.com/';
	$retail_url = $base_url . $alias . '/additem?ItemCode=' . $item_code . '&Country=' . $country_code . '&OwnerID=' . $customer_id;
	return $retail_url;
}
?>
