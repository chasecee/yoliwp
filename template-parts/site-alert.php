<?php
/**
 * The alert bar/experience bar for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package _s
 */

?>
<div class="site-alert">
	<div class="container">
		<div class="grid grid-cols-12 h-60 items-center">
			<div class="text-center col-span-8 col-start-3 ">
				Welcome to Jen Furness’ Experience
			</div>
			<div class="col-span-2 flex justify-end">
				<div class="flex items-center ml-24"><span class="mr-5">En</span> <?php get_template_part( '/src/images/icons/inline/inline', 'caret-down.svg' ); ?></div>
				<div class="flex items-center ml-24"><span class="mr-5">Country</span> <?php get_template_part( '/src/images/icons/inline/inline', 'caret-down.svg' ); ?></div>
			</div>
		</div>
	</div>
</div>
