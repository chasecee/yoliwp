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

// acf vars.
$pretitle             = get_field( 'pretitle' );
$product_title        = get_field( 'product_title' );
$product_text_content = get_field( 'product_text_content' );
$product_image        = get_field( 'product_image' );
$size                 = 'full';
$price                = '$160';
$price_monthly        = '$150';
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
			<p class="product-content-p">
				<?php if ( $product_text_content ) : ?>
					<?php echo esc_html( $product_text_content ); ?>
				<?php endif; ?>
				<?php echo '<InnerBlocks />'; ?>
			</p>

			<div class="product-content-cta">
				<button class="btn btn-primary btn-accent-outline btn-full">
					Shop Now
					<?php if ( $price ) : ?>
						<?php echo ' — '; ?>
						<?php echo esc_html( $price ); ?>
					<?php endif; ?>
				</button>
				<button class="btn btn-primary btn-accent btn-full">Subscribe & Save
					<?php if ( $price_monthly ) : ?>
						<?php echo ' — '; ?>
						<?php echo esc_html( $price_monthly ); ?>
					<?php endif; ?>
				</button>


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
