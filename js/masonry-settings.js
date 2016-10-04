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
    
});

