<?php get_header(); ?>


<section>
	<header> 
		<h1>Productos destacados</h1>
    </header>

<?php
$args = array(
    'post_type' => 'productos',
    'post_status' => array(
        'publish'
    )
);

$query = new WP_Query($args);

if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post(); 

$precio = get_post_meta( get_the_ID(), 'precio', true );

?>
 <article class="product_thumbnail">
    <a href="ecommerce/aceite_coco.html">
    	<div class="wrapper">
    		<figure>
                   <?php if ( has_post_thumbnail() ) {
                            the_post_thumbnail();
                        } ?>
        	</figure>
        </div>
        <header>
    		<h2><?php the_title(); ?></h2>
            <div class="price">
        		<p><?php echo $precio ?></p>
        		<div class="add_cart">Añadir al carrito</div>
        	</div>
        </header>
        </a>
    </article>
<?php endwhile; else : ?>

<p><?php _e('No hay posts en esta página'); ?></p>

<?php endif; ?>


</section>
