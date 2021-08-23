<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package _s
 */

?>
<?php get_template_part( 'template-parts/mini-admin-bar' ); ?>


	<footer class="site-footer">
		<div class="container">
			<div class="footer-info">

				<div class="flex">

					<div class="footer-info-logo">
					<?php get_template_part( '/src/images/icons/inline/inline', 'product-tagline.svg' ); ?>
					</div>

					<div class="footer-info-slogan">Yoli means life. Yoli is a company that helps people love their body and their life.</div>

				</div>

				<div class="footer-info-support">

					<div class="footer-info-support-hours">
						Customer Support<br/>
						8 am MST - 7 pm MST
					</div>

					<div class="footer-info-support-telephone">
						801-727-0877 or 888-295-9009<br/>
						cs@yoli.com
					</div>

				</div>

			</div>
			<div class="footer-line"></div>
			<div class="product-menu footer-menu">
				<div class="product-menu-content">
					<?php get_template_part( '/template-parts/product-menu' ); ?>
				</div>
			</div>
			<div class="footer-line-bottom"></div>
			<div class="footer-bottom">
				<div class="footer-copyright">© Yoli 2021. All rights reserved.</div>
				<div class="flex">
					<div class="footer-location">2080 Industrial Rd B, Salt Lake City, Utah 84104</div>
					<div class="social-links">
						<a href="#" title="Yoli on Pinterest"><?php get_template_part( '/src/images/icons/inline/inline', 'pinterest.svg' ); ?></a>
						<a href="#" title="Yoli on Instagram"><?php get_template_part( '/src/images/icons/inline/inline', 'instagram.svg' ); ?></a>
						<a href="#" title="Yoli on Facebook"><?php get_template_part( '/src/images/icons/inline/inline', 'facebook.svg' ); ?></a>
					</div>
				</div>
			</div>

		</div>

	</footer><!-- .site-footer container-->

	<?php _s_display_mobile_menu(); ?>
	<?php wp_footer(); ?>

</body>

</html>
