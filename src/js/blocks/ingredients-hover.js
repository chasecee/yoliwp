/**
 * File ingredients-hover.js
 *
 * Deal with multiple modals and their media.
 */

// Make sure everything is loaded first.
if (
	( 'complete' === document.readyState ||
		'loading' !== document.readyState ) &&
	! document.documentElement.doScroll
) {
	IngredientsHover();
} else {
	document.addEventListener( 'DOMContentLoaded', IngredientsHover );
}

/**
 * Fire off our modal functions.
 *
 * @since January 31, 2020
 * @author Corey Collins
 */
function IngredientsHover() {
	const triggers = document.querySelectorAll( '.ingredients-name' );

	triggers.forEach( ( trigger ) => {
		trigger.addEventListener( 'mouseover', mOver );
	} );

	// pageBody.classList.add( 'product-menu-active' );

	function mOver( event ) {
		const images = document.querySelectorAll( '.ingredients-image' );

		images.forEach( ( image ) => {
			image.classList.remove( 'target-open' );
		} );

		const el = event.target,
			thisEl = el.getAttribute( 'data-target' ),
			thisTarget = document.getElementById( thisEl );

		thisTarget.classList.add( 'target-open' );
	}

	// function mOut() {
	// 	pageBody.classList.remove( 'product-menu-active' );
	// }
}
