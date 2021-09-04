<?php
/**
 * The alert bar/experience bar for our theme.
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package _s
 */

?>

<?php
require_once realpath( __DIR__ . '/..' ) . '/web-alias/repsite-validation.php';

echo '<script>console.log("In site-alert.php");</script>';

/** Connect to the db to access language and country options. */
	$user     = 'root';
	$password = 'password';
	$server   = 'yoliwp.local';
	$database = 'yoli';

	$db = new PDO( "mysql:host=$server; dbname=$database", $user, $password );
	$db->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );

	/** For anything other than English, set the language cookie. */
if ( isset( $_POST['sel_language'] ) ) {
	$language = $_POST['sel_language'];
	setcookie( 'Language', $language, time() + ( 86400 * 30 ), '/' );
} else {
	$language = 'EN';
}

	/** For anything other than the US, set the country cookie. */
if ( isset( $_POST['sel_country'] ) ) {
	$country = $_POST['sel_country'];
	setcookie( 'Country', $country, time() + ( 86400 * 30 ), '/' );
} else {
	$country = 'US';
}

/** Write logic here to render the banner if rep->customerId !== 50; else, no banner and no cookie. */

$first_name = $rep->firstName;
$last_name  = $rep->lastName;
$full_name  = $first_name . ' ' . $last_name;
$email      = $rep->email;
$phone      = $rep->phone;
?>

<div class="site-alert">
	<div class="container">
		<div class="grid grid-cols-12 h-60 items-center">
			<div class="col-span-3 flex justify-start">
				<div class="flex items-center mr-24">
					<span class=""><?php echo esc_html( $email ); ?> </span>
				</div>
				<div class="flex items-center mr-0">
					<span class=""><?php echo esc_html( $phone ); ?> </span>
				</div>
			</div>
			<div class="text-center col-span-6 ">
				Welcome to the <?php echo esc_html( $full_name ); ?> Experience!
			</div>
			<form class="col-span-3 flex justify-end" method="post">
				<div class="flex items-center ml-24">
					<select class="mr-5" name="sel_language" onchange="this.form.submit()">
						<?php
							$stmt = $db->query( 'SELECT LanguageCode, LanguageDescription FROM languages ORDER BY Priority' );
						while ( $row = $stmt->fetch() ) {
							$slctd = $language === $row[0] ? 'selected' : '';
							echo '<option value="' . esc_attr( $row[0] ) . '"' . esc_attr( $slctd ) . ' >' . esc_html( $row[1] ) . '</option>';
						}
						?>
					</select>
					<?php require realpath( __DIR__ . '/..' ) . '/src/images/icons/inline/inline-caret-down.svg.php'; ?>
				</div>
			</form>
			<form class="col-span-3 flex justify-end" method="post">
				<div class="flex items-center ml-24" >
					<select class="mr-5" name="sel_country" onchange="this.form.submit()">
						<?php
							$stmt = $db->query( 'SELECT CountryCode, CountryName FROM countries ORDER BY Priority' );
						while ( $row = $stmt->fetch() ) {
							$slctd = $country === $row[0] ? 'selected' : '';
							echo '<option value="' . esc_attr( $row[0] ) . '"' . esc_attr( $slctd ) . ' >' . esc_html( $row[1] ) . '</option>';
						}
						?>
					</select>
					<?php require realpath( __DIR__ . '/..' ) . '/src/images/icons/inline/inline-caret-down.svg.php'; ?>
				</div>
			</form>
		</div>
	</div>
</div>
