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

</head>

<body <?php body_class( 'site-wrapper' ); ?>>

	<?php wp_body_open(); ?>

	<a class="skip-link screen-reader-text" href="#main"><?php esc_html_e( 'Skip to content', '_s' ); ?></a>

	<div class="guide"></div>

	<?php get_template_part( 'template-parts/site-alert' ); ?>

	<?php
	if ( is_page_template( 'template-product.php' ) ) {
			$header_class = 'transparent';
	} elseif ( is_page_template( 'about.php' ) ) {
		$header_class = 'transparent';
	} else {
		$header_class = 'default';
	}
	?>

		<header class="site-header <?php echo esc_attr( $header_class ); ?>">
			<div class="backdrop"></div>
			<div class="container ">

					<nav id="site-navigation" class="main-navigation navigation-menu col-span-4" aria-label="<?php esc_attr_e( 'Main Navigation', '_s' ); ?>">
						<?php
						wp_nav_menu(
							[
								'fallback_cb'    => false,
								'theme_location' => 'primary',
								'menu_id'        => 'primary-menu',
								'menu_class'     => 'menu dropdown',
								'container'      => false,
							]
						);
						?>
					</nav><!-- #site-navigation-->

					<div class="logo col-span-4 col-start-5 justify-self-center leading-none">

						<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" class="inline-block">

							<?php get_template_part( '/src/images/icons/inline/inline', 'logo.svg' ); ?>

						</a>

					</div>

					<div class="nav-right col-span-4 col-start-9 justify-self-end">

						<nav id="site-navigation-right" class="shop-navigation navigation-menu " aria-label="<?php esc_attr_e( 'Main Navigation Right', '_s' ); ?>">
							<?php
							wp_nav_menu(
								[
									'fallback_cb'    => false,
									'theme_location' => 'primaryright',
									'menu_id'        => 'primary-menu-right',
									'menu_class'     => 'menu-right dropdown',
									'container'      => false,
								]
							);
							?>
							<div class="ml-32">

								<?php get_template_part( '/src/images/icons/inline/inline', 'bag.svg' ); ?>

							</div>
						</nav><!-- #site-navigation-->
					</div>
					<?php if ( has_nav_menu( 'primary' ) || has_nav_menu( 'mobile' ) ) : ?>
						<button type="button" class="off-canvas-open" aria-expanded="false" aria-label="<?php esc_attr_e( 'Open Menu', '_s' ); ?>"></button>
					<?php endif; ?>
			</div><!-- .container -->
			<div class="product-menu">
				<div class="product-menu-content">
					<?php
						// get block area for sub menu.
					if ( function_exists( 'ea_block_area' ) ) {
						ea_block_area()->show( 'products-sub-menu' );
					}
					?>
				</div>
			</div>

		</header><!-- .site-header-->
