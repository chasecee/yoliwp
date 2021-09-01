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
<?php get_template_part( 'web-alias/render-rep-banner' ); ?>
<div class="site-alert">
	<div class="container">

		<div class="grid grid-cols-12 h-60 items-center">
		<div class="col-span-3 flex justify-start">
				<div class="flex items-center mr-24"><span class="">jen.furness@gmail.com</span> </div>
				<div class="flex items-center mr-0"><span class="">(801) 837-2451</span> </div>
			</div>
			<div class="text-center col-span-6 ">
				Welcome to Jen Furness’ Experience
			</div>
			<div class="col-span-3 flex justify-end">
				<div class="flex items-center ml-24"><span class="mr-5">En</span> <?php get_template_part( '/src/images/icons/inline/inline', 'caret-down.svg' ); ?></div>
				<div class="flex items-center ml-24"><span class="mr-5">Country</span> <?php get_template_part( '/src/images/icons/inline/inline', 'caret-down.svg' ); ?></div>
			</div>
		</div>
	</div>
</div>
