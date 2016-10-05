// Masonry settings to organize footer widgets
jQuery(document).ready(function($){

$('#projects').masonry({
  // options
  itemSelector: '.project',
  columnWidth: '.project',
  gutter: 25,
  isFitWidth: true,
  isAnimated: true
});
    

$('.agents').masonry({
  // options
  itemSelector: '.agents ul li',
  columnWidth: '.agents ul li',
  gutter: 0,
  isFitWidth: true,
  isAnimated: true
});



});

