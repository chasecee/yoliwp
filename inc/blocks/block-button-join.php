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
$slug = 'button-join';

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

// acf and hard coded-values.
$style             = get_field( 'style' );
$width             = get_field( 'width' );
$cover_button_text = 'Join Now';
$cover_button_link = '#';
if ( 'price' === $style ) {
	$cover_button_text = 'Join Now for $39';
}

?>

<div class="<?php echo esc_attr( $_s_class_name ); ?>" id="<?php echo esc_attr( $_s_id ); ?>">

	<a class="btn btn-primary btn-join btn-style-<?php echo esc_attr( $style ); ?> <?php echo esc_attr( $width ); ?>" href="<?php echo esc_url( $cover_button_link ); ?>">

		<?php if ( $cover_button_text ) : ?>
			<span class="btn-join-text"><?php echo esc_html( $cover_button_text ); ?></span>
		<?php endif; ?>

		<?php if ( 'arrow' === $style ) : ?>
			<span class="btn-join-svg">
				<?php get_template_part( '/src/images/icons/inline/inline', 'arrow-right.svg' ); ?>
			</span>
		<?php endif; ?>

	</a>


</div>
