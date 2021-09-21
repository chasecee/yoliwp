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
<?php require_once realpath( __DIR__ ) . '/template-parts/privacy-policy.php'; ?>

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
				<div class="footer-info-support">
					<div class="footer-info-support-hours">
						Customer Support<br/>
						8 am MST - 7 pm MST
					</div>
					<div class="footer-info-support-telephone">
						<a class="underline" href="tel:1-801-727-0877">801-727-0877</a> or <a class="underline" href="tel:1-801-727-0877">888-295-9009</a><br/>
						<a href="mailto:cs@yoli.com" class="underline" target="_blank">cs@yoli.com</a>
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
				<div class="privacy-policy">
					<a href="<?php echo esc_attr( privacy_policy() ); ?>">Privacy Policy</a>
				</div>
				<div class="social-links">
					<a href="https://www.pinterest.com/YoliBBS/_created/" title="Yoli on Pinterest" target="_blank"><?php get_template_part( '/src/images/icons/inline/inline', 'pinterest.svg' ); ?></a>
					<a href="https://www.instagram.com/yolibetterbody/" title="Yoli on Instagram" target="_blank"><?php get_template_part( '/src/images/icons/inline/inline', 'instagram.svg' ); ?></a>
					<a href="https://www.facebook.com/BetterBodySystem" title="Yoli on Facebook" target="_blank"><?php get_template_part( '/src/images/icons/inline/inline', 'facebook.svg' ); ?></a>
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

		<?php _s_display_mobile_menu(); ?>

		<div class="off-canvas-bottom">
			<p>
				Customer Support<br>
				8 am MST - 7 pm MST<br>
				801-727-0877 or 888-295-9009<br>
				cs@yoli.com
			</p>
			<div class="social-links">
				<a href="https://www.pinterest.com/YoliBBS/_created/" title="Yoli on Pinterest" target="_blank"><?php get_template_part( '/src/images/icons/inline/inline', 'pinterest.svg' ); ?></a>
				<a href="https://www.instagram.com/yolibetterbody/" title="Yoli on Instagram" target="_blank"><?php get_template_part( '/src/images/icons/inline/inline', 'instagram.svg' ); ?></a>
				<a href="https://www.facebook.com/BetterBodySystem" title="Yoli on Facebook" target="_blank"><?php get_template_part( '/src/images/icons/inline/inline', 'facebook.svg' ); ?></a>
			</div>
		</div>
	</div>
</div>

<?php wp_footer(); ?>

</body>

</html>
