// import Glide from '@glidejs/glide/dist/glide.modular.esm';
import Glide from '@glidejs/glide';
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
	const sliders = document.querySelectorAll( '.glide' );
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
}
