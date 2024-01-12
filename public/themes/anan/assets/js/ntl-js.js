jQuery(document).ready(function($) {
  $('.az_ntl_list_product_owl').owlCarousel({
    loop: false,
    margin: 0,
    nav: false,
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
        items: 4
      }
    }
  });
  $('.owl-qc').owlCarousel({
    loop: true,
    margin: 10,
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
        items: 4
      },
      1000: {
        items: 6
      }
    }
  });
  $('.owl-related-product').owlCarousel({
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
        items: 4
      },
      1000: {
        items: 4
      }
    }
  });
  $('.az_list_cat_owl').owlCarousel({
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
        items: 6
      },
      1000: {
        items: 6
      }
    }
  });  

  $('.az_list_product_kem_owl').owlCarousel({
    loop: false,
    margin: 0,
    nav: false,
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
        items: 4
      },
      1000: {
        items: 4
      }
    }
  });
  $( "button.btn-close" ).click(function() {
    $("#az-sidenav-menu").removeClass('open'); 
    $("body").removeClass('overflow');   
  });
  $("ul.az-nav-support a.dropdown-toggle").closest("li").addClass('has-child');
  $( "ul.az-nav-support li.has-child" ).hover(
    function() {
      $( this ).addClass('show');
      $( this ).find('div.dropdown-menu').addClass('show');
    }, function() {
      $( this ).removeClass('show');
      $( this ).find('div.dropdown-menu').removeClass('show');
    }
  );
  $( ".title-menu" ).click(function() {
    $(this).find('ul.sub-menu').addClass('opensub');
    $(this).closest('#az-sidenav-menu').addClass('overflowParent');
    $('ul.sub-menu > li > ul.sub-menu').removeClass('opensub');    
  });
  $( ".support" ).click(function() {
    $(this).find('ul.sub-menu').addClass('opensub');
    $(this).closest('#az-sidenav-menu').addClass('overflowParent');
    $('ul.sub-menu > li > ul.sub-menu').removeClass('opensub');    
  });
  $( "li.back-to-parent" ).click(function() {
    $('#az-sidenav-menu').removeClass('overflowParent');
    $(this).closest('ul.sub-menu').removeClass('opensub');
    return false;    
  });
  $( "ul.nav > li.title-menu > ul.sub-menu > li.menu-item-has-children > a" ).append('<i class="fa fa-angle-down" aria-hidden="true"></i>');  
  $( "ul.nav > li.title-menu > ul.sub-menu > li.menu-item-has-children > a > i" ).click(
    function(e) {
        e.preventDefault()
        $(this).closest('li').find('ul.sub-menu').toggle(100);                              
    }
  );


  $( "ul.nav > li.title-menu > ul.sub-menu > li.menu-item-has-children > ul.sub-menu > li.menu-item-has-children > a" ).append('<i class="fa fa-angle-down" aria-hidden="true"></i>');  
  $( "ul.nav > li.title-menu > ul.sub-menu > li.menu-item-has-children > ul.sub-menu > li.menu-item-has-children > a > i" ).click(
    function(e) { 
      e.preventDefault()
      $(this).closest('li').find('ul.sub-menu').addClass('importantRule');        
    }
  );

  var flag=0;
  $( ".az-btn-load-more a" ).click(function(){
        $('.tabs-mota').toggle(function(){
            if(flag++ % 2 === 0){
              $('.tabs-mota').css({'height': '100%','display':'block'});
              $('.tabs-mota').removeClass('loadmore');
              $(".az-btn-load-more a" ).text('Rút gọn');
              $('html, body').animate({
                scrollTop: $("div.tabs-mota").offset().top
              },1000);
            }else{
              $('.tabs-mota').css({'height': '200px','display':'block'});
              $('.tabs-mota').addClass('loadmore');
              $(".az-btn-load-more a" ).text('Xem thêm');
              $('html, body').animate({
                scrollTop: $("div.loadmore").offset().top
              },1000);
             
            }
        });
        return false;
  });





  /*$( "a.btn-load-more" ).toggle(
    
     function() {
      $('.tabs-mota').animate({

      })
      
      $('.tabs-mota').css({'height': '100%'});
      $('.tabs-mota').removeClass('loadmore');
      $( "a.btn-load-more" ).text('Rút gọn');
      $('html, body').animate({
        scrollTop: $("div.loadmore").offset().top
      },1000);
    },
    
    
    function() {        
      $('.tabs-mota').css({'height': '200px'});
      $('.tabs-mota').addClass('loadmore');
      $( "a.btn-load-more" ).text('Xem thêm');
      $('html, body').animate({
			scrollTop: $("div.loadmore").offset().top - 100
		},1000);
        
    });*/
  
  $("button.az-sidenav").click(  
    function(){
     
        $("#az-sidenav-menu").addClass('open');        
        $("body").addClass('overflow');
          
    },
  );
  // const $menu = $('#az-sidenav-menu');
  // const $submenu = $('.sub-menu.opensub');
  // $(document).mouseup(function (e) {
  //   if (!$menu.is(e.target) && $menu.has(e.target).length === 0){
  //     $menu.removeClass('open');
  //     $("body").removeClass('overflow');     
  //     return false;
  //   }
  // });
  $(window).scroll(function(){
    if ($(this).scrollTop() > 60) {         
      $('.az-menu-mobile').addClass('fixed');
    } else {         
      $('.az-menu-mobile').removeClass('fixed');
    }
  });
  $(window).scroll(function(){
    if ($(this).scrollTop() > 120) {         
      $('.topbar-bottom').addClass('fixed');
	  // $("#stick_menu_pc").html('');
	  $("#menu-menu-danh-muc-san-pham").appendTo("#stick_menu_pc");
    } else {         
      $('.topbar-bottom').removeClass('fixed');
    }
  });
  var current_width = $(window).width();
	if(current_width > 700){
		if( $(".az-megamenu").length ){
			$("#menu-menu-danh-muc-san-pham").appendTo(".az-megamenu");
		}
	  $(window).scroll(function() {    
      var scroll = $(window).scrollTop();       
      if (scroll >= 800) {          
        $(".stick-box-widget").addClass("sticked");
      }else{
        $(".stick-box-widget").removeClass("sticked");
      }
	  });
	}else{
		$(window).scroll(function() {    
      var scroll = $(window).scrollTop();       
      if (scroll >= 800) {          
          $(".btn-buynow-mobile").addClass("sticked");
      }else{
          $(".btn-buynow-mobile").removeClass("sticked");
      }
  	});
	}
  $('.bg_content_info_woo > .container').addClass('bg');
  $("#idcheckhd").change(function() {
    $('#validate-tencongty').hide();
    $('#validate-diachicongty').hide();
    $('#validate-masothue').hide();
    if(this.checked) {
      $('.thong-tin-hoa-don').addClass('visible');
      $( "#tencongty" ).focusout(function() {
        var val = $('#tencongty').val();
        if(val == ''){       
          $(this).css('border','1px solid red');
          $('#validate-tencongty').show();
          
        }else{
          $('#validate-tencongty').hide();
          $(this).css('border-color','green');
        }
      });
      $( "#diachicongty" ).focusout(function() {
        var val = $('#diachicongty').val();
        if(val == ''){       
          $(this).css('border','1px solid red');
          $('#validate-diachicongty').show();
          
        }else{
          $('#validate-diachicongty').hide();
          $(this).css('border-color','green');
        }
      });
      $( "#masothue" ).focusout(function() {
        var val = $('#masothue').val();
        if(val == ''){       
          $(this).css('border','1px solid red');
          $('#validate-masothue').show();
          
        }else{
          $('#validate-masothue').hide();
          $(this).css('border-color','green');
        }
      });
      var str = "";
      $(function(){        
        $('.thong-tin-hoa-don :input').change(function(e){
          var tencongty = $("#tencongty").val();
          var diachicongty = $("#diachicongty").val();
          var masothue = $("#masothue").val();
          str = 'Tên công ty: ' + tencongty + '</br>' + 'Địa chỉ công ty: ' + diachicongty + '</br>' + 'Mã số thuế: ' + masothue;
          $("#get_info_hd").val(str);
        });
      });

    }else{
      $('.thong-tin-hoa-don').removeClass('visible');
      $("#get_info_hd").val() = 'Đơn hàng này không xuất hoá đơn';
    }
  });  

  /* pc */
  var timeout = null; 
  $(".search-ajax").keyup(function(){ 
      clearTimeout(timeout); 
      timeout = setTimeout(function (){            
         call_ajax(); 
      }, 200);
  });
  function call_ajax() { 
    var keyword = $('.search-ajax').val(); 
    if(keyword.length >= 2){
      $.ajax({
        url: route('product.search.ajax'),
        type: 'GET',
        async: true,
        data: {
            keyword,
        },
        beforeSend: function () {
          $('.btn-search').html(
            ` <i class="fa fa-spinner fa-spin" style="font-size: 15px"></i> <span>Đang tìm kiếm</span>`
          );
        },
        success: function (data) {
            $("#load-data").css("display", "block");
            $('.btn-search').html(
              ` <i class="fa fa-search" aria-hidden="true"></i> <span>Tìm kiếm</span>`
            );
            let htmlContent = [];  
            data?.products?.forEach((item, index) => {
                htmlContent.push(`
                <li><a href="/san-pham/${item.slug}">
                <div class="row">
                <div class="col-md-2">
                    <img alt="logo" width="50" src="${item.base_image?.path}" />
                </div>
                <div class="col-md-10 prod-info">
                    <b>${item.name}</b> 
                     <p class="price">
                     ${
                      item.contact_for_price 
                      ? 
                        '<span>Giá liên hệ</span>' 
                      : item.selling_price.amount > 0 
                      ? 
                        `<span>${item.selling_price?.formatted}</span>
                          <del>${item.price?.formatted}</del>`
                      : `<span>${item.price?.formatted}</span>`
                     }
                     </p>
                </div>
                </li>
              `);
            })
            if(htmlContent.length === 0) {
              htmlContent.push(`
                <li>Không có kết quả phù hợp</li>
              `);
            }
            $("#load-data").html(`<ul>${htmlContent.join('')}</ul>`);
        },
      });
    }else{          
      $("#load-data").css("display", "none");
    }
  }
  /* end pc */
  /* mobile */
  var timeoutmobile = null; 
  $(".search-ajax-mobile").keyup(function(){ 
    clearTimeout(timeoutmobile); 
    timeoutmobile = setTimeout(function (){            
       call_ajax_mobile(); 
    }, 200);
  });
  function call_ajax_mobile() { 
    var keyword = $('.search-ajax-mobile').val(); 
    if(keyword.length >= 2){
      $.ajax({
        url: route('product.search.ajax'),
        type: 'GET',
        async: true,
        data: {
          keyword
        },
        beforeSend: function () {
          $('.az-btn-search').html(
            ` <i class="fa fa-spinner fa-spin" style="font-size: 15px"></i>`
          );
        },
        success: function (data) {
          $("#load-data-mobile").css("display", "block");
          $('.az-btn-search').html(
            ` <i class="fa fa-search" aria-hidden="true"></i>`
          );

          let htmlContent = [];  
          data?.products?.forEach((item, index) => {
              htmlContent.push(`
              <li><a href="/san-pham/${item.slug}">
              <div class="row">
              <div class="col-md-2">
                  <img alt="logo" width="50" src="${item.base_image?.path}" />
              </div>
              <div class="col-md-10 prod-info">
                  <b>${item.name}</b> 
                   <p class="price">
                   ${
                    item.contact_for_price 
                    ? 
                      '<span>Giá liên hệ</span>' 
                    : item.selling_price.amount > 0 
                    ? 
                      `<span>${item.selling_price?.formatted}</span>
                        <del>${item.price?.formatted}</del>`
                    : `<span>${item.price?.formatted}</span>`
                   }
                   </p>
              </div>
              </li>
            `);
          })
          if(htmlContent.length === 0) {
            htmlContent.push(`
              <li>Không có kết quả phù hợp</li>
            `);
          }
          $("#load-data-mobile").html(`<ul>${htmlContent.join('')}</ul>`);
        }
      });
    }else{          
      $("#load-data-mobile").css("display", "none");
    }
  }
  /* end mobile */
  const $container = $('#load-data');
  $(document).mouseup(function (e) {
    if (!$container.is(e.target) && $container.has(e.target).length === 0){
     $container.hide();
     return false;
    }
  });
  $(window).scroll(function(){
    if ($(this).scrollTop() > 100) {
      $('.scrollup').fadeIn();
    } else {
      $('.scrollup').fadeOut();
    }
  });
  $('.scrollup').click(function(){
    $("html, body").animate({ scrollTop: 0 }, 600);
    return false;
  });

  
  
 //  	$(".search-ajax-mobile").focus(function(){
	//  	$(this).closest('div.search-form-mobile').animate({width: "80%"}, 200 );
	//  	$(".az-navbar-brand").hide();		
	// }).blur(function(){
 //      var interval_obj = setInterval(function(){
 //        $(this).closest('div.search-form-mobile').animate({width: "50%"}, 200 );
 //        $(".az-navbar-brand").show();
 //      clearInterval(interval_obj);
 //      }, 100);
	    
	// })

  	const $filter_left = $('.az-archive-sidebar-product .az-sidebar-left');    
    $(document).on('mouseup touchstart', function (e) {
        if (!$filter_left.is(e.target) && $filter_left.has(e.target).length === 0){
          $filter_left.removeClass('show'); 
          $("body").removeClass('overflow');
          return false;
        }
    });
    
    $('.content-post table').addClass('table table-bordered az-table');
    $('.content-tabs.tabs-mota table').addClass('table table-bordered az-table');

    $('.category .navigation ul li:first-child a').text('«');
    $('.category .navigation ul li:last-child a').text('»');
})

   

function getId(url) {
    var regExp = /^.*(youtu.be\/|v\/|u\/\w\/|embed\/|watch\?v=|\&v=)([^#\&\?]*).*/;
    var match = url.match(regExp);

    if (match && match[2].length == 11) {
        return match[2];
    } else {
        return 'error';
    }
}

var videoId = getId('http://www.youtube.com/watch?v=zbYf5_S7oJo');

var iframeMarkup = '<iframe width="560" height="315" src="//www.youtube.com/embed/' 
    + videoId + '" frameborder="0" allowfullscreen></iframe>';