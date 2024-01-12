<?php

namespace Modules\Comment\Admin;

use Modules\Admin\Ui\Tab;
use Modules\Admin\Ui\Tabs;

class CommentTabs extends Tabs
{
    /**
     * Make new tabs with groups.
     *
     * @return void
     */
    public function make()
    {
        $this->group('comment_information', trans('comment::comments.tabs.group.comment_information'))
            ->active()
            ->add($this->general());
    }

    private function general()
    {
        return tap(new Tab('comment', trans('comment::comments.tabs.general')), function (Tab $tab) {
            $tab->active();
            $tab->weight(5);
            $tab->fields(['name', 'email', 'comment', 'is_approved']);
            $tab->view('comment::admin.comments.tabs.general');
        });
    }
}
