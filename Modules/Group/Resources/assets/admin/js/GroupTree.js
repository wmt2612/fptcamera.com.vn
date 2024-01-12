export default class {

    constructor(groupForm, selector) {
        this.selector = selector;

        $.jstree.defaults.dnd.touch = true;
        $.jstree.defaults.dnd.copy = false;

        this.fetchGroupTree();

        // On selecting a group.
        selector.on('select_node.jstree', (e, node) => groupForm.fetchGroup(node.selected[0]));

        // Expand groups when jstree is loaded.
        selector.on('loaded.jstree', () => selector.jstree('open_all'));

        // On updating group tree.
        this.selector.on('move_node.jstree', (e, data) => {
            this.updateGroupTree(data);
        });
    }

    fetchGroupTree() {
        this.selector.jstree({
            core: {
                data: { url: route('admin.groups.tree') },
                check_callback: true,
            },
            plugins: ['dnd'],
        });
    }

    updateGroupTree(data) {
        this.loading(data.node, true);

        $.ajax({
            type: 'PUT',
            url: route('admin.groups.tree.update'),
            data: { group_tree: this.getGroupTree() },
            success: (message) => {
                success(message);

                this.loading(data.node, false);
            },
            error: (xhr) => {
                error(xhr.responseJSON.message);

                this.loading(data.node, false);
            },
        });
    }

    getGroupTree() {
        let groups = this.selector.jstree(true).get_json('#', { flat: true });

        return groups.reduce((formatted, group) => {
            return formatted.concat({
                id: group.id,
                parent_id: (group.parent === '#') ? null : group.parent,
                position: group.data.position,
            });
        }, []);
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