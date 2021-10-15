<?php
/**
 * Social links depending on country cookie, defaults to US.
 *
 * @package _s
 */

if ( ! empty( $_COOKIE['wordpress_country'] ) ) :
	$country = $_COOKIE['wordpress_country'];
else :
	$country = 'US';
endif;
?>
<div class="social-links">
	<?php if ( 'CA' === $country || 'US' === $country || 'AU' === $country ) : ?>

		<a href="https://www.pinterest.com/Yoli_Global/" title="Yoli on Pinterest" target="_blank"><?php get_template_part( '/src/images/icons/inline/inline', 'pinterest.svg' ); ?></a>
		<a href="https://www.instagram.com/yoli_global/" title="Yoli on Instagram" target="_blank"><?php get_template_part( '/src/images/icons/inline/inline', 'instagram.svg' ); ?></a>
		<a href="https://www.facebook.com/yoliglobal" title="Yoli on Facebook" target="_blank"><?php get_template_part( '/src/images/icons/inline/inline', 'facebook.svg' ); ?></a>
		<a href="https://www.linkedin.com/company/yoli-global" title="Yoli on Linked In" target="_blank"><?php get_template_part( '/src/images/icons/inline/inline', 'linkedin-circled.svg' ); ?></a>
		<a href="https://www.youtube.com/channel/UCCIGqBBoEfOr_Gu2ofMWuAw" title="Yoli on YouTube" target="_blank"><?php get_template_part( '/src/images/icons/inline/inline', 'you-tube-circle.svg' ); ?></a>

	<?php elseif ( 'PH' === $country ) : ?>

		<a href="https://www.pinterest.com/Yoli_Global/" title="Yoli on Pinterest" target="_blank"><?php get_template_part( '/src/images/icons/inline/inline', 'pinterest.svg' ); ?></a>
		<a href="https://www.instagram.com/yoliofficialph/" title="Yoli on Instagram" target="_blank"><?php get_template_part( '/src/images/icons/inline/inline', 'instagram.svg' ); ?></a>
		<a href="https://www.facebook.com/YoliOfficialPH/" title="Yoli on Facebook" target="_blank"><?php get_template_part( '/src/images/icons/inline/inline', 'facebook.svg' ); ?></a>
		<a href="https://www.linkedin.com/company/yoli-global" title="Yoli on Linked In" target="_blank"><?php get_template_part( '/src/images/icons/inline/inline', 'linkedin-circled.svg' ); ?></a>
		<a href="https://www.youtube.com/channel/UCCIGqBBoEfOr_Gu2ofMWuAw" title="Yoli on YouTube" target="_blank"><?php get_template_part( '/src/images/icons/inline/inline', 'you-tube-circle.svg' ); ?></a>

	<?php endif; ?>
</div>
