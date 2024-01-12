export default class {

    constructor(groupForm, selector) {
        this.selector = selector;

        $.jstree.defaults.dnd.touch = true;
        $.jstree.defaults.dnd.copy = false;

        this.fetchCategoryServiceTree();

        // On selecting a group.
        selector.on('select_node.jstree', (e, node) => groupForm.fetchCategoryService(node.selected[0]));

        // Expand groups when jstree is loaded.
        selector.on('loaded.jstree', () => selector.jstree('open_all'));

        // On updating group tree.
        this.selector.on('move_node.jstree', (e, data) => {
            this.updateCategoryServiceTree(data);
        });
    }

    fetchCategoryServiceTree() {
        this.selector.jstree({
            core: {
                data: { url: route('admin.category_services.tree') },
                check_callback: true,
            },
            plugins: ['dnd'],
        });
    }

    updateCategoryServiceTree(data) {
        this.loading(data.node, true);

        $.ajax({
            type: 'PUT',
            url: route('admin.category_services.tree.update'),
            data: { categoryservice_tree: this.getCategoryServiceTree() },
            success: (message) => {
                success(message);
                this.loading(data.node, false);
                this.clear();
            },
            error: (xhr) => {
                error(xhr.responseJSON.message);

                this.loading(data.node, false);
            },
        });
    }

    clear() {
        $('#id-field').addClass('hide');

        $('#id').val('');
        $('#name').val('');

        $('#slug').val('');
        $('#slug-field').addClass('hide');
        $('.category-details-tab .seo-tab').addClass('hide');

        $('#is_searchable').prop('checked', false);
        $('#is_active').prop('checked', false);

        $('.logo .image-holder-wrapper').html(this.imagePlaceholder());
        $('.banner .image-holder-wrapper').html(this.imagePlaceholder());

        $('.btn-delete').addClass('hide');
        $('.form-categoryservice .help-block').remove();

        $('#category-form input[name="parent_id"]').remove();

        $('.general-information-tab a').click();
    }

    getCategoryServiceTree() {
        let groups = this.selector.jstree(true).get_json('#', { flat: true });

        return groups.reduce((formatted, group) => {
            return formatted.concat({
                id: group.id,
                parent_id: (group.parent === '#') ? null : group.parent,
                position: group.data.position,
            });
        }, []);
    }

    imagePlaceholder() {
        return `
            <div class="image-holder placeholder">
                <i class="fa fa-picture-o"></i>
            </div>
        `;
    }

    loading(node, state) {
        let nodeElement = this.selector.jstree().get_node(node, true);

        if (state) {
            $(nodeElement).addClass('jstree-loading');
        } else {
            $(nodeElement).removeClass('jstree-loading');
        }
    }

}
