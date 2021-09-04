
<?php
include_once dirname(__DIR__, 1) . '/template-parts/site-alert.php';

echo '<script>console.log("In get-all-products.php");
</script>';


/** Get summary of all products for a country (populating the footer / modal menu): ​/api​/Products​/{countryCode}​/{languageCode} */
$baseUrl = 'https://108.59.44.81/api/Products/';
$serverUrl = null;
$defaultUrl = 'https://108.59.44.81/api/Products/US/EN';

// Store the rep's info--whether real or corporphan.
$webAlias = $rep->webAlias;
$customerId = $rep->customerId;

if (isset($_COOKIE['Country']) && isset($_COOKIE['Language'])) {
  $serverUrl = $baseUrl . $_COOKIE['Country'] . '/' . $_COOKIE['Language'];
}

if ($serverUrl) {
  $curl = curl_init($serverUrl);
  curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

    //for debug only!
    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

} else { // Make the call for products with the default url.
  $curl = curl_init($defaultUrl);
  curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

    //for debug only!
    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

}

// The products in JSON.
$curl_response = curl_exec($curl);

//The parsed products.
$products = json_decode($curl_response);
if ($curl_response === false) {
    $info = curl_getinfo($curl);
    curl_close($curl);
    die('An error occured during curl exec. Additional info: ' . var_export($info));
} else {
  $cookie_name = 'Current_Rep';
  $cookie_value = $curl_response;
}
curl_close($curl);






// Get the categories into their own array.
$prodCategories = array();
$value = null;
foreach($products as $category) {
  // var_export($category);
  if($category->webCategoryDescription !== $value) {
    array_push($prodCategories, $category->webCategoryDescription);
    $value = $category->webCategoryDescription;
  }
}
?>

 <!-- Render the menu. *Note: the anchor tag with the href link and get method is just one way; you could use a button and the post method with global $_POST variable, instead of query params.-->
<!-- <?php
  echo '<table class="product-menu">';
  echo '<tr class="menu-categories">';
  foreach($prodCategories as $category) {
    echo '<th id="' . $category . '">' . $category . '</th>';
  }
  echo '</tr>';
  echo '<tr class="menu-products">';
  echo '<td><a href="php/render-product.php?itemID=6044&itemCode=YESCAN-US&itemDescription=Yes Cannister&webCategoryDescription=Vitality&webAlias=' . $webAlias . '&customerId=' . $customerId . '">Yes Canister</></td>';
  echo '<td><a href="php/render-product.php?itemID=6052&itemCode=CHGPA-US&itemDescription=Charge&webCategoryDescription=Energy&webAlias=' . $webAlias . '&customerId=' . $customerId . '">Charge</></td>';
  echo '<td><a href="php/render-product.php?itemID=6050&itemCode=FUNCAN-US&itemDescription=Fun Canister&webCategoryDescription=Balance&webAlias=' .$webAlias . '&customerId=' . $customerId . '">Fun Canister</></td>';
  echo '<td><a href="php/render-product.php?itemID=6058&itemCode=TKPAS-CN-US&itemDescription=Dynamic T-kits Passion - Canister&webCategoryDescription=Transformation&webAlias=' .$webAlias . '&customerId=' . $customerId . '">Dynamic T-kits Passion - Canister</></td>';
  echo '</tr>';
  echo '</table>';


?> -->

