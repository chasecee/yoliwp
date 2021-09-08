<?php
/**
 * Section block
 *
 * @package      _s
 * @author       Chase Christensen
 * @since        1.0.0
 * @license      GPL-2.0+
 **/

// Create name for prefixing classes and id's.
$slug = 'section-hero';

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
$pretitle = get_field( 'pretitle' );
$_s_title = get_field( 'title' );
$spacing  = get_field( 'spacing' );

if ( $spacing ) {
	$_s_class_name .= ' ' . $spacing;
}
?>
<div class="<?php echo esc_attr( $_s_class_name ); ?>" id="<?php echo esc_attr( $_s_id ); ?>">

<?php
				// hero product.
					// acf vars.
					$pretitle      = get_field( 'pretitle' );
					$product_title = get_field( 'page_title' );
					$description   = get_field( 'description' );
?>

					<div class="section-hero-info">
						<?php if ( $pretitle ) : ?>
							<p class="section-hero-info-pretitle">
									<?php echo esc_html( $pretitle ); ?>
							</p>
						<?php endif; ?>
						<h1 class="fg-color">
							<?php if ( $product_title ) : ?>
								<?php echo esc_html( $product_title ); ?>
							<?php endif; ?>
						</h1>
						<p class="section-hero-info-description">
							<?php if ( $description ) : ?>
								<?php echo esc_html( $description ); ?>
							<?php endif; ?>
						</p>
						<div class="section-hero-info-line"></div>
					</div>

					<div class="section-hero-bg">
						<div
						class="section-hero-image offscreen-r"
						style="background-image:url(<?php echo esc_url( get_field( 'hero_image' ) ); ?>);">
						</div>
						<div class="section-hero-bg-circle-overlay bg-color"></div>

					</div>

</div>
