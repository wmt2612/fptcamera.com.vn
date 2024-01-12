jQuery(document).ready(function($){
	$('body:not(.home) .topbar-bottom-left,body:not(.home) .az-megamenu').hover(
      function() {
        $( '.az-wp' ).addClass( "over" );
      }, function() {
        $( '.az-wp' ).removeClass( "over" );
      }
    );

    $('.az-megamenu>ul>li').hover(
      function() {
        $(this).addClass( "arrow-show" );
      }, function() {
        $(this).removeClass( "arrow-show" );
      }
    );

$('.az-short li label').click(function(){
    $('.az-short li label').removeClass('active');
    $(this).addClass('active');
});

// filter sidebar
$(".filter-checkbox").on('change',function() {
    $('.az-archive-sidebar-product .az-sidebar-left').removeClass('show');
      if($(this).data('name') == "order"){
            $('.az-short .filter-checkbox').prop('checked', false);
            $(this).prop('checked', true);
        };
        if(this.checked && $(this).data('name') == "price"){
            $('.az-filter-price .filter-checkbox').prop('checked', false);
            $(this).prop('checked', true);
            
        }
        ajax_archive_load_product();

});
//filter paghinate

$("body").on("click",".az-pagination-ajax a",function(){
    var page_num = parseInt($(this).text());    
    if(isNaN(page_num)){
        page_num = parseInt(GetURLParameter('paged',$(this).attr('href')));
    }
    if(isNaN(page_num)){
        var pageURL = $(this).attr('href');
        pageURL = pageURL.substring(0, pageURL.length - 1)
        page_num = parseInt(pageURL.substr(pageURL.lastIndexOf('/') + 1));
    }
    if(typeof page_num === 'number'){
        ajax_archive_load_product(page_num);
    };
    return false;
})

    

    function ajax_archive_load_product(page = 1){
        var para ="";            
        var $boxes = $('.az-filter-price input:checked');
        $boxes.each(function(){
            para = para + "+min_price|" + $(".az-filter-price").find("input:checkbox:checked").data('min_price') + "+max_price|" + $(".az-filter-price").find("input:checkbox:checked").data('max_price');
        });                      
        var para1 = "";
        $('.az-short').find("input:checkbox:checked").each(function() {
            para1 = "order|"+$(this).data('filter');
        })
        para = para +"+"+ para1;
        para = para.substr(1);

        var ids_term = "";
        var data = "";
        $('.az-filter:not(".az-filter-price"):not(".az-short")').each(function() {
             
            $(this).has("input:checkbox:checked").each(function() {
                ids_term = "";
                $(this).find("input:checkbox:checked").each(function() {
                    ids_term = ids_term +","+$(this).data('filter');
                })
                data = data + "-" + ids_term.substr(1);
            
            })
                   
        }); 
        if(data != ""){para = para +"+data|"+ data.substr(1);}      
        para = para +"+cat|"+$("#az_product_catid").val();
            if (history.pushState) {
               var newurl = window.location.protocol + "//" + window.location.host + window.location.pathname + '?filter='+para;
                 window.history.pushState({path:newurl},'',newurl);
            }
            $.ajax({
                url: ajax.url,
                type: "post",
                dataType: "text",
                data: {                  
                    action: 'load_search_result',                             
                    filter:GetURLParameter('filter'),
                    paged:page,                        
                },
                 beforeSend: function() {
                    $('#az-main-archive').addClass("loading");
                    $('.filter-checkbox').attr("disabled", true);
                   
                },
                success: function(html) {
                     $('#az-main-archive .az-content').html(html);
                     $("html, body").animate({ scrollTop: $("#az-main-archive").offset().top - 60 }, "slow");
                     $('#az-main-archive').removeClass("loading");
                     $('.filter-checkbox').removeAttr("disabled");
                     $('body').removeClass('overflow');
                },
            });
    }

    //archive product filter from url
    var filter = GetURLParameter('filter');
    if(filter){
        filter = filter.split("+");
        var data = filter[1].split("|")[1];
        data = data.replace("-", ",");
        data = data.split(",");
        $.each(data, function( index, value ) {           
            $(".filter-checkbox[data-filter='"+ value + "']").prop( "checked", true );            
        });
    }

    $('.az-advance-filter').click(function(){
        $('.az-archive-sidebar-product .az-sidebar-left').addClass('show');
        $("body").addClass('overflow');        
    })
    $('.az-advance-filter-close').click(function(){
        $('.az-archive-sidebar-product .az-sidebar-left').removeClass('show');
        $("body").removeClass('overflow');        
    })

    

    $(".content-post iframe").wrap("<div class='video-wrapper'></div>");

    var url = window.location.pathname;
    $('.az-row-tvkh ul li a').each(function(){
        if($(this).attr('href') == url) {
            $(this).addClass('active');
        }
    });

    $(".az-menu-tag ul").prepend("<li><span>Tìm kiếm nhiều:</span></li>");
   

})/*end ready*/

function GetURLParameter(sParam,url) {
    var sPageURL = window.location.search.substring(1);
    var sURLVariables = sPageURL.split('?');
    for (var i = 0; i < sURLVariables.length; i++){
        var sParameterName = sURLVariables[i].split('=');
        if (sParameterName[0] == sParam)
        {
            return sParameterName[1];
        }
    }
}


  


