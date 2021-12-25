<?php
	$home = ( isset( $_SERVER['HTTPS'] ) && 'on' === $_SERVER['HTTPS'] ?
									'https' : 'http' ) . '://' . $_SERVER['HTTP_HOST'];
	$url = $home . $_SERVER['REQUEST_URI'];
	$url_path = parse_url($url, PHP_URL_PATH);

	if ('/' === $url_path) : $placeholder_class = 'placeholder-home';
	else : $placeholder_class = 'placeholder-subpage';
endif;
?>

<script>
	function handleChange(event){
		const value = event.target.value;
		if (value.length >= 2) displayMagGlass();
		else hideMagGlass();
	}

	function handleClick(event) {
		const input = document.getElementById('search-field');
		input.setAttribute('value', ''); // Remove previous search term.
		hideMagGlass();
	}

	function handleSearchByReturn(event) {
		event.preventDefault();
    const children = event.target.children;
    const query = children[1].value;
		if (query && query.length >= 2) {
			if (query.includes('&') || query.includes('#')) {
				displayMagGlass();
				window.location.href = '<?php esc_attr( $home ); ?>/search-results/?query=Invalid Characters.';
			} else {
				displayMagGlass();
				window.location.href = `<?php esc_attr( $home ); ?>/search-results/?query=${query}`;
			}
		}
	}

	function handleSearchByClick(event) {
		event.preventDefault();
		const query = event.target.parentElement.children[1].value;
		if (query && query.length >= 2) {
			displayMagGlass();
			window.location.href = `<?php esc_attr( $home ); ?>/search-results/?query=${query}`;
		}
	}

	function hideMagGlass() {
		const icon = document.getElementById('magnifying-glass');
		const classes = icon.classList;
		classes.remove('magnifying-glass')
		classes.add('magnifying-glass-display-none');
	}

	function displayMagGlass() {
		const icon = document.getElementById('magnifying-glass');
		const classes = icon.classList;
		classes.remove('magnifying-glass-display-none');
		classes.add('magnifying-glass');
	}
	document.addEventListener('mousedown', event => {
		if (event.path[0] !== 'input#search-field.search-field')
		displayMagGlass();
	});
</script>

<style>
	.magnifying-glass-display-none path {
		visibility: hidden;
	}
	input.search-field.placeholder-home {
		color: white;
	}
	.header-hovered > .header-container > .nav-right > .navigation-menu > .search-form > .search-field {
		color: gray;
	}
	.placeholder-home::placeholder {
		color: white;
	}
	.placeholder-subpage::placeholder {
		color: gray;
	}
	@media all and (max-width: 500px) {
		input.placeholder-home::placeholder {
			color: gray;
		}
		input.search-field.placeholder-home {
		color: gray;
		border: 2px solid rgb(248,245,235);
		}
		input.search-field.placeholder-subpage {
			color: gray;
		}
}
</style>

<form class="search-form" onsubmit=handleSearchByReturn(event)>
	<span class="screen-reader-text">
		<?php esc_html_e( 'To search this site, enter a search term', '_s' ); ?>
	</span>
	<input
		tabindex="1"
		onclick=handleClick(event)
		oninput=handleChange(event)
		class="search-field <?php echo esc_attr( $placeholder_class ) ?>"
		id="search-field"
		type="text"
		value=""
		autocomplete="off"
		aria-required="false"
		placeholder="Search"
		style="background-color:transparent;"
	/>
<!-- Generator: Adobe Illustrator 19.0.0, SVG Export Plug-In . SVG Version: 6.00 Build 0)  -->
<svg onclick="handleSearchByClick(event)" class="magnifying-glass" id="magnifying-glass" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
width="25" height="25" viewBox="0 0 52.966 52.966" style="enable-background:new 0 0 52.966 52.966;" xml:space="preserve">
	<path d="M51.704,51.273L36.845,35.82c3.79-3.801,6.138-9.041,6.138-14.82c0-11.58-9.42-21-21-21s-21,9.42-21,21s9.42,21,21,21
		c5.083,0,9.748-1.817,13.384-4.832l14.895,15.491c0.196,0.205,0.458,0.307,0.721,0.307c0.25,0,0.499-0.093,0.693-0.279
		C52.074,52.304,52.086,51.671,51.704,51.273z M21.983,40c-10.477,0-19-8.523-19-19s8.523-19,19-19s19,8.523,19,19
		S32.459,40,21.983,40z" fill="currentColor" />
	<g>
	</g>
	<g>
	</g>
	<g>
	</g>
	<g>
	</g>
	<g>
	</g>
	<g>
	</g>
	<g>
	</g>
	<g>
	</g>
	<g>
	</g>
	<g>
	</g>
	<g>
	</g>
	<g>
	</g>
	<g>
	</g>
	<g>
	</g>
	<g>
	</g>
	</svg>
</form>
