// JavaScript Document
jQuery(document).ready(function(){
	var cart_products = 0;
	jQuery(".shopping_cart_recount").hide();
	
	//jQuery("#product_recount").text(cart_products + " productos en la cesta");
	
		jQuery(".add_cart").click(function(){
				cart_products++; 
				jQuery(".shopping_cart_recount").show();
				jQuery(".shopping_cart_recount").text(cart_products);
		});

		/*jQuery(".flaticon-purse10").click(function(){
				cart_products++; 
				jQuery(".shopping_cart_recount").show();
				jQuery(".shopping_cart_recount").text(cart_products);
		});*/
});
