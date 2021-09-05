<?php
$languageCode = $_COOKIE['Language'];
$webAlias = $_GET['webAlias'];
$customerId = $_GET['customerId'];
$itemId = $_GET['itemID'];
$itemCode = $_GET['itemCode'];
$itemDescription = $_GET['itemDescription'];
$category = $_GET['webCategoryDescription'];

// Get product pricing on specific product (populating the buy buttons text): ​/api​/Products​/pricing​/{countryCode}​/{itemId}

//Get product details on specific product (phase 2 for populating the product page(s) - still does not contain item images): ​/api​/Products​/{countryCode}​/{itemId}​/{languageCode}

// $baseUrl = 'http://localhost/api/Products/pricing/';
$baseUrl = 'https://108.59.44.81/api/Products/pricing/';
$serverUrl = null;
// $defaultUrl = 'http://localhost/api/Products/pricing/US/';
$defaultUrl = 'https://108.59.44.81/api/Products/pricing/US/';

// Build the URL for the get-call to the API for the retail and discount prices.
if(!isset($_COOKIE['Country'])){
  $serverUrl = $defaultUrl . $itemId;
} else {
  $countryCode = $_COOKIE['Country'];
  $serverUrl = $baseUrl . $countryCode . '/' . $itemId; 
}

echo 'The product get-call url: ' . $serverUrl . '<br>';

if ($serverUrl) {
  $curl = curl_init($serverUrl);
  curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

    //for debug only!
    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
  
} else { // Make the call for prices with the default url.
  $curl = curl_init($defaultUrl);
  curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

    //for debug only!
    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
  
}

$curl_response = curl_exec($curl);
$itemPrices = json_decode($curl_response);
if ($curl_response === false) {
    $info = curl_getinfo($curl);
    curl_close($curl);
    die('An error occured during curl exec. Additional info: ' . var_export($info));
} 
curl_close($curl);
?>

<!-- url = `https://1160-web1.vm.epicservers.com/${customer.webAlias}/additem?ItemCode=${itemCode}&Country=${customer.countryCode}&OwnerID=${customer.customerID}`; -->

<div class="<?php $category ?>" id=" <?php $itemID ?> ">
  <h1>Product Detail and Purchase Page</h1>
  <h4>Item Category: <?php echo $category ?></h4>
  <h5>Item Name: <?php echo $itemDescription ?></h5>
  <h6>Item Code: <?php echo $itemCode ?></h6>
  
  <?php 
  // Loop through the prices returned by the API: in the html, there is both a link and a button, the latter printing the redirect url and being for development purposes only. 
    foreach($itemPrices as $price) { 
      // If there is no price(s), don't render a link/button.
      if($price) {
      ?>
      <!-- <a name="retail-price" href="https://1160-web1.vm.epicservers.com/<?php $webAlias ?>/additem?ItemCode=<?php $itemCode ?>&Country=<?php $countryCode ?>&OwnerID=<?php $customerId ?>"> Buy at <?php echo $price ?> <br></a>
      <br/> -->

      <form method="post">
        <button name="price" onclick="this.form.submit()" value="https://1160-web1.vm.epicservers.com/<?php echo $webAlias ?>/additem?ItemCode=<?php echo $itemCode ?>&Country=<?php echo $countryCode ?>&OwnerID=<?php echo $customerId ?>"> Buy at <?php echo $price ?> <br></button>
      </form>
    <?php 
      }
    }
    ?> 
</div>

<?php
// Print the redirect url for the purposes of development only.
  if (isset($_POST['price'])) {
    echo 'The redirect URL = ' . $_POST['price'] . '<br>';
  }
?>

       