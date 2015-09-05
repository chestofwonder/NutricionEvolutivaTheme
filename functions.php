<?php

function add_categories_to_pages(){

	register_taxonomy_for_object_type( 'category', 'page' );
}

add_action( 'init', 'add_categories_to_pages' );

?>