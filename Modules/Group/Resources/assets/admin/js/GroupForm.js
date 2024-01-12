import GroupTree from './GroupTree';

export default class {

    constructor() {
        let tree = $('.group-tree');

        new GroupTree(this, tree);

        this.collapseAll(tree);
        this.expandAll(tree);
        this.addRootGroup();
        this.addSubGroup();

        $('#group-form').on('submit', this.submit);

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

    addRootGroup() {
        $('.add-root-group').on('click', () => {
            this.loading(true);

            $('.add-sub-group').addClass('disabled');

            $('.group-tree').jstree('deselect_all');

            this.clear();

            // Intentionally delay 150ms so that user feel new form is loaded.
            setTimeout(this.loading, 150, false);
        });
    }

    addSubGroup() {
        $('.add-sub-group').on('click', () => {
            let selectedId = $('.group-tree').jstree('get_selected')[0];

            if (selectedId === undefined) {
                return;
            }

            this.clear();
            this.loading(true);

            window.form.appendHiddenInput('#group-form', 'parent_id', selectedId);

            // Intentionally delay 150ms so that user feel new form is loaded.
            setTimeout(this.loading, 150, false);
        });
    }

    fetchGroup(id) {
        this.loading(true);

        $('.add-sub-group').removeClass('disabled');

        $.ajax({
            type: 'GET',
            url: route('admin.groups.show', id),
            success: (group) => {
                this.update(group);

                this.loading(false);
            },
            error: (xhr) => {
                error(xhr.responseJSON.message);

                this.loading(false);
            },
        });
    }

    update(group) {
        window.form.removeErrors();

        $('.btn-delete').removeClass('hide');
        $('.form-group .help-block').remove();

        $('#confirmation-form').attr('action', route('admin.groups.destroy', group.id));

        $('#id-field').removeClass('hide');

        $('#id').val(group.id);
        $('#name').val(group.name);

        $('#slug').val(group.slug);
        $('#slug-field').removeClass('hide');
        $('.group-details-tab .seo-tab').removeClass('hide');

        $('#is_searchable').prop('checked', group.is_searchable);
        $('#is_active').prop('checked', group.is_active);

        $('#group-form input[name="parent_id"]').remove();
    }

    clear() {
        $('#id-field').addClass('hide');

        $('#id').val('');
        $('#name').val('');

        $('#slug').val('');
        $('#slug-field').addClass('hide');
        $('.group-details-tab .seo-tab').addClass('hide');

        $('#is_searchable').prop('checked', false);
        $('#is_active').prop('checked', false);

        $('.btn-delete').addClass('hide');
        $('.form-group .help-block').remove();

        $('#group-form input[name="parent_id"]').remove();

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
        let selectedId = $('.group-tree').jstree('get_selected')[0];

        if (! $('#slug-field').hasClass('hide')) {
            window.form.appendHiddenInput('#group-form', '_method', 'put');

            $('#group-form').attr('action', route('admin.groups.update', selectedId));
        }
        e.currentTarget.submit();
    }

}