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

	const recipeSliders = document.querySelectorAll(
		'.recipes-carousel>.glide'
	);

	if ( recipeSliders ) {
		recipeSliders.forEach( ( slider ) => {
			const dataPerView = slider.dataset.perView;
			const columnSlidersconf = {
				type: 'slider',

				bound: true,
				rewind: false,
				startAt: 1,
				perView: dataPerView,
				swipeThreshold: false,
				dragThreshold: false,
				focusAt: 'center',
				gap: 60,
				keyboard: false,

				breakpoints: {
					767: {
						perView: 1,
						swipeThreshold: 100,
						dragThreshold: 100,
						focusAt: 'center',
						peek: 100,
						gap: 0,
						keyboard: true,
					},
				},
			};
			const glide = new Glide( slider, columnSlidersconf );
			glide.mount( { Breakpoints } );
		} ); // end foreach slider
	}

	const columnSliders = document.querySelectorAll(
		'.column-carousel>.glide'
	);

	if ( columnSliders ) {
		columnSliders.forEach( ( slider ) => {
			const dataPerView = slider.dataset.perView;
			const columnSlidersconf = {
				type: 'slider',

				bound: true,
				rewind: false,
				startAt: 0,
				perView: dataPerView,
				gap: 60,

				breakpoints: {
					767: {
						perView: 1,
						swipeThreshold: 100,
						dragThreshold: 100,
						focusAt: 'center',
						peek: 80,
						gap: 20,
						keyboard: true,
					},
				},
			};
			const glide = new Glide( slider, columnSlidersconf );
			glide.mount( { Breakpoints } );
		} ); // end foreach slider
	}
}
