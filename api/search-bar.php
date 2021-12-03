
<script>
	const handleSubmit = event => event.preventDefault();

	const handleSearch = (event) => {
	const query = event.target.value;
	if(query)	window.location.href = `<?php esc_attr( $home ); ?>/search-results/?query=${query}`;
	}
</script>
<form class="search-form" onsubmit=handleSubmit(event)>
	<span class="screen-reader-text">
		<?php esc_html_e( 'To search this site, enter a search term', '_s' ); ?>
	</span>
	<input
		tabindex="1"
		onchange=handleSearch(event)
		class="search-field"
		id="search-field"
		type="text"
		value=""
		autocomplete="off"
		aria-required="false"
		placeholder="Search Yoli.com"
		style="background-color:transparent;"
	/>
	<button type="submit">
		<img class="magnifying-glass" src="<?php echo esc_attr( get_template_directory_uri() ); ?>/src/images/icons/inline/inline-magnifying-glass.svg" alt="magnifying-glass icon" />
	</button>
</form>
