<?php

namespace Modules\Tagp\Table;

use Modules\Admin\Ui\Tab;
use Modules\Admin\Ui\Tabs;

class TagPTabs extends Tabs
{
    public function make()
    {
        $this->group('tag_information', trans('tag::tags.tabs.group.tag_information'))
            ->active()
            ->add($this->general());
    }

    private function general()
    {
        return tap(new Tab('general', trans('tag::tags.tabs.general')), function (Tab $tab) {
            $tab->active();
            $tab->weight(5);
            $tab->fields(['name']);
            $tab->view('tagp::admin.tag_ps.tabs.general');
        });
    }
}
