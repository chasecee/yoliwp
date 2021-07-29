/**
 * File: sub-menu.js
 *
 * Helpers for the primary navigation.
 */

// Make sure everything is loaded first.
if (
	( 'complete' === document.readyState ||
		'loading' !== document.readyState ) &&
	! document.documentElement.doScroll
) {
	subMenu();
} else {
	document.addEventListener( 'DOMContentLoaded', subMenu );
}

function subMenu() {
	const trigger = document.querySelector( '.products-trigger a' ),
		target = document.querySelector( '.product-menu' ),
		pageBody = document.body;
	trigger.addEventListener( 'mouseover', mOver, false );
	trigger.addEventListener( 'mouseout', mOut, false );
	target.addEventListener( 'mouseover', mOver, false );
	target.addEventListener( 'mouseout', mOut, false );

	// pageBody.classList.add( 'product-menu-active' );

	function mOver() {
		pageBody.classList.add( 'product-menu-active' );
	}

	function mOut() {
		pageBody.classList.remove( 'product-menu-active' );
	}
}
