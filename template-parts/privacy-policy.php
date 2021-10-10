<?php

/**
 * Required function comment.
 */
function privacy_policy() {
	$url = null;

	if ( ! empty( $_COOKIE['wordpress_country'] ) ) :
		$country = $_COOKIE['wordpress_country'];
	else :
		$country = 'US';
	endif;

	$base_url = 'https://yolillc-my.sharepoint.com/:b:/g/personal/md_yoli_com/';

	if ( 'AU' === $country || 'US' === $country ) :
		$url = $base_url . 'EZTGMec3ZnBLpgOLwUG2fz4B4j2EEp2QER4FZR_x5Q2Qgg?e=T0IfF9';
		elseif ( 'PH' === $country ) :
			$url = $base_url . 'Ed-1KaSIlCFNp2QCUKov3d4BSV-PY12Gyq-jB8IaCmnmqg?e=ymAnKW';
			elseif ( 'CA' === $country ) :
				$url = $base_url . 'ESBUSgiHELRArKkr-RjkyhcBiSFVCVbX6FPN4VJ6TZE3QQ?e=XC5iDm';
				endif;

				return $url;
}
