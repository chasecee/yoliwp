<?php
/**
 * Section title-bars
 *
 * @package      _s
 * @author       Chase Christensen
 * @since        1.0.0
 * @license      GPL-2.0+
 **/

// Create name for prefixing classes and id's.
$slug = 'section-title-bars';

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
$title_text = get_field( 'title_text' );
$spacing    = get_field( 'spacing' );

if ( $spacing ) {
	$_s_class_name .= ' ' . $spacing;
}
?>

<div class="<?php echo esc_attr( $_s_class_name ); ?>" id="<?php echo esc_attr( $_s_id ); ?>">

		<h4 class="section-title-bars-h">
			<?php if ( $title_text ) : ?>
				<?php echo esc_html( $title_text ); ?>
			<?php endif; ?>
		</h4>

</div>
