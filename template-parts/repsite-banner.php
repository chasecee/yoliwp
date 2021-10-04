<?php

function render_banner($rep, $home, $redirect_boolean, $path, $show_banner) {
	include_once realpath(__DIR__ . '/..') . '/api/get-languages.php';
	include_once realpath(__DIR__ . '/..') . '/api/get-countries.php';

	// Turn on $languages when ready for the dropdown; uncomment html below.
	// $languages = get_languages();
	$countries = get_countries();

	$email           = null;
	$phone           = null;
	$welcome_message = null;

	if ( empty($rep->photo) ) :
		$image = null;
		else :
			$image = $rep->photo;
		endif;

	if (1 === $redirect_boolean) {
		header('Location: ' . $home);
		exit;
	}

	/** If the rep's customer ID === 50, generic welcome message; otherwise, repsite banner. */
	if ( 50 === $rep->customerId ) {
		$welcome_message = 'Welcome to Yoli!';
	} else {
		$email = $rep->email;
		$phone = $rep->phone;
				// phpcs:ignore
		$welcome_message = 'Welcome to the ' . $rep->firstName . ' ' . $rep->lastName . ' experience!';
	}

	if ( $show_banner === false ) :
		return;
	endif;

	echo '<div class="site-alert" style="display:none;">';
		echo '<div class="container">';
			echo '<div class="grid grid-cols-12 h-60 items-center">';
				echo '<div class="col-span-3 hidden md:flex justify-start">';
					echo '<div class="flex items-center flex-none mr-24">';
						$display = !empty( $rep->photo ) ? '' : 'none';
						echo '<img class="w-40 h-40 rounded-full" style="display:' . $display . '" src="data:image/png;base64,' . esc_attr($image) . '" alt="avatar"/>';
					echo '</div>';

					echo '<div class="flex items-center mr-24">';
						echo '<span class="">' . esc_html( $email ) . '</span>';
					echo '</div>';
					echo '<div class="flex items-center mr-0">';
						echo '<span class="">' . esc_html( $phone ) . '</span>';
					echo '</div>';
				echo '</div>';
				echo '<div class="text-center col-span-12 md:col-span-6 ">';
					echo esc_html( $welcome_message );
				echo '</div>';
				// echo '<form class="col-span-3 flex justify-end" method="post">';
				// 	echo '<div class="flex items-center ml-24">';
				// 	echo '<select class="mr-5" name="sel_language" onchange="this.form.submit()">';
				// foreach ( $languages as $key => $option) {
				// 	if ( !isset( $_COOKIE['wordpress_language'] ) && $key === 'US' ) :
				// 		$slctd = 'selected';
				// 		elseif ( isset($_COOKIE['wordpress_language']) && $_COOKIE['wordpress_language'] === $key ) :
				// 			$slctd = 'selected';
				// 			else :
				// 				$slctd = '';
				// 			endif;
				// 	echo '<option value="' . esc_attr($key) . '" ' . esc_attr($slctd) . '>' . esc_html($option) . '</option>';
				// }
				// 	echo	'</select>';
				// 	echo '</div>';
				// echo '</form>';
				echo '<form class="col-span-3 hidden md:flex justify-end mb-0 h-26" method="post">';
					echo '<div class="flex items-center" >';
						echo '<select class="bg-transparent text-right" name="sel_country" onchange="this.form.submit()">';
							foreach ( $countries as $key => $option ) {
								if ( !isset( $_COOKIE['wordpress_country'] ) && $key === 'US' ) :
									$slctd = 'selected';
									elseif ( isset($_COOKIE['wordpress_country']) && $_COOKIE['wordpress_country'] === $key ) :
										$slctd = 'selected';
										else :
											$slctd = '';
										endif;
								echo '<option value="' . esc_attr($key) . '" ' . esc_attr($slctd) . '>' . esc_html($option) . '</option>';
							}
						echo '</select>';
					echo '</div>';
				echo '</form>';
			echo '</div>';
		echo '</div>';
	echo '</div>';
}
