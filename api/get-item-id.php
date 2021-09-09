<?php
// This function captures the id of the item selected from the products menu in the header and footer.
function get_item_id() {
	$link = ( isset( $_SERVER['HTTPS'] ) && $_SERVER['HTTPS'] === 'on' ?
	'https' : 'http' ) . '://' . $_SERVER['HTTP_HOST'] .
	$_SERVER['REQUEST_URI'];

	$link_components = parse_url( $link );
	parse_str( $link_components['query'], $params);

	return $params['item_id'];
}
