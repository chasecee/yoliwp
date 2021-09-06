<?php
/**
 * Section-before-after-slider
 *
 * @package      _s
 * @author       Chase Christensen
 * @since        1.0.0
 * @license      GPL-2.0+
 **/

// Create name for prefixing classes and id's.
$slug = 'section-before-after-slider';

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
$pretitle = get_field( 'pretitle' );
$_s_title = get_field( 'title' );
$spacing  = get_field( 'spacing' );

if ( $spacing ) {
	$_s_class_name .= ' ' . $spacing;
}
?>
<div class="<?php echo esc_attr( $_s_class_name ); ?>" id="<?php echo esc_attr( $_s_id ); ?>">

	<div class="before-after-carousel">

		<div class="glide" data-per-view="1">

				<div class="glide__arrows" data-glide-el="controls">
					<div data-glide-dir="<">
						<div class="transform rotate-180">
							<?php get_template_part( '/src/images/icons/inline/inline', 'arrow-right.svg' ); ?>
						</div>
					</div>
					<div id="direction-right">
						<div class="block">
							<?php get_template_part( '/src/images/icons/inline/inline', 'arrow-right.svg' ); ?>
						</div>
					</div>
				</div>



				<div class="glide__track" data-glide-el="track">
					<ul class="glide__slides">

						<?php if ( have_rows( 'slides' ) ) : ?>
							<?php
							while ( have_rows( 'slides' ) ) :
								the_row();
								?>

								<li class="glide__slide">
									<div class="before-after-carousel-content">
										<div class="before-after-carousel-content-image">
											<?php
											$slide_image = get_sub_field( 'slide_image' );
											$size        = 'full';
											if ( $slide_image ) {
												$url = wp_get_attachment_url( $slide_image );
												echo wp_get_attachment_image( $slide_image, $size );
											};
											?>
										</div>

										<div class="before-after-carousel-content-text">

											<?php $slide_quote = get_sub_field( 'slide_quote' ); ?>
											<?php if ( $slide_quote ) : ?>
												<div class="before-after-carousel-content-text-pretitle">Results</div>
												<div class="before-after-carousel-content-text-quote"><?php echo esc_html( $slide_quote ); ?></div>
											<?php endif; ?>

										</div>
									</div>
								</li>

							<?php endwhile; ?>
						<?php endif; ?>


					</ul>
				</div>

		</div>
	</div>

</div>
