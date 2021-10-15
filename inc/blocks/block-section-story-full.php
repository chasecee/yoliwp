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
$slug = 'section-story-full';

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

// acf-vars.
$story_title = get_field( 'story_title' );

$spacing = get_field( 'spacing' );
if ( $spacing ) {
	$spacing_class_name = $spacing;
} else {
	$spacing_class_name = 'my-150';
}
?>
<div class="<?php echo esc_attr( $_s_class_name ); ?> <?php echo esc_attr( $spacing_class_name ); ?>" id="<?php echo esc_attr( $_s_id ); ?>">
	<div class="section-story-content">
		<h3 class="section-story-content-h">
			<?php if ( $story_title ) : ?>
				<?php echo esc_html( $story_title ); ?>
			<?php endif; ?>
		</h3>
		<div class="section-story-content-p">
			<?php echo '<InnerBlocks />'; ?>
		</div>
	</div>
</div>
