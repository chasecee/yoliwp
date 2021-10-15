// import Glide from '@glidejs/glide/dist/glide.modular.esm';
import Glide from '@glidejs/glide';
import { Breakpoints } from '@glidejs/glide/dist/glide.modular.esm';

// Make sure everything is loaded first.
if (
	( 'complete' === document.readyState ||
		'loading' !== document.readyState ) &&
	! document.documentElement.doScroll
) {
	glideInit();
} else {
	document.addEventListener( 'DOMContentLoaded', glideInit );
}

function glideInit() {
	const sliders = document.querySelectorAll( '.product-carousel>.glide' );
	const conf = {
		type: 'carousel',
		animationDuration: 500,
		gap: 0,
	};

	if ( sliders ) {
		sliders.forEach( ( slider ) => {
			const activeBullet = 'glide__bullet--active';
			const bulletsContainerElement = slider.querySelector(
				'.glide__bullets'
			);

			const changeActiveBullet = ( newIndex, containerElement ) => {
				const glideDir = containerElement.querySelector(
					`[data-glide-dir="=${ newIndex }"]`
				);

				containerElement
					.querySelector( `.${ activeBullet }` )
					.classList.remove( activeBullet );

				if ( glideDir ) glideDir.classList.add( activeBullet );
			};

			const glide = new Glide( slider, conf ).mount();

			glide.on( 'run', () => {
				requestAnimationFrame( () =>
					changeActiveBullet( glide.index, bulletsContainerElement )
				);
			} );
		} ); // end foreach slider
	}
	// for carousels with a focus in the center
	const recipeSliders = document.querySelectorAll( '.focus-carousel>.glide' );

	if ( recipeSliders ) {
		recipeSliders.forEach( ( slider ) => {
			const dataPerView = slider.dataset.perView;
			const datastaticOnDesktop = slider.dataset.staticOnDesktop;

			const columnSlidersconf = {
				type: 'slider',

				bound: true,
				rewind: false,
				startAt: 1,
				perView: dataPerView,
				swipeThreshold: datastaticOnDesktop,
				dragThreshold: datastaticOnDesktop,
				focusAt: 'center',
				gap: 10,
				keyboard: false,

				breakpoints: {
					767: {
						perView: 1,
						swipeThreshold: 100,
						dragThreshold: 100,
						focusAt: 'center',
						peek: 50,
						gap: 0,
						keyboard: true,
						startAt: 0,
					},
				},
			};
			/* eslint-disable no-console */
			console.log( columnSlidersconf );
			/* eslint-enable no-console */
			const glide = new Glide( slider, columnSlidersconf );
			glide.mount( { Breakpoints } );
		} ); // end foreach slider
	}

	// for carousels with equal cols
	const columnSliders = document.querySelectorAll(
		'.column-carousel>.glide'
	);

	if ( columnSliders ) {
		columnSliders.forEach( ( slider ) => {
			const dataPerView = slider.dataset.perView;
			const dataGapDesktop = slider.dataset.gapDesktop;
			const columnSlidersconf = {
				type: 'slider',

				bound: true,
				rewind: false,
				startAt: 0,
				perView: dataPerView,
				gap: dataGapDesktop,

				breakpoints: {
					767: {
						perView: 1,
						swipeThreshold: 100,
						dragThreshold: 100,
						focusAt: 'center',
						peek: 40,
						gap: 20,
						keyboard: true,
					},
				},
			};
			const glide = new Glide( slider, columnSlidersconf );
			glide.mount( { Breakpoints } );
		} ); // end foreach slider
	}
	// for carousels with equal cols
	const beforeAfterSliders = document.querySelectorAll(
		'.before-after-carousel>.glide'
	);

	if ( beforeAfterSliders ) {
		beforeAfterSliders.forEach( ( slider ) => {
			const columnSlidersconf = {
				type: 'slider',

				bound: true,
				rewind: false,
				startAt: 0,
				perView: 1,
				gap: 60,
			};
			const glide = new Glide( slider, columnSlidersconf ).mount();

			const forward = document.querySelector( '#direction-right' );
			forward.addEventListener( 'click', function () {
				glide.go( '>' );
			} );
		} ); // end foreach slider
	}
}
