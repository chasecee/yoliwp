/**
 * Sticky Nav functionality
 *
 * @since January 31, 2020
 * @author Shannon MacMillan, Corey Collins
 */
// Make sure everything is loaded first.
if (
	( 'complete' === document.readyState ||
		'loading' !== document.readyState ) &&
	! document.documentElement.doScroll
) {
	stickyNav();
} else {
	document.addEventListener( 'DOMContentLoaded', stickyNav );
}

function stickyNav() {
	const headerEl = document.querySelector( '.js-site-header' ),
		sentinalEl = document.querySelector( '.guide' ),
		headerSpacer = document.querySelector( '.header-spacer' );

	const handler = ( entries ) => {
		//console.log(entries);

		// entries is an array of observed dom nodes
		// we're only interested in the first one at [0]
		// because that's our .sentinal node.
		// Here observe whether or not that node is in the viewport
		if ( ! entries[ 0 ].isIntersecting ) {
			headerEl.classList.add( 'sticky-enabled' );
			headerSpacer.classList.add( 'sticky-enabled-header' );
		} else {
			headerEl.classList.remove( 'sticky-enabled' );
			headerSpacer.classList.remove( 'sticky-enabled-header' );
		}
	};

	// create the observer
	const observer = new window.IntersectionObserver( handler );

	// give the observer some dom nodes to keep an eye on
	observer.observe( sentinalEl );
}
