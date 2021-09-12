<?php

function render_banner($rep, $home, $redirect) {
	include_once realpath(__DIR__ . '/..') . '/api/get-languages.php';
	include_once realpath(__DIR__ . '/..') . '/api/get-countries.php';

	$languages = get_languages();
	$countries = get_countries();

	$email = null;
	$phone = null;
	$welcome_message = null;

	if ($redirect === 1) {
		echo '<script>console.log("Repsite-banner -> boolean === true -> redirect to home.")</script>';
		// header('Location: http://localhost:10008/');
		header('Location: ' . $home);
		exit;
	}

	/** If the rep's customer ID === 50, generic welcome message; otherwise, repsite banner. */
	if ( $rep->customerId !== 50) {
		$email = $rep->email;
		$phone = $rep->phone;
		$welcome_message = 'Welcome to the ' . $rep->firstName . ' ' . $rep->lastName . ' experience!';

	} else {
		$welcome_message = 'Welcome to Yoli!';
	}

	echo '<div class="site-alert">';
		echo '<div class="container">';
			echo '<div class="grid grid-cols-12 h-60 items-center">';
				echo '<div class="col-span-3 flex justify-start">';
					echo '<div class="flex items-center mr-24">';
						echo '<span class="">' . esc_html($email) . '</span>';
					echo '</div>';
					echo '<div class="flex items-center mr-0">';
						echo '<span class="">' . esc_html($phone) . '</span>';
					echo '</div>';
				echo '</div>';
				echo '<div class="text-center col-span-6 ">';
					echo esc_html($welcome_message);
				echo '</div>';
				// echo '<form class="col-span-3 flex justify-end" method="post">';
				// 	echo '<div class="flex items-center ml-24">';
				// 	echo '<select class="mr-5" name="sel_language" onchange="this.form.submit()">';
				// 		echo '<option selected disabled>Language</option>';
				// 		foreach ( $languages as $key => $option) {
				// 			echo '<option value="' . esc_attr($key) . '" >' . esc_html($option) . '</option>';
				// 		}
				// 	echo	'</select>';
				// 	echo '</div>';
				// echo '</form>';
				echo '<form class="col-span-3 flex justify-end" method="post">';
					echo '<div class="flex items-center ml-24" >';
					echo '<select class="mr-5" name="sel_country" onchange="this.form.submit()">';
						echo '<option selected="selected" disabled>Country</option>';
								foreach ( $countries as $key => $option) {
									$slctd = ( isset($_POST['sel_country']) && $_POST['sel_country'] === $key ) ? 'selected' : '';
									echo '<option value="' . esc_attr($key) . '" ' . $slctd . '>' . esc_html($option) . '</option>';
							 }
						echo '</select>';
					echo '</div>';
				echo '</form>';
			echo '</div>';
		echo '</div>';
	echo '</div>';
}
?>
