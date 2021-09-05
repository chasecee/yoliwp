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

}
add_action( 'acf/init', 'be_register_blocks' );
