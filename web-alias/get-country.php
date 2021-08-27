<?php
  $user = 'root'; // Mysql
  $password = 'password'; // Mysql Password
  $server = 'localhost'; // Mysql Host
  $database = 'yoli'; // Mysql Databse
  // PDO Connection string
  $db = new PDO("mysql:host=$server; dbname=$database", $user, $password);  
  $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  $varCountry = 'US';

  if(isset($_POST['selCountry']) ) {
    $varCountry = $_POST['selCountry'];
    // setcookie('Country', $varCountry, time() + (86400 * 30), '/');
  } 
  
  setcookie('Country', $varCountry, time() + (86400 * 30), '/');

  echo '<form method="post">';
  echo '<select name="selCountry" onchange="this.form.submit()">';

  $stmt = $db->query('SELECT CountryCode, CountryName FROM countries ORDER BY Priority');
  while ($row = $stmt->fetch()) {
    $slctd = $varCountry === $row[0] ? 'selected' : '';
    echo '<option value="' . $row[0] . '"' . $slctd . ' >' . $row[1] . '</option>';
  }
  
  echo '</select>';
  echo '</form>';

?>