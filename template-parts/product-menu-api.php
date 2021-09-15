<?php
/**
 * Get list of all products by category per country to populate the footer and modal menus): ​/api​/Products​/{countryCode}​/{languageCode}
 *
 * @package _s
 */

$base_api_url = $_SERVER['APICON'];
$base_url     = $base_api_url . 'Products/';
$server_url   = null;
$country      = 'US';
$language     = 'en';

// Check for the country and language cookies, otherwise use the default url -> /US/EN.
if ( isset( $_COOKIE['Country'] ) && isset( $_COOKIE['Language'] ) ) :
	$country    = $_COOKIE['Country'];
	$language   = $_COOKIE['Language'];
	$server_url = $base_url . $country . '/' . $language;
	elseif ( isset( $_COOKIE['Country'] ) && ! isset( $_COOKIE['Language'] ) ) :
		$country    = $_COOKIE['Country'];
		$server_url = $base_url . $country . '/' . $language;
		elseif ( ! isset( $_COOKIE['Country'] ) && isset( $_COOKIE['Language'] ) ) :
			$language   = $_COOKIE['Language'];
			$server_url = $base_url . $country . '/' . $language;
			else :
				$server_url = $base_url . $country . '/' . $language;
			endif;

			// Get the cookie alias and ID if set; otherwise, corporphan.
			if ( $server_url ) :
				try {
					$response     = wp_remote_get(
						$server_url,
						array(
							'sslverify' => false, // For development only.
							'timeout'   => 60,
						)
					);
					$product_menu = json_decode( $response['body'] );
				} catch ( Exception $e ) {
					echo 'Caught exception: ', esc_html( $e ), '\n';
				}
endif;

			// Retrieve rep info from the cookie for the url.
			$cookie_name = 'Current_Rep';
			if ( isset( $_COOKIE[ $cookie_name ] ) ) :
				$cookie  = wp_unslash( ( $_COOKIE[ $cookie_name ] ) );
				$decoded = json_decode( $cookie );
					// phpcs:ignore
				$customer_id = $decoded->customerId;
					// phpcs:ignore
				$alias       = $decoded->webAlias;
else :
	$customer_id = 50;
	$alias       = '50';
endif;

$home              = ( isset( $_SERVER['HTTPS'] ) && 'on' === $_SERVER['HTTPS'] ?
'https' : 'http' ) . '://' . $_SERVER['HTTP_HOST'];
$redirect_base_url = $home . '/products/';

?>

<div class="product-menu-cols">


		<?php foreach ( $product_menu as $item ) { ?>
			<div class="product-menu-col">
		<p class="product-menu-title"><?php echo esc_html( $item->category ); ?></p>
		<ul>
			<?php
			foreach ( $item->products as $product ) {
				?>
				<li><a href="
				<?php
				// phpcs:ignore
					echo esc_attr( $redirect_base_url . strtolower( $product->productPage ) . '/' );
				?>
					?item_id=
					<?php
					// phpcs:ignore
					echo esc_attr($product->itemID); ?>&item_code=<?php echo esc_attr($product->itemCode); ?>"><?php echo esc_html( $product->itemDescription ); ?></a></li>
			<?php } ?>
			</ul>
			</div>
		<?php } ?>


	<div class="product-menu-col footer-hidden" >
		<div class="promo">
			<div class="promo-image" style="background-image:url('<?php echo esc_attr( get_template_directory_uri() ) . '/build/images/smallimg-glasses.jpg'; ?>');"></div>
			<div class="promo-gradient"></div>
			<div class="promo-title">Happy Hour Replacement Introducing: Buzz</div>
		</div>
	</div>

</div>
