<?php
/**
 * Block block
 *
 * @package      _s
 * @author       Chase Christensen
 * @since        1.0.0
 * @license      GPL-2.0+
 **/

/**
 * Register Blockss
 *
 * @link https://www.billerickson.net/building-gutenberg-block-acf/#register-block
 */
function be_register_blocks() {

	if ( ! function_exists( 'acf_register_block_type' ) ) {
		return;
	}
		// ingredients hover.
		acf_register_block_type(
			array(
				'name'            => 'ingredients-hover',
				'title'           => __( 'Ingredients Hover', '_s' ),
				'render_template' => '/inc/blocks/block-ingredients-hover.php',
				'category'        => 'formatting',
				'icon'            => 'superhero-alt',
				'mode'            => 'preview',
				'align'           => 'full',
				'keywords'        => array( 'column', 'container', 'full', 'fullwidth' ),
				'supports'        => array(
					'align'           => true,
					'anchor'          => true,
					'customClassName' => true,
					'jsx'             => true,
				),
			)
		);
		// testimonial bubble.
		acf_register_block_type(
			array(
				'name'            => 'testimonial-bubble',
				'title'           => __( 'Testimonial Bubble', '_s' ),
				'render_template' => '/inc/blocks/block-testimonial-bubble.php',
				'category'        => 'formatting',
				'icon'            => 'superhero-alt',
				'mode'            => 'preview',
				'align'           => 'full',
				'keywords'        => array( 'column', 'container', 'full', 'fullwidth' ),
				'supports'        => array(
					'anchor'          => true,
					'customClassName' => true,
					'jsx'             => true,
				),
			)
		);
		// section title.
		acf_register_block_type(
			array(
				'name'            => 'section-title',
				'title'           => __( 'Section Title', '_s' ),
				'render_template' => '/inc/blocks/block-section-title.php',
				'category'        => 'formatting',
				'icon'            => 'superhero-alt',
				'mode'            => 'preview',
				'align'           => 'full',
				'keywords'        => array( 'column', 'container', 'full', 'fullwidth' ),
				'supports'        => array(
					'align'           => true,
					'anchor'          => true,
					'customClassName' => true,
					'jsx'             => true,
				),
			)
		);
		// section-info-video.
		acf_register_block_type(
			array(
				'name'            => 'section-info-video',
				'title'           => __( 'Section Info Video', '_s' ),
				'render_template' => '/inc/blocks/block-section-info-video.php',
				'category'        => 'formatting',
				'icon'            => 'superhero-alt',
				'mode'            => 'preview',
				'align'           => 'full',
				'keywords'        => array( 'column', 'container', 'full', 'fullwidth' ),
				'supports'        => array(
					'align'           => true,
					'anchor'          => true,
					'customClassName' => true,
					'jsx'             => true,
				),
			)
		);
		// section-cards.
		acf_register_block_type(
			array(
				'name'            => 'section-cards',
				'title'           => __( 'Section Cards', '_s' ),
				'render_template' => '/inc/blocks/block-section-cards.php',
				'category'        => 'formatting',
				'icon'            => 'superhero-alt',
				'mode'            => 'preview',
				'keywords'        => array( 'column', 'container', 'full', 'fullwidth' ),
				'supports'        => array(
					'anchor'          => true,
					'customClassName' => true,
					'jsx'             => true,
				),
			)
		);
		// section-title-bars.
		acf_register_block_type(
			array(
				'name'            => 'section-title-bars',
				'title'           => __( 'Section Title Bars', '_s' ),
				'render_template' => '/inc/blocks/block-section-title-bars.php',
				'category'        => 'formatting',
				'icon'            => 'superhero-alt',
				'mode'            => 'preview',
				'keywords'        => array( 'column', 'container', 'full', 'fullwidth' ),
				'supports'        => array(
					'anchor'          => true,
					'customClassName' => true,
					'jsx'             => true,
				),
			)
		);
		// section-kit-slider.
		acf_register_block_type(
			array(
				'name'            => 'section-kit-slider',
				'title'           => __( 'Section Kit Slider', '_s' ),
				'render_template' => '/inc/blocks/block-section-kit-slider.php',
				'category'        => 'formatting',
				'icon'            => 'superhero-alt',
				'mode'            => 'preview',
				'keywords'        => array( 'column', 'container', 'full', 'fullwidth' ),
				'supports'        => array(
					'anchor'          => true,
					'customClassName' => true,
					'jsx'             => true,
				),
			)
		);
		// section-before-after-slider.
		acf_register_block_type(
			array(
				'name'            => 'section-before-after-slider',
				'title'           => __( 'Section Before After Slider', '_s' ),
				'render_template' => '/inc/blocks/block-section-before-after-slider.php',
				'category'        => 'formatting',
				'icon'            => 'superhero-alt',
				'mode'            => 'preview',
				'keywords'        => array( 'column', 'container', 'full', 'fullwidth' ),
				'supports'        => array(
					'anchor'          => true,
					'customClassName' => true,
					'jsx'             => true,
				),
			)
		);
		// product-cta.
		acf_register_block_type(
			array(
				'name'            => 'product-cta',
				'title'           => __( 'Product Cta', '_s' ),
				'render_template' => '/inc/blocks/block-product-cta.php',
				'category'        => 'formatting',
				'icon'            => 'superhero-alt',
				'mode'            => 'preview',
				'keywords'        => array( 'column', 'container', 'full', 'fullwidth' ),
				'supports'        => array(
					'anchor'          => true,
					'customClassName' => true,
					'jsx'             => true,
				),
			)
		);
		// section-big-cta.
		acf_register_block_type(
			array(
				'name'            => 'section-big-cta',
				'title'           => __( 'Section Big Cta', '_s' ),
				'render_template' => '/inc/blocks/block-section-big-cta.php',
				'category'        => 'formatting',
				'icon'            => 'superhero-alt',
				'mode'            => 'preview',
				'keywords'        => array( 'column', 'container', 'full', 'fullwidth' ),
				'supports'        => array(
					'anchor'          => true,
					'customClassName' => true,
					'jsx'             => true,
				),
			)
		);
		// section-hero.
		acf_register_block_type(
			array(
				'name'            => 'section-hero',
				'title'           => __( 'Section Hero', '_s' ),
				'render_template' => '/inc/blocks/block-section-hero.php',
				'category'        => 'formatting',
				'icon'            => 'superhero-alt',
				'mode'            => 'preview',
				'keywords'        => array( 'column', 'container', 'full', 'fullwidth' ),
				'supports'        => array(
					'anchor'          => true,
					'customClassName' => true,
					'jsx'             => true,
				),
			)
		);

}
add_action( 'acf/init', 'be_register_blocks' );
