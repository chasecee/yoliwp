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
$slug = 'home-intro';

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
$pretitle    = get_field( 'pretitle' );
$intro_title = get_field( 'intro_title' );
$intro_text  = get_field( 'intro_text' );
?>
<div class="<?php echo esc_attr( $_s_class_name ); ?>" id="<?php echo esc_attr( $_s_id ); ?>">

	<div class="intro">
		<div class="intro-left">
			<div class="intro-image intro-left-a"><img  src="<?php echo esc_attr( get_template_directory_uri() ) . '/build/images/homepage/intro-left-a.jpg'; ?>"></div>
			<div class="intro-image intro-left-b"><img  src="<?php echo esc_attr( get_template_directory_uri() ) . '/build/images/homepage/intro-left-b.jpg'; ?>"></div>
		</div>
		<div class="intro-content">
			<div class="intro-content-inner">

				<h2>
					<span>
						<?php if ( $pretitle ) : ?>
							<?php echo esc_html( $pretitle ); ?>
					<?php endif; ?>
					</span>
					<?php if ( $intro_title ) : ?>
						<?php echo esc_html( $intro_title ); ?>
					<?php endif; ?>
				</h2>
				<?php if ( $intro_text ) : ?>
					<p>
						<?php echo esc_html( $intro_text ); ?>
					</p>
				<?php endif; ?>

			</div>
		</div>
		<div class="intro-right">
			<div class="intro-image intro-right-a"><img  src="<?php echo esc_attr( get_template_directory_uri() ) . '/build/images/homepage/intro-right-a.jpg'; ?>"></div>
			<div class="intro-image intro-right-b"><img  src="<?php echo esc_attr( get_template_directory_uri() ) . '/build/images/homepage/intro-right-b.jpg'; ?>"></div>
		</div>
	</div>

</div>
