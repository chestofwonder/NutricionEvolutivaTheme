<?php

include (TEMPLATEPATH . '/widgets/fooWidget.php');
include (TEMPLATEPATH . '/metaboxes/producto.php');

add_theme_support( 'post-thumbnails' ); 


function menus() {
	register_nav_menus( array(
		'primary' => __( 'Main Menu',      'Nutricion Evolutiva' )
	) );
}

add_action( 'after_setup_theme', 'menus' );



function filter_menu($menu){

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
		'taxonomies' => array('category'),
                'supports' => array( 'title', 'editor', 'thumbnail', 'excerpt' )
	);	

	register_post_type('productos', $args);

}

add_action( 'init', 'add_post_types' );


function new_excerpt_more( $more ) {
    
	return ' <a class="read-more" href="'. get_permalink( get_the_ID() ) . '">' . __('Más...', 'your-text-domain') . '</a>';
}

add_filter( 'excerpt_more', 'new_excerpt_more' );


function remove_excerpt_title( $excerpt ) {
 
$title = get_the_title();

//$title = "Dietas hipocalóricas para adelgazar: ¿son una buena idea?";
//var_dump($title);
//var_dump(strpos($excerpt, $title));
//$title = "Dietas hipo";
//$excerpt = str_replace( $title,'', $excerpt );
// var_dump($excerpt);
               return str_replace( $title,'', $excerpt );
}

//add_filter( 'get_the_excerpt', 'remove_excerpt_title' );








// register Foo_Widget widget
function register_foo_widget() {
    register_sidebar( array(
		'name'          => 'Home right sidebar',
		'id'            => 'home_right_1',
		'before_widget' => '<div>',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="rounded">',
		'after_title'   => '</h2>',
	) );
    
    register_widget( 'Foo_Widget' );
}
add_action( 'widgets_init', 'register_foo_widget' );


function add_meta_boxes() {

	add_meta_box(
            'myplugin_sectionid',
            __( 'Datos del producto', 'datos_del_producto' ),
		'producto_meta_box_callback',
			'productos'
	);
}
add_action( 'add_meta_boxes', 'add_meta_boxes' );

?>