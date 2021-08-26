<?php
include 'repsite-val.php';

// Render the banner if not corporphan; if corporphan, no banner and no cookie.
if ($rep->customerId === 50 && isset($_COOKIE['Current_Rep'])) {
  $cookie = json_decode($_COOKIE['Current_Rep']);
  $firstName = $cookie->firstName;
  $lastName = $cookie->lastName;
  $email = $cookie->email;
  $phone = $cookie->phone;
  print 'Repsite Banner: Welcome to the ' . $firstName . ' ' . $lastName . ' experience!' . ' | ' . $email . ' | ' . $phone . '<br>';
} else if ($rep->customerId === 50) {
  echo 'The rep\'s customerID is ' . $rep->customerId . ' (corporphan), so no repsite banner. <br>';
} else {
  $cookie_value = json_encode($rep);
  $firstName = $rep->firstName;
  $lastName = $rep->lastName;
  $email = $rep->email;
  $phone = $rep->phone;
  setcookie($cookie_name, $cookie_value, time() + (86400 * 30), '/');
  print 'Repsite Banner: Welcome to the ' . $firstName . ' ' . $lastName . ' experience!' . ' | ' . $email . ' | ' . $phone . '<br>';
}
?>
