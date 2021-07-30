<?php
/**
 * Block block
 *
 * @package      Doxy.me
 * @author       Chase Christensen
 * @since        1.0.0
 * @license      GPL-2.0+
 **/

/**
 * Register Blocks
 *
 * @link https://www.billerickson.net/building-gutenberg-block-acf/#register-block
 */
function be_register_blocks() {

	if ( ! function_exists( 'acf_register_block_type' ) ) {
		return;
	}

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

}
add_action( 'acf/init', 'be_register_blocks' );
