<?php
/**
 * Action hooks and filters.
 *
 * A place to put hooks and filters that aren't necessarily template tags.
 *
 * @package _s
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @author WebDevStudios
 *
 * @param array $classes Classes for the body element.
 *
 * @return array Body classes.
 */
function _s_body_classes( $classes ) {
	// Allows for incorrect snake case like is_IE to be used without throwing errors.
	global $is_IE, $is_edge, $is_safari;

	// If it's IE, add a class.
	if ( $is_IE ) {
		$classes[] = 'ie';
	}

	// If it's Edge, add a class.
	if ( $is_edge ) {
		$classes[] = 'edge';
	}

	// If it's Safari, add a class.
	if ( $is_safari ) {
		$classes[] = 'safari';
	}

	// Are we on mobile?
	if ( wp_is_mobile() ) {
		$classes[] = 'mobile';
	}

	// Give all pages a unique class.
	if ( is_page() ) {
		$classes[] = 'page-' . basename( get_permalink() );
	}

	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	// Adds a class of group-blog to blogs with more than 1 published author.
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}

	// Adds "no-js" class. If JS is enabled, this will be replaced (by javascript) to "js".
	$classes[] = 'no-js';

	// Add a cleaner class for the scaffolding page template.
	if ( is_page_template( 'template-scaffolding.php' ) ) {
		$classes[] = 'template-scaffolding';
	}

	// Add a `has-sidebar` class if we're using the sidebar template.
	if ( is_page_template( 'template-sidebar-right.php' ) ) {
		$classes[] = 'has-sidebar';
	}

	return $classes;
}

add_filter( 'body_class', '_s_body_classes' );

/**
 * Flush out the transients used in _s_categorized_blog.
 *
 * @author WebDevStudios
 *
 * @return bool Whether or not transients were deleted.
 */
function _s_category_transient_flusher() {
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return false;
	}

	// Like, beat it. Dig?
	return delete_transient( '_s_categories' );
}

add_action( 'delete_category', '_s_category_transient_flusher' );
add_action( 'save_post', '_s_category_transient_flusher' );

/**
 * Customize "Read More" string on <!-- more --> with the_content();
 *
 * @author WebDevStudios
 *
 * @return string Read more link.
 */
function _s_content_more_link() {
	return ' <a class="more-link" href="' . get_permalink() . '">' . esc_html__( 'Read More', '_s' ) . '...</a>';
}

add_filter( 'the_content_more_link', '_s_content_more_link' );

/**
 * Customize the [...] on the_excerpt();
 *
 * @author WebDevStudios
 *
 * @param string $more The current $more string.
 *
 * @return string Read more link.
 */
function _s_excerpt_more( $more ) {
	return sprintf( ' <a class="more-link" href="%1$s">%2$s</a>', get_permalink( get_the_ID() ), esc_html__( 'Read more...', '_s' ) );
}

add_filter( 'excerpt_more', '_s_excerpt_more' );

/**
 * Filters WYSIWYG content with the_content filter.
 *
 * @author Jo Murgel
 *
 * @param string $content content dump from WYSIWYG.
 *
 * @return string|bool Content string if content exists, else empty.
 */
function _s_get_the_content( $content ) {
	return ! empty( $content ) ? $content : false;
}

add_filter( 'the_content', '_s_get_the_content', 20 );

/**
 * Enable custom mime types.
 *
 * @author WebDevStudios
 *
 * @param array $mimes Current allowed mime types.
 *
 * @return array Mime types.
 */
function _s_custom_mime_types( $mimes ) {
	$mimes['svg']  = 'image/svg+xml';
	$mimes['svgz'] = 'image/svg+xml';

	return $mimes;
}

add_filter( 'upload_mimes', '_s_custom_mime_types' );

/**
 * Add SVG definitions to footer.
 *
 * @author WebDevStudios
 */
function _s_include_svg_icons() {
	// Define SVG sprite file.
	$svg_icons = get_template_directory() . '/build/images/icons/sprite.svg';

	// If it exists, include it.
	if ( file_exists( $svg_icons ) ) {
		echo '<div class="svg-sprite-wrapper">';
		require_once $svg_icons;
		echo '</div>';
	}
}

add_action( 'wp_footer', '_s_include_svg_icons', 9999 );

/**
 * Display the customizer header scripts.
 *
 * @author Greg Rickaby
 *
 * @return string Header scripts.
 */
function _s_display_customizer_header_scripts() {
	// Check for header scripts.
	$scripts = get_theme_mod( '_s_header_scripts' );

	// None? Bail...
	if ( ! $scripts ) {
		return false;
	}

	// Otherwise, echo the scripts!
	// phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- XSS OK.
	echo _s_get_the_content( $scripts );
}

add_action( 'wp_head', '_s_display_customizer_header_scripts', 999 );

/**
 * Display the customizer footer scripts.
 *
 * @author Greg Rickaby
 *
 * @return string Footer scripts.
 */
function _s_display_customizer_footer_scripts() {
	// Check for footer scripts.
	$scripts = get_theme_mod( '_s_footer_scripts' );

	// None? Bail...
	if ( ! $scripts ) {
		return false;
	}

	// Otherwise, echo the scripts!
	// phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- XSS OK.
	echo _s_get_the_content( $scripts );
}

add_action( 'wp_footer', '_s_display_customizer_footer_scripts', 999 );


/**
 * Removes or Adjusts the prefix on category archive page titles.
 *
 * @author Corey Collins
 *
 * @param string $block_title The default $block_title of the page.
 *
 * @return string The updated $block_title.
 */
function _s_remove_archive_title_prefix( $block_title ) {
	// Get the single category title with no prefix.
	$single_cat_title = single_term_title( '', false );

	if ( is_category() || is_tag() || is_tax() ) {
		return esc_html( $single_cat_title );
	}

	return $block_title;
}

add_filter( 'get_the_archive_title', '_s_remove_archive_title_prefix' );

/**
 * Disables wpautop to remove empty p tags in rendered Gutenberg blocks.
 *
 * @author Corey Collins
 */
function _s_disable_wpautop_for_gutenberg() {
	// If we have blocks in place, don't add wpautop.
	if ( has_filter( 'the_content', 'wpautop' ) && has_blocks() ) {
		remove_filter( 'the_content', 'wpautop' );
	}
}

add_filter( 'init', '_s_disable_wpautop_for_gutenberg', 9 );

/**
 * Function to filter svg code from wp editor.
 *
 * @author Corey Collins
 */
function get_kses_extended_ruleset() {
	$kses_defaults = wp_kses_allowed_html( 'post' );

	$svg_args = array(
		'defs'           => array(
			'class'           => true,
			'aria-hidden'     => true,
			'aria-labelledby' => true,
			'role'            => true,
			'xmlns'           => true,
			'width'           => true,
			'height'          => true,
			'viewbox'         => true, // <= Must be lower case!
		),
		'lineargradient' => array(
			'id'            => true,
			'x1'            => true,
			'x2'            => true,
			'y2'            => true,
			'gradientunits' => true,
			'width'         => true,

		),
		'rect'           => array(
			'id'        => true,
			'data-name' => true,
			'opacity'   => true,
			'transform' => true,
			'fill'      => true,
			'width'     => true,
			'height'    => true,
		),
		'stop'           => array(
			'offset'     => true,
			'stop-color' => true,

		),
		'svg'            => array(
			'class'           => true,
			'aria-hidden'     => true,
			'aria-labelledby' => true,
			'role'            => true,
			'xmlns'           => true,
			'width'           => true,
			'height'          => true,
			'viewbox'         => true, // <= Must be lower case!
		),
		'g'              => array(
			'fill'         => true,
			'transform'    => true,
			'stroke'       => true,
			'id'           => true,
			'stroke-width' => true,
		),
		'title'          => array( 'title' => true ),
		'path'           => array(
			'd'           => true,
			'fill'        => true,
			'transform'   => true,
			'stroke'      => true,
			'strokewidth' => true,
			'id'          => true,
			'fill-rule'   => true,
		),
		'circle'         => array(
			'd'         => true,
			'r'         => true,
			'fill'      => true,
			'transform' => true,
			'stroke'    => true,
			'cx'        => true,
			'cy'        => true,
			'id'        => true,
		),
		'line'           => array(
			'd'         => true,
			'r'         => true,
			'fill'      => true,
			'transform' => true,
			'stroke'    => true,
			'x2'        => true,
			'y2'        => true,
			'id'        => true,
		),
	);
	return array_merge( $kses_defaults, $svg_args );
}


/** Set the language and country cookies. */
function language_country_cookie() {
	if ( ! is_admin() ) {
		require realpath( __DIR__ . '/..' ) . '/api/set-lang-country.php';
	// phpcs:ignore
	if ( isset( $_POST ) ) {
			// phpcs:ignore
			set_language_and_country( $_POST );
		}
	}
}
add_action( 'init', 'language_country_cookie' );

/** Render the repsite banner. */
function render_repsite_banner() {
	if ( ! is_admin() ) {
		include_once realpath( __DIR__ . '/..' ) . '/api/get-url.php';

		$path = get_url();
	}
}
// Attempt to hook into 'wp_body_open' resulted in headers going out before the banner was run (on MS server, not on NGINX).
add_action( 'init', 'render_repsite_banner' );

// Show page templates in pages view in WP Admin.

add_filter( 'manage_pages_columns', 'codismo_table_columns', 10, 1 );
add_action( 'manage_pages_custom_column', 'codismo_table_column', 10, 2 );

/** Render the repsite banner.
 *
 * @param string $columns content dump from WYSIWYG.
 */
function codismo_table_columns( $columns ) {

	$custom_columns = array(
		'codismo_template' => 'Template',
	);

	$columns = array_merge( $columns, $custom_columns );

	return $columns;

}

/** Render the repsite banner.
 *
 * @param string $column content dump from WYSIWYG.
 * @param string $post_id content dump from WYSIWYG.
 */
function codismo_table_column( $column, $post_id ) {

	if ( 'codismo_template' === $column ) {
		echo esc_html( basename( get_page_template() ) );
	}

}

/** Hide dumb style tag bug in WP
 *
 * Link: https://wordpress.stackexchange.com/questions/289440/how-to-remove-custom-style-from-source
 */
add_filter( 'show_recent_comments_widget_style', '__return_false', 99 );

/** Hide dumb style tag bug in WP
 *
 * Link: https://divimundo.com/en/blog/copyright-year-wordpress-footer/
 */
function year_shortcode() {
	$year = date_i18n( 'Y' );
	return $year;
}
add_shortcode( 'year', 'year_shortcode' );

add_filter( 'acf/format_value/type=text', 'do_shortcode' );
