<?php
/**
 * Section big cta
 *
 * @package      _s
 * @author       Chase Christensen
 * @since        1.0.0
 * @license      GPL-2.0+
 **/

// Create name for prefixing classes and id's.
$slug = 'section-big-cta';

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

// acf vars.
$title_text     = get_field( 'title_text' );
$_s_class_name .= ' fg-color-as-bg-color';
?>

<div class="<?php echo esc_attr( $_s_class_name ); ?>" id="<?php echo esc_attr( $_s_id ); ?>">

<div class="section-big-cta-inner ">
	<h3 class="section-big-cta-inner-heading">
		<?php if ( $title_text ) : ?>
			<?php echo esc_html( $title_text ); ?>
		<?php endif; ?>
	</h3>
	<a href="#" class="btn fg-color">Shop Now</a>
</div>

</div>
