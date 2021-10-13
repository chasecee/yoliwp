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
$slug = 'home-slider';

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
	<div class="product-carousel">
		<div class="glide">
			<?php
			if ( have_rows( 'carousel_slider' ) ) :
				$i = -1;
				?>

				<div class="glide__controls glide__bullets" data-glide-el="controls[nav]">
					<?php
					while ( have_rows( 'carousel_slider' ) ) :
						the_row();
						$i++;
						?>

						<div data-glide-dir="=<?php echo esc_html( $i ); ?>"><?php the_sub_field( 'menu_title' ); ?></div>

					<?php endwhile; ?>
				</div>

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

						<?php
						while ( have_rows( 'carousel_slider' ) ) :
							the_row();
							$i++;
							?>

							<li class="glide__slide">
								<div class="slide-inner">
									<div class="slide-img">

										<img class="" src="<?php the_sub_field( 'image' ); ?>">
										<div class="slide-inner-gradient"></div>
										<div class="slide-inner-gradient gradient-bottom"></div>
									</div>
									<div class="slide-inner-content">
										<div class="relative">
											<p class="slide-inner-content-title"> <?php the_sub_field( 'slide_title' ); ?></p>
											<p class="slide-inner-content-p"><?php the_sub_field( 'slide_content' ); ?></p>

											<a class="btn btn-primary btn-shop btn-style-arrow w-auto" href="<?php the_sub_field( 'button_link' ); ?>">

														<span class="btn-join-text"><?php the_sub_field( 'button_text' ); ?></span>

														<span class="btn-join-svg">
															<svg xmlns="http://www.w3.org/2000/svg" width="37.682" height="16.926" viewBox="0 0 37.682 16.926">
															<g id="Group_968" data-name="Group 968" transform="translate(5.065 -13.375)">
																<g id="noun_Arrow_3771902" transform="translate(-4.565 14.082)">
																<path id="Path_1786" data-name="Path 1786" d="M42.348,48.641l.67.67,7.756-7.756L43.019,33.8l-.67.67,6.607,6.607H14.3v.958H48.955Z" transform="translate(-14.3 -33.8)" fill="currentColor" stroke="currentColor" stroke-width="1"></path>
																</g>
															</g>
															</svg>
														</span>

											</a>
										</div>
									</div>
								</div>
							</li>

						<?php endwhile; ?>

					</ul>
				</div>

			<?php endif; ?>
		</div>
	</div>
</div>
