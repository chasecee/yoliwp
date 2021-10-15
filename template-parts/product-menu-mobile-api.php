<?php
/**
 * Displaying the product menu on mobile.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package _s
 */

?>
<?php
require_once 'privacy-policy.php';
require_once realpath( __DIR__ . '/..' ) . '/api/get-countries.php';

$countries = get_countries();

// For the API call to get a list of products.
$base_api_url = $_SERVER['APICON'];
$base_url     = $base_api_url . 'Products/';
$server_url   = null;
$country      = 'US';
$language     = 'en';

// Check for the country and language cookies, otherwise use the default url -> /US/EN.
if ( isset( $_COOKIE['wordpress_country'] ) && isset( $_COOKIE['wordpress_language'] ) ) :
	$country    = $_COOKIE['wordpress_country'];
	$language   = $_COOKIE['wordpress_language'];
	$server_url = $base_url . $country . '/' . $language;
	elseif ( isset( $_COOKIE['wordpress_country'] ) && ! isset( $_COOKIE['wordpress_language'] ) ) :
		$country    = $_COOKIE['wordpress_country'];
		$server_url = $base_url . $country . '/' . $language;
		elseif ( ! isset( $_COOKIE['wordpress_country'] ) && isset( $_COOKIE['wordpress_language'] ) ) :
			$language   = $_COOKIE['wordpress_language'];
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
					echo 'Caught exception: ', esc_html( $e->getMessage() ), '\n';
				}
endif;

			// Retrieve rep info from the cookie for the url.
			$cookie_name = 'wordpress_current_rep';
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

$post_url = $_SERVER['HTTP_REFERER'];

// This populates the hidden form so that the chosen country will post to the server and be available in the $_POST array.
echo '<script type="text/javascript">
	function captureCountry(event) {
		const hiddenForm = document.getElementById("country");
		hiddenForm.innerHTML = `<input name="sel_country" value="${event.value}"></input>`;
		hiddenForm.submit();
	}
</script>';
?>

<ul id="site-mobile-menu" class="mobile-menu">
	<li class="menu-item">
		<a href="/our-story/" aria-current="page">Our Story</a>
	</li>
	<li class="menu-item menu-item-has-children">
		<span>Products</span>
		<ul class="sub-menu">

			<?php foreach ( $product_menu as $item ) { ?>

				<li class="menu-item menu-item-has-children">
					<span class="product-menu-title"><?php echo esc_html( $item->category ); ?></span>
					<ul class="sub-menu">
						<?php
						foreach ( $item->products as $product ) {
							?>
							<li class="menu-item">
								<a href="
								<?php
								// phpcs:ignore
									echo esc_attr( $redirect_base_url . strtolower( $product->productPage ) . '/' );
								?>
									?item_id=
									<?php
									// phpcs:ignore
									echo esc_attr($product->itemID); ?>&item_code=<?php echo esc_attr($product->itemCode); ?>"><?php echo esc_html( $product->itemDescription ); ?></a>
							</li>
						<?php } ?>
					</ul>
						</li>

			<?php } ?>
		</ul>
	</li>
	<li class="menu-item"><a href="/earn/">Earn</a></li>

	<li class="menu-item menu-item-has-children">
		<span>Country</span>
		<ul class="sub-menu">
						<?php
						foreach ( $countries as $key => $option ) {
								// phpcs:ignore
								if ( ! isset( $_COOKIE['wordpress_country'] ) && $key === 'US' ) : $slctd = 'selected';
									elseif ( isset( $_COOKIE['wordpress_country'] ) && $_COOKIE['wordpress_country'] === $key ) :
										$slctd = 'selected';
										else :
											$slctd = '';
											endif;
										// phpcs:ignore
										?>
											<li onclick="captureCountry(event.target.attributes.value)" name="sel_country" value="<?php echo esc_attr( $key ); ?>" <?php echo esc_attr( $slctd ); ?>><?php echo esc_html( $option ); ?></li>
				<?php	} ?>
		</ul>
	</li>
	<form hidden id="country" method="post" ></form>

	<?php
	require realpath( __DIR__ . '/..' ) . '/api/join-and-shop-urls.php';
	?>

	<li class="menu-item">
		<a class="login-link" href="<?php echo esc_attr( $login_link ); ?> ">Login</a>
	</li>

	<li class="menu-item">
		<a class="shop-link" href="<?php echo esc_attr( $shop_now_url ); ?>">Shop Now
			<div class="shop-link-icon"><?php echo esc_html( get_template_part( '/src/images/icons/inline/inline', 'arrow-right.svg' ) ); ?></div>
		</a>
	</li>
	<li class="menu-item">
		<div class="menu-bottom">

			<?php // Promo Template Part. ?>
			<?php get_template_part( 'template-parts/promo' ); ?>

			<?php
			require realpath( __DIR__ ) . '/contact-info.php';
			?>
			<p>
				Customer Support<br>
				<?php echo esc_html( $hours ); ?><br>
				<?php echo esc_html( $phone_one ); ?> or <?php echo esc_html( $phone_two ); ?><br>
				<?php echo esc_html( $email ); ?>
			</p>

			<?php // Social links via template part based on country cookie. ?>
			<?php get_template_part( 'template-parts/social-links' ); ?>

		</div>
	</li>
</ul>
