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
				<div class="hero">
					<div class="hero-gradient"></div>
					<div class="hero-gradient gradient-bottom"></div>
					<div class="hero-video bg-cover bg-center" style="background-image:url(<?php echo esc_attr( get_template_directory_uri() ) . '/build/images/heroposter.jpg'; ?>);">
							<iframe src="https://player.vimeo.com/video/582695017?background=1&autoplay=1&loop=1&byline=0&title=0?controls=0"
									frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
					</div>

					<div class="hero-content">

								<h1 class="hero-content-title">
								Lorem ipsum dolor<br>Sit amet adipiscing.
								</h1>

					</div>
				</div>

				<div class="intro">
					<div class="intro-left">
						<div class="intro-image intro-left-a"><img  src="<?php echo esc_attr( get_template_directory_uri() ) . '/build/images/homepage/intro-left-a.jpg'; ?>"></div>
						<div class="intro-image intro-left-b"><img  src="<?php echo esc_attr( get_template_directory_uri() ) . '/build/images/homepage/intro-left-b.jpg'; ?>"></div>
					</div>
					<div class="intro-content">
						<div class="intro-content-inner">
							<h2><span>What is Yoli?</span>Yoli Means Life</h2>
							<p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
						</div>
					</div>
					<div class="intro-right">
						<div class="intro-image intro-right-a"><img  src="<?php echo esc_attr( get_template_directory_uri() ) . '/build/images/homepage/intro-right-a.jpg'; ?>"></div>
						<div class="intro-image intro-right-b"><img  src="<?php echo esc_attr( get_template_directory_uri() ) . '/build/images/homepage/intro-right-b.jpg'; ?>"></div>
					</div>
				</div>

				<div class="product-carousel">

					<div class="glide">
						<div class="glide__controls glide__bullets" data-glide-el="controls[nav]">
							<div data-glide-dir="=0">Vitality</div>
							<div data-glide-dir="=1">Mood</div>
							<div data-glide-dir="=2">Energy</div>
							<div data-glide-dir="=3">Balance</div>
							<div data-glide-dir="=4">Transformation</div>
						</div>
						<div class="glide__arrows" data-glide-el="controls">
							<div data-glide-dir="<">
								<div class="transform rotate-180">
									<?php get_template_part( '/src/images/icons/inline/inline', 'arrow-right.svg' ); ?>
								</div>
							</div>
							<div data-glide-dir=">">
								<?php get_template_part( '/src/images/icons/inline/inline', 'arrow-right.svg' ); ?>
							</div>
						</div>
						<div class="glide__track" data-glide-el="track">
							<ul class="glide__slides">

								<li class="glide__slide">
									<div class="slide-inner">
										<div class="slide-img">

											<img class="" src="<?php echo esc_attr( get_template_directory_uri() ) . '/build/images/slide-a.jpg'; ?>">
											<div class="slide-inner-gradient"></div>
											<div class="slide-inner-gradient gradient-bottom"></div>
										</div>
										<div class="slide-inner-content">
											<p class="slide-inner-content-title">Defend</p>
											<p class="slide-inner-content-p">Lorem ipsom dolor sit amet, diam conshctetuer adipiscing elit, sed diam lorem ipsum dolor sit amet, diam lorem ipsum dolor sit amet dolor.</p>
										</div>
									</div>
								</li>

								<li class="glide__slide">
									<div class="slide-inner">
										<div class="slide-img">
											<img class="" src="<?php echo esc_attr( get_template_directory_uri() ) . '/build/images/slide-b.jpg'; ?>">
											<div class="slide-inner-gradient"></div>
											<div class="slide-inner-gradient gradient-bottom"></div>
										</div>
										<div class="slide-inner-content">
											<p class="slide-inner-content-title">Shine</p>
											<p class="slide-inner-content-p">Lorem ipsom dolor sit amet, diam conshctetuer adipiscing elit, sed diam lorem ipsum dolor sit amet, diam lorem ipsum dolor sit amet dolor.</p>
										</div>
									</div>
								</li>

								<li class="glide__slide">
									<div class="slide-inner">
										<div class="slide-img">
											<img class="" src="<?php echo esc_attr( get_template_directory_uri() ) . '/build/images/slide-c.jpg'; ?>">
											<div class="slide-inner-gradient"></div>
											<div class="slide-inner-gradient gradient-bottom"></div>
										</div>
										<div class="slide-inner-content">
											<p class="slide-inner-content-title">Passion</p>
											<p class="slide-inner-content-p">Lorem ipsom dolor sit amet, diam conshctetuer adipiscing elit, sed diam lorem ipsum dolor sit amet, diam lorem ipsum dolor sit amet dolor.</p>
										</div>
									</div>
								</li>

								<li class="glide__slide">
									<div class="slide-inner">
										<div class="slide-img">
											<img class="" src="<?php echo esc_attr( get_template_directory_uri() ) . '/build/images/slide-d.jpg'; ?>">
											<div class="slide-inner-gradient"></div>
											<div class="slide-inner-gradient gradient-bottom"></div>
										</div>
										<div class="slide-inner-content">
											<p class="slide-inner-content-title">Alkalete</p>
											<p class="slide-inner-content-p">Lorem ipsom dolor sit amet, diam conshctetuer adipiscing elit, sed diam lorem ipsum dolor sit amet, diam lorem ipsum dolor sit amet dolor.</p>
										</div>
									</div>
								</li>

								<li class="glide__slide">
									<div class="slide-inner">
										<div class="slide-img">
											<img class="" src="<?php echo esc_attr( get_template_directory_uri() ) . '/build/images/slide-e.jpg'; ?>">
											<div class="slide-inner-gradient"></div>
											<div class="slide-inner-gradient gradient-bottom"></div>
										</div>
										<div class="slide-inner-content">
											<p class="slide-inner-content-title">Yes</p>
											<p class="slide-inner-content-p">Lorem ipsom dolor sit amet, diam conshctetuer adipiscing elit, sed diam lorem ipsum dolor sit amet, diam lorem ipsum dolor sit amet dolor.</p>
										</div>
									</div>
								</li>

							</ul>
						</div>
					</div>
				</div>

				<!-- <div class="section-title">
					<div class="section-title-content">
						<p class="section-title-content-p">Our Process</p>
						<h3 class="section-title-content-h">We protect the true nature of every plant, protein, and mineral in our products.</h3>
					</div>
				</div> -->







				<div class="content"><?php the_content(); ?></div>





				<div class="story-scroller hidden">
					<div class="story-container" id="story-container">
						<div class="story-content">

							<div class="story-item story-a">
									<div class="story-a-video">

										<img src="<?php echo esc_attr( get_template_directory_uri() ) . '/build/images/scroller-a.jpg'; ?>">
										<?php get_template_part( '/src/images/icons/inline/inline', 'play.svg' ); ?>
									</div>
							</div>

							<div class="story-item story-b">
								<p class="story-b-p">We protect the true nature of every plant, protein, and mineral in our products.</p>
								<div class="story-b-line"><div class="line"></div></div>

								<div class="story-b-image">
									<img src="<?php echo esc_attr( get_template_directory_uri() ) . '/build/images/scroller-b.jpg'; ?>">
								</div>
							</div>

							<div class="story-item story-c">
								<div class="story-c-image">
									<img src="<?php echo esc_attr( get_template_directory_uri() ) . '/build/images/scroller-c.jpg'; ?>">
								</div>
								<div class="story-c-content">
									<h3 class="story-c-content-title">Come to Life</h3>
									<p class="story-c-content-p">Yoli has built a company focused on transforming the well-being of millions of lives around the globe.</p>
									<p class="story-c-content-p">Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
								</div>
							</div>

							<div class="story-item story-d">
								<div class="story-d-content">
									<div class="story-d-content-icon">
										<?php get_template_part( '/src/images/icons/inline/inline', 'product-tagline.svg' ); ?>
									</div>

									<div class="story-d-content-image">
										<img src="<?php echo esc_attr( get_template_directory_uri() ) . '/build/images/scroller-d.jpg'; ?>">
									</div>
								</div>
							</div>

							<div class="story-item story-e">
								<div class="story-e-content">
									<div class="story-e-content-title">Get the Glow</div>

									<div class="story-e-content-section">
										<img src="<?php echo esc_attr( get_template_directory_uri() ) . '/build/images/scroller-e.jpg'; ?>">
										<p class="story-e-content-section-p">Our community is built upon strong relationships and belief in a common purpose to live, grow, and transform our lives, and the lives of others.</p>
									</div>
								</div>
							</div>



						</div>

						<div class="story-footer">

							<div class="story-footer-above">
								<div class="story-footer-above-p">Our Story</div>
							</div>

							<div class="story-footer-line"></div>

							<div class="story-footer-below">

								<div class="story-footer-below-a">
									<div class="story-footer-below-a-text">True to Nature</div>
									<div class="story-nav">
											<?php get_template_part( '/src/images/icons/inline/inline', 'arrow-right.svg' ); ?>
									</div>
								</div>

								<div class="story-footer-below-b">
									<div class="story-footer-below-b-text">‘Yoli’ in Aztec means ‘To Live’</div>
									<p class="story-footer-below-b-p">Our mission is to help people live the best lives possible.</p>
								</div>

								<div class="story-footer-below-c">
									<div class="story-footer-below-c-text">Read Our Story</div>
									<a href="#" class="story-footer-below-c-button"><?php get_template_part( '/src/images/icons/inline/inline', 'arrow-right.svg' ); ?></a>
								</div>

							</div>

						</div>
					</div>


				</div>

				<div class="cover cover-rounded hidden">
					<div class="cover-bg" style="background-image:url(<?php echo esc_attr( get_template_directory_uri() ) . '/build/images/homepage-cover.jpg'; ?>);">
						<div class="cover-backdrop"></div>
						<div class="container">
							<div class="cover-content ">
								<h3 class="cover-content-title">Introducing Herbalism</h3>
								<hr class="cover-content-bar">
								<p class="cover-content-p">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation.</p>
							</div>
						</div>

					</div>
				</div>

				<div class="product-carousel carousel-transparent hidden">

					<div class="glide">
						<div class="glide__controls glide__bullets" data-glide-el="controls[nav]">
							<div data-glide-dir="=0">Shine</div>
							<div data-glide-dir="=1">Cheers</div>
							<div data-glide-dir="=2">Wow</div>
							<div data-glide-dir="=3">Mood Kit</div>
						</div>
						<div class="glide__arrows" data-glide-el="controls">
							<div data-glide-dir="<">
								<div class="transform rotate-180">
									<?php get_template_part( '/src/images/icons/inline/inline', 'arrow-right.svg' ); ?>
								</div>
							</div>
							<div data-glide-dir=">">
								<?php get_template_part( '/src/images/icons/inline/inline', 'arrow-right.svg' ); ?>
							</div>
						</div>
						<div class="glide__track" data-glide-el="track">
							<ul class="glide__slides">

								<li class="glide__slide">
									<div class="slide-inner">
										<div class="slide-img">
											<img class="" src="<?php echo esc_attr( get_template_directory_uri() ) . '/build/images/shine.png'; ?>">
										</div>
										<div class="slide-inner-content">
											<p class="slide-inner-content-title">Shine</p>
											<p class="slide-inner-content-p">Lorem ipsom dolor sit amet, diam conshctetuer adipiscing elit, sed diam lorem ipsum dolor sit amet, diam lorem ipsum dolor sit amet dolor.</p>
										</div>
									</div>
								</li>

								<li class="glide__slide">
									<div class="slide-inner">
										<div class="slide-img">
											<img class="" src="<?php echo esc_attr( get_template_directory_uri() ) . '/build/images/shine.png'; ?>">
										</div>
										<div class="slide-inner-content">
											<p class="slide-inner-content-title">Cheers</p>
											<p class="slide-inner-content-p">Lorem ipsom dolor sit amet, diam conshctetuer adipiscing elit, sed diam lorem ipsum dolor sit amet, diam lorem ipsum dolor sit amet dolor.</p>
										</div>
									</div>
								</li>

								<li class="glide__slide">
									<div class="slide-inner">
										<div class="slide-img">
											<img class="" src="<?php echo esc_attr( get_template_directory_uri() ) . '/build/images/shine.png'; ?>">
										</div>
										<div class="slide-inner-content">
											<p class="slide-inner-content-title">Wow</p>
											<p class="slide-inner-content-p">Lorem ipsom dolor sit amet, diam conshctetuer adipiscing elit, sed diam lorem ipsum dolor sit amet, diam lorem ipsum dolor sit amet dolor.</p>
										</div>
									</div>
								</li>

								<li class="glide__slide">
									<div class="slide-inner">
										<div class="slide-img">
											<img class="" src="<?php echo esc_attr( get_template_directory_uri() ) . '/build/images/shine.png'; ?>">
										</div>
										<div class="slide-inner-content">
											<p class="slide-inner-content-title">Mood Kit</p>
											<p class="slide-inner-content-p">Lorem ipsom dolor sit amet, diam conshctetuer adipiscing elit, sed diam lorem ipsum dolor sit amet, diam lorem ipsum dolor sit amet dolor.</p>
										</div>
									</div>
								</li>

							</ul>
						</div>
					</div>
				</div>

				<!-- <div class="about-reviews ">
					<div class="container">

						<div class="about-reviews-title">
							<div class="about-reviews-title-text">Yoli & You</div>
						</div>

						<div class="about-reviews-cols">
							<div class="about-reviews-col">
								<div class="about-reviews-image">
									<img src="<?php echo esc_attr( get_template_directory_uri() ) . '/build/images/about-a.jpg'; ?>">
								</div>

								<div class="about-reviews-content">
									<p class="about-reviews-content-p">“Lorem ipsum dolor sit amet, diam consectetuer aqipiscing elit, sed diam lorem ipsum dolor adipiscing.”</p>
									<p class="about-reviews-content-name">Sarah T. — USA</p>
									<div class="star-group">
										<?php get_template_part( '/src/images/icons/inline/inline', 'star.svg' ); ?>
										<?php get_template_part( '/src/images/icons/inline/inline', 'star.svg' ); ?>
										<?php get_template_part( '/src/images/icons/inline/inline', 'star.svg' ); ?>
										<?php get_template_part( '/src/images/icons/inline/inline', 'star.svg' ); ?>
										<?php get_template_part( '/src/images/icons/inline/inline', 'star.svg' ); ?>
									</div>
								</div>
							</div>

							<div class="about-reviews-col">
								<div class="about-reviews-image">
									<img src="<?php echo esc_attr( get_template_directory_uri() ) . '/build/images/about-b.jpg'; ?>">
								</div>

								<div class="about-reviews-content">
									<p class="about-reviews-content-p">“Diam consectetuer aqipiscing elit, sed diam lorem ipsum dolor adipiscing lorem ipsum dolor. Adim ap sudama consectetuer.”</p>
									<p class="about-reviews-content-name">Christina J. — Philippines</p>
									<div class="star-group">
										<?php get_template_part( '/src/images/icons/inline/inline', 'star.svg' ); ?>
										<?php get_template_part( '/src/images/icons/inline/inline', 'star.svg' ); ?>
										<?php get_template_part( '/src/images/icons/inline/inline', 'star.svg' ); ?>
										<?php get_template_part( '/src/images/icons/inline/inline', 'star.svg' ); ?>
										<?php get_template_part( '/src/images/icons/inline/inline', 'star.svg' ); ?>
									</div>
								</div>
							</div>

							<div class="about-reviews-col">
								<div class="about-reviews-image">
									<img src="<?php echo esc_attr( get_template_directory_uri() ) . '/build/images/about-c.jpg'; ?>">
								</div>

								<div class="about-reviews-content">
									<p class="about-reviews-content-p">“Lorem consectetuer ipsum dolor sit amet. Ased diam lorem ipsum dolor adipiscing.”</p>
									<p class="about-reviews-content-name">Scott T. — USA</p>
									<div class="star-group">
										<?php get_template_part( '/src/images/icons/inline/inline', 'star.svg' ); ?>
										<?php get_template_part( '/src/images/icons/inline/inline', 'star.svg' ); ?>
										<?php get_template_part( '/src/images/icons/inline/inline', 'star.svg' ); ?>
										<?php get_template_part( '/src/images/icons/inline/inline', 'star.svg' ); ?>
										<?php get_template_part( '/src/images/icons/inline/inline', 'star.svg' ); ?>
									</div>
								</div>
							</div>
						</div>

					</div>
				</div> -->

				<!-- <div class="about">
					<div class="container">
						<div class="about-images">
						<img src="<?php echo esc_attr( get_template_directory_uri() ) . '/build/images/collage-a.jpg'; ?>">
						<img src="<?php echo esc_attr( get_template_directory_uri() ) . '/build/images/collage-b.jpg'; ?>">
						<img src="<?php echo esc_attr( get_template_directory_uri() ) . '/build/images/collage-c.jpg'; ?>" style=" margin-left: -1px; ">
						</div>
						<div class="about-content">
									<h2 class="about-content-title">What is Yoli?</h2>
									<p class="about-content-p">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
						</div>
					</div>
				</div> -->




				<?php
			endwhile; // End of the loop.
			?>

		</main><!-- #main -->

	</div>

<?php get_footer(); ?>
