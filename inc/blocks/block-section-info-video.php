<?php
/**
 * Section block info video
 *
 * @package      _s
 * @author       Chase Christensen
 * @since        1.0.0
 * @license      GPL-2.0+
 **/

// Create name for prefixing classes and id's.
$slug = 'section-info-video';

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
$size  = 'full';
$text  = get_field( 'text' );
$image = get_field( 'image' );
?>

<div class="<?php echo esc_attr( $_s_class_name ); ?>" id="<?php echo esc_attr( $_s_id ); ?>">

<div class="section-info">

	<div class="section-info-a">
		<?php echo '<InnerBlocks />'; ?>
	</div>

	<div class="section-info-b">
	<?php if ( $text ) : ?>
		<p class="section-info-b-p">
			<?php echo esc_html( $text ); ?>
		</p>
	<?php endif; ?>

		<div class="section-info-b-line"><div class="line"></div></div>

		<div class="section-info-b-image">
			<?php
			if ( $image ) {
				$url = wp_get_attachment_url( $image );
				echo wp_get_attachment_image( $image, $size );
			};
			?>
		</div>
	</div>

</div>


</div>
