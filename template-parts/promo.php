<?php
/**
 * Promo template part.
 *
 * @package _s
 */

?>

<?php if ( have_rows( 'promo', 'options' ) ) : ?>
	<?php
	while ( have_rows( 'promo', 'options' ) ) :
		the_row();
		?>
		<?php
		// ACF vars.
		$promo_title        = get_sub_field( 'promo_title', 'options' );
		$promo_title_line_2 = get_sub_field( 'promo_title_line_2', 'options' );
		$promo_link         = get_sub_field( 'promo_link', 'options' );
		$promo_image        = get_sub_field( 'promo_image', 'options' );
		$shop_now_text      = get_sub_field( 'shop_now_text', 'options' );

		$combined_title = $promo_title . ' ' . $promo_title_line_2;
		?>
		<div class="promo">

			<?php // Top part of promo with image and title. ?>

				<?php if ( $promo_link ) : ?>
					<a class="promo-link" href="<?php echo esc_url( $promo_link ); ?>" title="<?php echo esc_html( $combined_title ); ?>">
				<?php endif; ?>

					<div class="promo-image" style="background-image:url('<?php echo esc_url( $promo_image ); ?>');"></div>
					<div class="promo-gradient"></div>
					<?php if ( $promo_title ) : ?>
						<div class="promo-title">
							<?php echo esc_html( $promo_title ); ?>
							<?php if ( $promo_title_line_2 ) : ?>
								<?php echo '<br>'; ?>
								<?php echo esc_html( $promo_title_line_2 ); ?>
							<?php endif; ?>
						</div>
					<?php endif; ?>

				<?php if ( $promo_link ) : ?>
					</a>
				<?php endif; ?>


			<?php // Bottom part of promo with Shop now text. ?>
			<?php if ( $promo_link ) : ?>
				<a class="promo-shop-now" href="<?php echo esc_url( $promo_link ); ?>" title="<?php echo esc_html( $combined_title ); ?>">
			<?php endif; ?>

				<?php if ( $shop_now_text ) : ?>
					<?php echo esc_html( $shop_now_text ); ?>
				<?php endif; ?>

			<?php if ( $promo_link ) : ?>
				</a>
			<?php endif; ?>

		</div>
	<?php endwhile; ?>
<?php endif; ?>
