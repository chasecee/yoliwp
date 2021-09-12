<?php
include_once 'repsite-validation.php';

/**
 * 1) Get the URL and return the path.
 */

function get_url() {
	$home = ( isset( $_SERVER['HTTPS'] ) && 'on' === $_SERVER['HTTPS'] ?
									'https' : 'http' ) . '://' . $_SERVER['HTTP_HOST'];

	$link = $home . $_SERVER['REQUEST_URI'];
	$path = parse_url( $link )['path'];
	$link_components = wp_parse_url( $link );
	if ( isset($link_components['query'])) {
		parse_str( $link_components['query'], $params);
	}

	// Will return all valid pages: ( [0] => earn [1] => home [2] => our-story [3] => product-data [4] => products [5] => alkalete [6] => cheers [7] => defend [8] => passion [9] => shine [10] => yes [11] => sample-page [12] => scaffolding )
	$wp_pages = array_column(get_pages(), 'post_name');

	foreach ( $wp_pages as $wp_page ) {
		if ( '/' . $wp_page . '/' === $path || '/products/' . $wp_page . '/' === $path || '/products/' . $wp_page === $path ) :
			// echo 'The path inside the get-url for-loop: ' . $path . '<br>';
			$path = '/';
		endif;
	}

	web_alias( $path, $home );
}
?>
