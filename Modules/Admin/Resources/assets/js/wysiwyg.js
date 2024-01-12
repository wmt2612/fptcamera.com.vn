import tinyMCE from 'tinymce';

tinyMCE.baseURL = `${FleetCart.baseUrl}/modules/admin/js/wysiwyg`;


tinyMCE.init({
    selector: '.wysiwyg',
    valid_elements : '*[*]',
    // theme: 'silver',
    // mobile: { theme: 'mobile' },
    height: 400,
    menubar: false,
    branding: false,
    image_advtab: true,
    automatic_uploads: true,
    media_alt_source: false,
    media_poster: false,
    relative_urls: false,
    toolbar_mode: 'wrap',
    fontsize_formats: "8pt 9pt 10pt 11pt 12pt 14pt 18pt 24pt 30pt 36pt 48pt 60pt 72pt 96pt",
    directionality: FleetCart.rtl ? 'rtl' : 'ltr',
    cache_suffix: `?v=${FleetCart.version}`,
    plugins: 'lists, link, table, image, media, paste, autosave, autolink, wordcount, fullscreen, textcolor, colorpicker, code',
    toolbar: 'styleselect fontsizeselect forecolor backcolor bold italic underline shortcode | bullist numlist | blockquote alignleft aligncenter alignright alignjustify| outdent indent | image media link table | code fullscreen',
    // content_css: '/themes/fpt/assets/css/vendor/bootstrap.min.css, /themes/fpt/assets/css/style.css',
    // content_style: `.circle-ihome .item-circle-ihome{ border-radius: 50%;
    //     background: #f6c230;
    //     width: 111px;
    //     height: 111px;
    //     display: table;
    //     margin: 0 auto 15px;
    //     position: relative;
    // }`,
    file_picker_callback: function(callback, value, meta) {
        if (meta.filetype == 'image') {
            $('.image-picker-tiny').trigger('click');
        }
    },
    images_upload_handler(blobInfo, success, failure) {
        let formData = new FormData();
        formData.append('file', blobInfo.blob(), blobInfo.filename());

        $.ajax({
            method: 'POST',
            url: route('admin.media.store'),
            data: formData,
            processData: false,
            contentType: false,
        }).then((file) => {
            success(file.path);
        }).catch((xhr) => {
            failure(xhr.responseJSON.message);
        });
    },
    setup: function (editor) {
        editor.ui.registry.addMenuButton('shortcode', {
            text: 'Shortcode',
            fetch: function (callback) {
                var items = [
                    {
                        type: 'menuitem',
                        text: 'Xem Thêm',
                        onAction: function (_) {
                            editor.insertContent(`[view_more][/view_more]`)
                        }
                    }
                ];
                callback(items);
            },
        });
    },
});
