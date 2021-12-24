<?php
/**
 * Template Name: Search Results
 *
 * This template displays a header with search bar, footer, and all applicable search results.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package _s
 */

get_header();
require realpath( __DIR__ ) . '/api/get-search-results.php';
require realpath( __DIR__ ) . '/api/join-and-shop-urls.php';
?>

<?php
	// Retrieve the query parameter.
	$query           = $_GET['query'];
	$query_lowercase = strtolower( $query );

	// Build the base url to redirect to the product page, e.g.: https://yoli.com/products/dream/?item_id=8283&item_code=SUPDRM-BT-US.
	$home                  = ( isset( $_SERVER['HTTPS'] ) && 'on' === $_SERVER['HTTPS'] ? 'https' : 'http' ) . '://' . $_SERVER['HTTP_HOST'];
	$product_page_url_base = $home . '/products/';

	// Handle searches for pages unrelated to products by redirecting to the appropriate page on an exact or related match.
	$wp_pages = array(
		'earn'              => '/earn',
		'join'              => '/earn',
		'member'            => '/earn',
		'membership'        => '/earn',
		'enroll'            => '/earn',
		'income'            => '/earn',
		'benefits'          => '/earn',
		'opportunity'       => '/earn',
		'freedom'           => '/earn',
		'commission'        => '/earn',
		'compensation plan' => '/earn',
		'compensation'      => '/earn',
		'bonuses'           => '/earn',
		'money'             => '/earn',
		'motivation'        => '/our-story',
		'culture'           => '/our-story',
		'purpose'           => '/our-story',
		'company'           => '/our-story',
		'life'              => '/our-story',
		'ingredients'       => '/our-story',
		'experience'        => '/our-story',
		'training'          => '/our-story',
		'founders'          => '/our-story',
		'process'           => '/our-story',
		'products'          => '/our-story',
		'community'         => '/our-story',
		'nutrients'         => '/our-story',
		'whole plants'      => '/our-story',
		'nature'            => '/our-story',
		'lifestyle'         => '/our-story',
		'robby fender'      => '/our-story',
		'robby'             => '/our-story',
		'fender'            => '/our-story',
		'success'           => '/our-story',
		'people'            => '/our-story',
	);

	$privacy_redirect = array(
		'terms and conditions',
		'terms conditions',
		'policies',
		'privacy policy',
		'privacypolicy',
		'priv',
		'regulation',
		'procedures',
		'personal information',
		'personal info',
		'technology',
		'tech',
		'collect data',
		'data',
		'annonymous data',
		'third party',
		'third parties',
		'agreement',
		'provider',
		'providers',
		'risk management',
		'risk manage',
		'users',
		'risk',
		'records',
		'legal',
		'law',
		'database',
		'security',
		'customer',
	);

	$shop_now_redirect = array(
		'lose weight',
		'healthy body',
		'products',
		'supplements',
		'flavors',
		'canisters',
		'vitality',
		'events',
		'gear',
		'shop',
	);

	// Retrieve rep info from the cookie for the url.
	if ( isset( $_COOKIE['wordpress_current_rep'] ) ) :
		$rep_cookie  = wp_unslash( ( $_COOKIE['wordpress_current_rep'] ) );
		$rep_decoded = json_decode( $rep_cookie );
		// phpcs:ignore
		$customer_id = $rep_decoded->customerId;
		// phpcs:ignore
		$alias       = $decoded->webAlias;
else :
	$customer_id = '50';
	$alias       = '50';
endif;

// Retrieve the selected country from the cookie variable; otherwise default to US.
if ( ! isset( $_COOKIE['wordpress_country'] ) ) :
	$country = 'US';
	else :
		$country = $_COOKIE['wordpress_country'];
endif;

	// Set the category id for redirecting to the promotions page.
	if ( ! isset( $country ) ) :
		$category_id = 1058;
	else :
		if ( 'US' === $country ) :
			$category_id = 1058;
			elseif ( 'CA' === $country ) :
				$category_id = 1071;
				elseif ( 'AU' === $country ) :
					$category_id = 1076;
					else :
						$category_id = 50;
		endif;
endif;

	// Check the query against each dictionary consecutively until either a match is found or it's not.
	foreach ( $wp_pages as $key => $value ) {
		if ( strtolower( $query ) === $key ) :
			$url = $home . $value . '/';
			echo '<script> window.location.href = "' . esc_attr( $url ) . '" </script>';
			exit;
		endif;
	}
	foreach ( $privacy_redirect as $value ) {
		if ( $value === $query_lowercase ) :
			$query = 'privacy policy';
			break;
		endif;
	}
	foreach ( $shop_now_redirect as $value ) {
		$url = $shop_now_url;
		if ( $query_lowercase === $value ) :
			echo '<script> window.location.href = "' . esc_attr( $url ) . '" </script>';
			exit;
		endif;
	}

	$post_boolean = false;
	// Build the search url and ping the API.
	if ( !empty ( $query ) ) :
			// Get items from shop.yoli.com directly via POST call to: https://shop.yoli.com/50/shopping/getitemlist.
		if ( false !== strpos( 'promotions', $query_lowercase ) ) :
			$search_url   = $_SERVER['SHOPCON'] . $alias . '/shopping/getitemlist';
			$data         = array( 'categoryID' => $category_id );
			$method       = 'POST';
			$post_boolean = true;
			else :
				$search_url = $_SERVER['APICON'] . 'products/search/' . $country . '/' . $query;
				$data       = null;
				$method     = 'GET';
			endif;
	endif;
	// $results = get_search_results( $search_url, $data, $method );
	$results = get_search_results( $search_url, $data, $country, $method );

	// Display the query in the search field (only on the search-results page).
	if ( !empty ( $query ) ) :
		echo '<script>
		let input = document.getElementById("search-field");
		input.setAttribute("value", "' . esc_attr( $query ) . '");
		input.setAttribute("style", "color:gray; background-color:transparent");
	</script>';
	endif;

	// Create a new array from $results->relatedItems.
	$category_array = (array) null;
	$related_items  = (array) null;
	$filter         = null;
	if ( ( $results && !isset( $results->items ) ) ) :
		foreach ( $results as $key => $result ) {
			// phpcs:ignore
			if ( $result->relatedItems ) :
				// phpcs:ignore
				array_push( $category_array, $result->categoryDescription );
			endif;
			// phpcs:ignore
			if ( $result->categoryDescription !== $filter ) :
				// phpcs:ignore
				$filter = $result->categoryDescription;
				// phpcs:ignore
				if ( count( $result->relatedItems ) > 0 ) :
					// phpcs:ignore
					array_push( $related_items, $result->relatedItems );
				endif;
			endif;
		}
	endif;

	// Elminate any duplicate items from $category_array.
	$unique_category_array = (array) null;
	if ( $category_array ) {
		$unique_category_array = array_unique( $category_array );
	}
	if ( $unique_category_array ) {
		$reindexed_category_array = array_values( $unique_category_array );
	}

	$base_buy_url = $_SERVER['SHOPCON'] . $alias . '/additem?ItemCode=';

	function get_promo_description($item_id, $country) {
		$url = $_SERVER['APICON'] . 'products/' . $country . '/' . $item_id . '/en';
		try {
			$response = wp_remote_get( $url, array( 'sslverify' => false, 'timeout' => 60 ) );
			$res      = json_decode( $response['body'] );

		} catch ( Exception $e ) {
			$error = $e;
		}
		return $res->shortDetail;
	}
?>

<?php
// acf vars.
$background_color = get_field( 'background_color' );
$foreground_color = get_field( 'foreground_color' );
?>
<style>
	main {
		margin-bottom: 3rem;
	}
	body,.bg-color{
		background-color: <?php echo esc_attr( $background_color ); ?>
	}
	h1,.fg-color{
		color: <?php echo esc_attr( $foreground_color ); ?>
	}
	.fg-color-as-bg-color{
		background-color: <?php echo esc_attr( $foreground_color ); ?>
	}
	.btn-accent{
		background-color: #23355c;
		color: white;
		border-color: #23355c;
	}
	.btn-accent-outline{
		border-color: #23355c;
		color: #23355c;
		background-color: transparent;
		margin-bottom: 1rem;
	}
	.search-results-container {
		display: flex;
		flex-direction: column;
	}
	.results-header {
		margin: 0rem 2rem;
	}
	h2.product-content-title {
		color: #23355c;
		margin: 0;
		font-size: 4rem;
	}
	h3 {
		border-top: 1px solid #23355c;
		margin: 0;
	}
	h4 {
		font-size: 18px;
		font-weight: bold;
		margin: 0;
	}
	h4.category-name {
		margin-top: 1rem;
		border-bottom: 1px solid #23355c;
	}
	p {
		font-size: 12px;
		text-align: left;
		text-justify: auto;
		margin-right: 1rem;
	}
	a.privacy-policy-search-result {
		text-decoration: underline;
	}
	a.privacy-policy-search-result:hover {
		text-decoration: underline;
		color: #e86236;
	}
	.exact-search-results {
		display: flex;
		justify-content: center;
		align-items: flex-end;
		margin: 0 2rem 3rem 2rem;
		flex-wrap: wrap;
	}
	.related-search-results {
		display: flex;
		flex-direction: column;
		justify-content: center;
		flex-wrap: wrap;
	}
	.search-result {
		max-width: 30rem;
		margin: 2rem;
	}
	.related-results-by-category {
		display: flex;
		flex-wrap: wrap;
		justify-content: center;
		margin: 3rem;
	}
	.search-result-related {
		display: flex;
		flex-direction: column;
		align-items: center;
		max-width: 35rem;
		margin: 1rem;
		padding: 1rem;
		border: 1px solid #23355c;
		border-radius: 7px;
	}
	.related-image-and-buy-buttons {
		display: flex;
	}
	.search-result-detail {
		display: flex;
		flex-direction: column;
		align-items: center;
	}
	.search-result-image {
		max-height: 30vh;
		min-width: 50%;
		margin: 1rem;
	}
	.search-result-image-related {
		max-height: 20vh;
	}
	.search-result-buy-options{
		margin-top: 1rem;
	}
	.related-title-and-description {
		margin-top: 1rem;
	}
	.no-search-results {
		margin: 5rem 0 10rem 5rem;
		max-width: 30rem;
	}
	.no-search-results-container {
		display: flex;
		flex-direction: column;
		align-items: center;
	}
	.highlight {
		color: #e86236;
	}
	@media (max-width: 768px) {
		.search-result-related {
			flex-direction: column;
		}
	}
	@media (max-width: 550px) {
		#related-retail-button {
			max-width: 10rem;
		}
		#related-sub-button {
			max-width: 10rem;
		}
		h2.product-content-title {
			font-size: 2rem;
		}
	}
</style>

<div class="site-main">
	<main id="main" class="content-container">
		<div class="search-results-container">
			<?php
			if ( ! $results ) :
				if ( 'privacy policy' === $query ) :
					?>
				<div class="results-header">
					<h2 class="product-content-title">Search Results</h2>
					<h3>Exact Matches -> 1</h3>
				</div>
				<div class="no-search-results-container">
					<div class="no-search-results">
					<a class="privacy-policy-search-result" href="<?php echo esc_attr( $_SERVER['PRIVCON'] ); ?>" target="_blank" rel="noopener noreferrer">
						<img src="<?php echo esc_attr( get_template_directory_uri() ); ?>/src/images/padlock-privacy.svg" alt="Padlock image" alt="Padlock image" class="search-result-image" loading="lazy"/>
						<h4 class="result-title">Privacy Policy</h4>
					</a>
					<p class="result-description">Click above to view our privacy policy.</p>
					</div>
				</div>
					<?php
				else :
					?>
				<div class="results-header">
					<h2 class="product-content-title">Search Results</h2>
					<h3>Exact Matches -> 0</h3>
				</div>
				<div class="no-search-results-container">
					<div class="no-search-results">
						<img src="<?php echo esc_attr( get_template_directory_uri() ); ?>/src/images/icons/not-found.png" alt="magnifying-glass icon" alt="Not-found icon" class="search-result-image" loading="lazy"/>
						<h4 class="result-title">Not Found</h4>
						<p class="result-description">Your search for <strong style="color:#e86236">"<?php echo esc_html( $query ); ?>"</strong> returned <i style="color:#e86236">zero</i> results. Please try a different search or choose an option from the menu. </p>
					</div>
				</div>
					<?php
				endif;
			else :

				if ( ! $post_boolean ) :
					?>
					<div class="results-header">
						<h2 class="product-content-title">Search Results</h2>
						<h3>Exact Matches -> <?php echo esc_html( count( $results ) ); ?></h3>
					</div>
					<div class="exact-search-results">
						<?php	foreach ( $results as $result ) { ?>
							<div class="search-result">
								<?php // phpcs:ignore ?>
								<a class="exact-result-anchor" href="<?php echo esc_attr( $product_page_url_base . $result->productPage . '/?item_id=' . $result->itemID . '&item_code=' . $result->itemCode ); ?>">
									<div class="search-result-detail">
										<?php // phpcs:ignore ?>
										<img title="Click to learn more." class="search-result-image" loading="lazy" alt="product image" src="<?php echo esc_attr( $_SERVER['SHOPCON'] . 'shopping/productimages/' . $result->smallImageName ); ?>" />
										<div>
											<?php // phpcs:ignore ?>
											<h4 class="result-title highlight-query"><?php echo esc_attr( $result->itemDescription ); ?></h4>
											<?php // phpcs:ignore ?>
											<h6 class="result-category highlight-query">Category | <?php echo esc_html( $result->categoryDescription ); ?></h6>
											<?php // phpcs:ignore ?>
											<p class="result-description highlight-query"><?php echo esc_attr( $result->shortDetail && $result->shortDetail !== '' ? $result->shortDetail : 'No description is available.' ); ?></p>
										</div>
									</div>
								</a>
								<div class="search-result-buy-options">
									<?php // phpcs:ignore ?>
									<a href="<?php echo esc_attr( $base_buy_url . $result->itemCode . '&Country=' . $country . '&OwnerID=' . $customer_id . '&autoOrder=false' ); ?>">
										<button class="btn btn-primary btn-accent-outline btn-full">
											Shop Now
											<?php if ( $result->price ) : ?>
												<?php echo ' — '; ?>
												<?php echo esc_html( $result->price->retailPriceFmtd ); ?>
											<?php endif; ?>
										</button>
									</a>
									<?php // phpcs:ignore ?>
									<a href="<?php echo esc_attr( $base_buy_url . $result->itemCode . '&Country=' . $country . '&OwnerID=' . $customer_id . '&autoOrder=true' ); ?>">
										<button class="btn btn-primary btn-accent btn-full">
											Subscribe & Save
											<?php if ( $result->price ) : ?>
												<?php echo ' — '; ?>
												<?php echo esc_html( $result->price->autoshipPriceFmtd ); ?>
											<?php endif; ?>
										</button>
									</a>
								</div>
							</div>
						<?php } ?>
					</div>

					<div class="results-header">
						<h3>
							Related Matches ->
							<?php
							$count = 0;
							foreach ( $related_items as $items ) {
								$count += count( $items );
							}
							echo esc_html( $count )
							?>
						</h3>
					</div>
					<div class="related-search-results">
					<?php
					foreach ( $related_items as $key => $result ) {
						?>
						<div class="results-header">
							<h4 class="category-name highlight-query">
								Category -> <?php echo esc_html( $reindexed_category_array[ $key ] ); ?>
							</h4>
						</div>
						<div class="related-results-by-category">
						<?php foreach ( $result as $related ) { ?>
							<div class="search-result-related">
								<div class="related-image-and-buy-buttons">
									<?php // phpcs:ignore ?>
									<a href="<?php echo esc_attr( $product_page_url_base . $related->productPage . '/?item_id=' . $related->itemID . '&item_code=' . $related->itemCode ); ?>" title="Click to learn more.">
										<?php // phpcs:ignore ?>
										<img class="search-result-image-related" loading="lazy" alt="product image" src="<?php echo esc_attr( $_SERVER['SHOPCON'] . 'shopping/productimages/' . $related->smallImageName ); ?>" />
									</a>
									<div class="search-result-buy-options">
										<?php // phpcs:ignore ?>
										<a href="<?php echo esc_attr( $base_buy_url . $related->itemCode . '&Country=' . $country . '&OwnerID=' . $customer_id . '&autoOrder=false' ); ?>">
										<button id="related-retail-button" class="btn btn-primary btn-accent-outline btn-full related-retail-button">
										</button>
									</a>
										<?php // phpcs:ignore ?>
										<a href="<?php echo esc_attr( $base_buy_url . $related->itemCode . '&Country=' . $country . '&OwnerID=' . $customer_id . '&autoOrder=true' ); ?>">
										<button id="related-sub-button" class="btn btn-primary btn-accent btn-full related-sub-button"></button>
										</a>
									</div>
								</div>
								<div class="related-title-and-description">
									<?php // phpcs:ignore ?>
									<h4 class="result-title highlight-query"><?php echo esc_attr( $related->itemDescription ); ?></h4>
									<?php // phpcs:ignore ?>
									<p class="result-description highlight-query">
										<?php	echo esc_attr( $related->shortDetail === '' ? 'No description is available for this item.' : $related->shortDetail ); ?>
									</p>
								</div>
							</div>
						<?php } ?>
						</div>
					<?php } ?>
				</div>

					<?php
					else : // This renders to display promos = workaround until Exigo can accept a country-code as a query param to determine which promotional items to show.
						?>
					<div class="results-header">
						<h2 class="product-content-title">Search Results</h2>
						<h3>Promotions -> <?php echo esc_html( count( $results->items ) ); ?></h3>
					</div>
					<div class="exact-search-results">
						<?php	foreach ( $results->items as $result ) { ?>
							<div class="search-result">
								<?php // phpcs:ignore ?>
								<!-- <a class="exact-result-anchor" href="<?php echo esc_attr( $_SERVER['SHOPCON'] . $result->ItemUrl ); ?>" target="_blank" rel="noopener noreferrer"> -->
								<a href="<?php echo esc_attr( $base_buy_url . $result->ItemCode . '&Country=' . $country . '&OwnerID=' . $customer_id . '&autoOrder=false' ); ?>" target="_blank" rel="noopener noreferrer">
								<div class="search-result-detail">
										<?php // phpcs:ignore ?>
										<img title="Click to add this item to your shopping cart." class="search-result-image" loading="lazy" alt="product image" src="<?php echo esc_attr( $_SERVER['SHOPCON'] . $result->SmallImageUrl ); ?>" />
										<div>
											<?php // phpcs:ignore ?>
											<h4 class="result-title highlight-query"><?php echo esc_attr( $result->ItemDescription ); ?></h4>
											<?php // phpcs:ignore ?>
											<p class="result-description highlight-query">
												<?php
													$item_description = get_promo_description( $result->ItemID, $country );
													echo $item_description;
												?>
											</p>
										</div>
									</div>
								<!-- </a> -->
								<div class="search-result-buy-options">
									<?php // phpcs:ignore ?>
									<!-- <a class="exact-result-anchor" href="<?php echo esc_attr( $_SERVER['SHOPCON'] . $alias . '/product/' . $result->ItemCode ); ?>" target="_blank" rel="noopener noreferrer">
									<button class="btn btn-primary btn-accent btn-full">
											Buy for <?php echo esc_html( $result->PriceString ) ?>
										</button>
									</a> -->
									<?php // phpcs:ignore ?>
									<!-- <a href="<?php echo esc_attr( $base_buy_url . $result->ItemCode . '&Country=' . $country . '&OwnerID=' . $customer_id . '&autoOrder=false' ); ?>" target="_blank" rel="noopener noreferrer"> -->
										<button class="btn btn-primary btn-accent btn-full">
											Get this promo for <?php echo esc_html( $result->PriceString ) ?>
										</button>
									</a>
								</div>
							</div>
						<?php } ?>
					</div>

						<?php
					endif;
				endif;
			?>
		</div>
	</main>
</div>

<!-- Highlight the search term every where it occurs on the page. -->
<script>
	const queryLength = '<?php echo esc_html( $query ); ?>'.length;
	const text = document.getElementsByClassName('highlight-query');

	for (let value of text) {
		const title = value.innerHTML;
		const index = title.toLowerCase().indexOf('<?php echo esc_html( $query ); ?>'.toLowerCase());

		if (index >= 0) {
			const highlightQuery = title.substring(0, index) + '<span class="highlight">' + title.substring(index, index + queryLength) + '</span>' + title.substring(index + queryLength);
			value.innerHTML = highlightQuery;
		}
	};
</script>

<!-- Change text of buy buttons based on browser width. -->
<script>
	const buttonText = () => {
		const browserWidth = window.innerWidth;
		const retailButton = document.getElementsByClassName('related-retail-button');
		const subButton = document.getElementsByClassName('related-sub-button');
		if (browserWidth > 550) {
			for (let retail of retailButton) retail.innerHTML = 'Shop Now	<?php if ( $related->price ) : ?> <?php echo ' — '; ?> <?php echo esc_html( $related->price->retailPriceFmtd ); ?><?php endif; ?>';

			for (let sub of subButton) sub.innerHTML = 'Subscribe & Save	<?php if ( $related->price ) : ?><?php echo ' — '; ?><?php echo esc_html( $related->price->retailPriceFmtd ); ?><?php endif; ?>';
		} else {
			for (let retail of retailButton) retail.innerHTML = 'Buy	<?php if ( $related->price ) : ?> <?php echo ' — '; ?> <?php echo esc_html( $related->price->retailPriceFmtd ); ?><?php endif; ?>';

			for (let sub of subButton) sub.innerHTML = 'Save <?php if ( $related->price ) : ?><?php echo ' — '; ?><?php echo esc_html( $related->price->retailPriceFmtd ); ?><?php endif; ?>';
		}
	}
	buttonText();
	window.onresize = buttonText;
</script>

<?php get_footer(); ?>
