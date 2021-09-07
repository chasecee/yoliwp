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
					</div>
					<div class="cover-content-right">
						<a class="btn btn-primary href="<?php if ( $cover_button_link ) : ?>
							<?php echo esc_url( $cover_button_link ); ?>
							<?php endif; ?>">
							<?php if ( $cover_button_text ) : ?>
								<span><?php echo esc_html( $cover_button_text ); ?></span>
							<?php endif; ?>
							<?php get_template_part( '/src/images/icons/inline/inline', 'arrow-right.svg' ); ?>
						</a>
					</div>
			</div>
		</div>
	</div>
</div>

</div>
