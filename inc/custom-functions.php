<?php
/**
 * Custom functions added here
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package _s
 */

$var = 'var';

if ( function_exists( 'acf_add_options_page' ) ) {

	acf_add_options_page(
		array(
			'page_title' => 'Theme General Settings',
			'menu_title' => 'Theme Settings',
			'menu_slug'  => 'theme-general-settings',
			'capability' => 'edit_posts',
			'redirect'   => false,
		)
	);

}
/**
 * Load Product Field Choices.
 *
 * @param string $field The field.
 */
function acf_load_product_field_choices( $field ) {

	// reset choices.
	$field['choices'] = array();

	// get the textarea value from options page without any formatting.
	$choices = get_field( 'products', 'option', false );

	// explode the value so that each line is a new array piece.
	$choices = explode( "\n", $choices );

	// remove any unwanted white space.
	$choices = array_map( 'trim', $choices );

	// loop through array and add to field 'choices'.
	if ( is_array( $choices ) ) {

		foreach ( $choices as $choice ) {

			$field['choices'][ $choice ] = $choice;

		}
	}

	// return the field.
	return $field;

}

add_filter( 'acf/load_field/name=products_select', 'acf_load_product_field_choices' );
