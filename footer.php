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
<?php
	// ACF Vars.
	$footer_slogan   = get_field( 'footer_slogan', 'options' );
	$footer_logo_svg = get_field( 'footer_logo_svg', 'options' );
	$copyright_info  = get_field( 'copyright_info', 'options' );
	$footer_address  = get_field( 'footer_address', 'options' );

?>
<footer class="site-footer">
	<div class="container">
		<div class="footer-info">
			<div class="footer-info-first">
				<div class="footer-info-logo">
					<?php
					if ( $footer_logo_svg ) {
						echo wp_kses( $footer_logo_svg, get_kses_extended_ruleset() );
					} else {
						get_template_part( '/src/images/icons/inline/inline', 'product-tagline.svg' );
					}
					?>
				</div>
				<div class="footer-info-slogan">
					<?php if ( $footer_slogan ) : ?>
						<?php echo esc_html( $footer_slogan ); ?>
					<?php endif; ?>
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
			<div class="footer-copyright">
			<?php if ( $copyright_info ) : ?>
				<?php echo esc_html( $copyright_info ); ?>
			<?php endif; ?>
			</div>
			<div class="flex">
				<div class="footer-location">
					<?php if ( $footer_address ) : ?>
						<?php echo esc_html( $footer_address ); ?>
					<?php endif; ?>
				</div>

				<?php // Social links via template part based on country cookie. ?>
				<?php get_template_part( 'template-parts/social-links' ); ?>

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
