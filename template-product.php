<?php
/**
 * Template Name: Product Page
 *
 * This template displays a page with a sidebar on the right side of the screen.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package _s
 */

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
</style>

	<div class="container site-main">
		<main id="main" class="content-container">
			<?php
			while ( have_posts() ) :
				the_post();
				?>
				<?php
				// hero product _hero-product.scss.
					// acf vars.
					$pretitle      = get_field( 'pretitle' );
					$product_title = get_field( 'product_title' );
					$description   = get_field( 'description' );
				?>

				<div class="hero-product">
					<div class="hero-product-info">
						<p class="hero-product-info-pretitle">
							<?php if ( $pretitle ) : ?>
								<?php echo esc_html( $pretitle ); ?>
							<?php endif; ?>
						</p>
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
						class="hero-product-image"
						style="background-image:url(<?php echo esc_url( get_field( 'hero_image' ) ); ?>);">
						</div>
					</div>
				</div>

				<?php
					// hero product _hero-product.scss.
					// acf vars.
					$product_box_image = get_field( 'product_box_image' );
					$size              = 'full';
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

				<?php // I put the ingredients hover as a block so we can use that block elsewhere. found in inc/. ?>
				<div class="content"><?php the_content(); ?></div>

				<?php // just hard-coding the rest cuz I'm tired. ?>
				<div class="product">
					<div class="product-content">
						<p class="product-content-servings">35 Servings</p>
						<h3 class="product-content-title">Passion</h3>
						<p class="product-content-p">
							Featuring Thermo-G™, our proprietary formulation, Passion delivers the energy you need to live your best life. Passion uses carefully selected ingredients to stimulate metabolic activity, promote stamina, and support healthy cognitive function.
						</p>
						<div class="product-content-flavors">
							<button class="btn btn-outline-gray">Tropical Melon</button>
							<button class="btn btn-outline btn-gray btn-disabled">Berry</button>
						</div>
						<div class="product-content-cta">
							<button class="btn btn-primary btn-accent btn-full">Start Shopping</button>

							<div class="product-content-subinfo">
								<div class="price">$41.00</div>
								<div class="divider">|</div>
								<div class="price-monthly">Get Monthly & Save 30%</div>
							</div>
						</div>
					</div>

					<div class="product-image">
						<img src="<?php echo esc_attr( get_template_directory_uri() ) . '/build/images/yolipassionbox.png'; ?>">
					</div>
				</div>

				<div class="p-reviews">
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
				</div>


<div class="h-192 bg-tan mb-192"></div>
<div class="h-192 bg-tan mb-192"></div>
<div class="h-192 bg-tan mb-192"></div>
<div class="h-192 bg-tan mb-192"></div>

				<?php
			endwhile; // End of the loop.
			?>

		</main><!-- #main -->

	</div>

<?php get_footer(); ?>
