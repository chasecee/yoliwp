<?php
/**
 * _s functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package _s
 */

/**
 * Get all the include files for the theme.
 *
 * @author WebDevStudios
 */
function _s_get_theme_include_files() {
	return [
		'inc/custom-functions.php', // Custom template tags for this theme.
		'inc/setup.php', // Theme set up. Should be included first.
		'inc/compat.php', // Backwards Compatibility.
		'inc/customizer/customizer.php', // Customizer additions.
		'inc/extras.php', // Custom functions that act independently of the theme templates.
		'inc/hooks.php', // Load custom filters and hooks.
		'inc/security.php', // WordPress hardening.
		'inc/scaffolding.php', // Scaffolding.
		'inc/scripts.php', // Load styles and scripts.
		'inc/template-tags.php', // Custom template tags for this theme.
		'inc/class-ea-block-area.php', // Custom Block Areas by Bill Erickson.
		'inc/blocks/blocks.php', // Custom Blocks by Chase.
	];
}

foreach ( _s_get_theme_include_files() as $include ) {
	require trailingslashit( get_template_directory() ) . $include;
}

/** Render the repsite banner. */
function render_repsite_banner() {
	include_once realpath( __DIR__ ) . '/api/get-url.php';
	include_once realpath( __DIR__ ) . '/api/repsite-validation.php';
	include_once realpath( __DIR__ ) . '/api/set-lang-country.php';

	$path = get_url();
	$rep  = web_alias( $path );

	if ( isset( $_POST ) ) {
		set_language_and_country( $_POST );
	}
}
// add_action( 'init', 'render_repsite_banner' );

// function wpml_get_code( $lang = "" ) {

//     $langs = icl_get_languages( 'skip_missing=0' );
//     if( isset( $langs[$lang]['default_locale'] ) ) {
//         return $langs[$lang]['default_locale'];
//     }

//     return false;
// }
