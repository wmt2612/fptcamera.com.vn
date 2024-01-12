import CategoryServiceTree from './CategoryServiceTree';

export default class {

    constructor() {
        let tree = $('.categoryservice-tree');

        new CategoryServiceTree(this, tree);

        this.collapseAll(tree);
        this.expandAll(tree);
        this.addRootCatgeoryService();
        this.addSubGroup();

        $('#categoryservice-form').on('submit', this.submit);

    }

    collapseAll(tree) {
        $('.collapse-all').on('click', (e) => {
            e.preventDefault();

            tree.jstree('close_all');
        });
    }

    expandAll(tree) {
        $('.expand-all').on('click', (e) => {
            e.preventDefault();

            tree.jstree('open_all');
        });
    }

    addRootCatgeoryService() {
        $('.add-root-categoryservice').on('click', () => {
            this.loading(true);

            $('.add-sub-categoryservice').addClass('disabled');

            $('.categoryservice-tree').jstree('deselect_all');

            this.clear();

            // Intentionally delay 150ms so that user feel new form is loaded.
            setTimeout(this.loading, 150, false);
        });
    }

    addSubGroup() {
        $('.add-sub-categoryservice').on('click', () => {
            let selectedId = $('.categoryservice-tree').jstree('get_selected')[0];

            if (selectedId === undefined) {
                return;
            }

            this.clear();
            this.loading(true);

            window.form.appendHiddenInput('#categoryservice-form', 'parent_id', selectedId);

            // Intentionally delay 150ms so that user feel new form is loaded.
            setTimeout(this.loading, 150, false);
        });
    }

    fetchCategoryService(id) {
        this.loading(true);

        $('.add-sub-categoryservice').removeClass('disabled');

        $.ajax({
            type: 'GET',
            url: route('admin.category_services.show', id),
            success: (categoryservices) => {
                this.update(categoryservices);

                this.loading(false);
            },
            error: (xhr) => {
                error(xhr.responseJSON.message);

                this.loading(false);
            },
        });
    }

    update(categoryservices) {
        window.form.removeErrors();

        $('.btn-delete').removeClass('hide');
        $('.form-categoryservice .help-block').remove();

        $('#confirmation-form').attr('action', route('admin.category_services.destroy', categoryservices.id));

        $('#id-field').removeClass('hide');

        $('#id').val(categoryservices.id);
        $('#name').val(categoryservices.name);

        $('input[name="meta[meta_title]"]').val(categoryservices.meta.meta_title);

        $('input[name="meta[meta_description]"]').val(categoryservices.meta.meta_description);

        $('#slug').val(categoryservices.slug);
        if (categoryservices.intro) {
            tinyMCE.get('intro').setContent(categoryservices.intro);
        } else {
            tinyMCE.get('intro').setContent('');
        }
        // $('#intro').val(categoryservices.intro);
        $('#slug-field').removeClass('hide');
        $('.categoryservice-details-tab .seo-tab').removeClass('hide');

        $('#is_searchable').prop('checked', categoryservices.is_searchable);
        $('#is_active').prop('checked', categoryservices.is_active);

        $('.logo .image-holder-wrapper').html(this.categoryImage('logo', categoryservices.logo));
        $('.banner .image-holder-wrapper').html(this.categoryImage('banner', categoryservices.banner));

        $('#categoryservice-form input[name="parent_id"]').remove();
    }

    categoryImage(fieldName, file) {
        if (! file.exists) {
            return this.imagePlaceholder();
        }

        return `
            <div class="image-holder">
                <img src="${file.path}">
                <button type="button" class="btn remove-image" data-input-name="files[${fieldName}]"></button>
                <input type="hidden" name="files[${fieldName}]" value="${file.id}">
            </div>
        `;
    }

    imagePlaceholder() {
        return `
            <div class="image-holder placeholder">
                <i class="fa fa-picture-o"></i>
            </div>
        `;
    }

    clear() {
        $('#id-field').addClass('hide');

        $('#id').val('');
        $('#name').val('');
        // $('#intro').val('');
        tinyMCE.get('intro').setContent('');
        $('#slug').val('');
        $('#slug-field').addClass('hide');
        // $('.categoryservice-details-tab .seo-tab').addClass('hide');

        $('#is_searchable').prop('checked', false);
        $('#is_active').prop('checked', false);

        $('.logo .image-holder-wrapper').html(this.imagePlaceholder());
        $('.banner .image-holder-wrapper').html(this.imagePlaceholder());


        $('.btn-delete').addClass('hide');
        $('.form-categoryservice .help-block').remove();

        $('#categoryservice-form input[name="parent_id"]').remove();

        $('.general-information-tab a').click();
    }

    loading(state) {
        if (state === true) {
            $('.overlay.loader').removeClass('hide');
        } else {
            $('.overlay.loader').addClass('hide');
        }
    }

    submit(e) {
        let selectedId = $('.categoryservice-tree').jstree('get_selected')[0];

        if (! $('#slug-field').hasClass('hide')) {
            window.form.appendHiddenInput('#categoryservice-form', '_method', 'put');

            $('#categoryservice-form').attr('action', route('admin.category_services.update', selectedId));
        }
        e.currentTarget.submit();
    }

}
