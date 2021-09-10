<?php
/**
 * Template Name: Product Page Pink
 *
 * This template displays a page with a sidebar on the right side of the screen.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package _s
 */

include_once realpath(__DIR__) . '/api/get-item-id.php';
include_once realpath(__DIR__) . '/api/get-prices.php';

get_header();
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
					$product_box_image = get_field( 'product_box_image' );
					$size              = 'full';
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
								$icon  = get_sub_field( 'select_svg' );
								$label = get_sub_field( 'label' );
								?>
									<li>
										<?php if ( $icon ) : ?>

											<div class="icon">
												<?php $icon_filename = $icon . '.svg'; ?>
												<?php get_template_part( '/src/images/icons/inline/inline', $icon_filename ); ?>
											</div>

										<?php endif; ?>

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

				<?php // I put the ingredients hover as a block so we can use that block elsewhere. found in inc/blocks. ?>
				<div class="content"><?php the_content(); ?></div>

				<?php // just hard-coding the rest cuz I'm tired. ?>

				<!-- <div class="cover">
					<div class="cover-bg" style="background-image:url(<?php echo esc_attr( get_template_directory_uri() ) . '/build/images/covergirl.jpg'; ?>);">
						<div class="cover-backdrop"></div>
						<div class="container">
							<div class="cover-content ">
								<h3 class="cover-content-title">True to Nature</h3>
								<hr class="cover-content-bar">
								<p class="cover-content-p">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation.</p>
							</div>
						</div>

					</div>
				</div> -->

				<div class="section-title">
					<div class="section-title-content">
						<p class="section-title-content-p">Our Process</p>
						<h3 class="section-title-content-h">We protect the true nature of every plant, protein, and mineral in our products.</h3>
					</div>
				</div>

				<div class="cards">
					<div class="card">
						<div class="card-inner">
							<div class="card-bg" style="background-image:url(<?php echo esc_attr( get_template_directory_uri() ) . '/build/images/homepage/nature.jpg'; ?>);"></div>
							<div class="card-gradient"></div>
							<div class="card-content">
								<h3 class="card-content-title">From Nature</h3>
								<p class="card-content-p">Lorem ipsom dolor sit amet, diam conshctetuer adipiscing elit, sed diam lorem ipsum dolor sit amet, diam lorem ipsum dolor sit amet dolor.</p>
							</div>
						</div>
					</div>

					<div class="card">
						<div class="card-inner">
							<div class="card-bg" style="background-image:url(<?php echo esc_attr( get_template_directory_uri() ) . '/build/images/homepage/powder.jpg'; ?>);"></div>
							<div class="card-gradient"></div>
							<div class="card-content">
								<h3 class="card-content-title">To Powder</h3>
								<p class="card-content-p">Lorem ipsom dolor sit amet, diam conshctetuer adipiscing elit, sed diam lorem ipsum dolor sit amet, diam lorem ipsum dolor sit amet dolor.</p>
							</div>
						</div>
					</div>

					<div class="card">
						<div class="card-inner">
							<div class="card-bg" style="background-image:url(<?php echo esc_attr( get_template_directory_uri() ) . '/build/images/homepage/body.jpg'; ?>);"></div>
							<div class="card-gradient"></div>
							<div class="card-content">
								<h3 class="card-content-title">To Body</h3>
								<p class="card-content-p">Lorem ipsom dolor sit amet, diam conshctetuer adipiscing elit, sed diam lorem ipsum dolor sit amet, diam lorem ipsum dolor sit amet dolor.</p>
							</div>
						</div>
					</div>
				</div>

				<?php
					// acf vars.
					$serving_size          = get_field( 'serving_size' );
					$product_cta_image     = get_field( 'product_cta_image' );
					$size                  = 'full';
					$product_description_2 = get_field( 'product_description_2' );

					/** Chad's code. */
					$arr_context_options = array(
						'ssl' => array(
							'verify_peer'      => false,
							'verify_peer_name' => false,
						),
					);
						// Get the item's id and call the api for prices.
						$item_id = get_item_id();
						$prices_api = get_prices($item_id);
						if ( !empty($prices_api->retailPriceFmtd)) {
							$price = $prices_api->retailPriceFmtd;
						} else {
							$price = null;
						}

						if ( !empty($prices_api->autoshipPriceFmtd) ) {
							$price_monthly = $prices_api->autoshipPriceFmtd;
						} else {
							$price_monthly = null;
						}

						/** $price                 = get_field( 'price' );
						* $price_monthly         = get_field( 'price_monthly' ); */
					?>

				<div class="product">
					<div class="product-content">
						<p class="product-content-servings">
						<?php if ( $serving_size ) : ?>
							<?php echo esc_html( $serving_size ); ?>
						<?php endif; ?>
						</p>
						<h3 class="product-content-title">
							<?php if ( $product_title ) : ?>
									<?php echo esc_html( $product_title ); ?>
							<?php endif; ?>
						</h3>
						<p class="product-content-p">
						<?php
						if ( $product_description_2 ) {
							echo esc_html( $product_description_2 );
						};
						?>
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
						if ( $product_cta_image ) {
							$url = wp_get_attachment_url( $product_cta_image );
							echo wp_get_attachment_image( $product_cta_image, $size );
						};
						?>

					</div>
				</div>

				<!-- <div class="p-reviews">
					<div class="container">
						<div class="p-reviews-title">
							Reviews
						</div>

						<div class="p-reviews-info">

							<div class="p-reviews-info-numbers">

								<div class="p-reviews-info-number">4.8</div>

								<div class="p-reviews-info-inner">
									<div class="p-reviews-info-stars">
										<?php get_template_part( '/src/images/icons/inline/inline', 'star.svg' ); ?>
										<?php get_template_part( '/src/images/icons/inline/inline', 'star.svg' ); ?>
										<?php get_template_part( '/src/images/icons/inline/inline', 'star.svg' ); ?>
										<?php get_template_part( '/src/images/icons/inline/inline', 'star.svg' ); ?>
										<?php get_template_part( '/src/images/icons/inline/inline', 'star.svg' ); ?>
									</div>
									<div class="p-reviews-info-total">425 Reviews</div>
								</div>
							</div>

							<button class="btn btn-outline-gray">Write a Review</button>

						</div>

						<div class="p-review-group">

							<div class="p-review-item">
								<div class="p-review-item-icon">
									<div class="p-review-item-icon-text">S</div>
									<div class="p-review-item-icon-checkmark">
										<?php get_template_part( '/src/images/icons/inline/inline', 'checkmark.svg' ); ?>
									</div>

								</div>

								<div class="p-review-item-content">
									<div class="p-review-item-content-name">Sarah T. — USA</div>
									<div class="flex">
									<?php get_template_part( '/src/images/icons/inline/inline', 'star.svg' ); ?>
										<?php get_template_part( '/src/images/icons/inline/inline', 'star.svg' ); ?>
										<?php get_template_part( '/src/images/icons/inline/inline', 'star.svg' ); ?>
										<?php get_template_part( '/src/images/icons/inline/inline', 'star.svg' ); ?>
										<?php get_template_part( '/src/images/icons/inline/inline', 'star.svg' ); ?>
									</div>
									<div class="verified">Verified Buyer</div>
									<p class="p-review-item-title">Love it!</p>
									<p class="p-review-item-title-p">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation.</p>
									<p class="p-review-item-date">07/01/21</p>
								</div>

							</div>

							<div class="p-review-item">
								<div class="p-review-item-icon">
									<div class="p-review-item-icon-text">G</div>
									<div class="p-review-item-icon-checkmark">
										<?php get_template_part( '/src/images/icons/inline/inline', 'checkmark.svg' ); ?>
									</div>

								</div>

								<div class="p-review-item-content">
									<div class="p-review-item-content-name">Gloria P. — USA</div>
									<div class="flex">
									<?php get_template_part( '/src/images/icons/inline/inline', 'star.svg' ); ?>
										<?php get_template_part( '/src/images/icons/inline/inline', 'star.svg' ); ?>
										<?php get_template_part( '/src/images/icons/inline/inline', 'star.svg' ); ?>
										<?php get_template_part( '/src/images/icons/inline/inline', 'star.svg' ); ?>
										<?php get_template_part( '/src/images/icons/inline/inline', 'star.svg' ); ?>
									</div>
									<div class="verified">Verified Buyer</div>
									<p class="p-review-item-title">Great</p>
									<p class="p-review-item-title-p">Consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation.</p>
									<p class="p-review-item-date">06/15/21</p>
								</div>

							</div>

							<div class="p-review-item">

								<div class="p-review-item-icon">

									<div class="p-review-item-icon-text">D</div>

									<div class="p-review-item-icon-checkmark">
										<?php get_template_part( '/src/images/icons/inline/inline', 'checkmark.svg' ); ?>
									</div>

								</div>

								<div class="p-review-item-content">
									<div class="p-review-item-content-name">Devon W. — USA</div>
									<div class="flex">
									<?php get_template_part( '/src/images/icons/inline/inline', 'star.svg' ); ?>
										<?php get_template_part( '/src/images/icons/inline/inline', 'star.svg' ); ?>
										<?php get_template_part( '/src/images/icons/inline/inline', 'star.svg' ); ?>
										<?php get_template_part( '/src/images/icons/inline/inline', 'star.svg' ); ?>
										<?php get_template_part( '/src/images/icons/inline/inline', 'star.svg' ); ?>
									</div>
									<div class="verified">Verified Buyer</div>
									<p class="p-review-item-title">My Go-to</p>
									<p class="p-review-item-title-p">Lorem ipsum dolor sit amet, consectetur adipiscing elit, enim ad minim veniam, quis nostrud exercitation.</p>
									<p class="p-review-item-date">05/25/21</p>
								</div>

							</div>

						</div>
					</div>

				</div> -->


				<?php
			endwhile; // End of the loop.
			?>

		</main><!-- #main -->

	</div>

<?php get_footer(); ?>
