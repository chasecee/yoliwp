import MmenuLight from 'mmenu-light/src/mmenu-light.js';
// Make sure everything is loaded first.
if (
	( 'complete' === document.readyState ||
		'loading' !== document.readyState ) &&
	! document.documentElement.doScroll
) {
	mmenuInit();
} else {
	document.addEventListener( 'DOMContentLoaded', mmenuInit );
}

function mmenuInit() {
	const menu = new MmenuLight(
		document.querySelector( '#off-canvas-container' ),
		'(max-width: 1600px)'
	);
	/* eslint-disable no-unused-vars */
	const navigator = menu.navigation( {
		// options
	} );
	/* eslint-enable no-unused-vars */
	// navigator.openPanel( document.querySelector( '#my-ul' ) );
	const drawer = menu.offcanvas( {
		position: 'right',
	} );
	document
		.querySelector( 'a[href="#off-canvas-menu"]' )
		.addEventListener( 'click', ( evnt ) => {
			evnt.preventDefault();
			drawer.open();
		} );
	document
		.querySelector( '.off-canvas-close' )
		.addEventListener( 'click', ( evnt ) => {
			evnt.preventDefault();
			drawer.close();
		} );
	const menuEl = document.getElementById( 'site-mobile-menu' );
	if ( menuEl ) {
		document
			.querySelectorAll( '.menu-item-has-children>a' )
			.forEach( function ( childElement ) {
				childElement.addEventListener( 'click', ( evnt ) => {
					evnt.preventDefault();
				} );
			} );
	}
}
