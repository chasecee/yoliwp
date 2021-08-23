import SlideMenu from '@grubersjoe/slide-menu/dist/slide-menu.js';
// Make sure everything is loaded first.
if (
	( 'complete' === document.readyState ||
		'loading' !== document.readyState ) &&
	! document.documentElement.doScroll
) {
	slideInit();
} else {
	document.addEventListener( 'DOMContentLoaded', slideInit );
}

function slideInit() {
	// const menuElement = document.getElementById( 'slide-menu' );
	// const menu = new SlideMenu( menuElement );
	// menu.close();
}
document.addEventListener( 'DOMContentLoaded', function () {
	/* eslint-disable no-unused-vars */
	const menuElement = document.getElementById( 'example-menu' );
	const menu = new SlideMenu( menuElement );

	// ... later
	menu.open();
	/* eslint-enable no-unused-vars */
} );
