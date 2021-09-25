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
$slug = 'home-slider';

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

<div class="product-carousel">

	<div class="glide">
		<div class="glide__controls glide__bullets" data-glide-el="controls[nav]">
			<div data-glide-dir="=0">Vitality</div>
			<div data-glide-dir="=1">Mood</div>
			<div data-glide-dir="=2">Energy</div>
			<div data-glide-dir="=3">Balance</div>
			<div data-glide-dir="=4">Transformation</div>
		</div>
		<div class="glide__arrows" data-glide-el="controls">
			<div data-glide-dir="<">
				<div class="transform rotate-180">
					<?php get_template_part( '/src/images/icons/inline/inline', 'arrow-right.svg' ); ?>
				</div>
			</div>
			<div data-glide-dir=">">
				<?php get_template_part( '/src/images/icons/inline/inline', 'arrow-right.svg' ); ?>
			</div>
		</div>
		<div class="glide__track" data-glide-el="track">
			<ul class="glide__slides">

				<li class="glide__slide">
					<div class="slide-inner">
						<div class="slide-img">

							<img class="" src="<?php echo esc_attr( get_template_directory_uri() ) . '/build/images/slide-a.jpg'; ?>">
							<div class="slide-inner-gradient"></div>
							<div class="slide-inner-gradient gradient-bottom"></div>
						</div>
						<div class="slide-inner-content">
							<p class="slide-inner-content-title">Defend</p>
							<p class="slide-inner-content-p">Lorem ipsom dolor sit amet, diam conshctetuer adipiscing elit, sed diam lorem ipsum dolor sit amet, diam lorem ipsum dolor sit amet dolor.</p>
						</div>
					</div>
				</li>

				<li class="glide__slide">
					<div class="slide-inner">
						<div class="slide-img">
							<img class="" src="<?php echo esc_attr( get_template_directory_uri() ) . '/build/images/slide-b.jpg'; ?>">
							<div class="slide-inner-gradient"></div>
							<div class="slide-inner-gradient gradient-bottom"></div>
						</div>
						<div class="slide-inner-content">
							<p class="slide-inner-content-title">Shine</p>
							<p class="slide-inner-content-p">Lorem ipsom dolor sit amet, diam conshctetuer adipiscing elit, sed diam lorem ipsum dolor sit amet, diam lorem ipsum dolor sit amet dolor.</p>
						</div>
					</div>
				</li>

				<li class="glide__slide">
					<div class="slide-inner">
						<div class="slide-img">
							<img class="" src="<?php echo esc_attr( get_template_directory_uri() ) . '/build/images/slide-c.jpg'; ?>">
							<div class="slide-inner-gradient"></div>
							<div class="slide-inner-gradient gradient-bottom"></div>
						</div>
						<div class="slide-inner-content">
							<p class="slide-inner-content-title">Passion</p>
							<p class="slide-inner-content-p">Lorem ipsom dolor sit amet, diam conshctetuer adipiscing elit, sed diam lorem ipsum dolor sit amet, diam lorem ipsum dolor sit amet dolor.</p>
						</div>
					</div>
				</li>

				<li class="glide__slide">
					<div class="slide-inner">
						<div class="slide-img">
							<img class="" src="<?php echo esc_attr( get_template_directory_uri() ) . '/build/images/slide-d.jpg'; ?>">
							<div class="slide-inner-gradient"></div>
							<div class="slide-inner-gradient gradient-bottom"></div>
						</div>
						<div class="slide-inner-content">
							<p class="slide-inner-content-title">Alkalete</p>
							<p class="slide-inner-content-p">Lorem ipsom dolor sit amet, diam conshctetuer adipiscing elit, sed diam lorem ipsum dolor sit amet, diam lorem ipsum dolor sit amet dolor.</p>
						</div>
					</div>
				</li>

				<li class="glide__slide">
					<div class="slide-inner">
						<div class="slide-img">
							<img class="" src="<?php echo esc_attr( get_template_directory_uri() ) . '/build/images/slide-e.jpg'; ?>">
							<div class="slide-inner-gradient"></div>
							<div class="slide-inner-gradient gradient-bottom"></div>
						</div>
						<div class="slide-inner-content">
							<p class="slide-inner-content-title">Yes</p>
							<p class="slide-inner-content-p">Lorem ipsom dolor sit amet, diam conshctetuer adipiscing elit, sed diam lorem ipsum dolor sit amet, diam lorem ipsum dolor sit amet dolor.</p>
						</div>
					</div>
				</li>

			</ul>
		</div>
	</div>
	</div>

</div>
