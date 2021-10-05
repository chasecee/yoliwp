<?php
if ( ( ! empty( $_COOKIE['wordpress_country'] ) && 'PH' === $_COOKIE['wordpress_country'] ) ) :
	$hours            = 'Mon - Fri: 10 am - 6 pm; Sat: 10 am - 5 pm';
	$phone_one_prefix = 'Smart: ';
	$phone_one_number = '0999-168-6776';
	$phone_one        = $phone_one_prefix . $phone_one_number;

	$phone_two_prefix = 'Globe: ';
	$phone_two_number = '0927-709-1399';
	$phone_two        = $phone_two_prefix . $phone_two_number;
	$email            = 'csphl@yoli.com';
		else :
			$hours            = '8 am - 7 pm MT';
			$phone_one_number = '801-727-0877';
			$phone_one        = $phone_one_number;
			$phone_two_number = '888-295-9009';
			$phone_two        = $phone_two_number;
			$email            = 'cs@yoli.com';
		endif;
