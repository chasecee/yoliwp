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
	$show_banner = true;
	$link_components = wp_parse_url( $link );

	// Set redirect for any path with /wp- or /products/.
	if (
		strpos( $link, '/wp-' ) !== false ||
		strpos( $link, '/admin-ajax.php' ) !== false  ||
		strpos( $link, '/admin-post.php' ) !== false  ||
		strpos( $link, '/index.php' ) !== false ||
		strpos( $link, '/sitemap' ) !== false ||
		strpos( $link, '-sitemap.xml' ) !== false ||
		strpos( $link, '/robots.txt' ) !== false
		) :
		$redirect = '/';
		$show_banner = false;

		elseif (
			strpos( $link, '/products/' ) !== false ||
			strpos( $link, '/earn/' ) !== false ||
			strpos( $link, '/our-story/' ) !== false
		) :
			$redirect = '/';

		else :
				// Will return an array of all valid, client-facing wp-pages, e.g., ( [0] => earn [1] => home [2] => our-story [3] => product-data [4] => products [5] => alkalete [6] => cheers [7] => defend [8] => passion [9] => shine [10] => yes [11] => sample-page [12] => scaffolding ).
			$wp_pages = array_column( get_pages(), 'post_name' );
			foreach ( $wp_pages as $page ) {
				if (
					'/' . $page === $path ||
					'/' . $page . '/' === $path
					) :
					$redirect = '/';
				endif;
			}
		endif;

	if ($redirect === null ) : $redirect = $path; endif;

	echo 'The path in get-url is: ' . $path . '<br>';
	echo 'The redirect in get-url is: ' . $redirect . '<br>';

	web_alias( $redirect, $home, $path, $show_banner );
}
?>
