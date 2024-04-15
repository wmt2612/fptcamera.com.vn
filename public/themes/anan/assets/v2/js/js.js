$(document).ready(function(){
  // slider banner home
  $('.banner_slide ul').slick({
    dots: false,
    infinite: false,
    speed: 300,
    slidesToShow: 1,
    slidesToScroll: 1,
  });

  //slider product product_slider
  $('.product_slider').slick({
    dots: false,
    infinite: false,
    speed: 300,
    slidesToShow: 5,
    slidesToScroll: 1,
    responsive: [
      {
        dots: false,
        breakpoint: 1024,
        settings: {
          slidesToShow: 3,
          slidesToScroll: 1,
          infinite: true,
          dots: false
        }
      },
      {
        dots: false,
        breakpoint: 480,
        settings: {
          slidesToShow: 2,
          slidesToScroll: 1
        }
      }
    ]
  });
  //slider phụ kiện accessory_slider
  $('.accessory_slider').slick({
    dots: false,
    infinite: false,
    speed: 300,
    slidesToShow: 6,
    slidesToScroll: 1,
    responsive: [
      {
        breakpoint: 1024,
        settings: {
          slidesToShow: 4,
          slidesToScroll: 1,
          infinite: true,
          dots: false
        }
      },
      {
        dots: false,
        breakpoint: 480,
        settings: {
          slidesToShow: 3,
          slidesToScroll: 1
        }
      }
    ]
  });
  // slider news
  $('.news_slider').slick({
    dots: false,
    infinite: false,
    speed: 300,
    slidesToShow: 4,
    slidesToScroll: 1,
    responsive: [
      {
        dots: false,
        breakpoint: 1024,
        settings: {
          slidesToShow: 3,
          slidesToScroll: 1,
          infinite: true,
          dots: false
        }
      },
      {

        breakpoint: 480,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1
        }
      }
    ]
  });
  // menu drop
  $(".category_item").hover(function(){
    $(this).addClass('open');
    $(this).find('.sub-menu').addClass('add');
  }, function(){
    $(this).removeClass('open');
    // $(this).find('.sub-menu').css('display','none');
  });

  // menu scroll
  window.onscroll = function() {scrollFunction()};

  // tesst

  function scrollFunction() {
    if (document.body.scrollTop > 0 || document.documentElement.scrollTop > 0) {
      $('#header').addClass('scroll');
      $('.box_category .category').addClass('scroll_none');
    } else {
      $('#header').removeClass('scroll');
      $('.box_category .category').removeClass('scroll_none');
    }
    if (document.body.scrollTop > 100 || document.documentElement.scrollTop > 100) {
      document.getElementById("scroll_bt").style.display = "block";
    } else {
      document.getElementById("scroll_bt").style.display = "none";
    }
  }
  $(".box_category").hover(function(){
    $(this).parent().parent().parent().parent().parent().parent().find('.body-overlay').addClass('none');
    $(this).find('.category').addClass('open_menu');
  },function(){
    $(this).parent().parent().parent().parent().parent().parent().find('.body-overlay').removeClass('none');
    $(this).find('.category').removeClass('open_menu');
  });
  // nút scroll
  document.getElementById('scroll_bt').addEventListener("click", function(){
    document.body.scrollTop = 0;
    document.documentElement.scrollTop = 0;
  });

  // menu mobile
  $(".open_tab-menu").click(function(){
    if($(this).parent().parent().find('.category_mb').hasClass('open_tab')){
      $(this).parent().parent().find('.category_mb').removeClass('open_tab')
    } else {
      $(this).parent().parent().find('.category_mb').addClass('open_tab')
    }

  });
});

      