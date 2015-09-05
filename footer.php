<?php
	//echo get_page_template();
	//var_dump(get_post_meta(get_the_ID(), '_wp_page_template', TRUE));
//$post = 
var_dump(get_post());
var_dump(get_page_template_slug($post->ID));
?>