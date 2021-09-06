<?php
/**
 * Section block
 *
 * @package      _s
 * @author       Chase Christensen
 * @since        1.0.0
 * @license      GPL-2.0+
 **/

// Create name for prefixing classes and id's.
$slug = 'testimonial-bubble';

// Create id attribute allowing for custom "anchor" value.
$_s_id = $slug . '-' . $block['id'];
if ( ! empty( $block['anchor'] ) ) {
	$_s_id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$_s_class_name = $slug;
if ( ! empty( $block['className'] ) ) {
	$_s_class_name .= ' ' . $block['className'];
}
if ( ! empty( $block['align'] ) ) {
	$_s_class_name .= ' align' . $block['align'];
}
$ingredients_title = get_field( 'ingredients_title' )

?>
<div class="<?php echo esc_attr( $_s_class_name ); ?>" id="<?php echo esc_attr( $_s_id ); ?>">
<?php
$count        = 0;
$testimonials = get_field( 'testimonials' );
if ( is_array( $testimonials ) ) {
	$count = count( $testimonials );
} else {
	$count = 2;
}
$show_on_desktop = get_field( 'show_on_desktop' );
if ( $show_on_desktop ) :
	$count = $show_on_desktop;
endif;

?>
<?php if ( have_rows( 'testimonials' ) ) : ?>
	<div class="column-carousel">

		<div class="glide" data-per-view="<?php echo esc_html( $count ); ?>">

			<div class="glide__track" data-glide-el="track">
				<ul class="glide__slides">
					<?php
					while ( have_rows( 'testimonials' ) ) :
						the_row();
						?>
						<?php
						$testimonial_title   = get_sub_field( 'testimonial_title' );
						$testimonial_name    = get_sub_field( 'testimonial_name' );
						$testimonial_content = get_sub_field( 'testimonial_content' );
						?>

						<li class="glide__slide">
							<div class="section-testimonial">
								<div class="section-testimonial-inner">
									<div class="section-testimonial-content">

										<?php if ( $testimonial_title ) : ?>
											<h3 class="section-testimonial-content-title">
												<?php echo esc_html( $testimonial_title ); ?>
											</h3>
										<?php endif; ?>

										<?php if ( $testimonial_content ) : ?>
											<p class="section-testimonial-content-p">
												<?php echo esc_html( $testimonial_content ); ?>
											</p>
										<?php endif; ?>

										<?php if ( $testimonial_name ) : ?>
											<p class="section-testimonial-content-p">
												<?php echo esc_html( $testimonial_name ); ?>
											</p>
										<?php endif; ?>

									</div>
								</div>
							</div>
						</li>

					<?php endwhile; ?>
				</ul>
			</div>
		</div>
	</div>
<?php endif; ?>

</div>
