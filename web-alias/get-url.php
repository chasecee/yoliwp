<?php

echo '<script>console.log("In get-url.php");</script>';

$link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ?
                "https" : "http") . "://" . $_SERVER['HTTP_HOST'] .
                $_SERVER['REQUEST_URI'];

$path = parse_url($link)['path'];

$wpPagePaths = array('/corporphan', '/to-orphan', '/home', '/earn', '/our-story', '/product-data', '/products', '/passion');
foreach($wpPagePaths as $wpPagePath) {
  if($path === $wpPagePath)   {
    $path = '/to-orphan';
  }
}
?>
