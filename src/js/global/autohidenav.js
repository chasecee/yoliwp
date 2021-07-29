// eslint-disable-next-line valid-jsdoc
/**
 * Sticky Nav functionality
 *
 * @param {string} func    {string} url A string
 * @param {string} wait    {object} cool
 * @param {string} options
 * @function
 * @author Shannon MacMillan, Corey Collins
 * @return {number} true
 * @since May 4th, 2021
 */
function throttle( func, wait, options ) {
	let context, args, result;
	let timeout = null;
	let previous = 0;
	if ( ! options ) {
		options = {};
	}
	const later = function () {
		previous = false === options.leading ? 0 : Date.now();
		timeout = null;
		result = func.apply( context, args );
		if ( ! timeout ) {
			context = args = null;
		}
	};
	return function () {
		const now = Date.now();
		if ( ! previous && false === options.leading ) {
			previous = now;
		}
		const remaining = wait - ( now - previous );
		context = this;
		args = arguments;
		if ( 0 >= remaining || remaining > wait ) {
			if ( timeout ) {
				clearTimeout( timeout );
				timeout = null;
			}
			previous = now;
			result = func.apply( context, args );
			if ( ! timeout ) {
				context = args = null;
			}
		} else if ( ! timeout && false !== options.trailing ) {
			timeout = setTimeout( later, remaining );
		}
		return result;
	};
}

let lastScrollTop = 0;
const scrollEl = document.querySelector( 'body' );

function checkScrollDirection() {
	const st = window.pageYOffset || document.documentElement.scrollTop; // Credits: "https://github.com/qeremy/so/blob/master/so.dom.js#L426"
	if ( st > lastScrollTop ) {
		// downscroll code
		scrollEl.classList.add( 'scroll-down' );
	} else {
		// upscroll code
		scrollEl.classList.remove( 'scroll-down' );
	}
	lastScrollTop = st;
}

window.addEventListener( 'scroll', throttle( checkScrollDirection, 300 ) );
