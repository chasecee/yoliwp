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

	if ( 'AU' === $country ) :
		$url = $base_url . 'EWRLTMpoBPhClmZEuOYxv5cBmlDxguFxGQAjY9-wFXwbPQ?e=PFYcjX';
		elseif ( 'PH' === $country ) :
			$url = $base_url . 'EWmBt7h72OtAgHF-sKzYHocBqSaj91v5a-lwJhRQbtdu5Q?e=RRHK1U';
			elseif ( 'CA' === $country ) :
				$url = $base_url . 'ESBUSgiHELRArKkr-RjkyhcBiSFVCVbX6FPN4VJ6TZE3QQ?e=XC5iDm';
				else :
					$url = $base_url . 'EWRLTMpoBPhClmZEuOYxv5cBmlDxguFxGQAjY9-wFXwbPQ?e=PFYcjX';
				endif;

				return $url;
}
