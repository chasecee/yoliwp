import Glide from '@glidejs/glide';

// Make sure everything is loaded first.
if (
	( 'complete' === document.readyState ||
		'loading' !== document.readyState ) &&
	! document.documentElement.doScroll
) {
	GlideLoad();
} else {
	document.addEventListener( 'DOMContentLoaded', GlideLoad );
}

function GlideLoad() {
	const elm = document.getElementById( 'glideInit' );
	if ( elm ) {
		new Glide( '.glide' ).mount();
	}
}
