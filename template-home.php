<?php
/**
 * Template Name: Home Page
 *
 * This template displays a page with a sidebar on the right side of the screen.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package _s
 */

get_header();

// acf vars.
$hero_image    = get_field( 'hero_image' );
$size          = 'full';
$hero_title    = get_field( 'hero_title' );
$hero_subtitle = get_field( 'hero_subtitle' );
$button_text   = get_field( 'button_text' );

?>

	<div class="site-main">
		<main id="main" class="content-container">

			<?php
			while ( have_posts() ) :
				the_post();
				?>
				<div class="hero ">
					<div class="hero-gradient"></div>
					<div class="hero-image">
						<?php

						if ( $hero_image ) {
							$url = wp_get_attachment_url( $hero_image );
							echo wp_get_attachment_image( $hero_image, $size );
						};
						?>
					</div>

					<div class="hero-content">
						<div class="hero-content-inner">

							<div class="hero-content-inner-bg"></div>
							<div class="relative">
								<h1 class="text-60">
									<?php if ( $hero_title ) : ?>
										<?php echo esc_html( $hero_title ); ?>
									<?php endif; ?>
								</h1>
								<p class="text-26">
									<?php if ( $hero_subtitle ) : ?>
										<?php echo esc_html( $hero_subtitle ); ?>
									<?php endif; ?>
								</p>
								<button class="text-base">
									<?php if ( $button_text ) : ?>
										<?php echo esc_html( $button_text ); ?>
									<?php endif; ?>
								</button>
							</div>

						</div>
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
