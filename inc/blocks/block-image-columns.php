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
$slug = 'image-columns';

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

?>

<div class="<?php echo esc_attr( $_s_class_name ); ?>" id="<?php echo esc_attr( $_s_id ); ?>">

<?php if ( have_rows( 'images' ) ) : ?>
	<?php
	while ( have_rows( 'images' ) ) :
		the_row();
		?>
		<div class="image-columns-image">
		<?php
		$image = get_sub_field( 'image' );
		$size  = 'full';
		if ( $image ) {
			$url = wp_get_attachment_url( $image );
			echo wp_get_attachment_image( $image, $size );
		};
		?>
		</div>
	<?php endwhile; ?>
<?php endif; ?>

</div>
