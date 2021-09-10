<?php
/** Get list of all products by category per country to populate the footer and modal menus): ​/api​/Products​/{countryCode}​/{languageCode} */
$base_url    = 'https://108.59.44.81/api/Products/';
$server_url  = null;
$default_url = 'https://108.59.44.81/api/Products/US/EN';

// Check for the country and language cookies, otherwise use the default url -> /US/EN.
if ( isset( $_COOKIE['Country'] ) && isset( $_COOKIE['Language'] ) ) {
	$server_url = $base_url . $_COOKIE['Country'] . '/' . $_COOKIE['Language'];
}

// Get the cookie alias and ID if set; otherwise, corporphan
if ( $server_url ) {
	try {
		$response = wp_remote_get( $server_url, array( 'sslverify' => false, 'timeout' => 60 ) );
		$product_menu      = json_decode( $response['body'] );
	} catch ( Exception $e ) {
		echo 'Caught exception: ', esc_html($e), '\n';
	}
} else {
	try {
		$response = wp_remote_get( $default_url, array( 'sslverify' => false, 'timeout' => 60 ) );
		$product_menu      = json_decode( $response['body'] );
	} catch ( Exception $e ) {
		echo 'Caught exception: ', esc_html($e), '\n';
	}
}

	$cookie_name = 'Current_Rep';
	if( isset( $_COOKIE[$cookie_name] ) ):
		$cookie = wp_unslash( ($_COOKIE[$cookie_name] ) );
    $decoded = json_decode($cookie);
    $customer_id = $decoded->customerId;
		$alias = $decoded->webAlias;
	else :
		$customer_id = 50;
		$alias = 50;
	endif;

	$redirect_base_url = 'http://' . $_SERVER['HTTP_HOST'] . '/products/';

	// Url = `https://1160-web1.vm.epicservers.com/corporphan/additem?ItemCode=ItemA&Country=US&OwnerID=1 `.

	?>

<div class="product-menu-cols">

	<div class="product-menu-col">
		<?php foreach($product_menu as $item) { ?>
		<p class="product-menu-title"><?php echo esc_html($item->category) ?></p>
		<ul>
			<?php foreach($item->products as $product) { ?>
				<li><a href="<?php echo esc_attr($redirect_base_url . strtolower($product->itemDescription) . '/')?>?item_id=<?php echo $product->itemID ?>&item_code=<?php echo $product->itemCode ?>&customer_id=<?php echo $customer_id ?>&web_alias=<?php echo $alias ?>"><?php echo esc_html($product->itemDescription) ?></a></li>
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

