<?php

  // Helper function to call the API as needed.
  function get_rep_info($url) {
    $curl = curl_init($url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

    //for debug only!
    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

    // This responds with an error or the request body in json.
    $curl_response = curl_exec($curl);
    $rep = json_decode($curl_response);

    if ($curl_response === false) {
        $info = curl_getinfo($curl);
        curl_close($curl);
        die('An error occured during curl exec. Additional info: ' . var_export($info));
    } else if ($rep === null) { // This returns the nginx error page, if the response is a 502.
      die ($curl_response);
    } else {
      curl_close($curl);
    }

		return $rep;
  }
