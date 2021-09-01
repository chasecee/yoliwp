/* eslint-disable no-nested-ternary */
import gsap from 'gsap';
import ScrollTrigger from 'gsap/ScrollTrigger';

// Make sure everything is loaded first.
if (
	( 'complete' === document.readyState ||
		'loading' !== document.readyState ) &&
	! document.documentElement.doScroll
) {
	gsapInit();
} else {
	document.addEventListener( 'DOMContentLoaded', gsapInit );
}

function gsapInit() {
	gsap.registerPlugin( ScrollTrigger );

	const sections = gsap.utils.toArray( '.card' );
	let maxWidth = 0;

	const getMaxWidth = () => {
		maxWidth = 0;
		sections.forEach( ( section ) => {
			maxWidth += section.offsetWidth;
		} );
	};
	getMaxWidth();
	ScrollTrigger.addEventListener( 'refreshInit', getMaxWidth );
	const container = '.cards-container';
	gsap.to( sections, {
		x: () => `-${ maxWidth - window.innerWidth }`,
		ease: 'none',
		scrollTrigger: {
			trigger: '.cards',
			pin: true,
			scrub: 0.25,
			markers: true,
			toggleClass: {
				targets: container,
				className: 'trigger-is-active',
			},
			end: () => `+=${ maxWidth }`,
			invalidateOnRefresh: true,
		},
	} );
	/* eslint-disable no-unused-vars */
	sections.forEach( ( sct, i ) => {
		ScrollTrigger.create( {
			trigger: sct,
			start: () =>
				'top top-=' +
				( sct.offsetLeft - window.innerWidth / 2 ) *
					( maxWidth / ( maxWidth - window.innerWidth ) ),
			end: () =>
				'+=' +
				sct.offsetWidth *
					( maxWidth / ( maxWidth - window.innerWidth ) ),
			toggleClass: { targets: sct, className: 'active' },
		} );
	} );

	const alsl = '';
	/* eslint-enable no-unused-vars */
}
/* eslint-enable no-nested-ternary */
