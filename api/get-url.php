<?php
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

	// Will return an array of all valid, client-facing wp-pages, e.g., ( [0] => earn [1] => home [2] => our-story [3] => product-data [4] => products [5] => alkalete [6] => cheers [7] => defend [8] => passion [9] => shine [10] => yes [11] => sample-page [12] => scaffolding ).
	$wp_pages = array_column( get_pages(), 'post_name' );
	$wp2 = array('robots.txt', 'sitemap.xml', 'admin-ajax.php', 'admin-post.php', 'post.php', 'index.php');

	$real_paths = array_merge($wp_pages, $wp2);

	foreach ( $real_paths as $page ) {
		if (
			'/'. $page === $path ||
			'/' . $page . '/' === $path ||
			strpos($link, '/products/') ||
			strpos($link, '/wp-') !== false
			) :
			$redirect = '/';
		endif;
	}

	if ($redirect === null ) : $redirect = $path; endif;

	web_alias( $redirect, $home, $path );
}
?>
