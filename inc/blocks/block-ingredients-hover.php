<?php
/**
 * Section block
 *
 * @package      Doxy.me
 * @author       Chase Christensen
 * @since        1.0.0
 * @license      GPL-2.0+
 **/

// Create name for prefixing classes and id's.
$slug = 'ingredients-hover';

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
<div class="<?php echo esc_attr( $_s_class_name ); ?>" id="<?php echo esc_attr( $_s_id ); ?>">
	<div class="ingredients-images">
		<div class="ingredients-images-backdrop"></div>
	<?php
	$i  = 0;
	$ii = 0;
	?>
		<?php if ( have_rows( 'ingredients_list' ) ) : ?>

			<?php while ( have_rows( 'ingredients_list' ) ) : ?>
				<?php the_row(); ?>
				<?php
				$ingredient_image = get_sub_field( 'ingredient_image' );
				if ( 0 === $i ) {
					$first_index_class = 'target-open';
				} else {
					$first_index_class = '';
				}

				?>
				<div
				class="ingredients-image <?php echo esc_attr( $first_index_class ); ?>"
				id="<?php echo esc_attr( $i ); ?>"
				style="background-image:url(<?php echo esc_url( $ingredient_image ); ?>);"></div>

				<?php $i++; ?>

			<?php endwhile; ?>
		<?php endif; ?>

	</div><!-- .ingredients-images -->

	<div class="ingredients-list">
		<div class="ingredients-list-title">Thermo-G™ Proprietary Blend</div>
		<?php if ( have_rows( 'ingredients_list' ) ) : ?>

			<?php while ( have_rows( 'ingredients_list' ) ) : ?>
				<?php the_row(); ?>
				<?php
				$ingredient_name = get_sub_field( 'ingredient_name' );
				if ( 0 === $ii ) {
					$first_index_class_ii = 'ingredients-name-active';
				} else {
					$first_index_class_ii = '';
				}
				?>
				<div
				class="ingredients-name <?php echo esc_attr( $first_index_class_ii ); ?>"
				data-target="<?php echo esc_attr( $ii ); ?>"><?php echo esc_html( $ingredient_name ); ?></div>

				<?php $ii++; ?>

			<?php endwhile; ?>
		<?php endif; ?>
	</div><!-- .ingredients-list -->

</div>
