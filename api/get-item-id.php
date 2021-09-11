<?php
function get_item_id() {
	if ( isset ( $_GET['item_id'] ) ) :
		$item_id = $_GET['item_id'];
	endif;

	// $cookie_name = 'item_id';
	// $cookie_value = $item_id;
	// $arr_cookie_options = array (
	// 	'expires' => time() + ( 86400 * 30 ),
	// 	'path' => '/',
	// 	'domain' => $_SERVER['HTTP_HOST'], // leading dot for compatibility or use subdomain
	// 	'secure' => true,
	// 	'httponly' => true,
	// 	'samesite' => 'Strict'
	// 	);


	// if ( !empty( $item_id) ) :
	// 	setcookie( $cookie_name, $cookie_value, $arr_cookie_options );
	// endif;

return $item_id;
}
?>
