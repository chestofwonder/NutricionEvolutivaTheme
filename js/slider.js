// JavaScript Document

jQuery(document).ready(function(){
	preloader();	
});


function preloader(){
	var slides = jQuery('.slideShow > li');
	var slideCount = 0;
	var totalSlides = slides.lenght;
	var slideCache = [];
	
        alert(slides);
        
        
	if(slideCount < totalSlides){
		slideCache[slideCount] = new Image();
		slideCache[slideCount].src = slides.eq(slideCount).find('img').attr('src');
		slideCache[slideCount].onload = function(){
			slideCount++;
			preloader();
		}
	}else{
		slideCount = 0;
		SlideShow();
	}
}
/*
function SlideShow(){
	//animate{
		callback:
			slideCount < totalSlides - 1? slideCount++ : slideCount = 0;
			SlideShow()
	}
}



$( "#clickme" ).click(function() {
  $( "#book" ).animate({
    opacity: 0.25,
    left: "+=50",
    height: "toggle"
  }, 5000, function() {
    // Animation complete.
  });
});





*/