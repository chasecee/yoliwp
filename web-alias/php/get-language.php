<?php
  $user = 'root'; // Mysql
  $password = 'password'; // Mysql Password
  $server = 'localhost'; // Mysql Host
  $database = 'yoli'; // Mysql Databse
  // PDO Connection string
  $db = new PDO("mysql:host=$server; dbname=$database", $user, $password);  
  $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  $varLanguage = 'EN';

  if(isset($_POST['selLanguage'])) {
    $varLanguage = $_POST['selLanguage'];
    setcookie('Language', $varLanguage, time() + (86400 * 30), '/');
  }
  
  echo '<form method="post">';
  echo '<select name="selLanguage" onchange="this.form.submit()">';

  $stmt = $db->query('SELECT LanguageCode, LanguageDescription FROM languages ORDER BY Priority');
  while ($row = $stmt->fetch())
  {
    $slctd = $varLanguage == $row[0] ? 'selected' : '';
    echo "<option value=\"" . $row[0] . '"' . $slctd . ' >' . $row[1] . "</option>";
  }
  echo "</select>";
  echo '</form>';
  
?>