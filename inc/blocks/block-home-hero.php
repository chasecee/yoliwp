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
$slug = 'home-hero';

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
$hero_image    = get_field( 'hero_image' );
$size          = 'full';
$hero_title    = get_field( 'hero_title' );
$hero_subtitle = get_field( 'hero_subtitle' );
$video_id      = get_field( 'video_id' );
?>

<div class="<?php echo esc_attr( $_s_class_name ); ?>" id="<?php echo esc_attr( $_s_id ); ?>">

	<div class="hero">
		<div class="hero-gradient"></div>
		<div class="hero-gradient gradient-bottom"></div>
		<style>
			.hero-video{
				background-image:url(<?php echo esc_url( get_field( 'hero_image_mobile' ) ); ?>);
			}
			@media (min-width: 768px){
				.hero-video {
					background-image:url(<?php echo esc_url( get_field( 'hero_image' ) ); ?>);
				}
			}
		</style>

		<div class="hero-video" >
				<iframe src="https://player.vimeo.com/video/<?php echo esc_html( $video_id ); ?>?background=1&autoplay=1&loop=1&byline=0&title=0?controls=0"
						frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
		</div>

		<div class="hero-content">
					<?php if ( $hero_title ) : ?>
						<h1 class="hero-content-title">
							<?php echo esc_html( $hero_title ); ?>
						</h1>
					<?php endif; ?>

					<?php if ( $hero_subtitle ) : ?>
						<h2 class="hero-content-subtitle">
							<?php echo esc_html( $hero_subtitle ); ?>
						</h2>
					<?php endif; ?>
					<?php echo '<InnerBlocks />'; ?>
		</div>
	</div>

</div>
