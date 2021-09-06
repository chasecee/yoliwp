// Make sure everything is loaded first.
if (
	( 'complete' === document.readyState ||
		'loading' !== document.readyState ) &&
	! document.documentElement.doScroll
) {
	iframeInit();
} else {
	document.addEventListener( 'DOMContentLoaded', iframeInit );
}

function iframeInit() {
	const sectionVideos = document.querySelectorAll( '.section-info-a-video' );

	if ( sectionVideos ) {
		sectionVideos.forEach( ( section ) => {
			const iframeEl = section.querySelector( '.js-iframe' );
			const videoCover = section.querySelector(
				'.section-info-a-video-cover'
			);
			const dataSrc = iframeEl.dataset.source;

			videoCover.addEventListener( 'click', function () {
				section.classList.add( 'js-video-is-playing' );
				iframeEl.src = dataSrc;
			} );
		} );
	}
}
