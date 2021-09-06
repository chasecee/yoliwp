<?php
/**
 * Template Name: Product Page Yellow
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

					// acf vars.
					$pretitle      = get_field( 'pretitle' );
					$product_title = get_field( 'product_title' );
					$description   = get_field( 'description' );

					$product_box_image    = get_field( 'product_box_image' );
					$cover_title          = get_field( 'cover_title' );
					$cover_text           = get_field( 'cover_text' );
					$process_video_image  = get_field( 'process_video_image' );
					$process_pretitle     = get_field( 'process_pretitle' );
					$process_title        = get_field( 'process_title' );
					$process_caption      = get_field( 'process_caption' );
					$process_caption_copy = get_field( 'process_caption_copy' );
					$size                 = 'full';
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
						<a href="#" class="btn btn-accent btn-full mt-50">Shop Now</a>
					</div>

					<div class="hero-product-bg">
						<div
						class="hero-product-image offscreen-r"
						style="background-image:url(<?php echo esc_url( get_field( 'hero_image' ) ); ?>);">
						</div>
						<div class="hero-product-bg-circle-overlay bg-color"></div>
					</div>
				</div>


				<div class="product-features ">
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
				<div class="cover cover-rounded">
					<div class="cover-bg" style="background-image:url(<?php echo esc_url( get_field( 'cover_image' ) ); ?>);">
						<div class="cover-backdrop"></div>
						<div class="container">
							<div class="cover-content ">
								<h3 class="cover-content-title">
									<?php if ( $cover_title ) : ?>
										<?php echo esc_html( $cover_title ); ?>
									<?php endif; ?>
								</h3>
								<p class="cover-content-p">
									<?php if ( $cover_text ) : ?>
										<?php echo esc_html( $cover_text ); ?>
									<?php endif; ?>
								</p>
							</div>
						</div>

					</div>
				</div>

				<div class="section-title">
					<div class="section-title-content">
						<p class="section-title-content-p">
							<?php if ( $process_pretitle ) : ?>
								<?php echo esc_html( $process_pretitle ); ?>
							<?php endif; ?>
						</p>
						<h3 class="section-title-content-h">
						<?php if ( $process_title ) : ?>
							<?php echo esc_html( $process_title ); ?>
<?php endif; ?>
						</h3>
					</div>
				</div>

				<div class="section-info section-process">

					<div class="section-info-a">
						<div class="section-info-a-video">
							<?php
							if ( $process_video_image ) {
								$url = wp_get_attachment_url( $process_video_image );
								echo wp_get_attachment_image( $process_video_image, $size );
							};
							?>
							<div class="section-info-a-video-gradient"></div>
							<?php get_template_part( '/src/images/icons/inline/inline', 'play.svg' ); ?>
						</div>
					</div>

					<div class="section-info-b">
						<p class="section-info-b-p">
							<?php if ( $process_caption ) : ?>
								<?php echo esc_html( $process_caption ); ?>
							<?php endif; ?>
						</p>
						<div class="section-info-b-line"><div class="line"></div></div>

						<div class="section-info-b-image">
							<?php
							if ( $process_caption_copy ) {
								$url = wp_get_attachment_url( $process_caption_copy );
								echo wp_get_attachment_image( $process_caption_copy, $size );
							};
							?>
						</div>
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



				<?php
					// acf vars.
					$serving_size          = get_field( 'serving_size' );
					$product_cta_image     = get_field( 'product_cta_image' );
					$size                  = 'full';
					$product_description_2 = get_field( 'product_description_2' );
					$price                 = get_field( 'price' );
					$price_monthly         = get_field( 'price_monthly' );

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

				<div class="recipes-container">
					<div class="section-title-bars">
						<h4 class="section-title-bars-h">Recipes</h4>
					</div>

					<div class="column-carousel recipes-carousel">

						<div class="glide" data-per-view="3">

							<div class="glide__track" data-glide-el="track">
								<ul class="glide__slides">

									<?php if ( have_rows( 'recipes' ) ) : ?>
										<?php
										while ( have_rows( 'recipes' ) ) :
											the_row();
											?>

											<li class="glide__slide">

												<div class="recipes-carousel-image">
													<?php
													$image = get_sub_field( 'image' );
													$size  = 'full';
													if ( $image ) {
														$url = wp_get_attachment_url( $image );
														echo wp_get_attachment_image( $image, $size );
													};
													?>
												</div>

												<div class="recipes-carousel-content">
													<?php $recipe_title = get_sub_field( 'recipe_title' ); ?>
													<?php if ( $recipe_title ) : ?>
														<div class="recipes-carousel-content-title">
															<?php echo esc_html( $recipe_title ); ?>
														</div>
													<?php endif; ?>
													<div class="recipes-carousel-content-link">
													View Recipe
													</div>
												</div>

											</li>

										<?php endwhile; ?>
									<?php endif; ?>


								</ul>
							</div>
						</div>
					</div>
				</div>

				<?php
			endwhile; // End of the loop.
			?>

		</main><!-- #main -->

	</div>

<?php get_footer(); ?>
