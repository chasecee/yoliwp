<?php
/**
 * The mini admin bar for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package _s
 */

?>
<?php if ( is_user_logged_in() ) { ?>
	<div class="admin-links">
		<div class="px-guide-outer">
			<div class="px-guide inline"><span></span></div>px
		</div>
	<div class="screen-guide">
			<div class="block sm:hidden">@screen min</div>
			<div class="hidden sm:block md:hidden">@screen sm</div>
			<div class="hidden md:block lg:hidden">@screen md</div>
			<div class="hidden lg:block xl:hidden">@screen lg</div>
			<div class="hidden xl:block ">@screen xl</div>
	</div>
	<a href="<?php echo esc_url( admin_url() ); ?>"><?php esc_html_e( 'dashboard', '_s' ); ?></a>
	<?php
	edit_post_link(
		sprintf(
			/* translators: %s: Name of current post */
			esc_html__( 'edit %s', '_s' ),
			the_title( '<span class="">"', '"</span>', false )
		),
		'',
		''
	);
	?>
</div>
<?php } ?>
