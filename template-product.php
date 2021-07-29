<?php
/**
 * Template Name: Product Page
 *
 * This template displays a page with a sidebar on the right side of the screen.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package _s
 */

get_header();

// acf vars.

?>

	<div class="container site-main">
		<main id="main" class="content-container">
		<div class="h-192 bg-tan mb-192"></div>
<div class="h-192 bg-tan mb-192"></div>
<?php
// require_once 'wp-config.php';
// require_once 'wp-includes/wp-db.php';

// $sql     = 'SELECT * FROM `yoli_repsites`';
// $results = $wpdb->get_results( $sql );
// echo $results;
?>
			<?php
			while ( have_posts() ) :
				the_post();
				?>

<div class="h-192 bg-tan mb-192"></div>
<div class="h-192 bg-tan mb-192"></div>
<div class="h-192 bg-tan mb-192"></div>
<div class="h-192 bg-tan mb-192"></div>

				<?php
			endwhile; // End of the loop.
			?>

		</main><!-- #main -->

	</div>

<?php get_footer(); ?>
