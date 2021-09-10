<?php
/**
 * Captures a product's item id when passed as a query parameter.
 *
 * @package _s
 */

/**
 * The function comment.
 */
function get_item_id() {
	echo '<script>console.log("In get-item-id.php")</script>';
	$link = ( isset( $_SERVER['HTTPS'] ) && 'on' === $_SERVER['HTTPS'] ?
										'https' : 'http' ) . '://' . $_SERVER['HTTP_HOST'] .
										$_SERVER['REQUEST_URI'];

	$link_components = wp_parse_url( $link );
	parse_str( $link_components['query'], $params );

	return $params['item_id'];
}
