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
			<div class="footer-info-first">
				<div class="footer-info-logo">
					<?php get_template_part( '/src/images/icons/inline/inline', 'product-tagline.svg' ); ?>
				</div>
				<div class="footer-info-slogan">
					Yoli helps you feel what it’s like to really live. Experience a lifestyle aligned with nature. Come to life.
				</div>
			</div>
			<?php require realpath( __DIR__ ) . '/template-parts/contact-info.php'; ?>
				<div class="footer-info-support">
					<div class="footer-info-support-hours">
						Customer Support<br/>
						<?php echo esc_html( $hours ); ?>
					</div>
					<div class="footer-info-support-telephone">
						<a class="underline" href="tel:<?php echo esc_attr( $phone_one_number ); ?>"><?php echo esc_html( $phone_one ); ?></a>
						or
						<a class="underline" href="tel:<?php echo esc_attr( $phone_two_number ); ?>"><?php echo esc_html( $phone_two ); ?></a>
						<br/>
						<a href="mailto:<?php echo esc_attr( $email ); ?>" class="underline" target="_blank"><?php echo esc_html( $email ); ?></a>
					</div>
				</div>
			</div>
		<div class="footer-line"></div>
		<div class="product-menu footer-menu">
			<div class="product-menu-content">
				<?php get_template_part( '/template-parts/product-menu-api' ); ?>
			</div>
		</div>
		<div class="footer-line-bottom"></div>
		<div class="footer-bottom">
			<div class="footer-copyright">© Yoli 2021. All rights reserved.</div>
			<div class="flex">
				<div class="footer-location">2080 Industrial Rd B, Salt Lake City, Utah 84104</div>
				<div class="social-links">
					<a href="https://www.pinterest.com/Yoli_Global" title="Yoli on Pinterest" target="_blank"><?php get_template_part( '/src/images/icons/inline/inline', 'pinterest.svg' ); ?></a>
					<a href="https://www.instagram.com/yoli_global/" title="Yoli on Instagram" target="_blank"><?php get_template_part( '/src/images/icons/inline/inline', 'instagram.svg' ); ?></a>
					<a href="https://www.facebook.com/yoliglobal" title="Yoli on Facebook" target="_blank"><?php get_template_part( '/src/images/icons/inline/inline', 'facebook.svg' ); ?></a>
				</div>
			</div>
		</div>
	</div>
</footer><!-- .site-footer container-->

<div class="" id="off-canvas-container">
	<div class="off-canvas-container-inner">
		<button class="off-canvas-close">
			<?php get_template_part( '/src/images/icons/inline/inline', 'close.svg' ); ?>
		</button>

		<?php get_template_part( '/template-parts/product-menu-mobile-api' ); ?>


	</div>
</div>

<?php wp_footer(); ?>

</body>

</html>
