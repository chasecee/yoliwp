<?php
/**
 * Product Cta
 *
 * @package      _s
 * @author       Chase Christensen
 * @since        1.0.0
 * @license      GPL-2.0+
 **/

// Create name for prefixing classes and id's.
$slug = 'product-cta';

// Create id attribute allowing for custom "anchor" value.
$_s_id = $slug . '-' . $block['id'];
if ( ! empty( $block['anchor'] ) ) {
	$_s_id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$_s_class_name = $slug;
if ( ! empty( $block['className'] ) ) {
	$_s_class_name .= ' ' . $block['className'];
}
if ( ! empty( $block['align'] ) ) {
	$_s_class_name .= ' align' . $block['align'];
}

// Require the url-builder and get prices.
require_once realpath( __DIR__ . '/../..' ) . '/api/get-prices.php';
require_once realpath( __DIR__ . '/../..' ) . '/api/buy-button-urls.php';

// acf vars.
$pretitle             = get_field( 'pretitle' );
$product_title        = get_field( 'product_title' );
$product_text_content = get_field( 'product_text_content' );
$product_image        = get_field( 'product_image' );
$size                 = 'full';
$price                = 'No price available';
$price_monthly        = 'No monthly price available';

// override acf if dynamic prices exist.
$prices_api = get_prices();
echo 'The result of calling get_prices ';
var_dump($prices_api);
echo '<br>';

// phpcs:ignore
if ( ! empty( $prices_api->retailPriceFmtd ) ) {
	// phpcs:ignore
	$price = $prices_api->retailPriceFmtd;
} else {
	$price = 'not loading price';
}

// phpcs:ignore
if ( ! empty( $prices_api->autoshipPriceFmtd ) ) {
	// phpcs:ignore
	$price_monthly = $prices_api->autoshipPriceFmtd;
} else {
	$price_monthly = 'not loading price';
}

?>

<div class="<?php echo esc_attr( $_s_class_name ); ?>" id="<?php echo esc_attr( $_s_id ); ?>">

	<div class="product">
		<div class="product-content">
			<p class="product-content-servings">
				<?php if ( $pretitle ) : ?>
					<?php echo esc_html( $pretitle ); ?>
				<?php endif; ?>
			</p>
			<h3 class="product-content-title">
				<?php if ( $product_title ) : ?>
						<?php echo esc_html( $product_title ); ?>
				<?php endif; ?>
			</h3>
			<div class="product-content-p">
				<?php if ( $product_text_content ) : ?>
					<?php echo esc_html( $product_text_content ); ?>
				<?php endif; ?>
				<?php echo '<InnerBlocks />'; ?>
			</div>

			<div class="product-content-cta">
				<a href="<?php echo esc_attr( buy_button_url( 'false' ) ); ?>">
					<button class="btn btn-primary btn-accent-outline btn-full">
						Shop Now
						<?php if ( $price ) : ?>
							<?php echo ' — '; ?>
							<?php echo esc_html( $price ); ?>
						<?php endif; ?>
				</button>
				</a>
				<a href="<?php echo esc_attr( buy_button_url( 'true' ) ); ?>">
					<button class="btn btn-primary btn-accent btn-full">Subscribe & Save
						<?php if ( $price_monthly ) : ?>
							<?php echo ' — '; ?>
							<?php echo esc_html( $price_monthly ); ?>
						<?php endif; ?>
					</button>
				</a>


			</div>
		</div>

		<div class="product-image">
			<?php
			if ( $product_image ) {
				$url = wp_get_attachment_url( $product_image );
				echo wp_get_attachment_image( $product_image, $size );
			};
			?>
		</div>
	</div>

</div>
