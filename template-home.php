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
					<div class="hero-gradient gradient-bottom"></div>
					<div class="hero-video">
							<iframe src="https://player.vimeo.com/video/582695017?background=1&autoplay=1&loop=1&byline=0&title=0?controls=0"
									frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
					</div>

					<div class="hero-content">

								<h1 class="hero-content-title">
								Lorem ipsum dolor<br>Sit amet adipiscing.
								</h1>
								<button class="hero-content-button">
									Shop Now <?php get_template_part( '/src/images/icons/inline/inline', 'arrow-right.svg' ); ?>
								</button>

					</div>
				</div>
				<div class="about">
					<div class="container">
						<div class="about-images">
						<img src="<?php echo esc_attr( get_template_directory_uri() ) . '/build/images/collage-a.jpg'; ?>">
						<img src="<?php echo esc_attr( get_template_directory_uri() ) . '/build/images/collage-b.jpg'; ?>">
						<img src="<?php echo esc_attr( get_template_directory_uri() ) . '/build/images/collage-c.jpg'; ?>">
						</div>
						<div class="about-content">
									<h2 class="about-content-title">What is Yoli?</h2>
									<p class="about-content-p">We’re a modern wellness brand creating high-performance, plant‑powered wellness supplements to fuel your mind, body, and soul. We want to make wellness feel easy, joyful, and accessible–so you can focus on being your most vibrant you.</p>
						</div>
					</div>
				</div>
				<div class="py-200">
					<div class="container relative">
						<div class="absolute inset-0 flex">
							<img class="w-1/3" src="<?php echo esc_attr( get_template_directory_uri() ) . '/build/images/collage-a.jpg'; ?>">
							<img class="w-1/3" src="<?php echo esc_attr( get_template_directory_uri() ) . '/build/images/collage-b.jpg'; ?>">
							<img class="w-1/3" src="<?php echo esc_attr( get_template_directory_uri() ) . '/build/images/collage-c.jpg'; ?>">
						</div>
				<div class="backdrop-filter backdrop-blur-xl w-200 h-200"></div>
				<div class="backdrop-filter backdrop-blur-xl w-200 h-200"></div>
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
