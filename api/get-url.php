<?php
include_once 'repsite-validation.php';

/**
 * 1) Get the URL and return the path.
 */

require_once 'repsite-validation.php';
// phpcs:ignore
function get_url() {
	$home = ( isset( $_SERVER['HTTPS'] ) && 'on' === $_SERVER['HTTPS'] ?
									'https' : 'http' ) . '://' . $_SERVER['HTTP_HOST'];

	$link = $home . $_SERVER['REQUEST_URI'];
	$path = parse_url( $link )['path'];
	$redirect = null;
	$link_components = wp_parse_url( $link );
	if ( isset($link_components['query'])) {
		parse_str( $link_components['query'], $params);
	}

	// Will return an array of all valid, client-facing wp-pages, e.g., ( [0] => earn [1] => home [2] => our-story [3] => product-data [4] => products [5] => alkalete [6] => cheers [7] => defend [8] => passion [9] => shine [10] => yes [11] => sample-page [12] => scaffolding ).
	$wp_pages = array_column( get_pages(), 'post_name' );
	$wp2 = array('wp-admin', 'robots.txt', 'sitemap.xml');
	$real_paths = array_merge($wp_pages, $wp2);

	foreach ( $real_paths as $page ) {
		if ( '/' . $page . '/' === $path || '/products/' . $page . '/' === $path || '/products/' . $page === $path || 0 === strpos($path, 'wp-admin' ) ) :
			$redirect = '/';
		endif;
	}

	if ($redirect === null ) : $redirect = $path; endif;

	web_alias( $redirect, $home, $path );
}
?>
