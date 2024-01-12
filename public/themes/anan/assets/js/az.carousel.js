jQuery(document).ready(function($){
     
  $('.az_list_product_owl').owlCarousel({
    loop: false,
    margin: 0,
    nav: true,
    dots:false,
    navText: [
      "<i class='fa fa-angle-left'></i>",
      "<i class='fa fa-angle-right'></i>"
    ],
    autoplay: true,
    autoplayHoverPause: true,
    responsive: {
      0: {
        items: 2
      },
      600: {
        items: 3
      },
      1000: {
        items: 5
      }
    }
  });
  $('.owl-product-list-child').owlCarousel({
    loop: false,margin: 10,
    nav: true,
    dots:false,
    navText: [
      "<i class='fa fa-angle-left'></i>",
      "<i class='fa fa-angle-right'></i>"
    ],
    autoplay: true,
    autoplayHoverPause: true,
    responsive: {
      0: {
        items: 2
      },
      600: {
        items: 3
      },
      1000: {
        items: 5
      }
    }
  });
  $('.az-owl-one').owlCarousel({
    loop: true,
    margin: 0,
    nav: true,
    dots:false,
    navText: [
      "<i class='fa fa-angle-left'></i>",
      "<i class='fa fa-angle-right'></i>"
    ],
    autoplay: true,
    autoplayHoverPause: true,
    items: 1,
  });
  
});
