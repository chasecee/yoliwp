/**
 * File window-ready.js
 *
 * Add a "ready" class to <body> when window is ready.
 *
 * @author Greg Rickaby, Corey Collins
 * @since January 31, 2020
 */
if (
	( 'complete' === document.readyState ||
		'loading' !== document.readyState ) &&
	! document.documentElement.doScroll
) {
	screenWidthChange();
} else {
	document.addEventListener( 'DOMContentLoaded', screenWidthChange );
}

function detectScreenAndChange() {
	const pxGuide = document.querySelector( '.px-guide' );
	if ( pxGuide ) {
		pxGuide.innerHTML = vw;

		const vw = Math.max(
			document.documentElement.clientWidth || 0,
			window.innerWidth || 0
		);
	}
}
function screenWidthChange() {
	window.addEventListener(
		'resize',
		function () {
			detectScreenAndChange();
		},
		true
	);
	detectScreenAndChange();
}
