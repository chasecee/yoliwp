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
$slug = 'video-player';

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
$cover_image = get_field( 'cover_image' );
$size        = 'full';

$aspect_ratio = get_field( 'aspect_ratio' );
if ( 'short' === $aspect_ratio ) {
	$aspect_ratio_class = 'aspect-short';
} else {
	$aspect_ratio_class = 'aspect-default';
}

$style = get_field( 'style' );

$vimeo_id         = get_field( 'vimeo_id' );
$vimeo_url_prefix = 'https://player.vimeo.com/video/';
if ( ! $vimeo_id ) {
	$vimeo_id = '582695017';
}
$video_combined_link = $vimeo_url_prefix . $vimeo_id . '?autoplay=1&byline=1&title=1?controls=1&autopause=0';
?>

<div class="<?php echo esc_attr( $_s_class_name ); ?> <?php echo esc_attr( $aspect_ratio_class ); ?> <?php echo esc_attr( $style ); ?>" id="<?php echo esc_attr( $_s_id ); ?>">


			<div class="video-player-cover">
				<?php
				if ( $cover_image ) {
					$url = wp_get_attachment_url( $cover_image );
					echo wp_get_attachment_image( $cover_image, $size );
				};
				?>
				<div class="video-player-gradient"></div>
				<?php get_template_part( '/src/images/icons/inline/inline', 'play.svg' ); ?>
			</div>

			<iframe class="js-iframe" src="" data-source="<?php echo esc_url( $video_combined_link ); ?>"
			frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>



</div>
