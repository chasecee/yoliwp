<?php
include_once realpath(__DIR__ . '/..') . '/api/get-languages.php';
include_once realpath(__DIR__ . '/..') . '/api/get-countries.php';

$languages = get_languages();
$countries = get_countries();

/** If the rep's customer ID === 50, generic welcome message; otherwise, repsite banner. */
if ( isset($_COOKIE['Current_Rep'])) {
	$cookie = stripslashes($_COOKIE['Current_Rep']);
	$decoded = json_decode($cookie);

	$email = $decoded->email;
	$phone = $decoded->phone;
	$welcome_message = 'Welcome to the ' . $decoded->firstName . ' ' . $decoded->lastName . ' experience!';

} else {
	$welcome_message = 'Welcome to Yoli!';
}
?>
<div class="site-alert">
	<div class="container">

		<div class="grid grid-cols-12 h-60 items-center">
			<div class="col-span-3 flex justify-start">
				<div class="flex items-center mr-24">
					<span class=""><?php echo esc_html($email); ?> </span>
				</div>
				<div class="flex items-center mr-0">
					<span class=""><?php echo esc_html($phone); ?> </span>
				</div>
			</div>
			<div class="text-center col-span-6 ">
				<?php echo esc_html($welcome_message) ?>
			</div>
			<form class="col-span-3 flex justify-end" method="post">
				<div class="flex items-center ml-24">
					<select class="mr-5" name="sel_language" onchange="this.form.submit()">
						<?php
						while ( $row = $languages->fetch() ) {
							$slctd = $language === $row[0] ? 'selected' : '';
							echo '<option value="' . esc_attr($row[0]) . '"' . esc_attr($slctd) . ' >' . esc_html($row[1]) . '</option>';
						}
						?>
					</select>
				</div>
			</form>
			<form class="col-span-3 flex justify-end" method="post">
				<div class="flex items-center ml-24" >
					<select class="mr-5" name="sel_country" onchange="this.form.submit()">
						<?php
						while ( $row = $countries->fetch() ) {
							$slctd = $country === $row[0] ? 'selected' : '';
							echo '<option value="' . esc_attr($row[0]) . '"' . esc_attr($slctd) . ' >' . esc_html($row[1]) . '</option>';
						}
						?>
					</select>
				</div>
			</form>
		</div>
	</div>
</div>
