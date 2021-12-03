<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package _s
 */

?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

	<?php wp_head(); ?>

	<style>
		.ready .site-alert{display:block!important;}

		@media (max-width: 768px){
			.ready .banner-mobile{display:block!important;}
		}
		.search-form {
			display: flex;
			justify-content: center;
			align-items: center;
			margin-top: 1rem;

		}
		input.search-field {
			outline: none;
			box-sizing: border-box;
			margin-right: .5rem;
			border: 2px solid white;
			color: black;
			max-width: 75%;
			height: 50%;
		}
		input.search-field:hover {
			background-color: inherit;
			border: 2px solid rgb(248,245,235);
		}
		button {
			display: flex;
			flex-direction: column;
			align-items: center;
			justify-content: space-around;
			min-width: 2rem;
		}
		.magnifying-glass {
			max-height: 2.5vh;
			min-height: 25%;
			fill: red;

		}
		.magnifying-glass:hover {
			border: 1px solid transparent;
			transition: border 0s ease;
		}
	</style>
</head>

<body <?php body_class( 'site-wrapper' ); ?>>

	<?php wp_body_open(); ?>
	<a class="skip-link screen-reader-text" href="#main"><?php esc_html_e( 'Skip to content', '_s' ); ?></a>

	<div class="guide"></div>

	<?php
	if ( is_page_template( 'template-home.php' ) ) {
		$header_class = 'bg-transparent-text-light';
	} else {
		$header_class = 'default';
	}
	?>
		<header class="site-header js-site-header <?php echo esc_attr( $header_class ); ?>">
			<div class="header-container">

					<nav id="site-navigation" class="main-navigation navigation-menu nav-left" aria-label="<?php esc_attr_e( 'Main Navigation', '_s' ); ?>">
						<?php
							wp_nav_menu(
								[
									'fallback_cb'    => false,
									'theme_location' => 'primary',
									'menu_id'        => 'primary-menu',
									'menu_class'     => 'menu',
									'container'      => false,
								]
							);
							?>
					</nav>

					<div class="logo ">

						<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" class="inline-block relative -right-6 -bottom-4">

							<?php get_template_part( '/src/images/icons/inline/inline', 'logo.svg' ); ?>

						</a>

					</div>
					<div class="nav-right">
						<nav id="site-navigation-right" class="shop-navigation navigation-menu " aria-label="<?php esc_attr_e( 'Main Navigation Right', '_s' ); ?>">
							<?php
								$home = ( isset( $_SERVER['HTTPS'] ) && 'on' === $_SERVER['HTTPS'] ? 'https' : 'http' ) . '://' . $_SERVER['HTTP_HOST'];
							?>
							<?php
							echo esc_html(
								get_template_part( '/api/search-bar' )
							);
							?>
							<ul class="menu menu-right" id="primary-menu-right">
								<?php
								require realpath( __DIR__ ) . '/api/join-and-shop-urls.php';
								echo '<li class="menu-item"><a href=" ' . esc_attr( $login_link ) . ' ">Login</a></li>';
								echo '<li class="menu-item"><a href=" ' . esc_attr( $shop_now_url ) . ' ">Shop Now</a></li>';
								?>
							</ul>
						</nav>

						<?php if ( has_nav_menu( 'primary' ) || has_nav_menu( 'mobile' ) ) : ?>
							<a href="#off-canvas-menu" class="off-canvas-open " data-target="slide-menu" data-action="toggle" aria-expanded="false" aria-label="<?php esc_attr_e( 'Open Menu', '_s' ); ?>">
								<?php get_template_part( '/src/images/icons/inline/inline', 'hamburger.svg' ); ?>
							</a>
						<?php endif; ?>
					</div>


					</div>
			</div>

			<div class="product-menu header-menu js-product-menu">
				<div class="product-menu-content">
					<?php get_template_part( '/template-parts/product-menu-api' ); ?>
				</div>
			</div>
		</header>
