<?php
/** Get list of all products by category per country to populate the footer and modal menus): ​/api​/Products​/{countryCode}​/{languageCode} */
$base_url    = 'https://108.59.44.81/api/Products/';
$server_url  = null;
$default_url = 'https://108.59.44.81/api/Products/US/EN';
$host_url = 'http://' . $_SERVER['SERVER_NAME'] . ':10008/';
// Check for the country and language cookies, otherwise use the default url -> /US/EN.
if ( isset( $_COOKIE['Country'] ) && isset( $_COOKIE['Language'] ) ) {
	$serverUrl = $baseUrl . $_COOKIE['Country'] . '/' . $_COOKIE['Language'];
}

// Get the cookie alias and ID if set; otherwise, corporphan
if ( $serverUrl ) {
	try {
		$response = wp_remote_get( $server_url, array( 'sslverify' => false, 'timeout' => 60 ) );
		$menu      = json_decode( $response['body'] );
	} catch ( Exception $e ) {
		echo 'Caught exception: ', $e->getMessage(), '\n';
	}
} else {
	try {
		$response = wp_remote_get( $default_url, array( 'sslverify' => false, 'timeout' => 60 ) );
		$menu      = json_decode( $response['body'] );
	} catch ( Exception $e ) {
		echo 'Caught exception: ', $e->getMessage(), '\n';
	}
}

?>

<div class="product-menu-cols">

	<div class="product-menu-col">
		<?php foreach($menu as $item) { ?>
		<p class="product-menu-title"><?php echo esc_html($item->category) ?></p>
		<ul>
			<?php foreach($item->products as $product) { ?>
				<li><a href="products/<?php echo esc_attr(strtolower($product->itemDescription))?>?item_id=<?php echo $product->itemID ?>"><?php echo esc_html($product->itemDescription) ?></a></li>
			<?php } ?>
			</ul>
		<?php } ?>
	</div>

	<div class="product-menu-col footer-hidden" >
		<div class="promo">
			<div class="promo-image" style="background-image:url('<?php echo esc_attr( get_template_directory_uri() ) . '/build/images/smallimg-glasses.jpg'; ?>');"></div>
			<div class="promo-gradient"></div>
			<div class="promo-title">Happy Hour Replacement Introducing: Buzz</div>
		</div>
	</div>

</div>

