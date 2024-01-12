import MediaPicker from './MediaPicker';

export default class {
    constructor() {
        $('.image-picker').on('click', (e) => {
            this.pickImage(e);
        });

        $('.image-picker-tiny').on('click', (e) => {
            console.log('a');
            this.pickImageOnTiny(e);
        });

        $('#pdf_file').on('click', (e) => {
            this.pickPdf(e);
        });
        this.sortable();
        this.removeImageEventListener();
    }

    pickImageOnTiny(e) {

        let picker = new MediaPicker({ type: 'image' });
        picker.on('select', (file) => {
            console.log(file.path);
            $('input[type = "url"]').val(file.path);
        });
    }

    pickImage(e) {
        let inputName = e.currentTarget.dataset.inputName;
        let multiple = e.currentTarget.hasAttribute('data-multiple');

        let picker = new MediaPicker({ type: 'image', multiple });

        picker.on('select', (file) => {
            this.addImage(inputName, file, multiple, e.currentTarget);
        });
    }

    pickPdf(e) {
        let picker = new MediaPicker({ type: 'application' });

        picker.on('select', (file) => {
            let host = window.location.origin
                ? window.location.origin + '/storage/'
                : window.location.protocol + '/' + window.location.host+ '/storage/';
            let path = file.path.split(host)[1];
            $('#pdf_file').val(path);
        });
    }

    addImage(inputName, file, multiple, target) {
        let html = this.getTemplate(inputName, file);

        if (multiple) {
            let multipleImagesWrapper = $(target).next('.multiple-images');

            multipleImagesWrapper.find('.image-holder.placeholder').remove();
            multipleImagesWrapper.find('.image-list').append(html);
        } else {
            $(target).siblings('.single-image').html(html);
        }
    }

    getTemplate(inputName, file) {
        return $(`
            <div class="image-holder">
                <img src="${file.path}">
                <button type="button" class="btn remove-image"></button>
                <input type="hidden" name="${inputName}" value="${file.id}">
            </div>
        `);
    }

    sortable() {
        let imageList = $('.image-list');

        if (imageList.length > 0) {
            Sortable.create(imageList[0], { animation: 150 });
        }
    }

    removeImageEventListener() {
        $('.image-holder-wrapper').on('click', '.remove-image', (e) => {
            e.preventDefault();

            console.log(e.currentTarget.dataset);
            let imageHolderWrapper = $(e.currentTarget).closest('.image-holder-wrapper');

            if (imageHolderWrapper.find('.image-holder').length === 1) {
                imageHolderWrapper.html(
                    this.getImagePlaceholder(e.currentTarget.dataset.inputName)
                );
            }

            $(e.currentTarget).parent().remove();
        });
    }

    getImagePlaceholder(inputName) {
        return `
            <div class="image-holder placeholder cursor-auto">
                <i class="fa fa-picture-o"></i>
                <input type="hidden" name="${inputName}">
            </div>
        `;
    }
}
