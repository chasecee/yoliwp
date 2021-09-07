<?php

/**
 * 1) Get the URL and return the path.
 */

function get_url() {
	$link = ( isset( $_SERVER['HTTPS'] ) && $_SERVER['HTTPS'] === 'on' ?
									'https' : 'http' ) . '://' . $_SERVER['HTTP_HOST'] .
									$_SERVER['REQUEST_URI'];

	$path = parse_url( $link )['path'];

	// Will return all valid pages.
	$wp_pages = array_column(get_pages(), 'post_name');
	// $wp_pages = array( '/corporphan', '/to-orphan', '/home', '/earn', '/our-story', '/product-data', '/products', '/passion' );
	foreach ( $wp_pages as $wp_page ) {
		if ( $path === $wp_pages ) {
			$path = '/';
		}
	}
	return $path;
}
