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
$slug = 'section-title';

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

	<div class="section-title-content">
		<?php if ( $pretitle ) : ?>
			<p class="section-title-content-p">
				<?php echo esc_html( $pretitle ); ?>
			</p>
		<?php endif; ?>
		<?php if ( $_s_title ) : ?>
			<h3 class="section-title-content-h">
				<?php echo esc_html( $_s_title ); ?>
			</h3>
		<?php endif; ?>
	</div>

</div>
