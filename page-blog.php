<?php get_header(); ?>



<section> 
    <header>
        <h1>Últimos posts</h1>
    </header>

    <?php if ( is_active_sidebar( 'home_right_1' ) ) : ?>
	<div id="primary-sidebar" class="primary-sidebar widget-area" role="complementary">
		<?php dynamic_sidebar( 'home_right_1' ); ?>
	</div><!-- #primary-sidebar -->
<?php endif; ?>
    
    
    

<div  class="section_wrapper_left">
	
    <?php
$query = array(
    'post_type' => 'post',
    'category_name' => 'blog',
    'posts_per_page' => 10,
    'post_status' => array(
        'publish'
    )
);

$loop = new WP_Query($query);

if ( $loop->have_posts() ) : while ( $loop->have_posts() ) : $loop->the_post(); 
?>
   <article class="thumbnail">
    <a href="<?php the_permalink(); ?>">
    <header>
		<h2><?php the_title(); ?></h2>
        <div class="post_meta">
                <p><?php the_date(); ?></p>
                <p>Publicado en: Blog</p>
            <div class="hidden_mobile">
            	<?php the_excerpt(); ?>
            </div>
        </div>
     </header>
    	<div class="wrapper">
    		<figure>
                   <?php if ( has_post_thumbnail() ) {
                            the_post_thumbnail();
                        } ?>
        	</figure>
		</div>
    </a>
    </article>

<?php
endwhile; else : 
?>

<p><?php _e('No hay posts en esta página'); ?></p>

<?php endif; ?>
   
</div>

    
<?php get_sidebar( 'ads' ); ?>

</section>


</body>
</html>


