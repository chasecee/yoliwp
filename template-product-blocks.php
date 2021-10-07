<?php
/**
 * Template Name: Product Page Blocks
 *
 * This template displays a page with a sidebar on the right side of the screen.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package _s
 */

// Require the url-builder.
require realpath( __DIR__ ) . '/api/join-and-shop-urls.php';

get_header();

// api_vars.
$cover_button_link = $shop_now_url;

// acf vars.
$background_color = get_field( 'background_color' );
$foreground_color = get_field( 'foreground_color' );
$background_svg   = get_field( 'background_svg' );
?>
<?php if ( $background_svg ) : ?>

<?php endif; ?>
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
						<a href="<?php echo esc_url( $cover_button_link ); ?>" class="btn btn-accent btn-full mt-50">Shop Now</a>
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

					$column_1 = get_field( 'column_1' );
					$column_2 = get_field( 'column_2' );
					$column_3 = get_field( 'column_3' );
				if ( $column_1 ) {
					$column_1_width = 'width:' . $column_1 . '%;';
				}
				if ( $column_2 ) {
					$column_2_width = 'width:' . $column_2 . '%;';
				}
				if ( $column_3 ) {
					$column_3_width = 'width:' . $column_3 . '%;';
				}
				?>
				<div class="product-features">
					<div class="product-features-graphic" style="
						<?php
						if ( $column_1_width ) :
							echo esc_attr( $column_1_width );
						endif;
						?>
					">
						<div class="product-features-graphic-line"></div>

						<div class="product-features-graphic-svg fg-color">
							<?php get_template_part( '/src/images/icons/inline/inline', 'product-tagline.svg' ); ?>
						</div>
					</div>
					<div class="product-features-image" style="
						<?php
						if ( $column_2_width ) :
							echo esc_attr( $column_2_width );
						endif;
						?>
					">
						<?php
						if ( $product_box_image ) {
							$url = wp_get_attachment_url( $product_box_image );
							echo wp_get_attachment_image( $product_box_image, $size );
						};
						?>
					</div>
					<div class="product-features-list" style="
						<?php
						if ( $column_3_width ) :
							echo esc_attr( $column_3_width );
						endif;
						?>
					">
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
