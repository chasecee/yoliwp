<?php
/**
 * Template Name: Product Page Basic
 *
 * This template displays a page with a sidebar on the right side of the screen.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package _s
 */

// Require the url-builder and get prices.
require_once realpath( __DIR__ ) . '/api/get-prices.php';
require_once realpath( __DIR__ ) . '/api/buy-button-urls.php';

get_header();

// override acf if dynamic prices exist.
$prices_api = get_prices();
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

// acf vars.
$background_color = get_field( 'background_color' );
$foreground_color = get_field( 'foreground_color' );
?>
<style>
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
		background-color:<?php echo esc_attr( $foreground_color ); ?>;
		color:white;
		border-color: <?php echo esc_attr( $foreground_color ); ?>;
	}
	.btn-accent-outline{
		border-color:<?php echo esc_attr( $foreground_color ); ?>;
		color:<?php echo esc_attr( $foreground_color ); ?>;
		background-color:transparent;
	}
</style>

	<div class=" site-main">
		<main id="main" class="content-container">
			<?php
			while ( have_posts() ) :
				the_post();
				?>
				<?php
				// hero product.
					// acf vars.
					$pretitle      = get_field( 'pretitle' );
					$product_title = get_field( 'product_title' );
					$description   = get_field( 'description' );
				?>

				<div class="hero-product">
					<div class="hero-product-info">
						<?php if ( $pretitle ) : ?>
							<p class="hero-product-info-pretitle">
									<?php echo esc_html( $pretitle ); ?>
							</p>
						<?php endif; ?>
						<h1 class="fg-color">
							<?php if ( $product_title ) : ?>
								<?php echo esc_html( $product_title ); ?>
							<?php endif; ?>
						</h1>
						<p class="hero-product-info-description">
							<?php if ( $description ) : ?>
								<?php echo esc_html( $description ); ?>
							<?php endif; ?>
						</p>
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

					<div class="hero-product-bg">
						<div
						class="hero-product-image offscreen-r"
						style="background-image:url(<?php echo esc_url( get_field( 'hero_image' ) ); ?>);">
						</div>
						<div class="hero-product-bg-circle-overlay bg-color"></div>

					</div>
				</div>

				<?php
					// acf vars.
					$product_box_image   = get_field( 'product_box_image' );
					$size                = 'full';
					$features_list_title = get_field( 'features_list_title' );
				?>
				<div class="product-features">
					<div class="product-features-graphic">
						<div class="product-features-graphic-line"></div>

						<div class="product-features-graphic-svg fg-color">
							<?php get_template_part( '/src/images/icons/inline/inline', 'product-tagline.svg' ); ?>
						</div>
					</div>
					<div class="product-features-image">
						<?php
						if ( $product_box_image ) {
							$url = wp_get_attachment_url( $product_box_image );
							echo wp_get_attachment_image( $product_box_image, $size );
						};
						?>
					</div>
					<div class="product-features-list">
						<?php if ( $features_list_title ) : ?>
							<div class="product-features-list-title">
								<?php echo esc_html( $features_list_title ); ?>
							</div>
						<?php endif; ?>

						<ul>
						<?php
						if ( have_rows( 'features_list' ) ) :
							while ( have_rows( 'features_list' ) ) :
								the_row();
								$icon            = get_sub_field( 'select_svg' );
								$label           = get_sub_field( 'label' );
								$custom_svg_code = get_sub_field( 'custom_svg_code' )

								?>
									<li>
										<?php if ( $icon ) : ?>
											<?php
											if ( 'custom' === $icon ) {
												if ( $custom_svg_code ) {
													?>
													<div class="icon">
														<?php echo wp_kses( $custom_svg_code, get_kses_extended_ruleset() ); ?>
													</div>
													<?php } ?>
											<?php } else { ?>
												<div class="icon">
												<?php $icon_filename = $icon . '.svg'; ?>
												<?php get_template_part( '/src/images/icons/inline/inline', $icon_filename ); ?>
												</div>
											<?php } ?>

										<?php endif; // end if icon. ?>

										<?php if ( $label ) : ?>

											<div class="label">
												<?php echo esc_html( $label ); ?>
											</div>
										<?php endif; ?>
									</li>
								<?php
							endwhile;
						endif;
						?>
						</ul>
					</div>
				</div>

				<div class="content"><?php the_content(); ?></div>

				<?php
				endwhile; // End of the loop.
			?>

		</main><!-- #main -->

	</div>

<?php get_footer(); ?>
