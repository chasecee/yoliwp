<!--
<?php
// The repsite banner, conditionally displayed.
/**
 * The alert bar/experience bar for our theme.
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package _s
 */
?> -->

<?php
include_once dirname(__DIR__, 1) . '/web-alias/repsite-val.php';

echo '<script>console.log("In site-alert.php");</script>
';

// echo 'the $rep on site-alert: ';
// print_r($rep);
// echo '<br>';

// Connect to the db to access language and country options.
	$user = 'root'; // Mysql
	$password = 'password'; // Mysql Password
	$server = 'yoliwp.local'; // Mysql Host
	$database = 'yoli'; // Mysql Databse
	// PDO Connection string
	$db = new PDO("mysql:host=$server; dbname=$database", $user, $password);
	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	// For anything other than English, set the language cookie.
	if(isset($_POST['selLanguage'])) {
		$language = $_POST['selLanguage'];
		setcookie('Language', $language, time() + (86400 * 30), '/');
	} else {
		$language = 'EN';
	}

	// For anything other than the US, set the country cookie.
	if(isset($_POST['selCountry']) ) {
    $country = $_POST['selCountry'];
		setcookie('Country', $country, time() + (86400 * 30), '/');
  } else {
		$country = 'US';
	}

//Render the banner if rep->customerId !== 50; else, no banner and no cookie.
	// if($rep->customerId === 50) {
	// 	// Just render the home page (no banner at all?).
	// 	echo 'Back in site-alert, else statement: no cookie, corporphan. <br>';
	// 	return;
	// } else {
	// 	header('Location: http://yoliwp.local/');
	// 	exit();
	// }

$firstName = $rep->firstName;
$lastName = $rep->lastName;
$fullname = $firstName . ' ' . $lastName;
$email = $rep->email;
$phone = $rep->phone;

?>
<div class="site-alert">
	<div class="container">
		<div class="grid grid-cols-12 h-60 items-center">
			<div class="col-span-3 flex justify-start">
				<div class="flex items-center mr-24">
					<span class=""><?php echo $email ?> </span>
				</div>
				<div class="flex items-center mr-0">
					<span class=""><?php echo $phone ?> </span>
				</div>
			</div>
			<div class="text-center col-span-6 ">
				Welcome to the <?php echo $fullname ?> Experience!
			</div>
			<form class="col-span-3 flex justify-end" method="post">
				<div class="flex items-center ml-24">
					<select class="mr-5" name="selLanguage" onchange="this.form.submit()">
						<?php
							$stmt = $db->query('SELECT LanguageCode, LanguageDescription FROM languages ORDER BY Priority');
							while ($row = $stmt->fetch()) {
								$slctd = $language === $row[0] ? 'selected' : '';
								echo "<option value=\"" . $row[0] . '"' . $slctd . ' >' . $row[1] . "</option>";
							}
						?>
					</select>
					<?php include dirname(__DIR__, 1) . '/src/images/icons/inline/inline-caret-down.svg.php'; ?>
				</div>
			</form>
			<form class="col-span-3 flex justify-end" method="post">
				<div class="flex items-center ml-24" >
					<select class="mr-5" name="selCountry" onchange="this.form.submit()">
						<?php
							$stmt = $db->query('SELECT CountryCode, CountryName FROM countries ORDER BY Priority');
							while ($row = $stmt->fetch()) {
								$slctd = $country === $row[0] ? 'selected' : '';
								echo '<option value="' . $row[0] . '"' . $slctd . ' >' . $row[1] . '</option>';
							}
						?>
					</select>
					<?php include dirname(__DIR__, 1) . '/src/images/icons/inline/inline-caret-down.svg.php'; ?>
				</div>
			</form>
		</div>
	</div>
</div>
