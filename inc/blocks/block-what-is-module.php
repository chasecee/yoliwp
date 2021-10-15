<?php
/**
 * Section block
 *
 * @package      _s
 * @author       Chase Christensen
 * @since        1.0.0
 * @license      GPL-2.0+
 **/

?>
<div class="max-1920">
<div class="sc-title">
	<h4><?php the_field( 'title' ); ?></h4>
</div>

<div class="sc-content">
	<?php the_field( 'content' ); ?>
</div>

<div class="grid lg:grid-cols-5 md:grid-cols-3 sm:grid-cols-2 gap-5 items-center ">
<?php if ( have_rows( 'showcase_module' ) ) : ?>
	<?php
	while ( have_rows( 'showcase_module' ) ) :
		the_row();
		?>

<div>
	<div class="showcase ">
		<?php the_sub_field( 'image' ); ?>
		<h4><?php the_sub_field( 'title' ); ?></h4>
		<p><?php the_sub_field( 'blurb' ); ?></p>
	</div>
</div>

<?php endwhile; ?>
<?php endif; ?>

</div>
	</div>
