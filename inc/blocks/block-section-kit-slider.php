<?php
/**
 * Section kit slider
 *
 * @package      _s
 * @author       Chase Christensen
 * @since        1.0.0
 * @license      GPL-2.0+
 **/

// Create name for prefixing classes and id's.
$slug = 'section-kit-slider';

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
$style = get_field( 'style' );
if ( $style ) {
	$slider_style = $style;
} else {
	$slider_style = 'kitslider';
}
$rows = count( get_field( 'slides' ) );
if ( 3 < $rows ) {
	$static_on_desktop_switch    = '100';
	$static_on_desktop_classname = 'slide-on-desktop';
} else {
	$static_on_desktop_switch    = '0';
	$static_on_desktop_classname = 'static-on-desktop';
}
?>
<div class="<?php echo esc_attr( $_s_class_name ); ?>" id="<?php echo esc_attr( $_s_id ); ?>" data-rows="<?php echo esc_attr( $rows ); ?>">

<div class="kit-carousel focus-carousel <?php echo esc_attr( $slider_style ); ?> <?php echo esc_attr( $static_on_desktop_classname ); ?>">
	<div class="focus-carousel-blocker"></div>
	<div class="glide" data-per-view="3" data-static-on-desktop="<?php echo esc_attr( $static_on_desktop_switch ); ?>">

		<div class="glide__arrows" data-glide-el="controls">
			<div data-glide-dir="<">
				<div class="transform rotate-180">
					<?php get_template_part( '/src/images/icons/inline/inline', 'arrow-right.svg' ); ?>
				</div>
			</div>
			<div data-glide-dir="&gt;">
				<?php get_template_part( '/src/images/icons/inline/inline', 'arrow-right.svg' ); ?>
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

							<div class="focus-carousel-image">
								<?php
								$slide_image = get_sub_field( 'slide_image' );
								$size        = 'full';
								if ( $slide_image ) {
									$url = wp_get_attachment_url( $slide_image );
									echo wp_get_attachment_image( $slide_image, $size );

								};
								?>
							</div>

							<div class="focus-carousel-content">

								<?php $slide_title = get_sub_field( 'slide_title' ); ?>
								<?php if ( $slide_title ) : ?>
									<div class="focus-carousel-content-title">
									<?php echo esc_html( $slide_title ); ?>
									</div>
								<?php endif; ?>

								<?php if ( 'testimonial' === $style ) { ?>
									<?php $testimonial_name = get_sub_field( 'testimonial_name' ); ?>
									<?php if ( $testimonial_name ) : ?>
										<div class="focus-carousel-content-name">
										<?php echo esc_html( $testimonial_name ); ?>
										</div>
									<?php endif; ?>
								<?php } ?>

							</div>

						</li>

					<?php endwhile; ?>
				<?php endif; ?>


			</ul>
		</div>
	</div>
</div>
</div>
