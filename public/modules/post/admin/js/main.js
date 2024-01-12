function convertToSlug(str){
    return str.toLowerCase().replace(/ /g,'-').replace(/[^\w-]+/g,'');
}
function removeVietnameseTones(str) {
    str = str.replace(/à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ/g,"a");
    str = str.replace(/è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ/g,"e");
    str = str.replace(/ì|í|ị|ỉ|ĩ/g,"i");
    str = str.replace(/ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ/g,"o");
    str = str.replace(/ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ/g,"u");
    str = str.replace(/ỳ|ý|ỵ|ỷ|ỹ/g,"y");
    str = str.replace(/đ/g,"d");
    str = str.replace(/À|Á|Ạ|Ả|Ã|Â|Ầ|Ấ|Ậ|Ẩ|Ẫ|Ă|Ằ|Ắ|Ặ|Ẳ|Ẵ/g, "A");
    str = str.replace(/È|É|Ẹ|Ẻ|Ẽ|Ê|Ề|Ế|Ệ|Ể|Ễ/g, "E");
    str = str.replace(/Ì|Í|Ị|Ỉ|Ĩ/g, "I");
    str = str.replace(/Ò|Ó|Ọ|Ỏ|Õ|Ô|Ồ|Ố|Ộ|Ổ|Ỗ|Ơ|Ờ|Ớ|Ợ|Ở|Ỡ/g, "O");
    str = str.replace(/Ù|Ú|Ụ|Ủ|Ũ|Ư|Ừ|Ứ|Ự|Ử|Ữ/g, "U");
    str = str.replace(/Ỳ|Ý|Ỵ|Ỷ|Ỹ/g, "Y");
    str = str.replace(/Đ/g, "D");
    // Some system encode vietnamese combining accent as individual utf-8 characters
    // Một vài bộ encode coi các dấu mũ, dấu chữ như một kí tự riêng biệt nên thêm hai dòng này
    str = str.replace(/\u0300|\u0301|\u0303|\u0309|\u0323/g, ""); // ̀ ́ ̃ ̉ ̣ huyền, sắc, ngã, hỏi, nặng
    str = str.replace(/\u02C6|\u0306|\u031B/g, ""); // ˆ ̆ ̛ Â, Ê, Ă, Ơ, Ư
    // Remove extra spaces
    // Bỏ các khoảng trắng liền nhau
    str = str.replace(/ + /g," ");
    str = str.trim();
    // Remove punctuations
    // Bỏ dấu câu, kí tự đặc biệt
    str = str.replace(/!|@|%|\^|\*|\(|\)|\+|\=|\<|\>|\?|\/|,|\.|\:|\;|\'|\"|\&|\#|\[|\]|~|\$|_|`|-|{|}|\||\\/g," ");
    return str;
}

function seo_check(){
    var meta_keyword = $('#meta-keyword').val().split(",");
    var meta_title = '';
    var meta_description = '';
    var content = '';
    var content_html = '';
    if($('#meta-title').val()){
        meta_title = removeVietnameseTones( $('#meta-title').val().toLowerCase() );
    }
    if($('#meta-description').val()){
        meta_description = removeVietnameseTones( $('#meta-description').val().toLowerCase() );
    }
    if( tinyMCE.get("content").getContent() ){
        content = removeVietnameseTones( tinyMCE.get("content").getContent({format : 'text'}).toLowerCase() );

        content_html = tinyMCE.get("content").getContent().toLowerCase();
    }

    var doc = new DOMParser().parseFromString(content_html, 'text/html');

    var list_tag_heading = doc.querySelectorAll('h1, h2, h3, h4, h5, h6');

    var length_word_content = content.split(' ').length;
    var flag_title = false;
    var flag_description = false;
    var flag_content = false;
    var flag_length_word_content = false;
    var flag_slug = false;
    var flag_key_word_heading = false;
    meta_keyword.forEach(function(item, index){
        var item_convert = removeVietnameseTones(item.toLowerCase());
        if(meta_title.includes(item_convert) && item_convert != ''){
            flag_title = true;
        }
        if(meta_description.includes(item_convert) && item_convert != ''){
            flag_description = true;
        }
        if( (content.startsWith(item_convert) || content.includes(item_convert)) && item_convert != ''){
            flag_content = true;
        }
        if(length_word_content >= 600){
            flag_length_word_content = true;
        }
        if(convertToSlug(meta_title).includes(item_convert) && item_convert != '' ){
            flag_slug = true;
        }

        if(list_tag_heading.length > 0){
            for (let i = 0; i < list_tag_heading.length; i++) {
                if( removeVietnameseTones(list_tag_heading[i].textContent).includes(item_convert) && item_convert != '' ){
                    flag_key_word_heading = true;
                }
            }
        }
    });

    // Check SEO title
    if(flag_title) {
        $('.seo-check-keywordInTitle i').removeClass('fa-times-circle');
        $('.seo-check-keywordInTitle i').addClass('fa-check-circle');
    }else{
        $('.seo-check-keywordInTitle i').removeClass('fa-check-circle');
        $('.seo-check-keywordInTitle i').addClass('fa-times-circle');
    }

    // Check SEO description
    if(flag_description) {
        $('.seo-check-keywordInMetaDescription i').removeClass('fa-times-circle');
        $('.seo-check-keywordInMetaDescription i').addClass('fa-check-circle');
    }else{
        $('.seo-check-keywordInMetaDescription i').removeClass('fa-check-circle');
        $('.seo-check-keywordInMetaDescription i').addClass('fa-times-circle');
    }

    // Check SEO content
    if(flag_content) {

        $('.seo-check-keywordIn10Percent i').removeClass('fa-times-circle');
        $('.seo-check-keywordIn10Percent i').addClass('fa-check-circle');

        $('.seo-check-keywordInContent i').removeClass('fa-times-circle');
        $('.seo-check-keywordInContent i').addClass('fa-check-circle');
    }else{
        $('.seo-check-keywordIn10Percent i').removeClass('fa-check-circle');
        $('.seo-check-keywordIn10Percent i').addClass('fa-times-circle');

        $('.seo-check-keywordInContent i').removeClass('fa-check-circle');
        $('.seo-check-keywordInContent i').addClass('fa-times-circle');
    }

    // Check length word content
    if(flag_length_word_content) {
        $('.seo-check-lengthContent i').removeClass('fa-times-circle');
        $('.seo-check-lengthContent i').addClass('fa-check-circle');
    }else{
        $('.seo-check-lengthContent i').removeClass('fa-check-circle');
        $('.seo-check-lengthContent i').addClass('fa-times-circle');
    }

    // Check seo slug
    if(flag_slug) {
        $('.seo-check-keywordInPermalink i').removeClass('fa-times-circle');
        $('.seo-check-keywordInPermalink i').addClass('fa-check-circle');
    }else{
        $('.seo-check-keywordInPermalink i').removeClass('fa-check-circle');
        $('.seo-check-keywordInPermalink i').addClass('fa-times-circle');
    }

    // Check seo heading key word
    if(flag_key_word_heading) {
        $('.seo-check-keywordInHeadingContent i').removeClass('fa-times-circle');
        $('.seo-check-keywordInHeadingContent i').addClass('fa-check-circle');
    }else{
        $('.seo-check-keywordInHeadingContent i').removeClass('fa-check-circle');
        $('.seo-check-keywordInHeadingContent i').addClass('fa-times-circle');
    }
}
$(document).ready(function(){
    $('#meta-keyword').tagsinput({
        confirmKeys: [13, 188]
    });
    $('#meta-keyword').on('keypress', function(e){
        if (e.keyCode == 13){
            e.keyCode = 188;
            e.preventDefault();
        };
    });
    // tinyMCE.activeEditor.on('keyup', function (e) {
    //     seo_check();
    // });
    tinyMCE.activeEditor.on('change', function (e) {
        seo_check();
    });
    $('#meta-keyword').on('itemAdded', function(event){
        seo_check();
    });
    $('#meta-keyword').on('itemRemoved', function(){
        seo_check();
    });
    $('#meta-title').on('change', function(){
        seo_check();
    });
    $('#meta-descripiton').on('change', function(){
        seo_check();
    });
});
$(document).ready(function(){
    $('#preview').click(function(){
        const title = $('#name').val();
        var is_toc = 0;
        if($('#is_toc').is(':checked')){
            is_toc = 1;
        }
        var data = tinyMCE.get("content").getContent({format: 'html'});
        $.ajax({
            method:'POST',
            data: {
                data,
                title,
                is_toc
            },
            dataType: 'html',
            url: '{{ route("pages.post.redirectPreview") }}',
            success: function(respone){
                window.open( '{{ route("pages.post.preview") }}', '_blank');
            }
        });
    });
    $('#saveDraft').click(function(){
        $('#is_active').prop('checked', false);
    });
    $('#savePublish').click(function(){
        $('#is_active').prop('checked', true);
    });
});
