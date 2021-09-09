<?php
/**
 * Template Name: Default Page
 *
 * This template displays a page with a sidebar on the right side of the screen.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package _s
 */

get_header(); ?>

	<div class="site-main">
		<main id="main" class="content-container">

			<?php
			while ( have_posts() ) :
				the_post();

				get_template_part( 'template-parts/content', 'page' );


			endwhile; // End of the loop.
			?>

		</main><!-- #main -->

	</div>

<?php get_footer(); ?>
