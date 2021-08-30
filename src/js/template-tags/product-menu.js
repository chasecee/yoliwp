// import hoverintent from './hoverintent';
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
		target = document.querySelector( '.js-product-menu' ),
		siteHeader = document.querySelector( '.js-site-header' );

	trigger.addEventListener( 'mouseover', mOver, false );
	trigger.addEventListener( 'mouseout', mOut, false );
	target.addEventListener( 'mouseover', mOver, false );
	target.addEventListener( 'mouseout', mOut, false );

	// siteHeader.classList.add( 'product-menu-active' );

	function mOver() {
		siteHeader.classList.add( 'product-menu-active' );
	}

	function mOut() {
		siteHeader.classList.remove( 'product-menu-active' );
	}

	function linkHover() {
		// const menuItems = document.getElementsByClassName( 'menu-item' );
		// let i;

		const headerEl = document.querySelector( '.site-header' );
		if ( headerEl ) {
			headerEl
				.querySelectorAll( '.menu-item' )
				.forEach( function ( childElement ) {
					childElement.addEventListener( 'mouseenter', mouseEnter );
					childElement.addEventListener( 'mouseleave', mouseLeave );
				} );
		}
		function mouseEnter() {
			this.classList.add( 'menu-item-active' );
			siteHeader.classList.add( 'menu-group-active' );
		}

		function mouseLeave() {
			this.classList.remove( 'menu-item-active' );
			siteHeader.classList.remove( 'menu-group-active' );
		}
		// for ( i = 0; i < menuItems.length; i++ ) {
		// 	menuItems[ i ].addEventListener( 'mouseenter', mouseEnter );
		// 	menuItems[ i ].addEventListener( 'mouseleave', mouseLeave );
		// }
	}
	linkHover();
}
