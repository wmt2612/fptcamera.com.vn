
/* pc */
let timeout = null;
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
            url: '/prods/search-ajax',
            type: 'GET',
            async: true,
            data: {
                keyword,
            },
            beforeSend: function () {
                $('.btn-search').html(
                    ` <i class="fa fa-spinner fa-spin" style="font-size: 15px"></i>`
                );
            },
            success: function (data) {
                $("#load-data").css("display", "block");
                $('.btn-search').html(
                    ` <i class="fas fa-search"></i>`
                );
                let htmlContent = [];
                data?.products?.forEach((item, index) => {
                    htmlContent.push(`
                <li><a href="/san-pham/${item.slug}">
                <div class="box_pr">
                <div class="img">
                    <img alt="logo" src="${item.base_image?.path}" />
                </div>
                <div class="content">
                     <div class="title"><b>${item.name}</b> </div>
                     <div class="price">
                     ${
                        item.contact_for_price
                            ?
                            '<p>Giá liên hệ</p>'
                            : item.selling_price.amount > 0
                                ?
                                `<p>${item.selling_price?.formatted}</p>
                          <span>${item.price?.formatted}</span>`
                                : `<p>${item.price?.formatted}</p>`
                    }
                     </div>
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