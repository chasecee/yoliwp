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
$slug = 'section-cover';

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
$cover_title       = get_field( 'cover_title' );
$cover_text        = get_field( 'cover_text' );
$cover_button_text = get_field( 'cover_button_text' );
$cover_button_link = get_field( 'cover_button_link' );
?>





<div class="<?php echo esc_attr( $_s_class_name ); ?>" id="<?php echo esc_attr( $_s_id ); ?>">

<div class="cover">
	<div class="cover-bg" style="background-image:url(<?php echo esc_url( get_field( 'cover_bg_image' ) ); ?>);">
		<div class="cover-backdrop"></div>
		<div class="container">
			<div class="cover-content">
					<div class="cover-content-left">
					<?php if ( $cover_title ) : ?>
						<h3 class="cover-content-title">
						<?php echo esc_html( $cover_title ); ?>
						</h3>
					<?php endif; ?>

					<?php if ( $cover_text ) : ?>
						<p class="cover-content-p">
							<?php echo esc_html( $cover_text ); ?>
						</p>
					<?php endif; ?>
						<div class="scover-button-wrapper">
							<?php if ( have_rows( 'button' ) ) : ?>
								<?php
								while ( have_rows( 'button' ) ) :
									the_row();
									?>

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

								<?php endwhile; ?>
							<?php endif; ?>
						</div>


					</div>
					<div class="cover-content-right">
						<?php echo '<InnerBlocks />'; ?>
					</div>
			</div>
		</div>
	</div>
</div>

</div>
