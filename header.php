<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Nutrición Evolutiva</title>
<link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_uri() ?>" />
<script src="js/jquery.js"></script>
<script src="js/menu.js"></script>
<script src="js/shopping.js"></script>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" >
</head>

<body>

<?php //var_dump(get_page_template()); ?>

<header class="page_header"> 
  <span class="show_mobile flaticon-menu48"></span>
  <h3 id="page_title" class="header_title"><a href="index.php">NUTRICION EVOLUTIVA</a></h3>
  <a href="ecommerce/shopping_cart.html"><span class="flaticon-purse10"></span></a>
  <span class="show_mobile shopping_cart_recount">0</span>


  <!-- <nav id="main_menu" class="hidden_mobile"> -->
<?php wp_nav_menu( 
        array( 'container' => '<nav> ', 
            'theme_location' => 'main_menu' )
 ); ?>



  
  <!--  <ul>
      <li><input type="text" /><span class="flaticon-magnifying-glass6"></span></li>
      <li><a href="recipes_home.html">Recetas</a></li>
      <li><a href="blog_home.html">Blog</a></li>
      <li><a href="ecommerce_home.html">Tienda</a></li>
    </ul>-->
      
      
      
 <!-- </nav> -->
  </header>

<div class="clearfix"></div>

