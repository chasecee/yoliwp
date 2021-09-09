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
$slug = 'section-cover-rounded';

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
$cover_title = get_field( 'cover_title' );
?>





<div class="<?php echo esc_attr( $_s_class_name ); ?>" id="<?php echo esc_attr( $_s_id ); ?>">

<div class="cover">
	<div class="cover-bg" style="background-image:url(<?php echo esc_url( get_field( 'cover_bg_image' ) ); ?>);">
		<div class="cover-backdrop"></div>
		<div class="container">
			<div class="cover-content">

					<div class="cover-content-left">
						<div class="cover-content-line"></div>
						<?php if ( $cover_title ) : ?>
							<h3 class="cover-content-title">
							<?php echo esc_html( $cover_title ); ?>
							</h3>
						<?php endif; ?>

						<div class="cover-content-p">
							<?php echo '<InnerBlocks />'; ?>
						</div>
					</div>

			</div>
		</div>
	</div>
</div>

</div>
