<?php
/**
 * Section cards
 *
 * @package      _s
 * @author       Chase Christensen
 * @since        1.0.0
 * @license      GPL-2.0+
 **/

// Create name for prefixing classes and id's.
$slug = 'section-cards';

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
$repeater = get_field( 'cards' );
$last_row = end( $repeater );

?>

<div class="<?php echo esc_attr( $_s_class_name ); ?>" id="<?php echo esc_attr( $_s_id ); ?>">

	<div class="cards-container">
		<div class="cards ">
			<div class="card card-first">
				<!-- <div class="card-inner" style="background-image:url(
				<?php
				echo esc_url(
					$last_row['card_image']
				);
				?>
				);">
					<div class="card-gradient"></div>
				</div> -->
			</div>
			<?php if ( have_rows( 'cards' ) ) : ?>
				<?php
				while ( have_rows( 'cards' ) ) :
					the_row();
					?>
					<?php
					$card_title = get_sub_field( 'card_title' );
					$card_text  = get_sub_field( 'card_text' );
					$card_image = get_sub_field( 'card_image' );
					?>
					<div class="card">
						<div class="card-inner" style="background-image:url(<?php echo esc_url( $card_image ); ?>);">
							<div class="card-gradient"></div>
							<div class="card-content">

								<?php if ( $card_title ) : ?>
									<h3 class="card-content-title">
										<?php echo esc_html( $card_title ); ?>
									</h3>
								<?php endif; ?>

								<?php if ( $card_text ) : ?>
									<p class="card-content-p">
										<?php echo esc_html( $card_text ); ?>
									</p>
								<?php endif; ?>
							</div>
						</div>
					</div>

				<?php endwhile; ?>
			<?php endif; ?>
			<div class="card card-last"></div>
		</div>
	</div>

</div>
