<?php
  $user = 'root'; // Mysql
  $password = 'password'; // Mysql Password
  $server = 'yoliwp.local'; // Mysql Host
  $database = 'yoli'; // Mysql Databse
  // PDO Connection string
  $db = new PDO("mysql:host=$server; dbname=$database", $user, $password);
  $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  if(isset($_POST['selCountry']) ) {
    $country = $_POST['selCountry'];
		setcookie('Country', $country, time() + (86400 * 30), '/');
  } else {
		$country = 'US';
	}

  echo '<form method="post">';
  echo '<select name="selCountry" onchange="this.form.submit()">';

  $stmt = $db->query('SELECT CountryCode, CountryName FROM countries ORDER BY Priority');
  while ($row = $stmt->fetch()) {
    $slctd = $country === $row[0] ? 'selected' : '';
    echo '<option value="' . $row[0] . '"' . $slctd . ' >' . $row[1] . '</option>';
  }

  echo '</select>';
  echo '</form>';

?>

