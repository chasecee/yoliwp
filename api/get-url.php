<?php

require_once 'repsite-validation.php';
// phpcs:ignore
function get_url() {
	$link = ( isset( $_SERVER['HTTPS'] ) && $_SERVER['HTTPS'] === 'on' ?
									'https' : 'http' ) . '://' . $_SERVER['HTTP_HOST'] .
									$_SERVER['REQUEST_URI'];

	$home            = 'http://' . $_SERVER['SERVER_NAME'] . ':10008/';
	$path            = wp_parse_url( $link )['path'];
	$link_components = wp_parse_url( $link );
	if ( isset( $link_components['query'] ) ) {
		parse_str( $link_components['query'], $params );
	}

	// Will return all valid pages: ( [0] => earn [1] => home [2] => our-story [3] => product-data [4] => products [5] => alkalete [6] => cheers [7] => defend [8] => passion [9] => shine [10] => yes [11] => sample-page [12] => scaffolding ).
	$wp_pages = array_column( get_pages(), 'post_name' );

	foreach ( $wp_pages as $wp_page ) {
		if ( '/' . $wp_page . '/' === $path || '\/products/' . $wp_page . '/' === $path || '\/products/' . $wp_page === $path ) {
			$path = '/';
		}
	}
	web_alias( $path, $home );
}
