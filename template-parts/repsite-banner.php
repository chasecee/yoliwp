<?php
include_once realpath(__DIR__ . '/..') . '/api/get-languages.php';
include_once realpath(__DIR__ . '/..') . '/api/get-countries.php';

$languages = get_languages();
$countries = get_countries();

$email = null;
$phone = null;
$welcome_message = null;

echo 'The global rep on repsite-banner: ';
var_export($rep);
echo '<br><br>';

/** If the rep's customer ID === 50, generic welcome message; otherwise, repsite banner. */
if ($rep) {
	$email = $rep->email;
	$phone = $rep->phone;
	$welcome_message = 'Welcome to the ' . $rep->firstName . ' ' . $rep->lastName . ' experience!';

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
						<option selected="selected">Language</option>
						<?php
						foreach ( $languages as $key => $option) { ?>
							<option value="<?php echo $key ?>"><?php echo $option ?></option>
						<?php }	?>
					</select>
				</div>
			</form>
			<form class="col-span-3 flex justify-end" method="post">
				<div class="flex items-center ml-24" >
				<select class="mr-5" name="sel_country" onchange="this.form.submit()">
						<option selected="selected">Country</option>
						<?php
							foreach ( $countries as $key => $option) { ?>
								<option value="<?php echo $key ?>"><?php echo $option ?></option>
						<?php }	?>
					</select>
				</div>
			</form>
		</div>
	</div>
</div>
