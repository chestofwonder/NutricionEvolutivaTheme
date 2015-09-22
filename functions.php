<?php

global $page_links;
$page_links = [];

function build_links(){
        global $page_links;
	$pages = get_pages();
        
        foreach($pages as $page){
            array_push($page_links, get_permalink($page->ID));
        }
        //var_dump($page_links);
}

add_action( 'init', 'build_links' );


function menus() {
	register_nav_menus( array(
		'primary' => __( 'Main Menu',      'Nutricion Evolutiva' )
	) );
}

add_action( 'after_setup_theme', 'menus' );



function filter_menu($menu, $args){

    $menu = str_replace( 'div class="menu"', 'nav id="main_menu" class="hidden_mobile"', $menu );
    $menu = str_replace( '<ul>', '<ul><li><input type="text" /><span class="flaticon-magnifying-glass6"></span></li><li>', $menu );

return $menu;
}

add_filter('wp_page_menu', 'filter_menu');

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
		'public' => true,
		'taxonomies' => array('post_tag')
	);	

	register_post_type('recetas', $args);

	$args = array(
		'labels' => array(
			'name' => 'Productos',
			'singular_name' => 'Producto'
			),
		'public' => true,
		'taxonomies' => array('category')
	);	

	register_post_type('productos', $args);

}

add_action( 'init', 'add_post_types' );
?>