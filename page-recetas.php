<?php 

get_header();

$query = array(
    'post_type' => 'recetas',
    'post_status' => array(
        'publish'
    )
);

$loop = new WP_Query($query);

if ( $loop->have_posts() ) : while ( $loop->have_posts() ) : $loop->the_post(); 

  the_content(); 

endwhile; else : 
?>

<p><?php _e('No hay posts en esta página'); ?></p>

<?php endif; ?>
