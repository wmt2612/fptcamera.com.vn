$(document).ready(function(){
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
    $(".open_tab-menu").click(function(e){
        e.preventDefault();

        $(this).closest(".menu_mobile").find(".category_mb").toggleClass("open_tab");
    });

});