<?php
/**
 * Section What Is Module
 *
 * @package      _s
 * @author       Chase Christensen
 * @since        1.0.0
 * @license      GPL-2.0+
 **/

// Create name for prefixing classes and id's.
$slug = 'what-is-module';

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
?>
<div class="<?php echo esc_attr( $_s_class_name ); ?>">
	<div class="what-is-inner">
		<div class="sc-title">
			<h4><?php the_field( 'title' ); ?></h4>
		</div>

		<div class="sc-content">
			<?php the_field( 'content' ); ?>
		</div>

		<div class="sc-items">
		<?php if ( have_rows( 'showcase_module' ) ) : ?>
			<?php
			while ( have_rows( 'showcase_module' ) ) :
				the_row();
				?>

		<div>
			<div class="showcase ">
				<?php the_sub_field( 'image' ); ?>
				<h4><?php the_sub_field( 'title' ); ?></h4>
				<p><?php the_sub_field( 'blurb' ); ?></p>
			</div>
		</div>

	<?php endwhile; ?>
	<?php endif; ?>

		</div>
	</div>
</div>
