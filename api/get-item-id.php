<?php
function get_item_id() {
	$link = ( isset( $_SERVER['HTTPS'] ) && $_SERVER['HTTPS'] === 'on' ?
	'https' : 'http' ) . '://' . $_SERVER['HTTP_HOST'] .
	$_SERVER['REQUEST_URI'];

	$link_components = parse_url( $link );

	if ( !empty( $link_components['query'] ) ):
	parse_str( $link_components['query'], $params);
	endif;

	if ( !empty( $params )):
	return $params['item_id'];
	endif;

}
?>
