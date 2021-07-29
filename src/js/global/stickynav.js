/**
 * Sticky Nav functionality
 *
 * @since January 31, 2020
 * @author Shannon MacMillan, Corey Collins
 */
const headerEl = document.querySelector( 'body' );
const sentinalEl = document.querySelector( '.guide' );

const handler = ( entries ) => {
	//console.log(entries);

	// entries is an array of observed dom nodes
	// we're only interested in the first one at [0]
	// because that's our .sentinal node.
	// Here observe whether or not that node is in the viewport
	if ( ! entries[ 0 ].isIntersecting ) {
		headerEl.classList.add( 'sticky-enabled' );
	} else {
		headerEl.classList.remove( 'sticky-enabled' );
	}
};

// create the observer
const observer = new window.IntersectionObserver( handler );

// give the observer some dom nodes to keep an eye on
observer.observe( sentinalEl );
