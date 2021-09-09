<?php
include_once 'repsite-validation.php';

/**
 * 1) Get the URL and return the path.
 */

function get_url() {
	$link = ( isset( $_SERVER['HTTPS'] ) && $_SERVER['HTTPS'] === 'on' ?
									'https' : 'http' ) . '://' . $_SERVER['HTTP_HOST'] .
									$_SERVER['REQUEST_URI'];

	$home = 'http://' . $_SERVER['SERVER_NAME'] . ':10008/';
	$path = parse_url( $link )['path'];
	$link_components = parse_url( $link );
	parse_str( $link_components['query'], $params);

	// Will return all valid pages: ( [0] => earn [1] => home [2] => our-story [3] => product-data [4] => products [5] => alkalete [6] => cheers [7] => defend [8] => passion [9] => shine [10] => yes [11] => sample-page [12] => scaffolding )
	$wp_pages = array_column(get_pages(), 'post_name');

	foreach ( $wp_pages as $wp_page ) {
		if ( $path === '/' . $wp_page . '/' || $path === '/' . 'products/' . $wp_page . '/' || $path === '/' . 'products/' . $wp_page ) {
			// echo 'The path inside the get-url for-loop: ' . $path . '<br>';
			$path = '/';
		}
	}

	web_alias( $path, $home );
}

?>
