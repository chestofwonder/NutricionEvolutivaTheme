<?php get_header();?>

	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

<?php  echo(the_title()); ?>

<?php  endwhile; else : ?>
	<p><?php _e('No hay posts'); ?></p>
<?php endif; ?>


