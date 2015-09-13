<?php

function add_categories(){

	register_taxonomy_for_object_type( 'category', 'page' );
}

add_action( 'init', 'add_categories' );

function add_post_types(){
	
	$args = array(
		'labels' => array(
			'name' => 'Recetas',
			'singular_name' => 'Receta'
			),
		'public' => true
	);	

	register_post_type('recetas', $args);

}

add_action( 'init', 'add_post_types' );
?>