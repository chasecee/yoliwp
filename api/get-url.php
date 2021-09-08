<?php
include_once 'repsite-validation.php';
/**
 * 1) Get the URL and return the path.
 */

function get_url() {
	$link = ( isset( $_SERVER['HTTPS'] ) && $_SERVER['HTTPS'] === 'on' ?
									'https' : 'http' ) . '://' . $_SERVER['HTTP_HOST'] .
									$_SERVER['REQUEST_URI'];

	// $home = 'http://' . $_SERVER['SERVER_NAME'] . ':10008/';
	$path = (str_replace('/', '', parse_url( $link )['path']));

	// echo 'The url is: http://' . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'] . '<br><br>';
	echo 'The requested url link is: ' . $link . '<br><br>';

	// Will return all valid pages: ( [0] => earn [1] => home [2] => our-story [3] => product-data [4] => products [5] => alkalete [6] => cheers [7] => defend [8] => passion [9] => shine [10] => yes [11] => sample-page [12] => scaffolding )
	$wp_pages = array_column(get_pages(), 'post_name');

	echo 'The wp_pages array: ';
	print_r($wp_pages);
	echo '<br>';

	foreach ( $wp_pages as $wp_page ) {
		if ( $path === $wp_page || 'products/alkalete' || 'products/cheers' || 'products/defend' || 'products/passion' || 'products/shine' || 'products/yes' ) {
			$path = '';
		}
	}

	web_alias( $path, $link );
}

?>
