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
?>

<?php
	// Retrieve the query parameter.
	$query   = $_GET['query'];

	// Build the base url to redirect to the product page, e.g.: https://yoli.com/products/dream/?item_id=8283&item_code=SUPDRM-BT-US
	$home                  = ( isset( $_SERVER['HTTPS'] ) && 'on' === $_SERVER['HTTPS'] ?	'https' : 'http' ) . '://' . $_SERVER['HTTP_HOST'];
	$product_page_url_base = $home . '/products/';

	// Handle searches for pages unrelated to products by redirecting to the appropriate page on an exact or related match.
	$wp_pages = array ('earn' => '/earn', 'privacy' => $_SERVER['PRIVCON'], 'policy' => $_SERVER['PRIVCON'], 'privacy policy' => $_SERVER['PRIVCON'], 'privacypolicy' => $_SERVER['PRIVCON'],'join' => '/earn', 'member' => '/earn', 'benefits' => '/earn');
	foreach ( $wp_pages as $key => $page ) {
		if ( $query === $key ) :
			if ('privacy' || 'policy' || 'privacy policy' || "privacypolicy" === $key ) :
				$url = $page;
				else :
					$url = $home . $page . '/';
				endif;
			echo '<script> window.location.href = "' . esc_attr( $url ) . '" </script>';
		endif;
	}

	// Build the search url and ping the API.
	$country = $_COOKIE['wordpress_country'];
	if ( $query ) :
		if ( $country ) :
			$search_url = $_SERVER['APICON'] . 'products/search/' . $country . '/' . $query;
			else :
				$search_url = $_SERVER['APICON'] . 'products/search/us/' . $query;
				endif;
		endif;
	$results = get_search_results( $search_url );

	// Display the query in the search field (only on the search-results page). * Not working.
	if ($query) :
	echo '<script>
		let input = document.getElementById("search-field");
		input.setAttribute("value", "' . $query . '");
		input.setAttribute("style", "color:gray; background-color:transparent");
	</script>';
	endif;

	// Create a new array from $results->relatedItems
	$category_array = (array) null;
	$related_items = (array) null;
	$filter = null;
	if ($results) :
		foreach($results as $key => $result) {
			if ($result->relatedItems) :
				array_push($category_array, $result->categoryDescription);
			endif;
			if ($result->categoryDescription !== $filter) :
				$filter = $result->categoryDescription;
				if ( count( $result->relatedItems ) > 0 ) :
				array_push($related_items, $result->relatedItems);
				endif;
			endif;
		}
	endif;

	// Elminate any duplicate items from $category_array.
	if ($category_array) $unique_category_array = array_unique($category_array);
	if ($unique_category_array) $reindexed_category_array = array_values( $unique_category_array );

	// Build the base buy-item url, e.g., https://shop.yoli.com/50/additem?ItemCode=SUPDRM-BT-US&Country=US&OwnerID=50&autoOrder=false
	if ( isset( $_COOKIE['wordpress_current_rep'] ) ) :
		$cookie      = wp_unslash( ( $_COOKIE['wordpress_current_rep'] ) );
		$decoded     = json_decode( $cookie );
		$alias       = $decoded->webAlias;
		$customer_id = $decoded->customerId;
		else :
			$alias       = 50;
			$customer_id = 50;
		endif;
	if ( isset( $_COOKIE['wordpress_country'] ) ) :
		$country_code = $_COOKIE['wordpress_country'];
		else :
			$country_code = 'US';
		endif;

	$base_buy_url = $_SERVER['SHOPCON'] . '/' . $alias . '/additem?ItemCode=';

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
	@media (max-width: 768px) {
		.search-result-related {
			flex-direction: column;
		}
		/* #related-retail-button {
			max-width: 50%;
		}
		#related-sub-button {
			max-width: 50%;
		}	 */
	}
	@media (max-width: 550px) {
		#related-retail-button {
			max-width: 10rem;
		}
		#related-sub-button {
			max-width: 10rem;
		}
	}
	.search-result-detail {
		display: flex;
		flex-direction: column;
		align-items: center;
	}
	.search-result-image {
		max-height: 30vh;
		min-width: 50%;
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
</style>

<div class="site-main">
	<main id="main" class="content-container">
		<div class="search-results-container">
			<?php
			if ( ! $results ) :
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
			else :
				?>
				<!-- <div class="exact-matches-container"> -->
					<div class="results-header">
						<h2 class="product-content-title">Search Results</h2>
						<h3>Exact Matches -> <?php echo esc_html( count( $results ) ) ?></h3>
					</div>
					<div class="exact-search-results">
						<?php	foreach ( $results as $result ) { ?>
							<div class="search-result">
								<a class="exact-result-anchor" href="<?php echo esc_attr( $product_page_url_base . $result->productPage . '/?item_id=' . $result->itemID . '&item_code=' . $result->itemCode ); ?>">
									<div class="search-result-detail">
										<img title="Click to learn more." class="search-result-image" loading="lazy" alt="product image" src="<?php echo esc_attr( $_SERVER['SHOPCON'] . 'shopping/productimages/' . $result->smallImageName ); ?>" />
										<div>
											<h4 class="result-title highlight-query"><?php echo esc_attr( $result->itemDescription ); ?></h4>
											<h6 class="result-category highlight-query">Category | <?php echo esc_html( $result->categoryDescription ) ?></h6>
											<p class="result-description highlight-query"><?php echo esc_attr( $result->shortDetail ); ?></p>
										</div>
									</div>
								</a>
								<div class="search-result-buy-options">
									<a href="<?php echo esc_attr( $base_buy_url . $result->itemCode . '&Country=' . $country_code . '&OwnerID=' . $customer_id . '&autoOrder=false' ); ?>">
										<button class="btn btn-primary btn-accent-outline btn-full">
											Shop Now
											<?php if ( $result->price ) : ?>
												<?php echo ' — '; ?>
												<?php echo esc_html( $result->price->retailPriceFmtd ); ?>
												<?php endif; ?>
											</button>
									</a>
									<a href="<?php echo esc_attr( $base_buy_url . $result->itemCode . '&Country=' . $country_code . '&OwnerID=' . $customer_id . '&autoOrder=true' ); ?>">
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
								foreach($related_items as $items) {
									$count += count( $items );
								}
								echo esc_html( $count ) ?>
							</h3>
						</div>
						<div class="related-search-results">
						<?php
						foreach ( $related_items as $key => $result ) {	?>
								<div class="results-header">
									<h4 class="category-name highlight-query">
										Category -> <?php echo esc_html( $reindexed_category_array[$key] ) ?>
									</h4>
								</div>
							<div class="related-results-by-category">
							<?php
							foreach ( $result as $related) { ?>
								<div class="search-result-related">
									<div class="related-image-and-buy-buttons">
										<a href="<?php echo esc_attr( $product_page_url_base . $related->productPage . '/?item_id=' . $related->itemID . '&item_code=' . $related->itemCode ); ?>" title="Click to learn more.">
											<img class="search-result-image-related" loading="lazy" alt="product image" src="<?php echo esc_attr( $_SERVER['SHOPCON'] . 'shopping/productimages/' . $related->smallImageName ); ?>" />
										</a>
										<div class="search-result-buy-options">
											<a href="<?php echo esc_attr( $base_buy_url . $related->itemCode . '&Country=' . $country_code . '&OwnerID=' . $customer_id . '&autoOrder=false' ); ?>">
												<button id="related-retail-button" class="btn btn-primary btn-accent-outline btn-full related-retail-button">
													</button>
											</a>
											<a href="<?php echo esc_attr( $base_buy_url . $related->itemCode . '&Country=' . $country_code . '&OwnerID=' . $customer_id . '&autoOrder=true' ); ?>">
												<button id="related-sub-button" class="btn btn-primary btn-accent btn-full related-sub-button">
												</button>
											</a>
										</div>
									</div>
									<div class="related-title-and-description">
										<h4 class="result-title highlight-query"><?php echo esc_attr( $related->itemDescription ); ?></h4>
										<p class="result-description highlight-query"><?php echo esc_attr( $related->shortDetail ); ?></p>
									</div>
								</div>
							<?php } ?>
							</div>
						<?php } ?>
					</div>
				<?php endif; ?>
		</div>
	</main>
</div>

<!-- Highlight the search term every where it occurs on the page. -->
<script>
	const queryLength = '<?php echo $query ?>'.length;
	const text = document.getElementsByClassName('highlight-query');

	for (let value of text) {
		const title = value.innerHTML;
		const index = title.toLowerCase().indexOf('<?php echo $query ?>'.toLowerCase());

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
